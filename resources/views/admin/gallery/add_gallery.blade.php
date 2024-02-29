@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Thêm sản phẩm mới</h2>
        <form action="{{ route('gallery.store', $product_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Tên sản phẩm:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="images">Ảnh:</label>
                <input type="file" name="images[]" id="images" class="form-control-file" multiple>
            </div>
            <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
        </form>
    </div>




@endsection