@extends('layouts.app')
@section('content')
 <div class="container">
 <h2><a href="{{ route('products.index') }}">products</a></h2>
        <h2>Thêm sản phẩm mới</h2>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="id_category">Danh mục:</label>
                <select name="id_category" id="id_category" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="name">Tên sản phẩm:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="brand">Thương hiệu:</label>
                <input type="text" name="brand" id="brand" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="describe">Mô Tả:</label>
                <input type="text" name="describe" id="describe" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="price">Giá:</label>
                <input type="number" name="price" id="price" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="price_sale">Giá khuyến mãi:</label>
                <input type="number" name="price_sale" id="price_sale" class="form-control">
            </div>
            <div class="form-group">
                <label for="image">Ảnh:</label>
                <input type="file" name="image" id="image" class="form-control-file">
            </div>
            <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
        </form>
    </div>
    @endsection