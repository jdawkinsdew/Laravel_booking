@extends('admin.layouts.master')

@section('style')
 <!-- third party css -->
 <style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
    <link href="{{ asset('assets/css/vendor/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/vendor/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/vendor/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/vendor/select.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.css" rel="stylesheet') }}" type="text/css" />
@endsection

@section('content')

        <div id="UserModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">User Settings</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <form>
                        <div class="modal-body">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="User Name">User Name</label>
                                                <input type="text" class="form-control" id="edit_userID" aria-describedby="emailHelp" placeholder="Enter Name" style="display:none;">
                                                <input type="text" class="form-control" id="edit_userName" aria-describedby="emailHelp" placeholder="Enter Name">
                                                {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Email</label>
                                                <input type="text" class="form-control" id="edit_userEmail" placeholder="Enter Email">
                                            </div>
                                                <div class="form-group">
                                                <label for="exampleInputPassword1">Phone</label>
                                                <input type="text" class="form-control" id="edit_userPhone" placeholder="Enter Phone">
                                            </div>
                                            <div class="form-group" style="margin-bottom: 9px;">
                                                <label for="">Active</label>
                                            </div>
                                            <div class="form-group">            
                                                <input type="checkbox" id="edit_userRememberToken" checked="" data-switch="primary">
                                                <label for="edit_userRememberToken" data-on-label="On" data-off-label="Off" class="mb-0"></label>
                                                </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Role</label>
                                                        <select class="form-control" id="edit_userRole"  placeholder="Select Role">
                                                        <option value="1">Admin</option>
                                                        <option value="2">Service Provider</option>
                                                        <option value="3">Clients</option>
                                                    </select>
                                                {{-- <input type="text" class="form-control"  placeholder="Select Role"> --}}
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
 <!-- Start Content-->
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
                        <h4 class="page-title">Users</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            
            <div class="row">                     
                <div class="col-12">
                    <div class="card sale-card">
                        <div class="card-header">
                            <div class="row">                            
                                    <div class="col-sm-2"><h3>All Users</h3></div>                                                                                                        
                                    <div class="col-sm-8"></div> 
                                    <div class="col-sm-2">
                                        <button type='button' class='btn_newUser btn btn-success float-right' style="margin-top:10px;"><i class='feather icon-plus'></i>Add</button>
                                    </div>
                                </div>
                        </div>
                        <div class="card-body">
                            <table id="basic-datatable" class="table table-bordered table-hover dt-responsive nowrap" width="100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Active</th>
                                        <th>Role</th>
                                        <th style="width:100px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="addServiceTR">
                                    @foreach($users as $key => $user)    
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td id="userName{{$user->id}}">{{ $user->name }}</td>
                                            <td id="userEmail{{$user->id}}">{{ $user->email }}</td>
                                            <td id="userPhone{{$user->id}}">{{ $user->phhone }}</td>
                                            <td id="userActive{{$user->id}}">{{ $user->active }}</td>

                                        @switch($user->role_id)
                                            @case(1):   
                                            <td id="userRole{{$user->id}}">Administrator</td>
                                            @break
                                            @case(2):   
                                            <td id="userRole{{$user->id}}">Service Provider</td>
                                            @break
                                            @case(3):   
                                            <td id="userRole{{$user->id}}">Client</td>
                                            @break
                                            @endswitch                                                     
                                            <td>
                                                <a href="#!" class="btn btn-icon btn-primary mr-1" data-toggle="tooltip" title="Edit" onclick="editUser({{$user}})"><i class="feather icon-edit-2"></i></a>
                                                <a href="#!" class="btn btn-icon btn-danger mr-1" data-toggle="tooltip" title="Delete" onclick="deleteUser({{ $user->id }},{{$key}})"><i class="feather icon-trash-2"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach                                                   
                                </tbody>
                            </table>
                        </div>               
                    </div>
                </div>
            </div>
        <!-- Data widget end -->
        </div> <!-- container -->



  
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
        var all_users=@json($users);
        var indexKey;
    $(".btn_newUser").click(function(){
        $("#UserModal").modal();     
        $("#edit_userID").val("");
        $("#edit_userName").val("");
        $("#edit_userEmail").val("");
        $("#edit_userPhone").val("");   
        $("#edit_userRememberToken").prop("checked",false);
    });
  
     function editUser(data){
         var id =data.id;
         objectFindByKey(all_users,'id',id);
         var name =data.name;
         var email =data.email;
         var phone =data.phhone;
         var active =data.active;
         var role_id = data.role_id;
           $("#edit_userID").val(id);
            $("#edit_userName").val(name);
            $("#edit_userEmail").val(email);
            $("#edit_userPhone").val(phone);
            $("#edit_userRememberToken").prop("checked",active);
            $("#edit_userRole").val(role_id);
            $("#UserModal").modal();  
       }

     function deleteUser(id,key)
     {
         var del_avail = objectFindByKey(all_users,'id',id);
         var del_id;     
         del_id = del_avail['id'];
                $.get("{{ route('admin.settings.postDelUser') }}",{id:del_id},function (data) {
                            if(data!=false){
                           var removed = all_users.splice(key,1);
                               allServiceTableMake(all_users);           
                            }
                            else{
                            alert("Warning!");
                            }                            
               });     
     }

       $(".btn_saveChange").click(function(){
             var edit_id,edit_uName,edit_uEmail,edit_uPhone,edit_uRole,edit_rememberToken,addTr;
             edit_id = $("#edit_userID").val();
             edit_uName = $("#edit_userName").val();
             edit_uEmail = $("#edit_userEmail").val();
             edit_uPhone = $("#edit_userPhone").val();
             if($("#edit_userRememberToken").is(':checked'))
             edit_rememberToken =1;
             else 
             edit_rememberToken =0;             
            //  edit_rememberToken =$("#edit_userRememberToken").is(':checked');
             edit_uRole = $("#edit_userRole").val();
             if($("#edit_userID").val().length == 0){
                    $.get("{{ route('admin.settings.postNewUser') }}",
                            {
                                name:edit_uName,
                                email:edit_uEmail,
                                phone:edit_uPhone,
                                role_id:edit_uRole,
                                username:"3r3r",
                                password:"3r3",
                                active:edit_rememberToken,
                                remember_token:"6p.Av6iCc6ceTx6.X4tbwe8DOqTWrb3dvS",
                            },
                            function (data) {
                                if(data!="false"){
                                $("#UserModal").modal('toggle');
                                addTr="";
                                all_users.push(data);
                                allServiceTableMake(all_users);
                                }
                                else{
                                alert("Warning!");
                                }                                
                        }); 
                        }
                        else{
                            $.get("{{ route('admin.settings.postEditUser') }}",
                            {
                                id:edit_id,
                                name:edit_uName,
                                email:edit_uEmail,
                                phone:edit_uPhone,
                                role_id:edit_uRole,
                                username:"3r3r",
                                password:"3r3",
                                active:edit_rememberToken,
                                remember_token:"6p.Av6iCc6ceTx6.X4tbwe8DOqTWrb3dvS",
                            },
                            function (data) {
                                if(data!="false"){                                  
                                 $("#UserModal").modal('toggle');
                                 all_users[indexKey] = data;
                                 allServiceTableMake(all_users);   
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
                    addTR+="<td id='userName"+data[i].id+"'>"+data[i].name+"</td>";
                    addTR+="<td id='userEmail"+data[i].id+"'>"+data[i].email+"</td>";
                    addTR+="<td id='userPhone"+data[i].id+"'>"+data[i].phhone+"</td>"; 
                    addTR+="<td id='userActive"+data[i].id+"'>"+data[i].active+"</td>"; 
                   var role;               
                    if(data[i].role_id==1)
                    {
                     role = "Administrator";
                    }else if(data[i].role_id==2)
                    {
                         role = "Service Provider";
                    }else if(data[i].role_id==3)
                    {
                        role = "Client";
                    }
                    addTR+="<td id='userRole"+data[i].id+"'>"+role+"</td>";
                        console.log(data[i].active);
                    addTR+="<td><a href='#!' class='btn btn-icon btn-primary mr-1' data-toggle='tooltip' title='Edit' onClick='editUser("+JSON.stringify(data[i])+")'><i class='feather icon-edit-2'></i></a>";
                    addTR+="<a href='#!' class='btn btn-icon btn-danger mr-1' data-toggle='tooltip' title='Delete' onClick='deleteUser("+data[i].id+","+i+")'><i class='feather icon-trash-2'></i></a>";
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
@endsection