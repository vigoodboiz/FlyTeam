@extends('welcome')

@section('content')
    <main class="main__content_wrapper">

        <!-- Start breadcrumb section -->
        <div class="breadcrumb__section breadcrumb__bg">
            <div class="container">
                <div class="row row-cols-1">
                    <div class="col">
                        <div class="breadcrumb__content text-center">
                            <h1 class="breadcrumb__content--title">Tài khoản của tôi</h1>
                            <ul class="breadcrumb__content--menu d-flex justify-content-center">
                                <li class="breadcrumb__content--menu__items"><a href="{{ route('home') }}">Trang chủ</a></li>
                                <li class="breadcrumb__content--menu__items"><span>Tài khoản của tôi</span></li>
                            </ul>
                        </div>
                        <!-- End breadcrumb section -->
                        <!-- my account section start -->
                        <section class="my__account--section section--padding">
                            <div class="container">
                                @if (Auth::check())
                                    <div class="my__account--section__inner border-radius-10 d-flex">
                                        <div class="account__left--sidebar">
                                            <h2 class="account__content--title h3 mb-20">Hồ sơ của tôi</h2>
                                            <ul class="account__menu">
                                                @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
                                                    <li class="account__menu--list"><a href="{{ route('dashboard') }}">Trang
                                                            quản trị</a></li>
                                                @elseif(Auth::user()->role_id == 3)
                                                    <li class="account__menu--list"><a
                                                            href="{{ route('portfolioPage') }}">Thông tin</a>
                                                    </li>
                                                    <li class="account__menu--list"><a
                                                            href="{{ route('wishlistPage') }}">Sản phẩm yêu thích</a></li>
                                                    <li class="account__menu--list"><a href="{{ route('history') }}">
                                                            Lịch sử đơn hàng</a></li>
                                                @endif
                                                <li class="account__menu--list"><a
                                                        href="{{ route('logout') }}"onclick="event.preventDefault();
                                                                                                                                                                                                                    document.getElementById('logout-form').submit(); return view('auth.login');"><i></i>Đăng
                                                        xuất</a>
                                                </li>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    class="d-none">
                                                    @csrf
                                                </form>
                                            </ul>
                                        </div>
                                        <div class="account__wrapper">
                                            <h2 class="section__heading--maintitle">Xin chào, {{ Auth::user()->name }}</h2>
                                            <br>
                                        </div>
                                    </div>
                        </section>
                        <!-- my account section end -->

                        <!-- Start feature section -->
                        <section class="feature__section section--padding pt-0">
                            <div class="container">
                                <div class="feature__inner d-flex justify-content-between">
                                    <div class="feature__items d-flex align-items-center">
                                        <div class="feature__icon">


                                            <img src="{{ asset('becute/assets/img/other/feature1.webp') }}" alt="img">
                                        </div>
                                        <div class="feature__content">
                                            <h2 class="feature__content--title h3">Miễn phí vận chuyển</h2>
                                            <p class="feature__content--desc">Miễn phí vận chuyển cho đơn hàng trên
                                                2.000.000đ</p>
                                        </div>
                                    </div>
                                    <div class="feature__items d-flex align-items-center">
                                        <div class="feature__icon ">


                                            <img src="{{ asset('becute/assets/img/other/feature2.webp') }}" alt="img">
                                        </div>
                                        <div class="feature__content">
                                            <h2 class="feature__content--title h3">Hỗ trợ 24/7</h2>
                                            <p class="feature__content--desc">Liên hệ với chúng tôi 24 tiếng</p>
                                        </div>
                                    </div>
                                    <div class="feature__items d-flex align-items-center">
                                        <div class="feature__icon">


                                            <img src="{{ asset('becute/assets/img/other/feature3.webp') }}" alt="img">
                                        </div>
                                        <div class="feature__content">
                                            <h2 class="feature__content--title h3">100% hoàn tiền</h2>
                                            <p class="feature__content--desc">Bạn có 30 ngày để trả hàng</p>
                                        </div>
                                    </div>
                                    <div class="feature__items d-flex align-items-center">
                                        <div class="feature__icon">


                                            <img src="{{ asset('becute/assets/img/other/feature4.webp') }}" alt="img">
                                        </div>
                                        <div class="feature__content">
                                            <h2 class="feature__content--title h3">Thanh toán an toàn</h2>
                                            <p class="feature__content--desc">Chúng tôi đảm bảo thanh toán an toàn</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="breadcrumb__section breadcrumb__bg">
                                <div class="container">
                                    <div class="row row-cols-1">
                                        <div class="col">
                                            <div class="breadcrumb__content text-center">
                                                <p>Xin vui lòng đăng nhập để có thể tiếp tục mua hàng!</p><a
                                                    class="account__menu--list" href="{{ route('login') }}">Đăng nhập</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </section>
                        <!-- End feature section -->


    </main>
@endsection
