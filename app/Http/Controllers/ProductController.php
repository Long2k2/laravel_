<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductFormRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{



    public function index()
    {
        return view('admin.product.index');
    }
    public function create()
    {
        $categories = Category::where('status', '=', 1)->get();
        $brands = Brand::where('status', '=', 1)->get();
        return view('admin.product.create', ['categories' => $categories, 'brands' => $brands]);
    }
    public function store(ProductFormRequest $request)
    {
        $validateData = $request->validated();

        $category = Category::findOrFail($validateData['category_id']);

        $product = $category->product()->create([
            'category_id' => $validateData['category_id'],
            'brand_id' => $validateData['brand_id'],
            'name' => $validateData['name'],
            'description' => $validateData['description'],
            'small_description' => $validateData['small_description'],
            'quantity' => $validateData['quantity'],
            'price' => $validateData['price'],
            'selling_price' => $validateData['selling_price'],
            'trending' => $request->trending == true ? 1 : 0,
        ]);


        if ($request->hasFile('image')) {
            $integer = 1;
            foreach ($request->file('image') as $image) {
                $ext = $image->getClientOriginalExtension();
                $filename = time().$integer++. '.' . $ext;
                $image->move('upload/product', $filename);
                $finalImagePath = 'upload/product/'. $filename;

                $product->productImages()->create([
                    'product_id' => $product->id,
                    'image' => $finalImagePath,
                ]);
            }
        }


        return redirect('admin/product');
    }
    public function destroy(Product $product)
    {
        DB::table('products')
            ->where('id', $product->id)
            ->update([
                'status' => 0
            ]);
        return redirect('admin/product');
    }
}
