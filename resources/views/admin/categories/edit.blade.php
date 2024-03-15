@extends('layouts.app')

@section('content')
    <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">

            <label for="name">Tên danh mục:</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $category->name }}" required>
            <div class="invalid-feedback">Please enter a category name.</div>

        </div>

        <div class="form-group">
            <label for="image">Ảnh:</label>
            <input type="file" name="image" class="form-control-file">

            @if ($category->image)
                <img id="anh_the_preview"
                    src="{{ $category->image ? Storage::url('images/' . $category->image) : 'https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg' }}"
                    alt="your image" style="max-width: 200px; height:100px; margin-bottom: 10px;" class="img-fluid" />
            @else
                <p>No image available</p>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật danh mục</button>
    </form>
@endsection
