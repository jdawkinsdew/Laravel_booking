@extends('admin.layouts.master')

@section('style')
    <link href="{{ asset('assets/css/vendor/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/vendor/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/vendor/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/vendor/select.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <style>
        table th, table td {vertical-align: middle !important;}
    </style>
@endsection

@section('page_title') All user setting @endsection

@section('content')

    <!-- Main Content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <span style="font-size:1.6rem;font-weight:700">All Users</span>  
                    <div class="float-right">
                        <a href="{{route('admin.settings.user_manage.create')}}" id="open_create_modal" class="btn btn-info">
                            <span><i class="feather icon-plus"></i>
                                <span>New User</span>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="card-body">                    
                    <table id="basic-datatable" class="table dt-responsive table-bordered table-hover nowrap text-center" width="100%">
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
    <!-- Ends Main Content -->
    
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

    <!-- custom app -->
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
                if (willDelete) {
                    $.get("{{ route('admin.settings.user_manage.deleteData') }}",
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
                    }); 
                }
                else {
                    swal("Your imaginary file is safe!");                
                }
            });
        }

    </script>
    <!-- ends custom app -->

@endsection


