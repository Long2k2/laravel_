<?php

namespace App\Http\Controllers;

use App\Http\Requests\BannerFormRequest;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
class ControllerBanner extends Controller
{
    public function index()
    {
        $banners = Banner::orderBy('status', 'DESC')->paginate(3);
        return view('admin.banner.index', ['banners' => $banners]);
    }
    public function create()
    {
        return view('admin.banner.create');
    }
    public function store(BannerFormRequest $request)
    {
        $validateData = $request->validated();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('upload/banner/', $filename);
            $validateData['image'] = "upload/banner/$filename";
        }
        $create =  Banner::create([
            'title' => $validateData['title'],
            'description' => $validateData['description'],
            'image' => $validateData['image'],
        ]);
        return redirect('admin/banner');
    }
    public function edit(Banner $banner)
    {
        return view('admin.banner.edit', ["banner" => $banner]);
    }
    public function update(BannerFormRequest $request, $banner)
    {
        $banner = Banner::findOrFail($banner);
        $validateData = $request->validated();
        if ($request->hasFile('image')) {
            $destination = $banner->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('upload/banner/', $filename);
            $validateData['image'] = "upload/banner/$filename";
        }
        $affected = DB::table('banners')
            ->where('id', $banner->id)
            ->update([
                'title' => $validateData['title'],
                'description' => $validateData['description'],
                'image' => $validateData['image'],
            ]);
        return redirect('admin/banner');
    }
    public function destroy(Banner $banner)
    {
        DB::table('banners')
            ->where('id', $banner->id)
            ->update([
                'status' => 0
            ]);
        return redirect('admin/banner');
    }
}
