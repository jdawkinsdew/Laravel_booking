@extends('admin.layouts.master')

@section('style')

@endsection

@section('page_icon')<i class="feather icon-home"></i>@endsection

@section('page_title') System Time Setting @endsection

@section('content')
    <div class="row">

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div>
                        <label>Timepicker</label>
                        <button type="button" class="edit-btn1 btn btn-info float-right">Edit</button>
                        <button type="button" class="check-btn1 btn btn-success float-right" id="toastr-change" style="display: none;">Save</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group mb-3">
                                <div class="custom-control custom-radio mb-2">
                                    <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input timepick" checked disabled>
                                    <label class="custom-control-label" for="customRadio1">24 Hour Mode Time Picker(Default)</label>
                                </div>
                                <div class="input-group">
                                    <input type="text" class="form-control timepick" data-toggle='timepicker' data-show-meridian="false" disabled>
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="dripicons-clock"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <div class="custom-control custom-radio mb-2">
                                    <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input timepick" disabled>
                                    <label class="custom-control-label" for="customRadio2">12 Hour Time Picker</label>
                                </div>
                                <div class="input-group">
                                    <input type="text" class="form-control timepick" data-toggle='timepicker' disabled>
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="dripicons-clock"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div>
                        <label>Date Range Picker</label>
                        <button type="button" class="edit-btn2 btn btn-info float-right">Edit</button>
                        <button type="button" class="check-btn2 btn btn-success float-right" id="toastr-change1" style="display: none;">Save</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-12">
                        <div class="form-group mb-3">
                            <label>Company Opening Hours</label>
                            <div class="row">
                                <div class="col-6">
                                    <label for="from-time">From</label><input type="time" class="form-control time datepick" value="10:00:00" id="from-time" disabled>
                                </div>
                                <div class="col-6">
                                    <label for="from-to">To</label><input type="time" class="form-control time datepick" value="12:00:00" id="from-to" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group mb-3">
                            <label>Company Special Days</label>
                            <input type="text" class="form-control date datepick" id="singledaterange" data-toggle="date-picker" data-cancel-class="btn-warning" disabled>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label>Company Special Day</label>
                            <input type="text" class="form-control date datepick" id="birthdatepicker" data-toggle="date-picker" data-single-date-picker="true" disabled>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection

@section('script')

@endsection

@section('demo_script')
<script src="{{ asset('assets/js/toastr.js') }}"></script>
<script>
    $(".edit-btn1").click(function(){
        $(".edit-btn1").css("display", "none");
        $(".check-btn1").css("display", "initial");
        $(".timepick").prop("disabled", false);
    });
    $(".check-btn1").click(function(){
        $(".edit-btn1").css("display", "initial");
        $(".check-btn1").css("display", "none");
        $(".timepick").prop("disabled", true);
    });
    $(".edit-btn1").click(function(){
        $(".edit-btn1").css("display", "none");
        $(".check-btn1").css("display", "initial");
        $(".timepick").prop("disabled", false);
    });
    $(".check-btn1").click(function(){
        $(".edit-btn1").css("display", "initial");
        $(".check-btn1").css("display", "none");
        $(".timepick").prop("disabled", true);
    });
    
    $(".edit-btn2").click(function(){
        $(".edit-btn2").css("display", "none");
        $(".check-btn2").css("display", "initial");
        $(".datepick").prop("disabled", false);
    });
    $(".check-btn2").click(function(){
        $(".edit-btn2").css("display", "initial");
        $(".check-btn2").css("display", "none");
        $(".datepick").prop("disabled", true);
    });
    $(".edit-btn2").click(function(){
        $(".edit-btn2").css("display", "none");
        $(".check-btn2").css("display", "initial");
        $(".datepick").prop("disabled", false);
    });
    $(".check-btn2").click(function(){
        $(".edit-btn2").css("display", "initial");
        $(".check-btn2").css("display", "none");
        $(".datepick").prop("disabled", true);
    });
</script>
@endsection

