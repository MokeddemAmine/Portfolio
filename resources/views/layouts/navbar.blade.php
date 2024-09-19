<!-- header -->
<header id="home">

    <!-- navbar -->
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark">

            <!-- navbar brand or logo -->
            <a href="{{route('home')}}" class="navbar-brand">
                <h2 class="text-uppercase">
                    @if ($logo)
                        @if ($logo->name)
                            <img src="{{asset('storage/'.$logo->picture)}}" width="30" alt="">
                        @endif
                        @if ($logo->description)
                            {{$logo->title}}
                        @endif
                        
                    @else 
                    LOGO
                    @endif
                </h2>
            </a>
            <!-- end navbar brand or logo -->

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo" aria-controls="navbarTogglerDemo" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            @if (isset($navbar))
                <div id="navbarTogglerDemo" class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a href="#home" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="#about" class="nav-link">About</a>
                        </li>
                        <li class="nav-item">
                            <a href="#resume" class="nav-link">Resume</a>
                        </li>
                        <li class="nav-item">
                            <a href="#portfolio" class="nav-link">Portfolio</a>
                        </li>
                        <li class="nav-item">
                            <a href="#blog" class="nav-link">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="#contact" class="nav-link">Contact</a>
                        </li>
                    </ul>
                </div>
            @else
            <div id="navbarTogglerDemo" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a href="{{route('home')}}" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('portfolio')}}" class="nav-link">Portfolio</a>
                    </li>
                </ul>
            </div>
            @endif
            
        </nav>
    </div>
    <!-- end navbar -->

   

</header>
<!-- end header -->