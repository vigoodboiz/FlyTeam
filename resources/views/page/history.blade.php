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
                                <li class="breadcrumb__content--menu__items"><span>History Order</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <!-- End breadcrumb section -->

        <!-- cart section start -->
        <div class="container">
            <h2 class="cart__title mb-30">Order History</h2>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        {{-- <th>User Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th> --}}
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Order Status</th>
                        <th>Delivery Status</th>
                        <th>Order Date</th>
                        <th>Cancel Order</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $item)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            {{-- <td>{{ $item->user->name }}</td>
                                <td>{{ $item->user->email }}</td>
                                <td>{{ $item->user->phone }}</td>
                                <td>{{ $item->user->address }}</td> --}}
                            <td>

                                <img class="border-radius-5" width="100"
                                    src="{{ asset('upload/public/images/' . $item->product->image) }}" alt="cart-product">

                            </td>
                            <td>

                                {{ $item->product->name }}

                            </td>
                            <td>

                                {{ $item->product->price }}

                            </td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->total_price }}đ</td>
                            <td>{{ $item->payment_status }}</td>
                            <td>{{ $item->delivery_status }}</td>
                            <td>{{ $item->created_at->format('d/m/Y') }}</td>
                            <td>
                                <div class="d-flex align-items-center list-action">
                                    @if ($item->payment_status === 'Đã hủy đơn hàng' && $item->delivery_status === 'Không thể xử lý giao hàng')
                                        <form action="{{ route('orders.process_reorder', $item->id) }}" method="POST">
                                            @csrf
                                            <button class="btn btn-success" type="submit"
                                                onclick="return confirm('Are you sure you want to buy this order?')">Buy
                                                back</button>
                                        </form>
                                    @else
                                        <form action="{{ route('orders.cancel', $item->id) }}" method="POST">
                                            @csrf
                                            @method('POST')
                                            <button class="btn btn-danger" type="submit" title="Cancel order"
                                                onclick="return confirm('Are you sure you want to cancel this order?')">Cancel
                                                order</button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $orders->links() }}
        </div>
        <!-- End product section -->

        <!-- Start brand section -->
        <div class="brand__section brand__section-two section--padding">
            <div class="container">
                <div class="brand__section--inner brand__logo--activation swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="brang__logo--items">
                                <img class="brang__logo--img" src="{{ asset('becute/assets/img/logo/brand-logo1.webp') }}"
                                    alt="brand-logo">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brang__logo--items">
                                <img class="brang__logo--img" src="{{ asset('becute/assets/img/logo/brand-logo2.webp') }}"
                                    alt="brand-logo">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brang__logo--items">
                                <img class="brang__logo--img" src="{{ asset('becute/assets/img/logo/brand-logo3.webp') }}"
                                    alt="brand-logo">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brang__logo--items">
                                <img class="brang__logo--img" src="{{ asset('becute/assets/img/logo/brand-logo4.webp') }}"
                                    alt="brand-logo">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brang__logo--items">
                                <img class="brang__logo--img" src="{{ asset('becute/assets/img/logo/brand-logo5.webp') }}"
                                    alt="brand-logo">
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
