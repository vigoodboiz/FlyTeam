@extends('layouts.app')
@section('content')
    <style>
        .description-cell {
            white-space: pre-wrap;
            word-wrap: break-word;
            max-width: 250px;
        }
    </style>
    <h2>Product</h2>
    @can('product_create')
        <h2><a class="btn btn-primary mt-3 mb-3" href="{{ route('products.create') }}">New Product</a></h2>
    @endcan
    <table class="table">
        <thead>
            <tr>
                <th scope="row">ID</th>
                <th>Danh mục</th>
                <th>Name</th>
                <th>Brand</th>
                <th>Describe </th>
                <th>Price</th>
                <th>Price Sale</th>
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
                    <td scope="row">#1234{{ $product->id }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->brand }}</td>
                    <td>{{ $product->describe }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->price_sale }}</td>
                    <td><img src="{{ asset('upload/public/images/' . $product->image) }}" alt="{{ $product->name }}"
                            width="500px">
                    <td>{{ $product->view_count }}</td>
                    <td> <a href="{{ route('index', $product->id) }}" class="btn btn-success"> image</a></td>
                    </td>
                    <td>

                        @can('product_edit')
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-danger"><i
                                    class="fa-solid fa-pen"></i></a>
                        @endcan

                    </td>
                    <td>
                        @can('product_delete')
                            <form id="delete-form" action="{{ route('product.destroy', $product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" id="delete-button"><i
                                        class="fa fa-trash mr-0"></i></button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $products->links() }}
@endsection
