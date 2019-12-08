@extends('admin.layouts.master')

@section('style')
    <link href="{{ asset('assets/css/vendor/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/vendor/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/vendor/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/vendor/select.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.css" rel="stylesheet') }}" type="text/css" />
@endsection

@section('page_title') Service Setting @endsection

@section('content')

    <!-- Start Modal -->
    <div id="serviceModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form>
                <div class="modal-content" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Provider Settings</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="Service Name">Service Name</label>
                                            <input type="text" class="form-control" id="edit_serviceID" aria-describedby="emailHelp" placeholder="Enter Name" style="display:none;">
                                            <input type="text" class="form-control" id="edit_serviceName" aria-describedby="emailHelp" placeholder="Enter Name">
                                            {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">One-Time</label>
                                            <input type="text" class="form-control" id="edit_serviceOnetime" placeholder="Enter Price">
                                        </div>
                                            <div class="form-group">
                                            <label for="exampleInputPassword1">Recurring</label>
                                            <input type="text" class="form-control" id="edit_serviceRecurring" placeholder="Enter Price">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn_saveChange btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Ends Modal -->

    <!-- Start Main Content -->
    <div class="row">
        <div class="col-12">
            <div class="card sale-card">
                <div class="card-header">
                    <div class="row">                            
                    <div class="col-sm-2"><h3>Services</h3></div>                                                                                                        
                    <div class="col-sm-8"></div> 
                    <div class="col-sm-2">
                    <a href='#!' class='btn_newService btn btn-success' data-toggle='tooltip' style="float:right;"><i class='feather icon-file-plus display-5'>Add</i></a></div>
                </div>
            </div>
            <div class="card-body p-40">
                <div class="table-responsive-md">                                   
                    <table id="datatable-buttons" class="table table-bordered table-hover text-center">
                        <thead class="thead-light">
                            <tr>
                                <th>Service ID</th>
                                <th>Service</th>
                                <th>One-time</th>
                                <th>Recurring</th>
                                <th style="width:100px;">Action</th>
                            </tr>
                        </thead>
                        <tbody id="addServiceTR">
                            @foreach($services as $key => $service)    
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td id="serviceName{{$service->id}}">{{ $service->name }}</td>
                                <td id="serviceOnetime{{$service->id}}">{{ $service->one_time }}</td>
                                <td id="serviceRecurring{{$service->id}}">{{ $service->recurring }}</td>
                                <td>
                                    <a href="#!" class="btn btn-icon btn-primary mr-1" data-toggle="tooltip" title="Edit" onclick="editService({{ $service}})"><i class="feather icon-edit-2"></i></a>
                                    <a href="#!" class="btn btn-icon btn-danger mr-1" data-toggle="tooltip" title="Delete" onclick="deleteService({{ $service->id }},{{$key}})"><i class="feather icon-trash-2"></i></a>
                                </td>
                            </tr>
                            @endforeach                                                   
                        </tbody>
                    </table>
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
    <script src="{{ asset('assets/js/demo/demo.datatable-init.js') }}"></script>
    <!-- end demo js-->

    <!-- custom app -->
    <script>
        var all_services=@json($services);
        var indexKey;
        console.log(all_services[0]);

        $(".btn_newService").click(function(){
            $("#serviceModal").modal();     
            $("#edit_serviceID").val("");
            $("#edit_serviceName").val("");
            $("#edit_serviceOnetime").val("");
            $("#edit_serviceRecurring").val("");    
        });
  
        function editService(data){
            var id =data.id;
            objectFindByKey(all_services,'id',id);
            var name =data.name;
            var one_time =data.one_time;
            var recurring =data.recurring;
            $("#edit_serviceID").val(id);
            $("#edit_serviceName").val(name);
            $("#edit_serviceOnetime").val(one_time);
            $("#edit_serviceRecurring").val(recurring);
            $("#serviceModal").modal();  
        }

        function deleteService(id,key) {
            var del_avail = objectFindByKey(all_services,'id',id);
            var del_id;     
            del_id = del_avail['id'];
            
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
                    $.get("{{ route('admin.settings.postDelService') }}",{id:del_id},function (data) {
                        if(data!=false){
                            var removed = all_services.splice(key,1);
                            allServiceTableMake(all_services);           
                        }
                        else{
                            alert("Warning!");
                        }                            
                    });    
                }
            });       
        }

        $(".btn_saveChange").click(function(){
            var edit_id,edit_name,edit_onetime,edit_recurring,addTr;
            edit_id = $("#edit_serviceID").val();
            edit_name = $("#edit_serviceName").val();
            edit_onetime = $("#edit_serviceOnetime").val();
            edit_recurring = $("#edit_serviceRecurring").val();

            if($("#edit_serviceID").val().length == 0){
                $.get("{{ route('admin.settings.postNewService') }}",
                    {
                        name:edit_name,
                        one_time:edit_onetime,
                        recurring:edit_recurring,
                    },
                    function (data) {
                        if(data!="false"){
                            $("#serviceModal").modal('toggle');
                            addTr="";
                            all_services.push(data);
                            allServiceTableMake(all_services);
                        }
                        else{ 
                            console.log(data);                           
                            //alert("Warning!");
                        }                                
                }); 
            }
            else{
                $.get("{{ route('admin.settings.postEditService') }}",
                {
                    id:edit_id,
                    name:edit_name,
                    one_time:edit_onetime,
                    recurring:edit_recurring,
                },
                function (data) {
                    if(data!=false){  
                        $("#serviceModal").modal('toggle');
                        all_services[indexKey] = data;
                        allServiceTableMake(all_services);   
                    }
                    else{
                        alert("Warning!");
                    }
                }); 
            }  
        });

        function allServiceTableMake(data){

            var addTR = "";
            for(var i =0;i<data.length;i++)
            {
                addTR+="<tr><td>"+(i+1)+"</td>";
                addTR+="<td id='serviceName"+data[i].id+"'>"+data[i].name+"</td>";
                addTR+="<td id='serviceOnetime"+data[i].id+"'>"+data[i].one_time+"</td>";
                addTR+="<td id='serviceRecurring"+data[i].id+"'>"+data[i].recurring+"</td>";
                addTR+="<td><a href='#!' class='btn btn-icon btn-primary mr-1' data-toggle='tooltip' title='Edit' onClick='editService("+JSON.stringify(data[i])+")'><i class='feather icon-edit-2'></i></a>";
                addTR+="<a href='#!' class='btn btn-icon btn-danger mr-1' data-toggle='tooltip' title='Delete' onClick='deleteService("+data[i].id+","+i+")'><i class='feather icon-trash-2'></i></a>";
                addTR+="</td></tr>";
            }
            $("#addServiceTR").html(addTR);
        }

        function objectFindByKey(array, key, value) {
            for (var i = 0; i < array.length; i++) {
                if (array[i][key] === value) {
                        indexKey = i;
                    return array[i];
                }
            }
            return null;
        }

    </script>
    <!-- custom app ends -->

@endsection