@extends('layouts.app')

@section('content')

<div class="container">
        <h2>thêm ảnh </h2>
        <form action="{{ route('gallery.store', $product_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="images">Ảnh:</label>
                <input type="file" name="images[]" id="images" class="form-control-file" multiple>
            </div>
            <button type="submit" class="btn btn-primary">Thêm ảnh</button>
        </form>
    </div>

    <h1>Gallery List</h1>

    <table border='1'class="table" >
        <thead>
            <tr>
                <th>id</th>
                <th>Image</th>
                <th>Chức Năng </th>
           
            </tr>
        </thead>
        <tbody>
            @foreach($gallery as $gallery)
                <tr>
                    <td>{{ $gallery->id }}</td>
                    <td class="col-9"><img src="{{ asset('storage/images/' . $gallery->image) }}" alt="{{ $gallery->name }}" width="400" class="img-fluid">    
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

    

@endsection