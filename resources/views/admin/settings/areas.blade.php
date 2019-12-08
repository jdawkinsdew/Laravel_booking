@extends('admin.layouts.master')

@section('style')
 <!-- third party css -->
    <link href="{{ asset('assets/css/vendor/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/vendor/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/vendor/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/vendor/select.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.css" rel="stylesheet') }}" type="text/css" />
@endsection

@section('page_title') Area Setting @endsection

@section('content')
                    
    <!-- Start Modal -->
    <div id="managedAreaModel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
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
                                        <label for="Service Name">Area Name</label>
                                        <input type="text" class="form-control" id="edt_mArea" aria-describedby="emailHelp" placeholder="Enter Name" style="display:none;">
                                        <input type="text" class="form-control" id="edit_mArea" aria-describedby="emailHelp" placeholder="Enter Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Zip Code</label>
                                        <input type="text" class="form-control" id="edit_mAreasZipCode" placeholder="0-00-00-00" data-toggle="input-mask" data-mask-format="0-00-00-00">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Color</label>
                                        <input id="edit_mAreaColor" type="color" style="width:424px;height:40px;" value="#1231FF"/></div>
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
            </div>
        </div>
    </div>
    <!-- Ends Modal -->

    <!-- Start Main Content -->
    <div class="row">
        <div class="col-12">
            <div class="card sale-card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-12">
                            <span style="font-weight:700;font-size:1.6rem;">Providers</span>                                                                                                        
                            <a href='#!' class='btn_newManagedarea btn btn-success float-right' data-toggle='tooltip' style="float:right;"><i class='feather icon-file-plus display-5'>Add</i></a></div>
                        </div>                            
                    </div>
                    <div class="card-body p-40">
                        <div class="table-responsive-md">                                   
                            <table id="datatable-buttons" class="table table-bordered table-hover text-center">
                                <thead class="thead-light">
                                <tr>
                                        <th>ID</th>
                                        <th>Area Name</th>
                                        <th>Zip Code</th>
                                        <th>Color</th>
                                        <th style="width:100px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="addServiceTR">
                                    @foreach($managedareas as $key => $managedarea)    
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td id="mArea{{$managedarea->id}}">{{ $managedarea->name }}</td>
                                        <td id="mAreasZipCode{{$managedarea->id}}">{{ $managedarea->zip_code }}</td>
                                        <td id="mAreaColor{{$managedarea->id}}">{{ $managedarea->color }}</td>
                                        <td>
                                            <a href="#!" class="btn btn-icon btn-primary mr-1" data-toggle="tooltip" title="Edit" onclick="editManagedarea({{ $managedarea}})"><i class="feather icon-edit-2"></i></a>
                                            <a href="#!" class="btn btn-icon btn-danger mr-1" data-toggle="tooltip" title="Delete" onclick="deleteManagedarea({{ $managedarea->id }},{{$key}})"><i class="feather icon-trash-2"></i></a>
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

    <script>

        var all_managedareas=@json($managedareas);
        var indexKey;

        $(".btn_newManagedarea").click(function(){
            $("#managedAreaModel").modal();     
            $("#edt_mArea").val("");
            $("#edit_mAreasZipCode").val("");
            $("#edit_mAreaColor").val("#1231FF");    
        });

        function editManagedarea(data){
            var id =data.id;
            objectFindByKey(all_managedareas,'id',id);
            var name =data.name;
            var zip_code =data.zip_code;
            var color =data.color;
                $("#edt_mArea").val(id);
                $("#edit_mArea").val(name);
                $("#edit_mAreasZipCode").val(zip_code);
                $("#edit_mAreaColor").val(color);
                $("#managedAreaModel").modal();  
        }

        function deleteManagedarea(id, key){

            var del_avail = objectFindByKey(all_managedareas,'id',id);
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
                        $.get("{{ route('admin.settings.postDelManagedAreas') }}",{id:del_id},function (data){
                                if(data!=false){
                                    location.reload();        
                                }
                                else{
                                    alert("Warning!");
                                }                            
                        });    
                    }
                }); 
            }

            $(".btn_saveChange").click(function(){

                var edit_id, edit_name, edit_zipcode, edit_color, addTr;

                edit_id = $("#edt_mArea").val();
                edit_name = $("#edit_mArea").val();
                edit_zipcode = $("#edit_mAreasZipCode").val();
                edit_color = $("#edit_mAreaColor").val();   
                        
                if($("#edt_mArea").val().length == 0){
                    $.get("{{ route('admin.settings.postNewManagedAreas') }}",
                        {
                            name:edit_name,
                            zip_code:edit_zipcode,
                            color:edit_color,
                        },
                        function (data) {
                            if(data!=false){
                                $("#managedAreaModel").modal('toggle');
                                location.reload();
                            }
                            else{
                                alert("Warning!");
                            }                                
                    }); 
                }
                else{
                    $.get("{{ route('admin.settings.postEditManagedAreas') }}",
                        {
                            id:edit_id,
                            name:edit_name,
                            zip_code:edit_zipcode,
                            color:edit_color,
                        },
                        function (data) {
                            if(data!=false){  
                                console.log(data.edit_color);
                                $("#managedAreaModel").modal('toggle');
                            location.reload();
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
                    addTR+="<td id='mArea"+data[i].id+"'>"+data[i].name+"</td>";
                    addTR+="<td id='mAreasZipCode"+data[i].id+"'>"+data[i].zip_code+"</td>";
                    addTR+="<td id='mAreaColor"+data[i].id+"'>"+data[i].color+"</td>";
                    addTR+="<td><a href='#!' class='btn btn-icon btn-primary mr-1' data-toggle='tooltip' title='Edit' onClick='editManagedarea("+JSON.stringify(data[i])+")'><i class='feather icon-edit-2'></i></a>";
                    addTR+="<a href='#!' class='btn btn-icon btn-danger mr-1' data-toggle='tooltip' title='Delete' onClick='deleteManagedarea("+data[i].id+","+i+")'><i class='feather icon-trash-2'></i></a>";
                    addTR+="</td></tr>";
                }

                $("#addServiceTR").html(addTR);

            }

            function objectFindByKey(array, key, value){
                for (var i = 0; i < array.length; i++) {
                    if (array[i][key] === value) {
                        indexKey = i;
                        return array[i];
                    }
                }
                return null;
            }
        }

    </script>
@endsection