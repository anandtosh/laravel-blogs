<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;

class PostManagement extends Component
{

    public $posts;
    public $payload;
    public $list_page = true;

    public function mount()
    {
        // $this->pageToggle = ;
    }

    public function toggle()
    {
        $this->list_page = !$this->list_page;
    }

    public function render()
    {
        return view('livewire.post-management');
    }
}
