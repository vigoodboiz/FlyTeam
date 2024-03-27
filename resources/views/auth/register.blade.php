@extends('welcome')

@section('content')
    <style>
        .login__section--inner {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
            width: 800px;
            /* Thay đổi kích thước form ở đây */
            max-width: 100%;
            /* Đảm bảo form không vượt quá kích thước của màn hình */
            margin: auto;
            /* Căn giữa form trên màn hình */
        }
    </style>
    <main class="main__content_wrapper">
        <div class="breadcrumb__section breadcrumb__bg">
            <div class="container">
                <div class="row row-cols-1">
                    <div class="col">
                        <div class="breadcrumb__content text-center">
                            <ul class="breadcrumb__content--menu d-flex justify-content-center">
                                <li class="breadcrumb__content--menu__items"><a href="{{ route('home') }}">Trang chủ</a></li>
                                <li class="breadcrumb__content--menu__items"><span>Đăng ký</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="login__section section--padding">
            <div class="container">
                <div class="login-content">
                    <h2 class="account__login--header__title mb-15" style="text-align: center">Đăng ký tài khoản</h2>
                    <br>
                    <div class="login__section--inner">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <!-- User code -->
                            <div class="account__login">
                                <!-- Name -->
                                <div class="account__login--inner">
                                    <x-input-label for="name" :value="__('Họ và tên')" />
                                    <x-text-input id="name" class="account__login--input" type="text" name="name"
                                        :value="old('name')" required autofocus autocomplete="name" />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <!-- Email Address -->
                                <div class="account__login--inner">
                                    <x-input-label for="email" :value="__('Email')" />
                                    <x-text-input id="email" class="account__login--input" type="email" name="email"
                                        :value="old('email')" required autocomplete="username" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <!-- Password -->
                                <div class="account__login--inner">
                                    <x-input-label for="password" :value="__('Mật khẩu')" />

                                    <x-text-input id="password" class="account__login--input" type="password"
                                        name="password" required autocomplete="new-password" />

                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                <!-- Confirm Password -->
                                <div class="mt-4">
                                    <x-input-label for="password_confirmation" :value="__('Xác nhận mật khẩu')" />

                                    <x-text-input id="password_confirmation" class="account__login--input" type="password"
                                        name="password_confirmation" required autocomplete="new-password" />

                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>

                                <!-- Gender -->

                                <!-- Phone -->
                                <div class="account__login--inner">
                                    <x-input-label for="phone" :value="__('Số điện thoại')" />

                                    <x-text-input id="phone" class="account__login--input" type="text" name="phone"
                                        required autocomplete="new-phone" />

                                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                                </div>

                                <!-- Address -->
                                <div class="account__login--inner">
                                    <x-input-label for="address" :value="__('Địa chỉ')" />

                                    <x-text-input id="address" class="account__login--input" type="text" name="address"
                                        required autocomplete="new-address" />

                                    <x-input-error :messages="$errors->get('address')" class="mt-2" />
                                </div>
                                <br>
                                {{-- <x-primary-button class="btn btn-primary btn-flat m-b-30 m-t-30">
                            {{ __('Đăng ký') }}
                        </x-primary-button> --}}
                                <div class="social-login-content">
                                    <div class="social-button">
                                        <button type="submit" class="account__login--btn primary__btn">
                                            Đăng ký</button>
                                    </div>
                                </div>
                                <br>
                                <div class="register-link m-t-15 text-center">
                                    <p class="account__login--signup__text">Bạn đã có tài khoản? <a
                                            href="{{ route('login') }}">
                                            Đăng nhập</a></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
