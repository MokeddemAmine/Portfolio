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
                                        <h1><a href="{{route('admin.dashboard.blog.index')}}">Blog</a> / <span class="text-secondary">Categories</span></h1>
                                    </div>
                                    <div class="ml-auto d-flex align-items-center">
                                        <nav>
                                            <ol class="breadcrumb p-0 m-b-0">
                                                <li class="breadcrumb-item">
                                                    <a href="{{route('admin.dashboard.index')}}"><i class="ti ti-home"></i></a>
                                                </li>
                                                <li class="breadcrumb-item">
                                                    <a href="{{route('admin.dashboard.blog.index')}}">Blog</a>
                                                </li>
                                                <li class="breadcrumb-item active text-primary" aria-current="page">Categories</li>
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
                        @if ($categories && count($categories))
                            <div style="max-width: 600px">
                                <div class="row my-2">
                                    <label class="col text-capitalize font-weight-bold">name</label>
                                    <label class="col text-capitalize font-weight-bold">actions</label>
                                </div>
                                
                                <?php
                                                
                                function print_categories($categories,$parent,$deep,$underscore){
                                    foreach($categories as $category){
                                        if($category->parent == $parent){
                                            ?>
                                            <div class="row my-2">
                                                    <h6 class="col text-uppercase">
                                                        <?php
                                                            if($underscore){
                                                                for ($i=0; $i < $underscore ; $i++) { 
                                                                    echo '&nbsp&nbsp&nbsp&nbsp';
                                                                }
                                                                
                                                                for ($i=0; $i < $underscore ; $i++) { 
                                                                    echo '_';
                                                                }
                                                            }
                                                        ?>
                                                        {{$category->name}}
                                                    </h6>
                                                    <div class="col actions">
                                                        <a href="{{route('admin.dashboard.categories.edit',$category->id)}}" class="text-capitalize btn btn-success btn-sm">edit</a>
                                                        <form action="{{route('admin.dashboard.categories.destroy',$category->id)}}" method="POST" class="form-delete d-none">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                        <button class="btn btn-danger btn-sm btn-delete text-capitalize">delete</button>
                                                    </div>
                                                </div>
                                            <?php
                                            if($deep){
                                                print_categories($categories,$category->id,$deep-1,$underscore+1);
                                            }
                                        }
                                        
                                    }
                                }
                                print_categories($categories,null,$deep,0);
                                ?>
                            </div>
                            
                        @endif
                        <!-- end row -->
                        <a href="{{route('admin.dashboard.categories.create')}}" class="btn btn-primary my-2 text-capitalize">add category</a>
                    </div>
                    <!-- end container-fluid -->
                </div>
                <!-- end app-main -->

                    
@endsection
@section('special-script')
    
@endsection