@extends('admin.layouts.master')

@section('page_title') Capacity Utilization @endsection

@section('content')

    <!-- Start Main content -->
    <div class="row">
        <div class="col-12">
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
                                <small class="mb-0">45% Increase in 28 Days</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <span class="ui-box-icon text-white"><i class="lnr lnr-earth display-4"></i></span>
                            <div class="ml-3 text-white">
                                <p class="mb-1">Total Visits</p>
                                <h4 class="mb-0">15,489</h4>
                                <div class="progress progress-md bg-light mt-2 mb-1">
                                    <div class="progress-bar bg-white" style="width: 19%"></div>
                                </div>
                                <small class="mb-0">45% Increase in 28 Days</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <span class="ui-box-icon text-white"><i class="lnr lnr-cloud-download display-4"></i></span>
                            <div class="ml-3 text-white">
                                <p class="mb-1">Downloads</p>
                                <h4 class="mb-0">55,005</h4>
                                <div class="progress progress-md bg-light mt-2 mb-1">
                                    <div class="progress-bar bg-white" style="width: 85%"></div>
                                </div>
                                <small class="mb-0">45% Increase in 28 Days</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <span class="ui-box-icon text-white"><i class="lnr lnr-bubble display-4"></i></span>
                            <div class="ml-3 text-white">
                                <p class="mb-1">Direct Chat</p>
                                <h4 class="mb-0">13,921</h4>
                                <div class="progress progress-md bg-light mt-2 mb-1">
                                    <div class="progress-bar bg-white" style="width: 85%"></div>
                                </div>
                                <small class="mb-0">45% Increase in 28 Days</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ends Main Content -->

@endsection
