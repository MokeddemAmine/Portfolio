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
                                    <h1 class="text-primary"><a href="{{route('admin.dashboard.main.index')}}">Main</a> / <span class="text-secondary">Resume</span></h1>
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
                                    @if ($resume)
                                        <div class="row my-2">
                                            <label class="col text-capitalize font-weight-bold text-dark">name</label>
                                            <label class="col text-capitalize font-weight-bold text-dark">title</label>
                                            <label class="col text-capitalize font-weight-bold text-dark">second title</label>
                                            <label class="col text-capitalize font-weight-bold text-dark">display</label>
                                            <label class="col text-capitalize font-weight-bold text-dark">actions</label>
                                        </div>
                                        @foreach ($resume as $item)
                                            <div class="row my-2">
                                                <div class="col text-uppercase">{{$item->name}}</div>
                                                <div class="col text-capitalize">{{$item->title_first_color}}</div>
                                                <div class="col text-capitalize">{{$item->title_second_color}}</div>
                                                <div class="col text-capitalize">{{$item->display}}</div>
                                                <div class="col text-capitalize">
                                                    <a href="{{route('admin.dashboard.main.resume.show',$item->id)}}" class="btn btn-info btn-sm text-capitalize">show</a>
                                                    <a href="{{route('admin.dashboard.main.resume.edit',$item->id)}}" class="btn btn-success btn-sm text-capitalize my-2 my-md-0">edit</a>
                                                    <form action="{{route('admin.dashboard.main.resume.destroy',$item->id)}}" method="POST" class="d-none form-delete">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                    <button class="btn btn-danger btn-sm text-capitalize btn-delete" confirm="you sure want to delete this">delete</button>
                                                    
                                                </div>
                                            </div>
                                        @endforeach
                                    @else 
                                        <div class="text-info my-3">You dont set any information yet</div>
                                        
                                    @endif
                                    <a href="{{route('admin.dashboard.main.resume.create')}}" class="btn btn-primary btn-sm my-3 text-capitalize">add resume</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-- end container-fluid -->
            </div>
            <!-- end app-main -->
@endsection
            