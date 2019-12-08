@extends('admin.layouts.master')

@section('style')
 <!-- third party css -->
    <link href="{{ asset('assets/css/vendor/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/vendor/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/vendor/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/vendor/select.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.css" rel="stylesheet') }}" type="text/css" />
@endsection

@section('page_title') Basic Settings @endsection

@section('content')
    
    <!-- Main content -->
    <div class="row">
        <div class="col-12">
            <div class="card sale-card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-12">
                            <span style="font-size:1.6rem; font-weight:700;">Website Basic Setting</span>
                            <a href='#!' class='btn_newProvider btn btn-success float-right' data-toggle='tooltip' style="float:right;"><i class='feather icon-file-plus display-5'>Add</i></a>
                        </div>
                    </div>                                      
                </div>
                <div class="card-body p-40">
                    <div class="container-fluid">
                        <form action="{{route('admin.settings.basic_settings.submit')}}" id="submit_form" method="get" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group m-form__group">
                                        <label for="name" class="fieldlabel" style="font-size:16px;">What is your website Name?
                                            <a href="javascript:void(0);" data-container="body" title="What is this?" data-toggle="popover" data-placement="right" data-content="Give us the name of your website that you want others to know when they are sent emails or other correspondence from your website. Maximum characters are 30." data-toggle="m-popover" class="underline-link" data-original-title="">
                                            What is this?</a>           
                                        </label>
                                        <input type="text" id="name" class="form-control m-input" value="{{old('name', $basic->displayName)}}" name="name" max="30" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group m-form__group">
                                        <label for="name" class="fieldlabel" style="font-size:16px;">Choose Title Link Sign
                                            <a href="javascript:void(0);" data-container="body" title="What is this?" data-toggle="popover" data-placement="right" data-content="This will display links between website name and title. For example: Home | WebsiteName" data-original-title="">
                                            What is this?</a>                                                   
                                        </label>
                                        <input type="text" id="name" class="form-control m-input" value="{{old('link', $basic->link)}}" name="link" max="5" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group m-form__group">
                                        <label for="logoImage" style="font-size:16px;">Upload your logo 
                                        <a href="javascript:void(0);" data-container="body" title="What is this?" data-toggle="popover" data-placement="right" data-content="Your logo is the image displayed on the top left of your website. Maximum image size is 2M." data-original-title="">
                                            What is this?</a>
                                        </label>
                                        <input type="file" accept="image/*" class="form-control" name="logoImage" id="logoImage"></textarea>
                                        <img id="image_upload_output" @if($basic->logoImage)src="{{asset('uploads/setting/basic/'.$basic->logoImage)}}"@endif class="image_upload_output" style="border:1px solid #c7c7c7;max-width:250px;"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group m-form__group">
                                        <label for="faviconImage" style="font-size:16px;">Upload your favicon image
                                        <a href="javascript:void(0);" data-container="body" title="What is this?" data-toggle="popover" data-placement="right" data-content="A favicon is an icon that is displayed on the address bar. Maximum size is 2M." data-original-title="">What is this?</a>
                                        <input type="file" accept="image/*" class="form-control" name="faviconImage" id="faviconImage"></textarea>
                                        <img id="image_upload_output2" @if($basic->faviconImage)src="{{asset('uploads/setting/basic/'.$basic->faviconImage)}}"@endif class="image_upload_output" style="border:1px solid #c7c7c7;max-width:100px;"/>
                                    </div>
                                </div>
                            </div>
                            <div id="accordion" class="custom-accordion mb-4">
                                <div class="card mb-0">
                                    <div class="card-header" id="headingOne" style="background:#5d78ff;">
                                        <h4 class="m-0">
                                            <a class="custom-accordion-title d-block pt-2 pb-2" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="color:#f1f3fa;">
                                                <i class="fa fa-eye"></i>Show Advanced Settings<span class="float-right"><i class="mdi mdi-chevron-down accordion-arrow"></i></span>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="m-accordion__item-content">
                                                <h3 class="fieldlabel" style="font-size:16px;">Website Theme Color (Loading Screen Color, Header, Footer)
                                                    <a href="javascript:void(0);" data-container="body" title="What is this?" data-toggle="popover" data-placement="right" data-content="This is the loading screen when someone first comes to your website and navigates through your website while that page is loading." data-original-title="">What is this?</a>
                                                </h3>
                                                <hr />
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="loadingColor">COLOR DIGLOG BOX
                                                            <a href="javascript:void(0);" data-container="body" title="What is this?" data-toggle="popover" data-placement="right" data-content="Click on the box to bring up a color dialog box. You can click on the colors to choose which color you would like to display. Click on “Add to Custom Colors” and click OK to save." data-original-title="">What is this?</a>
                                                        </label>
                                                            <br />
                                                            <input type="color" id="loadingColor" style="width:150px; height:50px;" name="loadingColor" value="{{old('loadingColor', $basic->loadingColor)}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="file1">CHOOSE FILE
                                                            <a href="javascript:void(0);" data-container="body" title="What is this?" data-toggle="popover" data-placement="right" data-content="Click on choose file to choose a color from an image or logo you would like to match for your website theme. Choose the image from your computer, move your mouse to the color you want, then click. To close the image screen click on the red “X” at the top of the page." data-original-title="">What is this?</a></label><br />
                                                            <input type="file" name="file1" id="file_upload1">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h4>Loading Screen Status</h4>
                                                        <div class="form-group">
                                                            <div>
                                                                <span class="m-switch m-switch--icon ml-1 mr-1">
                                                                    <label>
                                                                            <input type="checkbox" @if($basic->loadingStatus==true)checked="checked"@endif name="loading" id="switch2" data-switch="primary" /><label for="switch2" data-on-label="On" data-off-label="Off"></label>
                                                                        <span></span>
                                                                    </label>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <br />
                                                <h3 class="fieldlabel" style="font-size:16px;">Website SEO
                                                    <a href="javascript:void(0);" data-container="body" title="What is this?" data-toggle="popover" data-placement="right" data-content="SEO is a tool that helps your website be found in search engines." data-original-title="">What is this?</a>
                                                </h3>
                                                <hr />
                                                <div class="form-group" style="margin-top:10px;">
                                                    <div class="form-line">
                                                        <label for="meta_title">Add title
                                                            <a href="javascript:void(0);" data-container="body" title="What is this?" data-toggle="popover" data-placement="right" data-content="The meta title will display at the top of your website page and tells the reader what page they are visiting. Maximum characters 100" data-original-title="">What is this?</a></label>
                                                        <input type="text" id="meta_title" class="form-control" maxlength="100" value="{{old('meta_title', $basic->meta_title)}}" name="meta_title">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <label for="meta_keywords">Add meta keywords
                                                                <a href="javascript:void(0);" data-container="body" title="What is this?" data-toggle="popover" data-placement="right" data-content="The meta keywords are words that help the search engines to categorize what type of website you have. Do not repeat words too many times as this could be seen as spamming and actually hurt your website ranking. No maximum characters" data-original-title="">What is this?</a></label>
                                                        <input type="text" id="meta_keywords" class="form-control" maxlength="1000" value="{{old('meta_keywords', $basic->meta_keywords)}}" name="meta_keywords">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <label for="meta_description">Add meta description 
                                                            <a href="javascript:void(0);" data-container="body" title="What is this?" data-toggle="popover" data-placement="right" data-content="The meta description summarizes your website’s content. This shows up in the search engine as snippet of website information. Maximum characters 600" data-original-title="">What is this?</a></label>
                                                        <textarea id="meta_description" class="form-control" maxlength="600" name="meta_description" style="min-height:100px;">{{old('meta_description', $basic->meta_description)}}</textarea>
                                                    </div>
                                                </div>
                                                <br />
                                                <h3 class="fieldlabel" style="font-size:16px;">Header Code
                                                    <a href="javascript:void(0);" data-container="body" title="What is this?" data-toggle="popover" data-placement="right" data-content="This code is placed in the header of the website on all pages" data-original-title="">What is this?</a></label>
                                                    <textarea id="meta_description" class="form-control" maxlength="6000" name="header_code" style="min-height:100px;">{{old('header_code', $basic->header_code)}}</textarea>
                                                </h3>
                                                <h3 class="fieldlabel" style="font-size:16px;">Footer Code
                                                    <a href="javascript:void(0);" data-container="body" title="What is this?" data-toggle="popover" data-placement="right" data-content="This code is placed in the footer of the website on all pages" data-original-title="">What is this?</a></label>
                                                    <textarea id="meta_description" class="form-control" maxlength="6000" name="footer_code" style="min-height:100px;">{{old('footer_code', $basic->footer_code)}}</textarea>
                                                </h3>
                                                <h3 class="fieldlabel" style="font-size:16px;">Additional Style Css Code
                                                    <a href="javascript:void(0);" data-container="body" title="What is this?" data-toggle="popover" data-placement="right" data-content="This code is placed in the style of website." data-original-title="">What is this?</a></label>
                                                    <textarea id="meta_description" class="form-control" maxlength="6000" name="style_code" style="min-height:100px;" placeholder=".header{color:#444444;}">{{old('header_code', $basic->style_code)}}</textarea>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3 text-right">
                                <a href="{{route('admin.settings.basic_settings')}}" class="btn btn-primary m-2">Back</a>
                                <a href = "#!" class="submit_btn btn btn-success m-2">Submit</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>                                    
    </div>
    <!-- Ends Main content -->
    
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

    <!-- custom js -->
    <script>
   
        $(".submit_btn").click(function(){
            $("#submit_form").submit();
            console.log("hello");
        });

        $("#logoImage").change(function(){
            $("#image_upload_output").css('display', 'block');

            var reader = new FileReader();

            reader.onload = function(){
                var output = document.getElementById('image_upload_output');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        });

        $("#faviconImage").change(function(){
            $("#image_upload_output2").css('display', 'block');

            var reader = new FileReader();

            reader.onload = function(){
                var output = document.getElementById('image_upload_output2');
                output.src = reader.result;
            }

            reader.readAsDataURL(event.target.files[0]);
        });
        
    </script>
    <!-- end custom js -->

@endsection