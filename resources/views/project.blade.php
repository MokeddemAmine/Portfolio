@extends('layouts.app')
@section('title','Amine Mokeddem')
    
@section('content')
<style>
    .navbar.fix{
        position: relative !important;
    }
</style>
<!-- portfolio -->
<div id="portfolio" class="portfolio segments">
    <div class="container">
        <div class="box-content">
            <div class="section-title">
                <h3>{{$project->title}}</h3>
            </div>
            @php
                $images = json_decode($project->pictures);
            @endphp
            <div class="section-content">
                <div id="project-pictures" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" style="height:800px;">
                        @foreach ($images as $image)
                            <div class="carousel-item h-100 @if($images[0] == $image) active @endif">
                                <img src="{{asset('storage/'.$image)}}" class="w-100 h-100" alt="{{$project->title}} picture"/>
                            </div>
                        @endforeach
                    </div>
                    @if (count($images) > 1)
                        <a href="#project-pictures" data-slide="prev" class="carousel-control-prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a href="#project-pictures" data-slide="next" class="carousel-control-next">
                            <span class="carousel-control-next-icon"></span>
                        </a>
                    @endif
                    
                </div>
                <h4 class="my-3 text-capitalize text-danger">{{$project->sub_title}}</h4>
                <div class="my-3">{{$project->description}}</div>
                <div class="my-3">
                    @if ($project->section && count($project->section))
                        <span class="text-success mr-3">Categories: </span>
                        @foreach ($project->section as $section)
                            <span class="btn btn-outline-primary btn-sm text-uppercase">{{$section->section}}</span>
                        @endforeach
                    @endif
                </div>
                <div class="my-3">
                    @if($project->link)
                        <a href="{{$project->link}}" target="_blank" class="text-primary">Link of Project</a>
                    @endif
                </div>
            </div>   
        </div>
    </div>
<!-- end portfolio -->
@endsection
