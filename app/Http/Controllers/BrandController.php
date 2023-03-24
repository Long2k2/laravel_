<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BrandController extends Controller
{
    public function index()
    {
        return view('admin.brand.index');
    }
    public function create()
    {
        return view('admin.brand.create');
    }
    public function store(Request $request)
    {
        Brand::create([
            'name' => $request->name,
        ]);
        return redirect('admin/brand');
    }
    public function edit(Brand $brand)
    {
        return view('admin.brand.edit', ['brand' => $brand]);
    }
    public function update(Request $request, Brand $brand)
    {
        DB::table('brands')
            ->where('id', $brand->id)
            ->update([
                'name' => $request->name,
            ]);
        return redirect('admin/brand');
    }
    public function destroy(Brand $brand)
    {
        DB::table('brands')
            ->where('id', $brand->id)
            ->update([
                'status' => 0,
            ]);
        return redirect('admin/brand');
    }
}
