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
                                    <h1 class="text-primary"> <a href="{{route('admin.dashboard.portfolio.index')}}">Project</a> / <span class="text-secondary"> {{$project->title}} (edit)</span></h1>
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
                                    <form action="{{route('admin.dashboard.portfolio.project.update',$project->id)}}" style="max-width: 800px" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group row align-items-center center mb-3">
                                            <label for="title" class="col-md-4 text-capitalize">title :</label>
                                            <div class="col-md-8">
                                                <input type="text" name="title" value="{{$project->title}}" placeholder="Set A Title " id="title" class="form-control @error('title') is-invalid @enderror" />
                                            </div>
                                            @if($errors->has('title'))
                                                <strong class="text-danger mb-3">{{ $errors->first('title') }}</strong>
                                            @endif
                                        </div>
                                        <div class="form-group row align-items-center center mb-3">
                                            <label for="sub_title" class="col-md-4 text-capitalize">sub title :</label>
                                            <div class="col-md-8">
                                                <input type="text" name="sub_title" value="{{$project->sub_title}}" placeholder="Set A sub_title " id="sub_title" class="form-control @error('sub_title') is-invalid @enderror" />
                                            </div>
                                            @if($errors->has('sub_title'))
                                                <strong class="text-danger mb-3">{{ $errors->first('sub_title') }}</strong>
                                            @endif
                                        </div>
                                        <div class="form-group row align-items-center center mb-3">
                                            <label for="description" class="col-md-4 text-capitalize">description :</label>
                                            <div class="col-md-8">
                                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Set A Description">{{$project->description}}</textarea>
                                            </div>
                                            @if($errors->has('description'))
                                                <strong class="text-danger mb-3">{{ $errors->first('description') }}</strong>
                                            @endif
                                        </div>
                                        <div class="form-group row align-items-center center mb-3">
                                            <label for="link" class="col-md-4 text-capitalize">link :</label>
                                            <div class="col-md-8">
                                                <input type="url" name="link" value="{{$project->link}}" placeholder="Set A link " id="link" class="form-control @error('link') is-invalid @enderror" />
                                            </div>
                                            @if($errors->has('link'))
                                                <strong class="text-danger mb-3">{{ $errors->first('link') }}</strong>
                                            @endif
                                        </div>
                                        <div class="form-group row align-items-center center mb-3">
                                            <label for="pictures" class="col-md-4 text-capitalize">current pictures :</label>
                                            <div class="col-md-8">
                                                @php
                                                    $pictures = json_decode($project->pictures);
                                                @endphp
                                                @foreach ($pictures as $picture)
                                                    <div class="picture d-inline-block">
                                                        <span class="close text-danger">&times;</span>
                                                        <img src="{{asset('storage/'.$picture)}}" class="m-2" width="100" height="150" alt="{{$project->title}} picture">
                                                        <input type="hidden" name="current_pictures[]" value="{{$picture}}" />
                                                    </div>
                                                    
                                                @endforeach
                                            </div>
                                            @if($errors->has('current_pictures[]'))
                                                <strong class="text-danger mb-3">{{ $errors->first('current_pictures[]') }}</strong>
                                            @endif
                                        </div>
                                        <div class="form-group row align-items-center center mb-3">
                                            <label for="pictures" class="col-md-4 text-capitalize">new pictures :</label>
                                            <div class="col-md-8">
                                                <div class="custom-file @error('sub_title') is-invalid @enderror">
                                                    <input type="file" name="new_pictures[]" id="pictures" class="custom-file-input" multiple>
                                                    <label for="pictures" class="custom-file-label text-capitalize">set pictures</label>
                                                </div>
                                            </div>
                                            @if($errors->has('new_pictures[]'))
                                                <strong class="text-danger mb-3">{{ $errors->first('new_pictures[]') }}</strong>
                                            @endif
                                        </div>
                                        @if ($portfolios && count($portfolios))
                                            <div class="form-group row align-items-center center mb-3">
                                                <label for="section" class="col-md-4 text-capitalize">portfolio section :</label>
                                                <div class="col-md-8">
                                                    @php
                                                        $sections = [];
                                                        foreach($project->section as $sec){
                                                            if(!in_array($sec->section,$sections)){
                                                                $sections[] = $sec->section;
                                                            }
                                                        }
                                                    @endphp
                                                    @foreach ($portfolios as $portfolio)
                                                        <div class="custom-control custom-control-inline custom-checkbox">
                                                            <input type="checkbox" name="section[]" @if(in_array($portfolio->section,$sections)) checked  @endif value="{{$portfolio->id}}" id="{{$portfolio->section}}" class="custom-control-input" />
                                                            <label for="{{$portfolio->section}}" class="custom-control-label">{{$portfolio->section}}</label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                @if($errors->has('section'))
                                                    <strong class="text-danger mb-3">{{ $errors->first('section') }}</strong>
                                                @endif
                                            </div>
                                        @endif
                                        @if ($errors->any())
                                            <ul class="list-unstyled my-3">
                                                @foreach ($errors->all() as $error)
                                                    <li class="text-danger">{{$error}}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                        <input type="submit" value="update project" class="btn btn-primary btn-block text-capitalize">
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
            