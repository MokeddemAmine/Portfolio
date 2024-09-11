@extends('admin.layouts.app-auth')
@section('title','dashboard auth lockscreen')
    
@section('content')
            <div class="app-contant">
                <div class="bg-white">
                    <div class="container-fluid p-0">
                        <div class="row no-gutters">
                            <div class="col-sm-6 col-lg-5 col-xl-3  align-self-center order-2 order-sm-1">
                                <div class="d-flex align-items-center h-100-vh">
                                    <div class="login p-50 w-100">
                                        <div class="bg-img">
                                            <img src="{{asset('admin/assets/img/avtar/01.jpg')}}" class="img-fluid" alt="Clients-01">
                                        </div>
                                        <h4 class="mt-4">Michael Bean</h4>
                                        <span class="mt-1"><i class="fa fa-lock"></i> Locked</span>
                                        <p class="mt-4 mb-0">You must enter your password to access admin screen</p>
                                        <div class="input-group my-3">
                                            <input type="text" class="form-control" placeholder="Enter Password" aria-label="" aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2"><i class="fa fa-unlock"></i></span>
                                            </div>
                                        </div>
                                        <p class="mt-4 mb-0">Or sign in as a <a class="text-primary" href="auth-login.html">Different user</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-9 col-lg-7 bg-gradient o-hidden order-1 order-sm-2">
                                <div class="row align-items-center h-100">
                                    <div class="col-7 mx-auto ">
                                        <img class="img-fluid" src="assets/img/bg/login.svg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end login contant-->
@endsection