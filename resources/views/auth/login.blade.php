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
                                <li class="breadcrumb__content--menu__items"><span>Đăng nhập</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="login__section section--padding">
            <div class="container">
                <div class="login-content">
                    <h2 class="account__login--header__title mb-15" style="text-align: center">Đăng nhập</h2>
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
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="account__login">
                                <div class="account__login--inner">
                                    <x-label class="account__login--label" for="email" value="{{ __('Email') }}" />
                                    <x-input class="account__login--input" id="email" type="email" name="email"
                                        :value="old('email')" required autofocus autocomplete="username" />
                                </div>

                                <div class="account__login--inner">
                                    <x-label for="password" value="{{ __('Mật khẩu') }}" />
                                    <x-input id="password" class="account__login--input" type="password" name="password"
                                        required autocomplete="current-password" />
                                </div>
                                <div class="cart__summary--footer">
                                    <ul class="d-flex justify-content-between">
                                        <div class="account__login--remember position__relative">
                                            <label for="remember_me" class="flex items-center">
                                                <x-checkbox id="remember_me" name="remember" />
                                                <span class="ms-2 text-sm text-gray-600">{{ __('Nhớ tài khoản') }}</span>
                                            </label>
                                        </div>
                                        @if (Route::has('password.request'))
                                            <label for="password" class="account__login--forgot">
                                                <a href="{{ route('password.request') }}">
                                                    {{ __('Quên mật khẩu?') }}
                                                </a>
                                            </label>
                                        @endif
                                    </ul>
                                </div>
                                <div class="social-login-content">
                                    <div class="social-button">
                                        <button type="submit" class="account__login--btn primary__btn">
                                            Đăng nhập</button>
                                    </div>
                                </div>
                                <br>
                                <div class="register-link m-t-15 text-center">
                                    <p class="account__login--signup__text">Bạn chưa có tài khoản? <a
                                            href="{{ route('register') }}"> Đăng ký tại đây</a>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
