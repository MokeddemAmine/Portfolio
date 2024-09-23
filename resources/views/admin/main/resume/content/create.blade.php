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
                                    <h1 class="text-primary"><a href="{{route('admin.dashboard.main.index')}}">Main</a> / <a href="{{route('admin.dashboard.main.resume.index')}}">Resume</a> / <a href="{{route('admin.dashboard.main.resume.show',$resume->id)}}" class="text-capitalize">{{$resume->name}}</a> / <span class="text-secondary text-capitalize">create</span> </h1>
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
                                   <form action="{{route('admin.dashboard.main.resume.content.store',$resume->id)}}" method="POST" style="max-width: 800px">
                                        @csrf
                                        <div class="form-group row align-items-center mb-3">
                                            <label for="title" class="col-md-4 text-capitalize">title</label>
                                            <div class="col-md-8">
                                                <input type="text" name="title" placeholder="Enter a title" id="title" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center mb-3">
                                            <label for="sub_title" class="col-md-4 text-capitalize">sub title</label>
                                            <div class="col-md-8">
                                                <input type="text" name="sub_title" placeholder="Enter a sub title" id="sub_title" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center mb-3">
                                            <label for="level" class="col-md-4 text-capitalize">level</label>
                                            <div class="col-md-8">
                                                <input type="range" name="level"  id="level" class="form-control">
                                            </div>
                                        </div>
                                        <input type="submit" value="Add" class="btn btn-primary btn-block">
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
            