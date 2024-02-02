@extends('layouts.app')

@section('content')
<h1>{{$title}}</h1><br>
 <form action="{{route('editoder', ['id'=>request()->route('id')])}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">user_id :</label>
        <input name="user_id" type="text" class="form-control" id="formGroupExampleInput" placeholder="user_id" value="{{$oder->user_id}}" readonly>
    </div>
    <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">date :</label>
        <input name="date" type="date" class="form-control" id="formGroupExampleInput" placeholder="date" value="{{$oder->date}}">
    </div><br>
    <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">total :</label>
        <input name="total" type="text" class="form-control" id="formGroupExampleInput" placeholder="total" value="{{$oder->total}}">
    </div><br>
    <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">address :</label>
        <input name="address" type="text" class="form-control" id="formGroupExampleInput" placeholder="address" value="{{$oder->address}}">
    </div><br>
    <button type="submit" class="btn btn-success">EDIT</button>
    
</form>
@endsection