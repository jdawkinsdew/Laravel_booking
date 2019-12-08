@extends('admin.layouts.master')

@section('style')
    <link href="{{ asset('assets/css/vendor/fullcalendar.min.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .fc-scroller { overflow-x: visible !Important; }
    </style>
@endsection

@section('page_title') Campany Opening Time @endsection

@section('content')

    <!-- Create Time Setting Modal -->
    <div id="create_new_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">New Working Hour</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">            
                    <input type="hidden" name="working_hour_id" id="add_working_hour_id"/>
                    <div class="form-group selected_date">    
                        <label>Select Dates</label>
                        <input type="text" class="form-control date" id='add_selected_date' data-toggle="date-picker" data-single-date-picker="true">
                    </div>
                    <div class="form-group">
                        <label for="start_time">Start Time</label>
                        <div class="input-group timepicker">
                            <input type="text" class="form-control" id="add_start_time" value="8:00:00" name="start_time" data-toggle='timepicker' data-show-meridian="false">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="dripicons-clock"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="finish_time">Finish Time</label>
                        <div class="input-group timepicker">
                            <input type="text" class="form-control" id="add_finish_time" value="17:00:00" data-toggle='timepicker' data-show-meridian="false">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="dripicons-clock"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status" class="form-control-label">Approve?</label>
                        <div>
                            <input type="checkbox" id="add_status" name = "status" data-switch="primary" />
                            <label for="add_status" data-on-label="On" data-off-label="Off"></label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                    <button type ="button" id="create_modal_form" class="btn btn-success">Create</button>
                </div>          
            </div>
        </div>
    </div>
    <!-- Ends Time Setting Modal -->

    <!-- Edit Time Setting Modal -->
    <div id="edit_del_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Change Working Hour</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">            
                    <input type="hidden" name="working_hour_id" id="edit_working_hour_id"/>
                    <div class="form-group selected_date">    
                        <label>Select Dates</label>
                        <input type="text" class="form-control date" id='edit_selected_date' data-toggle="date-picker" data-single-date-picker="true">
                    </div>
                    <div class="form-group">
                        <label for="start_time">Start Time</label>
                        <div class="input-group timepicker">
                            <input type="text" class="form-control" id="edit_start_time" value="8:00:00" data-toggle='timepicker' data-show-meridian="false">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="dripicons-clock"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="finish_time">Finish Time</label>
                        <div class="input-group timepicker">
                            <input type="text" class="form-control" id="edit_finish_time" value="17:00:00" data-toggle='timepicker' data-show-meridian="false">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="dripicons-clock"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status" class="form-control-label">Approve?</label>
                        <div>
                            <input type="checkbox" id="edit_status" data-switch="primary" />
                            <label for="edit_status" data-on-label="On" data-off-label="Off"></label>
                        </div>                       
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="del_modal_form" class="btn btn-danger" data-dismiss="modal">Delete</button>
                    <button type ="button" id="edit_modal_form" class="btn btn-primary">Change</button>
                </div>          
            </div>
        </div>
    </div>
    <!-- Ends Time setting Modal -->

    <!-- Start Main Content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left"><h3>Company Opening Hour</h3></div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ends Main Content -->
        
@endsection

@section('script')

    <!-- third party js -->
    <script src="{{ asset('assets/js/vendor/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/fullcalendar.min.js') }}"></script>
    <!-- third party js ends -->

    <!-- custom app -->
    <script>

        var d = new Date();

        $('#calendar').fullCalendar({
            header:{
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            defaultDate: moment(d).format("YYYY-MM-DD"),
            editable: true,
            droppable: true,
            selectable: true,
            displayEventTime : false,
            events : [
                        @foreach($working_hours as $hour)
                        {
                            title : '{{timecut($hour->start_time)}}'+'-'+'{{timecut($hour->finish_time)}}',
                            start : '{{ $hour->date . ' ' . $hour->start_time }}',
                            end : '{{ $hour->date . ' ' . $hour->finish_time }}',
                            color: '{{$hour->status==true? "#32a506":"orange"}}',
                            id:'{{$hour->id}}'
                        },
                        @endforeach
            ],
            select:function(start, end, jsEvent, view){  
                //alert("hello");
                $("#create_new_modal").modal(); 
                var selected_date,dates,start_time,finish_time,status;
                $("#add_working_hour_id").val("");              
                $("#add_selected_date").val(moment(start).format("YYYY-MM-DD"));                    
            },
            eventClick:function(event){
                $("#edit_working_hour_id").val(event.id);
                $("#edit_selected_date").val(moment(event.start).format("YYYY-MM-DD"));
                $("#edit_start_time").val(moment(event.start).format("HH:MM:SS")); 
                $("#edit_finish_time").val(moment(event.end).format("HH:MM:SS"));

                if (event.color == "#32a506") $("#edit_status").prop("checked", true);
                else $("#edit_status").prop("checked", false);

                $("#edit_del_modal").modal();                        
            },
            eventLongPressDelay: function(e){
                deleteWorkingHour(e.id);
            }               
        });

        $("#create_modal_form").click(function(){ 

            var working_hour_id,date,start_time,finish_time,status;  

            date = $("#add_selected_date").val();
            start_time = $("#add_start_time").val();
            finish_time = $("#add_finish_time").val();

            if($("#add_status").is(':checked')) status = 1;
            else status = 0;
            $.get("{{ route('admin.settings.working_hour.save') }}",
                {
                    date:date,
                    start_time:start_time,
                    finish_time:finish_time,
                    status:status,
                },
            function (data){
                if(data!="false"){
                    $("#create_new_modal").modal("toggle");
                    location.reload();
                }
                else{                      
                        toastr.error(data);  
                        $("#create_new_modal").modal("toggle");     
                }
            });                         
        });


        $("#edit_modal_form").click(function(){

            var working_hour_id,date,start_time,finish_time,status; 

            date = $("#edit_selected_date").val();
            start_time = $("#edit_start_time").val();
            finish_time = $("#edit_finish_time").val();
            working_hour_id = $("#edit_working_hour_id").val();
            if($("#edit_status").is(':checked')) status = 1;
            else status = 0;
                $.get("{{ route('admin.settings.working_hour.editData') }}",
                {
                    id:working_hour_id,
                    date:date,
                    start_time:start_time,
                    finish_time:finish_time,
                    status:status,
                },
            function (data) {
                if(data!="false"){
                    $("#edit_del_modal").modal("toggle");                                 
                    location.reload();
                }
                else{                      
                    toastr.error(data);  
                    $("#edit_del_modal").modal("toggle");     
                }
            });
        }); 

        $("#del_modal_form").click(function(){

            var working_hour_id;          

            working_hour_id = $("#edit_working_hour_id").val();
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this record!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }) .then((willDelete) => {
                if (willDelete) {
                    $.get("{{ route('admin.settings.working_hour.delData') }}",
                        {
                            id:working_hour_id,
                        },
                    function (data) {
                        if(data!="false"){                      
                                swal("Poof! Your record has been deleted!",{
                                icon: "success",
                            });                          
                            location.reload();                                      
                        }else{                      
                            toastr.error(data);  
                            $("#edit_del_modal").modal("toggle");
                            location.reload();     
                        }
                    });
                } else {
                    swal("Your imaginary file is safe!");
                }
            });
        });  

    </script>
    <!-- ends custom app -->
    
@endsection