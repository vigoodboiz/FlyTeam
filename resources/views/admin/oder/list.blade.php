@extends('layouts.app')

@section('content')
    <div>
        <h2 class="mb-3">Danh sách đơn hàng</h2>
    </div>
    <div class="col-lg-12">
        <div class="table-responsive rounded mb-3">
            <table class="data-table table mb-0 tbl-server-info">
                <thead class="bg-white text-uppercase">
                    <tr>
                        <th>STT</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Status Order</th>
                        <th>Delivery Status</th>
                        <th>Date Order</th>
                    </tr>
                </thead>
                <tbody class="ligth-body">
                    @foreach ($listOder as $item)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->user->email }}</td>
                            <td>{{ $item->user->phone }}</td>
                            <td>{{ $item->user->address }}</td>
                            <td>

                                <img class="border-radius-5"
                                    src="{{ asset('upload/public/images/' . $item->product->image) }}" alt="cart-product">

                            </td>
                            <td>

                                {{ $item->product->name }}

                            </td>
                            <td>

                                {{ $item->product->price }}

                            </td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->total_price }}đ</td>
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
@endsection
