@extends('admin.layouts.app')
@section('title','dashboard account setting')
    
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
                                        <h1 class="text-primary text-capitalize">account settings</h1>
                                    </div>
                                    <div class="ml-auto d-flex align-items-center">
                                        <nav>
                                            <ol class="breadcrumb p-0 m-b-0">
                                                <li class="breadcrumb-item">
                                                    <a href="{{route('admin.dashboard.index')}}"><i class="ti ti-home"></i></a>
                                                </li>
                                                <li class="breadcrumb-item active text-primary" aria-current="page">Account Settings</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                                <!-- end page title -->
                            </div>
                        </div>
                        <!-- end row -->
                        @if (session('successMessage'))
                            <strong class="my-3 d-block text-success">{{session('successMessage')}}</strong>
                        @endif
                        <!--mail-Compose-contant-start-->
                        <div class="row account-contant">
                            <div class="col-12">
                                <div class="card card-statistics">
                                    <div class="card-body p-0">
                                        <div class="row no-gutters">
                                            <div class="col-xl-4 pb-xl-0 pb-5 border-right">
                                                <div class="page-account-profil pt-5">
                                                    <div class="profile-img text-center rounded-circle">
                                                        <div class="pt-5">
                                                            
                                                                @if ($admin && $admin->picture)
                                                                <div class="bg-img m-auto">
                                                                    <form action="{{route('admin.dashboard.update_picture_admin',$admin->id)}}" method="POST" class="my-3" enctype="multipart/form-data">
                                                                        @csrf
                                                                        <input type="file" name="picture" id="picture" style="display: none">
                                                                        
                                                                        <label for="picture" style="cursor: pointer" class="img-fluid">
                                                                            <img src="{{asset('storage/'.$admin->picture)}}" class="img-fluid" alt="image of {{$admin->name}}" title="click to change the picture">
                                                                        </label>
                                                                    </form>
                                                                    
                                                                </div>
                                                                @else 
                                                                <form action="{{route('admin.dashboard.update_picture_admin',$admin->id)}}" method="POST" class="my-3" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <input type="file" name="picture" id="picture" style="display: none">
                                                                    <label for="picture" class="border rounded-circle px-2 py-5" style="cursor: pointer">chose a picture</label>
                                                                </form>
                                                                @endif
                                                            
                                                            <div class="profile pt-4">
                                                                <h4 class="mb-1">{{$admin->name}}</h4>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="py-5 profile-counter">
                                                        <ul class="nav justify-content-center text-center">
                                                            <li class="nav-item border-right px-3">
                                                                <div>
                                                                    <h4 class="mb-0">
                                                                        @if ($blogs_count)
                                                                            {{$blogs_count}}
                                                                        @endif
                                                                    </h4>
                                                                    <p>Post</p>
                                                                </div>
                                                            </li>

                                                            <li class="nav-item  px-3">
                                                                <div>
                                                                    <h4 class="mb-0">{{$messages}}</h4>
                                                                    <p>Messages</p>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-8 col-md-6 col-12 border-t border-right">
                                                <div class="page-account-form">
                                                    <div class="form-titel border-bottom p-3">
                                                        <h5 class="mb-0 py-2">Edit Your Personal Settings</h5>
                                                    </div>
                                                    <div class="p-4">
                                                        <form action="{{route('admin.dashboard.update_admin',$admin->id)}}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="form-row">
                                                                <div class="form-group col-md-12">
                                                                    <label for="name">Full Name</label>
                                                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{$admin->name}}">
                                                                </div>
                                                                @if ($errors->has('name'))
                                                                    <strong class="text-danger mb-3">{{ $errors->first('name') }}</strong>
                                                                @endif
                                                                <div class="form-group col-md-12">
                                                                    <label for="email">Email</label>
                                                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{$admin->email}}">
                                                                </div>
                                                                @if ($errors->has('email'))
                                                                    <strong class="text-danger mb-3">{{ $errors->first('email') }}</strong>
                                                                @endif
                                                                <div class="form-group col-md-12">
                                                                    <label for="brand">Brand</label>
                                                                    <div class="ml-3">
                                                                        <label for="brand_image">Brand Image</label>
                                                                        @if ($brand)
                                                                            <div class="d-flex align-items-center justify-content-center my-2">
                                                                                <span class="text-uppercase mr-3">current brand =></span>
                                                                                <img src="{{asset('storage/'.$brand->picture)}}" width="50" alt="">
                                                                            </div>
                                                                        @endif
                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                                                <div class="input-group-text">
                                                                                    <input type="checkbox" name="brand_image_check" @if($brand && $brand->name) checked @endif value="1">
                                                                                </div>
                                                                            </div>
                                                                            <input type="file" name="brand_image" id="brand_image" class="form-control">        
                                                                        </div>
                                                                    </div>
                                                                    @if ($errors->has('brand_image'))
                                                                        <strong class="text-danger mb-3">{{ $errors->first('brand_image') }}</strong>
                                                                    @endif
                                                                    <div class="ml-3 my-3">
                                                                        <label for="brand_text my-2">Brand Text</label>
                                                                       
                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                                                <div class="input-group-text">
                                                                                    <input type="checkbox" name="brand_text_check"  @if($brand && $brand->description) checked @endif value="1">
                                                                                </div>
                                                                            </div>
                                                                            <input type="text" name="brand_text" id="brand_text" value="@if($brand) {{$brand->title}} @endif" placeholder="Enter your brand text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    @if ($errors->has('brand_text'))
                                                                        <strong class="text-danger mb-3">{{ $errors->first('brand_text') }}</strong>
                                                                    @endif
                                                                </div>
                                                                @if (session('errorMessage'))
                                                                    <string class="text-danger my-2">{{session('errorMessage')}}</string>
                                                                @endif
                                                                
                                                            </div>
                                                            <button type="submit" class="btn btn-primary mt-5">Update Information</button>
                                                            <a href="{{route('admin.dashboard.keys.index')}}" class="d-block my-3 text-capitalize"> <i class="fa fa-lock"></i> manage admin key</a>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--mail-Compose-contant-end-->
                    </div>
                    <!-- end container-fluid -->
                </div>
                <!-- end app-main -->
      
@endsection     
@section('special-script')
    <script>
        $(document).ready(function(){
            $('input#picture').change(function(){
                $(this).parent('form').submit();
            })
        })
    </script>
@endsection    