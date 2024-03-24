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
                                                <input class="checkout__input--field border-radius-5" value="{{ Auth::user()->name }}" id="input3" type="text" disabled>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-20">
                                            <div class="checkout__input--list">
                                                <label class="checkout__input--label mb-10" for="input3">Email
                                                    <span class="checkout__input--label__star">*</span></label>
                                                <input class="checkout__input--field border-radius-5" value="{{ Auth::user()->email }}" id="input3" type="text" disabled>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-20">
                                            <div class="checkout__input--list">
                                                <label class="checkout__input--label mb-10" for="input3">Số điện
                                                    thoại

                                                    <span class="checkout__input--label__star">*</span></label>
                                                <input class="checkout__input--field border-radius-5" value="{{ Auth::user()->phone }}" id="input3" type="text" disabled>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-20">
                                            <div class="checkout__input--list">
                                                <label class="checkout__input--label mb-10" for="input3">Email
                                                    <span class="checkout__input--label__star">*</span></label>
                                                <input class="checkout__input--field border-radius-5" value="{{ Auth::user()->email }}" id="input3" type="text" disabled>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-20">
                                            <div class="checkout__input--list">
                                                <label class="checkout__input--label mb-10" for="input4">Địa chỉ
                                                    <span class="checkout__input--label__star">*</span></label>
                                                <input class="checkout__input--field border-radius-5" value="{{ Auth::user()->address }}" type="text" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="order-notes mb-20">
                                    <label class="checkout__input--label mb-10" for="order">Ghi chú <span class="checkout__input--label__star">*</span></label>
                                    <textarea class="checkout__notes--textarea__field border-radius-5" id="note" placeholder="Ghi chú về sản phẩm của bạn." spellcheck="false"></textarea>
                                </div>
                            </div>
                            <div class="checkout__content--step__footer d-flex align-items-center">
                                <a class="continue__shipping--btn primary__btn border-radius-5" href="{{ route('home') }}">Continue To
                                    Shipping</a>
                                <a class="previous__link--content" href="{{ route('cartPage') }}">Return to cart</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6">
                    <aside class="checkout__sidebar sidebar border-radius-10">
                        <!-- thông báo -->
                        @if (\Session::has('message'))
                        <div class="alert alert-success">
                            {{ \Session::get('message') }}
                        </div>
                        @endif
                        <!-- thông báo -->
                        @if (\Session::has('error'))
                        <div class="alert alert-danger">
                            {{ \Session::get('error') }}
                        </div>
                        @endif
                        <h2 class="checkout__order--summary__title text-center mb-15">ĐƠN HÀNG CỦA BẠN</h2>
                        <div class="cart__table checkout__product--table">
                            <table class="cart__table--inner">
                                <tbody class="cart__table--body">
                                    @foreach($cartItems as $cart)
                                    <tr class="cart__table--body__items">
                                        <td class="cart__table--body__list">
                                            <div class="product__image two  d-flex align-items-center">
                                                <div class="product__thumbnail border-radius-5">
                                                    <a class="display-block"><img class="display-block border-radius-5" src="{{ asset('upload/public/images/'.$cart->product->image) }}" alt="cart-product"></a>

                                                </div>
                                                <div class="product__description">
                                                    <label>Tên</label>
                                                    <h4 class="product__description--name text-truncate">{{$cart->product->name}}</h4>

                                                </div>
                                            </div>
                                        </td>
                                        <td class="cart__table--body__list">
                                            <div class="product__description">
                                                <label>SL</label>
                                                <span class="cart__price">{{$cart->quantity}}</span>
                                            </div>
                                        </td>
                                        <td class="cart__table--body__list">
                                            <label>Giá</label>
                                            @if(isset($cart->product->price_sale) && $cart->product->price_sale > 0)
                                            <span class="cart__price">{{ number_format($cart->product->price_sale, 0, ',', '.')}}đ</span>
                                            @else
                                            <span class="cart__price">{{ number_format($cart->product->price, 0, ',', '.')}}đ</span>
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

                                    <tr>
                                        <form action="{{ route('check_coupon') }}" method="POST">
                                            @csrf
                                            <div class="coupon__code mb-30">
                                                <h3 class="coupon__code--title">MÃ GIẢM GIÁ</h3>
                                                <p class="coupon__code--desc">Nhập mã giảm giá nếu bạn có!</p>
                                                <div class="coupon__code--field d-flex">
                                                    <label>
                                                        <input type="text" class="coupon__code--field__input border-radius-5" name="coupon" placeholder="Nhập mã giảm giá">
                                                    </label>
                                                    <input name="check_coupon" class="coupon__code--field__btn primary__btn" type="submit" value="Xác nhận">
                                                </div>
                                            </div>
                                        </form>
                                    </tr>
                                    <tr>
                                        @if (Session::get('coupon'))

                                        <form action="{{ route('unset_coupon') }}" method="POST">
                                            @csrf
                                            <button class="coupon__code--field__btn primary__btn" type="submit">Xóa mã giảm giá</button>
                                        </form>
                                        @endif
                                    </tr>
                                    <tr class="checkout__total--items">
                                        <td class="checkout__total--amount text-left">Tổng Tiền </td>
                                        <td class="checkout__total--amount text-right">{{ number_format($totalPrice, 0, ',', '.')}}</td>
                                    </tr>
                                    <tr class="checkout__total--items">
                                        <td class="checkout__total--amount text-left">Giao Hàng</td>
                                        <td class="checkout__total--amount text-right">Miễn phí giao hàng</td>

                                    </tr>
                                    <td>
                                        @if (Session::get('coupon'))
                                        @foreach (Session::get('coupon') as $key => $cou)
                                        @if ($cou['coupon_condition'] == 1)
                                        <tr>
                                            <td class="checkout__total--amount text-left">Giảm :</td>
                                            <td class="checkout__total--amount text-right">{{ $cou['coupon_number'] }} %</td>
                                        </tr>
                                        <p>
                                            <?php
                                            $total_coupon = ($totalPrice * $cou['coupon_number']) / 100;

                                            echo '<tr><td class="checkout__total--amount text-left" >Giảm :' . number_format($total_coupon, 0, ',', '.') . '</td></tr>';
                                            ?>
                                        </p>
                                        <p>
                                            <tr>
                                                <td class="checkout__total--amount text-left">Số tiền trả :</td>

                                                <td class="checkout__total--amount text-right"> {{ number_format($totalPrice - $total_coupon, 0, ',', '.') }}</td>

                                            </tr>
                                            </li>
                                        </p>
                                        @elseif($cou['coupon_condition'] == 2)
                                        <tr>
                                            <td class="checkout__total--amount text-left">Số tiền giảm :</td>
                                            <td class="checkout__total--amount text-right">{{ number_format($cou['coupon_number'], 0, ',', '.') }}</td>
                                        </tr>
                                        <p>
                                            <?php
                                            $total_coupon = $totalPrice - $cou['coupon_number'];

                                            ?>
                                        </p>
                                        <p>
                                            <tr>
                                                <td class="checkout__total--amount text-left">Số tiền trả :</td>

                                                <td class="checkout__total--amount text-right"> {{ number_format($total_coupon, 0, ',', '.') }}</td>

                                            </tr>
                                        </p>
                                        @endif
                                        @endforeach
                                        @endif
                                    </td>

                                </tbody>
                                <!-- <tfoot class="checkout__total--footer">
                                    <tr class="checkout__total--footer__items">
                                        <td class="checkout__total--footer__title checkout__total--footer__list text-left">
                                            Tổng tiền </td>
                                        <td class="checkout__total--footer__amount checkout__total--footer__list text-right">

                                            {{ $totalPrice }}đ
                                        </td>

                                    </tr>
                                </tfoot> -->
                            </table>
                        </div>

                        <style>
                            .image {
                                display: block;
                                margin-right: 10px;
                                width: 50px;
                            }

                            .method-item {
                                display: flex;
                                align-items: center;
                                border: 1px solid #d9d9d9;
                                border-radius: 16px;
                                padding: 15px 20px;
                                cursor: pointer;
                                transition: all 0.3s ease;

                                font-size: 14px;
                                margin-bottom: 10px;
                            }

                            .method-item.selected {
                                opacity: 1;
                                font-weight: bold;
                            }

                            .method-item .image {
                                margin-right: 20px;
                            }

                            .method-item .image img {
                                min-width: 35px;
                                max-height: 35px;
                                max-width: 35px;
                            }

                            .cart-checkout {
                                border-radius: 16px;
                                background: #000;
                                height: 50px;
                                width: 100%;
                                padding: 15px 20px;
                                text-align: center;
                                cursor: pointer;
                                font-size: 14px;
                                color: #fff;
                                transition: all 0.3s ease;
                            }

                            .cart-checkout:hover {
                                background: #d9d9d9;
                                color: #000;
                            }

                            .hihi {
                                margin-left: 100px;
                            }
                        </style>


                        <hr>
                        <h3 class="hihi">Vui Lòng Chọn Phương Thức Thanh Toán </h3>
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif

                        @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif

                        <div class="payment__history mb-30">

                            <form id="payment-form" action="{{ route('checkoutPost') }}" method="POST">
                                @csrf
                                @foreach ($cartItems as $cart)
                                <input type="hidden" name="cart_id" value="{{  $cart->id  }}">
                                @endforeach
                                <div class="uk-flex uk-flex-middle method-item">
                                    <span class="image"> <img src="/core/xetaiicon.png" alt="" srcset=""></span>
                                    <button class="payment__history--link primary__btn" type="submit" name="redirect" style="margin-right: 10px">
                                        Thanh Toán Nhận Hàng
                                    </button>
                                </div>
                            </form>

                            <form action="{{ route('vnpay_payment') }}" method="POST">
                                @csrf
                                @if(isset($total_coupon))
                                <input type="hidden" name="total_vnpay" value="{{ $totalPrice - $total_coupon }}">
                                @else
                                <input type="hidden" name="total_vnpay" value="{{ $totalPrice }}">
                                @endif
                                <div class="ukflex uk-flex-middle method-item">
                                    <span class="image"> <img src="/core/vnpayicon.png" alt="" srcset=""></span>
                                    <button class="payment__history--link primary__btn" type="submit" name="redirect" style="margin-right: 10px">
                                        Thanh Toán Qua VnPay
                                    </button>
                                </div>
                            </form>

                            <form action="{{ route('momo_payment') }}" method="POST">
                                @csrf
                                @if(isset($total_coupon))
                                <input type="hidden" name="total_momo" value="{{ $totalPrice - $total_coupon }}">
                                @else
                                <input type="hidden" name="total_momo" value="{{ $totalPrice }}">
                                @endif

                                <div class="uk-flex uk-flex-middle method-item">
                                    <span class="image"> <img src="/core/momo.png" alt="" srcset=""></span>
                                    <button class="payment__history--link primary__btn" type="submit" name="redirect" style="margin-right: 10px">
                                        Thanh Toán Qua MoMo
                                    </button>
                                </div>
                            </form>


                            <form action="{{ route('momo_payment') }}" method="POST">
                                @csrf
                                <input type="hidden" name="total_paypal" value="{{ $totalPrice}}">

                                <div class="uk-flex uk-flex-middle method-item">
                                    <span class="image"><img src="/core/Paypal-icon.png" alt="" srcset=""></span>
                                    <button class="payment__history--link primary__btn" type="submit" name="redirect" style="margin-right: 10px">
                                        Thanh Toán Qua PayPal
                                    </button>
                                </div>
                            </form>

                        </div>


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
    @else
    <div class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content text-center">
                        <p>Xin vui lòng đăng nhập để có thể tiếp tục mua hàng!</p><a class="account__menu--list" href="{{ route('login') }}">Đăng nhập</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</main>
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