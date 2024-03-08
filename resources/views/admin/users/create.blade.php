@extends('layouts.app')

@section('title', 'Thêm mới người dùng')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Thêm mới người dùng</h4>
                        </div>
                        <a href="{{ route('users.index') }}" class="float-right btn btn-primary">Quay lại</a>
                    </div>
                    <div class="card-body">
                        <div class="new-user-info">
                            <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Mã người dùng:</label>
                                        <input type="text" class="form-control" name="user_code"
                                            placeholder="Mã người dùng">
                                        @error('user_code')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="name">Họ tên:</label>
                                        <input type="text" class="form-control" name="name" placeholder="Họ tên">
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" name="email" placeholder="Email">
                                        @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="phone">Số điện thoại:</label>
                                        <input type="number" class="form-control" name="phone"
                                            placeholder="Số điện thoại">
                                        @error('phone')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="pass">Mật khẩu:</label>
                                        <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
                                        @error('password')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <select name="" id="" class="form-control">
                                            <option value="">Select one:</option>
                                            <option value="1">Male</option>
                                            <option value="0">Female</option>
                                        </select>
                                        @error('gender')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="rpass">Xác nhận Mật khẩu:</label>
                                        <input type="password" class="form-control" id="repeatpassword"
                                            placeholder="Xác nhận Mật khẩu ">
                                        @error('repeatpassword')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="address">Địa chỉ:</label>
                                        <input type="text" class="form-control" name="address" placeholder="Địa chỉ">
                                        @error('address')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Role">Vai trò:</label>
                                        <select name="role_id" class="js-select-2 form-control" multiple>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Lưu lại</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
