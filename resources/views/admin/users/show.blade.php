@extends('layouts.app')

@section('title', $user->name)

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">{{ $user->name }}</h4>
                    </div>
                    <div>
                        @can('user_access')
                            <a href="{{ route('users.index') }}" class="btn btn-primary add-list"></i>Quay lại</a>
                        @endcan
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="table-responsive rounded mb-3">
                    <table class="table mb-0 tbl-server-info">
                        <tbody class="ligth-body">
                            <tr>
                                <th>Mã</th>
                                <th>{{ $user->id }}</th>
                            </tr>
                            <tr>
                                <th>Mã người dùng</th>
                                <th>{{ $user->user_code }}</th>
                            </tr>
                            <tr>
                                <th>Tên quyền truy cập</th>
                                <th>{{ $user->name }}</th>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <th>{{ $user->email }}</th>
                            </tr>
                            <tr>
                                <th>Số Điện thoại</th>
                                <th>{{ $user->phone }}</th>
                            </tr>
                            <tr>
                                <th>Giới tính</th>
                                <th>{{ $user->gender }}</th>
                            </tr>
                            <tr>
                                <th>Địa chỉ</th>
                                <th>{{ $user->address }}</th>
                            </tr>
                            <tr>
                                <th>Vai trò</th>

                                <th>
                                    <span class="text-primary">{{ $user->roles->title }}</span>
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
