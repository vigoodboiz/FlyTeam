@extends('layouts.app')

@section('content')
<h1>{{$title}}</h1><br>
 <form action="{{route('addOder')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">user_id :</label>
        <input name="user_id" type="text" class="form-control" id="formGroupExampleInput" placeholder="user_id" required>
    </div>
    <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">date :</label>
        <input name="date" type="date" class="form-control" id="formGroupExampleInput" placeholder="date" required>
    </div><br>
    <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">total :</label>
        <input name="total" type="text" class="form-control" id="formGroupExampleInput" placeholder="total" required>
    </div><br>
    <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">address :</label>
        <input name="address" type="text" class="form-control" id="formGroupExampleInput" placeholder="address" required>
    </div><br>
    <button type="submit" class="btn btn-success">ADD</button>
    <a href="{{route('listOder')}}" class="btn btn-success">LIST</a>
</form>
@endsection