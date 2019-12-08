@extends('admin.layouts.master')

@section('style')

@endsection

@section('page_icon')<i class="feather icon-home"></i>@endsection

@section('page_title') System setting @endsection

@section('content')

    <!--  Modal content for the above example -->
    <div class="modal fade" id="bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h4 class="modal-title" id="myLargeModalLabel">Discount Option</h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <label>Discount Code : </label><div id="discode"></div>
                    <div class="form-group mb-3">
                        <label class="mt-2">Discount Percentage</label>
                        <input data-toggle="touchspin" value="18.20" type="text" data-step="0.1" data-decimals="2" data-bts-postfix="%" class="dispro" disabled>
                    </div>
                    <div class="form-group">
                        <label class="mt-2">Min budget</label>
                        <input data-toggle="touchspin" type="text" data-bts-prefix="$" value="10" class="dispro" disabled>
                    </div>
                    <button type="button" class="btn btn-info mb-1 float-right edit-btn">Edit</button>
                    <button type="button" class="btn btn-success mb-1 float-right check-btn" id="toastr-change" style="display: none;">Confirm</button>
                    <button type="button" class="btn btn-secondary float-right mr-2" data-dismiss="modal">Close</button>
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
                                <th>Discount Code</th>
                                <th>Created</th>
                                <th>Updated</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>
                                    <div class="media align-items-center more-user-details" data-original-title="" title="">
                                        <img src="{{ asset('assets/images/users/avatar-4.jpg') }}" class=" rounded-circle ui-w-50 mr-3" alt="Avtar image">
                                        <div class="media-body">
                                            <h4 class="mt-0 mb-1">Jacob Doe</h4>
                                            <p class="mb-0">Jacob_Doe@gmail.com</p>
                                            <p class="mb-0">+45,123,345</p>
                                            <p class="mb-0">12,345</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <div id="discode1" class="mb-2"></div>
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#bs-example-modal-lg">Setting</button>
                                    </div>
                                </td>
                                <td>2011/04/25</td>
                                <td>2014/04/25</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/vendor/handlebars.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/typeahead.bundle.min.js') }}"></script>
@endsection

@section('demo_script')
<script src="{{ asset('assets/js/demo/demo.typehead.js') }}"></script>
<script src="{{ asset('assets/js/toastr.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script>
    $(".edit-btn").click(function(){
        $(".edit-btn").css("display", "none");
        $(".dispro").prop("disabled", false);
        $(".check-btn").css("display", "initial");
    });
    $(".check-btn").click(function(){
        $(".edit-btn").css("display", "initial");
        $(".dispro").prop("disabled", true);
        $(".check-btn").css("display", "none");
    });
    </script>
<script>
function guid() {
  function s4() {
    return Math.floor((1 + Math.random()) * 0x10000)
      .toString(16)
      .substring(1);
  }
  return s4() + '-' + s4() + '-' + s4() + '-' + s4() + '-' + s4();
}
$(document).ready(function() {
  $('#discode').text(guid());
  document.getElementById("discode1").innerHTML = document.getElementById("discode").innerText;
})
</script>
@endsection

