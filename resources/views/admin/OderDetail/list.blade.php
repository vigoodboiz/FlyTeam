@extends('layouts.app')

@section('content')
<h1>{{ $title }}</h1><br>
<table class="table">

    <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">ODER_ID</th>
            <th scope="col">USER</th>
            <th scope="col">PRODUCT NAME</th>
            <th scope="col">PRODUCT PRICE</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach ($listOder_detail as $oder)
        <tr>
            <td>{{ ++$i }}</td>
            <th scope="row">{{ $oder->id }}</th>
            <td>{{ $oder->user->name }}</td>
            <td>{{ $oder->product->price }}</td>
            <td>{{ $oder->product->name }}</td>
            
        </tr>
        @endforeach
    </tbody>
</table>
{{ $listOder_detail->links() }}
@endsection