@extends('admin.layouts.app')
            
@section('title','dashboard')
    
@section('content')
                <!-- begin app-main -->
            <div class="app-main" id="main">
                <!-- begin container-fluid -->
                <div class="container-fluid">
                    <!-- begin row -->
                    <div class="row">
                        <div class="col-md-12 m-b-30">
                            <!-- begin page title -->
                            <div class="d-block d-lg-flex flex-nowrap align-items-center">
                                <div class="page-title mr-4 pr-4 border-right">
                                    <h1>Main / <span class="text-secondary">Home</span></h1>
                                </div>
                                
                            </div>
                            <!-- end page title -->
                            @if (session('successMessage'))
                                <div class="my-3 text-success">{{session('successMessage')}}</div>
                            @endif
                            @if (session('errorMessage'))
                                <div class="my-3 text-success">{{session('errorMessage')}}</div>
                            @endif
                            <div class="page-content my-4">
                                <div class="container">
                                    @if ($home)
                                    <div style="max-width: 800px">
                                        <div class="row mb-3" >
                                            <div class="col-4 text-capitalize font-weight-bold">Your Name:</div>
                                            <div class="col-8">{{$home->name}}</div>
                                        </div>
                                        <div class="row mb-3" >
                                            <div class="col-4 text-capitalize font-weight-bold">Your title job:</div>
                                            <div class="col-8">{{$home->title}}</div>
                                        </div>
                                        <div class="row mb-3" >
                                            <div class="col-4 text-capitalize font-weight-bold">Your contact:</div>
                                            <div class="col-8">{{$home->contacts}}</div>
                                        </div>
                                        <div class="row mb-3" >
                                            <div class="col-4 text-capitalize font-weight-bold">Your picture:</div>
                                            <div class="col-8">
                                                <img src="{{asset('storage/'.$home->picture)}}" height="200" alt="picture of {{$home->name}}">
                                            </div>
                                        </div>
                                    </div>
                                        
                                        
                                    @else 
                                        <div class="text-info my-3">You dont set any information yet</div>
                                        
                                    @endif
                                    <a href="{{route('admin.dashboard.main.home.edit')}}" class="btn btn-info btn-sm my-3 text-capitalize">edit info</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-- end container-fluid -->
            </div>
            <!-- end app-main -->
@endsection
            