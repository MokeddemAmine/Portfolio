@extends('layouts.app')
@section('title','Amine Mokeddem')
    
@section('content')

<!-- portfolio -->
<div id="portfolio" class="portfolio segments">
    <div class="container-fluid">
        <div class="box-content">
            <div class="section-title">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-9">
                        <h3 class="text-uppercase">{{$blog->title}}</h3>
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="portfolio-filter-menu col-md-3">
                    <div class="text-uppercase text-left font-weight-bold mb-3" style="color:#ff8c05">categories</div>
                    <ul class="text-left">
                        <li>
                            <span><a href="{{route('blogs.show','all')}}" class="text-uppercase">see all</a></span>
                        </li>
                        @if ($categories && count($categories))
                            
                            <?php
                            
                                function print_categories($categories,$parent,$deep,$underscore){
                                    foreach($categories as $category){
                                        if($category->parent == $parent){
                                            ?>
                                            
                                            <li class="text-capitalize mb-2 d-block">
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
                                                {{-- <span>{{$category->name}}</span> --}}
                                                <a href="{{route('blogs.show',$category->slug)}}">{{$category->name}}</a>
                                            </li>
                                            
                                            <?php

                                            if($deep){
                                                print_categories($categories,$category->id,$deep-1,$underscore+1);
                                            }
                                        }
                                        
                                    }
                                }
                                print_categories($categories,null,$deep,0);

                            ?>
                        @endif
                    </ul>
                </div>
            

                <div class="no-gutters col-md-9">
                    @if ($blog)
                            @php
                                
                            @endphp
                            
                            <div class="picture text-center mx-auto">
                                <img src="{{asset('storage/'.$blog->picture)}}" height="600" alt="{{$blog->title}} picture" />
                            </div>
                            <div class="last-date-update my-2 d-flex justify-content-between">
                                <span>Date : {{$blog->created_at->format('Y/m/d')}}</span>
                                @if ($blog->created_at != $blog->updated_at)
                                    <span>Last Update {{$blog->updated_at->format('Y/m/d')}}</span>
                                @endif
                                
                            </div>
                            <div class="content my-3">
                                {!!$blog->content!!}
                            </div>

                            @if ($blog->categories && count($blog->categories))
                                <div class="w-100 my-3 row">
                                    <div class="col-md-2 text-uppercase text-warning font-weight-bold">categories :</div>
                                    <div class="col-md-10">
                                        @foreach ($blog->categories as $category)
                                            <span class="mx-2 text-uppercase font-weight-bold" ><a href="{{route('blogs.show',$category->slug)}}" style="color:#ff8c05">{{$category->name}}</a></span>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        
                    @endif
                </div>
            </div>
            @if ($blogs_related && count($blogs_related))
                <div class="row my-3">
                    <div class="col-md-3"></div>
                    
                    <div class="col-md-9">
                        <h5 class="text-uppercase text-secondary my-4">related blogs </h5>
                        <div class="row">
                            
                            @foreach ($blogs_related as $blog_related)
                                
                                    <div class="col-md-6 col-xl-3 no-gutters filtr-container p-2">
                                        <div class="content-image">
                                            <a href="{{route('blog.show',$blog_related->slug)}}">
                                                    <img src="{{asset('storage/'.$blog_related->picture)}}" height="300" class="w-100" alt="{{$blog_related->title}} picture" />
                                                <div class="image-overlay"></div>
                                                <div class="portfolio-caption">
                                                    <div class="title text-uppercase font-weight-bold" style="color:#ff8c05">
                                                        {{$blog_related->title}}
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        
                                        
                                    </div>
                               
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
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