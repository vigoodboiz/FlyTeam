<?php

namespace App\Http\Controllers\Admin;
use App\Models\Variant;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\FlyTeamPusher;
class VariantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($product_id)
    {
        // $variants = Variant::query()->paginate(5);
        $variants = Variant::where('product_id', $product_id)->get();
        $products = Products::findOrFail($product_id);
        return view('admin.variants.index', compact('variants', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($product_id)
    {
        $products = Products::findOrFail($product_id);
        return view('admin.variants.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */



    public function store(Request $request, $product_id)
    {
        // $validatedData = $request->validate([
        //     'name' => 'required',
        //     'option' => 'required',
        // ]);

        // Variant::create($validatedData);

        // return redirect()->route('variants.index')->with('success', 'Danh mục được thêm thành công!');
        $variant = new Variant();
        $variant->name = $request->name;
        $variant->value = $request->value;
        $variant->product_id = $request->product_id;
        $variant->save();
        return redirect()->route('variants.index', $product_id)->with('success', 'Thuộc tính được thêm thành công!');
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
    public function edit(string $product_id)
    {
        $variants = Variant::find($product_id);
        $products = Products::findOrFail($product_id);
        return view('admin.variants.edit', compact('variants', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */


    public function update(Request $request, $product_id)
    {
            $variant = Variant::findOrFail($product_id);
            $variant->name = $request->name;
            $variant->value = $request->value;
            $variant->product_id = $request->product_id;
            $variant->save();
        return redirect()->route('variants.index', $product_id)->with('success', 'Thuộc tính được cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
   

    public function destroy(string $id)
    {
        $variant = Variant::findOrFail($id);
        $variant->delete();
        return redirect()->back()->with('success', 'Thuộc tính được xóa thành công!');
    }



}