@extends('admin.layouts.master')

@section('style')
    <link href="{{ asset('assets/css/vendor/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/vendor/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/vendor/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/vendor/select.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('page_icon')<i class="feather icon-home"></i>@endsection

@section('page_title')Client Information</i>@endsection

@section('content')
    <!--  Modal content for the above example -->
    <div class="modal fade" id="bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h4 class="modal-title" id="myLargeModalLabel">Client Review History</h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table dt-responsive nowrap table-hover" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Date</th>
                                                <th>Provider</th>
                                                <th>Service</th>
                                                <th>Price</th>
                                                <th>Feedback</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>2011/04/25 12:00~14:00</td>
                                                <td>
                                                    <div>
                                                        <div class="media align-items-center more-user-details" data-original-title="" title="">
                                                            <img src="{{ asset('assets/images/users/avatar-4.jpg') }}" class=" rounded-circle ui-w-50 mr-3" alt="Avtar image">
                                                            <div class="media-body">
                                                                <h4 class="mt-0 mb-1">Jacob Doe</h4>
                                                                <p class="mb-1">Jacob_Doe@gmail.com</p>
                                                                <p class="mb-0">+45,123,345</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Clean</td>
                                                <td>$100 USD</td>
                                                <td> <div class="text-success"> Very Good! </div> </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Full width modal content -->
    <div id="full-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="fullWidthModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-full-width">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h4 class="modal-title" id="fullWidthModalLabel">Client Profile</h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body alert-secondary">
                     <!-- Header -->
                     <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-auto col-sm-12">
                                    <img src="{{ asset('assets/images/users/avatar-2.jpg') }}" alt class="d-block ui-w-100 rounded-circle mb-3">
                                </div>
                                <div class="col">
                                    <h4 class="font-weight-bold mb-2">Rang Avdhut</h4>
                                    <div class="text-muted mb-2">
                                        Lorem ipsum dolor sit amet, nibh suavitate qualisque ut nam. Ad harum primis electram duo, porro principes ei has.
                                    </div>

                                    <a href="javascript:void(0)" class="d-inline-block text-dark">
                                        <strong>23</strong>
                                        <span class="text-muted">Services received</span>
                                    </a>
                                    <a href="javascript:void(0)" class="d-inline-block text-dark ml-3">
                                        <strong>Max pay</strong>
                                        <span class="text-muted">Max Pay</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Header -->

                    <div class="row">
                        <div class="col-xl-4">

                            <!-- Side info -->
                            <div class="card mb-4">
                                <div class="card-body">
                                    <a href="javascript:void(0)" class="btn btn-primary btn-round">+&nbsp; Follow</a> &nbsp;
                                    <a href="javascript:void(0)" class="btn icon-btn btn-default md-btn-flat btn-round">
                                        <span class="ion ion-md-mail"></span>
                                    </a>
                                </div>
                                <hr class="border-light m-0">
                                <div class="card-body">
                                    <p class="mb-2">
                                        <i class="ion ion-ios-navigate ui-w-30 text-center text-lighter"></i> Panama, United Kingdom</p>
                                    <p class="mb-0">
                                        <i class="ion ion-md-globe ui-w-30 text-center text-lighter"></i>
                                        <a href="javascript:void(0)" class="text-dark">website@gmail.com, website@hotmail.com</a>
                                    </p>
                                </div>
                                <hr class="border-light m-0">
                                <div class="card-body">
                                    <a href="javascript:void(0)" class="d-block text-dark mb-2">
                                        <i class="ion ion-logo-twitter ui-w-30 text-center"></i> @Beethemes
                                    </a>
                                    <a href="javascript:void(0)" class="d-block text-dark mb-2">
                                        <i class="ion ion-logo-facebook ui-w-30 text-center "></i> \Beethemes
                                    </a>
                                    <a href="javascript:void(0)" class="d-block text-dark mb-0">
                                        <i class="ion ion-logo-instagram ui-w-30 text-center"></i> #Beethemes
                                    </a>
                                </div>
                            </div>
                            <!-- / Side info -->

                            <!-- Friends -->
                            <div class="card mb-4">
                                <div class="card-header with-elements">
                                    <h5>Service providers &nbsp;<small class="text-muted">9</small></h5>
                                    <div class="card-header-elements ml-auto">
                                        <a href="javascript:void(0)" class="btn btn-primary md-btn-flat btn-xs">Show All</a>
                                    </div>
                                </div>
                                <div class="row no-gutters row-border-light">
                                    <a href="javascript:void(0)" class="d-flex col-4 col-sm-3 col-md-4 flex-column align-items-center text-dark py-3 px-2">
                                        <img src="{{ asset('assets/images/users/avatar-1.jpg') }}" alt class="d-block ui-w-40 rounded-circle mb-2">
                                        <div class="text-center small">Leon Wilson(3)</div>
                                    </a>
                                    <a href="javascript:void(0)" class="d-flex col-4 col-sm-3 col-md-4 flex-column align-items-center text-dark py-3 px-2">
                                        <img src="{{ asset('assets/images/users/avatar-2.jpg') }}" alt class="d-block ui-w-40 rounded-circle mb-2">
                                        <div class="text-center small">Allie Rodriguez(2)</div>
                                    </a>
                                    <a href="javascript:void(0)" class="d-flex col-4 col-sm-3 col-md-4 flex-column align-items-center text-dark py-3 px-2">
                                        <img src="{{ asset('assets/images/users/avatar-3.jpg') }}" alt class="d-block ui-w-40 rounded-circle mb-2">
                                        <div class="text-center small">Kenneth Frazier(1)</div>
                                    </a>
                                    <a href="javascript:void(0)" class="d-flex col-4 col-sm-3 col-md-4 flex-column align-items-center text-dark py-3 px-2">
                                        <img src="{{ asset('assets/images/users/avatar-5.jpg') }}" alt class="d-block ui-w-40 rounded-circle mb-2">
                                        <div class="text-center small">Nellie Maxwell(1)</div>
                                    </a>
                                    <a href="javascript:void(0)" class="d-flex col-4 col-sm-3 col-md-4 flex-column align-items-center text-dark py-3 px-2">
                                        <img src="{{ asset('assets/images/users/avatar-6.jpg') }}" alt class="d-block ui-w-40 rounded-circle mb-2">
                                        <div class="text-center small">Mae Gibson(1)</div>
                                    </a>
                                    <a href="javascript:void(0)" class="d-flex col-4 col-sm-3 col-md-4 flex-column align-items-center text-dark py-3 px-2">
                                        <img src="{{ asset('assets/images/users/avatar-7.jpg') }}" alt class="d-block ui-w-40 rounded-circle mb-2">
                                        <div class="text-center small">Alice Hampton(1)</div>
                                    </a>
                                    <a href="javascript:void(0)" class="d-flex col-4 col-sm-3 col-md-4 flex-column align-items-center text-dark py-3 px-2">
                                        <img src="{{ asset('assets/images/users/avatar-4.jpg') }}" alt class="d-block ui-w-40 rounded-circle mb-2">
                                        <div class="text-center small">Belle Ross(1)</div>
                                    </a>
                                    <a href="javascript:void(0)" class="d-flex col-4 col-sm-3 col-md-4 flex-column align-items-center text-dark py-3 px-2">
                                        <img src="{{ asset('assets/images/users/avatar-2.jpg') }}" alt class="d-block ui-w-40 rounded-circle mb-2">
                                        <div class="text-center small">Arthur Duncan(1)</div>
                                    </a>
                                    <a href="javascript:void(0)" class="d-flex col-4 col-sm-3 col-md-4 flex-column align-items-center text-dark py-3 px-2">
                                        <img src="{{ asset('assets/images/users/avatar-6.jpg') }}" alt class="d-block ui-w-40 rounded-circle mb-2">
                                        <div class="text-center small">Amanda Warner(1)</div>
                                    </a>
                                </div>
                            </div>
                            <!-- / Friends -->
                        </div>
                        <div class="col">

                            <!-- Info -->
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="row mb-2">
                                        <div class="col-md-3 text-muted">Birthday:</div>
                                        <div class="col-md-9">
                                            Dec 16, 1994
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-3 text-muted">Country:</div>
                                        <div class="col-md-9">
                                            <a href="javascript:void(0)" class="text-dark">Panama</a>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-3 text-muted">Zip code:</div>
                                        <div class="col-md-9">
                                            <a href="javascript:void(0)" class="text-dark">12345</a>
                                        </div>
                                    </div>
                                    <h6 class="my-3">Contacts</h6>
                                    <div class="row mb-2">
                                        <div class="col-md-3 text-muted">Phone:</div>
                                        <div class="col-md-9">
                                            +0 (123) 456 7891
                                        </div>
                                    </div>
                                    <h6 class="my-3">Interests</h6>
                                    <div class="row mb-2">
                                        <div class="col-md-3 text-muted">Name of received Services:</div>
                                        <div class="col-md-9">
                                            <a href="javascript:void(0)" class="text-dark">Clean</a>,
                                            <a href="javascript:void(0)" class="text-dark">Teaching</a>,
                                            <a href="javascript:void(0)" class="text-dark">Kitchin</a>,
                                            <a href="javascript:void(0)" class="text-dark">Drum &amp; Bass</a>,
                                            <a href="javascript:void(0)" class="text-dark">Dance</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-center p-0">
                                    <div class="row no-gutters row-bordered row-border-light">
                                        <a href="javascript:void(0)" class="d-flex col flex-column text-dark py-3">
                                            <div class="font-weight-bold">24</div>
                                            <div class="text-muted small">posts</div>
                                        </a>
                                        <a href="javascript:void(0)" class="d-flex col flex-column text-dark py-3">
                                            <div class="font-weight-bold">51</div>
                                            <div class="text-muted small">videos</div>
                                        </a>
                                        <a href="javascript:void(0)" class="d-flex col flex-column text-dark py-3">
                                            <div class="font-weight-bold">215</div>
                                            <div class="text-muted small">photos</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- / Info -->
                            <!-- Posts -->

                            <div class="card mb-4">
                                <div class="card-body">
                                    <p>
                                        Aliquam viverra ornare tincidunt. Vestibulum sit amet vestibulum quam. Donec eu est non velit rhoncus interdum eget vel lorem.
                                    </p>

                                    <div class="border-top-0 border-right-0 border-bottom-0 ui-bordered pl-3 mt-4 mb-2">
                                        <div class="media mb-3">
                                            <img src="{{ asset('assets/images/users/avatar-4.jpg') }}" class="d-block ui-w-40 rounded-circle" alt>
                                            <div class="media-body ml-3">
                                                Sunita Ahir
                                                <div class="text-muted small">3 days ago</div>
                                            </div>
                                        </div>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus finibus commodo bibendum. Vivamus laoreet blandit odio, vel finibus quam dictum ut.
                                        </p>
                                        <a href="javascript:void(0)" class="ui-rect ui-bg-cover" style="background-image: url('assets/images/bg/bg-8.jpg');"></a>
                                    </div>
                                    <a href="javascript:void(0)" class="text-muted small">Reposted from @sunita/posts/123</a>
                                </div>
                                <div class="card-footer">
                                    <a href="javascript:void(0)" class="d-inline-block text-muted">
                                        <small class="align-middle"><strong>123</strong> Likes</small>
                                    </a>
                                    <a href="javascript:void(0)" class="d-inline-block text-muted ml-2">
                                        <small class="align-middle"><strong>12</strong> Comments</small>
                                    </a>
                                    <a href="javascript:void(0)" class="d-inline-block text-muted ml-2">
                                        <i class="ion ion-md-share align-middle"></i>&nbsp;
                                        <small class="align-middle">Repost</small>
                                    </a>
                                </div>
                            </div>

                            <!-- / Posts -->

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Center modal content -->
    <div class="modal fade" id="centermodal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h4 class="modal-title text-white" id="myCenterModalLabel">Center modal</h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <h5>Are you sure?</h5>
                    <p>If you click "OK", the data will be deleted forever!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="toastr-delete">Ok</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Basic Data Table</h4>
                    <table id="basic-datatable" class="table dt-responsive nowrap" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Client</th>
                                <th>Review</th>
                                <th>Zip code</th>
                                <th>Verified</th>
                                <th>Profile</th>
                                <th>Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>
                                    <div>
                                        <div class="media align-items-center more-user-details" data-original-title="" title="">
                                            <img src="{{ asset('assets/images/users/avatar-4.jpg') }}" class=" rounded-circle ui-w-50 mr-3" alt="Avtar image">
                                            <div class="media-body">
                                                <h4 class="mt-0 mb-1"><input class="edit-info" value="Jacob Doe"><div class="static-info">Jacob Doe</div></h4>
                                                <p class="mb-1"><input class="edit-info" value="Jacob_Doe@gmail.com"><div class="static-info">Jacob_Doe@gmail.com</div></p>
                                                <p class="mb-0"><input class="edit-info" value="+45,123,345"><div class="static-info">+45,123,345</div></p>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <span>5.0(12)</span>
                                        <div class="progress mt-1 mb-1">
                                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                        </div>
                                        <!-- Large modal -->
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#bs-example-modal-lg">View More!</button>
                                    </div>
                                </td>
                                <td><input class="edit-info" value="12,345"><div class="static-info">12,345</div></td>
                                <td>
                                <span class="badge badge-success">Verified</span>
                                </td>
                                <td>
                                <button class="btn btn-icon btn-info mr-1" data-toggle="modal" title="View" data-target="#full-width-modal"><i class="feather icon-eye"></i></button>
                                </td>
                                <td><input class="edit-info" value="2011/04/25"><div class="static-info">2011/04/25</div></td>
                                <td>
                                    <span class="col-6">
                                        <button class="btn btn-icon btn-primary mr-1 edit-btn" data-toggle="tooltip" title="Edit"><i class="feather icon-edit-2"></i></button>
                                        <button class="btn btn-icon btn-success mr-1 check-btn" data-toggle="tooltip" title="Check"><i class="feather icon-check-square"></i></button>
                                    </span>
                                    <span class="col-6">
                                        <button class="btn btn-icon btn-danger" data-toggle="modal" title="Delete" data-target="#centermodal"><i class="feather icon-trash-2"></i></button>
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
@endsection

