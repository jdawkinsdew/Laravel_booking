@extends('admin.layouts.master')

@section('style')
 <!-- third party css -->
    <link href="{{ asset('assets/css/vendor/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/vendor/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/vendor/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/vendor/select.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.css" rel="stylesheet') }}" type="text/css" />
@endsection

@section('page_title') Service Add on Setting @endsection

@section('content')
            
    <!-- Start Main Content -->
    <div class="row">                     
        <div class="col-12">
            <div class="card sale-card">
                <div class="card-header">
                    <div class="row"> 
                        <div class="col-12">
                            <span style="font-weight:700;font-size:1.6rem">Service Add On</span>
                            <button type='button' class='btn_newService btn btn-success float-right'><i class='feather icon-plus'></i>Add</button>
                        </div>                           
                    </div>                               
                </div>
                <div class="card-body p-40">
                    <div class="table-responsive-md">                                   
                        <table id="datatable-buttons" class="table table-bordered table-hover text-center">
                            <thead class="thead-light">
                                <tr>
                                    <th>Service ID</th>
                                    <th>Service</th>
                                    <th>Cost</th>
                                    <th style="width:100px;">Action</th>
                                </tr>
                            </thead>
                            <tbody id="addServiceTR">
                                @foreach($services as $key => $service)    
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td id="serviceName{{$service->id}}">{{ $service->addService }}</td>
                                    <td id="serviceOnetime{{$service->id}}">{{ $service->cost }}</td>
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
    </div>
    <!-- Ends Main Content -->

    <!-- Service Add on Edit Modal -->
    <div id="serviceModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Provider Settings</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="Service Name">Service Name</label>
                                            <input type="text" class="form-control" id="edit_serviceID" aria-describedby="emailHelp" placeholder="Enter Name" style="display:none;">
                                            <input type="text" class="form-control" id="edit_serviceName" aria-describedby="emailHelp" placeholder="Enter Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Cost</label>
                                            <input type="text" class="form-control" id="edit_serviceOnetime" placeholder="Enter Price">
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn_saveChange btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Ends Service Add on Edit Modal -->

@endsection

@section('script')
    <!-- third party js -->
    <!-- Apex js -->
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

    <!-- custom js -->
    <script>

        var all_services=@json($services);
        var indexKey;

        $(".btn_newService").click(function(){
            $("#serviceModal").modal();     
            $("#edit_serviceID").val("");
            $("#edit_serviceName").val("");
            $("#edit_serviceOnetime").val("");
        });
  
        function editService(data){

            var id =data.id;
            objectFindByKey(all_services,'id',id);

            var addService =data.addService;
            var cost =data.cost;

            $("#edit_serviceID").val(id);
            $("#edit_serviceName").val(addService);
            $("#edit_serviceOnetime").val(cost);
            $("#serviceModal").modal();  
        }

        function deleteService(id,key){

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
            }).then((result) =>{
                if (result){
                    event.preventDefault();                     
                    $.get("{{ route('admin.settings.postDelAddOnService') }}",{id:del_id},function (data) {
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

            var edit_id, edit_name, edit_onetime, edit_recurring, addTr;

            edit_id = $("#edit_serviceID").val();
            edit_name = $("#edit_serviceName").val();
            edit_onetime = $("#edit_serviceOnetime").val();

            if($("#edit_serviceID").val().length == 0){
                $.get("{{ route('admin.settings.postNewAddOnService') }}",
                    {
                        addService:edit_name,
                        cost:edit_onetime,
                    },
                    function (data){
                        if(data!="false"){
                            $("#serviceModal").modal('toggle');
                            addTr="";
                            all_services.push(data);
                            allServiceTableMake(all_services);
                        }
                    }); 
            }
            else{
                $.get("{{ route('admin.settings.postEditAddOnService') }}",
                {
                    id:edit_id,
                    addService:edit_name,
                    cost:edit_onetime,
                },
                function (data){
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

            for(var i =0;i<data.length;i++){
                addTR+="<tr><td>"+(i+1)+"</td>";
                addTR+="<td id='serviceName"+data[i].id+"'>"+data[i].addService+"</td>";
                addTR+="<td id='serviceOnetime"+data[i].id+"'>"+data[i].cost+"</td>";
                addTR+="<td><a href='#!' class='btn btn-icon btn-primary mr-1' data-toggle='tooltip' title='Edit' onClick='editService("+JSON.stringify(data[i])+")'><i class='feather icon-edit-2'></i></a>";
                addTR+="<a href='#!' class='btn btn-icon btn-danger mr-1' data-toggle='tooltip' title='Delete' onClick='deleteService("+data[i].id+","+i+")'><i class='feather icon-trash-2'></i></a>";
                addTR+="</td></tr>";
            }
            $("#addServiceTR").html(addTR);
        }

        function objectFindByKey(array, key, value){
            for (var i = 0; i < array.length; i++){
                if (array[i][key] === value) {
                    indexKey = i;
                    return array[i];
                }
            }
            return null;
        }

    </script>
    <!-- end custom js -->
    
@endsection