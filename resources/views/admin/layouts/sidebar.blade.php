<!-- begin app-nabar -->
<aside class="app-navbar">
    <!-- begin sidebar-nav -->
    <div class="sidebar-nav scrollbar scroll_light">
        <ul class="metismenu " id="sidebarNav">
            <li class="nav-static-title">Personal</li>
            <li class="active">
                <a href="{{route("admin.dashboard.index")}}" aria-expanded="false">
                    <i class="nav-icon ti ti-rocket"></i>
                    <span class="nav-title">Dashboards</span>
                </a>
            </li>
            <li><a href="{{route('admin.dashboard.app_chat')}}" aria-expanded="false"><i class="nav-icon ti ti-comment"></i><span class="nav-title">Chat</span></a> </li>
            <li><a href="{{route('admin.dashboard.mail_inbox')}}" aria-expanded="false"><i class="nav-icon ti ti-email"></i><span class="nav-title">Mail</span></a> </li>
            <li>
                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false"><i class="nav-icon ti ti-layers"></i><span class="nav-title">Pages</span><span class="nav-label label label-primary">12</span></a>
                <ul aria-expanded="false">
                    <li> <a href="{{route('admin.dashboard.account_settings')}}">Account Settings</a> </li>
                    <li> <a href="{{route('admin.dashboard.clients')}}">Clients</a> </li>
                    <li> <a href="{{route('admin.dashboard.contacts')}}">Contacts</a> </li>
                    <li> <a href="{{route('admin.dashboard.employees')}}">Employees</a> </li>
                    <li> <a href="{{route('admin.dashboard.faq')}}">FAQ</a> </li>
                    <li> <a href="{{route('admin.dashboard.file_manager')}}">File Manager</a> </li>
                    <li> <a href="{{route('admin.dashboard.gallery')}}">Gallery</a> </li>

                    <li> <a href="{{route('admin.dashboard.pricing')}}">Pricing</a> </li>
                    <li> <a href="{{route('admin.dashboard.task_list')}}">Task List</a> </li>
                    <li> <a href="{{route('admin.dashboard.page_404')}}">404</a> </li>
                    <li> <a href="{{route('admin.dashboard.page_500')}}">500</a> </li>
                    <li> <a href="{{route('admin.dashboard.coming_soon')}}">Coming Soon</a> </li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false"><i class="nav-icon ti ti-key"></i><span class="nav-title">Auth</span></a>
                <ul aria-expanded="false">
                    <li> <a href="{{route('admin.dashboard.login')}}">Login</a> </li>
                    <li> <a href="{{route('admin.dashboard.register')}}">Register</a> </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- end sidebar-nav -->
</aside>