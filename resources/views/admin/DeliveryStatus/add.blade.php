@extends('layouts.app')

@section('content')
<h1>{{$title}}</h1><br>
 <form action="{{route('addDelivery_status')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">oder_id :</label>
        <input name="oder_id" type="text" class="form-control" id="formGroupExampleInput" placeholder="oder_id">
    </div>
    <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">status :</label>
        <input name="status" type="text" class="form-control" id="formGroupExampleInput" placeholder="status">
    </div><br>
    
    <button type="submit" class="btn btn-success">ADD</button>
    <a href="{{route('listDelivery_status')}}" class="btn btn-success">LIST</a>
</form>
@endsection