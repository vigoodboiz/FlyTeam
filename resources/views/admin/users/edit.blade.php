@extends('admin.layouts.app')

@section('title', 'Cập nhật mới người dùng')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Cập nhật mới người dùng</h4>
                        </div>
                        <a href="{{ route('users.index') }}" class="float-right btn btn-primary">Quay lại</a>
                    </div>
                    <div class="card-body">
                        <div class="new-user-info">
                            <form method="POST" action="{{ route('users.update', ['user' => $user->id]) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row">
                                    {{-- <div class="form-group col-md-6">
                                        <label for="user_code">Mã người dùng</label>
                                        <input type="text" class="form-control" value="{{ $user->user_code }}"
                                            name="user_code" placeholder="Mã người dùng">
                                        @error('user_code')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div> --}}
                                    <div class="form-group col-md-6">
                                        <label for="name">Họ tên:</label>
                                        <input type="text" class="form-control" value="{{ $user->name }}"
                                            name="name" placeholder="Họ tên">
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    {{-- <div class="form-group col-md-6">
                                        <label for="birthday">Ngày sinh:</label>
                                        <input type="text" class="form-control" value="{{ $user->birthday }}"
                                            name="birthday" placeholder="Ngày sinh">
                                        @error('birthday')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="phone">Số điện thoại:</label>
                                        <input type="number" class="form-control" value="{{ $user->phone }}"
                                            name="phone" placeholder="Số điện thoại">
                                        @error('phone')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div> --}}
                                    <div class="form-group col-md-6">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" value="{{ $user->email }}"
                                            name="email" placeholder="Email">
                                        @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Role">Vai trò:</label>
                                        <select name="roles[]" class="js-select-2 form-control" multiple>
                                            @foreach ($role as $id => $role)
                                                <option value="{{ $id }}"
                                                    {{ in_array($id, old('roles', [])) || (isset($role) && $user->roles->contains($id)) ? 'selected' : '' }}>
                                                    {{ $role }}</option>
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
@push('scripts')
    <script>
        $(document).ready(function() {
            $('.js-select-2').select2();
        });
    </script>
