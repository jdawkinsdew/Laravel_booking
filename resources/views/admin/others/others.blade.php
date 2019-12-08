<html>
<head>
   <meta charset="utf-8">
   <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
   <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}">
    @yield('title','Dashboard')
<!-- Bootstrap CSS -->
   <!-- bootstrap theme -->
   @yield('style')
    <link href="{{ asset('assets/css/icons.min.css') }}" media="all" rel="stylesheet" type="text/css" />
    <!--external css-->
    <!-- font icon -->
    <link href="{{ asset('assets/css/style.min.css') }}" media="all" rel="stylesheet" type="text/css" />
    
</head>
<body>
     <div class="wrapper">

        @include('layouts.sidebars.sidebar')
          <div class="content-page">
            <div class="content">
              @include('layouts.header.header')
              @yield('content')
            </div>
                <!-- container -->
             @include('layouts.footer.footer')
            </div>

     </div>

<!-- javascripts -->
<script type="text/javascript" src="{{ asset('assets/js/app.min.js') }}"></script>
@yield('script')
</body>

</html>
