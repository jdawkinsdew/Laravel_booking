@extends('admin.layouts.master')

@section('style')

    <style>
        table th, table td {vertical-align: middle !important;text-align: center;}
    </style>

    <link href="{{ asset('assets/css/vendor/summernote-bs4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.css" rel="stylesheet') }}" type="text/css" />

@endsection

@section('page_title') New user Profile Setting @endsection

@section('content')

    <!-- Main content -->
    <div class="row"> 
        <div class="col-12">
            <div class="card sale-card">
                <form class="m-form" id="profile_form" method = "POST">
                    @csrf   
                    <div class="card-header">
                        <h3> New User Profile</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="username">Username(Unique):</label>
                                            <input type="text" class="form-control m-input" id="username" name="username">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group m-form__group">
                                            <label for="name">Full Name:</label>
                                            <input type="text" class="form-control m-input" id="name" name="name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="username">Phone:</label>
                                            <input type="text" class="form-control m-input" id="phone" name="phone" placeholder="000-000-0000" data-toggle="input-mask" data-mask-format="0000-000-0000">
                                        </div>
                                    </div>                                     
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label class="mb-1" for="phoneNumber">Zip Code</label>
                                            <input name="zipcode" class="form-control" type="text" id="zip_code" name="zip_code" placeholder="0-00-00-00" data-toggle="input-mask" data-mask-format="0-00-00-00">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group m-form__group">
                                    <label for="email_verified">Role</label>
                                    <select class="form-control m-bootstrap-select m_selectpicker" id="role_id" name="role_id">
                                        <option value="1">Super Admin</option>
                                        <option value="2">Admin</option>
                                        <option value="3">Manager</option>
                                        <option value="4">Service Provider</option>
                                        <option value="5">Client</option>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group m-form__group">
                                            <label for="email">Email Address:</label>
                                            <input type="email" class="form-control m-input" id="email" name="email">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group m-form__group">
                                            <label for="email_verified">Verified?</label>
                                            <select class="form-control m-bootstrap-select m_selectpicker" id="email_verified" name="email_verified">
                                                <option value="1">Verified</option>
                                                <option value="0">Unverified</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="image" class="form-control-label">Avatar:</label>
                                    <input type="file" accept="image/*" class="form-control" name="image" id="image"></textarea>
                                    <img id="image_upload_output" class="image_upload_output mt-4 profile-image-panel" src="{{asset('uploads/avatar/default.jpg')}}" style="max-width:200px;"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group m-form__group">
                                    <label for="password">Password:</label>
                                    <input type="password" class="form-control m-input" name="password" id="password" name="password">
                                </div>
                                <div class="form-group m-form__group">
                                    <label for="confirm_password">Confirm Password:</label>
                                    <input type="password" class="form-control m-input" id="confirm_password" name="confirm_password">
                                </div>
                                <div class="form-group">
                                    <label for="about">About:</label>
                                    <div id="summernote-basic" name="about"></div>                            
                                </div>
                                <div class="form-group m-form__group">
                                    <label for="status">Status</label>
                                    <select class="form-control m-bootstrap-select m_selectpicker" id="status" name="status">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                                <div class="mt-3 text-right">
                                    <button type="submit" id="submit_btn" class="btn btn-info">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Ends main content -->
      
@endsection

@section('script')

    <!-- Summernote js -->
    <script src="{{ asset('assets/js/vendor/summernote-bs4.min.js')}}"></script>
    <script src="{{ asset('assets/js/demo/demo.summernote.js')}}"></script>
    <!-- Ends Summernote js -->

    <!-- custom js -->
    <script type="text/javascript">

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
            var about = $('#summernote-basic').summernote('code');
            var formData = new FormData(this);
            formData.append("about", about);
            event.preventDefault();
            $.ajax({
                url: "{{route('admin.settings.user_manage.store')}}",
                method: 'POST',
                data: formData,
                dataType:'JSON',
                contentType:false,
                cache:false,
                processData:false,
                success: function(result) {                  
                    if(result.errors){
                        for(var key in result.errors){
                            var error = result.errors[key];
                            toastr.error(error);
                        }
                    } else {
                        console.log(result);
                        // window.location.href = "{{route('admin.settings.user_manage.index')}}";
                        toastr.success('Successfully Created!');
                    }

                },
                error: function(data) {
                    toastr.error(data);
                }
            });
        });

    </script>
    <!-- ends custom js  -->

@endsection
