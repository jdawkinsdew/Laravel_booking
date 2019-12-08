@extends('admin.layouts.master')

@section('style')
 <!-- third party css -->
    <link href="{{ asset('assets/css/vendor/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/vendor/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/vendor/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/vendor/select.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.css" rel="stylesheet') }}" type="text/css" />
@endsection

@section('page_title') Booking Detail @endsection

@section('content')

    <!-- Data Table starts -->
    <div class="row">
        <div class="col-12">
            <div class="card sale-card">
                <div class="card-header">
                    <h5>Detailed Overview</h5>
                </div>
                <div class="card-body p-40">
                    <div class="table-responsive-md">
                        <table id="datatable-buttons" class="table table-bordered table-hover text-center">
                            <thead class="thead-light">
                                <tr>
                                        <th>No</th>
                                        <th>Client</th>
                                        <th>Service</th>
                                        <th>Provider</th>
                                        <th>Date</th>
                                        <th>Start Time</th>
                                        <th>Finish Time</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Create Time</th>
                                        {{-- <th>Actions</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bookings as $key => $booking)                                                    
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $booking->client->name }}</td>
                                    <td>{{ $booking->service }}</td>
                                    <td>{{ $booking->provider->name }}</td>
                                    <td>{{ $booking->date }}</td>
                                    <td>{{ $booking->start_time }}</td>
                                    <td>{{ $booking->finish_time }}</td>
                                    <td>{{ $booking->price }}</td>
                                    {{-- <td>{{ $booking->promotion_code }}</td>
                                    <td>{{ $booking->discount }}</td> --}}
                                    <td>
                                    @if($booking->status=='approved')
                                        <button class="btn btn-sm btn-success">Approved</button>
                                        <button class="btn btn-sm btn-primary" onclick="SwitchCanceled({{$booking->id}})">Cancelled</button>
                                    @elseif($booking->status=='pending')
                                    <button class="btn btn-sm btn-warning"><span class="spinner-border spinner-border-sm mr-2" role="status"></span>Pending</button>
                                    <a href="#!" class="btn btn-sm btn-info" onclick="SwitchApproved({{$booking->id}})">Approve Now</a>
                                    @elseif ($booking->status=='rejected')
                                    <button class="btn btn-sm btn-danger">Rejected</button>
                                    @endif
                                    </td>
                                    <td>{{ $booking->created_at }}</td>
                                    {{-- <td>
                                        <a href="#!" class="btn btn-icon btn-primary mr-1" data-toggle="tooltip" title="" data-original-title="View"><i class="feather icon-eye"></i></a>
                                        <a href="#!" class="btn btn-icon btn-danger mr-1" data-toggle="tooltip" title="" data-original-title="Delete"><i class="feather icon-trash-2"></i></a>
                                    </td> --}}                                               
                                </tr>  
                                @endforeach                                        
                            </tbody>
                        </table>                                 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Data Table Ends -->

@endsection

@section('script')

     <!-- third party js -->
    <script src="{{ asset('assets/js/vendor/jquery.dataTables.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/dataTables.bootstrap4.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/buttons.flash.min.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/buttons.print.min.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/dataTables.keyTable.min.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/dataTables.select.min.js')}}"></script>
    <!-- third party js ends -->

    <!-- demo app -->
    <script src="{{ asset('assets/js/demo/demo.datatable-init.js') }}"></script>
    <!-- demo app -->

    <!-- custom app -->
    <script type="text/javascript">
        function SwitchApproved(id){
            $(".btn-warning").html("Pending");
            $.get("{{ route('admin.bookings.postSwitchApproved') }}",
                {
                    id:id,
                },
                function (data) {
                    if(data!="false"){  
                        console.log('Successful!');
                        window.location.reload();
                    }
                    else{
                        console.log('Try again!');                    }
            }); 
        }
        function SwitchCanceled(id){
            $.get("{{ route('admin.bookings.postSwitchCanceled') }}",
                {
                    id:id,
                },
                function (data) {
                    if(data!='false'){  
                        console.log('Successful!');
                        // window.location.reload();
                    }
                    else{
                        console.log('Try again!');                    }
            }); 
        }
    </script>
    <!-- end custom app-->
    
@endsection
