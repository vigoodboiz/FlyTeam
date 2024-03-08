@extends('layouts.app')

@section('content')
<h1>{{ $title }}</h1><br>
<table class="table">

    <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">USER</th>
            <th scope="col">EMAIL</th>
            <th scope="col">ADDRESS</th>
            <th scope="col">PRODUCT NAME</th>
            <th scope="col">PRODUCT IMAGE</th>
            <th scope="col">QUANTITY</th>
            <th scope="col">TOTAL</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($listOder_detail as $oder)
        <tr>
            <td>{{ ++$i }}</td>
            <th scope="row">{{ $oder->user->name }}</th>
            <td>{{ $oder->user->email }}</td>
            <td>{{ $oder->user->address }}</td>
            <td class="text-truncate">{{ $oder->product->name }}</td>
            <td>
                <img class="border-radius-5" width="100" src="{{ asset('upload/public/images/' . $oder->product->image) }}" alt="cart-product">
            </td>
            <td>{{ $oder->quantity }}</td>
            <td>{{ $oder->total_price }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $listOder_detail->links() }}
@endsection