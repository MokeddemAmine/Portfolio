<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="{{asset('assets/images/favicon.png')}}">
    <title>@yield('title')</title>

    <!-- font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,500i,700,900&amp;display=swap" rel="stylesheet">
    <!-- end font -->

    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/fakeLoader.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

</head>

<body>

    <!-- loader -->
    <div class="fakeLoader"></div>
    <!-- loader -->
    @include('layouts.navbar')
    @yield('content')

     <!-- footer -->
     <div class="footer segments">
        <div class="container">
            <div class="box-content">
                <p><a href="{{route('home')}}" class="text-uppercase" target="_blank">&copy; <?php echo date('Y'); ?> . All right reserved <span class="text-danger">Mokeddem Amine</span></a></p>
            </div>
        </div>
    </div>
    <!-- end footer -->

    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/fakeLoader.min.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.filterizr.min.js')}}"></script>
    <script src="{{asset('assets/js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('assets/js/contact-form.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
    @yield('special-script')

</body>

</html>