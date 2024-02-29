@extends('layouts.app')
@section('content')
    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">


        <div class="mb-3">
            <button type="submit" class="btn btn-primary"><a href="{{ route('categories.index') }}">Category</a></button>
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Category Name:</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>

            <div class="mb-3">
                <label for="image">Ảnh:</label>
                <input type="file" name="image" id="image" class="form-control-file">
            </div>

            <button type="submit" class="btn btn-primary">Thêm</button>

    </form>
@endsection

