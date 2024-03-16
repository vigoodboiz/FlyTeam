@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Thêm ảnh sản phẩm </h2>
        <form action="{{ route('gallery.store', $product_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="images">Ảnh:</label>
                <input class="mb-3" type="file" name="images[]" id="image" class="form-control-file" multiple>
                <img id="anh_the_preview"
                    src="https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg" alt="your image"
                    style="max-width: 200px; height:100px; margin-bottom: 10px;" class="img-fluid" />
            </div>
            <button type="submit" class="btn btn-primary">Thêm ảnh</button>
        </form>
    </div>

    <h1>Gallery List</h1>

    <table class="table">
        <thead>
            <tr>
                <th>id</th>
                <th>Ảnh</th>
                <th>Hành động </th>

            </tr>
        </thead>
        <tbody>
            @foreach ($gallery as $gallery)
                <tr>
                    <td scope="row">{{ $gallery->id }}</td>
                    <td class="col-9"><img src="{{ asset('upload/public/images/' . $gallery->image) }}"
                            alt="{{ $gallery->name }}" width="200" class="img-fluid">
                    <td>
                        <form id="delete-form" action="{{ route('gallery.destroy', $gallery->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" id="delete-button"><i
                                    class="fa fa-trash mr-0"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
