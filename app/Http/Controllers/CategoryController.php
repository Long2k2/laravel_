<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    protected $appends = [
        'getParentsTree'
    ];

    public static function getParentsTree($category, $title)
    {
        if ($category->parent_id == 0) {

            return $title;
        }

        $parent = Category::find($category->parent_id);
        $title = $parent->title . ' > ' . $title;

        return CategoryController::getParentsTree($parent, $title);
    }
    public function index()
    {
        return view('admin.category.index');
    }
    public function create()
    {
        $categories = Category::where('parent_id', '=', 0)->get();
        return view('admin.category.create', compact('categories'));
    }
    public function store(Request $request)
    {
        $data = array(
            'title' => $request->title,
            'parent_id' => $request->parent_id
        );
        $create = Category::create($data);
        return redirect('admin/category');
    }
    public function edit(Category $category)
    {
        $categories = Category::where('id', 'not like', $category->id)->get();
        return view('admin.category.edit', ['s_categories' => $categories, 'category' => $category]);
        //return $categories;
    }
    public function update(Request $request, Category $category)
    {
        $affected = DB::table('categories')
            ->where('id', $category->id)
            ->update([
                'title' => $request->title,
                'parent_id' => $request->parent_id
            ]);
        return redirect('admin/category');
    }
    public function destroy(Category $category)
    {
        DB::table('categories')
            ->where('id', $category->id)
            ->update([
                'status' => 0
            ]);
        return redirect('admin/category');
    }
}
