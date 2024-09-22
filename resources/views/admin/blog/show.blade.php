@extends('admin.layouts.app')
@section('title','dashboard mail')
    
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
                                        <h1><a href="{{route('admin.dashboard.blog.index')}}">Blog</a> / <span class="text-secondary">{{$blog->title}}</span></h1>
                                    </div>
                                    <div class="ml-auto d-flex align-items-center">
                                        <nav>
                                            <ol class="breadcrumb p-0 m-b-0">
                                                <li class="breadcrumb-item">
                                                    <a href="{{route('admin.dashboard.index')}}"><i class="ti ti-home"></i></a>
                                                </li>
                                                <li class="breadcrumb-item active text-primary" aria-current="page">Blog</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                                <!-- end page title -->
                            </div>
                        </div>
                        @if (session('successMessage'))
                            <div class="text-success my-3 font-weight-bold">
                                {{session('successMessage')}}
                            </div>
                        @endif
                        <h2 class="text-center text-primary">{{$blog->title}}</h2>
                        <div class="text-center my-3">
                            <img src="{{asset('storage/'.$blog->picture)}}" alt="{{$blog->title}} picture">
                        </div>
                        <div class="my-3 content">
                            {!!$blog->content!!}
                        </div>
                        @if ($blog->categories && count($blog->categories))
                            <div class="my-3 categories row bg-secondary py-2 rounded">
                                <div class="col-md-2 mb-3 mb-md-0 text-uppercase text-white font-weight-bold">categories: </div>
                                <div class="col-md-10 mb-3 mb-md-0">
                                    @foreach ($blog->categories as $category)
                                        <span class="mx-2 text-uppercase text-info font-weight-bold">{{$category->name}}</span>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        
                        <!-- end row -->
                        
                    </div>
                    <!-- end container-fluid -->
                </div>
                <!-- end app-main -->

                    
@endsection
@section('special-script')

@endsection