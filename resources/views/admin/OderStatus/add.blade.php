@extends('layouts.app')

@section('content')
<h1>{{$title}}</h1><br>
<!-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif -->
 <form action="{{route('addOder_status')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">oder_id :</label>
        <input name="oder_id" type="text" class="form-control" id="formGroupExampleInput" placeholder="oder_id" required>
    </div>
    <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">status :</label>
        <input name="status" type="text" class="form-control" id="formGroupExampleInput" placeholder="status" required>
    </div><br>
    
    <button type="submit" class="btn btn-success">ADD</button>
    <a href="{{route('listOder_status')}}" class="btn btn-success">LIST</a>
</form>
@endsection