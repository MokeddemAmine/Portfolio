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
                                        <h1 class="text-primary text-capitalize"><span class="text-secondary">keys</span></h1>
                                    </div>
                                    <div class="ml-auto d-flex align-items-center">
                                        <nav>
                                            <ol class="breadcrumb p-0 m-b-0">
                                                <li class="breadcrumb-item">
                                                    <a href="{{route('admin.dashboard.index')}}"><i class="ti ti-home"></i></a>
                                                </li>
                                                <li class="breadcrumb-item active text-primary" aria-current="page">keys</li>
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
                        @if ($keys && count($keys))
                            <div style="max-width: 600px">
                                <div class="row my-2 titles">
                                    <label class="col text-capitalize font-weight-bold">key</label>
                                    <label class="col text-capitalize font-weight-bold">actions</label>
                                </div>
                                
                               @foreach ($keys as $key)
                                   <div class="row align-items-center my-2 bg-white p-1 rounded">
                                        <h6 class="text-capitalize col mb-0">{{$key->password}}</h6>
                                        <div class="actions col">
                                            <a href="{{route('admin.dashboard.keys.edit',$key->id)}}" class="btn btn-success btn-sm text-capitalize">edit</a>
                                            <form action="{{route('admin.dashboard.keys.destroy',$key->id)}}" method="post" class="d-none form-delete">
                                                @csrf 
                                                @method('DELETE')
                                            </form>
                                            <button class="btn-delete btn btn-danger btn-sm text-capitalize">delete</button>
                                        </div>
                                   </div>
                               @endforeach
                            </div>
                            
                        @endif
                        <!-- end row -->
                        <a href="{{route('admin.dashboard.keys.create')}}" class="btn btn-primary my-2 text-capitalize">add key</a>
                    </div>
                    <!-- end container-fluid -->
                </div>
                <!-- end app-main -->

                    
@endsection
@section('special-script')
    
@endsection