@extends('layouts.app')

@section('content')
<h1>{{$title}}</h1><br>
 <form action="{{route('editOder_status' , ['id'=>request()->route('id')])}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">oder_id :</label>
        <input name="oder_id" type="text" class="form-control" id="formGroupExampleInput" placeholder="oder_id" value="{{$oder_status->oder_id}}" readonly>
    </div>
    <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">status :</label>
        <input name="status" type="text" class="form-control" id="formGroupExampleInput" placeholder="status" value="{{$oder_status->status}}">
    </div><br>
    
    <button type="submit" class="btn btn-success">EDIT</button>
    
</form>
@endsection