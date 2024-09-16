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
                                    <h1>Main / <a href="{{route('admin.dashboard.main.contact.index')}}">Contact</a> / <span class="text-secondary">edit</span> </h1>
                                </div>
                                
                            </div>
                            <!-- end page title -->
                            <div class="page-content my-4">
                                <div class="container">
                                    
                                    <form action="{{route('admin.dashboard.main.contact.store')}}" method="POST" style="max-width: 600px" enctype="multipart/form-data">
                                        @csrf
                                        
                                        
                                        <div class="form-group row align-items-center mb-3">
                                            <label for="title" class="col-md-4 text-capitalize">title</label>
                                            <div class="col-md-8">
                                                <input type="text" name="title" value="@if($contact) {{$contact->title}} @endif" placeholder="Enter contact title" id="title" class="form-control">
                                            </div>
                                        </div>
                                        @php
                                            $links = null;
                                            if($contact && $contact->contacts){
                                                $links = json_decode($contact->contacts);
                                                
                                            }
                                        @endphp
                                        <div class="form-group row align-items-center mb-3">
                                            <label for="linkedin" class="col-md-4 text-capitalize">linkedin</label>
                                            <div class="col-md-8">
                                                <input type="text" name="linkedin" value="@if($links && $links->linkedin) {{$links->linkedin}} @endif"  placeholder="Enter linkedin link" id="linkedin" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center mb-3">
                                            <label for="github" class="col-md-4 text-capitalize">github</label>
                                            <div class="col-md-8">
                                                <input type="text" name="github" value="@if($links && $links->github) {{$links->github}} @endif"  placeholder="Enter github link" id="github" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center mb-3">
                                            <label for="facebook" class="col-md-4 text-capitalize">facebook</label>
                                            <div class="col-md-8">
                                                <input type="text" name="facebook" value="@if($links && $links->facebook) {{$links->facebook}} @endif"  placeholder="Enter facebook link" id="facebook" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center mb-3">
                                            <label for="instagram" class="col-md-4 text-capitalize">instagram</label>
                                            <div class="col-md-8">
                                                <input type="text" name="instagram" value="@if($links && $links->instagram) {{$links->instagram}} @endif"  placeholder="Enter instagram link" id="instagram" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center mb-3">
                                            <label for="x_twitter" class="col-md-4 text-capitalize">X-twitter</label>
                                            <div class="col-md-8">
                                                <input type="text" name="x_twitter" value="@if($links && $links->x_twitter) {{$links->x_twitter}} @endif"  placeholder="Enter X-twitter link" id="x_twitter" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center mb-3">
                                            <label for="website" class="col-md-4 text-capitalize">website</label>
                                            <div class="col-md-8">
                                                <input type="text" name="website" value="@if($links && $links->website) {{$links->website}} @endif"  placeholder="Enter website link" id="website" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center mb-3">
                                            <label for="gmail" class="col-md-4 text-capitalize">gmail</label>
                                            <div class="col-md-8">
                                                <input type="text" name="gmail" value="@if($links && $links->gmail) {{$links->gmail}} @endif"  placeholder="Enter gmail link" id="gmail" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center mb-3">
                                            <label for="pinterest" class="col-md-4 text-capitalize">pinterest</label>
                                            <div class="col-md-8">
                                                <input type="text" name="pinterest" value="@if($links && $links->pinterest) {{$links->pinterest}} @endif"   placeholder="Enter pinterest link" id="pinterest" class="form-control">
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
            