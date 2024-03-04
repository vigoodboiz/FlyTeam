@extends('layouts.app')

@section('content')
<h1>{{ $title }}</h1><br>
<table class="table">

    <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">ID</th>
            <th scope="col">PRODUCT_ID</th>
            <th scope="col">ODER_ID</th>
            <th scope="col">PRICE</th>
            <th scope="col">QUANTITY</th>
            <th scope="col">OPPTION</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($listOder_detail as $oder)
        <tr>
            <td>{{ ++$i }}</td>
            <th scope="row">{{ $oder->id }}</th>
            <td>{{ $oder->product_id }}</td>
            <td>{{ $oder->oder_id }}</td>
            <td>{{ $oder->price }}</td>
            <td>{{ $oder->quantity }}</td>
            <td>
                @can('orderDetail_edit')
                <a href="{{ route('editOder_detail', ['id' => $oder->id]) }}" class="btn btn-primary"><i class="fa-solid fa-pen"></i></a>
                @endcan
                @can('orderDetail_delete')
                <a onclick="return confirm('bạn có muốn xóa không?')" href="{{ route('deleteOder_detail', ['id' => $oder->id]) }}" class="btn btn-danger"><i class="fa fa-trash mr-0"></i></a>
                @endcan
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $listOder_detail->links() }}
@endsection