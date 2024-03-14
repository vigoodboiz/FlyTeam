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
<h2><a class="btn btn-primary mt-3 mb-3" href="{{ route('products.create') }}">New Product</a></h2>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive rounded mb-3">
                <table class="data-table table mb-0 tbl-server-info">
                    <thead class="bg-white text-uppercase">
                        <tr class="ligth ligth-data">
                            <th>Mã sản phẩm</th>
                            <th>Danh mục</th>
                            <th>Tên sản phẩm</th>
                            <th>Thương hiệu</th>
                            <th>Mô tả sản phẩm</th>
                            <th>Giá sản phẩm</th>
                            <th>Giá sale</th>
                            <th>Ảnh sản phẩm</th>
                            <th>Lượt xem</th>
                            <th>Số Lượng</th>
                            <th>Trưng bày</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <th scope="row">#1234{{ $product->id }}</th>
                            <td>{{ $product->category->name }}</td>
                            <td class="text-truncate ">{{ $product->name }}</td>
                            <td>{{ $product->brand }}</td>
                            <td class="text-truncate ">{{ $product->describe }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->price_sale }}</td>
                            <td><img src="{{ asset('upload/public/images/' . $product->image) }}" alt="{{ $product->name }}" width="500px">
                            <td>{{ $product->view_count }}</td>
                            <td>{{ $product->quantity_product }}</td>
                            <td> <a href="{{ route('index', $product->id) }}" class="btn btn-success"> image</a>
                            </td>
                            </td>
                            <td>
                                @can('product_edit')
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-danger"><i class="fa-solid fa-pen"></i></a>
                                @endcan

                            </td>
                            <td>
                                @can('product_delete')
                                <form id="delete-form" action="{{ route('product.destroy', $product->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" id="delete-button"><i class="fa fa-trash mr-0"></i></button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
@endsection