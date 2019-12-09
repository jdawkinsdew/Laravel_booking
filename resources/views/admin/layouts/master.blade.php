<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>Booking</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Beethemesdesign" name="author" />

        <!-- favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}">
    
        <!-- third party css -->
        @yield('style')
        <!-- third party css end -->
        
        <!-- Required css -->
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/style.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Customize css -->
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />
            
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
        <style>
            {!! $styleCode !!}
            .themecolor{
                background-color:{{$loadingColor}};
            }
        </style>
    </head>

    <body>

        <!-- Begin page -->
        <div class="wrapper">

            <!-- ============================================================= -->
            <!-- ===============    side menu content start  ================= -->
            <!-- ============================================================= -->

            @include('admin.layouts.sidebars.sidebar')

            <!-- ============================================================= -->
            <!-- ===============     side menu content End   ================= -->
            <!-- ============================================================= -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- ============================================================= -->
                    <!-- ===============    Top bar header content start  ================= -->
                
                    @include('admin.layouts.header.header')
                    <!-- ================================================================== -->
                    <!-- ===============    Top bar header content end  ================= -->
                    <!-- ================================================================== -->


                    <!-- Start Content-->
                    <div class="container-fluid">

                            <!-- start page title -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="page-title-box">
                                        <div class="page-title-right">
                                            <ol class="breadcrumb m-0">
                                                <li class="breadcrumb-item">
                                                    <a href="javascript: void(0);">
                                                        <i class="feather icon-home"></i>
                                                    </a>
                                                </li>
                                                <li class="breadcrumb-item active">
                                                    @yield('page_title')
                                                </li>
                                            </ol>
                                        </div>
                                        <h4 class="page-title">
                                            @yield('page_title')
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <!-- end page title -->

                            <!-- Main Content -->
                            @yield('content')
                            <!-- End Main Content -->

                    </div>
                    <!-- container -->

                </div>
                <!-- content -->

                <!-- ============================================================= -->
                <!-- ===============    footer content start  ================= -->
                <!-- ============================================================= -->

                @include('admin.layouts.footer.footer') 
                <!-- ============================================================= -->
                <!-- ===============    footer content start  ================= -->
                <!-- ============================================================= -->

            </div>
        </div>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->
    
        <!-- END wrapper -->


        <!-- Required js -->
        <script src="{{ asset('assets/js/app.min.js') }}"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        
        <!-- third party js & demo app -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
        
        @yield('script')

        <!-- third party js & demo app ends -->

    </body>

</html>
