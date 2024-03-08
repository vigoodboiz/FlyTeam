@extends('layouts.app')
@section('content')
@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<style>
    .description-cell {
        white-space: pre-wrap;
        word-wrap: break-word;
        max-width: 250px;
    }
</style>
<table class="table table-bordered">

    <h2><a href="{{ route('products.create') }}">thêm</a></h2>
    <thead>
        <tr>
            <th>ID</th>
            <th>Danh mục</th>
            <th>Name</th>
            <th>Brand</th>
            <th>Describe </th>
            <th>Price</th>
            <th>Price Sale</th>
            <th>Quantity</th>
            <th>Image</th>
            <th>View</th>
            <th>Galery</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->category->name }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->brand }}</td>
            <td class="description-cell">{{ $product->describe }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->price_sale }}</td>
            <td>{{ $product->quantity }}</td>
            <td><img src="{{ asset('storage/images/' . $product->image) }}" alt="{{ $product->name }}" width="100">
            <td>{{ $product->view_count }}</td>
            <td> <a href="{{ route('index', $product->id) }}" class="btn btn-success"> image</a></td>
            </td>
            <td>

                @can('product_edit')
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-danger">Edit</a>

                @endcan

            </td>
            <td>
                @can('product_delete')
                <form action="{{ route('product.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </form>
                @endcan
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection


