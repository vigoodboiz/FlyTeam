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
                                <li class="breadcrumb__content--menu__items"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb__content--menu__items"><span>Wishlist</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End breadcrumb section -->

        <!-- cart section start -->
        <section class="cart__section section--padding">
            <div class="container">
                <div class="cart__section--inner">
                    <form action="#">
                        <h2 class="cart__title mb-30">Wishlist</h2>
                        <div class="cart__table">
                            <table class="cart__table--inner">
                                <thead class="cart__table--header">
                                    <tr class="cart__table--header__items">
                                        <th class="cart__table--header__list">Product</th>
                                        <th class="cart__table--header__list">Price</th>
                                        <th class="cart__table--header__list text-center">Date</th>
                                        <th class="cart__table--header__list text-right">ADD TO CART</th>
                                    </tr>
                                </thead>
                                <tbody class="cart__table--body">
                                    @foreach ($favorites as $item)
                                        <tr class="cart__table--body__items">
                                            <td class="cart__table--body__list">
                                                <div class="cart__product d-flex align-items-center">
                                                    <form action="{{ route('favorite.delete', $item->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="cart__remove--btn" aria-label="search button"
                                                            type="submit" onclick="return confirm('Có chắc xóa không?')">
                                                            <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 24 24" width="16px" height="16px">
                                                                <path
                                                                    d="M 4.7070312 3.2929688 L 3.2929688 4.7070312 L 10.585938 12 L 3.2929688 19.292969 L 4.7070312 20.707031 L 12 13.414062 L 19.292969 20.707031 L 20.707031 19.292969 L 13.414062 12 L 20.707031 4.7070312 L 19.292969 3.2929688 L 12 10.585938 L 4.7070312 3.2929688 z" />
                                                            </svg>
                                                        </button>
                                                    </form>
                                                    <div class="cart__thumbnail">
                                                        <a href="{{ route('shopDetails', $item->product_id) }}"><img
                                                                class="border-radius-5"
                                                                src="{{ asset('upload/public/images/' . $item->prod->image) }}"
                                                                alt="cart-product"></a>
                                                    </div>
                                                    <div class="cart__content">
                                                        <h3 class="cart__content--title h4"><a
                                                                href="{{ route('shopDetails', $item->product_id) }}">{{ $item->prod->name }}</a>
                                                        </h3>
                                                        {{-- <span class="cart__content--variant">COLOR: Blue</span>
                                                        <span class="cart__content--variant">WEIGHT: 2 Kg</span> --}}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cart__table--body__list">
                                                <span class="cart__price">{{ $item->prod->price }}đ /
                                                    {{ $item->prod->price_sale }}đ</span>
                                            </td>
                                            <td class="cart__table--body__list text-center">
                                                <span
                                                    class="in__stock text__secondary">{{ $item->created_at->format('d/m/Y') }}</span>
                                            </td>
                                            <td class="cart__table--body__list text-right">
                                                <a class="wishlist__cart--btn primary__btn" href="cart.html">Add To Cart</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="continue__shopping d-flex justify-content-between">
                                <a class="continue__shopping--link" href="{{ route('home') }}">Continue shopping</a>
                                <a class="continue__shopping--clear" href="{{ route('shopGrid') }}">View All Products</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- cart section end -->
        <!-- Start product section -->

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
                                <h2 class="feature__content--title h3">Free Shipping</h2>
                                <p class="feature__content--desc">Free shipping over $100</p>
                            </div>
                        </div>
                        <div class="feature__items d-flex align-items-center">
                            <div class="feature__icon ">
                                <img src="{{ asset('becute/assets/img/other/feature2.webp') }}" alt="img">
                            </div>
                            <div class="feature__content">
                                <h2 class="feature__content--title h3">Support 24/7</h2>
                                <p class="feature__content--desc">Contact us 24 hours a day</p>
                            </div>
                        </div>
                        <div class="feature__items d-flex align-items-center">
                            <div class="feature__icon">
                                <img src="{{ asset('becute/assets/img/other/feature3.webp') }}" alt="img">
                            </div>
                            <div class="feature__content">
                                <h2 class="feature__content--title h3">100% Money Back</h2>
                                <p class="feature__content--desc">You have 30 days to Return</p>
                            </div>
                        </div>
                        <div class="feature__items d-flex align-items-center">
                            <div class="feature__icon">
                                <img src="{{ asset('becute/assets/img/other/feature4.webp') }}" alt="img">
                            </div>
                            <div class="feature__content">
                                <h2 class="feature__content--title h3">Payment Secure</h2>
                                <p class="feature__content--desc">We ensure secure payment</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End feature section -->
    </main>
@endsection
