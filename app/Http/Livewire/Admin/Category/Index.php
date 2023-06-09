<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $categories = Category::orderBy('status', 'DESC')->paginate(5);
        return view('livewire.admin.category.index', ['categories' => $categories]);
    }
}
