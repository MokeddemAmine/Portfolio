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
                                    <a href=""><h1>Main/Home</h1></a>
                                </div>
                                
                            </div>
                            <!-- end page title -->
                            <div class="page-content my-4">
                                <div class="container">
                                    @if ($home)
                                        <div class="row" style="max-width: 800px">
                                            <div class="col-4">Your Name:</div>
                                            <div class="col-8">Mokeddem Amine</div>
                                        </div>
                                        <a href="" class="btn btn-success btn-sm my-3 text-capitalize">edit info</a>
                                    @else 
                                        <div class="text-info my-3">You dont set any information yet</div>
                                        <a href="" class="btn btn-info btn-sm my-3 text-capitalize">Add info</a>
                                    @endif
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-- end container-fluid -->
            </div>
            <!-- end app-main -->
@endsection
            