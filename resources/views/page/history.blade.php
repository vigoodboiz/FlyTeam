@extends('welcome')

@section('content')
    <style>
        .nav-item {
            width: 20%;
            font-size: 20px;
        }

        .nav-item a {
            color: black;
        }

        .nav-item a:hover {
            color: brown;
        }

        .badge {
            color: black;
        }
    </style>
    <main class="main__content_wrapper">
        <!-- Start breadcrumb section -->
        <div class="breadcrumb__section breadcrumb__bg">
            <div class="container">
                <div class="row row-cols-1">
                    <div class="col">
                        <div class="breadcrumb__content text-center">
                            <ul class="breadcrumb__content--menu d-flex justify-content-center">
                                <li class="breadcrumb__content--menu__items"><a href="{{ route('home') }}">Trang chủ</a></li>
                                <li class="breadcrumb__content--menu__items"><span>Lịch sử đơn hàng</span></li>
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
            <h2 class="cart__title mb-30">Đơn hàng của bạn</h2>
            <br>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('history') }}">Chờ xác nhận
                        @if ($historyCount > 0)
                            <span class="badge badge-pill badge-dark">{{ $historyCount }}</span>
                        @endif
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('confirmed') }}">Đã xác nhận
                        @if ($confirmedCount > 0)
                            <span class="badge badge-pill badge-dark">{{ $confirmedCount }}</span>
                        @endif
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('delivery') }}">Đang giao hàng
                        @if ($deliveryCount > 0)
                            <span class="badge badge-pill badge-dark">{{ $deliveryCount }}</span>
                        @endif
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('canceled') }}">Đã hủy đơn hàng
                        @if ($canceledCount > 0)
                            <span class="badge badge-pill badge-dark">{{ $canceledCount }}</span>
                        @endif
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('success') }}">Đã hoàn thành
                        @if ($successCount > 0)
                            <span class="badge badge-pill badge-dark">{{ $successCount }}</span>
                        @endif
                    </a>
                </li>
            </ul>
            <br>
            @if ($orders->isEmpty())
                <h4 style="text-align: center; color: red;">Bạn chưa có đơn hàng nào cả!</h4>
            @else
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Stt</th>
                            <th>Ảnh sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Tổng tiền</th>
                            <th>Ghi chú</th>
                            {{-- <th>Trạng thái đơn hàng</th>
                            <th>Trạng thái giao hàng</th> --}}
                            <th>Ngày đặt hàng</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $item)
                            @if ($item->payment_status === 'Đang xác nhận' && $item->delivery_status === 'Đang xử lý')
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>

                                        <img class="border-radius-5" width="100"
                                            src="{{ asset('upload/public/images/' . $item->product->image) }}"
                                            alt="cart-product">
                                    </td>
                                    <td class="text-truncate">{{ $item->product->name }}</td>
                                    @if (isset($item->product->price_sale) && $item->product->price_sale > 0)
                                        <td>{{ $item->product->price_sale }}đ</td>
                                    @else
                                        <td>{{ $item->product->price }}đ</td>
                                    @endif
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->total_price }}đ</td>
                                    <td>{{ $item->note }}</td>
                                    {{-- <td>{{ $item->payment_status }}</td>
                                    <td>{{ $item->delivery_status }}</td> --}}
                                    <td>{{ $item->created_at->format('d/m/Y H:i:s') }}</td>
                                    <td>
                                        <div class="d-flex align-items-center list-action">
                                            @if ($item->payment_status === 'Đang xác nhận' && $item->delivery_status === 'Đang xử lý')
                                                <form action="{{ route('orders.cancel', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('POST')
                                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                                        data-target="#cancelOrderModal">
                                                        Hủy Đơn Hàng
                                                    </button>
                                                    <div class="modal fade" id="cancelOrderModal" tabindex="-1"
                                                        role="dialog" aria-labelledby="cancelOrderModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="cancelOrderModalLabel">Hủy
                                                                        Đơn Hàng #1234{{ $item->id }}</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{ route('orders.cancel', $item->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('POST')
                                                                        <div class="form-group">
                                                                            <label for="reason">Lí do hủy đơn
                                                                                hàng:</label>
                                                                            <textarea class="form-control" id="reason" name="reason" rows="3" required></textarea>
                                                                        </div>
                                                                        <br>
                                                                        <button type="submit" class="btn btn-danger">Hủy
                                                                            Đơn Hàng</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            @elseif($item->payment_status === 'Đã thanh toán' && $item->delivery_status === 'Đang xử lý')
                                                <form action="{{ route('orders.cancel', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('POST')
                                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                                        data-target="#cancelOrderModal">
                                                        Hủy Đơn Hàng
                                                    </button>
                                                    <div class="modal fade" id="cancelOrderModal" tabindex="-1"
                                                        role="dialog" aria-labelledby="cancelOrderModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="cancelOrderModalLabel">Hủy
                                                                        Đơn Hàng #1234{{ $item->id }}</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{ route('orders.cancel', $item->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('POST')
                                                                        <div class="form-group">
                                                                            <label for="reason">Lí do hủy đơn
                                                                                hàng:</label>
                                                                            <textarea class="form-control" id="reason" name="reason" rows="3" required></textarea>
                                                                        </div>
                                                                        <br>
                                                                        <button type="submit" class="btn btn-danger">Hủy
                                                                            Đơn Hàng</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
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
                            <div class="feature__inner d-flex justify-content-between">
                                <div class="feature__items d-flex align-items-center">
                                    <div class="feature__icon">

                                        <img src="{{ asset('becute/assets/img/other/feature1.webp') }}" alt="img">
                                    </div>
                                    <div class="feature__content">
                                        <h2 class="feature__content--title h3">Miễn phí vận chuyển</h2>
                                        <p class="feature__content--desc">Miễn phí vận chuyển cho đơn hàng trên 2.000.000đ
                                        </p>

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
                    </div>
                </div>
            </div>
        </div>

    </main>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
