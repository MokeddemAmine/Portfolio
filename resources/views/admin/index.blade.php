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
                                    <h1 class="text-primary text-capitalize">dashboard</h1>
                                </div>
                            </div>
                            <!-- end page title -->
                            <div class="page-content mt-4">
                                <div class="row">
                                    <div class="col-md-6 col-xl-3">
                                        <div class="card rounded">
                                            <div class="card-body text-center">
                                                <h2 class="text-secondary text-capitalize">projects</h2>
                                                <a href="{{route('admin.dashboard.portfolio.index')}}" class="display-1 number">{{$projects}}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xl-3">
                                        <div class="card rounded">
                                            <div class="card-body text-center">
                                                <h2 class="text-secondary text-capitalize">blog posts</h2>
                                                <a href="{{route('admin.dashboard.blog.index')}}" class="display-1 number">{{$posts}}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xl-3">
                                        <div class="card rounded">
                                            <div class="card-body text-center">
                                                <h2 class="text-secondary text-capitalize">messages</h2>
                                                <a href="{{route('admin.dashboard.mail_inbox')}}" class="display-1 number">{{$messages}}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xl-3">
                                        <div class="card rounded">
                                            <div class="card-body text-center">
                                                <h2 class="text-secondary text-capitalize">views</h2>
                                                <span class=" display-1 number">{{$views}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pages mt-3">
                                <ul class="list-unstyled text-uppercase text-primary">
                                    <li class="text-primary" >
                                        <a href="{{route('admin.dashboard.main.index')}}"><h3 class="text-danger">main</h3></a>
                                        <ul class="list-unstyled ml-3">
                                            <li><a href="{{route('admin.dashboard.main.home.index')}}"><h4 class="text-secondary">home</h4></a></li>
                                            <li><a href="{{route('admin.dashboard.main.about.index')}}"><h4 class="text-secondary">about</h4></a></li>
                                            <li><a href="{{route('admin.dashboard.main.resume.index')}}"><h4 class="text-secondary">resume</h4></a></li>
                                            <li><a href="{{route('admin.dashboard.main.contact.index')}}"><h4 class="text-secondary">contact</h4></a></li>
                                        </ul>
                                    </li>
                                    <li><a href="{{route('admin.dashboard.portfolio.index')}}"><h3 class="text-danger">portfolio</h3></a></li>
                                    <li class="text-primary" >
                                        <a href="{{route('admin.dashboard.blog.index')}}"><h3 class="text-danger">blog</h3></a>
                                        <ul class="list-unstyled ml-3">
                                            <li><a href="{{route('admin.dashboard.blog.index')}}"><h4 class="text-secondary">all</h4></a></li>
                                            <li><a href="{{route('admin.dashboard.blog.create')}}"><h4 class="text-secondary">create post</h4></a></li>
                                            <li><a href="{{route('admin.dashboard.categories.index')}}"><h4 class="text-secondary">categories</h4></a></li>
                                        </ul>
                                    </li>
                                    <li><a href="{{route('admin.dashboard.mail_inbox')}}"><h3 class="text-danger">mail</h3></a></li>
                                    <li><a href="{{route('admin.dashboard.account_settings')}}"><h3 class="text-danger">account settings</h3></a></li>
                                </ul>
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

            $('.number').each(function(index,ele){
                let number = parseInt($(this).text());
                if(number == 0){
                    $(this).addClass('text-secondary');
                }else if(number < 20){
                    $(this).addClass('text-danger');
                }else if(number <= 1000){
                    $(this).addClass('text-success')
                }else if(number > 1000 && number < 1000000){
                    let new_number = number / 1000;
                    $(this).addClass('text-primary');
                    $(this).text(new_number+'K');
                }else{
                    let new_number = number / 1000000;
                    $(this).addClass('text-warning');
                    $(this).text(new_number+'M');
                }
            })
        })
    </script>
@endsection
            