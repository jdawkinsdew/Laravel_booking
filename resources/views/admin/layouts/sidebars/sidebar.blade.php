   <!-- ============================================================= -->
        <!-- ===============    side menu content start  ================= -->
        <!-- ============================================================= -->
        <div class="left-side-menu left-side-menu-light">
            <div class="slimscroll-menu">
                <!-------------------------------------->
                <!-- Put your logo hear in img tag -->
                <a href="index.html" class="logo">
                    <span class="logo-lg">
                        
                        <img src="{{asset('uploads/setting/basic/'.$logo)}}" alt="">
                    </span>
                    <span class="logo-sm">
                        <img src="{{asset('uploads/setting/basic/'.$favicon)}}" alt="">
                    </span>
                </a>
                <!-- Logo content end -->
                <!-------------------------------------->
                <!-------------------------------------->
                <!-- User details start -->
                <div class="sidenav-user">
                    <h4 class="mb-1 mt-0">{{$websiteName}}</h4>
                    <p class="mb-2">{{$manager_name}}</p>
                    <img src="{{asset('uploads/setting/basic/'.$profileImage)}}" alt="" class="rounded-circle" style="background: #f2f3f8;box-shadow: 0 0 0 7px #f2f3f8">
                </div>
                <!-- User details end -->
                <!-------------------------------------->
                <!-------------------------------------->
                <!-- Menu link start -->
                <ul class="metismenu side-nav side-nav-light in" style="background: #f2f3f8">
                    <li class="menu-caption menu-item mt-1">Admin Management</li>
                    <li class="menu-item">
                        <a href="javascript: void(0);" class="menu-link">
                            <i class="feather icon-layers"></i>
                            <span> Bookings </span>
                            <span class="menu-sub-icon"></span>
                        </a>
                        <ul class="menu-level-second collapse" aria-expanded="false">
                            <li><a href="{{ route('admin.bookings.calendar') }}">Calendar</a></li>
                            <li><a href="{{ route('admin.bookings.detailed') }}">Detailed</a></li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="javascript: void(0);" class="menu-link">
                            <i class="dripicons-document"></i>
                            <span> Reports </span>
                            <span class="menu-sub-icon"></span>
                        </a>
                        <ul class="menu-level-second collapse" aria-expanded="false">
                            <li><a href="{{ route('admin.reports.bookings') }}">Bookings</a></li>
                            <li><a href="{{ route('admin.reports.performed_services') }}">Performed Services</a></li>
                            <li><a href="{{ route('admin.reports.revenue') }}">Revenue</a></li>
                            <li><a href="{{ route('admin.reports.capacity_utilization') }}">Capacity Utilization</a></li>
                            <li><a href="{{ route('admin.reports.new_unique_customer') }}">New Unique Customers</a></li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="javascript: void(0);" class="menu-link">
                            <i class="feather icon-feather"></i>
                            <span> Settings </span>
                            <span class="menu-sub-icon"></span>
                        </a>
                        <ul class="menu-level-second collapse" aria-expanded="false">
                            <li><a href="{{ route('admin.settings.services') }}">Services</a></li>
                            <li><a href="{{ route('admin.settings.providers') }}">Service Providers</a></li>
                            <li><a href="{{ route('admin.settings.areas') }}">Areas</a></li>
                            {{-- <li><a href="{{ route('admin.settings.clients') }}">Clients</a></li>
                            <li><a href="{{ route('admin.settings.users') }}">Users</a></li> --}}
                            {{-- <li><a href="{{ route('admin.settings.intake_forms') }}">Intake Forms</a></li> --}}
                            <li><a href="{{ route('admin.settings.service_add_ons') }}">Service add-ons</a></li>
                            {{-- <li><a href="{{ route('admin.settings.discount') }}">Discount</a></li> --}}
                            <li><a href="{{ route('admin.settings.basic_settings') }}">Basic Settings</a></li>
                            {{-- <li><a href="{{ route('admin.settings.time_settings') }}">Time Settings</a></li>
                            <li><a href="{{ route('admin.settings.import_excel') }}">Import Excel</a></li> --}}
                            <li><a href="{{ route('admin.settings.working_hour.index') }}">Working Hour</a></li>
                            <li><a href="{{ route('admin.settings.user_manage.index') }}">User Manage</a></li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="{{ asset('others.other') }}" class="menu-link">
                            <i class="feather icon-monitor"></i>
                            <span> Plans & Prices</span>
                        </a>
                    </li>

                </ul>
                <!-- Menu link end -->
                <!-------------------------------------->

                <div class="clearfix"></div>
            </div>
        </div>
        <!-- ============================================================= -->
        <!-- ===============     side menu content End   ================= -->
        <!-- ============================================================= -->
