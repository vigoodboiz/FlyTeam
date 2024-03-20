@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">Danh sách bình luận</h4>
                    </div>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Stt</th>
                        <th>Tên sản phẩm</th>
                        <th>Tên khách hàng</th>
                        <th>Nội dung</th>
                        <th>Ngày bình luận</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comments as $cmt)
                        <tr>
                            <td scope="row">{{ $cmt->id }}</td>
                            <td>{{ $cmt->product_name }}</td>
                            <td>{{ $cmt->user_name }}</td>
                            <td>{{ $cmt->content }}</td>
                            <td>{{ $cmt->date }}</td>

                            
                        </tr>
                    @endforeach


                    <!-- More user data can be added here -->
                </tbody>
            </table>
        </div>

    </div>
@endsection
