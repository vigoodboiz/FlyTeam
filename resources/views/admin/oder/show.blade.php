@extends('layouts.app')

@section('title')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">Chi tiết đơn hàng</h4>
                    </div>
                    <div>
                        <a href="{{ route('listOder') }}" class="btn btn-primary add-list"></i>Quay lại</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="table-responsive rounded mb-3">
                    <table class="table mb-0 tbl-server-info">
                        <tbody class="ligth-body">
                            <tr>
                                <th>Mã</th>
                                <th scope="row">#1234{{ $order->id }}</th>
                            </tr>
                            <tr>
                                <th>Tên khách hàng</th>
                                <th>{{ $order->user->name }}</th>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <th>{{ $order->user->email }}</th>
                            </tr>
                            <tr>
                                <th>Số điện thoại</th>
                                <th>{{ $order->user->phone }}</th>
                            </tr>
                            <tr>
                                <th>Địa chỉ</th>
                                <th>{{ $order->user->address }}</th>
                            </tr>
                            <tr>
                                <th>Tên sản phẩm</th>
                                <th>
                                    {{ $order->product->name }}
                                </th>
                            </tr>
                            <tr>
                                <th>Giá sản phẩm</th>
                                <th>{{ $order->product->price }}</th>
                            </tr>
                            <tr>
                                <th>Số lượng</th>
                                <th>{{ $order->quantity }}</th>
                            </tr>
                            <tr>
                                <th>Tổng tiền</th>
                                <th>{{ $order->total_price }}</th>
                            </tr>
                            <tr>
                                <th>Ghi chú đơn hàng</th>
                                <th>{{ $order->note }}</th>
                            </tr>
                            <tr>
                                <th>Trạng thái đơn hàng</th>
                                <th>{{ $order->payment_status }}</th>
                            </tr>
                            <tr>
                                <th>Trạng thái giao hàng</th>
                                <th>{{ $order->delivery_status }}</th>
                            </tr>
                            <tr>
                                <th>Ngày đặt hàng</th>
                                <th>{{ $order->created_at->format('d/m/Y') }}</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
