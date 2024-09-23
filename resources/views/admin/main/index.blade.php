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
                                    <h1 class="text-primary"><a href="{{route('admin.dashboard.main.index')}}">Main</a></h1>
                                </div>
                                
                            </div>
                            <!-- end page title -->
                            <ul class="list-unstyled my-3 ml-3">
                                <li><a href="{{route('admin.dashboard.main.home.index')}}" class="text-uppercase text-primary my-2 d-inline-block">home</a></li>
                                <li><a href="{{route('admin.dashboard.main.about.index')}}" class="text-uppercase text-primary my-2 d-inline-block">about</a></li>
                                <li><a href="{{route('admin.dashboard.main.resume.index')}}" class="text-uppercase text-primary my-2 d-inline-block">resume</a></li>
                                <li><a href="{{route('admin.dashboard.main.contact.index')}}" class="text-uppercase text-primary my-2 d-inline-block">contact</a></li>
                            </ul>
                        </div>
                    </div>
                    
                </div>
                <!-- end container-fluid -->
            </div>
            <!-- end app-main -->
@endsection
            