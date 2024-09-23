@extends('admin.layouts.app')
@section('script')
    <script src="https://cdn.tiny.cloud/1/ygonmj0i6742j2qlbimes6max8tue1pjhlpbexc1kbb3p3i6/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <style>
        .ck-editor__editable_inline{
            height:500px;
        }
    </style>
@endsection
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
                                        <h1 class="text-primary text-capitalize"><a href="{{route('admin.dashboard.blog.index')}}">posts</a> / <span class="text-secondary">{{$blog->title}} (edit) </span></h1>
                                    </div>
                                    <div class="ml-auto d-flex align-items-center">
                                        <nav>
                                            <ol class="breadcrumb p-0 m-b-0">
                                                <li class="breadcrumb-item">
                                                    <a href="{{route('admin.dashboard.blog.index')}}"><i class="ti ti-home"></i></a>
                                                </li>

                                                <li class="breadcrumb-item active text-primary" aria-current="page">{{$blog->title}} (edit)</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                                <!-- end page title -->
                            </div>
                        </div>
                        @if (session('successMessage'))
                            <strong class="text-success my-3">{{session('successMessage')}}</strong>
                        @endif
                        <!-- end row -->
                        <form action="{{route('admin.dashboard.blog.update',$blog->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="fields" style="max-width: 800px">
                                <div class="form-group mb-3 row align-items-center">
                                    <label for="title" class="text-capitalize font-weight-bold col-md-3">title</label>
                                    <div class="col-md-9">
                                        <input type="text" name="title" id="title" value="@if (old('title')) {{old('title')}} @else {{$blog->title}} @endif" placeholder="Enter the title of the blog" class="form-control @error('title') is-invalid @enderror">
                                        @if ($errors->has('title'))
                                            <strong class="text-danger my-2">{{$errors->first('title')}}</strong>
                                        @endif
                                    </div>
                                   
                                </div>
                                <div class="form-group mb-3 row align-items-center">
                                    <label for="picture" class="text-capitalize font-weight-bold col-md-3">picture</label>
                                    <div class="col-md-2">
                                        <img src="{{asset('storage/'.$blog->picture)}}" height="60" alt="">
                                    </div>
                                    <div class="col-md-7">
                                        <div class="custom-control custom-file @error('picture') is-invalid @enderror">
                                            <input type="file" name="picture" id="picture" class="custom-file-input">
                                            <label for="picture" class="custom-file-label">Change the picture</label>
                                        </div>
                                        @if ($errors->has('picture'))
                                            <strong class="text-danger my-2">{{$errors->first('picture')}}</strong>
                                        @endif
                                    </div>
                                   
                                </div>
                                <div class="form-group mb-3 row align-items-center">
                                    <label for="category" class="text-capitalize font-weight-bold col-md-3">category</label>
                                    @php
                                        $exists_blog_cats = [];
                                        if($blog->categories && count($blog->categories)){
                                            foreach ($blog->categories as $cat) {
                                                $exists_blog_cats[] = $cat->id;
                                            }
                                        }
                                        
                                    @endphp
                                    <div class="col-md-9">
                                        @if ($blog_categories && count($blog_categories))
                                            <style>
                                                .scroll{
                                                    overflow-y: scroll;
                                                    height:120px;
                                                }
                                            </style>
                                            <div class="scroll">
                                                <?php
                                                
                                                    function print_categories($categories,$parent,$deep,$underscore,$exists_blog_cats){
                                                        foreach($categories as $category){
                                                            if($category->parent == $parent){
                                                                
                                                                
                                                                ?>
                                                                <div class="d-flex">
                                                                    <div>
                                                                        <?php
                                                                        if($underscore){
                                                                            for ($i=0; $i < $underscore ; $i++) { 
                                                                                echo '&nbsp&nbsp&nbsp&nbsp';
                                                                            }
                                                                            
                                                                            // for ($i=0; $i < $underscore ; $i++) { 
                                                                            //     echo '_';
                                                                            // }
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" name="category[]" value="{{$category->id}}" id="{{$category->name}}-{{$category->id}}" class="custom-control-input" @if(in_array($category->id,$exists_blog_cats)) checked @endif>
                                                                        <label for="{{$category->name}}-{{$category->id}}" class="custom-control-label text-uppercase">{{$category->name}}</label>
                                                                    </div>
                                                                </div>
                                                                
                                                                <?php

                                                                if($deep){
                                                                    print_categories($categories,$category->id,$deep-1,$underscore+1,$exists_blog_cats);
                                                                }
                                                            }
                                                            
                                                        }
                                                    }
                                                    print_categories($blog_categories,null,$deep,0,$exists_blog_cats);

                                                ?>
                                                
                                            </div>
                                            
                                        @else 
                                            NONE
                                        @endif
                                        
                                    </div>
                                    @if ($errors->has('category'))
                                            <strong class="text-danger my-2">{{$errors->first('category')}}</strong>
                                    @endif
                                    @if ($errors->has('category.*'))
                                        <strong class="text-danger my-2">{{$errors->first('category.*')}}</strong>
                                    @endif
                                   
                                </div>
                            </div>
                            <label for="editor" class="text-capitalize font-weight-bold">Content</label>
                            <textarea id="editor" name="content" class="@error('content') is-invalid @enderror">
                                @if (old('content'))
                                    {{old('content')}}
                                @else 
                                    {{$blog->content}}
                                @endif
                                
                            </textarea>
                            @if ($errors->has('content'))
                                <strong class="text-danger my-2">{{$errors->first('content')}}</strong>
                            @endif
                            <div class="my-3">
                                <button type="submit" class="btn btn-primary btn-sm text-capitalize">update post</button>
                            </div>
                            
                        </form>
                        


                    </div>
                    <!-- end container-fluid -->
                </div>
                <!-- end app-main -->

                    
@endsection
@section('special-script')
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <script>
        
        ClassicEditor
            .create(document.querySelector('#editor'), {
                ckfinder: {
                    uploadUrl: "{{ route('admin.dashboard.blog.upload_image',['_token'=>csrf_token()]) }}", // Laravel route for image upload
                }
            })
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });

    </script>
@endsection