@extends('layouts.app')
@section('title','Amine Mokeddem')
    
@section('content')

<!-- portfolio -->
<div id="portfolio" class="portfolio segments">
    <div class="container">
        <div class="box-content">
            <div class="section-title">
                <h3>My Portfolio</h3>
            </div>
            <div class="portfolio-filter-menu">
                <ul>
                    <li data-filter="all" class="active">
                        <span>See All</span>
                    </li>
                    @if ($portfolio && count($portfolio))
                        @foreach ($portfolio as $section)
                            <li class="text-capitalize" data-filter="{{$section->id}}">
                                <span>{{$section->section}}</span>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>

            <div class="row no-gutters filtr-container">
                @if ($projects && count($projects))
                    @foreach ($projects as $project)
                        @php
                            $image = json_decode($project->pictures)[0];
                        @endphp
                        <div class="col-md-4 col-sm-12 col-xs-12 filtr-item" 
                        data-category="@if($project->section && count($project->section))@for($i = 0; $i < count($project->section); $i++){{$project->section[$i]->id}}@if($i != count($project->section) -1),@endif @endfor @endif">
                            <div class="content-image">
                                <a href="{{route('project',$project->id)}}">
                                    <img src="{{asset('storage/'.$image)}}" alt="">
                                    <div class="image-overlay"></div>
                                    <div class="portfolio-caption">
                                        <div class="title">
                                            <h4>{{$project->title}}</h4>
                                        </div>
                                        <div class="subtitle">
                                            <span>{{$project->sub_title}}</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
<!-- end portfolio -->
@endsection
@section('special-script')
    <script>
        $(document).ready(function(){
            $('.filtr-item').each(function(index,element){
                $(this).attr('data-category',$(this).attr('data-category').replace(/\s+/g, ''));
            })
        })
    </script>
@endsection