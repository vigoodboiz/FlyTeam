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
<div class="chi">
<div class="chi1">
<div class="container">
    <div class="row">
        @foreach($members as $member)
        <div class="col-lg-6 mb-4">
            <div class="row no-gutters">
                <div class="col-lg-5">
                    <img src="https://via.placeholder.com/150" alt="Avatar" class="img-fluid rounded-circle">
                </div>
                <div class="col-lg-7">
                    <div class="card-body">
                        <h3 class="card-title display-3">{{ $member->name }}</h3>
                        <p class="card-text lead">Updated Date: {{ $member->updated_date }}</p>
                        <div class="points-container">
                            <span class="points display-1 text-dark">{{ $member->reward_points }}</span>
                            <span class="rank @if($member->reward_points < 50) bronze @elseif($member->reward_points < 100) silver @else gold @endif">
                                @if($member->reward_points < 50) Bạc @elseif($member->reward_points < 100) Vàng @else Kim Cương @endif
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>






</div>
</div>
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

    <div class="container">
        <h2>Chi tiết khách hàng</h2>
        <br>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Tên khách hàng</th>
                        <th>Ngày cập nhật</th>
                        <th>Điểm thưởng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($members as $member)
                        <tr>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->updated_date }}</td>
                            <td>{{ $member->points }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
