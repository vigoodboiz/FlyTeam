@extends('layouts.app')

@section('content')
<h1>{{$title}}</h1><br>
 <form action="{{route('addOder_detail')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">product_id :</label>
        <input name="product_id" type="text" class="form-control" id="formGroupExampleInput" placeholder="product_id" required>
    </div>
    <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">oder_id :</label>
        <input name="oder_id" type="text" class="form-control" id="formGroupExampleInput" placeholder="oder_id" required>
    </div>
    <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">price :</label>
        <input name="price" type="number" class="form-control" id="formGroupExampleInput" placeholder="price" required>
    </div>
    <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">quantity :</label>
        <input name="quantity" type="number" class="form-control" id="formGroupExampleInput" placeholder="quantity" required>
    </div>
    <br>
    
    <button type="submit" class="btn btn-success">ADD</button>
    <a href="{{route('listOder_detail')}}" class="btn btn-success">LIST</a>
</form>
@endsection