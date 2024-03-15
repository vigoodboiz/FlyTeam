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
                                <li class="breadcrumb__content--menu__items"><span>Thanh toán</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End breadcrumb section -->

        <!-- Start checkout page area -->
        <div class="checkout__page--area section--padding">
            <div class="container">
                @if (Auth::check())
                    <div class="row">
                        <div class="col-lg-7 col-md-6">
                            <div class="main checkout__mian">
                                <form action="#">
                                    <div class="checkout__content--step section__shipping--address">
                                        <div class="checkout__section--header mb-25">
                                            <h2 class="checkout__header--title h3">Chi tiết thanh toán</h2>
                                        </div>
                                        <div class="section__shipping--address__content">
                                            <div class="row">
                                                <div class="col-12 mb-20">
                                                    <div class="checkout__input--list">
                                                        <label class="checkout__input--label mb-10" for="input3">Họ và tên
                                                            <span class="checkout__input--label__star">*</span></label>
                                                        <input class="checkout__input--field border-radius-5"
                                                            value="{{ Auth::user()->name }}" id="input3" type="text"
                                                            disabled>
                                                    </div>
                                                </div>
                                                <div class="col-12 mb-20">
                                                    <div class="checkout__input--list">
                                                        <label class="checkout__input--label mb-10" for="input3">Email
                                                            <span class="checkout__input--label__star">*</span></label>
                                                        <input class="checkout__input--field border-radius-5"
                                                            value="{{ Auth::user()->email }}" id="input3" type="text"
                                                            disabled>
                                                    </div>
                                                </div>
                                                <div class="col-12 mb-20">
                                                    <div class="checkout__input--list">
                                                        <label class="checkout__input--label mb-10" for="input3">Số điện
                                                            thoại

                                                            <span class="checkout__input--label__star">*</span></label>
                                                        <input class="checkout__input--field border-radius-5"
                                                            value="{{ Auth::user()->phone }}" id="input3" type="text"
                                                            disabled>
                                                    </div>
                                                </div>
                                                <div class="col-12 mb-20">
                                                    <div class="checkout__input--list">
                                                        <label class="checkout__input--label mb-10" for="input4">Địa chỉ
                                                            <span class="checkout__input--label__star">*</span></label>
                                                        <input class="checkout__input--field border-radius-5"
                                                            value="{{ Auth::user()->address }}" type="text" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="order-notes mb-20">
                                            <form id="note-form">
                                                <label class="checkout__input--label mb-10" for="order">Ghi chú <span
                                                        class="checkout__input--label__star">*</span></label>
                                                <textarea class="checkout__notes--textarea__field border-radius-5" name="note" id="note"
                                                    placeholder="Ghi chú về sản phẩm của bạn." spellcheck="false"></textarea>
                                        </div>
                                </form>
                            </div>
                            <div class="checkout__content--step__footer d-flex align-items-center">
                                <a class="continue__shipping--btn primary__btn border-radius-5"
                                    href="{{ route('home') }}">Tiếp tục mua sắm</a>
                                <a class="previous__link--content" href="{{ route('cartPage') }}">Quay về giỏ
                                    hàng</a>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <aside class="checkout__sidebar sidebar border-radius-10">
                            <h2 class="checkout__order--summary__title text-center mb-15">Đơn hàng của bạn</h2>
                            <div class="cart__table checkout__product--table">
                                <table class="cart__table--inner">
                                    <tbody class="cart__table--body">
                                        @foreach ($cartItems as $cart)
                                            <tr class="cart__table--body__items">
                                                <td class="cart__table--body__list">
                                                    <div class="product__image two  d-flex align-items-center">
                                                        <div class="product__thumbnail border-radius-5">
                                                            <a class="display-block" href="product-details.html"><img
                                                                    class="display-block border-radius-5"
                                                                    src="{{ asset('upload/public/images/' . $cart->product->image) }}"
                                                                    alt="cart-product"></a>

                                                        </div>
                                                        <div class="product__description">
                                                            <label>Tên sản phẩm</label>
                                                            <h4 class="product__description--name"><a
                                                                    href="product-details.html">{{ $cart->product->name }}</a>
                                                            </h4>

                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cart__table--body__list">
                                                    <div class="product__description">
                                                        <label>SL</label>
                                                        <span class="cart__price">{{ $cart->quantity }}</span>
                                                    </div>
                                                </td>
                                                <td class="cart__table--body__list">
                                                    <label>Giá</label>
                                                    @if (isset($cart->product->price_sale) && $cart->product->price_sale > 0)
                                                        <span class="cart__price">{{ $cart->product->price_sale }}đ</span>
                                                    @else
                                                        <span class="cart__price">{{ $cart->product->price }}đ</span>
                                                    @endif


                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="checkout__total">
                                <table class="checkout__total--table">
                                    <tbody class="checkout__total--body">
                                        <tr class="checkout__total--items">
                                            <td class="checkout__total--title text-left">Tổng phụ </td>

                                            <td class="checkout__total--amount text-right">{{ $totalPrice }}đ
                                            </td>
                                        </tr>
                                        <tr class="checkout__total--items">
                                            <td class="checkout__total--title text-left">Phí giao hàng</td>
                                            <td class="checkout__total--calculated__text text-right">Miễn phí giao hàng
                                            </td>

                                        </tr>
                                    </tbody>
                                    <tfoot class="checkout__total--footer">
                                        <tr class="checkout__total--footer__items">
                                            <td
                                                class="checkout__total--footer__title checkout__total--footer__list text-left">
                                                Tổng tiền </td>
                                            <td
                                                class="checkout__total--footer__amount checkout__total--footer__list text-right">

                                                {{ $totalPrice }}đ
                                            </td>

                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <div class="payment__history mb-30">

                                <h3 class="payment__history--title mb-20">Thanh toán</h3>
                                <ul class="payment__history--inner d-flex">



                                    <form action="{{ route('vnpay_payment') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="total_vnpay" value=" {{ $totalPrice }} ">
                                        <li class="payment__history--list"><button
                                                class="payment__history--link primary__btn" type="submit"
                                                name="redirect" style="margin-right: 10px">VnPay</button>
                                        </li>
                                        <!-- <li class="payment__history--list"><button class="payment__history--link primary__btn" type="submit">VnPay</button></li> -->
                                    </form>

                                    <form action="{{ route('momo_payment') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="total_momo" value=" {{ $totalPrice }} ">
                                        <li class="payment__history--list"><button
                                                class="payment__history--link primary__btn" type="submit"
                                                name="redirect" style="margin-right: 10px">MoMo</button> </li>
                                        <!-- <li class="payment__history--list"><button class="payment__history--link primary__btn" type="submit">VnPay</button></li> -->
                                    </form>

                                    <!-- <li class="payment__history--list"><button class="payment__history--link primary__btn" type="submit">Bank Transfer</button></li> -->
                                    <form action="" method="POST">
                                        @csrf
                                        <li class="payment__history--list"><button
                                                class="payment__history--link primary__btn" type="submit">Paypal</button>
                                        </li>
                                    </form>
                                </ul>
                            </div>
                            <form id="payment-form" action="{{ route('checkoutPost') }}" method="post">
                                @csrf
                                @foreach ($cartItems as $cart)
                                    <input type="hidden" name="cart_id" value="{{ $cart->id }}">
                                @endforeach
                                <button class="checkout__now--btn primary__btn" type="submit">
                                    Thanh toán ngay
                                </button>
                            </form>
                        </aside>
                    </div>
            </div>
        </div>
        </div>
        <!-- End checkout page area -->

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
@else
    <p>Xin vui lòng đăng nhập để có thể tiếp tục mua hàng!</p><a class="account__menu--list"
        href="{{ route('login') }}">Đăng nhập</a>
    @endif
    <script>
        document.getElementById('payment-form').addEventListener('submit', function(event) {
            var noteValue = document.getElementById('note').value;
            var hiddenInput = document.createElement('input');
            hiddenInput.type = 'hidden';
            hiddenInput.name = 'note';
            hiddenInput.value = noteValue;
            this.appendChild(hiddenInput);
        });
    </script>
@endsection
