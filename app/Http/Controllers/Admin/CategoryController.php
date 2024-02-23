<?php

namespace App\Http\Controllers\Admin;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Lưu ảnh vào thư mục public/images
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $validatedData['image'] = $imageName;
        }

        Category::create($validatedData);

        return redirect()->route('categories.index')->with('success', 'Danh mục đã được tạo thành công');
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
        $category = Category::find($id);
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Xóa ảnh cũ (nếu có)
            // if ($category->image) {
            //     Storage::delete('public/images/' . $category->image);
            // }

            // Lưu ảnh mới
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
            $validatedData['image'] = $imageName;
        }

        $category->update($validatedData);

        // Thực hiện các xử lý khác sau khi cập nhật danh mục

        return redirect()->route('categories.index')->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Category $category)
    // {
    //     $category->delete();

    //     // Thực hiện các xử lý khác sau khi xoá danh mục

    //     return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully');
    // }

    public function destroy($id)
    {
        $category = Category::findOrFail($id); // Tìm một thành viên theo ID

        $category->delete(); // Xóa thành viên

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully');
    }


    // public function destroy(Category $category)
    // {
    //     $category->products()->delete(); // Xóa tất cả các sản phẩm thuộc về danh mục trước

    //     $category->delete(); // Xóa danh mục

    //     // Thực hiện các xử lý khác sau khi xoá danh mục

    //     return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully');
    // }
}
