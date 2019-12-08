@extends('admin.layouts.master')

@section('page_title') New Nnique Customer @endsection

@section('content')

    <!-- Start Main Content-->
    <div class="row">
        <div class="col-12">
            <div class="card">
    
                <div class=" card-body">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary mb-4">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <span class="ui-box-icon text-white"><i class="lnr lnr-users display-4"></i></span>
                                    <div class="ml-3 text-white">
                                        <p class="mb-1">New Clients</p>
                                        <h4 class="mb-0">450</h4>
                                        <div class="progress progress-md bg-light mt-2 mb-1">
                                            <div class="progress-bar bg-white" style="width: 45%"></div>
                                        </div>
                                        <small class="mb-0">45% Increase in 7 Days</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-40">
                    <div class="table-responsive-md">
                        <table class="table table-bordered table-hover mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th>Customer</th>
                                    <th>Created at</th>
                                    <th>Status</th>
                                    </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div>
                                            <div class="media align-items-center more-user-details" data-original-title="" title="">
                                                <img src="{{ asset('assets/images/profile/team6.jpg') }}" class=" rounded-circle ui-w-50 mr-3" alt="Avtar image">
                                                <div class="media-body">
                                                    <h4 class="mt-0 mb-1">Jacob Doe</h4>
                                                    <p class="mb-0">Jacob_Doe@example.com</p>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <span>33%</span>
                                            <div class="progress mt-1">
                                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" style="width: 33%;"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge badge-warning">Pending</span>
                                    </td>
                                    
                                </tr>
                                <tr>
                                    
                                    <td>
                                        <div>
                                            <div class="media align-items-center more-user-details" data-original-title="" title="">
                                                <img src="{{ asset('assets/images/profile/team7.jpg') }}" class=" rounded-circle ui-w-50 mr-3" alt="Avtar image">
                                                <div class="media-body">
                                                    <h4 class="mt-0 mb-1">Mandy Erle</h4>
                                                    <p class="mb-0">Mandy@example.com</p>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <span>56%</span>
                                            <div class="progress mt-1">
                                                <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100" style="width: 56%;"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge badge-success">Success</span>
                                    </td>                                                 
                                </tr>
                                <tr>
                                    
                                    <td>
                                        <div>
                                            <div class="media align-items-center more-user-details" data-original-title="" title="">
                                                <img src="{{ asset('assets/images/profile/team1.jpg') }}" class=" rounded-circle ui-w-50 mr-3" alt="Avtar image">
                                                <div class="media-body">
                                                    <h4 class="mt-0 mb-1">Adella Galen</h4>
                                                    <p class="mb-0">Adella@example.com</p>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <span>12%</span>
                                            <div class="progress mt-1">
                                                <div class="progress-bar bg-info" role="progressbar" aria-valuenow="12" aria-valuemin="0" aria-valuemax="100" style="width: 12%;"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge badge-primary">In progress</span>
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <td>
                                        <div>
                                            <div class="media align-items-center more-user-details" data-original-title="" title="">
                                                <img src="{{ asset('assets/images/profile/team2.jpg') }}" class=" rounded-circle ui-w-50 mr-3" alt="Avtar image">
                                                <div class="media-body">
                                                    <h4 class="mt-0 mb-1">Napoleon Stacey</h4>
                                                    <p class="mb-0">Napoleon@example.com</p>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <span>65%</span>
                                            <div class="progress mt-1">
                                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100" style="width: 65%;"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge badge-danger">NEW</span>
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <td>
                                        <div>
                                            <div class="media align-items-center more-user-details" data-original-title="" title="">
                                                <img src="{{ asset('assets/images/profile/team3.jpg') }}" class=" rounded-circle ui-w-50 mr-3" alt="Avtar image">
                                                <div class="media-body">
                                                    <h4 class="mt-0 mb-1">Napoleon Stacey</h4>
                                                    <p class="mb-0">Napoleon@example.com</p>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <span>45%</span>
                                            <div class="progress mt-1">
                                                <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100" style="width: 45%;"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge badge-danger">NEW</span>
                                    </td>
                                    
                                </tr>
                                    <td>
                                        <div>
                                            <div class="media align-items-center more-user-details" data-original-title="" title="">
                                                <img src="{{ asset('assets/images/profile/team4.jpg') }}" class=" rounded-circle ui-w-50 mr-3" alt="Avtar image">
                                                <div class="media-body">
                                                    <h4 class="mt-0 mb-1">Alex William</h4>
                                                    <p class="mb-0">Alex@example.com</p>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <span>75%</span>
                                            <div class="progress mt-1">
                                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" style="width: 75%;"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge badge-warning">Pending</span>
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <td>
                                        <div>
                                            <div class="media align-items-center more-user-details" data-original-title="" title="">
                                                <img src="{{ asset('assets/images/profile/team5.jpg') }}" class=" rounded-circle ui-w-50 mr-3" alt="Avtar image">
                                                <div class="media-body">
                                                    <h4 class="mt-0 mb-1">Napoleon Stacey</h4>
                                                    <p class="mb-0">Napoleon@example.com</p>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <span>65%</span>
                                            <div class="progress mt-1">
                                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100" style="width: 65%;"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge badge-danger">NEW</span>
                                    </td>
                                    
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
            </div>
        
        </div>
    </div>
    <!-- Ends Main Content-->
           
@endsection

@section('script')

    <script>
        $(document).ready(function() {
            $(function() {
                $('.more-user-details').popover({
                    placement: 'top',
                    trigger: 'hover',
                    html: true,
                    content: '<div><div class="media align-items-center"><img src="{{ asset('assets/images/profile/team5.jpg') }}" class="rounded-circle ui-w-50 mr-3" alt="Avtar image"><div class="media-body"><h4 class="mt-0 mb-1">Jacob Doe <small class="mdi mdi-checkbox-blank-circle text-success"></small><small>Active</small></h4><p class="mb-0">Jacob_Doe@example.com</p></div></div></div><div class="alert alert-warning p-2 mb-1 mt-3 rounded"><div class="media align-items-center"><h3 class="mdi mdi-bell-ring-outline alert-heading m-0"></h3><div class="media-body pl-3"><small><b class="d-block">Unpaid invoice</b></small><small>This account will be disabled starting <b>14 March 1996</b>.</small></div></div></div><div class="no-gutters text-center row pt-3"><div class="col-6"><div><i class="feather icon-pie-chart h4 text-danger"></i></div><div class="mt-2"><b class="mb-1">$9,693</b><span class="d-block">revenue</span></div></div><div class="col-6"><div><i class="feather icon-users h4 text-primary"></i></div><div class="mt-2"><b class="mb-1">2,345</b><span class="d-block">users</span></div></div></div>'
                });
            });
        });
    </script>
    
@endsection