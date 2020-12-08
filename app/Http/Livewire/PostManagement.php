<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;

class PostManagement extends Component
{

    public $posts;
    public $payload;
    public $list_page = false;
    protected $listeners = [
        'deletePost'=>'deletePost',
        'refreshThis'=>'$refresh'
        ];
    public function mount()
    {
        $this->posts = Post::all();
    }

    public function toggle()
    {
        $this->list_page = !$this->list_page;
    }

    public function render()
    {
        return view('livewire.post-management');
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
