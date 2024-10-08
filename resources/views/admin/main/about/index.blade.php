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
                                    <h1 class="text-primary"><a href="{{route('admin.dashboard.main.index')}}">Main</a> / <span class="text-secondary">About</span></h1>
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
                                    @if ($about)
                                    <div style="max-width: 800px">
                                        
                                        <div class="row mb-3" >
                                            <div class="col-4 text-capitalize font-weight-bold">Your title job:</div>
                                            <div class="col-8">{{$about->title}}</div>
                                        </div>
                                        <div class="row mb-3" >
                                            <div class="col-4 text-capitalize font-weight-bold">Your decription:</div>
                                            <div class="col-8">{{$about->description}}</div>
                                        </div>
                                        <div class="row mb-3" >
                                            <div class="col-4 text-capitalize font-weight-bold">Your picture:</div>
                                            <div class="col-8">
                                                <img src="{{asset('storage/'.$about->picture)}}" height="200" alt="picture of {{$about->name}}">
                                            </div>
                                        </div>
                                    </div>
                                        
                                        
                                    @else 
                                        <div class="text-info my-3">You dont set any information yet</div>
                                        
                                    @endif
                                    <a href="{{route('admin.dashboard.main.about.edit')}}" class="btn btn-primary btn-sm my-3 text-capitalize">edit info</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-- end container-fluid -->
            </div>
            <!-- end app-main -->
@endsection
            