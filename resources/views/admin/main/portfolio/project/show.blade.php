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
                                    <h1>Main / <a href="{{route('admin.dashboard.main.portfolio.index')}}">Project</a> / <span class="text-secondary"> {{$project->title}} </span></h1>
                                </div>
                                
                            </div>
                            <!-- end page title -->
                            @if (session('successMessage'))
                                <div class="my-3 text-success">{{session('successMessage')}}</div>
                            @endif
                            @if (session('errorMessage'))
                                <div class="my-3 text-danger">{{session('errorMessage')}}</div>
                            @endif
                            <div class="page-content my-4">
                                <div class="container">
                                    <div class="my-2 text-right">
                                        <a href="{{route('admin.dashboard.main.portfolio.project.edit',$project->id)}}" class="btn btn-success btn-sm text-capitalize my-2 my-md-0">edit</a>
                                        <form action="{{route('admin.dashboard.main.portfolio.project.destroy',$project->id)}}" method="POST" class="d-none form-delete">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <button class="btn btn-danger btn-sm text-capitalize btn-delete">delete</button>
                                    </div>
                                    <div class="carousel  my-3" id="project-pictures" data-ride="carousel">
                                        <div class="carousel-inner">
                                            @php
                                                $pictures = json_decode($project->pictures);
                                            @endphp
                                            @foreach ($pictures as $picture)
                                                <div class="carousel-item @if($picture == $pictures[0]) active @endif">
                                                    <img src="{{asset('storage/'.$picture)}}" class="w-75 d-block mx-auto" style="object-fit: contain;max-height:800px"  alt="{{$project->title}} picture" />
                                                </div>
                                            @endforeach
                                        </div>
                                        @if (count(json_decode($project->pictures)))
                                            <a href="#project-pictures" class="carousel-control-prev" data-slide="prev">
                                                <span class="carousel-control-prev-icon bg-dark p-3"></span>
                                            </a>
                                            <a href="#project-pictures" class="carousel-control-next" data-slide="next">
                                                <span class="carousel-control-next-icon bg-dark p-3"></span>
                                            </a>
                                        @endif
                                        
                                    </div>
                                    <div class="row my-3">
                                        <label for="" class="col-md-2">Title: </label>
                                        <div class="col-md-10 text-primary font-weight-bold">{{$project->title}}</div>
                                    </div>
                                    <div class="row my-3">
                                        <label for="" class="col-md-2">Sub Title: </label>
                                        <div class="col-md-10 text-secondary">{{$project->sub_title}}</div>
                                    </div>
                                    <div class="row my-3">
                                        <label for="" class="col-md-2">Description: </label>
                                        <div class="col-md-10 text-dark">{{$project->description}}</div>
                                    </div>
                                    <div class="row my-3">
                                        <label for="" class="col-md-2">Sections: </label>
                                        <div class="col-md-10 text-primary">
                                            @if ($project->section && count($project->section))
                                                @foreach ($project->section as $sections)
                                                    <span class="btn btn-outline-primary btn-sm text-uppercase">{{$sections->section}}</span>
                                                @endforeach
                                            @else 
                                                <span class="text-danger">NONE</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row my-3">
                                        <label for="" class="col-md-2">Link: </label>
                                        <div class="col-md-10 text-dark font-weight-bold">
                                            <a href="{{$project->link}}" target="_blank">{{$project->link}}</a>
                                        </div>
                                    </div>
                                    <div class="row my-3">
                                        <label for="" class="col-md-2">Created At: </label>
                                        <div class="col-md-10 text-dark font-weight-bold">{{$project->created_at->format('Y/m/d')}}</div>
                                    </div>
                                    <div class="row my-3">
                                        <label for="" class="col-md-2">Last Update: </label>
                                        <div class="col-md-10 text-dark font-weight-bold">{{$project->updated_at->format('Y/m/d')}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-- end container-fluid -->
            </div>
            <!-- end app-main -->
@endsection
            