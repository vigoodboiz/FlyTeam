<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $products = Product::with('category')->get();
        // return view('products.index', compact('products'));

        $products = Product::with('category')->get();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      // Lấy danh sách các category để hiển thị trong form
      $categories = Category::all();

      return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_category' => 'required',
            'name' => 'required',
            'brand' => 'required',
            'price' => 'required',
            'price_sale' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Lưu ảnh vào thư mục storage/app/public/images
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
            $validatedData['image'] = $imageName;
        }

        Product::create($validatedData);

        return redirect()->route('products.create')->with('success', 'Sản phẩm đã được thêm thành công');

      
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    ////////////////////////////////////////////////////////////////////////////
    // public function edit(string $id)
    // {
    //     // Lấy danh sách các category để hiển thị trong form
    //     $categories = Category::all();

      
    //     return view('products.edit', compact('products', 'categories'));
    // }

    public function edit($id)
    {
        // $product = Product::findOrFail($id);

        // return view('products.edit', compact('product'));

        $product = Product::find($id);
            $categories = Category::all();

            return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    // {
    //     $validatedData = $request->validate([
    //         'id_category' => 'required',
    //         'name' => 'required',
    //         'brand' => 'required',
    //         'price' => 'required',
    //         'price_sale' => 'nullable',
    //         'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    //     ]);

    //     // Lưu ảnh vào thư mục storage/app/public/images
    //     if ($request->hasFile('image')) {
    //         $image = $request->file('image');
    //         $imageName = time() . '.' . $image->getClientOriginalExtension();
    //         $image->storeAs('public/images', $imageName);
    //         $validatedData['image'] = $imageName;
    //     }

    //     $product->update($validatedData);

    //     return redirect()->route('products.edit', $product)->with('success', 'Sản phẩm đã được cập nhật thành công');
    // }


    public function update(Request $request, $id)
    {
        $request->validate([
            'id_category' => 'required',
            'name' => 'required',
            'brand' => 'required',
            'price' => 'required|numeric',
            'price_sale' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Tìm sản phẩm cần sửa
        $product = Product::findOrFail($id);

        // Lưu ảnh mới nếu có
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);

            // Xóa ảnh cũ nếu có
            if ($product->image) {
                Storage::delete('public/images/' . $product->image);
            }

            $product->image = $imageName;
        }

        // Cập nhật thông tin sản phẩm
        $product->id_category = $request->input('id_category');
        $product->name = $request->input('name');
        $product->brand = $request->input('brand');
        $product->price = $request->input('price');
        $product->price_sale = $request->input('price_sale');
        $product->save();

        return redirect()->route('products.index')->with('success', 'Sản phẩm đã được cập nhật thành công.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
    
        return redirect()->route('products.index')->with('success', 'Đã xóa sản phẩm thành công.');
    }
}