@section('script')

    <script src="{{ asset('assets/js/vendor/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/dataTables.select.min.js') }}"></script>

@endsection

@section('demo_script')

    <script src="{{ asset('assets/js/demo/demo.datatable-init.js') }}"></script>
    <script src="{{ asset('assets/js/toastr.js') }}"></script>
    <script>
    $(function() {
    $('.more-user-details').popover({
            placement: 'top',
            trigger: 'hover',
            html: true,
            content: '<div><div class="media align-items-center"><img src="{{ asset('assets/images/users/avatar-4.jpg') }}" class="rounded-circle ui-w-50 mr-3" alt="Avtar image"><div class="media-body"><h4 class="mt-0 mb-1">Jacob Doe <i class="mdi mdi-checkbox-blank-circle text-primary"></i><small>Active Account</small></h4><p class="mb-0">Jacob_Doe@gmail.com</p><p>123456</p></div></div></div><div class="alert alert-warning p-2 mb-1 mt-3 rounded"><div class="media align-items-center"><h3 class="mdi mdi-bell-ring-outline alert-heading m-0"></h3><div class="media-body pl-3"><small><b class="d-block">Unpaid invoice</b></small><small>This account will be disabled starting <b>14 March 1996</b>.</small></div></div></div><div class="no-gutters text-center row pt-3"><div class="col-6"><div><i class="feather icon-pie-chart h4 text-danger"></i></div><div class="mt-2"><b class="mb-1">$9,693</b><span class="d-block">revenue</span></div></div><div class="col-6"><div><i class="feather icon-users h4 text-primary"></i></div><div class="mt-2"><b class="mb-1">2,345</b><span class="d-block">users</span></div></div></div>'
        });
    });
    $(".edit-btn").click(function(){
        $(".edit-info").css("display", "initial");
        $(".edit-btn").css("display", "none");
        $(".static-info").css("display", "none");
        $(".check-btn").css("display", "initial");
    });
    $(".check-btn").click(function(){
        $(".edit-info").css("display", "none");
        $(".edit-btn").css("display", "initial");
        $(".static-info").css("display", "initial");
        $(".check-btn").css("display", "none");
    });
    </script>
    
@endsection

