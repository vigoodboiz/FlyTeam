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
                                <li class="breadcrumb__content--menu__items"><span>Thông tin</span></li>
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
                    <h2 class="section__heading--maintitle">Xem hồ sơ của chúng tôi</h2>
                </div>
                @if (Auth::check())
                    <h2 class="section__heading--maintitle">Xin chào, {{ Auth::user()->name }}</h2><br>
                    <div class="my__account--section__inner border-radius-10 d-flex">
                        <div class="account__left--sidebar">
                            <h2 class="account__content--title mb-20">Hồ sơ của tôi</h2>
                            <ul class="account__menu">
                                @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
                                    <li class="account__menu--list"><a href="{{ route('dashboard') }}">Trang quản trị</a>
                                    </li>
                                @elseif(Auth::user()->role_id == 3)
                                    <li class="account__menu--list active"><a href="{{ route('portfolioPage') }}">Thông
                                            tin</a>
                                    </li>
                                    <li class="account__menu--list"><a href="{{ route('point') }}">Điểm
                                            thưởng</a>
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
                        <div class="container py-5">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="card mb-4">
                                        <div class="card-body text-center">
                                            @if (!empty(auth()->user()->profile_picture))
                                                <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}"
                                                    class="rounded-circle" alt="Profile Picture">
                                            @else
                                                <form action="{{ route('profile.update') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="file" name="profile_picture">
                                                    <button type="submit" class="btn btn-success">Tải lên</button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col-lg-8">
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">Mã khách hàng</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p class="text-muted mb-0" scope="row">
                                                        #1234{{ Auth::user()->id }}</p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">Tên khách hàng</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p class="text-muted mb-0">{{ Auth::user()->name }}</p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">Email</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p class="text-muted mb-0">{{ Auth::user()->email }}</p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">Số điện thoại</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p class="text-muted mb-0">{{ Auth::user()->phone }}</p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">Địa chỉ</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p class="text-muted mb-0">{{ Auth::user()->address }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <form action="{{ route('profile.update') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Cập nhật hồ sơ</button>
                                    </form>
                                </div> --}}
                                <div class="col-lg-8">
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <form id="profileForm" action="{{ route('profile.update') }}" method="POST">
                                                @csrf
                                                <div class="section__shipping--address__content">
                                                    <div class="row">
                                                        <div class="col-12 mb-20">
                                                            <div class="checkout__input--list">
                                                                <label class="checkout__input--label mb-10"
                                                                    for="input3">Họ và
                                                                    tên
                                                                    <span
                                                                        class="checkout__input--label__star">*</span></label>
                                                                <input class="checkout__input--field border-radius-5"
                                                                    value="{{ Auth::user()->name }}" id="nameDisplay"
                                                                    name="name" id="nameEdit" type="text" disabled>
                                                                <div id="nameEdit" style="display: none;">
                                                                    <input class="checkout__input--field border-radius-5"
                                                                        value="{{ Auth::user()->name }}" type="text"
                                                                        id="nameInput" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mb-20">
                                                            <div class="checkout__input--list">
                                                                <label class="checkout__input--label mb-10"
                                                                    for="input3">Email
                                                                    <span
                                                                        class="checkout__input--label__star">*</span></label>
                                                                <input class="checkout__input--field border-radius-5"
                                                                    value="{{ Auth::user()->email }}" name="email"
                                                                    id="emailDisplay" type="text" disabled>
                                                                <div id="emailEdit" style="display: none;">
                                                                    <input class="checkout__input--field border-radius-5"
                                                                        value="{{ Auth::user()->email }}" name="email"
                                                                        type="email" id="emailInput" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mb-20">
                                                            <div class="checkout__input--list">
                                                                <label class="checkout__input--label mb-10"
                                                                    for="input3">Số điện thoại
                                                                    <span
                                                                        class="checkout__input--label__star">*</span></label>
                                                                <input class="checkout__input--field border-radius-5"
                                                                    value="{{ Auth::user()->phone }}" name="phone"
                                                                    id="phoneDisplay" type="text" disabled>
                                                                <div id="phoneEdit" style="display: none;">
                                                                    <input class="checkout__input--field border-radius-5"
                                                                        value="{{ Auth::user()->phone }}" name="phone"
                                                                        type="email" id="phoneInput" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mb-20">
                                                            <div class="checkout__input--list">
                                                                <label class="checkout__input--label mb-10"
                                                                    for="input4">Địa
                                                                    chỉ
                                                                    <span
                                                                        class="checkout__input--label__star">*</span></label>
                                                                <input id="addressDisplay"
                                                                    class="checkout__input--field border-radius-5"
                                                                    value="{{ Auth::user()->address }}" name="address"
                                                                    type="text" disabled>
                                                                <div id="addressEdit" style="display: none;">
                                                                    <input class="checkout__input--field border-radius-5"
                                                                        value="{{ Auth::user()->address }}"
                                                                        name="address" type="text" id="addressInput"
                                                                        readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>

                                    </div>
                                    <div class="cart__summary--footer">
                                        <ul class="d-flex justify-content-between">

                                            <li><button type="submit" id="saveProfileBtn" style="display: none;"
                                                    class="cart__summary--footer__btn primary__btn checkout">Lưu hồ sơ
                                                </button></li>
                                            </form>
                                            <li><button id="toggleEditBtn"
                                                    class="cart__summary--footer__btn primary__btn cart">Cập nhật
                                                    hồ sơ</button></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="breadcrumb__section breadcrumb__bg">
                                <div class="container">
                                    <div class="row row-cols-1">
                                        <div class="col">
                                            <div class="breadcrumb__content text-center">
                                                <p>Xin vui lòng đăng nhập để có thể tiếp tục mua hàng!</p><a
                                                    class="account__menu--list" href="{{ route('login') }}">Đăng
                                                    nhập</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
    <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#toggleEditBtn').click(function() {
                var editMode = $(this).data('edit');

                if (!editMode) {
                    $(this).text('Hủy chỉnh sửa').data('edit', true);
                    $('#saveProfileBtn').show();
                    $('#nameInput').removeAttr('readonly').val($('#nameDisplay').text());
                    $('#emailInput').removeAttr('readonly').val($('#emailDisplay').text());
                    $('#phoneInput').removeAttr('readonly').val($('#phoneDisplay').text());
                    $('#addressInput').removeAttr('readonly').val($('#addressDisplay').text());
                    $('#nameDisplay, #emailDisplay, #phoneDisplay, #addressDisplay').hide();
                    $('#nameEdit, #emailEdit, #phoneEdit, addressEdit').show();
                } else {
                    $(this).text('Cập nhật hồ sơ').data('edit', false);
                    $('#saveProfileBtn').hide();
                    $('#nameInput').attr('readonly', true);
                    $('#emailInput').attr('readonly', true);
                    $('#phoneInput').attr('readonly', true);
                    $('#addressInput').attr('readonly', true);
                    $('#nameDisplay, #emailDisplay, #phoneDisplay, #addressDisplay').show();
                    $('#nameEdit, #emailEdit, #phoneEdit, addressEdit').hide();
                }
            });

            $('#saveProfileBtn').click(function() {
                // Thực hiện lưu hồ sơ (cập nhật trên server)
                var newName = $('#nameInput').val();
                var newEmail = $('#emailInput').val();
                var newPhone = $('#phoneInput').val();
                var newAddress = $('#addressInput').val();

                // Thực hiện lưu các thay đổi vào cơ sở dữ liệu
                $('#nameDisplay').text(newName);
                $('#emailDisplay').text(newEmail);
                $('#phoneDisplay').text(newPhone);
                $('#addressDisplay').text(newAddress);

                // Ẩn trường nhập dữ liệu
                $('#nameEdit').hide();
                $('#emailEdit').hide();
                $('#phoneEdit').hide();
                $('#addressEdit').hide();

                // Hiển thị lại các giá trị đã cập nhật
                $('#nameDisplay').show();
                $('#emailDisplay').show();
                $('#phoneDisplay').show();
                $('#addressDisplay').show();

                // Đặt trạng thái chỉnh sửa về false và ẩn nút "Lưu hồ sơ"
                $('#toggleEditBtn').text('Cập nhật hồ sơ').data('edit', false);
                $('#saveProfileBtn').hide();
            });
        });
    </script>
@endsection
