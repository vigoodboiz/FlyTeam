@extends('layouts.app')
@section('content')
    <form action="{{ route('variants.update', $variant->id) }}" method="POST" enctype="multipart/form-data">
        <a class="btn btn-success" href="{{ route('variants.index') }}">Danh sách thuộc tính</a>
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="product_id">Sản phẩm:</label>
            <select name="product_id" class="form-control" id="product_id" required>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}" {{ $product->id == $product->product_id ? 'selected' : '' }}>
                        {{ $product->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="name">Tên thuộc tính:</label>
            <input type="text" name="name" class="form-control" value="{{ $variant->name }}" required>
        </div>

        <div class="form-group">
            <label for="value">Giá trị</label>
            <input type="text" name="value" class="form-control" value="{{ $variant->value }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật thuộc tính</button>
    </form>
@endsection
