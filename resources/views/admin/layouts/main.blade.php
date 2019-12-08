@extends('admin.layouts.master')

@section('page_title') Dashboard @endsection

@section('content')

    <!-- Start Main content -->
    <div class="row">

        <!-- Start Page Widget -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="mr-3 text-white">
                            <h2 class="m-0"><strong>{{ $data['booking_today'] }}</strong></h2>
                            <p class="mb-0">Today Booking</p>
                        </div>
                        <i class="feather icon-shopping-cart display-4"></i>
                    </div>
                </div>
                <div class="card-footer bg-light py-2">
                    <small class="mb-0"><i class="ion ion-ios-trending-up mr-2"></i>{{$data['today']}}</small>
                </div>
            </div>
        </div>

        <!-- <div class="col-md-6 col-xl-3">
            <div class="card mb-4">
                <div class="card-body">
                    <h4 class="card-title">Bookings This week</h4>
                    <div class="d-flex justify-content-between">
                        <p class="text-muted text-small">{{$data['week_start']}} ~ {{$data['week_end']}}</p>
                        <p class="text-muted text-small">{{$data['booking_week']}}</p>
                    </div>
                    <div class="progress progress-md">
                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width:85%"></div>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="mr-3 text-white">
                            <h2 class="m-0"><strong>795</strong></h2>
                            <p class="mb-0">New user</p>
                        </div>
                        <i class="feather icon-user-check display-4"></i>
                    </div>
                </div>
                <div class="card-footer bg-light py-2">
                    <small class="mb-0"><i class="ion ion-ios-trending-down mr-2"></i>38% repeat</small>
                    <small class="mb-0 float-right">more <i class="feather icon-chevron-right"></i></small>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="mr-3 text-white">
                            <h2 class="m-0"><strong>{{$data['revenue_today']}}$</strong></h2>
                            <p class="mb-0">Today Revenue</p>
                        </div>
                        <i class="feather icon-pie-chart display-4"></i>
                    </div>
                </div>
                <div class="card-footer bg-light py-2">
                    <small class="mb-0"><i class="ion ion-ios-trending-up mr-2"></i>40% Increase</small>
                    <small class="mb-0 float-right">more <i class="feather icon-chevron-right"></i></small>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="mr-3 text-white">
                            <h2 class="m-0"><strong>{{$data['unread_today']}}</strong></h2>
                            <p class="mb-0">Unread Notifications</p>
                        </div>
                        <i class="feather icon-download-cloud display-4"></i>
                    </div>
                </div>
                <div class="card-footer bg-light py-2">
                    <small class="mb-0"><i class="ion ion-ios-trending-down mr-2"></i>10 cancel</small>
                    <small class="mb-0 float-right">more <i class="feather icon-chevron-right"></i></small>
                </div>
            </div>
        </div>
        <!-- Ends Page Widget -->

        <!-- Start User Account Table -->
        <div class="col-sm-12">
            <div class="card sale-card">
                <div class="card-header">
                    <h5>User Accounts</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Profile</th>
                                    <th>Email Address</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <div class="media align-items-center">
                                            
                                            <img src="{{ asset('assets/images/profile/team1.jpg') }}" class=" rounded-circle ui-w-50 mr-3" alt="Avtar image">
                                            <div class="media-body">
                                                <h4 class="mt-0 mb-1">Jacob</h4>
                                                <p class="mb-0">UI/UX Designer</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>jacob@demo.com</td>
                                    <td><span class="badge badge-success">Approved</span></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>
                                        <div class="media align-items-center">
                                            <img src="{{ asset('assets/images/profile/team2.jpg') }}" class=" rounded-circle ui-w-50 mr-3" alt="Avtar image">
                                            <div class="media-body">
                                                <h4 class="mt-0 mb-1">Charlotte</h4>
                                                <p class="mb-0">UX Designer</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>charlotte@demo.com</td>
                                    <td><span class="badge badge-warning">Suspended</span></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>
                                        <div class="media align-items-center">
                                            <img src="{{ asset('assets/images/profile/team3.jpg') }}" class=" rounded-circle ui-w-50 mr-3" alt="Avtar image">
                                            <div class="media-body">
                                                <h4 class="mt-0 mb-1">Grayson</h4>
                                                <p class="mb-0">Tester</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>grayson@demo.com</td>
                                    <td><span class="badge badge-danger">Blocked</span></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>
                                        <div class="media align-items-center">
                                            <img src="{{ asset('assets/images/profile/team4.jpg') }}" class=" rounded-circle ui-w-50 mr-3" alt="Avtar image">
                                            <div class="media-body">
                                                <h4 class="mt-0 mb-1">Amelia</h4>
                                                <p class="mb-0">MVC Develper</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>amelia@demo.com</td>
                                    <td><span class="badge badge-success">Approved</span></td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>
                                        <div class="media align-items-center">
                                            <img src="{{ asset('assets/images/profile/team1.jpg') }}" class=" rounded-circle ui-w-50 mr-3" alt="Avtar image">
                                            <div class="media-body">
                                                <h4 class="mt-0 mb-1">Michael</h4>
                                                <p class="mb-0">UI/UX Designer</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>michael@demo.com</td>
                                    <td><span class="badge badge-info">Pending</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ends User Account Table -->

        <!-- Start Best Provider Table -->
        <div class="col-sm-12">
            <div class="card sale-card">
                <div class="card-header">
                    <h5>Best Providers</h5>
                </div>
                <div class="card-content mt-1">
                    <div class="table-responsive">
                        <table class="table table-hover  mb-0">
                            <thead>
                                <tr>
                                    <th class="border-top-0">Product</th>
                                    <th class="border-top-0">Customers</th>
                                    <th class="border-top-0">Categories</th>
                                    <th class="border-top-0">Popularity</th>
                                    <th class="border-top-0">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="">iPone X</td>
                                    <td class=" p-1">
                                        <ul class="list-inline cust-img-list m-0">
                                            <li data-toggle="tooltip" data-popup="tooltip-custom" title="Kimberly Simmons" class="list-inline-item mr-n3">
                                                <img class="w-user-img rounded-circle" src="{{ asset('assets/images/profile/team6.jpg') }}" alt="Avatar">
                                            </li>
                                            <li data-toggle="tooltip" data-popup="tooltip-custom" title="Willie Torres" class="list-inline-item mr-n3">
                                                <img class="w-user-img rounded-circle" src="{{ asset('assets/images/profile/team7.jpg') }}" alt="Avatar">
                                            </li>
                                            <li data-toggle="tooltip" data-popup="tooltip-custom" title="Rebecca Jones" class="list-inline-item mr-n3">
                                                <img class="w-user-img rounded-circle" src="{{ asset('assets/images/profile/team8.jpg') }}" alt="Avatar">
                                            </li>
                                            <li class="list-inline-item mr-n3">
                                                <span class="badge badge-primary">+8</span>
                                            </li>
                                        </ul>
                                    </td>
                                    <td>
                                        <span class="badge badge-danger badge-pill">Mobile</span>
                                    </td>
                                    <td>
                                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td class="">$ 1200.00</td>
                                </tr>
                                <tr>
                                    <td class="">iPad</td>
                                    <td class=" p-1">
                                        <ul class="list-inline cust-img-list m-0">
                                            <li data-toggle="tooltip" data-popup="tooltip-custom" title="Kimberly Simmons" class="list-inline-item mr-n3">
                                                <img class="w-user-img rounded-circle" src="{{ asset('assets/images/profile/team1.jpg') }}" alt="Avatar">
                                            </li>
                                            <li data-toggle="tooltip" data-popup="tooltip-custom" title="Willie Torres" class="list-inline-item mr-n3">
                                                <img class="w-user-img rounded-circle" src="{{ asset('assets/images/profile/team1.jpg') }}" alt="Avatar">
                                            </li>
                                            <li class="list-inline-item mr-n3">
                                                <span class="badge badge-primary">+5</span>
                                            </li>
                                        </ul>
                                    </td>
                                    <td>
                                        <span class="badge badge-success badge-pill">Tablet</span>
                                    </td>
                                    <td>
                                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td class="">$ 1190.00</td>
                                </tr>
                                <tr>
                                    <td class="">OnePlus</td>
                                    <td class=" p-1">
                                        <ul class="list-inline cust-img-list m-0">
                                            <li data-toggle="tooltip" data-popup="tooltip-custom" title="Kimberly Simmons" class="list-inline-item mr-n3">
                                                <img class="w-user-img rounded-circle" src="{{ asset('assets/images/profile/team1.jpg') }}" alt="Avatar">
                                            </li>
                                            <li data-toggle="tooltip" data-popup="tooltip-custom" title="Willie Torres" class="list-inline-item mr-n3">
                                                <img class="w-user-img rounded-circle" src="{{ asset('assets/images/profile/team1.jpg') }}" alt="Avatar">
                                            </li>
                                            <li data-toggle="tooltip" data-popup="tooltip-custom" title="Rebecca Jones" class="list-inline-item mr-n3">
                                                <img class="w-user-img rounded-circle" src="{{ asset('assets/images/profile/team1.jpg') }}" alt="Avatar">
                                            </li>
                                            <li class="list-inline-item mr-n3">
                                                <span class="badge badge-primary">+3</span>
                                            </li>
                                        </ul>
                                    </td>
                                    <td>
                                        <span class="badge badge-danger badge-pill">Mobile</span>
                                    </td>
                                    <td>
                                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td class="">$ 999.00</td>
                                </tr>
                                <tr>
                                    <td class="">ZenPad</td>
                                    <td class=" p-1">
                                        <ul class="list-inline cust-img-list m-0">
                                            <li data-toggle="tooltip" data-popup="tooltip-custom" title="Kimberly Simmons" class="list-inline-item mr-n3">
                                                <img class="w-user-img rounded-circle" src="{{ asset('assets/images/profile/team1.jpg') }}" alt="Avatar">
                                            </li>
                                            <li data-toggle="tooltip" data-popup="tooltip-custom" title="Willie Torres" class="list-inline-item mr-n3">
                                                <img class="w-user-img rounded-circle" src="{{ asset('assets/images/profile/team1.jpg') }}" alt="Avatar">
                                            </li>
                                        </ul>
                                    </td>
                                    <td>
                                        <span class="badge badge-success badge-pill">Tablet</span>
                                    </td>
                                    <td>
                                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td class="">$ 1150.00</td>
                                </tr>
                                <tr>
                                    <td class="">Pixel 2</td>
                                    <td class=" p-1">
                                        <ul class="list-inline cust-img-list m-0">
                                            <li data-toggle="tooltip" data-popup="tooltip-custom" title="Kimberly Simmons" class="list-inline-item mr-n3">
                                                <img class="w-user-img rounded-circle" src="{{ asset('assets/images/profile/team4.jpg') }}" alt="Avatar">
                                            </li>
                                            <li data-toggle="tooltip" data-popup="tooltip-custom" title="Willie Torres" class="list-inline-item mr-n3">
                                                <img class="w-user-img rounded-circle" src="{{ asset('assets/images/profile/team3.jpg') }}" alt="Avatar">
                                            </li>
                                        </ul>
                                    </td>
                                    <td>
                                        <span class="badge badge-danger badge-pill">Mobile</span>
                                    </td>
                                    <td>
                                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td class="">$ 1180.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ends Best Provider Table -->

    </div>
    <!-- Ends Main content -->
    
@endsection
