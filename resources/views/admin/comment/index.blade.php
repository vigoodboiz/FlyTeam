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
                        <th>Id sản phẩm</th>
                        <th>Id khách hàng</th>
                        <th>Nội dung</th>
                        <th>Ngày bình luận</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comments as $cmt)
                        <tr>
                            <td scope="row">{{ $cmt->id }}</td>
                            <td>{{ $cmt->product_id }}</td>
                            <td>{{ $cmt->user_id }}</td>
                            <td>{{ $cmt->content }}</td>
                            <td>{{ $cmt->date }}</td>

                            <td>
                                @can('comment_edit')
                                    <div class="d-flex justify-content-center"><button type="button" class="btn btn-primary ">
                                            <a class="text-white"
                                                href="{{ route('route_comment_update', ['id' => $cmt->id]) }}"><i
                                                    class="fa-solid fa-pen"></i></a>
                                        </button></div>
                                @endcan
                            </td>
                            <td>
                                @can('comment_delete')
                                    <div class="d-flex justify-content-center"><button id="delete-button" type="button"
                                            class="btn btn-danger">
                                            <a class="text-white"
                                                href="{{ route('route_comment_delete', ['id' => $cmt->id]) }}"><i
                                                    class="fa fa-trash mr-0"></i></a>
                                        </button></div>
                                @endcan
                            </td>
                        </tr>
                    @endforeach


                    <!-- More user data can be added here -->
                </tbody>
            </table>
        </div>

    </div>
@endsection
