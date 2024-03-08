@extends('layouts.app')
@section('content')
<form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">

    <a class="btn btn-success" href="{{ route('categories.index') }}">List Cate</a>

    <div class="mb-3">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Category Name:</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>

        <div class="mb-3">
            <label for="image">Ảnh:</label>
            <img id="anh_the_preview" src="https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg" alt="your image" style="max-width: 200px; height:100px; margin-bottom: 10px;" class="img-fluid" />

            <input type="file" name="image" id="image" class="form-control-file">
        </div>

        <button type="submit" class="btn btn-primary">Thêm</button>

</form>
@endsection
