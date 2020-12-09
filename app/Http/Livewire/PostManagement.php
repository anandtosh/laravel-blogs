<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostManagement extends Component
{
    public $post;
    public $posts;
    public $payload;
    public $list_page = true;
    protected $listeners = [
        'deletePost'=>'deletePost',
        'refreshThis'=>'$refresh'
        ];
    public function mount()
    {
        $this->posts = Post::all();
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
        return view('livewire.post-management');
    }

    public function savePost()
    {
        $this->post['user_id'] =Auth::id();
        Post::create($this->post);
        $this->post = '';
        $this->list_page = true;
        $this->emit('refreshThis');
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
}
