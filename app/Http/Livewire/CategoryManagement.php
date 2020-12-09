<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CategoryManagement extends Component
{
    public $category;
    public $categories;
    public $payload;
    public $list_page = true;
    protected $listeners = [
        'deleteCategory'=>'deleteCategory',
        'refreshThis'=>'$refresh'
        ];
    public function mount()
    {
        $this->categories = Category::all();
    }

    public function slugMod()
    {
        $this->category['slug']=Str::slug($this->category['title'],'-');
    }

    public function toggle()
    {
        $this->list_page = !$this->list_page;
    }

    public function render()
    {
        return view('livewire.category-management');
    }

    public function saveCategory()
    {
        $this->category['user_id'] =Auth::id();
        Category::create($this->category);
        $this->category = '';
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
            'method'      => 'deleteCategory',
            'params'      => [$item], // optional, send params to success confirmation
            'callback'    => '', // optional, fire event if no confirmed
        ]);
    }
    public function deleteCategory($id)
    {
        Category::where('id',$id)->delete();
        $this->emit('refreshThis');
    }
}
