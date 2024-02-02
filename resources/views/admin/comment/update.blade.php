@extends('admin.layouts.app')
@section('content')
    <div class="col-md-9 mx-auto">
    <form action="{{ route('route_comment_update',['id'=>$comment->id]) }}" method="POST">
        @csrf
        <input type="hidden" name="user_id" value="{{ $comment->user_id }}">
        <input type="hidden" name="product_id" value="{{ $comment->product_id }}">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Comment content</label>
            <input type="text" class="form-control" name="content" value="{{ $comment->content}}">
            <p class="text-danger">{{ $errors->first('content') }}</p>
        </div>
        <input type="hidden" class="form-control" name="date"  value="{{ $comment->date }}">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
@endsection
