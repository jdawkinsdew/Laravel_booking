<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/icons.min.css') }}" media="all" rel="stylesheet" type="text/css" />
    <!-- bootstrap theme -->
    <link href="{{ asset('assets/css/style.min.css') }}" media="all" rel="stylesheet" type="text/css" />
    <!--external css-->
    <!-- font icon -->
    <link href="{{ asset('css/elegant-icons-style.css') }}" media="all" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/font-awesome.css') }}" media="all" rel="stylesheet" type="text/css" />
    <!-- Custom styles -->
    <link href="{{ asset('css/style.css') }}" media="all" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/style-responsive.css') }}" media="all" rel="stylesheet" type="text/css" />

</head>

<body class="auth-fluid-pages pb-0">

    <div class="auth-fluid">
        <div class="auth-side-img text-center">
            <div class="auth-user-testimonial">
                <h2 class="mb-3">toretto Login</h2>
                <p class="lead"><i class="mdi mdi-format-quote-open"></i> It's a Modern templete. you love it very much! . <i class="mdi mdi-format-quote-close"></i>
                </p>
                <p>
                    © Shimba - by Beethemes
                </p>
            </div>
        </div>
        <div class="auth-panel-form">
            <div class="align-items-center d-flex h-100">
                <div class="card-body">

                    <!-- Logo -->
                    <div class="auth-brand text-center text-lg-left">
                        <a href="{{ route('register') }}">
                            <span><img src="assets/images/logo-dark.png" alt=""></span>
                        </a>
                    </div>

                    <h4 class="mt-0">Login</h4>
                    <p class="text-muted mb-4">Please login here to access account.</p>
                    <form action="{{ route('login') }}" method="POST">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="username" required="" class="form-control" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" required="" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group mb-3">
                            <a href="pages-recoverpw.html" class="text-muted float-right"><small>Forgot your password?</small></a>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="checkbox-signin" checked>
                                <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-8">
                                <div class="form-group mb-0">
                                    <button class="btn btn-primary btn-block" type="submit"> Log In </button>
                                </div>
                            </div>
                        </div>
                        <hr class="my-3">
                        <div class="text-center">
                            <p class="text-muted font-16">You may also <b>Sign in</b> using</p>
                            <ul class="social-list list-inline mt-3">
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="social-btn border-primary bg-primary text-white"><i class="mdi mdi-facebook"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="social-btn border-danger bg-danger text-white"><i class="mdi mdi-google"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="social-btn border-info bg-info text-white"><i class="mdi mdi-twitter"></i></a>
                                </li>
                            </ul>
                        </div>
                    </form>
                    <footer class="footer footer-alt">
                        <p class="text-muted">Don't have an account? <a href="{{ route('register') }}" class="text-muted ml-1"><b>Sign Up</b></a></p>
                    </footer>
                </div>
            </div>
        </div>
    </div> 

</body>
<script type="text/javascript" src="{{ asset('assets/js/app.min.js') }}"></script>
</html>
