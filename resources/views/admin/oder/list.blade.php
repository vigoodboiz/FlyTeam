@extends('layouts.app')

@section('content')
<<<<<<< HEAD
<h1>{{ $title }}</h1><br>
<table class="table">
    
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">USER_ID</th>
            <th scope="col">DATE</th>
            <th scope="col">TOTAL</th>
            <th scope="col">ADDRESS</th>
            <th scope="col">OPPTION</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($listOder as $oder)
        <tr>
            <th scope="row">{{ $oder->id }}</th>
            <td>{{ $oder->user_id }}</td>
            <td>{{ $oder->date }}</td>
            <td>{{ $oder->total }}</td>
            <td>{{ $oder->address }}</td>
            <td>
                @can('order_delete')
                <a onclick="return confirm('Bạn có muốn xóa không?')" href="{{ route('deleteoder', ['id' => $oder->id]) }}" class="btn btn-danger"><i class="fa fa-trash mr-0"></i></a>
                @endcan
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
=======
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
                        <th>Date Order</th>
                    </tr>
                </thead>
                <tbody class="ligth-body">
                    @foreach ($orders as $item)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->user->email }}</td>
                            <td>{{ $item->user->phone }}</td>
                            <td>{{ $item->user->address }}</td>
                            <td>
                                @foreach ($item->product as $products)
                                    <img class="border-radius-5" src="{{ asset('upload/public/images/' . $products->image) }}"
                                        alt="cart-product">
                                @endforeach
                            </td>
                            <td>
                                @foreach ($item->product as $products)
                                    {{ $products->name }}
                                @endforeach
                            </td>
                            <td>
                                @foreach ($item->product as $products)
                                    {{ $products->price }}
                                @endforeach
                            </td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->total_price }}đ</td>
                            <td>{{ $item->payment_status }}</td>
                            <td>{{ $item->created_at->format('d/m/Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
>>>>>>> bb2f3ae3565a3fd6966d858ad5e6e6477a3e985d
@endsection
