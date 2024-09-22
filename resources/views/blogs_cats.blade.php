@extends('layouts.app')
@section('title','Amine Mokeddem')
    
@section('content')

<!-- portfolio -->
<div id="portfolio" class="portfolio segments">
    <div class="container-fluid">
        <div class="box-content">
            <div class="section-title">
                <h3 class="text-uppercase">{{$cat->name}}</h3>
            </div>
            <div class="row">
                <div class="portfolio-filter-menu col-md-3">
                    <div class="text-uppercase text-left font-weight-bold mb-3" style="color:#ff8c05">categories</div>
                    <ul class="text-left">
                        <li data-filter="all" @if($cat->name == 'all') class="active" @endif>
                            <a href="{{route('blogs.show','all')}}" class="text-uppercase">see all</a>
                        </li>
                        @if ($categories && count($categories))
                            
                            <?php
                            
                                function print_categories($categories,$parent,$deep,$underscore,$cat){
                                    foreach($categories as $category){
                                        if($category->parent == $parent){
                                            ?>
                                            
                                            <li class="text-capitalize mb-2 d-block @if($cat['name'] != 'all' && $category->id == $cat->id) active @endif" >
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
                                                
                                                <a href="{{route('blogs.show',$category->slug)}}" class="text-uppercase">{{$category->name}}</a>
                                            </li>
                                            
                                            <?php

                                            if($deep){
                                                print_categories($categories,$category->id,$deep-1,$underscore+1,$cat);
                                            }
                                        }
                                        
                                    }
                                }
                                print_categories($categories,null,$deep,0,$cat);

                            ?>
                        @endif
                    </ul>
                </div>
            

                <div class="row no-gutters filtr-container col-md-9">
                    @if ($blogs && count($blogs))
                        @foreach ($blogs as $blog)
                            @php
                                
                            @endphp
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <div class="content-image">
                                    <a href="{{route('blog.show',$blog->slug)}}">
                                        <img src="{{asset('storage/'.$blog->picture)}}" height="414" alt="">
                                        <div class="image-overlay"></div>
                                        <div class="portfolio-caption">
                                            <div class="title">
                                                <h4>{{$blog->title}}</h4>
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