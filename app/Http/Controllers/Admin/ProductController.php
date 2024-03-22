<?php

namespace App\Http\Controllers\Admin;

use App\Models\Products;
use App\Models\Category;
use App\Models\Variant;
use App\Http\Controllers\Controller;
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

        $products = Products::orderBy('created_at', 'DESC')->paginate(5);
        return view('admin.products.index', compact('products'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      // Lấy danh sách các category để hiển thị trong form
      $categories = Category::all();
      return view('admin.products.create', compact('categories'));
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
            'price_sale' => 'required',
            'describe' => 'required',
            'quantity_product' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Lưu ảnh vào thư mục storage/app/public/images
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
            $validatedData['image'] = $imageName;
        }
        Products::create($validatedData);
        // if ($request->variants) {
        //     foreach ($request->variants as $variantName) {
        //         $validatedData->variants()->create(['name' => $variantName]);
        //     }
        // }
        return redirect()->back()->with('success', 'Sản phẩm được thêm thành công!');
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

    public function edit($id)
    {
        // $product = Product::findOrFail($id);

        // return view('products.edit', compact('product'));

        $product = Products::find($id);
            $categories = Category::all();

            return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */


    public function update(Request $request, $id)
    {
        $request->validate([
            'id_category' => 'required',
            'name' => 'required',
            'brand' => 'required',
            'describe' => 'required',
            'quantity_product' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Tìm sản phẩm cần sửa
        $product = Products::findOrFail($id);

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
        $product->describe = $request->input('describe');
        $product->quantity_product = $request->input('quantity_product');
        $product->save();

        return redirect()->route('products.index')->with('success', 'Sản phẩm được cập nhật thành công!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Products::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Sản phẩm được xóa thành công!');
    }

}
