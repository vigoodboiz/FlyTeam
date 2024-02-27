@extends('layouts.app')

@section('content')
    <h1>Gallery List</h1>

    <table border='1' >
        <thead>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Image</th>
                <th>Chức Năng </th>
           
            </tr>
        </thead>
        <tbody>
            @foreach($gallery as $gallery)
                <tr>
                    <td>{{ $gallery->id }}</td>
                    <td>{{ $gallery->name }}</td>
                    <td><img src="{{ asset('storage/images/' . $gallery->image) }}" alt="{{ $gallery->name }}" width="100">    
                    <td>
                        <form action="{{ route('gallery.destroy', $gallery->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Xoá</button>
                        </form>
                    </td>         
                </tr>


            @endforeach
        </tbody>
    </table>

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