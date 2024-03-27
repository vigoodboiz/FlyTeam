@extends('layouts.app')
@section('content')
    <form action="{{ route('variants.update', $variants->id) }}" method="POST" enctype="multipart/form-data">
        <a class="btn btn-success" href="{{ route('variants.index', $products->id) }}">Danh sách thuộc tính</a>
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Tên thuộc tính:</label>
            <input type="text" name="name" class="form-control" value="{{ $variants->name }}" required>
        </div>

        <div class="form-group">
            <input type="hidden" name="product_name" class="form-control" value="{{ $variants->product_name }}" required>
        </div>

        <div class="form-group">
            <label for="value">Giá trị</label>
            <input type="text" name="value" class="form-control" value="{{ $variants->value }}" required>
        </div>
        <div class="form-group">
            <label for="value">Giá</label>
            <input type="text" name="price" class="form-control" value="{{ $variants->price }}" required>
        </div><div class="form-group">
            <label for="value">Giá sale</label>
            <input type="text" name="price_sale" class="form-control" value="{{ $variants->price_sale }}" required>
        </div>


        <button type="submit" class="btn btn-primary">Cập nhật thuộc tính</button>
    </form>
@endsection
