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
                                    <h1>Main / <a href="{{route('admin.dashboard.main.home.index')}}">Home</a> / <span class="text-secondary">edit</span> </h1>
                                </div>
                                
                            </div>
                            <!-- end page title -->
                            <div class="page-content my-4">
                                <div class="container">
                                    
                                    <form action="{{route('admin.dashboard.main.home.store')}}" method="POST" style="max-width: 600px" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row align-items-center mb-3">
                                            <label for="name" class="col-md-4 text-capitalize">name</label>
                                            <div class="col-md-8">
                                                <input type="text" name="name" value="@if($home) {{$home->name}} @endif" placeholder="Enter your name" id="name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center mb-3">
                                            <label for=titlee" class="col-md-4 text-capitalize">title</label>
                                            <div class="col-md-8">
                                                <input type="text" name="title" value="@if($home) {{$home->title}} @endif" placeholder="Enter title job" id="title" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center mb-3">
                                            <label for=contacte" class="col-md-4 text-capitalize">contact</label>
                                            <div class="col-md-8">
                                                <input type="text" name="contact" value="@if($home) {{$home->contacts}} @endif" placeholder="Enter a contact link" id="contact" class="form-control">
                                            </div>
                                        </div>
                                        @if ($home && $home->picture)
                                        <div class="form-group row align-items-center mb-3">
                                            <label for="picture" class="col-md-4 text-capitalize">current picture</label>
                                            <div class="col-md-8">
                                                <img src="{{asset('storage/'.$home->picture)}}" height="200" alt="picture of {{$home->name}}">
                                                
                                            </div>
                                        </div>
                                        @endif
                                        <div class="form-group row align-items-center mb-3">
                                            <label for="picture" class="col-md-4 text-capitalize">
                                                @if ($home && $home->picture)
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
            