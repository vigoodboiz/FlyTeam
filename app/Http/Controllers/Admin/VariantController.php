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
    public function index()
    {
        $variants = Variant::query()->paginate(5);
        return view('admin.variants.index', compact('variants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Products::all();
        return view('admin.variants.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */



    public function store(Request $request)
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
        return redirect()->route('variants.index')->with('success', 'Thuộc tính được thêm thành công!');
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
    public function edit(string $id)
    {
        $variant = Variant::find($id);
        $products = Products::all();
        return view('admin.variants.edit', compact('variant', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */


    public function update(Request $request, $id)
    {
            $variant = Variant::findOrFail($id);
            $variant->name = $request->name;
            $variant->value = $request->value;
            $variant->product_id = $request->product_id;
            $variant->save();
        return redirect()->route('variants.index')->with('success', 'Thuộc tính được cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
   

    public function destroy(string $id)
    {
        $variant = Variant::findOrFail($id);
        $variant->delete();
        return redirect()->route('variants.index')->with('success', 'Thuộc tính được xóa thành công!');
    }



}