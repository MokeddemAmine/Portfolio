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
                                        <h1 class="text-primary text-capitalize"><a href="{{route('admin.dashboard.keys.index')}}">Keys</a> / <span class="text-secondary">Create</span></h1>
                                    </div>
                                    <div class="ml-auto d-flex align-items-center">
                                        <nav>
                                            <ol class="breadcrumb p-0 m-b-0">
                                                <li class="breadcrumb-item">
                                                    <a href="{{route('admin.dashboard.index')}}"><i class="ti ti-home"></i></a>
                                                </li>
                                                <li class="breadcrumb-item">
                                                    <a href="{{route('admin.dashboard.keys.index')}}" class="text-capitalize">keys</a>
                                                </li>
                                                <li class="breadcrumb-item active text-primary" aria-current="page">Create</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                                <!-- end page title -->
                            </div>
                        </div>
                        @if (session('successMessage'))
                           <strong class="text-success d-block font-weight-bold my-3">{{session('successMessage')}}</strong>
                       @endif
                       
                        <form action="{{route('admin.dashboard.keys.store')}}" method="post" style="max-width: 800px">
                            @csrf   
                            <div class="form-group row align-items-center">
                                <label for="key" class="col-md-4 text-capitalize font-weight-bold">Key</label>
                                <div class="col-md-8">
                                    <input type="text" name="key" placeholder="Set a key" id="key" class="form-control">
                                </div>
                            </div>
                            <input type="submit" value="Add Key" class="btn btn-primary">
                        </form>
                    </div>
                    <!-- end container-fluid -->
                </div>
                <!-- end app-main -->

                    
@endsection
@section('special-script')
    
@endsection