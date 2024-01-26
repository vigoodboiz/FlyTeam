@extends('templates.layout')
@section('content')

    <h1>Welcome to the Admin Page!</h1>
    <div class="row">
        <div class="col-lg-12">
            <h2>Comment Management</h2>
            <button type="button" class="btn btn-warning"><a href="{{ url('/comment/add') }}">Thêm mới</a></button>
            <br><br>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Product ID</th>
                    <th>User ID</th>
                    <th>Content</th>
                    <th>Date</th>
                </tr>
                </thead>
                <tbody>
                @foreach($comments as $cmt)
                    <tr>
                        <td>{{$cmt->id}}</td>
                        <td>{{$cmt->product_id}}</td>
                        <td>{{$cmt->user_id}}</td>
                        <td>{{$cmt->content}}</td>
                        <td>{{$cmt->date}}</td>

                        <td><button type="button" class="btn btn-primary ">
                                <a class="text-white" href="{{ route('route_comment_update',['id'=>$cmt->id]) }}">Sửa</a>
                            </button></td>
                        <td><button type="button" class="btn btn-danger">
                                <a class="text-white" href="{{ route('route_comment_delete',['id'=>$cmt->id]) }}">Xóa</a>
                            </button></td>
                    </tr>
                @endforeach


                <!-- More user data can be added here -->
                </tbody>
            </table>
        </div>

    </div>
@endsection
