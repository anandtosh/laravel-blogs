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
    // public $posts;
    public $categories;
    public $list_page = true;
    protected $listeners = [
        'deletePost'=>'deletePost',
        'refreshThis'=>'$refresh',
        'editToggle' => 'editToggle'
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
}
