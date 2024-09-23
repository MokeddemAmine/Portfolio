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
                                    <h1 class="text-primary"><a href="{{route('admin.dashboard.main.index')}}">Main</a> / <a href="{{route('admin.dashboard.main.resume.index')}}">Resume</a> / <span class="text-secondary text-capitalize">{{$resume->name}} (edit)</span> </h1>
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
                                   <form action="{{route('admin.dashboard.main.resume.update',$resume->id)}}" method="POST" style="max-width: 800px">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group row align-items-center mb-3">
                                            <label for="name" class="col-md-4 text-capitalize">name</label>
                                            <div class="col-md-8">
                                                <input type="text" name="name" value="{{$resume->name}}" placeholder="Enter a name" id="name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center mb-3">
                                            <label for="title" class="col-md-4 text-capitalize">title</label>
                                            <div class="col-md-8">
                                                <input type="text" name="title" value="{{$resume->title_first_color}}" placeholder="Enter a title" id="title" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center mb-3">
                                            <label for="title2" class="col-md-4 text-capitalize">title (optional)</label>
                                            <div class="col-md-8">
                                                <input type="text" name="title2" value="{{$resume->title_second_color}}" placeholder="Enter a second title for the second color" id="title2" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center mb-3">
                                            <label for="display" class="col-md-4 text-capitalize">display</label>
                                            <div class="col-md-8">
                                                <select name="display" class="custom-select" id="display">
                                                    <option value="commas" @if ($resume->display == 'commas')
                                                        selected
                                                    @endif>By Commas</option>
                                                    <option value="scroll" @if ($resume->display == 'scroll')
                                                        selected
                                                    @endif>Scrolling</option>
                                                </select>
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
            