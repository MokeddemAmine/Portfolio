<!-- begin app-nabar -->
<aside class="app-navbar">
    <!-- begin sidebar-nav -->
    <div class="sidebar-nav scrollbar scroll_light">
        <ul class="metismenu " id="sidebarNav">
            <li class="nav-static-title">{{_('Personal')}}</li>
            @auth('admin')
                
                @if (Auth::guard('admin')->user()->email_verified_at)
                <li class="active">
                    <a href="{{route("admin.dashboard.index")}}" aria-expanded="false">
                        <i class="nav-icon ti ti-rocket"></i>
                        <span class="nav-title">{{_('Dashboards')}}</span>
                    </a>
                </li>
                <li><a href="{{route('admin.dashboard.mail_inbox')}}" aria-expanded="false"><i class="nav-icon ti ti-email"></i><span class="nav-title">{{_('Mail')}}</span></a> </li>
                <li> 
                    <a class="has-arrow" href="javascript:void(0)"  aria-expanded="false" ><i class="nav-icon ti ti-home"></i><span class="nav-title">{{_('Main')}}</span><span class="nav-label label label-primary">6</span></a> 
                    <ul aria-expanded="false">
                        <li><a href="{{route('admin.dashboard.main.home.index')}}" class="text-capitalize">home</a></li>
                        <li><a href="{{route('admin.dashboard.main.about.index')}}" class="text-capitalize">about</a></li>
                        <li><a href="{{route('admin.dashboard.main.resume.index')}}" class="text-capitalize">resume</a></li>
                        <li><a href="{{route('admin.dashboard.main.portfolio.index')}}" class="text-capitalize">portfolio</a></li>
                        <li><a href="" class="text-capitalize">blog</a></li>
                        <li><a href="{{route('admin.dashboard.main.contact.index')}}" class="text-capitalize">contact</a></li>
                    </ul>
                </li>
                <li> <a href="{{route('admin.dashboard.account_settings')}}"><i class="nav-icon ti ti-settings"></i>{{_('Account Settings')}}</a> </li>
                <li> <a href="{{route('admin.dashboard.pricing')}}"><i class="nav-icon ti ti-money"></i>{{_('Pricing')}}</a> </li>
                @else 
                <li>
                    <a class="has-arrow" href="javascript:void(0)" aria-expanded="false"><i class="nav-icon ti ti-key"></i><span class="nav-title">Auth</span></a>
                    <ul aria-expanded="false">
                        <li> <a href="{{route('admin.dashboard.login')}}">{{_('Login')}}</a> </li>
                        <li> <a href="{{route('admin.dashboard.register')}}">{{_('Register')}}</a> </li>
                    </ul>
                </li>
                @endif
            @endauth
        </ul>
    </div>
    <!-- end sidebar-nav -->
</aside>