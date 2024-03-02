@extends('layouts.app')
@section('content')
<div class="container">

    <h2><b class="mb-3">New Product</b></h2>
    <h2><a class="btn btn-success mt-3 mb-3" href="{{ route('products.index') }}">List Product</a></h2>


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
            <input class="mb-3" type="file" name="image" id="image" class="form-control-file">
            <img id="anh_the_preview" src="https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg" alt="your image" style="max-width: 200px; height:100px; margin-bottom: 10px;" class="img-fluid" />
        </div>
        <button type="submit" class="btn btn-primary" id="addProductBtn">Thêm sản phẩm</button>
    </form>
</div>
@endsection
@section('js-custom')

<script>
    $(document).ready(function() {
        $('#id_category').select2();
    });
</script>
@endsection