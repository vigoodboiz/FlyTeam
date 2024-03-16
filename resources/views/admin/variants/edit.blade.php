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
            <label for="value">Giá trị</label>
            <input type="text" name="value" class="form-control" value="{{ $variants->value }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật thuộc tính</button>
    </form>
@endsection
