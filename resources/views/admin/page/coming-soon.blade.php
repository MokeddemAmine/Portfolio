@extends('admin.layouts.app-auth')
@section('title','dashboard coming soon')
    
@section('content')
            <!--start login contant-->
            <div class="app-contant">
                <div class="bg-white comingsoon">
                    <div class="container-fluid p-0">
                        <div class="row no-gutters">
                            <div class="col-lg-6 align-self-center bg-gradient">
                                <div class="d-flex align-items-center h-100-vh">
                                    <div class="comingsoon-wrap w-100">
                                        <div class="row no-gutters align-items-center justify-content-center">
                                            <div class="col-md-10 text-center m-b-40">

                                                <!-- Coming soon text -->
                                                <div class="px-5">
                                                    <h2 class="text-white display-3 font-weight-normal">We are Coming soon</h2>
                                                    <span class="text-white">We are currently working on a website and won't take long. Don't forget to check out our Social updates.</span>
                                                </div>

                                                <!-- Count down -->
                                                <ul class="my-5 text-center list-inline">
                                                    <li class="list-inline-item mx-4 text-white">
                                                        <p class="text-white display-3 font-weight-normal" id="days"></p> <span class="font-20"> Days</span>
                                                    </li>
                                                    <li class="list-inline-item mx-4 text-white">
                                                        <p class="text-white display-3 font-weight-normal" id="hours"></p> <span class="font-20"> Hours</span>
                                                    </li>
                                                    <li class="list-inline-item mx-4 text-white">
                                                        <p class="text-white display-3 font-weight-normal" id="minutes"></p> <span class="font-20"> Minutes</span>
                                                    </li>
                                                    <li class="list-inline-item mx-4 text-white">
                                                        <p class="text-white display-3 font-weight-normal" id="seconds"></p> <span class="font-20"> Seconds</span>
                                                    </li>
                                                </ul>

                                                <!-- newsletter -->
                                                <div class="row no-gutters">
                                                    <div class="col-md-7 mx-auto">
                                                        <p class="text-white">Provide your email address & we will notify you when site is ready</p>
                                                        <form class="px-5 mt-3">
                                                            <input type="email" class="form-control bg-white-inverse" placeholder="Email address">
                                                        </form>
                                                        <div class="mt-3"><a href="#" class="btn btn-inverse-light"> Get notified </a></div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 align-self-end">
                                <img class="img-fluid" src="{{asset('admin/assets/img/bg/coming-soon-bg.svg')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end login contant-->
            @endsection