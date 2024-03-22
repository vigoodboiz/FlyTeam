@extends('layouts.app')
@section('content')
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')


        <div class="form-group">
            <label for="id_category">Danh mục:</label>
            <select name="id_category" class="form-control" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $product->id_category ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>


        <div class="form-group">
            <label for="name">Tên danh mục:</label>
            <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
        </div>

        <div class="form-group">
            <label for="brand">Thương thiệu:</label>
            <input type="text" name="brand" class="form-control" value="{{ $product->brand }}" required>
        </div>

        <div class="form-group">
            <label for="brand">Giá:</label>
            <input type="text" name="price" class="form-control" value="{{ $product->price }}" required>
        </div>
        <div class="form-group">
            <label for="brand">Giá sale:</label>
            <input type="text" name="price_sale" class="form-control" value="{{ $product->price_sale }}" required>
        </div>

        <div class="form-group">
            <label for="describe">Mô tả:</label>
            <input type="text" name="describe" class="form-control" value="{{ $product->describe }}" required>
        </div>

        <div class="form-group">
            <label for="quantity_product">Số lượng sản phẩm:</label>
            <input type="number" name="quantity_product" class="form-control" value="{{ $product->quantity_product }}"
                   required>

        </div>

        <div class="form-group">
            <label for="image">Ảnh:</label>
            <input type="file" name="image" class="form-control-file">
            <img id="anh_the_preview"
                src="{{ $product->image ? Storage::url('images/' . $product->image) : 'https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg' }}"
                alt="your image" style="max-width: 200px; height:100px; margin-bottom: 10px;" class="img-fluid" />
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật sản phẩm</button>
    </form>
@endsection
