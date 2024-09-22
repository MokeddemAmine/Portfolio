
@extends('layouts.app')
@section('title','Amine Mokeddem')
    
@section('content')
    <!-- home intro -->
    <div class="home-intro segments">
        <div class="container">
            <div class="intro-content box-content">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        <div class="intro-caption">
                            <span>I am @if ($home)
                                {{$home->name}}
                            @endif</span>
                            <h2 class="text-uppercase">@if ($home)
                                {{$home->title}}
                            @endif</h2>
                            
                            <a href="@if($home) {{$home->contacts}} @endif" target="_blank" class="button">Contact Me</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="intro-image">
                            @if ($home)
                            <img src="{{asset('storage/'.$home->picture)}}" alt="{{$home->name}} picture" />
                            @endif
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end home intro -->
    <!-- about -->
    <div id="about" class="about segments">
        <div class="container">
            <div class="box-content">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="content-left">
                            <div class="section-title section-title-left">
                                <h3>About Me</h3>
                            </div>
                            <div class="content">
                                <h2>I am @if ($about)
                                    <span class="text-capitalize">{{$about->title}}</span>
                                @endif</h2>
                                @if ($about)
                                    <p>{{$about->description}}</p>
                                @endif
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="content-right" @if ($about)
                            style="background-image: url({{asset('storage/'.$about->picture)}})"
                        @endif></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end about -->

    <!-- resume -->
    <div id="resume" class="resume segments">
        <div class="container">
            <div class="box-content">
                <div class="section-title">
                    <h3>My Resume</h3>
                </div>
                @if ($resume)
                <div class="owl-carousel owl-theme">
                    @foreach ($resume as $resumes)
                    <div class="content">
                        @if ($resumes->display == 'commas')
                            
                        
                        <!-- my experience -->
                        <div class="row ">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="content-left">
                                    <div class="title-resume">
                                        <h3 class="text-uppercase">{{$resumes->name}}</h3>
                                        <h2 class="text-capitalize">{{$resumes->title_first_color}} <span>{{$resumes->title_second_color}}</span></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="content-right">
                                    <ul class="timeline">
                                        @if ($resumes->content && count($resumes->content))
                                            @foreach ($resumes->content as $content)
                                                <li>
                                                    <h4 class="text-capitalize">{{$content->title}}</h4>
                                                    <span class="text-capitalize">{{$content->sub_title}}</span>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @else 
                        <div class="my-skill">
                            <div class="row ">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="content-left">
                                        <div class="title-resume">
                                            <h3 class="text-uppercase">{{$resumes->name}}</h3>
                                            <h2 class="text-capitalize">{{$resumes->title_first_color}} <span>{{$resumes->title_second_color}}</span></h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="content-right">
                                        <div id="accordionSkill" class="accordion">
                                           
                                            @if ($resumes->content && count($resumes->content))
                                                    @php 
                                                        $titles = [];
                                                        foreach($resumes->content as $content){
                                                            
                                                            if(!in_array($content->title,$titles)){
                                                                $titles[] = $content->title;
                                                                
                                                            }
                                                        }
                                                        $i = 1;
                                                        
                                                    @endphp
                                                    @foreach ($titles as $title)
                                                        @php
                                                            $titleSpace = str_replace(' ', '', $title);
                                                        @endphp
                                                            <div class="card">
                                                                <div id="{{$titleSpace}}" class="card-header">
                                                                    <h2>
                                                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{$i}}" aria-expanded="true" aria-controls="collapse{{$i}}">
                                                                            <i class="fas fa-circle"></i>{{$title}}
                                                                        </button>
                                                                    </h2>
                                                                </div>

                                                                <div id="collapse{{$i}}" class="collapse collapse-show" aria-labelledby="{{$titleSpace}}" data-parent="#accordionSkill">
                                                                    <div class="card-body">
                                                                        <ul class="{{$titleSpace}}">
                                                                            @foreach ($resumes->content as $content)
                                                                                @if ($content->title == $title)
                                                                                    <li>
                                                                                        <div class="skill-title">
                                                                                            <span class="text-capitalize">{{$content->sub_title}}</span>
                                                                                        </div>
                                                                                        <div class="progress">
                                                                                            <div class="progress-bar" role="progressbar" aria-valuenow="{{$content->level}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$content->level}}%"></div>
                                                                                        </div>
                                                                                    </li>
                                                                                @endif
                                                                            @endforeach
                                                                        
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @php
                                                                $i++;
                                                            @endphp
                                                    @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        
                    </div>
                    @endforeach
                </div> 
                @endif               
            </div>
        </div>
    </div>
    <!-- end resume -->

    <!-- portfolio -->
    <div id="portfolio" class="portfolio segments">
        <div class="container">
            <div class="box-content">
                <div class="section-title">
                    <h3>My Portfolio</h3>
                </div>
                @if ($portfolio && count($portfolio))
                    <div class="row no-gutters filtr-container">
                        @foreach ($portfolio as $project)
                        @php
                            $image = json_decode($project->pictures)[0];
                        @endphp
                        <div class="col-md-4 col-sm-12 col-xs-12 filtr-item" data-category="1">
                            <div class="content-image">
                                <a href="{{asset('storage/'.$image)}}" class="portfolio-popup">
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
                    </div>
                @endif
                <div class="text-center my-2">
                    <a href="{{route('portfolio')}}" class="text-primary text-uppercase">show all projects <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- end portfolio -->

   
    @if ($blogs && count($blogs))
        <!-- blog -->
        <div id="blog" class="blog segments">
            <div class="container">
                <div class="section-title">
                    <h3>My Blog</h3>
                </div>
                <div class="row">
                    @foreach ($blogs as $blog)
                        <div class="col-md-6">
                            <div class="content">
                                <div class="image">
                                    <img src="{{asset('storage/'.$blog->picture)}}" height="414" alt="picture of {{$blog->title}}" />
                                </div>
                                <div class="blog-title">
                                    <h4><a href="#" class="text-capitalize">{{$blog->title}}</a></h4>
                                    <div class="date">
                                        {{$blog->updated_at->format('Y/m/d')}} 
                                        @if ($blog->categories && count($blog->categories))
                                            @foreach ($blog->categories as $category)
                                                <i class="fas fa-circle"></i> <a href="#"><span class="text-uppercase">{{$category->name}}</span></a>
                                            @endforeach
                                        @endif
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="my-3 text-center">
                    <a href="{{route('blogs.show','all')}}" class="text-primary text-uppercase">show all blogs <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </div>
        <!-- end blog -->
    @endif
    

    <!-- contact -->
    <div id="contact" class="contact segments">
        <div class="container">
            <div class="box-content">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="content-left">
                            <div class="section-title section-title-left">
                                <h3>Contact Me</h3>
                            </div>
                            @if ($contact)
                                <h2 class="text-capitalize">{{$contact->title}}</h2>
                                @php
                                    $links = json_decode($contact->contacts);
                                @endphp
                                @if ($links)
                                    <ul>
                                        @if ($links->website)
                                        <li>
                                            <a href="{{$links->website}}"><i class="fab fa-dribbble"></i></a>
                                        </li>
                                        @endif
                                        @if ($links->gmail)
                                            <li>
                                                <a href="mailto:{{$links->gmail}}"><i class="fab fa-google"></i></a>
                                            </li>
                                        @endif
                                        @if ($links->linkedin)
                                        <li>
                                            <a href="{{$links->linkedin}}"><i class="fab fa-linkedin"></i></a>
                                        </li>
                                        @endif
                                        @if ($links->github)
                                        <li>
                                            <a href="{{$links->github}}"><i class="fab fa-github"></i></a>
                                        </li>
                                        @endif
                                        @if ($links->facebook)
                                        <li>
                                            <a href="{{$links->facebook}}"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        @endif
                                        @if ($links->x_twitter)
                                        <li>
                                            <a href="{{$links->x_twitter}}"><i class="fab fa-twitter"></i></a>
                                        </li>
                                        @endif
                                        @if ($links->instagram)
                                        <li>
                                            <a href="{{$links->instagram}}"><i class="fab fa-instagram"></i></a>
                                        </li>
                                        @endif
                                        @if ($links->pinterest)
                                        <li>
                                            <a href="{{$links->pinterest}}"><i class="fab fa-pinterest"></i></a>
                                        </li>
                                        @endif
                                        
                                        
                                    </ul>
                                @endif
                            @endif
                            
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="content-right">
                            @if (session('successMessage'))
                                <strong class="text-success">{{session('successMessage')}}</strong>
                            @endif
                            <form action="{{route('message')}}" class="contact-form" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <div id="first-name-field">
                                            <input type="text" placeholder="First Name" value="{{old('first_name')}}" class="form-control @error('first_name') is-invalid @enderror" name="first_name">
                                        </div>
                                        @if($errors->has('first_name'))
                                            <strong class="text-danger mb-3">{{ $errors->first('first_name') }}</strong>
                                        @endif
                                    </div>
                                    <div class="col">
                                        <div id="last-name-field">
                                            <input type="text" placeholder="Last Name" value="{{old('last_name')}}" class="form-control @error('last_name') is-invalid @enderror" name="last_name">
                                        </div>
                                        @if($errors->has('last_name'))
                                            <strong class="text-danger mb-3">{{ $errors->first('last_name') }}</strong>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div id="email-field">
                                            <input type="email" placeholder="Email Address" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror" name="email">
                                        </div>
                                        @if($errors->has('email'))
                                            <strong class="text-danger mb-3">{{ $errors->first('email') }}</strong>
                                        @endif
                                    </div>
                                    <div class="col">
                                        <div id="subject-field">
                                            <input type="text" placeholder="Subject" value="{{old('subject')}}" class="form-control @error('subject') is-invalid @enderror" name="subject">
                                        </div>
                                        @if($errors->has('subject'))
                                            <strong class="text-danger mb-3">{{ $errors->first('subject') }}</strong>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div id="message-field">
                                            <textarea cols="30" rows="5" class="form-control @error('message') is-invalid @enderror" id="form-message" name="message" placeholder="Message">{{old('message')}}</textarea>
                                        </div>
                                            @if($errors->has('message'))
                                            <strong class="text-danger mb-3">{{ $errors->first('message') }}</strong>
                                        @endif
                                    </div>
                                </div>
                                <button class="button" type="submit" id="submit">Send Message</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end contact -->
@endsection

   