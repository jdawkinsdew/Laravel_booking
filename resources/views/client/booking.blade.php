<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Shimba Bootstrap 4 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Beethemesdesign" name="author" />

        <!-- favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}">


        <!-- third party css -->
        <link href="{{ asset('assets/css/vendor/fullcalendar.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- third party css end -->

        <!-- Required css -->
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/style.min.css') }}" rel="stylesheet" type="text/css" />

    </head>

    <body data-layout="topnav">

        <!-- Calendar Modal -->
        <div class="modal fade" id="selectDate" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <div id="calendar"></div>
                    </div>
                    <div class="modal-footer">
                       <button type="submit" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Close</button>
                       <button type="submit" class="btn btn-success" data-dismiss="modal" aria-hidden="true">OK</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Calendar Modal ends -->

        <!-- Show date event modal -->
        <div id="showDateEvent" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2), 0 4px 8px rgba(0, 0, 0, 0.2);">
                    <div class="modal-header">
                        <h4 class="modal-title text-danger" id="myModalLabel">Holiday!</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <h4 class="text-center text-info">
                            Today is our Company's Holoday!<br/>
                            Would you please select another day?
                        </h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Ok</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Show date event modal ends -->

        <!-- Select Service Time -->
        <div id="serviceTime" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2), 0 4px 8px rgba(0, 0, 0, 0.2);">
                    <div class="modal-header bg-success">
                        <h4 class="modal-title text-white" id="myModalLabel1">Service Time</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Time From</label>
                                <div class="input-group">
                                    <input type="text" class="form-control input2 timeFrom01" data-toggle='timepicker' data-show-meridian="false">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="dripicons-clock"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Time To</label>
                                <div class="input-group">
                                    <input type="text" class="form-control input2 timeTo01" data-toggle='timepicker' data-show-meridian="false">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="dripicons-clock"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-success chooseTime" data-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Select Service Time ends -->

        <!-- Begin page -->
        <div class="wrapper">
        
            <div class="content-page">
                <div class="content">

                <!-- ============================================================= -->
                <!-- ===============    side menu content start  ================= -->
                <!-- ============================================================= -->
                <div class="navbar-custom topnav-navbar">
                    <div class="container-fluid">

                        <!-------------------------------------->
                        <!-- Put your logo hear in img tag -->
                        <a href="index.html" class="topnav-logo">
                            <span class="topnav-logo-lg">
                                <img src="{{ asset('assets/images/logo-dark.png') }}" alt="">
                            </span>
                            <span class="topnav-logo-sm">
                                <img src="{{ asset('assets/images/logo_sm.png') }}" alt="">
                            </span>
                        </a>
                        <!-- Logo content end -->
                        <!-------------------------------------->
                        <!-------------------------------------->
                        <!-- Right header content start -->
                        <ul class="list-unstyled topbar-right-menu float-right mb-0">
                            <li class="dropdown notification-list topbar-dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <i class="feather icon-mail noti-icon"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated topbar-dropdown-menu">
                                    <a href="javascript:" class="dropdown-item">
                                        <i class="feather icon-map-pin text-muted"></i> &nbsp; Loction</a>
                                    <a href="javascript:" class="dropdown-item">
                                        <i class="feather icon-upload-cloud text-muted"></i> &nbsp; Upload File</a>
                                    <a href="javascript:" class="dropdown-item">
                                        <i class="feather icon-activity text-muted"></i> &nbsp; Report</a>
                                    <a href="javascript:" class="dropdown-item">
                                        <i class="feather icon-life-buoy text-muted"></i> &nbsp; Support</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="javascript:" class="dropdown-item">
                                        <i class="feather icon-github text-muted"></i> &nbsp; Github</a>
                                    <a href="javascript:" class="dropdown-item">
                                        <i class="feather icon-slack text-muted"></i> &nbsp; Slack</a>
                                </div>
                            </li>
                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <i class="feather icon-bell noti-icon"></i>
                                    <span class="noti-icon-badge"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-lg">
                                    <div class="dropdown-item noti-title">
                                        <h5 class="m-0">
                                            <span class="float-right">
                                                <a href="javascript: void(0);" class="text-dark">
                                                    <small>Clear All</small>
                                                </a>
                                            </span>Notification <span class="badge badge-danger badge-pill">5 new</span>
                                        </h5>
                                    </div>
                                    <div class="slimscroll" style="max-height: 230px;">
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-primary">
                                                <i class="mdi mdi-comment-account-outline"></i>
                                            </div>
                                            <p class="notify-details">Caleb Flakelar commented on Admin
                                                <small class="text-muted">1 min ago</small>
                                            </p>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-info">
                                                <i class="mdi mdi-account-plus"></i>
                                            </div>
                                            <p class="notify-details">New user registered.
                                                <small class="text-muted">5 hours ago</small>
                                            </p>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon">
                                                <img src="{{ asset('assets/images/users/avatar-2.jpg') }}" class="img-fluid rounded-circle" alt="" /> </div>
                                            <p class="notify-details">Cristina Pride</p>
                                            <p class="text-muted mb-0 user-msg">
                                                <small>Hi, How are you? What about our next meeting</small>
                                            </p>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-primary">
                                                <i class="mdi mdi-comment-account-outline"></i>
                                            </div>
                                            <p class="notify-details">Caleb Flakelar commented on Admin
                                                <small class="text-muted">4 days ago</small>
                                            </p>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon">
                                                <img src="{{ asset('assets/images/users/avatar-4.jpg') }}" class="img-fluid rounded-circle" alt="" /> </div>
                                            <p class="notify-details">Karen Robinson</p>
                                            <p class="text-muted mb-0 user-msg">
                                                <small>Wow ! this admin looks good and awesome design</small>
                                            </p>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-info">
                                                <i class="mdi mdi-heart"></i>
                                            </div>
                                            <p class="notify-details">Carlos Crouch liked
                                                <b>Admin</b>
                                                <small class="text-muted">13 days ago</small>
                                            </p>
                                        </a>
                                    </div>
                                    <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                                        View All
                                    </a>
                                </div>
                            </li>
                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle nav-user arrow-none mx-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <span class="account-user-avatar">
                                        <img src="{{ asset('assets/images/users/avatar-1.jpg') }}" alt="user-image" class="rounded-circle">
                                    </span>
                                    <span>
                                        <span class="account-user-name">Rang Avdhut</span>
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                                    <a href="javascript:" class="dropdown-item">
                                        <i class="feather icon-user text-muted"></i> &nbsp; My profile</a>
                                    <a href="javascript:" class="dropdown-item">
                                        <i class="feather icon-mail text-muted"></i> &nbsp; Messages</a>
                                    <a href="javascript:" class="dropdown-item">
                                        <i class="feather icon-settings text-muted"></i> &nbsp; settings</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="{{route('logout')}}" class="dropdown-item">
                                        <i class="feather icon-power text-danger"></i> &nbsp; Log Out</a>
                                </div>
                            </li>
                        </ul>
                        <!-- Right header content end -->
                        <!-------------------------------------->

                        <a class="navbar-toggle" data-toggle="collapse" data-target="#topnav-menu-content">
                            <i class="feather icon-menu"></i>
                        </a>
                        <div class="header-search">
                            <form>
                                <div class="input-group">
                                    <span class="feather icon-search"></span>
                                    <input type="text" class="form-control" placeholder="Search...">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="topnav">
                    <div class="container-fluid">
                        <nav class="navbar navbar-dark navbar-expand-lg topnav-menu">
                            <div class="collapse navbar-collapse" id="topnav-menu-content">
                                <!-------------------------------------->
                                <!-- Menu link start -->
                                <ul class="navbar-nav">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="feather icon-home mr-1"></i>Navigation <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-pages">
                                            <div class="dropdown">
                                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-auth" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Dashboards <div class="arrow-down"></div>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="topnav-auth">
                                                    <a class="dropdown-item" href="index.html">Default</a>
                                                    <a class="dropdown-item" href="dashboard-project.html">Project</a>
                                                    <a class="dropdown-item" href="dashboard-sales.html">Sales</a>
                                                </div>
                                            </div>
                                            <div class="dropdown">
                                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-error" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Widgets <div class="arrow-down"></div>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="topnav-error">
                                                    <a class="dropdown-item" href="widgets-simple.html">Statistics</a>
                                                    <a class="dropdown-item" href="widgets-data.html">Data</a>
                                                    <a class="dropdown-item" href="widgets-chart.html">Chart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="feather icon-layers mr-1"></i>UI Components <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-pages">
                                            <div class="dropdown">
                                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-auth" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    UI Kit <div class="arrow-down"></div>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="topnav-auth">
                                                    <a href="ui-alert.html" class="dropdown-item">Alert</a>
                                                    <a href="ui-badge.html" class="dropdown-item">Badge</a>
                                                    <a href="ui-buttons.html" class="dropdown-item">Buttons</a>
                                                    <a href="ui-cards.html" class="dropdown-item">Cards</a>
                                                    <a href="ui-collapse.html" class="dropdown-item">Collapsed</a>
                                                    <a href="ui-dropdown.html" class="dropdown-item">Dropdown</a>
                                                    <a href="ui-modals.html" class="dropdown-item">Modals</a>
                                                    <a href="ui-pagination-breadcumb.html" class="dropdown-item">Pagination & Breadcumb</a>
                                                    <a href="ui-progress.html" class="dropdown-item">Progress</a>
                                                    <a href="ui-spinners.html" class="dropdown-item">Spinners</a>
                                                    <a href="ui-tabs.html" class="dropdown-item">Tabs</a>
                                                    <a href="ui-toast.html" class="dropdown-item">Toast</a>
                                                    <a href="ui-tooltip-popover.html" class="dropdown-item">Tooltip & Popover</a>
                                                    <a href="ui-typography.html" class="dropdown-item">Typography</a>
                                                </div>
                                            </div>
                                            <div class="dropdown">
                                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-error" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Advance UI Kit <div class="arrow-down"></div>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="topnav-error">
                                                    <a href="aui-alerts.html" class="dropdown-item">Alert</a>
                                                    <a href="aui-calendar.html" class="dropdown-item">Calendar</a>
                                                    <a href="aui-dragula.html" class="dropdown-item">Dragula</a>
                                                </div>
                                            </div>
                                            <div class="dropdown">
                                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-error" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Forms <div class="arrow-down"></div>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="topnav-error">
                                                    <a href="form-elements.html" class="dropdown-item">Basic Elements</a>
                                                    <a href="form-advanced.html" class="dropdown-item">Form Advanced</a>
                                                    <a href="form-validation.html" class="dropdown-item">Validation</a>
                                                    <a href="form-wizard.html" class="dropdown-item">Wizard</a>
                                                    <a href="form-fileuploads.html" class="dropdown-item">File Uploads</a>
                                                    <a href="form-editors-summernote.html" class="dropdown-item">Summernote</a>
                                                    <a href="form-editors-simplemde.html" class="dropdown-item">Simplemde</a>
                                                </div>
                                            </div>
                                            <div class="dropdown">
                                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-error" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Icons <div class="arrow-down"></div>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="topnav-error">
                                                    <a href="icons-drip.html" class="dropdown-item">Drip</a>
                                                    <a href="icons-feather.html" class="dropdown-item">Feather</a>
                                                    <a href="icons-ion.html" class="dropdown-item">Ion</a>
                                                    <a href="icon-linear.html" class="dropdown-item">Linear</a>
                                                    <a href="icons-material.html" class="dropdown-item">Material</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="feather icon-pie-chart mr-1"></i>Charts & Maps <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-pages">
                                            <div class="dropdown">
                                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-auth" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Charts <div class="arrow-down"></div>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="topnav-auth">
                                                    <a href="charts-apex.html" class="dropdown-item">Apex</a>
                                                    <a href="charts-chartjs.html" class="dropdown-item">Chartjs</a>
                                                    <a href="charts-knob.html" class="dropdown-item">Knob</a>
                                                    <a href="charts-morris.html" class="dropdown-item">Morris</a>
                                                </div>
                                            </div>
                                            <div class="dropdown">
                                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-error" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Maps <div class="arrow-down"></div>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="topnav-error">
                                                    <a href="maps-google.html" class="dropdown-item">Google Maps</a>
                                                    <a href="maps-vector.html" class="dropdown-item">Vector Maps</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layouts" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="feather icon-list mr-1"></i>Tables <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-layouts">
                                            <a href="tables-basic.html" class="dropdown-item">Basic Tables</a>
                                            <a href="tables-datatable.html" class="dropdown-item">Data Tables</a>
                                        </div>
                                    </li>

                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="feather icon-monitor mr-1"></i>Pages <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-pages">
                                            <a href="pages-starter.html" class="dropdown-item">Sample Page</a>
                                            <a href="pages-profile.html" class="dropdown-item">User Profile</a>
                                            <a href="pages-invoice.html" class="dropdown-item">Invoice</a>
                                            <a href="pages-faq.html" class="dropdown-item">FAQ</a>

                                            <div class="dropdown">
                                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-auth" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Maintenance <div class="arrow-down"></div>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="topnav-auth">
                                                    <a href="pages-404.html" class="dropdown-item">Error 404</a>
                                                    <a href="pages-maintenance.html" class="dropdown-item">Maintenance</a>
                                                    <a href="pages-comming-soon.html" class="dropdown-item">Comming soon</a>
                                                </div>
                                            </div>
                                            <div class="dropdown">
                                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-error" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Authentication <div class="arrow-down"></div>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="topnav-error">
                                                    <a href="pages-login.html" class="dropdown-item">Login</a>
                                                    <a href="pages-login-img.html" class="dropdown-item">Login 2</a>
                                                    <a href="pages-register.html" class="dropdown-item">Register</a>
                                                    <a href="pages-register-img.html" class="dropdown-item">Register 2</a>
                                                    <a href="pages-logout.html" class="dropdown-item">Logout</a>
                                                    <a href="pages-logout-img.html" class="dropdown-item">Logout 2</a>
                                                    <a href="pages-recoverpw.html" class="dropdown-item">Recover Password</a>
                                                    <a href="pages-recoverpw-img.html" class="dropdown-item">Recover Password 2</a>
                                                    <a href="pages-lock-screen.html" class="dropdown-item">Lock Screen</a>
                                                    <a href="pages-lock-screen-img.html" class="dropdown-item">Lock Screen 2</a>
                                                    <a href="pages-confirm-mail.html" class="dropdown-item">Confirm Mail</a>
                                                    <a href="pages-confirm-mail-img.html" class="dropdown-item">Confirm Mail 2</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="feather icon-cpu mr-1"></i>Application <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-pages">
                                            <a href="apps-tasks.html" class="dropdown-item">Tasks</a>

                                            <div class="dropdown">
                                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-auth" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Projects <div class="arrow-down"></div>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="topnav-auth">
                                                    <a href="apps-projects-list.html" class="dropdown-item">List</a>
                                                    <a href="apps-projects-details.html" class="dropdown-item">Details</a>
                                                </div>
                                            </div>
                                            <div class="dropdown">
                                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-auth" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Layouts <div class="arrow-down"></div>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="topnav-auth">
                                                    <a href="layouts-horizontal.html" class="dropdown-item">Horizontal</a>
                                                    <a href="layouts-light-sidenav.html" class="dropdown-item">Light Sidenav</a>
                                                    <a href="layouts-dark.html" class="dropdown-item">layouts dark</a>
                                                    <a href="layouts-collapsed.html" class="dropdown-item">Collapsed Sidenav</a>
                                                    <a href="layouts-boxed-vertical.html" class="dropdown-item">Boxed Vertical</a>
                                                    <a href="layouts-boxed-horizontal.html" class="dropdown-item">Boxed Horizontal</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <!-- Menu link end -->
                                <!-------------------------------------->
                            </div>
                        </nav>
                    </div>
                </div>
                <!-- ============================================================= -->
                <!-- ===============     side menu content End   ================= -->
                <!-- ============================================================= -->

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- Begin page -->
                    <div class="wrapper">

                        <!-- Start Page Content here -->
                        <div class="content-page">
                            <div class="content">

                                <!-- Start Content-->
                                <div class="container">

                                    <!-- start page title -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="page-title-box">
                                                <h1 class="text-center mt-4">Welcome to your booking!</h1>
                                                <h3 class="text-center mb-4">We will provide you best services</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end page title -->

                                    <!-- Select service -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5>Choose your service</h5>
                                                </div>
                                                <div>
                                                <form action="{{route('client.clientBooking')}}" method="post">
                                                @csrf

                                                    <!-- Service Name -->
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h5 class="mb-1 mt-0">Service Type</h5>
                                                                <select name="serviceName" class="form-control select2" data-toggle="select2" id="serviceType">
                                                                    @foreach($allservices as $key => $service)
                                                                    <option value="{{$service->id}}">{{ $service->name }} : (One Time-{{ $service->one_time }}, Recurring Time-{{ $service->recurring }})</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Service Method -->
                                                    <div class="card-body">
                                                        <h5 class="mt-0">Service Method</h5>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="oneTime" name="serviceMethod" class="custom-control-input" value="1">
                                                            <label class="custom-control-label" for="oneTime">One Time</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="reccureTime" name="serviceMethod" class="custom-control-input" value="0">
                                                            <label class="custom-control-label" for="reccureTime">Reccrring Times</label>
                                                        </div>
                                                    </div>

                                                    <!-- Reccure Type -->
                                                    <div class="card-body option-part1">
                                                        <h5 class="mt-0">Reccuring Type</h5>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="week" name="reccureType" class="custom-control-input input1" value="1">
                                                            <label class="custom-control-label" for="week">Every Week</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="otherWeek" name="reccureType" class="custom-control-input input1" value="2">
                                                            <label class="custom-control-label" for="otherWeek">Other Week</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="threeWeek" name="reccureType" class="custom-control-input input1" value="3">
                                                            <label class="custom-control-label" for="threeWeek">Three Week</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="oneMonth" name="reccureType" class="custom-control-input input1" value="4">
                                                            <label class="custom-control-label" for="oneMonth">One Month</label>
                                                        </div>
                                                    </div>

                                                    <!-- One Time or One Month Date and Time -->
                                                    <div class="card-body option-part2">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Select Date</label>
                                                                    <div class="form-control" id="showDate" data-toggle="modal" data-target="#selectDate" style="cursor: pointer;"></div>
                                                                    <input type="hidden" class="input2" name="date" id="date">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label>Time From</label>
                                                                <div class="input-group">
                                                                    <div class="form-control" id="timeFrom02" style="cursor:pointer;"></div>
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text"><i class="dripicons-clock"></i></span>
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="timeFrom" class="input2" id="timeFrom">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label>Time To</label>
                                                                <div class="input-group">
                                                                    <div class="form-control" id="timeTo02" style="cursor:pointer;"></div>
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text"><i class="dripicons-clock"></i></span>
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="timeTo" class="input2" id="timeTo">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <h5 class="mb-1 mt-0">Service Add-on</h5>
                                                                <select name="serviceAddName" class="form-control select2 input2" data-toggle="select2">
                                                                    @foreach($allservices as $key => $service)
                                                                    <option value="{{$service->name}}">{{$service->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <h5 class="mb-1 mt-0">House Bulk</h5>
                                                                <div class="form-group">
                                                                    <input name="bulk" class="input2" data-toggle="touchspin" value="10" type="text" data-step="0.1" data-decimals="2" data-bts-postfix="&#13217;">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <h5 class="mb-1 mt-0">Address</h5>
                                                                <div class="form-group">
                                                                    <input type="text" name="address" class="form-control input2" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <h5 class="mb-1 mt-0">Zip Code</h5>
                                                                <select name="zipcode" class="form-control select2 input2" data-toggle="select2">
                                                                    @foreach($areas as $key => $area)
                                                                    <option value="{{ $area->id }}">{{ $area->zip_code }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <button class="btn btn-primary" type="submit">Submit</button>
                                                    </div>

                                                    <!-- Reccure Time Week Day and Time -->
                                                    <div class="card-body option-part3">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Date Range</label>
                                                                    <input type="text" name="range" class="form-control date input3" id="singledaterange" data-toggle="date-picker" data-cancel-class="btn-warning">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label>Time From</label>
                                                                <div class="input-group">
                                                                    <input type="text" name="timeFrom" class="form-control input3" id="timeFrom0" data-toggle='timepicker' data-show-meridian="false">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text"><i class="dripicons-clock"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label>Time To</label>
                                                                <div class="input-group">
                                                                    <input type="text" name="timeTo" class="form-control input3" id="timeTo0" data-toggle='timepicker' data-show-meridian="false">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text"><i class="dripicons-clock"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <h5 class="mb-1 mt-0">Service Add-on</h5>
                                                                <select name="serviceAddName" class="form-control select2 input3" data-toggle="select2">
                                                                    @foreach($allservices as $key => $service)
                                                                    <option value="{{ $service->id }}">{{$service->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <h5 class="mb-1 mt-0">House Bulk</h5>
                                                                <div class="form-group">
                                                                    <input name="bulk" class="input3" data-toggle="touchspin" value="10" type="text" data-step="0.1" data-decimals="2" data-bts-postfix="&#13217;">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <h5 class="mb-1 mt-0">Address</h5>
                                                                <div class="form-group">
                                                                    <input type="text" name="address" class="form-control input3" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <h5 class="mb-1 mt-0">Zip Code</h5>
                                                                <select name="zipcode" class="form-control select2 input3" data-toggle="select2">
                                                                    @foreach($areas as $key => $area)
                                                                    <option value="{{ $area->id }}">{{ $area->zip_code }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <button class="btn btn-primary" type="submit">Submit</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Select Service -->

                                </div> <!-- container -->

                            </div> <!-- content -->

                        </div>
                        <!-- End Page content -->

                    </div>
                    <!-- END wrapper -->

                </div> <!-- container -->

            </div> <!-- content -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


        <!-- Required js -->
        <script src="{{ asset('assets/js/app.min.js') }}"></script>


        <!-- third party js -->
        <script src="{{ asset('assets/js/vendor/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('assets/js/vendor/fullcalendar.min.js') }}"></script>
        <script src="{{ asset('assets/js/vendor/handlebars.min.js') }}"></script>
        <script src="{{ asset('assets/js/vendor/typeahead.bundle.min.js') }}"></script>
        <!-- third party js ends -->

        <!-- custom party js -->
        <script src="{{ asset('assets/js/client.booking.js') }}"></script>
        <script src="{{ asset('assets/js/calendar.js') }}"></script>
        <!-- custom party js ends -->
        <script>



          $('#singledaterange').daterangepicker();
          $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            defaultDate: '{{ $today }}',
            selectable: true,
            events: [
                @foreach($allBlockdays as $key => $blockday)
                {
                    title: '{{ $blockday->reason }}',
                    start: '{{ $blockday->date }}',
                    borderColor: '#fd397a',
                    backgroundColor: '#fd397a',
                    textColor: '#fff',
                    id: {{ $blockday->id }},
                },
                @endforeach
            ],
            eventClick: function(event, jsEvent, view) {
                $("#showDateEvent").modal();
            },
            select:function(start,end){
                var date = moment(start).format('YYYY-MM-DD');
                var service = $('select[name=serviceName]').val();

                $.ajax({
                url:"{{route('client.selectAjax')}}",
                method:"GET",
                data:{date:date,service:service},
                success:function(result)
                {
                    if(result.status=='false')
                    {
                        alert(result.message);
                    }else {
                        $("#serviceTime").modal();
                        $("#date").val(date);
                        document.getElementById("showDate").innerHTML = date;
                    }
                },
                 error : function(err) {
                     console.log('Error!', err);
                },
            });

            },
            drop: function() {
                if ($('#drop-remove').is(':checked')) {
                    $(this).remove();
                }
            }
        });
        </script>
        <script>
            $(".chooseTime").click(function(){
                $("#timeFrom").val($('.timeFrom01').val());
                $("#timeFrom0").val($('.timeFrom01').val());
                document.getElementById("timeFrom02").innerHTML = $('.timeFrom01').val();
                $("#timeTo").val($('.timeTo01').val());
                $("#timeTo0").val($('.timeTo01').val());
                document.getElementById("timeTo02").innerHTML = $('.timeTo01').val();
            });
        </script>
    </body>

</html>
