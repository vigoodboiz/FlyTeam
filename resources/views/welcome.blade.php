<!doctype html>
<html lang="en">


<!-- Mirrored from risingtheme.com/html/demo-becute/becute/product-gallery.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Feb 2024 17:34:11 GMT -->

<head>
    <meta charset="utf-8">
    <title>Becute - Product Gallery</title>
    <meta name="description" content="Morden Bootstrap HTML5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- ======= All CSS Plugins here ======== -->
    <link rel="stylesheet" href="{{asset('becute/assets/css/plugins/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('becute/assets/css/plugins/glightbox.min.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Frank+Ruhl+Libre:wght@300;400;500;700;900&amp;family=Karma:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">

    <!-- Plugin css -->
    <link rel="stylesheet" href="{{asset('becute/assets/css/vendor/bootstrap.min.css')}}">

    <!-- Custom Style CSS -->
    <link rel="stylesheet" href="{{asset('becute/assets/css/style.css')}}">
</head>

<body>

    <body>
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
                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M112 244l144-144 144 144M256 120v292" />
            </svg></button>

        <!-- All Script JS Plugins here  -->
        <script src="{{asset('becute/assets/js/vendor/popper.js')}}" defer="defer"></script>
        <script src="{{asset('becute/assets/js/vendor/bootstrap.min.js')}}" defer="defer"></script>
        <script src="{{asset('becute/assets/js/plugins/swiper-bundle.min.js')}}"></script>
        <script src="{{asset('becute/assets/js/plugins/glightbox.min.js')}}"></script>

        <!-- Customscript js -->
        <script src="{{asset('becute/assets/js/script.js')}}"></script>
    </body>

</html>