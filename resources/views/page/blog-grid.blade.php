@extends('welcome')

@section('content')
<main class="main__content_wrapper">

    <!-- Start breadcrumb section -->
    <div class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content text-center">
                        <h1 class="breadcrumb__content--title mb-25">Bài viết</h1>
                        <ul class="breadcrumb__content--menu d-flex justify-content-center">
                            <li class="breadcrumb__content--menu__items"><a href="index.html">Trang chủ</a></li>
                            <li class="breadcrumb__content--menu__items"><span>Bài viết</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End breadcrumb section -->

    <!-- Start blog section -->
    <section class="blog__section section--padding">
        <div class="container">
            <div class="section__heading text-center  mb-40">
                <h2 class="section__heading--maintitle">Bài viết <span>& Tin tức</span></h2>
            </div>
            <div class="blog__section--inner">
                <div class="row mb--n30">
                    <div class="col-lg-4 col-md-6 col-sm-6 mb-40">
                        <article class="blog__card">
                            <div class="blog__card--thumbnail">
                                <a class="blog__card--thumbnail__link" href="blog-details.html">
                                    <img class="blog__card--thumbnail__img" src="{{asset('becute/assets/img/blog/blog1.webp')}}" alt="blog-img">
                                </a>
                            </div>
                            <div class="blog__card--content">
                                <div class="blog__meta d-flex">
                                    <span class="blog__meta--text meta__date">30 Tháng 3, 2022 </span>
                                    <span class="blog__meta--text"> / </span>
                                    <span class="blog__meta--text meta__comment">(02) Bình luận</span>
                                </div>
                                <h3 class="blog__card--title"><a href="blog-details.html">Mặt nạ có tác dụng gì?</a></h3>
                                <a class="blog__card--link" href="blog-details.html">Đọc thêm</a>
                            </div>
                        </article>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 mb-40">
                        <article class="blog__card">
                            <div class="blog__card--thumbnail">
                                <a class="blog__card--thumbnail__link" href="blog-details.html">
                                    <img class="blog__card--thumbnail__img" src="{{asset('becute/assets/img/blog/blog2.webp')}}" alt="blog-img">
                                </a>
                            </div>
                            <div class="blog__card--content">
                                <div class="blog__meta d-flex">
                                    <span class="blog__meta--text meta__date">30 Tháng 5, 2022 </span>
                                    <span class="blog__meta--text"> / </span>
                                    <span class="blog__meta--text meta__comment">(02) Bình luận</span>
                                </div>
                                <h3 class="blog__card--title"><a href="blog-details.html">Một làn da khỏe sẽ giúp chúng ta tự tin trong giao tiếp</a></h3>
                                <a class="blog__card--link" href="blog-details.html">Đọc thêm</a>
                            </div>
                        </article>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 mb-40">
                        <article class="blog__card">
                            <div class="blog__card--thumbnail">
                                <a class="blog__card--thumbnail__link" href="blog-details.html">
                                    <img class="blog__card--thumbnail__img" src="{{asset('becute/assets/img/blog/blog3.webp')}}" alt="blog-img">
                                </a>
                            </div>
                            <div class="blog__card--content">
                                <div class="blog__meta d-flex">
                                    <span class="blog__meta--text meta__date">21 Tháng 11, 2020 </span>
                                    <span class="blog__meta--text"> / </span>
                                    <span class="blog__meta--text meta__comment">(02) Bình luận</span>
                                </div>
                                <h3 class="blog__card--title"><a href="blog-details.html">Tại sao chúng ta phải chăm sóc bản thân</a></h3>
                                <a class="blog__card--link" href="blog-details.html">Đọc thêm</a>
                            </div>
                        </article>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 mb-40">
                        <article class="blog__card">
                            <div class="blog__card--thumbnail">
                                <a class="blog__card--thumbnail__link" href="blog-details.html">
                                    <img class="blog__card--thumbnail__img" src="{{asset('becute/assets/img/blog/blog1.webp')}}" alt="blog-img">
                                </a>
                            </div>
                            <div class="blog__card--content">
                                <div class="blog__meta d-flex">
                                    <span class="blog__meta--text meta__date">30 March, 2022 </span>
                                    <span class="blog__meta--text"> / </span>
                                    <span class="blog__meta--text meta__comment">(02) Bình luận</span>
                                </div>
                                <h3 class="blog__card--title"><a href="blog-details.html">Mặt nạ có tác dụng gì?</a></h3>
                                <a class="blog__card--link" href="blog-details.html">Đọc thêm</a>
                            </div>
                        </article>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 mb-40">
                        <article class="blog__card">
                            <div class="blog__card--thumbnail">
                                <a class="blog__card--thumbnail__link" href="blog-details.html">
                                    <img class="blog__card--thumbnail__img" src="{{asset('becute/assets/img/blog/blog2.webp')}}" alt="blog-img">
                                </a>
                            </div>
                            <div class="blog__card--content">
                                <div class="blog__meta d-flex">
                                    <span class="blog__meta--text meta__date">30 Tháng 5, 2022 </span>
                                    <span class="blog__meta--text"> / </span>
                                    <span class="blog__meta--text meta__comment">(02) Bình luận</span>
                                </div>
                                <h3 class="blog__card--title"><a href="blog-details.html">Một làn da khỏe sẽ giúp chúng ta tự tin trong giao tiếp</a></h3>
                                <a class="blog__card--link" href="blog-details.html">Đọc thêm</a>
                            </div>
                        </article>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 mb-40">
                        <article class="blog__card">
                            <div class="blog__card--thumbnail">
                                <a class="blog__card--thumbnail__link" href="blog-details.html">
                                    <img class="blog__card--thumbnail__img" src="{{asset('becute/assets/img/blog/blog3.webp')}}" alt="blog-img">
                                </a>
                            </div>
                            <div class="blog__card--content">
                                <div class="blog__meta d-flex">
                                    <span class="blog__meta--text meta__date">21 Tháng 11, 2020 </span>
                                    <span class="blog__meta--text"> / </span>
                                    <span class="blog__meta--text meta__comment">(02) Bình luận</span>
                                </div>
                                <h3 class="blog__card--title"><a href="blog-details.html">Tại sao chúng ta phải chăm sóc bản thân</a></h3>
                                <a class="blog__card--link" href="blog-details.html">Đọc thêm</a>
                            </div>
                        </article>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End blog section -->

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
