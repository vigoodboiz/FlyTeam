@extends('layouts.app')

@section('content')
<h1>{{$title}}</h1><br>
<table class="table">
    <form class="d-flex" role="search" action="{{route('searchOder')}}" method="POST">
        @csrf
        <input class="col-3 form-control me-2" type="search" name="searchOder" placeholder="Search" aria-label="Search">
        <button class="btn btn-success mb-5" type="submit">Search</button>
    </form>
    <thead>
        <tr>
            <!-- <th scope="col">STT</th> -->
            <th scope="col">ID</th>
            <th scope="col">USER_ID</th>
            <th scope="col">DATE</th>
            <th scope="col">TOTAL</th>
            <th scope="col">ADDRESS</th>
            <th scope="col">OPPTION</th>
        </tr>
    </thead>
    <tbody>
        @foreach($listOder as $oder)
        <tr>
            
            <th scope="row">{{$oder->id}}</th>
            <td>{{$oder->user_id}}</td>
            <td>{{$oder->date}}</td>
            <td>{{$oder->total}}</td>
            <td>{{$oder->address}}</td>
            <td>
                <a href="{{route('addOder')}}" class="btn btn-success">ADD</a>
                <a href="{{route('editoder',['id'=>$oder->id])}}" class="btn btn-primary">EDIT</a>
                <a onclick="return confirm('Bạn có muốn xóa không?')" href="{{route('deleteoder',['id'=>$oder->id])}}" class="btn btn-danger">DELETE</a>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$listOder->links()}}
@endsection