@extends('admin.layouts.master')

@section('style')
    <style>
        table th, table td {vertical-align: middle !important;text-align: center;}
    </style>
    <link href="{{ asset('assets/css/vendor/summernote-bs4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.css" rel="stylesheet') }}" type="text/css" />
@endsection

@section('page_title') User Management @endsection

@section('content')

    <!-- Start Main content -->
    <div class="row">                     
        <div class="col-md-6">
            <div class="card sale-card">
                <div class="card-header">
                    <h3>Profile</h3>       
                </div>
                <form class="m-form" id="profile_form">
                    @csrf
                    <div class="card-body p-40">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="username">Username:</label>
                                    <input type="text" class="form-control m-input" id="username" name="username" value="{{$user->username}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group m-form__group">
                                    <label for="name">Full Name:</label>
                                    <input type="text" class="form-control m-input" id="name" name="name" value="{{$user->name}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="username">Phone:</label>
                                    <input type="text" class="form-control m-input" id="phone" name="phone" placeholder="000-000-0000" data-toggle="input-mask" data-mask-format="000-000-0000" value="{{$user->phone}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label class="mb-1" for="phoneNumber">Zip Code</label>
                                    <input name="zipcode" class="form-control" type="text" id="zip_code" name="zip_code" placeholder="0-00-00-00" data-toggle="input-mask" data-mask-format="0-00-00-00" value="{{$user->zip_code}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group m-form__group">
                                    <label for="email">Email Address:</label>
                                    <input type="email" class="form-control m-input" id="email" name="email" value="{{$user->email}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group m-form__group">
                                    <label for="email_verified">Verified?</label>
                                    <select class="form-control m-bootstrap-select m_selectpicker" id="email_verified" name="email_verified">
                                        <option value="1" @if($user->email_verified_at!=null) selected @endif>Verified</option>
                                        <option value="0" @if($user->email_verified_at==null) selected @endif>Unverified</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image" class="form-control-label">Avatar:</label>
                            <input type="file" accept="image/*" class="form-control" name="image" id="image"></textarea>
                            <a href="#" style="width:250px;height:250px;border-radius:50%;border:1px solid grey;display:inline-block;overflow:hidden;position:relative;padding:0px;">
                                <img id="image_upload_output" class="image_upload_output" src="{{asset('uploads/avatar/'.$user->avatar)}}" style="width:100%"/>
                            </a>
                        </div>
                        <div class="form-group m-form__group">
                            <label for="about">About:</label>
                            <div id="summernote-basic" >{{$user->about}}</div>                            
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group m-form__group">
                                    <label for="status">Status</label>
                                    <select class="form-control m-bootstrap-select m_selectpicker" id="status" name="status">
                                        <option value="1" @if($user->status=='active') selected @endif>Active</option>
                                        <option value="0" @if($user->status!='active') selected @endif>Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group m-form__group">
                                    <label for="email_verified">Role</label>
                                    <select class="form-control m-bootstrap-select m_selectpicker" id="role" name="role">
                                        <option value="1" @if($user->role_id==1) selected @endif>Super Admin</option>
                                        <option value="2" @if($user->role_id==2) selected @endif>Admin</option>
                                        <option value="3" @if($user->role_id==3) selected @endif>Manager</option>
                                        <option value="4" @if($user->role_id==4) selected @endif>Service Provider</option>
                                        <option value="5" @if($user->role_id==5) selected @endif>Client</option>
                                    </select>
                                </div>
                            </div>
                        </div>           
                        <div class="mt-3 text-right">
                            <button type="submit" id="edit_profile" class="btn btn-success">Submit</button>
                        </div>                   
                    </div>
                </form> 
            </div>
        </div>
        <div class="col-md-6">
            <div class="card sale-card">
                <div class="card-header">
                    <h3>Password Change</h3>                        
                </div>
                <form class="m-form" id="credential_form">
                    @csrf
                    <div class="card-body">
                        <div class="form-group m-form__group">
                            <label for="new_password">New Password:</label>
                            <input type="password" class="form-control m-input" name="new_password" id="new_password" name="new_password">
                        </div>
                        <div class="form-group m-form__group">
                            <label for="confirm_password">Confirm Password:</label>
                            <input type="password" class="form-control m-input" id="confirm_password" name="confirm_password">
                        </div>
                        <div class="mt-3 text-right">
                            <button type="submit" class="btn btn-info" id = "change_password">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Ends Main content -->

@endsection

@section('script')

    <!-- Summernote js -->
    <script src="{{ asset('assets/js/vendor/summernote-bs4.min.js')}}"></script>
    <script src="{{ asset('assets/js/demo/demo.summernote.js')}}"></script>
    <!-- End Summernote js -->

    <!-- custom js -->
    <script>

        $(document).ready(function() {
            $('#summernote-basic').summernote();
        });

        $("#image").change(function(){
             var reader = new FileReader();
             reader.onload = function()
             {
                 var output = document.getElementById('image_upload_output');
                 output.src = reader.result;
             }
             reader.readAsDataURL(event.target.files[0]);
        });

        $('#profile_form').on('submit', function(event) {
            event.preventDefault();
            var about = $('#summernote-basic').summernote('code');
            var formData = new FormData(this);
            $('#summernote-basic').summernote('destroy');
            formData.append("about", about);
                var url = "{{route('admin.settings.user_manage.profileupdate',$user->username)}}";
            $.ajax({
                url:url,
                method: 'POST',
                data:formData,
                dataType:'JSON',
                contentType:false,
                cache:false,
                processData:false,
                success: function(result)
                {
                    if(result.errors)
                    { console.log(result);
                        for(var key in result.errors)
                        {
                            var error = result.errors[key];
                            toastr.error(error);
                        }
                    }else {
                        console.log(result);
                        toastr.success('Successfully Updated!');
                        //window.location.href = "{{route('admin.settings.user_manage.index')}}";
                    }

                },
                error: function(data)
                {
                    toastr.error(data);
                }
            });

        });  

        $('#credential_form').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                url: "{{route('admin.settings.user_manage.passwordupdate', $user->username)}}",
                method: 'POST',
                data: new FormData(this),
                dataType:'JSON',
                contentType:false,
                cache:false,
                processData:false,
                success: function(result)
                {
                    if(result.errors)
                    {
                        for(var key in result.errors)
                        {
                            var error = result.errors[key];
                            toastr.error(error);
                        }
                    } else {
                        toastr.success('Successfully Updated!');
                        window.location.href = "{{route('admin.settings.user_manage.index')}}";
                    }
                },
                error: function(data)
                {
                    toastr.error(data);
                }
            });
        });  
        
    </script>
    <!-- end custom js -->

@endsection
