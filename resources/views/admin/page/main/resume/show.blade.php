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
                                    <h1>Main / <a href="{{route('admin.dashboard.main.resume.index')}}">Resume</a> / <span class="text-secondary">{{$resume->name}}</span></h1>
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
                                   
                                    @if ($resume->content)
                                        <div class="row my-2">
                                            <label class="col text-capitalize font-weight-bold text-dark">title</label>
                                            <label class="col text-capitalize font-weight-bold text-dark">sub title</label>
                                            <label class="col text-capitalize font-weight-bold text-dark">level</label>
                                            <label class="col text-capitalize font-weight-bold text-dark">actions</label>
                                        </div>
                                        @foreach ($resume->content as $content)
                                            <div class="row my-2">
                                                <div class="col text-uppercase">{{$content->title}}</div>
                                                <div class="col text-capitalize">{{$content->sub_title}}</div>
                                                <div class="col text-capitalize">{{$content->level}}</div>
                                                <div class="col text-capitalize">
                                                    <a href="{{route('admin.dashboard.main.resume.content.edit',['resume' => $resume->id , 'content' => $content->id])}}" class="btn btn-success btn-sm text-capitalize">edit</a>
                                                    <form action="{{route('admin.dashboard.main.resume.content.destroy',$content->id)}}" method="POST" class="d-none form-delete">
                                                        @csrf
                                                        @method('DELETE')   
                                                    </form>
                                                    <button class="btn btn-danger btn-sm btn-delete text-capitalize">delete</button>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else 
                                        <div class="text-info my-3">You dont set any information yet</div>
                                        
                                    @endif
                                    <a href="{{route('admin.dashboard.main.resume.content.create',$resume->id)}}" class="btn btn-info btn-sm my-3 text-capitalize">add content</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-- end container-fluid -->
            </div>
            <!-- end app-main -->
@endsection
            