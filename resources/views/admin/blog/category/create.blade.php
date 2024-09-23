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
                                        <h1 class="text-capitalize text-primary"><a href="{{route('admin.dashboard.blog.index')}}">posts</a> / <a href="{{route('admin.dashboard.categories.index')}}">Categories</a> / <span class="text-secondary">Create</span> </h1>
                                    </div>
                                    <div class="ml-auto d-flex align-items-center">
                                        <nav>
                                            <ol class="breadcrumb p-0 m-b-0">
                                                <li class="breadcrumb-item">
                                                    <a href="{{route('admin.dashboard.index')}}"><i class="ti ti-home"></i></a>
                                                </li>
                                                <li class="breadcrumb-item">
                                                    <a href="{{route('admin.dashboard.blog.index')}}">Posts</a>
                                                </li>
                                                <li class="breadcrumb-item">
                                                    <a href="{{route('admin.dashboard.categories.index')}}" class="text-capitalize">categories</a>
                                                </li>
                                                <li class="breadcrumb-item active text-primary" aria-current="page">Create</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                                <!-- end page title -->
                            </div>
                        </div>
                       @if (session('successMessage'))
                           <strong class="text-success font-weight-bold my-3">{{session('successMessage')}}</strong>
                       @endif
                        <!-- end row -->
                        <form action="{{route('admin.dashboard.categories.store')}}" method="POST" style="max-width: 600px">
                            @csrf
                            <div class="form-group row align-items-center">
                                <label for="name" class="font-weight-bold text-capitalize col-md-4">Name</label>
                                <div class="col-md-8">
                                    <input type="text" name="name" placeholder="Set a name for the category" id="name" class="form-control @error('name') is-invalid @enderror">
                                </div>
                                @if ($errors->has('name'))
                                    <strong class="d-block my-2 text-danger">{{$errors->first('name')}}</strong>
                                @endif
                            </div>
                           
                            <div class="form-group row align-items-center">
                                <label for="parent" class="font-weight-bold text-capitalize col-md-4">parent</label>
                                <div class="col-md-8">
                                    <select name="parent" id="parent" class="custom-select text-uppercase">
                                        <option hidden value="">NONE</option>
                                        @if ($categories && count($categories))
                                            {{-- get the deep of categories --}}
                                            @php
                                                
                                                function print_categories($categories,$parent,$deep,$underscore){
                                                    foreach($categories as $category){
                                                        if($category->parent == $parent){
                                                            echo '<option value="'.$category->id.'" class="text-uppercase">';
                                                            if($underscore){
                                                                for ($i=0; $i < $underscore ; $i++) { 
                                                                    echo '&nbsp&nbsp&nbsp&nbsp';
                                                                }
                                                                
                                                                // for ($i=0; $i < $underscore ; $i++) { 
                                                                //     echo '_';
                                                                // }
                                                            }
                                                            echo $category->name.'</option>';

                                                            if($deep){
                                                                print_categories($categories,$category->id,$deep-1,$underscore+1);
                                                            }
                                                        }
                                                        
                                                    }
                                                }
                                                print_categories($categories,null,$deep,0);
                                            @endphp
                                        @endif 
                                    </select>
                                </div>
                                @if ($errors->has('parent'))
                                    <strong class="d-block my-2 text-danger">{{$errors->first('parent')}}</strong>
                                @endif
                            </div>
                            <input type="submit" value="add category" class="btn btn-primary btn-block text-capitalize">
                        </form>
                    </div>
                    <!-- end container-fluid -->
                </div>
                <!-- end app-main -->

                    
@endsection
@section('special-script')
    
@endsection