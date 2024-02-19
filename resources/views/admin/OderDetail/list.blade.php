@extends('layouts.app')

@section('content')
<h1>{{$title}}</h1><br>
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
        @foreach($listOder_detail as $oder)
        <tr>
            <td>{{++$i}}</td>
            <th scope="row">{{$oder->id}}</th>
            <td>{{$oder->product_id}}</td>
            <td>{{$oder->oder_id}}</td>
            <td>{{$oder->price}}</td>
            <td>{{$oder->quantity}}</td>
            <td>
                <a href="{{route('addOder_detail')}}" class="btn btn-success">ADD</a>
                <a href="{{route('editOder_detail',['id'=>$oder->id])}}" class="btn btn-primary">EDIT</a>
                <a onclick="return confirm('bạn có muốn xóa không?')" href="{{route('deleteOder_detail',['id'=>$oder->id])}}" class="btn btn-danger">DELETE</a>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$listOder_detail->links()}}
@endsection