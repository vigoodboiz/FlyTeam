@extends('layouts.app')

@section('content')
<h1>{{$title}}</h1><br>
 <form action="{{route('editOder_detail' , ['id'=>request()->route('id')])}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">product_id :</label>
        <input name="product_id" type="text" class="form-control" id="formGroupExampleInput" placeholder="product_id" value="{{$oder_detail->product_id}}" readonly>
    </div>
    <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">oder_id :</label>
        <input name="oder_id" type="text" class="form-control" id="formGroupExampleInput" placeholder="oder_id" value="{{$oder_detail->oder_id}}" readonly>
    </div>
    <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">price :</label>
        <input name="price" type="number" class="form-control" id="formGroupExampleInput" placeholder="price" value="{{$oder_detail->price}}">
    </div>
    <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">quantity :</label>
        <input name="quantity" type="number" class="form-control" id="formGroupExampleInput" placeholder="quantity" value="{{$oder_detail->quantity}}">
    </div>
    <br>
    
    <button type="submit" class="btn btn-success">EDIT</button>
    
</form>
@endsection