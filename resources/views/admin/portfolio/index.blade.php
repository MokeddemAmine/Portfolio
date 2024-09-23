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
                                    <h1><span class="text-primary">Portfolio</span></h1>
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
                                    @if ($portfolios && count($portfolios))
                                       <div style="max-width: 800px">
                                            <div class="row my-2">
                                                <label class="col text-capitalize font-weight-bold text-dark">section</label>
                                                <label class="col text-capitalize font-weight-bold text-dark">actions</label>
                                            </div>
                                            @foreach ($portfolios as $item)
                                                <div class="row my-2 align-items-center">
                                                    <div class="col text-uppercase">{{$item->section}}</div>
                                                    <div class="col text-capitalize">
                                                        <a href="{{route('admin.dashboard.portfolio.edit',$item->id)}}" class="btn btn-success btn-sm text-capitalize my-2 my-md-0">edit</a>
                                                        <form action="{{route('admin.dashboard.portfolio.destroy',$item->id)}}" method="POST" class="d-none form-delete">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                        <button class="btn btn-danger btn-sm text-capitalize btn-delete">delete</button>
                                                        
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else 
                                        <div class="text-info my-3">You dont set any portfolio section yet</div>
                                        
                                    @endif
                                    <a href="{{route('admin.dashboard.portfolio.create')}}" class="btn btn-primary btn-sm my-3 text-capitalize">add porfolio section</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 m-b-30">
                            <!-- begin page title -->
                            <div class="d-block d-lg-flex flex-nowrap align-items-center">
                                <div class="page-title mr-4 pr-4 border-right">
                                    <h3><span class="text-primary">Projects</span></h3>
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
                                    @if ($projects && count($projects))
                                       
                                            <div class="row my-2 titles" style="display: none">
                                                <label class="col-2 text-capitalize font-weight-bold text-dark">title</label>
                                                <label class="col-1 text-capitalize font-weight-bold text-dark">sub title</label>
                                                <label class="col-2 text-capitalize font-weight-bold text-dark">description</label>
                                                <label class="col-2 text-capitalize font-weight-bold text-dark">picture</label>
                                                <label class="col-1 text-capitalize font-weight-bold text-dark">portfolios</label>
                                                <label class="col-1 text-capitalize font-weight-bold text-dark">main page</label>
                                                <label class="col-3 text-capitalize font-weight-bold text-dark">actions</label>
                                            </div>
                                            @foreach ($projects as $project)
                                                
                                                <div class="row my-3 align-items-center bg-white rounded p-2 p-md-1">
                                                    <div class="col-md-2 text-capitalize">
                                                        <div class="row align-items-center">
                                                            <div class="col-4 col-md-0 text-capitalize font-weight-bold text-dark show-small" style="display: none">title</div>
                                                            <div class="col-8 col-md-12 text-capitalize">{{$project->title}}</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1 text-capitalize">
                                                        <div class="row align-items-center">
                                                            <div class="col-4 col-md-0 text-capitalize font-weight-bold text-dark show-small" style="display: none">sub title</div>
                                                            <div class="col-8 col-md-12 text-capitalize"> {{$project->sub_title}}</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 text-capitalize titles" style="display: none">
                                                        <div class="row align-items-center">
                                                            <div class="col-4 col-md-0 text-capitalize font-weight-bold text-dark show-small" style="display: none">description</div>
                                                            <div class="col-8 col-md-12 text-capitalize">{!!Str::limit($project->description,60)!!}</div>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="col-md-2 my-3 my-md-0 text-capitalize mx-auto text-center">
                                                        @php
                                                            $picture = json_decode($project->pictures)[0];
                                                        @endphp
                                                        <img src="{{asset('storage/'.$picture)}}" width="100" alt="">
                                                    </div>
                                                    <div class="col-md-1 text-capitalize">
                                                        
                                                        @if ($project->section && count($project->section))
                                                            <div class="row align-items-center">
                                                                <div class="col-4 col-md-0 text-capitalize font-weight-bold text-dark show-small" style="display: none">portfolios</div>
                                                                <div class="col-8 col-md-12 text-capitalize">
                                                                    @foreach ($project->section as $section)
                                                                        <div class="d-inline-block d-md-block mb-1 btn-outline-primary btn-sm btn">{{$section->section}}</div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                            
                                                        @else 
                                                            <div class="row align-items-center">
                                                                <div class="col-4 col-md-0 text-capitalize font-weight-bold text-dark show-small" style="display: none">portfolios</div>
                                                                <div class="col-8 col-md-12 text-uppercase text-danger">
                                                                    none
                                                                </div>
                                                            </div>
                                                            
                                                        @endif
                                                    </div>
                                                    <div class="col-md-1 text-md-center">
                                                        <div class="row align-items-center">
                                                            <div class="col-4 col-md-0 text-capitalize font-weight-bold text-dark show-small" style="display: none">main</div>
                                                            <div class="col-8 col-md-12 text-capitalize">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" name="page_name" @if($project->main_page) checked @endif id="{{$project->title}}-{{$project->id}}" value="{{$project->id}}" class="custom-control-input portfolio-project-checked">
                                                                    <label for="{{$project->title}}-{{$project->id}}" class="custom-control-label m-3"></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="col-md-3 text-capitalize">
                                                        <a href="{{route('admin.dashboard.portfolio.project.show',$project->id)}}" class="btn btn-info btn-sm text-capitalize">show</a>
                                                        <a href="{{route('admin.dashboard.portfolio.project.edit',$project->id)}}" class="btn btn-success btn-sm text-capitalize my-2 my-md-0">edit</a>
                                                        <form action="{{route('admin.dashboard.portfolio.project.destroy',$project->id)}}" method="POST" class="d-none form-delete">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                        <button class="btn btn-danger btn-sm text-capitalize btn-delete">delete</button>
                                                        
                                                    </div>
                                                </div>
                                            @endforeach
                                        
                                    @else 
                                        <div class="text-info my-3">You dont set any projects yet</div>
                                        
                                    @endif
                                    <a href="{{route('admin.dashboard.portfolio.project.create')}}" class="btn btn-primary btn-sm my-3 text-capitalize">add project</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-- end container-fluid -->
            </div>
            <!-- end app-main -->
@endsection
@section('special-script')
    <script>
        $(document).ready(function(){
            // toggle project into main page
            $('.portfolio-project-checked').click(function(){
                let that = $(this);
                $.ajax({
                    method:'POST',
                    url:'{{route('admin.dashboard.portfolio.project.checkProjectIntoMainPage')}}',
                    data:{
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        project_id:$(this).val(),
                    },
                    success:function(data,status,xhr){
                        if(!data.status){
                            Swal.fire({
                                title: 'Warning!',
                                text: data.project,
                                icon: 'warning',
                                confirmButtonText: 'Exit'
                            });
                            that[0].checked = false; 
                        }
                    },
                    error:function(xhr,status,err){
                        console.log(err);
                    }
                })
            })
            // show and hide some element depend on screen width
            let window_width = window.innerWidth;
            if(window_width >= 768){
                $('.titles').show();
            }else{
                $('.show-small').show();
            }
        })
    </script>
@endsection
            