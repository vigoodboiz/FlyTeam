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
                                <li class="breadcrumb__content--menu__items"><span>Giỏ hàng</span></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- cart section start -->
                <section class="cart__section section--padding">
                    <div class="container-fluid">
                        <div class="cart__section--inner">

                            <h2 class="cart__title mb-35">Giỏ hàng</h2>

                            <div class="row">
                                <div class="col">
                                    <div class="cart__table">
                                        <table class="cart__table--inner">
                                            <thead class="cart__table--header">
                                                <tr class="cart__table--header__items">
                                                    <th class="cart__table--header__list">Ảnh</th>
                                                    <th class="cart__table--header__list">Tên sản phẩm</th>
                                                    <th class="cart__table--header__list">Giá</th>
                                                    <th class="cart__table--header__list">Giá sale</th>
                                                    <th class="cart__table--header__list">Loại</th>
                                                    <th class="cart__table--header__list">Số lượng</th>
                                                    <th class="cart__table--header__list">Tổng tiền</th>
                                                    <th class="cart__table--header__list">Hành động</th>
                                                </tr>
                                            </thead>

                                            <tbody class="cart__table--body">
                                                <form action="{{ route('cart.update') }}">
                                                    @csrf
                                                    @foreach ($cartItems as $cart)
                                                        @method('PUT')
                                                        <tr class="cart__table">
                                                            <th><img style="height: 80px" ;
                                                                    src="{{ asset('upload/public/images/' . $cart->product->image) }}">
                                                            </th>
                                                            {{-- @if (!empty($cart->product->variant)) --}}
                                                            <th class="text-truncate">{{ $cart->product->name }}</th>
                                                            <th>{{ number_format($cart->product->price, 0, ',', '.') }}đ
                                                            </th>
                                                            <th>{{ number_format($cart->product->price_sale, 0, ',', '.') }}đ
                                                            </th>
                                                            {{-- @else
                                                                <th class="text-truncate">
                                                                    {{ $cart->variant->product_name }}
                                                                </th>
                                                                <th>{{ number_format($cart->variant->price, 0, ',', '.') }}đ
                                                                </th>
                                                                <th>{{ number_format($cart->variant->price_sale, 0, ',', '.') }}đ
                                                                </th>
                                                            @endif --}}
                                                            <th>{{ $cart->variants }}</th>
                                                            <th>
                                                                <div class="quantity__box">
                                                                    <button type="button"
                                                                        class="quantity__value quickview__value--quantity decrease"
                                                                        aria-label="quantity value"
                                                                        value="Decrease Value">-</button>
                                                                    <label>
                                                                        <input name="quantity_{{ $cart->id }}"
                                                                            type="number"
                                                                            class="quantity__number quickview__value--number"
                                                                            value="{{ $cart->quantity }}" data-counter />
                                                                    </label>
                                                                    <button type="button"
                                                                        class="quantity__value quickview__value--quantity increase"
                                                                        aria-label="quantity value"
                                                                        value="Increase Value">+</button>
                                                                </div>
                                                            </th>
                                                            <th>{{ number_format($cart->total_price, 0, ',', '.') }} đ
                                                            </th>
                                                            <td class="product-close">
                                                                <a href="{{ route('cart.delete', ['cart' => $cart->id]) }}"
                                                                    class="btn product-remove" title="Remove this product">
                                                                    <i
                                                                        class="bi bi-x-circle-fill text-danger display-5"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                            </tbody>
                                        </table>
                                        <div class="continue__shopping d-flex justify-content-between">
                                            <a class="continue__shopping--link" href="{{ route('shopGrid') }}">Tiếp tục mua
                                                sắm</a>
                                            <button type="submit" class="coupon__code--field__btn primary__btn">Xóa giỏ
                                                hàng</button>
                                            <button class="cart__summary--footer__btn primary__btn cart" type="submit">Cập
                                                nhật giỏ hàng</button>
                                            </form>
                                            <a class="cart__summary--footer__btn primary__btn checkout"
                                                href="{{ route('checkoutPage') }}">Thanh toán ngay</a>
                                            <p class="cart__summary--total__list mt-3">
                                                <span class="continue__shopping--link" style="margin-right: 30px;">TỔNG GIỎ
                                                    HÀNG</span>
                                                <span class="fw-bolder display-6">
                                                    {{ number_format($totalPrice, 0, ',', '.') }} VNĐ</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
            </div>
            </section>
            <!-- cart section end -->

            <!-- Start product section -->
            @if (Auth::check())
                <section class="product__section section--padding pt-0">
                    <div class="container">
                        <div class="section__heading text-center mb-40">
                            <h2 class="section__heading--maintitle">SẢN PHẨM MỚI NHẤT</h2>
                        </div>
                        <div class="product__section--inner product__swiper--column4 padding swiper">
                            <div class="swiper-wrapper">
                                @foreach ($new_product as $new_pro)
                                    <div class="swiper-slide">
                                        <article class="product__card">
                                            <div class="product__card--thumbnail">
                                                <a class="product__card--thumbnail__link display-block"
                                                    href="{{ route('shopDetails', $new_pro->id) }}">
                                                    <div class="product__card--thumbnail__container">
                                                        <img class="product__card--thumbnail__img @if ($new_pro->quantity_product <= 0) out-of-stock @endif"
                                                            src="{{ asset('upload/public/images/' . $new_pro->image) }}"
                                                            style="height: 200px;" alt="product-img">
                                                        @if ($new_pro->quantity_product <= 0)
                                                            <h3>
                                                                <p class="display-7 product__card--thumbnail__text">
                                                                    ĐÃ HẾT HÀNG</p>
                                                            </h3>
                                                        @endif
                                                    </div>
                                                </a>
                                                <ul class="product__card--action">
                                                    <li class="product__card--action__list">
                                                        <a class="product__card--action__btn" title="Quick View"
                                                            data-bs-toggle="modal" data-bs-target="#examplemodal"
                                                            href="javascript:void(0)">
                                                            <svg class="product__card--action__btn--svg" width="16"
                                                                height="16" viewBox="0 0 16 16" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M15.6952 14.4991L11.7663 10.5588C12.7765 9.4008 13.33 7.94381 13.33 6.42703C13.33 2.88322 10.34 0 6.66499 0C2.98997 0 0 2.88322 0 6.42703C0 9.97085 2.98997 12.8541 6.66499 12.8541C8.04464 12.8541 9.35938 12.4528 10.4834 11.6911L14.4422 15.6613C14.6076 15.827 14.8302 15.9184 15.0687 15.9184C15.2944 15.9184 15.5086 15.8354 15.6711 15.6845C16.0166 15.364 16.0276 14.8325 15.6952 14.4991ZM6.66499 1.67662C9.38141 1.67662 11.5913 3.8076 11.5913 6.42703C11.5913 9.04647 9.38141 11.1775 6.66499 11.1775C3.94857 11.1775 1.73869 9.04647 1.73869 6.42703C1.73869 3.8076 3.94857 1.67662 6.66499 1.67662Z"
                                                                    fill="currentColor"></path>
                                                            </svg>
                                                            <span class="visually-hidden">Quick View</span>
                                                        </a>
                                                    </li>
                                                    <li class="product__card--action__list">
                                                        <a class="product__card--action__btn" title="Compare"
                                                            href="compare.html">
                                                            <svg class="product__card--action__btn--svg" width="17"
                                                                height="17" viewBox="0 0 14 13" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M6.89137 6.09375C6.89137 6.47656 7.16481 6.75 7.54762 6.75H10.1453C10.7195 6.75 11.0203 6.06641 10.5828 5.65625L9.8445 4.89062L12.907 1.82812C13.0437 1.69141 13.0437 1.47266 12.907 1.36328L12.2781 0.734375C12.1687 0.597656 11.95 0.597656 11.8132 0.734375L8.75075 3.79688L7.98512 3.05859C7.57496 2.62109 6.89137 2.92188 6.89137 3.49609V6.09375ZM1.94215 12.793L5.00465 9.73047L5.77028 10.4688C6.18043 10.9062 6.89137 10.6055 6.89137 10.0312V7.40625C6.89137 7.05078 6.59059 6.75 6.23512 6.75H3.61012C3.0359 6.75 2.73512 7.46094 3.17262 7.87109L3.9109 8.63672L0.848402 11.6992C0.711683 11.8359 0.711683 12.0547 0.848402 12.1641L1.47731 12.793C1.58668 12.9297 1.80543 12.9297 1.94215 12.793Z"
                                                                    fill="currentColor" />
                                                            </svg>
                                                            <span class="visually-hidden">Compare</span>
                                                        </a>
                                                    </li>
                                                    @if (Auth::check())
                                                        <li class="product__card--action__list">
                                                            @if ($new_pro->favorited)
                                                                <a class="product__card--action__btn" title="Bỏ thích"
                                                                    href="{{ route('favorite', $new_pro->id) }}">
                                                                    <svg class="product__card--action__btn--svg"
                                                                        width="18" height="18" color="#FF0000"
                                                                        viewBox="0 0 16 13" fill="red"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M13.5379 1.52734C11.9519 0.1875 9.51832 0.378906 8.01442 1.9375C6.48317 0.378906 4.04957 0.1875 2.46364 1.52734C0.412855 3.25 0.713636 6.06641 2.1902 7.57031L6.97536 12.4648C7.24879 12.7383 7.60426 12.9023 8.01442 12.9023C8.39723 12.9023 8.7527 12.7383 9.02614 12.4648L13.8386 7.57031C15.2879 6.06641 15.5886 3.25 13.5379 1.52734ZM12.8816 6.64062L8.09645 11.5352C8.04176 11.5898 7.98707 11.5898 7.90504 11.5352L3.11989 6.64062C2.10817 5.62891 1.91676 3.71484 3.31129 2.53906C4.3777 1.63672 6.01832 1.77344 7.05739 2.8125L8.01442 3.79688L8.97145 2.8125C9.98317 1.77344 11.6238 1.63672 12.6902 2.51172C14.0847 3.71484 13.8933 5.62891 12.8816 6.64062Z"
                                                                            fill="red" />
                                                                    </svg>
                                                                    <span class="visually-hidden">Wishlist</span>
                                                                @else
                                                                    <a class="product__card--action__btn"
                                                                        title="Yêu thích"
                                                                        href="{{ route('favorite', $new_pro->id) }}">
                                                                        <svg class="product__card--action__btn--svg"
                                                                            width="18" height="18"
                                                                            viewBox="0 0 16 13" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M13.5379 1.52734C11.9519 0.1875 9.51832 0.378906 8.01442 1.9375C6.48317 0.378906 4.04957 0.1875 2.46364 1.52734C0.412855 3.25 0.713636 6.06641 2.1902 7.57031L6.97536 12.4648C7.24879 12.7383 7.60426 12.9023 8.01442 12.9023C8.39723 12.9023 8.7527 12.7383 9.02614 12.4648L13.8386 7.57031C15.2879 6.06641 15.5886 3.25 13.5379 1.52734ZM12.8816 6.64062L8.09645 11.5352C8.04176 11.5898 7.98707 11.5898 7.90504 11.5352L3.11989 6.64062C2.10817 5.62891 1.91676 3.71484 3.31129 2.53906C4.3777 1.63672 6.01832 1.77344 7.05739 2.8125L8.01442 3.79688L8.97145 2.8125C9.98317 1.77344 11.6238 1.63672 12.6902 2.51172C14.0847 3.71484 13.8933 5.62891 12.8816 6.64062Z"
                                                                                fill="pink" />
                                                                        </svg>

                                                                        <span class="visually-hidden">Wishlist</span>
                                                            @endif
                                                            </a>
                                                        </li>
                                                    @endif
                                                </ul>

                                                <form action="{{ route('addCart', $new_pro->id) }}" method="POST">
                                                    @csrf()
                                                    @if ($new_pro->quantity_product > 0)
                                                        <div class="product__add--to__card">
                                                            <button type='submit' class="product__card--btn"
                                                                title="Add To Card">Thêm
                                                                giỏ hàng
                                                                <svg width="17" height="15" viewBox="0 0 14 11"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M13.2371 4H11.5261L8.5027 0.460938C8.29176 0.226562 7.9402 0.203125 7.70582 0.390625C7.47145 0.601562 7.44801 0.953125 7.63551 1.1875L10.0496 4H3.46364L5.8777 1.1875C6.0652 0.953125 6.04176 0.601562 5.80739 0.390625C5.57301 0.203125 5.22145 0.226562 5.01051 0.460938L1.98707 4H0.299574C0.135511 4 0.0183239 4.14062 0.0183239 4.28125V4.84375C0.0183239 5.00781 0.135511 5.125 0.299574 5.125H0.721449L1.3777 9.78906C1.44801 10.3516 1.91676 10.75 2.47926 10.75H11.0339C11.5964 10.75 12.0652 10.3516 12.1355 9.78906L12.7918 5.125H13.2371C13.3777 5.125 13.5183 5.00781 13.5183 4.84375V4.28125C13.5183 4.14062 13.3777 4 13.2371 4ZM11.0339 9.625H2.47926L1.86989 5.125H11.6433L11.0339 9.625ZM7.33082 6.4375C7.33082 6.13281 7.07301 5.875 6.76832 5.875C6.4402 5.875 6.20582 6.13281 6.20582 6.4375V8.3125C6.20582 8.64062 6.4402 8.875 6.76832 8.875C7.07301 8.875 7.33082 8.64062 7.33082 8.3125V6.4375ZM9.95582 6.4375C9.95582 6.13281 9.69801 5.875 9.39332 5.875C9.0652 5.875 8.83082 6.13281 8.83082 6.4375V8.3125C8.83082 8.64062 9.0652 8.875 9.39332 8.875C9.69801 8.875 9.95582 8.64062 9.95582 8.3125V6.4375ZM4.70582 6.4375C4.70582 6.13281 4.44801 5.875 4.14332 5.875C3.8152 5.875 3.58082 6.13281 3.58082 6.4375V8.3125C3.58082 8.64062 3.8152 8.875 4.14332 8.875C4.44801 8.875 4.70582 8.64062 4.70582 8.3125V6.4375Z"
                                                                        fill="currentColor" />
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    @endif
                                            </div>
                                            <div class="product__card--content text-center">
                                                <div class="quantity__box">
                                                    <!-- <button type="hidden" type="button" class="quantity__value quickview__value--quantity decrease" aria-label="quantity value" value="Decrease Value">-</button> -->
                                                    <label>
                                                        <input type="hidden" name="quantity" type="number"
                                                            class="quantity__number quickview__value--number"
                                                            value="1" data-counter />
                                                    </label>
                                                    <!-- <button  type="hidden"  type="button" class="quantity__value quickview__value--quantity increase" aria-label="quantity value" value="Increase Value">+</button> -->
                                                </div>
                                                </form>

                                                <div class="product__card--content text-center">

                                                    <h3 class="product__card--title text-truncate"><a
                                                            href="{{ route('shopDetails', $new_pro->id) }}">{{ $new_pro->name }}</a>
                                                    </h3>
                                                    <div class="product__card--price">
                                                        @if (isset($new_pro->price_sale) && $new_pro->price_sale > 0)
                                                            <span
                                                                class="current__price">{{ $new_pro->price_sale }}đ</span>
                                                            <span class="old__price">{{ $new_pro->price }}đ</span>
                                                        @else
                                                            <span class="current__price">{{ $new_pro->price }}đ</span>
                                                        @endif
                                                    </div>
                                                </div>
                                        </article>
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper__nav--btn swiper-button-next">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class=" -chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                            <div class="swiper__nav--btn swiper-button-prev">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class=" -chevron-left">
                                    <polyline points="15 18 9 12 15 6"></polyline>
                                </svg>
                            </div>
                        </div>
                    </div>
                </section>
            @endif
            <!-- End product section -->

            <!-- Start brand section -->
            <div class="brand__section brand__section-two section--padding">
                <div class="container">
                    <div class="brand__section--inner brand__logo--activation swiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="brang__logo--items">
                                    <img class="brang__logo--img"
                                        src="{{ asset('becute/assets/img/logo/brand-logo1.webp') }}" alt="brand-logo">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="brang__logo--items">
                                    <img class="brang__logo--img"
                                        src="{{ asset('becute/assets/img/logo/brand-logo2.webp') }}" alt="brand-logo">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="brang__logo--items">
                                    <img class="brang__logo--img"
                                        src="{{ asset('becute/assets/img/logo/brand-logo3.webp') }}" alt="brand-logo">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="brang__logo--items">
                                    <img class="brang__logo--img"
                                        src="{{ asset('becute/assets/img/logo/brand-logo4.webp') }}" alt="brand-logo">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="brang__logo--items">
                                    <img class="brang__logo--img"
                                        src="{{ asset('becute/assets/img/logo/brand-logo5.webp') }}" alt="brand-logo">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="brang__logo--items">
                                    <img class="brang__logo--img"
                                        src="{{ asset('becute/assets/img/logo/brand-logo6.webp') }}" alt="brand-logo">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="brang__logo--items">
                                    <img class="brang__logo--img"
                                        src="{{ asset('becute/assets/img/logo/brand-logo7.webp') }}" alt="brand-logo">
                                </div>
                            </div>
                        </div>
                        <div class="swiper__nav--btn swiper-button-next">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class=" -chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                        <div class="swiper__nav--btn swiper-button-prev">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class=" -chevron-left">
                                <polyline points="15 18 9 12 15 6"></polyline>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End brand section -->

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
