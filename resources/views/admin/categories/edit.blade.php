@extends('layouts.app')

@section('content')

<form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">

        <label for="name">Category Name:</label>
        <input type="text" class="form-control" name="name" id="name" value="{{ $category->name }}" required>
        <div class="invalid-feedback">Please enter a category name.</div>

    </div>

    <div class="form-group">
        <label for="image">Image:</label>
        <input type="file" name="image" class="form-control-file">

        @if ($category->image)
            <img src="{{ Storage::url('images/' . $category->image) }}" alt="Category Image" style="max-width: 200px;">
        @else
            <p>No image available</p>
        @endif
    </div>

    <button type="submit">Update Category</button>
</form>

@endsection