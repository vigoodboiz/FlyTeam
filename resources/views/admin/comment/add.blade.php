@extends('layouts.app')
@section('content')
    <div class="col-md-9 mx-auto">
    <form action="{{ route('route_comment_add') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Comment content</label>
            <input type="text" class="form-control" name="content" aria-describedby="emailHelp">
            <p class="text-danger">{{ $errors->first('content') }}</p>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Date</label>
            <input type="text" class="form-control" name="date"  value="{{ $currentDateTime->format('Y-m-d H:i:s') }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
@endsection
