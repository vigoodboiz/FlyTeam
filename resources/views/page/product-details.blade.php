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
                            <li class="breadcrumb__content--menu__items"><a href="{{ route('home') }}">Trang chủ</a></li>
                            <li class="breadcrumb__content--menu__items"><span>Chi tiết sản phẩm</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End breadcrumb section -->
    <!-- Start product details section -->
    <section class="product__details--section section--padding">
        <div class="container">
            @foreach ($product_detail as $pro_dt)
            <form action="{{ route('addCart', $pro_dt->id) }}" method="POST">
                @csrf()
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="product__details--media">
                            <div class="single__product--preview bg__gray  swiper mb-18">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="product__media--preview__items">
                                            <a class="product__media--preview__items--link glightbox" data-gallery="product-media-preview" href="{{ asset('upload/public/images/' . $pro_dt->image) }}"><img class="product__media--preview__items--img" src="{{ asset('upload/public/images/' . $pro_dt->image) }}" style="height: 400px;" alt="product-media-img"></a>
                                            <div class="product__media--view__icon">
                                                <a class="product__media--view__icon--link glightbox" href="{{ asset('upload/public/images/' . $pro_dt->image) }}" data-gallery="product-media-preview">
                                                    <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="22.443" viewBox="0 0 512 512">
                                                        <path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"></path>
                                                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path>
                                                    </svg>
                                                    <span class="visually-hidden">product view</span>
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="single__product--nav swiper">
                                        <div class="swiper-wrapper">
                                            @foreach ($galleries as $gallery)
                                            <div class="swiper-slide">
                                                <div class="product__media--nav__items" style="width: 118px; height: 118px">
                                                    <img class="product__media--nav__items--img" src="{{ asset('upload/public/images/' . $gallery->image) }}" alt="product-nav-img">
                                                </div>
                                            </div>
                                            @endforeach
                                            <!-- <div class="swiper-slide">                                                                                                                                                                                                     </div> -->
                                        </div>
                                        <div class="swiper__nav--btn swiper-button-next">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class=" -chevron-right">
                                                <polyline points="9 18 15 12 9 6"></polyline>
                                            </svg>
                                        </div>
                                        <div class="swiper__nav--btn swiper-button-prev">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class=" -chevron-left">
                                                <polyline points="15 18 9 12 15 6"></polyline>
                                            </svg>

                                        </div>
                                    </div>
                                    <!-- <div class="swiper-slide">                                                                                                                                                                                                             </div> -->
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="product__details--info">

                                    <!-- <div class="swiper-slide">                                                                                                                                                                                                     </div> -->
                                </div>
                                <div class="swiper__nav--btn swiper-button-next">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class=" -chevron-right">
                                        <polyline points="9 18 15 12 9 6"></polyline>
                                    </svg>
                                </div>
                                <div class="swiper__nav--btn swiper-button-prev">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class=" -chevron-left">
                                        <polyline points="15 18 9 12 15 6"></polyline>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="product__details--info">
                            <h2 id="variant-name" class="product__details--info__title mb-15">
                                {{ $pro_dt->name }}
                            </h2>
                            <div class="product__details--info__price mb-12">
                                @if (isset($pro_dt->price_sale) && $pro_dt->price_sale > 0)
                                <span id="current-price" class="current__price">{{ number_format($pro_dt->price_sale, 0, ',', '.') }}đ</span>
                                <span id="old-price" class="old__price">{{ number_format($pro_dt->price, 0, ',', '.') }}đ</span>
                                @else
                                <span id="current-price" class="current__price">{{ number_format($pro_dt->price, 0, ',', '.') }}đ</span>
                                @endif
                            </div>
                            <p class="product__details--info__desc mb-15">{{ $pro_dt->describe }}</p>
                            <div class="product__variant">
                                @php
                                $displayedNames = [];
                                @endphp
                                @foreach ($variants as $variant)
                                @php
                                $variantName = $variant->name;
                                $variantValue = $variant->value;

                                @endphp
                                @unless (in_array($variantName, $displayedNames))
                                @php $displayedNames[] = $variantName; @endphp
                                <ul class="variant__size d-flex">
                                    <div class="product__variant--list mb-20">
                                        <fieldset class="variant__input--fieldset">
                                            <legend class="product__variant--title mb-8">
                                                {{ $variantName }}
                                            </legend>
                                            @php
                                            $values = [];
                                            @endphp
                                            @foreach ($variants as $innerVariant)
                                            @if ($innerVariant->name == $variantName)
                                            @php $values[] = $innerVariant->value; @endphp
                                            @endif
                                            @endforeach
                                            <li class="variant__size--list">
                                                @foreach ($variants as $variant)
                                                @if ($variant->name == 'Màu sắc')
                                                <input id="{{ $variant->id }}" name="variantName" value="{{ $variant->value }}" type="radio" data-price="{{ $variant->price }}" data-name="{{ $variant->product_name }}" data-sale-price="{{ $variant->price_sale }}" selected>
                                                <label class="variant__size--value red" style="width: 100px;" for="{{ $variant->id }}">{{ $variant->value }}</label>
                                                @else
                                                <input id="{{ $variant->id }}" name="variantName" value="{{ $variant->value }}" type="radio" data-price="{{ $variant->price }}" data-name="{{ $variant->product_name }}" data-price-sale="{{ $variant->price_sale }}" selected>
                                                <label class="variant__size--value red" style="width: 100px;" for="{{ $variant->id }}">{{ $variant->value }}</label>
                                                @endif
                                                @endforeach
                                            </li>
                                        </fieldset>
                                    </div>
                                </ul>
                                @endunless
                                @endforeach


                            </div>
                            @if ($pro_dt->quantity_product > 0)
                            <div class="product__variant--list quantity d-flex align-items-center mb-20">
                                <div class="quantity__box">
                                    <button type="button" class="quantity__value quickview__value--quantity decrease" aria-label="quantity value" value="Decrease Value">-</button>
                                    <label>
                                        <input name="quantity" type="number" class="quantity__number quickview__value--number" value="1" data-counter />
                                    </label>
                                    <button type="button" class="quantity__value quickview__value--quantity increase" aria-label="quantity value" value="Increase Value">+</button>
                                </div>
                                <button class="primary__btn quickview__cart--btn" type="submit">Thêm giỏ
                                    hàng</button>
                            </div>
                            @if (Auth::check())
                            <div class="product__variant--list mb-20">
                                @if ($pro_dt->favorited)
                                <a class="variant__wishlist--icon mb-15" href="{{ route('favorite', $pro_dt->id) }}" title="Bỏ thích">
                                    <svg class="quickview__variant--wishlist__svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z" fill="red" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
                                    </svg>
                                    Thêm vào sản phẩm yêu thích
                                </a>
                                @else
                                <a class="variant__wishlist--icon mb-15" href="{{ route('favorite', $pro_dt->id) }}" title="Yêu thích">
                                    <svg class="quickview__variant--wishlist__svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
                                    </svg>
                                    Thêm vào sản phẩm yêu thích
                                    @endif
                                    <button class="variant__buy--now__btn primary__btn" type="submit"><a href="{{ route('checkoutPage') }}">Mua
                                            ngay</a>
                                    </button>
                            </div>
                            @endif
                            @elseif($pro_dt->quantity_product <= 0) <span class="fw-bolder text-danger mt-5 mb-5">Xin lỗi , Sản phẩm đã hết . Khách
                                hàng vui lòng lựa chọn sản phẩm khác!</span>
                                @endif
            </form>
        </div>
        <div class="quickview__social d-flex align-items-center mb-20">
            <label class="quickview__social--title">Chia sẻ xã hội:</label>
            <ul class="quickview__social--wrapper mt-0 d-flex">
                <li class="quickview__social--list">
                    <a class="quickview__social--icon" target="_blank" href="https://www.facebook.com/">
                        <svg xmlns="http://www.w3.org/2000/svg" width="7.667" height="16.524" viewBox="0 0 7.667 16.524">
                            <path data-name="Path 237" d="M967.495,353.678h-2.3v8.253h-3.437v-8.253H960.13V350.77h1.624v-1.888a4.087,4.087,0,0,1,.264-1.492,2.9,2.9,0,0,1,1.039-1.379,3.626,3.626,0,0,1,2.153-.6l2.549.019v2.833h-1.851a.732.732,0,0,0-.472.151.8.8,0,0,0-.246.642v1.719H967.8Z" transform="translate(-960.13 -345.407)" fill="currentColor" />
                        </svg>
                        <span class="visually-hidden">Facebook</span>
                    </a>
                </li>
                <li class="quickview__social--list">
                    <a class="quickview__social--icon" target="_blank" href="https://twitter.com/">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16.489" height="13.384" viewBox="0 0 16.489 13.384">
                            <path data-name="Path 303" d="M966.025,1144.2v.433a9.783,9.783,0,0,1-.621,3.388,10.1,10.1,0,0,1-1.845,3.087,9.153,9.153,0,0,1-3.012,2.259,9.825,9.825,0,0,1-4.122.866,9.632,9.632,0,0,1-2.748-.4,9.346,9.346,0,0,1-2.447-1.11q.4.038.809.038a6.723,6.723,0,0,0,2.24-.376,7.022,7.022,0,0,0,1.958-1.054,3.379,3.379,0,0,1-1.958-.687,3.259,3.259,0,0,1-1.186-1.666,3.364,3.364,0,0,0,.621.056,3.488,3.488,0,0,0,.885-.113,3.267,3.267,0,0,1-1.374-.631,3.356,3.356,0,0,1-.969-1.186,3.524,3.524,0,0,1-.367-1.5v-.057a3.172,3.172,0,0,0,1.544.433,3.407,3.407,0,0,1-1.1-1.214,3.308,3.308,0,0,1-.4-1.609,3.362,3.362,0,0,1,.452-1.694,9.652,9.652,0,0,0,6.964,3.538,3.911,3.911,0,0,1-.075-.772,3.293,3.293,0,0,1,.452-1.694,3.409,3.409,0,0,1,1.233-1.233,3.257,3.257,0,0,1,1.685-.461,3.351,3.351,0,0,1,2.466,1.073,6.572,6.572,0,0,0,2.146-.828,3.272,3.272,0,0,1-.574,1.083,3.477,3.477,0,0,1-.913.8,6.869,6.869,0,0,0,1.958-.546A7.074,7.074,0,0,1,966.025,1144.2Z" transform="translate(-951.23 -1140.849)" fill="currentColor" />
                        </svg>
                        <span class="visually-hidden">Twitter</span>
                    </a>
                </li>
                <li class="quickview__social--list">
                    <a class="quickview__social--icon" target="_blank" href="https://www.instagram.com/">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17.497" height="17.492" viewBox="0 0 19.497 19.492">
                            <path data-name="Icon awesome-instagram" d="M9.747,6.24a5,5,0,1,0,5,5A4.99,4.99,0,0,0,9.747,6.24Zm0,8.247A3.249,3.249,0,1,1,13,11.238a3.255,3.255,0,0,1-3.249,3.249Zm6.368-8.451A1.166,1.166,0,1,1,14.949,4.87,1.163,1.163,0,0,1,16.115,6.036Zm3.31,1.183A5.769,5.769,0,0,0,17.85,3.135,5.807,5.807,0,0,0,13.766,1.56c-1.609-.091-6.433-.091-8.042,0A5.8,5.8,0,0,0,1.64,3.13,5.788,5.788,0,0,0,.065,7.215c-.091,1.609-.091,6.433,0,8.042A5.769,5.769,0,0,0,1.64,19.341a5.814,5.814,0,0,0,4.084,1.575c1.609.091,6.433.091,8.042,0a5.769,5.769,0,0,0,4.084-1.575,5.807,5.807,0,0,0,1.575-4.084c.091-1.609.091-6.429,0-8.038Zm-2.079,9.765a3.289,3.289,0,0,1-1.853,1.853c-1.283.509-4.328.391-5.746.391S5.28,19.341,4,18.837a3.289,3.289,0,0,1-1.853-1.853c-.509-1.283-.391-4.328-.391-5.746s-.113-4.467.391-5.746A3.289,3.289,0,0,1,4,3.639c1.283-.509,4.328-.391,5.746-.391s4.467-.113,5.746.391a3.289,3.289,0,0,1,1.853,1.853c.509,1.283.391,4.328.391,5.746S17.855,15.705,17.346,16.984Z" transform="translate(0.004 -1.492)" fill="currentColor"></path>
                        </svg>
                        <span class="visually-hidden">Instagram</span>
                    </a>
                </li>
                <li class="quickview__social--list">
                    <a class="quickview__social--icon" target="_blank" href="https://www.youtube.com/">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16.49" height="11.582" viewBox="0 0 16.49 11.582">
                            <path data-name="Path 321" d="M967.759,1365.592q0,1.377-.019,1.717-.076,1.114-.151,1.622a3.981,3.981,0,0,1-.245.925,1.847,1.847,0,0,1-.453.717,2.171,2.171,0,0,1-1.151.6q-3.585.265-7.641.189-2.377-.038-3.387-.085a11.337,11.337,0,0,1-1.5-.142,2.206,2.206,0,0,1-1.113-.585,2.562,2.562,0,0,1-.528-1.037,3.523,3.523,0,0,1-.141-.585c-.032-.2-.06-.5-.085-.906a38.894,38.894,0,0,1,0-4.867l.113-.925a4.382,4.382,0,0,1,.208-.906,2.069,2.069,0,0,1,.491-.755,2.409,2.409,0,0,1,1.113-.566,19.2,19.2,0,0,1,2.292-.151q1.82-.056,3.953-.056t3.952.066q1.821.067,2.311.142a2.3,2.3,0,0,1,.726.283,1.865,1.865,0,0,1,.557.49,3.425,3.425,0,0,1,.434,1.019,5.72,5.72,0,0,1,.189,1.075q0,.095.057,1C967.752,1364.1,967.759,1364.677,967.759,1365.592Zm-7.6.925q1.49-.754,2.113-1.094l-4.434-2.339v4.66Q958.609,1367.311,960.156,1366.517Z" transform="translate(-951.269 -1359.8)" fill="currentColor" />
                        </svg>
                        <span class="visually-hidden">Youtube</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="guarantee__safe--checkout mb-30">
            <h5 class="guarantee__safe--checkout__title">Đảm bảo kiểm tra an toàn</h5>
            <img class="guarantee__safe--checkout__img" src="{{ asset('becute/assets/img/other/safe-checkout.webp') }}" alt="Payment Image">
        </div>
        <div class="product__details--accordion">
            <div class="product__details--accordion__list">
                <details>
                    <summary class="product__details--summary">
                        <h2 class="product__details--summary__title">Mô tả
                            <svg width="11" height="6" xmlns="http://www.w3.org/2000/svg" class="order-summary-toggle__dropdown" fill="currentColor">
                                <path d="M.504 1.813l4.358 3.845.496.438.496-.438 4.642-4.096L9.504.438 4.862 4.534h.992L1.496.69.504 1.812z">
                                </path>
                            </svg>
                        </h2>
                    </summary>
                    <div class="product__details--summary__wrapper">
                        <div class="product__tab--content">
                            <div class="product__tab--content__step mb-30">
                                <p class="product__tab--content__desc">{{ $pro_dt->describe }}</p>
                            </div>
                        </div>
                    </div>
                </details>
            </div>
            <div class="product__details--accordion__list">
                <details>
                    <summary class="product__details--summary">
                        <h2 class="product__details--summary__title">Đánh giá sản phẩm
                            <svg width="11" height="6" xmlns="http://www.w3.org/2000/svg" class="order-summary-toggle__dropdown" fill="currentColor">
                                <path d="M.504 1.813l4.358 3.845.496.438.496-.438 4.642-4.096L9.504.438 4.862 4.534h.992L1.496.69.504 1.812z">
                                </path>
                            </svg>
                        </h2>
                    </summary>
                    <div class="product__details--summary__wrapper">
                        <div class="product__reviews">
                            <div class="product__reviews--header">
                                <h2 class="product__reviews--header__title h3 mb-20">Khách hàng đánh giá</h2>
                                <div class="reviews__ratting d-flex align-items-center">
                                    <span class="reviews__summary--caption">Based on {{ $comments->count() }}
                                        reviews</span>
                                </div>
                                <a class="actions__newreviews--btn primary__btn" href="#writereview">Viết một đánh
                                    giá</a>
                            </div>
                            @if (Auth::check())
                            @foreach ($comments as $cmt)
                            <div class="reviews__comment--area">
                                <div class="reviews__comment--list d-flex">
                                    <div class="reviews__comment--thumb">
                                        <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}" class="img-fluid rounded-circle rounded-circle-custom" alt="comment-thumb" width="60px" style=" border-radius: 50%">
                                    </div>
                                    <div class="reviews__comment--content">
                                        <input type="hidden" value="{{ $cmt->id }}">
                                        <div class="reviews__comment--top d-flex justify-content-between">
                                            <div class="reviews__comment--top__left">
                                                <h3 class="reviews__comment--content__title h4">
                                                    {{ $cmt->user_name }}
                                                </h3>
                                            </div>
                                            <span class="reviews__comment--content__date">{{ $cmt->date }}</span>
                                        </div>
                                        <div class="row">
                                            <p class="reviews__comment--content__desc col-md-10">
                                                {{ $cmt->content }}
                                            </p>
                                            <button class="btn btn-danger col-md-1"><a href="{{ route('route_comment_delete_fe', ['id' => $cmt->id]) }}">Xóa</a></button>
                                        </div>
                                    </div>
                                </div>
                                <span class="reviews__comment--content__date">{{ $cmt->date }}</span>
                            </div>
                            @endforeach
                            <div id="writereview" class="reviews__comment--reply__area">
                                <h3 class="reviews__comment--reply__title mb-15">Thêm đánh giá </h3>
                                <div id="writereview" class="reviews__comment--reply__area">
                                    <form action="{{ route('route_new_comment') }}" method="POST">
                                        @csrf
                                        @foreach ($product_detail as $pro_dt)
                                        <input type="hidden" name="product_id" value="{{ $pro_dt->id }}">
                                        @endforeach
                                        <textarea class="reviews__comment--reply__textarea" name="content" placeholder="Your comment"></textarea>
                                        <input type="hidden" class="form-control" name="date" value="{{ $currentDateTime->format('d-m-Y H:i') }}">
                                        <button class="primary__btn text-white" type="submit">Submit</button>
                                    </form>
                                    @else
                                    <p>Bạn cần <a class="fw-bold" href="{{ route('login') }}">Đăng Nhập</a>
                                        để
                                        bình luận.</p>
                                    @endif
                                    @if (session('success'))
                                    <p style="color: green">{{ session('success') }}</p>
                                    @endif

                                    @if (session('error'))
                                    <p style="color: red">{{ session('error') }}</p>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </details>
            </div>
        </div>
        </div>
        </div>
        </div>
        @endforeach
        </div>
    </section>
    <!-- End product details section -->

    <!-- Start product section -->
    <section class="product__section section--padding pt-0">
        <div class="container">
            <div class="section__heading text-center mb-40">
                <h2 class="section__heading--maintitle">Bạn cũng có thể thích</h2>
            </div>
            <div class="product__section--inner product__swiper--column4 padding swiper">
                <div class="swiper-wrapper">
                    @foreach ($product_same as $pro_same)
                    <div class="swiper-slide">
                        <article class="product__card">
                            <div class="product__card--thumbnail">
                                <a class="product__card--thumbnail__link display-block" >
                                    <div class="product__card--thumbnail__container">
                                        <img class="product__card--thumbnail__img @if ($pro_same->quantity_product <= 0) out-of-stock @endif" src="{{ asset('upload/public/images/' . $pro_same->image) }}" style="height: 200px;" alt="product-img">
                                        @if ($pro_same->quantity_product <= 0) <h3>
                                            <p class="display-7 product__card--thumbnail__text">ĐÃ HẾT HÀNG</p>
                                            </h3>
                                            @endif
                                    </div>
                                </a>

                                <ul class="product__card--action">
                                    <li class="product__card--action__list">
                                        <a class="product__card--action__btn" title="Quick View" data-bs-toggle="modal" data-bs-target="#examplemodal" href="javascript:void(0)">
                                            <svg class="product__card--action__btn--svg" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M15.6952 14.4991L11.7663 10.5588C12.7765 9.4008 13.33 7.94381 13.33 6.42703C13.33 2.88322 10.34 0 6.66499 0C2.98997 0 0 2.88322 0 6.42703C0 9.97085 2.98997 12.8541 6.66499 12.8541C8.04464 12.8541 9.35938 12.4528 10.4834 11.6911L14.4422 15.6613C14.6076 15.827 14.8302 15.9184 15.0687 15.9184C15.2944 15.9184 15.5086 15.8354 15.6711 15.6845C16.0166 15.364 16.0276 14.8325 15.6952 14.4991ZM6.66499 1.67662C9.38141 1.67662 11.5913 3.8076 11.5913 6.42703C11.5913 9.04647 9.38141 11.1775 6.66499 11.1775C3.94857 11.1775 1.73869 9.04647 1.73869 6.42703C1.73869 3.8076 3.94857 1.67662 6.66499 1.67662Z" fill="currentColor"></path>
                                            </svg>
                                            <span class="visually-hidden">Quick View</span>
                                        </a>
                                    </li>
                                    <li class="product__card--action__list">
                                        <a class="product__card--action__btn" title="Compare" href="compare.html">
                                            <svg class="product__card--action__btn--svg" width="17" height="17" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6.89137 6.09375C6.89137 6.47656 7.16481 6.75 7.54762 6.75H10.1453C10.7195 6.75 11.0203 6.06641 10.5828 5.65625L9.8445 4.89062L12.907 1.82812C13.0437 1.69141 13.0437 1.47266 12.907 1.36328L12.2781 0.734375C12.1687 0.597656 11.95 0.597656 11.8132 0.734375L8.75075 3.79688L7.98512 3.05859C7.57496 2.62109 6.89137 2.92188 6.89137 3.49609V6.09375ZM1.94215 12.793L5.00465 9.73047L5.77028 10.4688C6.18043 10.9062 6.89137 10.6055 6.89137 10.0312V7.40625C6.89137 7.05078 6.59059 6.75 6.23512 6.75H3.61012C3.0359 6.75 2.73512 7.46094 3.17262 7.87109L3.9109 8.63672L0.848402 11.6992C0.711683 11.8359 0.711683 12.0547 0.848402 12.1641L1.47731 12.793C1.58668 12.9297 1.80543 12.9297 1.94215 12.793Z" fill="currentColor" />
                                            </svg>
                                            <span class="visually-hidden">Compare</span>
                                        </a>
                                    </li>
                                    @if (Auth::check())
                                    <li class="product__card--action__list">
                                        @if ($pro_same->favorited)
                                        <a class="product__card--action__btn" title="Bỏ thích" href="{{ route('favorite', $pro_same->id) }}">
                                            <svg class="product__card--action__btn--svg" width="18" height="18" color="#FF0000" viewBox="0 0 16 13" fill="red" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.5379 1.52734C11.9519 0.1875 9.51832 0.378906 8.01442 1.9375C6.48317 0.378906 4.04957 0.1875 2.46364 1.52734C0.412855 3.25 0.713636 6.06641 2.1902 7.57031L6.97536 12.4648C7.24879 12.7383 7.60426 12.9023 8.01442 12.9023C8.39723 12.9023 8.7527 12.7383 9.02614 12.4648L13.8386 7.57031C15.2879 6.06641 15.5886 3.25 13.5379 1.52734ZM12.8816 6.64062L8.09645 11.5352C8.04176 11.5898 7.98707 11.5898 7.90504 11.5352L3.11989 6.64062C2.10817 5.62891 1.91676 3.71484 3.31129 2.53906C4.3777 1.63672 6.01832 1.77344 7.05739 2.8125L8.01442 3.79688L8.97145 2.8125C9.98317 1.77344 11.6238 1.63672 12.6902 2.51172C14.0847 3.71484 13.8933 5.62891 12.8816 6.64062Z" fill="red" />
                                            </svg>
                                            <span class="visually-hidden">Wishlist</span>
                                            @else
                                            <a class="product__card--action__btn" title="Yêu thích" href="{{ route('favorite', $pro_same->id) }}">
                                                <svg class="product__card--action__btn--svg" width="18" height="18" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M13.5379 1.52734C11.9519 0.1875 9.51832 0.378906 8.01442 1.9375C6.48317 0.378906 4.04957 0.1875 2.46364 1.52734C0.412855 3.25 0.713636 6.06641 2.1902 7.57031L6.97536 12.4648C7.24879 12.7383 7.60426 12.9023 8.01442 12.9023C8.39723 12.9023 8.7527 12.7383 9.02614 12.4648L13.8386 7.57031C15.2879 6.06641 15.5886 3.25 13.5379 1.52734ZM12.8816 6.64062L8.09645 11.5352C8.04176 11.5898 7.98707 11.5898 7.90504 11.5352L3.11989 6.64062C2.10817 5.62891 1.91676 3.71484 3.31129 2.53906C4.3777 1.63672 6.01832 1.77344 7.05739 2.8125L8.01442 3.79688L8.97145 2.8125C9.98317 1.77344 11.6238 1.63672 12.6902 2.51172C14.0847 3.71484 13.8933 5.62891 12.8816 6.64062Z" fill="pink" />
                                                </svg>

                                                <span class="visually-hidden">Wishlist</span>
                                                @endif
                                            </a>
                                    </li>
                                    @endif
                                </ul>
                                <div class="product__add--to__card">
                                    <a class="product__card--btn" title="Add To Card" href="{{ route('shopDetails', $pro_same->id) }}">Xem chi tiết
                                        <svg width="17" height="15" viewBox="0 0 14 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13.2371 4H11.5261L8.5027 0.460938C8.29176 0.226562 7.9402 0.203125 7.70582 0.390625C7.47145 0.601562 7.44801 0.953125 7.63551 1.1875L10.0496 4H3.46364L5.8777 1.1875C6.0652 0.953125 6.04176 0.601562 5.80739 0.390625C5.57301 0.203125 5.22145 0.226562 5.01051 0.460938L1.98707 4H0.299574C0.135511 4 0.0183239 4.14062 0.0183239 4.28125V4.84375C0.0183239 5.00781 0.135511 5.125 0.299574 5.125H0.721449L1.3777 9.78906C1.44801 10.3516 1.91676 10.75 2.47926 10.75H11.0339C11.5964 10.75 12.0652 10.3516 12.1355 9.78906L12.7918 5.125H13.2371C13.3777 5.125 13.5183 5.00781 13.5183 4.84375V4.28125C13.5183 4.14062 13.3777 4 13.2371 4ZM11.0339 9.625H2.47926L1.86989 5.125H11.6433L11.0339 9.625ZM7.33082 6.4375C7.33082 6.13281 7.07301 5.875 6.76832 5.875C6.4402 5.875 6.20582 6.13281 6.20582 6.4375V8.3125C6.20582 8.64062 6.4402 8.875 6.76832 8.875C7.07301 8.875 7.33082 8.64062 7.33082 8.3125V6.4375ZM9.95582 6.4375C9.95582 6.13281 9.69801 5.875 9.39332 5.875C9.0652 5.875 8.83082 6.13281 8.83082 6.4375V8.3125C8.83082 8.64062 9.0652 8.875 9.39332 8.875C9.69801 8.875 9.95582 8.64062 9.95582 8.3125V6.4375ZM4.70582 6.4375C4.70582 6.13281 4.44801 5.875 4.14332 5.875C3.8152 5.875 3.58082 6.13281 3.58082 6.4375V8.3125C3.58082 8.64062 3.8152 8.875 4.14332 8.875C4.44801 8.875 4.70582 8.64062 4.70582 8.3125V6.4375Z" fill="currentColor" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <div class="product__card--content text-center">
                                <h3 class="product__card--title text-truncate"><a >{{ $pro_same->name }}</a></h3>
                                <div class="product__card--price">
                                    @if (isset($pro_same->price_sale) && $pro_same->price_sale > 0)
                                    <span class="current__price">{{ $pro_same->price_sale }}đ</span>
                                    <span class="old__price">{{ $pro_same->price }}đ</span>
                                    @else
                                    <span class="current__price">{{ $pro_same->price }}đ</span>
                                    @endif
                                </div>
                            </div>
                        </article>
                    </div>
                    @endforeach

                </div>
                <div class="swiper__nav--btn swiper-button-next">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class=" -chevron-right">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </div>
                <div class="swiper__nav--btn swiper-button-prev">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class=" -chevron-left">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>
                </div>
            </div>
        </div>
    </section>
    <!-- End product section -->

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
                        <p class="feature__content--desc">Miễn phí vận chuyển cho đơn hàng trên 2.000.000đ</p>

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
    </section>
    <!-- End feature section -->
