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
                                        <h1>Blog</h1>
                                    </div>
                                    <div class="ml-auto d-flex align-items-center">
                                        <nav>
                                            <ol class="breadcrumb p-0 m-b-0">
                                                <li class="breadcrumb-item">
                                                    <a href="{{route('admin.dashboard.index')}}"><i class="ti ti-home"></i></a>
                                                </li>
                                                <li class="breadcrumb-item active text-primary" aria-current="page">Blog</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                                <!-- end page title -->
                            </div>
                        </div>
                        @if (session('successMessage'))
                            <div class="text-success my-3 font-weight-bold">
                                {{session('successMessage')}}
                            </div>
                        @endif
                        @if ($blogs && count($blogs))
                            <div style="max-width: 1000px">
                                <div class="row my-3">
                                    <label class="col font-weight-bold text-capitalize text-dark">title</label>
                                    <label class="col font-weight-bold text-capitalize text-dark">picture</label>
                                    <label class="col font-weight-bold text-capitalize text-dark">categories</label>
                                    <label class="col font-weight-bold text-capitalize text-dark">main page</label>
                                    <label class="col font-weight-bold text-capitalize text-dark">actions</label>
                                </div>
                                @foreach ($blogs as $blog)
                                    <div class="row my-3 align-items-center">
                                        <h6 class="col text-capitalize">{{$blog->title}}</h6>
                                        <div class="picture col">
                                            <img src="{{asset('storage/'.$blog->picture)}}" height="80" alt="image of {{$blog->title}}">
                                        </div>
                                        <div class="col">
                                            @if ($blog->categories && count($blog->categories))
                                                @foreach ($blog->categories as $category)
                                                    <span class="text-uppercase text-info">{{$category->name}}</span>
                                                @endforeach
                                            @else 
                                                <strong class="text-danger">NONE</strong>
                                            @endif
                                        </div>
                                        <div class="main-page col">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" name="page_name" @if($blog->main_page) checked @endif id="{{$blog->title}}-{{$blog->id}}" value="{{$blog->id}}" class="custom-control-input blog-checked">
                                                <label for="{{$blog->title}}-{{$blog->id}}" class="custom-control-label m-3"></label>
                                            </div>
                                        </div>
                                        <div class="col actions">
                                            <a href="{{route('admin.dashboard.blog.show',$blog->id)}}" class="btn btn-info btn-sm text-capitalize">show</a>
                                            <a href="{{route('admin.dashboard.blog.edit',$blog->id)}}" class="btn btn-success btn-sm text-capitalize my-2">edit</a>
                                            <form action="{{route('admin.dashboard.blog.destroy',$blog->id)}}" method="POST" style="display:none" class="form-delete">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button class="btn btn-danger btn-sm btn-delete text-capitalize">delete</button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            
                        @else 
                        <div class="text-info my-3">There are no blog yet</div>
                        @endif
                        <!-- end row -->
                        <a href="{{route('admin.dashboard.blog.create')}}" class="btn btn-primary my-2 text-capitalize">add blog</a>
                    </div>
                    <!-- end container-fluid -->
                </div>
                <!-- end app-main -->

                    
@endsection
@section('special-script')
    <script>
        $(document).ready(function(){
            $('.blog-checked').click(function(){
                let that = $(this);
                $.ajax({
                    method:'POST',
                    url:'{{route('admin.dashboard.blog.checkBlogIntoMainPage')}}',
                    data:{
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        blog_id:$(this).val(),
                    },
                    success:function(data,status,xhr){
                        console.log(data);
                        if(!data.status){
                            Swal.fire({
                                title: 'Warning!',
                                text: data.blog,
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
        })
    </script>
@endsection