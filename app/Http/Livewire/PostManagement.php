<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class PostManagement extends Component
{
    use WithPagination;
    public $post;
    public $content;
    public $contentType;
    public $contentOrder = 0;
    public $categories;
    public $list_page = true;
    protected $listeners = [
        'deletePost'=>'deletePost',
        'refreshThis'=>'$refresh',
        'editToggle' => 'editToggle',
        'set:editorContent' => 'editorContentUpdate',
        ];
    public function mount()
    {

        $this->categories = Category::all();
    }

    public function slugMod()
    {
        $this->post['slug']=Str::slug($this->post['title'],'-');
    }

    public function toggle()
    {
        $this->list_page = !$this->list_page;
    }

    public function render()
    {
        return view('livewire.post-management',[
            'posts'=>Post::paginate(5)
        ]);
    }

    public function savePost()
    {
        $this->post['user_id'] =Auth::id();
        if(isset($this->post['id']))
        {
            unset($this->post['created_at']);
            unset($this->post['updated_at']);
            Post::where('id',$this->post['id'])->update($this->post);
        }else{
            $this->post['content']=$this->getContentRow();
            Post::create($this->post);
            $this->posts = Post::all();
        }
        $this->post = '';
        $this->list_page = true;
        $this->emit('refreshThis');
        $this->emit('swal:alert', [
            'type'    => 'success',
            'title'   => 'Post successfully saved!!',
            'timeout' => 3000,
            'icon' => 'success'
        ]);
    }

    public function delete($item)
    {
        $this->emit("swal:confirm", [
            'type'        => 'warning',
            'title'       => 'Are you sure?',
            'text'        => "You won't be able to revert this!",
            'confirmText' => 'Yes, delete!',
            'method'      => 'deletePost',
            'params'      => [$item], // optional, send params to success confirmation
            'callback'    => '', // optional, fire event if no confirmed
        ]);
    }

    public function deletePost($id)
    {
        Post::where('id',$id)->delete();
        $this->emit('refreshThis');
    }

    public function editPost($id)
    {
        $this->post = Post::find($id)->toArray();
        $this->emit('editToggle');
    }
    public function editToggle()
    {
        $this->toggle();
    }

    public function publishStatus($id)
    {
        $post = Post::find($id);
        $status = !$post->published;
        $post->update(['published'=>$status]);
        $this->emit('refreshThis');
        $message = $status?'Published':'Draft';
        $title = $post->title;
        $this->emit('swal:alert', [
            'type'    => 'success',
            'title'   => 'Status changed to '.$message.'!!',
            'timeout' => 3000,
            'icon' => 'success'
        ]);
    }

    public function editorContentUpdate($content)
    {
        $this->content = $content;
        $this->contentType = 'html';
        $this->emit('set:editor',['content'=>$content]);
        $this->emit('swal:alert', [
            'type'    => 'success',
            'title'   => 'Saved Draft!!',
            'timeout' => 3000,
            'icon' => 'success'
        ]);
    }

    public function getContentRow()
    {
        $this->contentOrder = $this->contentOrder + 1;
        return [$this->contentOrder =>['type' => $this->contentType,'content' => $this->content]];
    }

}
