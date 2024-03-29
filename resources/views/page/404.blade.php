@extends('welcome')

@section('content')
<main class="main__content_wrapper">

    <!-- Start breadcrumb section -->
    <div class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content text-center">
                        <ul class="breadcrumb__content--menu d-flex justify-content-center">

                            <li class="breadcrumb__content--menu__items"><a href="{route('home')}}">Home</a></li>
                            <li class="breadcrumb__content--menu__items"><span>Error 404</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End breadcrumb section -->

    <!-- Start error section -->
    <section class="error__section section--padding">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="error__content text-center">

                        <img class="error__content--img display-block mb-50" src="{{asset('becute/assets/img/other/404-thumb.webp')}}" alt="error-img">
                        <h2 class="error__content--title">Opps ! We,ar Not Found This Page </h2>
                        <p class="error__content--desc">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Excepturi animi aliquid minima assumenda.</p>
                        <a class="error__content--btn primary__btn" href="{{route('home')}}">Back To Home</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End error section -->

    <!-- Start feature section -->
    <section class="feature__section section--padding pt-0">
        <div class="container">
            <div class="feature__inner d-flex justify-content-between">
                <div class="feature__items d-flex align-items-center">
                    <div class="feature__icon">

                        <img src="{{asset('becute/assets/img/other/feature1.webp')}}" alt="img">
                    </div>
                    <div class="feature__content">
                        <h2 class="feature__content--title h3">Miễn phí vận chuyển</h2>
                        <p class="feature__content--desc">Miễn phí vận chuyển cho đơn hàng trên 2.000.000đ</p>
                    </div>
                </div>
                <div class="feature__items d-flex align-items-center">
                    <div class="feature__icon ">

                        <img src="{{asset('becute/assets/img/other/feature2.webp')}}" alt="img">
                    </div>
                    <div class="feature__content">
                        <h2 class="feature__content--title h3">Hỗ trợ 24/7</h2>
                        <p class="feature__content--desc">Liên hệ với chúng tôi 24 tiếng</p>
                    </div>
                </div>
                <div class="feature__items d-flex align-items-center">
                    <div class="feature__icon">

                        <img src="{{asset('becute/assets/img/other/feature3.webp')}}" alt="img">
                    </div>
                    <div class="feature__content">
                        <h2 class="feature__content--title h3">100% hoàn tiền</h2>
                        <p class="feature__content--desc">Bạn có 30 ngày để trả hàng</p>
                    </div>
                </div>
                <div class="feature__items d-flex align-items-center">
                    <div class="feature__icon">

                        <img src="{{asset('becute/assets/img/other/feature4.webp')}}" alt="img">
                    </div>
                    <div class="feature__content">
                        <h2 class="feature__content--title h3">Thanh toán an toàn</h2>
                        <p class="feature__content--desc">Chúng tôi đảm bảo thanh toán an toàn</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End feature section -->

</main>
@endsection
