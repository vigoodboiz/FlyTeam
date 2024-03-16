@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">Danh sách đơn hàng</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="table-responsive rounded mb-3">
                    <table class="data-table table mb-0 tbl-server-info">
                        <thead class="bg-white text-uppercase">
                            <tr>
                                <th>STT</th>
                                <th>Mã đơn hàng</th>
                                <th>Tên khách hàng</th>
                                <th>Ảnh sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Tổng tiền</th>
                                <th>Ghi chú</th>
                                <th>Trạng thái đơn hàng</th>
                                <th>Trạng thái giao hàng</th>
                                <th>Ngày đặt hàng</th>
                            </tr>
                        </thead>
                        <tbody class="ligth-body">
                            @foreach ($listOder as $item)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <th scope="row">#1234{{ $item->id }}</th>
                                    <td>{{ $item->user->name }}</td>
                                    {{-- <td>{{ $item->user->email }}</td>
                            <td>{{ $item->user->phone }}</td>
                            <td>{{ $item->user->address }}</td> --}}
                                    <td>

                                        <img class="border-radius-5"
                                            src="{{ asset('upload/public/images/' . $item->product->image) }}"
                                            alt="cart-product">

                                    </td>
                                    <td>

                                        {{ $item->product->name }}

                                    </td>
                                    <td>

                                        {{ $item->product->price }}

                                    </td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->total_price }}đ</td>
                                    <td>{{ $item->note }}</td>
                                    <td>{{ $item->payment_status }}</td>
                                    <td>{{ $item->delivery_status }}</td>
                                    <td>{{ $item->created_at->format('d/m/Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $listOder->links() }}
                </div>
            </div>
        </div>
    @endsection