<!-- begin app-header -->
<header class="app-header top-bar">
    <!-- begin navbar -->
    <nav class="navbar navbar-expand-md">
        <!-- begin navbar-header -->
        <div class="navbar-header d-flex align-items-center">
            <a href="javascript:void:(0)" class="mobile-toggle"><i class="ti ti-align-right"></i></a>
            <a class="navbar-brand text-primary" href="{{route('admin.dashboard.index')}}">
                @if ($logo)
                    @if ($logo->name)
                        <img src="{{asset('storage/'.$logo->picture)}}" style="width:30px !important;" class="img-fluid logo-desktop" alt="logo" />
                        <img src="{{asset('storage/'.$logo->picture)}}" class="img-fluid logo-mobile" alt="logo" />
                    @endif
                    @if ($logo->description)
                        <span class="text-uppercase" style="font-size: 1.2rem">{{$logo->title}}</span>
                    @endif
                        
                @else 
                    LOGO
                @endif                                 
                
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="ti ti-align-left"></i>
        </button>
        <!-- end navbar-header -->
        <!-- begin navigation -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="navigation d-flex">
                
                <ul class="navbar-nav nav-left">
                    <li class="nav-item">
                        <a href="javascript:void(0)" class="nav-link sidebar-toggle">
                            <i class="ti ti-align-right"></i>
                        </a>
                    </li>
                    @auth('admin')
                    <li class="nav-item full-screen d-none d-lg-block" id="btnFullscreen">
                        <a href="javascript:void(0)" class="nav-link expand">
                            <i class="icon-size-fullscreen"></i>
                        </a>
                    </li>
                    @endauth
                </ul>
                
                <ul class="navbar-nav nav-right ml-auto">
                    @guest('admin')
                        <li class="nav-item">
                            
                            <a href="{{route('admin.dashboard.login')}}" class="nav-link text-capitalize d-flex">
                                <i class="ti ti-user mr-2"></i>
                                {{_('login')}}
                            </a>
                        </li>
                    @else 
                    @if (Auth::guard('admin')->user()->email_verified_at)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ti ti-email"></i>
                        </a>
                        <div class="dropdown-menu extended animated fadeIn" aria-labelledby="navbarDropdown">
                            <ul>
                                <li class="dropdown-header bg-gradient p-4 text-white text-left">{{_('Messages')}}
                                    <label class="label label-info label-round msg_count"></label>
                                    <a href="#" class="float-right btn btn-square btn-inverse-light btn-xs m-0" id="read-all-messages">
                                        <span class="font-13"> {{_('Mark all as read')}}</span></a>
                                </li>
                                <li class="dropdown-body">
                                    <ul class="scrollbar scroll_dark max-h-240" id="messages">
                                        
                                    </ul>
                                </li>
                                <li class="dropdown-footer">
                                    <a class="font-13" href="{{route('admin.dashboard.mail_inbox')}}">{{_(' View All messages')}} </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link search" href="javascript:void(0)">
                            <i class="ti ti-search"></i>
                        </a>
                        <div class="search-wrapper">
                            <div class="close-btn">
                                <i class="ti ti-close"></i>
                            </div>
                            <div class="search-content">
                                <form>
                                    <div class="form-group">
                                        <i class="ti ti-search magnifier"></i>
                                        <input type="text" class="form-control autocomplete" placeholder="{{_('Search Here')}}" id="autocomplete-ajax" autofocus="autofocus">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </li>
                    @endif
                    <li class="nav-item dropdown user-profile">
                        <a href="javascript:void(0)" class="nav-link dropdown-toggle " id="navbarDropdown4" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @if (Auth::guard('admin')->user()->picture)
                                <img src="{{asset('storage/'.Auth::guard('admin')->user()->picture)}}" alt="admin image">
                            @else 
                                <img src="{{asset('admin/assets/img/user.png')}}" alt="admin image">
                            @endif
                            <span class="bg-success user-status"></span>
                        </a>
                        <div class="dropdown-menu animated fadeIn" aria-labelledby="navbarDropdown">
                            <div class="bg-gradient px-4 py-3">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="mr-1">
                                        <h4 class="text-white mb-0">{{Auth::guard('admin')->user()->name}}</h4>
                                        <small class="text-white">{{Auth::guard('admin')->user()->email}}</small>
                                    </div>
                                    <a href="{{route('admin.dashboard.logins.logout')}}" class="text-white font-20 tooltip-wrapper" data-toggle="tooltip" data-placement="top" title="" data-original-title="Logout"> <i
                                                    class="zmdi zmdi-power"></i></a>
                                </div>
                            </div>
                            <div class="p-4">
                                @if (Auth::guard('admin')->user()->email_verified_at)
                                <a class="dropdown-item d-flex nav-link" href="{{route('admin.dashboard.mail_inbox')}}">
                                    <i class="fa fa-envelope pr-2 text-primary"></i> {{_('Inbox')}}
                                    <span class="badge badge-primary ml-auto msg_count"></span>
                                </a>
                                @endif
                                <a class="dropdown-item d-flex nav-link" href="{{route('admin.dashboard.account_settings')}}">
                                    <i class=" ti ti-settings pr-2 text-info"></i> {{_('Settings')}}
                                </a>
                                <a class="dropdown-item d-flex nav-link" href="{{route('admin.dashboard.logins.logout')}}">
                                    <i class=" ti ti-power-off pr-2 text-info"></i> {{_('logout')}}
                                </a>
                            </div>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
        <!-- end navigation -->
    </nav>
    <!-- end navbar -->
</header>
<script>
    $(document).ready(function(){
        get_new_messages();
        setInterval(() => {
            get_new_messages();
        }, 5000);
        function get_new_messages(){
            $.ajax({
                method:'GET',  
                url:'{{route('admin.dashboard.messages_in_time')}}',
                success:function(data){
                    $('.msg_count').text(data.messages.length);
                    $('ul#messages').html('');
                    data.messages.map(function(msg){
                        let message = msg.message.substring(0, 40);
                        let id = msg.id;
                        if(message.length < msg.message.length){
                            message += '...';
                        }
                        $('ul#messages').append(`
                            <li>
                                <a href="/admin/dashboard/read_message/${id}">
                                    <div class="notification d-flex flex-row align-items-center">
                                        <div class="notify-message ml-3">
                                            <p class="font-weight-bold">${msg.first_name}</p>
                                            <small>${message}</small>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        `);
                    })
                },
                error:function(xhr,status,err){
                    console.log(err);
                }
            });
        }
        // messages: mark all as read
        $('#read-all-messages').click(function(){
            $.ajax({
                method:'GET',
                url:'{{route('admin.dashboard.read_all_messages')}}',
                success:function(data){
                    if(data.status){
                        $('ul#messages').html();
                    }
                },
                error:function(xhr,status,err){
                    console.log(err);
                }
            });
        })
    })
</script>