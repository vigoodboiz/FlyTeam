@extends('layouts.app')
@section('content')

<form action="{{ route('categories.update', $category->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
    <label for="name">Category Name:</label>
    <input type="text" class="form-control" name="name" id="name" value="{{ $category->name }}" required>
    <div class="invalid-feedback">Please enter a category name.</div>
</div>


    <!-- <div>
        <label for="name" for="description" >Category Name:</label>
        <input type="text" name="name" id="name" value="{{ $category->name }}">
    </div> -->


    <!-- <div>
        <label for="description">Category Description:</label>
        <textarea name="description" id="description">{{ $category->description }}</textarea>
    </div> -->
    <button type="submit">Update Category</button>
</form>
@endsection
