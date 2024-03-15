<!doctype html>
<html lang="en">


<!-- Mirrored from risingtheme.com/html/demo-becute/becute/product-gallery.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Feb 2024 17:34:11 GMT -->

<head>
    <meta charset="utf-8">
    <title>C.O.I Cosmestics - Product Gallery</title>
    <meta name="description" content="Morden Bootstrap HTML5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('becute/assets/img/logo/logo_main.png') }}">

    <!-- ======= All CSS Plugins here ======== -->
    <link rel="stylesheet" href="{{ asset('becute/assets/css/plugins/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('becute/assets/css/plugins/glightbox.min.css') }}">
    <link
        href="https://fonts.googleapis.com/css2?family=Frank+Ruhl+Libre:wght@300;400;500;700;900&amp;family=Karma:wght@300;400;500;600;700&amp;display=swap"
        rel="stylesheet">

    <!-- Plugin css -->
    <link rel="stylesheet" href="{{ asset('becute/assets/css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Custom Style CSS -->
    <link rel="stylesheet" href="{{ asset('becute/assets/css/style.css') }}">
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">


        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        .chi {
           
            font-family: Arial, sans-serif;
        }
        .chi1 {
            max-width: 1000px;
            margin: 50px auto;
        }
        .profile-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }
        .profile-card .avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            overflow: hidden;
            margin: 0 auto 20px;
        }
        .profile-card .avatar img {
            width: 100%;
            height: auto;
        }
        .profile-card h2 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
            text-align: center;
        }
        .profile-card p {
            font-size: 16px;
            color: #666;
            margin-bottom: 20px;
            text-align: center;
        }
        .profile-card .btn {
            width: 100%;
        }
    <style>
        .text-truncate {
            max-width: 200px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        .out-of-stock {
            filter: blur(5px);
            background-color: rgba(0, 0, 0, 0.5);
        }
        
        .product__card--thumbnail__container {
            position: relative;
        }

        .product__card--thumbnail__text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: black; 
            font-weight: bold;
            z-index: 2;
        }
        .product__card--thumbnail__text::after {
            content: "";
            position: absolute;
            bottom: -10px;
            left: -100px;
            width: 500px;
            height: 50px;
            background-color: rgba(0, 0, 0, 0.2); 

        }
    </style>
</head>

<body>
    {{-- @can('guest_access') --}}
    <!-- topbar -->
    <!-- topbar End -->
    @include('layouts.layoutMain.topbar');
    <!-- content -->
    <div>
        @yield('content')
    </div>
    <!-- end_content -->

    <!-- Footer Section Begin -->
    @include('layouts.layoutMain.footer')
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <!-- Scroll top bar -->
    <button id="scroll__top"><svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48"
                d="M112 244l144-144 144 144M256 120v292" />
        </svg></button>

    <!-- All Script JS Plugins here  -->
    <script src="{{ asset('becute/assets/js/vendor/popper.js') }}" defer="defer"></script>
    <script src="{{ asset('becute/assets/js/vendor/bootstrap.min.js') }}" defer="defer"></script>
    <script src="{{ asset('becute/assets/js/plugins/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('becute/assets/js/plugins/glightbox.min.js') }}"></script>


        <!-- All Script JS Plugins here  -->
        <script src="{{ asset('becute/assets/js/vendor/popper.js') }}" defer="defer"></script>
        <script src="{{ asset('becute/assets/js/vendor/bootstrap.min.js') }}" defer="defer"></script>
        <script src="{{ asset('becute/assets/js/plugins/swiper-bundle.min.js') }}"></script>
        <script src="{{ asset('becute/assets/js/plugins/glightbox.min.js') }}"></script>

        <!-- Customscript js -->
        <script src="{{ asset('becute/assets/js/script.js') }}"></script>
        <!-- fill price -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        @yield('price-range');
    </body>

    <!-- Customscript js -->
    <script src="{{ asset('becute/assets/js/script.js') }}"></script>
    <!-- fill price -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    @yield('price-range');
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        document.getElementById('delete-form').addEventListener('submit', function(event) {
            event.preventDefault();


            Swal.fire({
                title: 'Bạn có muốn xóa nó hay không?',
                text: "",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ok',
                cancelButtonText: 'Hủy'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form').submit();
                }
            }).catch((error) => {
                // Xử lý lỗi nếu có
                console.log(error);
            });
        });
    </script>
    <script>
        document.getElementById('delete-Form').addEventListener('submit', function(event) {
            event.preventDefault();

            Swal.fire({
                title: 'Bạn có muốn mua lại đơn hàng này không?',
                text: "",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ok',
                cancelButtonText: 'Hủy'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-Form').submit();
                }
            }).catch((error) => {
                // Xử lý lỗi nếu có
                console.log(error);
            });
        });
    </script>
    <script>
        @if (session('success'))
            Swal.fire({
                title: 'Thành công!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            });
        @elseif (session('error'))
            Swal.fire({
                title: 'có lỗi!',
                text: '{{ session('error') }}',
                icon: 'warning',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            });
        @endif
    </script>
    {{-- @endcan --}}
</body>
</html>
