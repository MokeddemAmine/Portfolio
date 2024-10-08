<!-- begin app-nabar -->
<aside class="app-navbar">
    <!-- begin sidebar-nav -->
    <div class="sidebar-nav scrollbar scroll_light">
        <ul class="metismenu " id="sidebarNav">
            @auth('admin')
                <li data-link="dashboard">
                    <a href="{{route("admin.dashboard.index")}}" aria-expanded="false">
                        <i class="nav-icon ti ti-rocket"></i>
                        <span class="nav-title">{{_('Dashboards')}}</span>
                    </a>
                </li>
                <li data-link="main"> 
                    <a class="has-arrow" href="javascript:void(0)"  aria-expanded="false" ><i class="nav-icon ti ti-home"></i><span class="nav-title">{{_('Main')}}</span><span class="nav-label label label-primary">4</span></a> 
                    <ul aria-expanded="false">
                        <li><a href="{{route('admin.dashboard.main.home.index')}}" class="text-capitalize">home</a></li>
                        <li><a href="{{route('admin.dashboard.main.about.index')}}" class="text-capitalize">about</a></li>
                        <li ><a href="{{route('admin.dashboard.main.resume.index')}}" class="text-capitalize">resume</a></li>
                        <li><a href="{{route('admin.dashboard.main.contact.index')}}" class="text-capitalize">contact</a></li>
                    </ul>
                </li>
                <li data-link="portfolio"><a href="{{route('admin.dashboard.portfolio.index')}}" class="text-capitalize"><i class="nav-icon ti ti-gallery"></i>portfolio</a></li>
                <li  data-link="blog">
                    <a href="javascript:void(0" class="text-capitalize has-arrow" aria-expanded="false"><i class="nav-icon ti ti-pencil"></i><span class="nav-title">{{_('Blog')}}</span><span class="nav-label label label-primary">3</span></a>
                    <ul aria-expanded="false">
                        <li><a href="{{route('admin.dashboard.blog.index')}}" class="text-capitalize">All</a></li>
                        <li><a href="{{route('admin.dashboard.blog.create')}}" class="text-capitalize">Create Post</a></li>
                        <li><a href="{{route('admin.dashboard.categories.index')}}" class="text-capitalize">Categories</a></li>
                    </ul>
                </li>
                <li data-link="mail"><a href="{{route('admin.dashboard.mail_inbox')}}" aria-expanded="false"><i class="nav-icon ti ti-email"></i><span class="nav-title">{{_('Mail')}}</span></a> </li>
                <li data-link="account-settings"> <a href="{{route('admin.dashboard.account_settings')}}"><i class="nav-icon ti ti-settings"></i>{{_('Account Settings')}}</a> </li>
            @endauth
        </ul>
    </div>
    <!-- end sidebar-nav -->
</aside>