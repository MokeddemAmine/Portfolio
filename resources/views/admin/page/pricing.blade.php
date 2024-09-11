@extends('admin.layouts.app')
@section('title','dashboard pricing')
    
@section('content')
                <!-- begin app-main -->
                <div class="app-main" id="main">
                    <!-- begin container-fluid -->
                    <div class="container-fluid">
                        <!-- begin row -->
                        <div class="row">
                            <div class="col-md-12 m-b-30">
                                <!-- begin page title -->
                                <div class="d-block d-sm-flex flex-nowrap align-items-center">
                                    <div class="page-title mb-2 mb-sm-0">
                                        <h1>Pricing</h1>
                                    </div>
                                    <div class="ml-auto d-flex align-items-center">
                                        <nav>
                                            <ol class="breadcrumb p-0 m-b-0">
                                                <li class="breadcrumb-item">
                                                    <a href="index.html"><i class="ti ti-home"></i></a>
                                                </li>
                                                <li class="breadcrumb-item">
                                                    Pages
                                                </li>
                                                <li class="breadcrumb-item active text-primary" aria-current="page">Pricing</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                                <!-- end page title -->
                            </div>
                        </div>
                        <!-- end row -->

                        <!--pricing-contant-start-->
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card card-statistics text-center py-3">
                                    <div class="card-body pricing-content">
                                        <div class="pricing-content-card">
                                            <h5>Premium</h5>
                                            <h2 class="text-primary pt-3">$150</h2>
                                            <p class="text-primary pb-3">/ Monthly</p>
                                            <ul class="py-2">
                                                <li>post jobs</li>
                                                <li>advanced instructors search</li>
                                                <li>invite candidates</li>
                                                <li>post events</li>
                                                <li>cancel any time</li>
                                            </ul>
                                            <div class="pt-2"><a href="javascript:void(0)" class="btn btn-primary btn-round btn-sm">go premium</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card card-statistics text-center py-3">
                                    <div class="card-body pricing-content">
                                        <div class="pricing-content-card">
                                            <h5>basic</h5>
                                            <h2 class="text-primary pt-3">$130</h2>
                                            <p class="text-primary pb-3">/ Monthly</p>
                                            <ul class="py-2">
                                                <li>post jobs</li>
                                                <li>advanced instructors search</li>
                                                <li>invite candidates</li>
                                                <li>post events</li>
                                                <li>cancel any time</li>
                                            </ul>
                                            <div class="pt-2"><a href="javascript:void(0)" class="btn btn-inverse-secondary btn-round btn-sm">go premium</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card card-statistics text-center py-3">
                                    <div class="card-body pricing-content">
                                        <div class="pricing-content-card">
                                            <h5>starter</h5>
                                            <h2 class="text-primary pt-3">$100</h2>
                                            <p class="text-primary pb-3">/ Monthly</p>
                                            <ul class="py-2">
                                                <li>post jobs</li>
                                                <li>advanced instructors search</li>
                                                <li>invite candidates</li>
                                                <li>post events</li>
                                                <li>cancel any time</li>
                                            </ul>
                                            <div class="pt-2"><a href="javascript:void(0)" class="btn btn-inverse-secondary btn-round btn-sm">go premium</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card card-statistics text-center py-3">
                                    <div class="card-body pricing-content">
                                        <div class="pricing-content-card">
                                            <h5>small</h5>
                                            <h2 class="text-primary pt-3">$80</h2>
                                            <p class="text-primary pb-3">/ Monthly</p>
                                            <ul class="py-2">
                                                <li>post jobs</li>
                                                <li>advanced instructors search</li>
                                                <li>invite candidates</li>
                                                <li>post events</li>
                                                <li>cancel any time</li>
                                            </ul>
                                            <div class="pt-2"><a href="javascript:void(0)" class="btn btn-inverse-secondary btn-round btn-sm">go premium</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--pricing-contant-end-->


                        <!--pricing-contant 2-start-->
                        <div class="row">
                            <div class="col-xl-4">
                                <div class="card card-statistics text-center py-5">
                                    <div class="card-body pricing-content">
                                        <div class="pricing-content-card">
                                            <h5>Premium</h5>
                                            <h2 class="text-primary pt-3">$150</h2>
                                            <p class="text-primary pb-3">/ Monthly</p>
                                            <ul class="py-2">
                                                <li>post jobs</li>
                                                <li>advanced instructors search</li>
                                                <li>invite candidates</li>
                                                <li>post events</li>
                                                <li>cancel any time</li>
                                            </ul>
                                            <div class="pt-2"><a href="javascript:void(0)" class="btn btn-inverse-secondary btn-round btn-sm">go premium</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4">
                                <div class="card card-statistics text-center pricing-highlight py-5">
                                    <div class="card-body pricing-content">
                                        <div class="pricing-content-card">
                                            <h5>starter</h5>
                                            <h2 class="text-primary pt-3">$100</h2>
                                            <p class="text-primary pb-3">/ Monthly</p>
                                            <ul class="py-2">
                                                <li>post jobs</li>
                                                <li>advanced instructors search</li>
                                                <li>invite candidates</li>
                                                <li>post events</li>
                                                <li>cancel any time</li>
                                            </ul>
                                            <div class="pt-2"><a href="javascript:void(0)" class="btn btn-warning btn-round btn-sm">go premium</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4">
                                <div class="card card-statistics text-center py-5">
                                    <div class="card-body pricing-content">
                                        <div class="pricing-content-card">
                                            <h5>small</h5>
                                            <h2 class="text-primary pt-3">$80</h2>
                                            <p class="text-primary pb-3">/ Monthly</p>
                                            <ul class="py-2">
                                                <li>post jobs</li>
                                                <li>advanced instructors search</li>
                                                <li>invite candidates</li>
                                                <li>post events</li>
                                                <li>cancel any time</li>
                                            </ul>
                                            <div class="pt-2"><a href="javascript:void(0)" class="btn btn-inverse-secondary btn-round btn-sm">go premium</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--pricing-contant 2-end-->


                    </div>
                    <!-- end container-fluid -->
                </div>
                <!-- end app-main -->
@endsection