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
                                    <h1 class="text-primary"><a href="{{route('admin.dashboard.portfolio.index')}}">Portfolio</a> / <span class="text-secondary text-capitalize">{{$portfolio->section}} (edit)</span></h1>
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
                                    <form action="{{route('admin.dashboard.portfolio.update',$portfolio->id)}}" style="max-width: 800px" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group row align-items-center center mb-3">
                                            <label for="section" class="col-md-4 text-capitalize">section name:</label>
                                            <div class="col-md-8">
                                                <input type="text" name="section" value="{{$portfolio->section}}" placeholder="Enter a name for the section " id="section" class="form-control @error('section') is-invalid @enderror" />
                                            </div>
                                            @if($errors->has('section'))
                                                <strong class="text-danger mb-3">{{ $errors->first('section') }}</strong>
                                            @endif
                                        </div>
                                        <input type="submit" value="update section" class="btn btn-primary btn-block text-capitalize">
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
            