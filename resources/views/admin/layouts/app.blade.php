<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="dashboard to amine mokeddem portfolio webiste" />
    <meta name="author" content="Amine Mokeddem" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- app favicon -->
    @if ($logo)
    <link rel="shortcut icon" href="{{asset("storage/".$logo->picture)}}">
    @endif
    
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <!-- plugin stylesheets -->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/vendors.css')}}" />
    <!-- app style -->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/style.css')}}" />
    {{-- main style --}}
    <link rel="stylesheet" href="{{asset('admin.assets/css/main.css')}}" />

    {{-- alert swal style --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <title>@yield('title','dashboard')</title>
</head>
<body>

        <!-- begin app -->
        <div class="app">
            <!-- begin app-wrap -->
            <div class="app-wrap">
                <!-- begin pre-loader -->
                <div class="loader">
                    <div class="h-100 d-flex justify-content-center">
                        <div class="align-self-center">
                            <img src="{{asset('admin/assets/img/loader/loader.svg')}}" alt="loader">
                        </div>
                    </div>
                </div>
                <!-- end pre-loader -->
                @include('admin.layouts.navbar')
                <div class="app-container">
                @include('admin.layouts.sidebar')
                @yield('content')
                </div>

            <!-- begin footer -->
            <footer class="footer">
                <div class="row">
                    <div class="col-12 col-sm-6 text-center text-sm-left">
                        <p>&copy; Copyright <?php echo date('Y'); ?>. All rights reserved.</p>
                    </div>
                
                </div>
            </footer>
            <!-- end footer -->
        </div>
        <!-- end app-wrap -->
        </div>
        <!-- end app -->

<!-- plugins -->
    <script src="{{asset('admin/assets/js/vendors.js')}}"></script>

    <!-- custom app -->
    <script src="{{asset('admin/assets/js/app.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <script src="{{asset('admin/assets/js/main.js')}}"></script>
    @yield('special-script')
</body>
</html>