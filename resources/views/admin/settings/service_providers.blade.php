@extends('admin.layouts.master')

@section('style')
    <link href="{{ asset('assets/css/vendor/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/vendor/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/vendor/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/vendor/select.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.css" rel="stylesheet') }}" type="text/css" />
    <link href="{{ asset('assets/css/vendor/fullcalendar.min.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .fc-scroller { overflow-x: visible !Important; }
    </style>
@endsection

@section('page_title') Service Provider @endsection

@section('content')

    <!-- Add Modal -->
    <div class="modal fade" id="addDateModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Add Date</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group" style="display:none;">
                                <label for="exampleInputEmail1">ID</label>
                                <input type="text" class="form-control" id="add_blockId" aria-describedby="emailHelp" placeholder="Enter email">                            
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Reason</label>
                                <input type="text" class="form-control" id="add_blockReason" aria-describedby="emailHelp" placeholder="Enter Reason">                             
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Block Day</label>
                                <input type="text" class="form-control" id="add_blockDay" aria-describedby="emailHelp" placeholder="Enter Day">                             
                            </div>
                            <div class="row">
                                <div class="col-sm-4"></div>
                                <div class="col-sm-2">
                                    <button id="btn_addSave" class="btn  btn-primary" style="fliat:left;">Save</button>
                                </div>
                                <div class="col-sm-2">
                                    <button id="btn_addClose" class="btn btn-warning" style="float:left;">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Modal Ends -->

    <!-- Edit Modal -->
    <div class="modal fade" id="editDateModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Edit Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group" style="display:none;">
                                <label for="exampleInputEmail1">ID</label>
                                <input type="text" class="form-control" id="edit_blockId" aria-describedby="emailHelp" placeholder="Enter email">                            
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Reason</label>
                                <input type="text" class="form-control" id="edit_blockReason" aria-describedby="emailHelp" placeholder="Enter email">                             
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Block Day</label>
                                <input type="text" class="form-control" id="edit_blockDay" aria-describedby="emailHelp" placeholder="Enter email">                             
                            </div>
                            <div class="row">
                                <div class="col-sm-4"></div>
                                <div class="col-sm-2">
                                    <button id="btn_editSave" class="btn  btn-primary" style="fliat:left;">Change</button>
                                </div>
                                <div class="col-sm-2">
                                    <button id="btn_delSave" class="btn btn-warning" style="float:left;">Delete</button>
                                </div>                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Modal Ends -->

    <!-- Main Content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5>Details</h5>
                    <a href="#!" class="btn btn-success float-right" id="detailProvider" >Save</a>
                    <a href="{{ route('admin.settings.providers')}}" class="btn btn-warning float-right">Back</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-10" id="multiSelect">
                            <h3 class="mb-1 mt-3">Service Select</h3> 
                            <div id="ServicePart"></div>                                                                                        
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-10" id="multiSelect">
                            <h3 class="mb-1 mt-3">Area Select</h3> 
                            <div id="WorkingPart"></div>                                                                                        
                        </div>
                    </div>
                    <div class="row">                                                          
                        <div class="col-sm-1"></div>
                        <div class="col-sm-10">
                            <h3 class="mb-1 mt-3">Days Select</h3> 
                            <div class="calendar"></div>
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
    <script src="{{ asset('assets/js/vendor/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/dragula.min.js') }}"></script>
    <script src="{{ asset('assets/js/ui/component.dragula.js') }}"></script>
    <!-- end demo js-->

    <!-- custom app -->
    <script>
        var graph_data = [];
        var block_days;
        var all_services;
        var avail_services;
        var all_areas;
        var working_areas;
        var select_id=0;
        var changeData = {};
        var serviceId = [];

        $(document).ready(function(){

            avail_services = @json($avail_services);
            all_services = @json($allservices);
            block_days = @json($provider->block_days);
            all_areas = @json($areas);
            working_areas = @json($provider->areas);

            for (var i = 0; i<block_days.length;i++){
                var element = {};
                element.id = block_days[i]["id"];  
                element.title = block_days[i]["reason"];  
                element.start = block_days[i]["date"];
                element.borderColor = '#fd397a';
                element.backgroundColor = '#fd397a';
                element.textColor = '#fff';
                graph_data.push(element);      
            }      

            Rendering(graph_data);
            
        });
   
        function Rendering(data){
            
            var d = new Date();

            $('.calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                defaultDate: moment(d).format("YYYY-MM-DD"),
                editable: true,
                selectable: true,
                draggable: true,
                events: graph_data,
                allDay: true,
                eventClick: function(event, jsEvent, view) {
                    select_id = event.id;
                    $("#editDateModal").modal();
                    $("#edit_blockReason").val(event.title);
                    $("#edit_blockDay").val(moment(event.start).format("YYYY-MM-DD"));     
                },
                select:function(start,end)
                {  
                    $("#addDateModal").modal();
                    $("#add_blockReason").val('');
                    $("#add_blockDay").val(moment(start).format("YYYY-MM-DD"));
                },
            });

            ServiceListMake(all_services,avail_services);
            AreaListMake(all_areas,working_areas);    
        }

        $("#btn_delSave").click(function(){
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result) {
                    event.preventDefault();                     
                    $.ajax({
                        url:"{{ route('admin.settings.postDelBlock') }}",
                        method:"GET",
                        data:{id:select_id},
                        success:function(result)
                        {
                            console.log("success");
                            location.reload();
                            $("#addDateModal").modal('toggle');
                        },
                            error : function(err) {
                            console.log(err);
                            $("#addDateModal").modal('toggle');                        
                        },
                    });
                }
            });
        });

        $("#btn_editSave").click(function(){
            var provider_id,edit_title,edit_start;                
            provider_id = select_id;
            edit_title = $("#edit_blockReason").val();
            edit_start = $("#edit_blockDay").val();
        
            if(edit_title!=''&&edit_start!=''){
                $.get("{{ route('admin.settings.postEditBlock') }}",
                    {
                        id:provider_id,
                        date:edit_start,
                        reason:edit_title,
                    },
                    function (data) {
                        if(data!="false"){
                        $("#editDateModal").modal("toggle");  
                        location.reload();
                        }
                        else{                      
                            console.log("All over the woard") 
                            $("#editDateModal").modal("toggle");     
                            console.log("warning");
                        }                                
                    }); 
            }     
        });

        $("#btn_addSave").click(function(){
            var provider_id,add_title,add_start;                
            provider_id = @json($id);
            add_start = $("#add_blockDay").val();
            add_title = $("#add_blockReason").val();
            
            if(add_title!=''&& add_start!=''){
                $.get("{{ route('admin.settings.postNewBlock') }}",
                    {
                        id:provider_id,
                        date:add_start,
                        reason:add_title,
                    },
                    function (data) {
                        if(data!="false"){
                        $("#addDateModal").modal();  
                            location.reload();
                        }
                        else{                      
                            console.log("All over the woard") 
                            $("#addDateModal").modal("toggle");     
                            console.log("warning");
                        }                                
                    }); 
            }
        
        });

        function ServiceListMake(data,avail_data){

            var selectService="";
            var all_servId = [];
            
            selectService="<select class='select2 form-control select2-multiple' data-toggle='select2'";
            selectService+=" multiple='multiple' data-placeholder='Choose ...' id='available_service'><optgroup>";            
            for(var i=0;i<data.length;i++){             
                selectService+="<option value='"+data[i]["id"]+"'>"+data[i]["name"]+"</option>";   
            }

            selectService+="</optgroup></select>";

            $("#ServicePart").html(selectService);

            for(var i=0;i<avail_data.length;i++){
                all_servId.push(data[i]["id"]);   
            }

            $("#available_service").val(all_servId);
            $("#available_service").select2();
        }

        function AreaListMake(data,working_data){
            
            var selectArea="";
            var all_areaId = [];
            
            selectArea="<select class='select2 form-control select2-multiple' data-toggle='select2'";
            selectArea+=" multiple='multiple' data-placeholder='Choose ...' id='working_area'><optgroup>";
                        
                for(var i=0;i<data.length;i++){             
                selectArea+="<option value='"+data[i]["id"]+"'>"+data[i]["name"]+"</option>";   
                }

                selectArea+="</optgroup></select>";
                $("#WorkingPart").html(selectArea);

                for(var i=0;i<working_data.length;i++){
                all_areaId.push(data[i]["id"]);   
                }

                $("#working_area").val(all_areaId);
                $("#working_area").select2();
        }
    
        $("#detailProvider").click(function(){

            avail_services = $("#available_service").val();
            working_areas = $("#working_area").val();

            var id = @json($id);
            
            $.get("{{ route('admin.settings.postAvailableEditService') }}",
                {
                    id:id,
                    allservices:avail_services,
                    allareas:working_areas,
                },
                function (data){
                    if(data){
                        alert("successful!");
                        location.reload();
                        }
                    else{
                        alert("Warning!");
                    }                                
                });         
        });  
    

        $("#btn_addClose").click(function(){
            $("#addDateModal").modal("toggle");
        });

        $("#btn_workingSave").click(function(){
            $('#list-hand-two2 li').each(function () {
                serviceId.push($(this).data("id"));
                i++;
            });

            var i=0;
            var id = @json($id);

            $.get("{{ route('admin.settings.postEditRegion') }}",
                {
                    id:id,
                    data:serviceId,
                },
                function (data) {
                    if(data!="false"){
                        alert("successful!");
                    }
                    else{
                        alert("Warning!");
                    }
                }                                
            );         
        });  
    </script>
    <!-- custom app ends-->
     
@endsection