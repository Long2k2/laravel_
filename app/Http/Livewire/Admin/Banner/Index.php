<?php

namespace App\Http\Livewire\Admin\Banner;
use App\Models\Banner;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $banners = Banner::orderBy('status', 'DESC')->paginate(3);
        return view('livewire.admin.banner.index',['banners' => $banners]);
    }
}
