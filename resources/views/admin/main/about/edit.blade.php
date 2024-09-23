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
                                    <h1 class="text-primary"><a href="{{route('admin.dashboard.main.index')}}">Main</a> / <a href="{{route('admin.dashboard.main.about.index')}}">About</a> / <span class="text-secondary">edit</span> </h1>
                                </div>
                                
                            </div>
                            <!-- end page title -->
                            <div class="page-content my-4">
                                <div class="container">
                                    
                                    <form action="{{route('admin.dashboard.main.about.store')}}" method="POST" style="max-width: 600px" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row align-items-center mb-3">
                                            <label for="title" class="col-md-4 text-capitalize">title</label>
                                            <div class="col-md-8">
                                                <input type="text" name="title" value="@if($about) {{$about->title}} @endif" placeholder="Enter title job" id="title" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center mb-3">
                                            <label for="descriptin" class="col-md-4 text-capitalize">description</label>
                                            <div class="col-md-8">
                                                <textarea name="description" id="description" cols="30" rows="10" class="form-control">@if($about) {{$about->description}} @endif</textarea>
                                                
                                            </div>
                                        </div>
                                        @if ($about && $about->picture)
                                        <div class="form-group row align-items-center mb-3">
                                            <label for="picture" class="col-md-4 text-capitalize">current picture</label>
                                            <div class="col-md-8">
                                                <img src="{{asset('storage/'.$about->picture)}}" height="200" alt="picture of {{$about->name}}">
                                                
                                            </div>
                                        </div>
                                        @endif
                                        <div class="form-group row align-items-center mb-3">
                                            <label for="picture" class="col-md-4 text-capitalize">
                                                @if ($about && $about->picture)
                                                    new picture
                                                @else
                                                    picture
                                                @endif
                                            </label>
                                            <div class="col-md-8">
                                                <div class="custom-file">
                                                    <input type="file" name="picture" id="picture" class="custom-file-input">
                                                    <label for="picture" class="custom-file-label">Set Your Picture</label>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <input type="submit" value="Update" class="btn btn-primary btn-block">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-- end container-fluid -->
            </div>
            <!-- end app-main -->
@endsection
            