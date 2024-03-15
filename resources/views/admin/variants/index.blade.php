@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">Danh sách thuộc tính</h4>
                        <a href="{{ route('products.index') }}" class="btn btn-primary add-list"><i
                                class="las la-plus mr-3"></i>Danh sách sản phẩm</a>
                    </div>
                    <div>
                        @can('variant_create')
                            <a href="{{ route('variants.create', $products->id) }}" class="btn btn-primary add-list"><i
                                    class="las la-plus mr-3"></i>Thêm thuộc tính</a>
                        @endcan
                    </div>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã sản phẩm</th>
                        <th>Tên thuộc tính</th>
                        <th>Giá trị</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($variants as $variant)
                        <tr>
                            <td>{{ $variant->id }}</td>
                            <th scope="row">#1234{{ $variant->product->id }}</th>
                            <td>{{ $variant->name }}</td>
                            @if ($variant->name == 'Màu sắc')
                                <td><i class="fa-solid fa-heart" style="color:{{ $variant->value }}"></i></td>
                            @else
                                <td>{{ $variant->value }}</td>
                            @endif
                            <td>
                                @can('variant_edit')
                                    <a href="{{ route('variants.edit', $variant->id) }}" class="btn btn-primary"><i
                                            class="fa-solid fa-pen"></i></a>
                                @endcan
                                @can('variant_delete')
                                    <form id="delete-form" action="{{ route('variants.destroy', $variant->id) }}" method="POST"
                                        class="d-inline">
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
        </div>
    @endsection
