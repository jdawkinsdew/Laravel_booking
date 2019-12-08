@extends('admin.layouts.master')

@section('style')
    <link href="{{ asset('assets/css/vendor/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/vendor/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/vendor/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/vendor/select.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
     <style>
        table th, table td {vertical-align: middle !important;text-align: center;}
    </style>
@endsection



@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item active">Settings</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <!-- Main Content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title">All Users</h4>  
                <div class="m-portlet__head-tools float-right">
                   <a href="{{route('admin.settings.user_manage.create')}}" id="open_create_modal" class="btn btn-info">
                    <span>
                        <i class="feather icon-plus"></i>
                        <span>
                            New User
                        </span>
                    </span>
                </a>
            </div>
                </div>
                <div class="card-body">                    
                    <table id="basic-datatable" class="table dt-responsive table-bordered table-hover nowrap" width="100%">
                        <thead>
                            <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>username</th>
                            <th>Role</th>
                            <th>Email</th>
                            <th>Image</th>
                            <th>Email Verified</th>
                            <th>Status</th>
                            <th>Created Date</th>
                            <th>Updated Date</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="m_users_datatable">
                           
                        </tbody>
                    </table>
                </div>
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

    {{-- <script src="{{ asset('assets/js/demo/demo.datatable-init.js') }}"></script> --}}
    <script type="text/javascript">
        $(document).ready(function(){
                $.get("{{ route('admin.settings.user_manage.getData') }}",
            function (data) {
                if(data!=false){  
                $("#m_users_datatable").html(data.view);
                $('#basic-datatable').DataTable({
                    keys: true,
                    "language": {
                        "paginate": {
                            "previous": "<i class='mdi mdi-chevron-left'>",
                            "next": "<i class='mdi mdi-chevron-right'>"
                        }
                    },
                    "drawCallback": function () {
                        $('.dataTables_paginate > .pagination').addClass('pagination-rounded');
                    }
                });
                console.log(data);
                }
                else{
                    alert("Warning!");
                }
            });
        });

        function deleteItem(id) {   
              swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this record!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) $.get("{{ route('admin.settings.user_manage.deleteData') }}",
                    {
                        id: id,
                    },
                    function (data) {
                        if (data != "false") {
                            swal("Poof! Your record has been deleted!", {
                                icon: "success",
                            });
                            $("#m_users_datatable").html(data.view);
                            toastr.success('Successfully Deleted!');
                        } else {
                            toastr.error(data);
                        }
                    }); else {
                    swal("Your imaginary file is safe!");                
                }
            });
        }
    </script>
@endsection


