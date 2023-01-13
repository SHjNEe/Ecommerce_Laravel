<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Color;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProductFormRequest;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $colors = Color::where('status', '1')->get();

        return view('admin.products.create', ['categories' => $categories, 'brands' =>  $brands, 'colors' => $colors]);
    }

    public function store(ProductFormRequest $request)
    {
        $validateData = $request->validated();
        $category = Category::findOrFail($validateData['category_id']);
        $product = $category->products()->create([
            'category_id' => $validateData['category_id'],
            'name' => $validateData['name'],
            'slug' => Str::slug($validateData['slug']),
            'brand' =>  $validateData['brand'],
            'small_description' => $validateData['small_description'],
            'description' => $validateData['description'],
            'original_price' => $validateData['original_price'],
            'selling_price' => $validateData['selling_price'],
            'quantity' => $validateData['quantity'],
            'trending' => $request['trending'] == true ? '1' : '0',
            'status' => $request['status'] == true ? '1' : '0',
            'meta_title' => $validateData['meta_title'],
            'meta_description' => $validateData['meta_description'],
            'meta_keyword' => $validateData['meta_keyword'],
        ]);
        if ($request->hasFile('image')) {
            $uploadPath = 'uploads/products/';
            $i = 1;
            foreach ($request->file('image') as $imageFile) {
                $extention = $imageFile->getClientOriginalExtension();
                $filename = time() . $i++ . '.' . $extention;
                $imageFile->move($uploadPath, $filename);
                $finalImagePathName = $uploadPath . '' . $filename;

                $product->productImages()->create([
                    'product_id' => $product->id,
                    'image' =>  $finalImagePathName,
                ]);
            }
        }
        if ($request->colors) {
            foreach ($request->colors as $key => $color) {
                $product->productColors()->create([
                    'product_id' => $product->id,
                    'color_id' => $color,
                    'quantity' => $request->colorquantity[$key] ?? 0
                ]);
            }
        }


        return redirect('/admin/product')->with('status', 'Product added successfully.');
    }

    public function edit(int $product)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $product = Product::findOrFail($product);

        return view('admin.products.edit', ['product' => $product, 'categories' => $categories, 'brands' =>  $brands]);
    }

    public function update(ProductFormRequest $request, int $product)
    {
        $validateData = $request->validated();
        $product = Category::findOrFail($validateData['category_id'])->products()->where(['id' => $product])->first();
        if ($product) {
            $product->update([
                'category_id' => $validateData['category_id'],
                'name' => $validateData['name'],
                'slug' => Str::slug($validateData['slug']),
                'brand' =>  $validateData['brand'],
                'small_description' => $validateData['small_description'],
                'description' => $validateData['description'],
                'original_price' => $validateData['original_price'],
                'selling_price' => $validateData['selling_price'],
                'quantity' => $validateData['quantity'],
                'trending' => $request['trending'] == true ? '1' : '0',
                'status' => $request['status'] == true ? '1' : '0',
                'meta_title' => $validateData['meta_title'],
                'meta_description' => $validateData['meta_description'],
                'meta_keyword' => $validateData['meta_keyword'],
            ]);
            if ($request->hasFile('image')) {
                $uploadPath = 'uploads/products/';
                $i = 1;
                foreach ($request->file('image') as $imageFile) {
                    $extention = $imageFile->getClientOriginalExtension();
                    $filename = time() . $i++ . '.' . $extention;
                    $imageFile->move($uploadPath, $filename);
                    $finalImagePathName = $uploadPath . '' . $filename;

                    $product->productImages()->create([
                        'product_id' => $product->id,
                        'image' =>  $finalImagePathName,
                    ]);
                }
            }
            return redirect()->back()->with('status', 'Product updated is successfully');
        } else {
            return redirect('')->with('status', 'No Such Product ID found!');
        }
    }

    public function destroyImage($product_image_id)
    {
        $image = ProductImage::findOrFail($product_image_id);
        if (File::exists($image->image)) {
            File::delete($image->image);
        }
        $image->delete();
        return redirect()->back()->with('status', 'Product Image is deleted!');
    }

    public function destroy(int $product)
    {
        $product = Product::findOrFail($product);
        if (!$product) {
            return redirect()->back()->with('status', 'Can not delete this status');
        }
        if ($product->productImages) {
            foreach ($product->productImages as $image) {
                if (File::exists($image->image)) {
                    File::delete($image->image);
                }
            }
        }
        $product->delete();
        return redirect()->back()->with('status', 'Product is deleted!');
    }
}
