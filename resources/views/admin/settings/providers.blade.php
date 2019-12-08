@extends('admin.layouts.master')

@section('style')
 <!-- third party css -->
    <link href="{{ asset('assets/css/vendor/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/vendor/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/vendor/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/vendor/select.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.css" rel="stylesheet') }}" type="text/css" />
@endsection

@section('page_title') Service Provider @endsection

@section('content')

    <!-- Edit Modal -->
    <div id="providerModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                            <label for="Service Name">Provider Name</label>
                                            <input type="text" class="form-control" id="edit_providerID" aria-describedby="emailHelp" placeholder="Enter Name" style="display:none;">
                                            <input type="text" class="form-control" id="edit_providerName" aria-describedby="emailHelp" placeholder="Enter Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Email</label>
                                            <input type="text" class="form-control" id="edit_providerEmail" placeholder="Enter Email">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Phone</label>
                                            <input type="text" class="form-control" id="edit_providerPhone" placeholder="000-000-0000" data-toggle="input-mask" data-mask-format="0000-000-0000">
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
                </form>
            </div>
        </div>
    </div>
    <!-- Ends Edit Modal -->
                    
    <!-- Start Main Content -->
    <div class="row">
        <div class="col-12">
            <div class="card sale-card">
                <div class="card-header">
                    <div class="row">                            
                    <div class="col-sm-2"><h3>Providers</h3></div>                                                                                                        
                    <div class="col-sm-8"></div> 
                    <div class="col-sm-2">
                    <a href='#!' class='btn_newProvider btn btn-success float-right' data-toggle='tooltip'><i class='feather icon-file-plus display-5'>Add</i></a></div>
                </div>                                      
            </div>
            <div class="card-body p-40">
                <div class="table-responsive-md">
                    <table id="datatable-buttons" class="table table-bordered table-hover text-center">
                        <thead class="thead-light">
                            <tr>
                                <th>Provider ID</th>
                                <th>Provider Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th style="width:100px;">Action</th>
                            </tr>
                        </thead>
                        <tbody id="addProviderTR">
                            @foreach($providers as $key => $provider)    
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td id="providerName{{$provider->id}}">{{ $provider->name }}</td>
                                <td id="providerEmail{{$provider->id}}">{{ $provider->email }}</td>
                                <td id="providerPhone{{$provider->id}}">{{ $provider->phone }}</td>
                                <td>
                                    <a href="{{ route('admin.settings.serivce_providers',['id' => $provider->id])}}" class="btn btn-icon btn-success mr-1" data-toggle="tooltip" title="Detail"><i class="feather icon-eye"></i></a>
                                    <a href="#!" class="btn btn-icon btn-primary mr-1" data-toggle="tooltip" title="Edit" onclick="editProvider({{ $provider}})"><i class="feather icon-edit-2"></i></a>
                                    <a href="#!" class="btn btn-icon btn-danger mr-1" data-toggle="tooltip" title="Delete" onclick="deleteProvider({{ $provider->id }},{{$key}})"><i class="feather icon-trash-2"></i></a>
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
    <script>
        var all_providers=@json($providers);
        var indexKey;     
    $(".btn_newProvider").click(function(){
        $("#providerModal").modal();     
        $("#edit_providerID").val("");
        $("#edit_providerName").val("");
        $("#edit_providerEmail").val("");
        $("#edit_providerPhone").val("");    
    });
  
     function editProvider(data){
         var id =data.id;
         objectFindByKey(all_providers,'id',id);
         var name =data.name;
         var email =data.email;
         var phone =data.phone;
            $("#edit_providerID").val(id);
            $("#edit_providerName").val(name);
            $("#edit_providerEmail").val(email);
            $("#edit_providerPhone").val(phone);
            $("#providerModal").modal();  

            console.log(all_providers[0]["name"]);
     }

     function deleteProvider(id,key)
     {
         var del_avail = objectFindByKey(all_providers,'id',id);
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
                    $.get("{{ route('admin.settings.postDelProvider') }}",{id:del_id},function (data) {
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
             var edit_id,edit_name,edit_pEmail,edit_pPhone,addTr;
             edit_id = $("#edit_providerID").val();
             edit_name = $("#edit_providerName").val();
             edit_pEmail = $("#edit_providerEmail").val();
             edit_pPhone = $("#edit_providerPhone").val();
             if($("#edit_providerID").val().length == 0){
                    $.get("{{ route('admin.settings.postNewProvider') }}",
                            {
                                name:edit_name,
                                email:edit_pEmail,
                                phone:edit_pPhone,
                            },
                            function (data) {
                                if(data!=false){
                                $("#providerModal").modal('toggle');
                                 location.reload();
                                }
                                else{
                                alert("Warning!");
                                }                                
                        }); 
                        }
                        else{
                            $.get("{{ route('admin.settings.postEditProvider') }}",
                            {
                                id:edit_id,
                                name:edit_name,
                                email:edit_pEmail,
                                phone:edit_pPhone,
                            },
                            function (data) {
                                if(data!=false){  
                                 $("#providerModal").modal('toggle');
                                       location.reload();
                                }
                                else{
                                alert("Warning!");
                                }                                        
                                }); 
                        }  
        });

        function allProviderTableMake(data){
                var addTR = "";
                for(var i =0;i<data.length;i++)
                {
                    addTR+="<tr><td>"+(i+1)+"</td>";
                    addTR+="<td id='serviceName"+data[i].id+"'>"+data[i].name+"</td>";
                    addTR+="<td id='serviceOnetime"+data[i].id+"'>"+data[i].email+"</td>";
                    addTR+="<td id='servicephone"+data[i].id+"'>"+data[i].phone+"</td>";
                    addTR+="<td><a href='{{ route('admin.settings.serivce_providers',['id'=>"+parseInt(tdata[i].id)+"])}}' class='btn btn-icon btn-success mr-1' data-toggle='tooltip' title='Detail'><i class='feather icon-eye'></i></a>";
                    addTR+="<a href='' class='btn btn-icon btn-primary mr-1' data-toggle='tooltip' title='Edit' onClick='editProvider("+JSON.stringify(data[i])+")'><i class='feather icon-edit-2'></i></a>";
                    addTR+="<a href='' class='btn btn-icon btn-danger mr-1' data-toggle='tooltip' title='Delete' onClick='deleteProvider("+data[i].id+","+i+")'><i class='feather icon-trash-2'></i></a>";
                    addTR+="</td></tr>";
                }
                     $("#addProviderTR").html(addTR);
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
@endsection