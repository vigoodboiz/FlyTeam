<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\Storage;
class GalleryController extends Controller

{

    public function index($product_id)
    {
        
        $gallery = Gallery::where('product_id', $product_id)->get();
        $product = Products::findOrFail($product_id);

   
        return view('admin.gallery.index', compact('gallery','product_id'));
    }

    public function create($product_id)
    {
        $product = Products::findOrFail($product_id);

        return view('admin.gallery.add_gallery', compact('product', 'product_id'));
    }


     public function store(Request $request , $product_id)
    {
      
            if ($request->hasFile('images')) {
                $images = $request->file('images');
              

                foreach ($images as $index => $image) {
                    $imageName = time() . '_' . $image->getClientOriginalName();
                    $image->storeAs('public/images', $imageName);

                    Gallery::create([
                        'product_id' => $product_id,
                  
                        'image' => $imageName,
                    ]);
                }
                }

        return redirect()->route('index', $product_id)->with('success', 'Sản phẩm đã được thêm thành công');
    }



  
public function destroy(Gallery $gallery)
{
    // Xoá ảnh từ storage
    Storage::delete('public/images/' . $gallery->image);

    // Xoá bản ghi trong database
    $gallery->delete();

    return redirect()->back()->with('success', 'Image deleted successfully.');
}


 }