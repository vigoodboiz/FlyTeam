@extends('layouts.app')

@section('content')
<h1>{{$title}}</h1><br>
 <table class="table">
    
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">ODER_ID</th>
            <th scope="col">STATUS</th>
            <th scope="col">OPPTION</th>
        </tr>
    </thead>
    <tbody>
        @foreach($listDelivery_status as $oder)
        <tr>
            <th scope="row">{{$oder->id}}</th>
            <td>{{$oder->oder_id}}</td>
            <td>{{$oder->status}}</td>
            <td>
                    <a href="{{route('addDelivery_status')}}" class="btn btn-success">ADD</a>
                    <a href="{{route('editDelivery_status',['id'=>$oder->id])}}" class="btn btn-primary">EDIT</a>
                    <a onclick="return confirm('bạn có muốn xóa không?')" href="{{route('deleteDelivery_status',['id'=>$oder->id])}}" class="btn btn-danger">DELETE</a>

                </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection