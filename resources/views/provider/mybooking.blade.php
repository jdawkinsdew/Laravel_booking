<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Booking</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Beethemesdesign" name="author" />

        <!-- favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}">


        <!-- third party css -->
        <link href="{{ asset('assets/css/vendor/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />
        <!-- third party css end -->

        <!-- Required css -->
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/style.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/vendor/fullcalendar.min.css') }}" rel="stylesheet" type="text/css" />


    </head>

    <body data-layout="topnav">

        <!-- Begin page -->
        <div class="wrapper">
            <div class="content-page">
                <div class="content">
                    <div class="navbar-custom topnav-navbar">
                        <div class="container-fluid">
                            <a href="index.html" class="topnav-logo">
                                <span class="topnav-logo-lg">
                                    <img src="{{ asset('assets/images/logo-dark.png') }}" alt="">
                                </span>
                                <span class="topnav-logo-sm">
                                    <img src="{{ asset('assets/images/logo_sm.png') }}" alt="">
                                </span>
                            </a>
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
                                        <a href="javascript:" class="dropdown-item">
                                            <i class="feather icon-power text-danger"></i> &nbsp; Log Out</a>
                                    </div>
                                </li>
                            </ul>
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
                                            <a class="nav-link dropdown-toggle arrow-none" href="{{ route('provider.mybooking') }}">
                                                <i class="feather icon-home mr-1"></i>My Bookings
                                            </a>
                                        </li>

                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle arrow-none" href="{{ route('provider.detail') }}">
                                                <i class="feather icon-list mr-1"></i>Booking Details
                                            </a>
                                        </li>

                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle arrow-none" href="#">
                                                <i class="feather icon-settings mr-1"></i>Setting
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- Menu link end -->
                                    <!-------------------------------------->
                                </div>
                            </nav>
                        </div>
                    </div>
                </div> <!-- content -->

                <!-- Start Main Content -->
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div id="calendar">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="event-modal" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header pr-4 pl-4 border-bottom-0 d-block">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title">Add New Event</h4>
                                    </div>
                                    <div class="modal-body pt-3 pr-4 pl-4">
                                    </div>
                                    <div class="text-right pb-4 pr-4">
                                        <button type="button" class="btn btn-light " data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-success save-event  ">Create event</button>
                                        <button type="button" class="btn btn-danger delete-event  " data-dismiss="modal">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="add-category" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header border-bottom-0 d-block">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title">Add a category</h4>
                                    </div>
                                    <div class="modal-body p-4">
                                        <form>
                                            <div class="form-group">
                                                <label class="control-label">Category Name</label>
                                                <input class="form-control form-white" placeholder="Enter name" type="text" name="category-name" />
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Choose Category Color</label>
                                                <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                                    <option value="primary">Primary</option>
                                                    <option value="success">Success</option>
                                                    <option value="danger">Danger</option>
                                                    <option value="info">Info</option>
                                                    <option value="warning">Warning</option>
                                                    <option value="dark">Dark</option>
                                                </select>
                                            </div>

                                        </form>
                                        <div class="text-right">
                                            <button type="button" class="btn btn-light " data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary ml-1   save-category" data-dismiss="modal">Save</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Ends Main Content -->

                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                © Shimba - by Beethemesdesign
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-right footer-links d-none d-md-block">
                                    <a href="javascript: void(0);">Buy Now</a>
                                    <a href="#!">Rate us</a>
                                    <a href="#!">Support</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <!-- Required js -->
        <script src="{{ asset('assets/js/app.min.js') }}"></script>
        <!-- Required ends -->

        <!-- third party js -->
        <script src="{{ asset('assets/js/vendor/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('assets/js/vendor/fullcalendar.min.js') }}"></script>
        <!-- third party js ends -->

    <!-- custom app -->
    <script>
        $('#external-events .bee-event').each(function() {
            $(this).data('event', {
                title: $.trim($(this).text()),
                stick: true
            });
            $(this).draggable({
                zIndex: 999,
                revert: true,
                revertDuration: 0
            });
        });
        var d = new Date();
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            defaultDate: moment(d).format("YYYY-MM-DD"),
            editable: true,
            droppable: true,
            events: [
            @foreach($myBookings as $key => $booking)    
            {
            @if($booking->status!='rejected' && $booking->status!='pending')
                title: '{{ $booking->provider->name }}',
                start: '{{ $booking->date}}.{{$booking->start_time }}',
                end: '{{ $booking->date}}.{{$booking->finish_time }}',
                description: 'long description',
                borderColor:'#fd397a',
                backgroundColor:'{{ $booking->client->area->color }}',
                textColor: '#fff',
            @endif
            },
            @endforeach   ],eventRender: function(event, element) {
                            element.description = event.description;
                        },   
            drop: function() {
                if ($('#drop-remove').is(':checked')) {
                    $(this).remove();
                }
            },
        });
    </script>
    <!-- custom app ends -->
    
    </body>

</html>
