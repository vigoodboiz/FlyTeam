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
                                <li class="breadcrumb__content--menu__items"><span>My Account</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End breadcrumb section -->
        <!-- my account section start -->
        <section class="my__account--section section--padding">
            <div class="container">
                @if (Auth::check())
                    <h2 class="section__heading--maintitle">Xin chào, {{ Auth::user()->name }}</h2><br>
                    <div class="my__account--section__inner border-radius-10 d-flex">
                        <div class="account__left--sidebar">
                            <h2 class="account__content--title mb-20">My Profile</h2>
                            <ul class="account__menu">
                                @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
                                    <li class="account__menu--list"><a href="{{ route('dashboard') }}">Trang quản trị</a>
                                    </li>
                                @elseif(Auth::user()->role_id == 3)
                                    <li class="account__menu--list"><a href="{{ route('portfolioPage') }}">Thông tin</a>
                                    </li>
                                    <li class="account__menu--list"><a href="{{ route('wishlistPage') }}">Sản phẩm yêu
                                            thích</a></li>
                                    <li class="account__menu--list"><a href="{{ route('history') }}">Lịch sử đơn hàng</a>
                                    </li>
                                @endif
                                <li class="account__menu--list"><a
                                        href="{{ route('logout') }}"onclick="event.preventDefault();
                                                                                                                                            document.getElementById('logout-form').submit(); return view('auth.login');"><i></i>Đăng
                                        xuất</a>
                                </li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </ul>
                        </div>
                        <div class="account__wrapper">
                            <div class="account__content">
                                <h2 class="account__content--title h3 mb-20">Orders History</h2>
                                <div class="account__table--area">
                                    <table class="account__table">
                                        <thead class="account__table--header">
                                            <tr class="account__table--header__child">
                                                <th class="account__table--header__child--items">Order</th>
                                                <th class="account__table--header__child--items">Date</th>
                                                <th class="account__table--header__child--items">Payment Status</th>
                                                <th class="account__table--header__child--items">Fulfillment Status</th>
                                                <th class="account__table--header__child--items">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody class="account__table--body mobile__none">
                                            <tr class="account__table--body__child">
                                                <td class="account__table--body__child--items">#2014</td>
                                                <td class="account__table--body__child--items">November 24, 2022</td>
                                                <td class="account__table--body__child--items">Paid</td>
                                                <td class="account__table--body__child--items">Unfulfilled</td>
                                                <td class="account__table--body__child--items">$40.00 USD</td>
                                            </tr>
                                            <tr class="account__table--body__child">
                                                <td class="account__table--body__child--items">#2024</td>
                                                <td class="account__table--body__child--items">November 24, 2022</td>
                                                <td class="account__table--body__child--items">Paid</td>
                                                <td class="account__table--body__child--items">Fulfilled</td>
                                                <td class="account__table--body__child--items">$44.00 USD</td>
                                            </tr>
                                            <tr class="account__table--body__child">
                                                <td class="account__table--body__child--items">#2164</td>
                                                <td class="account__table--body__child--items">November 24, 2022</td>
                                                <td class="account__table--body__child--items">Paid</td>
                                                <td class="account__table--body__child--items">Unfulfilled</td>
                                                <td class="account__table--body__child--items">$36.00 USD</td>
                                            </tr>
                                            <tr class="account__table--body__child">
                                                <td class="account__table--body__child--items">#2345</td>
                                                <td class="account__table--body__child--items">November 24, 2022</td>
                                                <td class="account__table--body__child--items">Paid</td>
                                                <td class="account__table--body__child--items">Unfulfilled</td>
                                                <td class="account__table--body__child--items">$87.00 USD</td>
                                            </tr>
                                            <tr class="account__table--body__child">
                                                <td class="account__table--body__child--items">#1244</td>
                                                <td class="account__table--body__child--items">November 24, 2022</td>
                                                <td class="account__table--body__child--items">Paid</td>
                                                <td class="account__table--body__child--items">Fulfilled</td>
                                                <td class="account__table--body__child--items">$66.00 USD</td>
                                            </tr>
                                            <tr class="account__table--body__child">
                                                <td class="account__table--body__child--items">#3455</td>
                                                <td class="account__table--body__child--items">November 24, 2022</td>
                                                <td class="account__table--body__child--items">Paid</td>
                                                <td class="account__table--body__child--items">Fulfilled</td>
                                                <td class="account__table--body__child--items">$55.00 USD</td>
                                            </tr>
                                            <tr class="account__table--body__child">
                                                <td class="account__table--body__child--items">#4566</td>
                                                <td class="account__table--body__child--items">November 24, 2022</td>
                                                <td class="account__table--body__child--items">Paid</td>
                                                <td class="account__table--body__child--items">Unfulfilled</td>
                                                <td class="account__table--body__child--items">$87.00 USD</td>
                                            </tr>
                                        </tbody>
                                        <tbody class="account__table--body mobile__block">
                                            <tr class="account__table--body__child">
                                                <td class="account__table--body__child--items">
                                                    <strong>Order</strong>
                                                    <span>#2014</span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Date</strong>
                                                    <span>November 24, 2022</span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Payment Status</strong>
                                                    <span>Paid</span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Fulfillment Status</strong>
                                                    <span>Unfulfilled</span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Total</strong>
                                                    <span>$40.00 USD</span>
                                                </td>
                                            </tr>
                                            <tr class="account__table--body__child">
                                                <td class="account__table--body__child--items">
                                                    <strong>Order</strong>
                                                    <span>#2014</span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Date</strong>
                                                    <span>November 24, 2022</span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Payment Status</strong>
                                                    <span>Paid</span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Fulfillment Status</strong>
                                                    <span>Unfulfilled</span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Total</strong>
                                                    <span>$40.00 USD</span>
                                                </td>
                                            </tr>
                                            <tr class="account__table--body__child">
                                                <td class="account__table--body__child--items">
                                                    <strong>Order</strong>
                                                    <span>#2014</span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Date</strong>
                                                    <span>November 24, 2022</span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Payment Status</strong>
                                                    <span>Paid</span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Fulfillment Status</strong>
                                                    <span>Unfulfilled</span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Total</strong>
                                                    <span>$40.00 USD</span>
                                                </td>
                                            </tr>
                                            <tr class="account__table--body__child">
                                                <td class="account__table--body__child--items">
                                                    <strong>Order</strong>
                                                    <span>#2014</span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Date</strong>
                                                    <span>November 24, 2022</span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Payment Status</strong>
                                                    <span>Paid</span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Fulfillment Status</strong>
                                                    <span>Unfulfilled</span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Total</strong>
                                                    <span>$40.00 USD</span>
                                                </td>
                                            </tr>
                                            <tr class="account__table--body__child">
                                                <td class="account__table--body__child--items">
                                                    <strong>Order</strong>
                                                    <span>#2014</span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Date</strong>
                                                    <span>November 24, 2022</span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Payment Status</strong>
                                                    <span>Paid</span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Fulfillment Status</strong>
                                                    <span>Unfulfilled</span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Total</strong>
                                                    <span>$40.00 USD</span>
                                                </td>
                                            </tr>
                                            <tr class="account__table--body__child">
                                                <td class="account__table--body__child--items">
                                                    <strong>Order</strong>
                                                    <span>#2014</span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Date</strong>
                                                    <span>November 24, 2022</span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Payment Status</strong>
                                                    <span>Paid</span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Fulfillment Status</strong>
                                                    <span>Unfulfilled</span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Total</strong>
                                                    <span>$40.00 USD</span>
                                                </td>
                                            </tr>
                                            <tr class="account__table--body__child">
                                                <td class="account__table--body__child--items">
                                                    <strong>Order</strong>
                                                    <span>#2014</span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Date</strong>
                                                    <span>November 24, 2022</span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Payment Status</strong>
                                                    <span>Paid</span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Fulfillment Status</strong>
                                                    <span>Unfulfilled</span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Total</strong>
                                                    <span>$40.00 USD</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- my account section start -->
                            <section class="my__account--section section--padding">
                                <div class="container">
                                    <p class="account__welcome--text">Hello, Admin welcome to your dashboard!</p>
                                    <div class="my__account--section__inner border-radius-10 d-flex">
                                        <div class="account__left--sidebar">
                                            <h2 class="account__content--title mb-20">My Profile</h2>
                                            <ul class="account__menu">
                                                <li class="account__menu--list active"><a
                                                        href="my-account.html">Dashboard</a></li>
                                                <li class="account__menu--list"><a href="my-account-2.html">Addresses</a>
                                                </li>

                                                <li class="account__menu--list"><a href="my-account.html">Reward
                                                        Points</a></li>
                                                <li class="account__menu--list"><a href="wishlist.html">Wishlist</a></li>
                                                <li class="account__menu--list"><a href="login.html">Log Out</a></li>
                                            </ul>
                                        </div>
                                        <div class="account__wrapper">
                                            <div class="account__content">
                                                <h2 class="account__content--title h3 mb-20">Orders History</h2>
                                                <div class="account__table--area">
                                                    <table class="account__table">
                                                        <thead class="account__table--header">
                                                            <tr class="account__table--header__child">
                                                                <th class="account__table--header__child--items">Order</th>
                                                                <th class="account__table--header__child--items">Date</th>
                                                                <th class="account__table--header__child--items">Payment
                                                                    Status</th>
                                                                <th class="account__table--header__child--items">
                                                                    Fulfillment Status</th>
                                                                <th class="account__table--header__child--items">Total</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="account__table--body mobile__none">
                                                            <tr class="account__table--body__child">
                                                                <td class="account__table--body__child--items">#2014</td>
                                                                <td class="account__table--body__child--items">November 24,
                                                                    2022</td>
                                                                <td class="account__table--body__child--items">Paid</td>
                                                                <td class="account__table--body__child--items">Unfulfilled
                                                                </td>
                                                                <td class="account__table--body__child--items">$40.00 USD
                                                                </td>
                                                            </tr>
                                                            <tr class="account__table--body__child">
                                                                <td class="account__table--body__child--items">#2024</td>
                                                                <td class="account__table--body__child--items">November 24,
                                                                    2022</td>
                                                                <td class="account__table--body__child--items">Paid</td>
                                                                <td class="account__table--body__child--items">Fulfilled
                                                                </td>
                                                                <td class="account__table--body__child--items">$44.00 USD
                                                                </td>
                                                            </tr>
                                                            <tr class="account__table--body__child">
                                                                <td class="account__table--body__child--items">#2164</td>
                                                                <td class="account__table--body__child--items">November 24,
                                                                    2022</td>
                                                                <td class="account__table--body__child--items">Paid</td>
                                                                <td class="account__table--body__child--items">Unfulfilled
                                                                </td>
                                                                <td class="account__table--body__child--items">$36.00 USD
                                                                </td>
                                                            </tr>
                                                            <tr class="account__table--body__child">
                                                                <td class="account__table--body__child--items">#2345</td>
                                                                <td class="account__table--body__child--items">November 24,
                                                                    2022</td>
                                                                <td class="account__table--body__child--items">Paid</td>
                                                                <td class="account__table--body__child--items">Unfulfilled
                                                                </td>
                                                                <td class="account__table--body__child--items">$87.00 USD
                                                                </td>
                                                            </tr>
                                                            <tr class="account__table--body__child">
                                                                <td class="account__table--body__child--items">#1244</td>
                                                                <td class="account__table--body__child--items">November 24,
                                                                    2022</td>
                                                                <td class="account__table--body__child--items">Paid</td>
                                                                <td class="account__table--body__child--items">Fulfilled
                                                                </td>
                                                                <td class="account__table--body__child--items">$66.00 USD
                                                                </td>
                                                            </tr>
                                                            <tr class="account__table--body__child">
                                                                <td class="account__table--body__child--items">#3455</td>
                                                                <td class="account__table--body__child--items">November 24,
                                                                    2022</td>
                                                                <td class="account__table--body__child--items">Paid</td>
                                                                <td class="account__table--body__child--items">Fulfilled
                                                                </td>
                                                                <td class="account__table--body__child--items">$55.00 USD
                                                                </td>
                                                            </tr>
                                                            <tr class="account__table--body__child">
                                                                <td class="account__table--body__child--items">#4566</td>
                                                                <td class="account__table--body__child--items">November 24,
                                                                    2022</td>
                                                                <td class="account__table--body__child--items">Paid</td>
                                                                <td class="account__table--body__child--items">Unfulfilled
                                                                </td>
                                                                <td class="account__table--body__child--items">$87.00 USD
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                        <tbody class="account__table--body mobile__block">
                                                            <tr class="account__table--body__child">
                                                                <td class="account__table--body__child--items">
                                                                    <strong>Order</strong>
                                                                    <span>#2014</span>
                                                                </td>
                                                                <td class="account__table--body__child--items">
                                                                    <strong>Date</strong>
                                                                    <span>November 24, 2022</span>
                                                                </td>
                                                                <td class="account__table--body__child--items">
                                                                    <strong>Payment Status</strong>
                                                                    <span>Paid</span>
                                                                </td>
                                                                <td class="account__table--body__child--items">
                                                                    <strong>Fulfillment Status</strong>
                                                                    <span>Unfulfilled</span>
                                                                </td>
                                                                <td class="account__table--body__child--items">
                                                                    <strong>Total</strong>
                                                                    <span>$40.00 USD</span>
                                                                </td>
                                                            </tr>
                                                            <tr class="account__table--body__child">
                                                                <td class="account__table--body__child--items">
                                                                    <strong>Order</strong>
                                                                    <span>#2014</span>
                                                                </td>
                                                                <td class="account__table--body__child--items">
                                                                    <strong>Date</strong>
                                                                    <span>November 24, 2022</span>
                                                                </td>
                                                                <td class="account__table--body__child--items">
                                                                    <strong>Payment Status</strong>
                                                                    <span>Paid</span>
                                                                </td>
                                                                <td class="account__table--body__child--items">
                                                                    <strong>Fulfillment Status</strong>
                                                                    <span>Unfulfilled</span>
                                                                </td>
                                                                <td class="account__table--body__child--items">
                                                                    <strong>Total</strong>
                                                                    <span>$40.00 USD</span>
                                                                </td>
                                                            </tr>
                                                            <tr class="account__table--body__child">
                                                                <td class="account__table--body__child--items">
                                                                    <strong>Order</strong>
                                                                    <span>#2014</span>
                                                                </td>
                                                                <td class="account__table--body__child--items">
                                                                    <strong>Date</strong>
                                                                    <span>November 24, 2022</span>
                                                                </td>
                                                                <td class="account__table--body__child--items">
                                                                    <strong>Payment Status</strong>
                                                                    <span>Paid</span>
                                                                </td>
                                                                <td class="account__table--body__child--items">
                                                                    <strong>Fulfillment Status</strong>
                                                                    <span>Unfulfilled</span>
                                                                </td>
                                                                <td class="account__table--body__child--items">
                                                                    <strong>Total</strong>
                                                                    <span>$40.00 USD</span>
                                                                </td>
                                                            </tr>
                                                            <tr class="account__table--body__child">
                                                                <td class="account__table--body__child--items">
                                                                    <strong>Order</strong>
                                                                    <span>#2014</span>
                                                                </td>
                                                                <td class="account__table--body__child--items">
                                                                    <strong>Date</strong>
                                                                    <span>November 24, 2022</span>
                                                                </td>
                                                                <td class="account__table--body__child--items">
                                                                    <strong>Payment Status</strong>
                                                                    <span>Paid</span>
                                                                </td>
                                                                <td class="account__table--body__child--items">
                                                                    <strong>Fulfillment Status</strong>
                                                                    <span>Unfulfilled</span>
                                                                </td>
                                                                <td class="account__table--body__child--items">
                                                                    <strong>Total</strong>
                                                                    <span>$40.00 USD</span>
                                                                </td>
                                                            </tr>
                                                            <tr class="account__table--body__child">
                                                                <td class="account__table--body__child--items">
                                                                    <strong>Order</strong>
                                                                    <span>#2014</span>
                                                                </td>
                                                                <td class="account__table--body__child--items">
                                                                    <strong>Date</strong>
                                                                    <span>November 24, 2022</span>
                                                                </td>
                                                                <td class="account__table--body__child--items">
                                                                    <strong>Payment Status</strong>
                                                                    <span>Paid</span>
                                                                </td>
                                                                <td class="account__table--body__child--items">
                                                                    <strong>Fulfillment Status</strong>
                                                                    <span>Unfulfilled</span>
                                                                </td>
                                                                <td class="account__table--body__child--items">
                                                                    <strong>Total</strong>
                                                                    <span>$40.00 USD</span>
                                                                </td>
                                                            </tr>
                                                            <tr class="account__table--body__child">
                                                                <td class="account__table--body__child--items">
                                                                    <strong>Order</strong>
                                                                    <span>#2014</span>
                                                                </td>
                                                                <td class="account__table--body__child--items">
                                                                    <strong>Date</strong>
                                                                    <span>November 24, 2022</span>
                                                                </td>
                                                                <td class="account__table--body__child--items">
                                                                    <strong>Payment Status</strong>
                                                                    <span>Paid</span>
                                                                </td>
                                                                <td class="account__table--body__child--items">
                                                                    <strong>Fulfillment Status</strong>
                                                                    <span>Unfulfilled</span>
                                                                </td>
                                                                <td class="account__table--body__child--items">
                                                                    <strong>Total</strong>
                                                                    <span>$40.00 USD</span>
                                                                </td>
                                                            </tr>
                                                            <tr class="account__table--body__child">
                                                                <td class="account__table--body__child--items">
                                                                    <strong>Order</strong>
                                                                    <span>#2014</span>
                                                                </td>
                                                                <td class="account__table--body__child--items">
                                                                    <strong>Date</strong>
                                                                    <span>November 24, 2022</span>
                                                                </td>
                                                                <td class="account__table--body__child--items">
                                                                    <strong>Payment Status</strong>
                                                                    <span>Paid</span>
                                                                </td>
                                                                <td class="account__table--body__child--items">
                                                                    <strong>Fulfillment Status</strong>
                                                                    <span>Unfulfilled</span>
                                                                </td>
                                                                <td class="account__table--body__child--items">
                                                                    <strong>Total</strong>
                                                                    <span>$40.00 USD</span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <p>Xin vui lòng đăng nhập để có thể tiếp tục mua hàng!</p><a
                                            class="account__menu--list" href="{{ route('login') }}">Đăng nhập</a>
                @endif
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
