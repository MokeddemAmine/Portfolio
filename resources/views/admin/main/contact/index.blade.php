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
                                    <h1 class="text-primary"><a href="{{route('admin.dashboard.main.index')}}">Main</a> / <span class="text-secondary">Contact</span></h1>
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
                                    @if ($contact)
                                    <div style="max-width: 800px">
                                        
                                        <div class="row mb-3" >
                                            <div class="col-4 text-capitalize font-weight-bold">Contact Section title:</div>
                                            <div class="col-8">{{$contact->title}}</div>
                                        </div>
                                        @if ($contact->contacts)
                                            @php
                                                $links = json_decode($contact->contacts);
                                            @endphp
                                            @foreach ($links as $key => $link)
                                                @if ($link)
                                                <div class="row mb-3" >
                                                    <div class="col-4 text-capitalize font-weight-bold">{{$key}} link:</div>
                                                    <div class="col-8">
                                                        {{$link}}
                                                    </div>
                                                </div>
                                                @endif
                                            @endforeach
                                        @endif
                                        
                                    </div>
                                        
                                        
                                    @else 
                                        <div class="text-info my-3">You dont set any information yet</div>
                                        
                                    @endif
                                    <a href="{{route('admin.dashboard.main.contact.edit')}}" class="btn btn-primary btn-sm my-3 text-capitalize">edit info</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-- end container-fluid -->
            </div>
            <!-- end app-main -->
@endsection
            