</main>
@endsection

@section('variant_price')
<script>
    document.querySelectorAll('input[name="variantName"]').forEach(function(input) {
        input.addEventListener('change', function() {
            var variantPrice = this.getAttribute('data-price');
            var variantSalePrice = this.getAttribute('data-sale-price');
            var variantName = this.getAttribute('data-name');

            // Cập nhật giá và tên theo biến thể đã chọn
            document.getElementById('current-price').innerText = formatPrice(variantSalePrice ||
                variantPrice);
            document.getElementById('variant-name').innerText = variantName;

            // Xử lý logic nếu có giá cũ biến thể
            var oldPriceElement = document.getElementById('old-price');
            if (oldPriceElement) {
                var oldPrice = calculateOldPrice(variantSalePrice || variantPrice);
                oldPriceElement.innerText = formatPrice(oldPrice);
            }
        });
    });

    function formatPrice(price) {
        return Intl.NumberFormat('vi-VN').format(price) + 'đ';
    }

    function calculateOldPrice(currentPrice) {
        // Xử lý logic để tính toán giá cũ biến thể
        // Nếu không có giá cũ, trả về 0 hoặc xử lý theo yêu cầu của bạn
        return currentPrice * 1.2; // Ví dụ: giá cũ = giá hiện tại * 1.2
    }
    // document.querySelectorAll('input[name="variant"]').forEach(function(input) {
    //     input.addEventListener('change', function() {
    //         var variantName = this.getAttribute('data-name');

    //         // Cập nhật tên biến thể đã chọn
    //         document.getElementById('variant-name').innerText = variantName;
    //     });
    // });
</script>
@endsection