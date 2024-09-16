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
            <li><a href="{{route('admin.dashboard.app_chat')}}" aria-expanded="false"><i class="nav-icon ti ti-comment"></i><span class="nav-title">{{_('Chat')}}</span></a> </li>
            <li><a href="{{route('admin.dashboard.mail_inbox')}}" aria-expanded="false"><i class="nav-icon ti ti-email"></i><span class="nav-title">{{_('Mail')}}</span></a> </li>
            @endif
            <li>
                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false"><i class="nav-icon ti ti-layers"></i><span class="nav-title">{{_('Pages')}}</span><span class="nav-label label label-primary">12</span></a>
                <ul aria-expanded="false">
                    <li> 
                        <a class="has-arrow" href="javascript:void(0)"  aria-expanded="false" ><span class="nav-title">{{_('Main')}}</span></a> 
                        <ul aria-expanded="false">
                            <li><a href="{{route('admin.dashboard.main.home.index')}}" class="text-capitalize">home</a></li>
                            <li><a href="{{route('admin.dashboard.main.about.index')}}" class="text-capitalize">about</a></li>
                            <li><a href="" class="text-capitalize">resume</a></li>
                            <li><a href="" class="text-capitalize">portfolio</a></li>
                            <li><a href="" class="text-capitalize">blog</a></li>
                            <li><a href="{{route('admin.dashboard.main.contact.index')}}" class="text-capitalize">contact</a></li>
                        </ul>
                    </li>
                    <li> <a href="{{route('admin.dashboard.account_settings')}}">{{_('Account Settings')}}</a> </li>
                    @if (Auth::guard('admin')->user()->email_verified_at)
                    <li> <a href="{{route('admin.dashboard.clients')}}">{{_('Clients')}}</a> </li>
                    <li> <a href="{{route('admin.dashboard.contacts')}}">{{_('Contacts')}}</a> </li>
                    <li> <a href="{{route('admin.dashboard.employees')}}">{{_('Employees')}}</a> </li>
                    <li> <a href="{{route('admin.dashboard.faq')}}">{{_('FAQ')}}</a> </li>
                    <li> <a href="{{route('admin.dashboard.file_manager')}}">{{_('File Manager')}}</a> </li>
                    <li> <a href="{{route('admin.dashboard.gallery')}}">{{_('Gallery')}}</a> </li>

                    <li> <a href="{{route('admin.dashboard.pricing')}}">{{_('Pricing')}}</a> </li>
                    <li> <a href="{{route('admin.dashboard.task_list')}}">{{_('Task List')}}</a> </li>
                    <li> <a href="{{route('admin.dashboard.page_404')}}">404</a> </li>
                    <li> <a href="{{route('admin.dashboard.page_500')}}">500</a> </li>
                    <li> <a href="{{route('admin.dashboard.coming_soon')}}">{{_('Coming Soon')}}</a> </li>
                    @endif
                </ul>
            </li>
            @else 
            <li>
                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false"><i class="nav-icon ti ti-key"></i><span class="nav-title">Auth</span></a>
                <ul aria-expanded="false">
                    <li> <a href="{{route('admin.dashboard.login')}}">{{_('Login')}}</a> </li>
                    <li> <a href="{{route('admin.dashboard.register')}}">{{_('Register')}}</a> </li>
                </ul>
            </li>
            @endauth
        </ul>
    </div>
    <!-- end sidebar-nav -->
</aside>