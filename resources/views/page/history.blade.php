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
    <!-- End breadcrumb section -->

    <!-- Start portfolio section -->
    <section class="portfolio__section section--padding">
        <div class="container">
            <div class="section__heading text-center mb-40">
                <h2 class="section__heading--maintitle">History Order</h2>
            </div>
            @if (Auth::check())
            <h2 class="section__heading--maintitle">Xin chào, {{ Auth::user()->name }}</h2><br>
            <div class="my__account--section__inner border-radius-10 d-flex">
                <div class="account__left--sidebar">
                    <h2 class="account__content--title mb-20">My Profile</h2>
                    <ul class="account__menu">
                        @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
                        <li class="account__menu--list"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        @elseif(Auth::user()->role_id == 3)
                        <li class="account__menu--list active"><a href="{{ route('portfolioPage') }}">Infomation</a>
                        </li>
                        <li class="account__menu--list"><a href="{{ route('wishlistPage') }}">Wishlist</a></li>
                        <li class="account__menu--list"><a href="{{ route('history') }}">Order</a></li>
                        @endif
                        <li class="account__menu--list"><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                                                                                                                                                                                                                                                                                                                                        document.getElementById('logout-form').submit(); return view('auth.login');"><i></i>Logout</a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </div>
                <div class="container py-5">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Product Image</th>
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Order Status</th>
                                <th>Order Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $item)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->user->email }}</td>
                                <td>{{ $item->user->phone }}</td>
                                <td>{{ $item->user->address }}</td>
                                <td>
                                    <img class="border-radius-5" width="100" src="{{ asset('upload/public/images/' . $item->product->image) }}" alt="cart-product">
                                </td>
                                <td class="text-truncate">
                                    {{ $item->product->name }}
                                </td>
                                <td>
                                    {{ $item->product->price }}
                                </td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->total_price }}đ</td>

                                @if($item->delivery_status == 'Đang Xử Lý')
                                <td style="color: red;">{{ $item->delivery_status }}</td>
                                @elseif($item->delivery_status == 'Đang Giao Hàng')
                                <td style="color: blue;">{{ $item->delivery_status }}</td>
                                @elseif($item->delivery_status == 'Đã Giao Hàng')
                                <td style="color: green;">{{ $item->delivery_status }}</td>
                                @endif
                                
                                <td>{{ $item->created_at->format('d/m/Y') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <p>Xin vui lòng đăng nhập để có thể tiếp tục mua hàng!</p><a class="account__menu--list" href="{{ route('login') }}">Đăng nhập</a>
                @endif
            </div>
    </section>
    <!-- End portfolio section -->

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