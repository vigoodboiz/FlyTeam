@extends('layouts.app')
@section('content')
    <div class="container py-5">
        <h1>Thông tin hồ sơ</h1><br>
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        @if (!empty(auth()->user()->profile_picture))
                            <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}" class="rounded-circle"
                                alt="Profile Picture">
                        @else
                            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="profile_picture">
                                <button type="submit">Upload</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Mã người dùng</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0" scope="row">
                                    #1234{{ Auth::user()->id }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Họ và tên</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ Auth::user()->name }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Email</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ Auth::user()->email }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Số điện thoại</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ Auth::user()->phone }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Địa chỉ</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ Auth::user()->address }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
