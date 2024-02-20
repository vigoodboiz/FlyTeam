<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('interface/assets/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('interface/assets/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('interface/assets/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('interface/assets/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('interface/assets/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('interface/assets/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('interface/assets/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('interface/assets/css/style.css') }}" type="text/css">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
</head>

<body class="antialiased">

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
    <script src="{{ asset('interface/assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('interface/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('interface/assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('interface/assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('interface/assets/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('interface/assets/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('interface/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('interface/assets/js/main.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
        $(document).ready(function() {
            var minPrice = 1;
            var maxPrice = 1000; // Giá trị theo product

            $("#slider").slider({
                range: true,
                min: 1,
                max: 1000,
                values: [minPrice, maxPrice],
                slide: function(event, ui) {
                    $("#price_range").val(ui.values[0] + " - " + ui.values[1]);
                },
                change: function(event, ui) {
                    $("#price_range").val(ui.values[0] + " - " + ui.values[1]);
                }
            });

            $("#price_range").val("$" + minPrice + " - " + "$" + maxPrice);
        });
    </script>
</body>

</html>
