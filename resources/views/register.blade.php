<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Shimba Bootstrap 4 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Beethemesdesign" name="author" />

    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}">


    <!-- Required css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.min.css') }}" rel="stylesheet" type="text/css" />


</head>

<body class="auth-fluid-pages pb-0">

    <div class="auth-fluid">
        <div class="auth-side-img text-center">
            <div class="auth-user-testimonial">
                <h2 class="mb-3">toretto signup</h2>
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
                    <!-- Logo-->
                    <div class="auth-brand text-center text-lg-left">
                        <a href="{{ route('login') }}">
                            <span><img src="{{ asset('assets/images/logo-dark.png') }}" alt=""></span>
                        </a>
                    </div>

                    <h4 class="mt-0 mb-1">Registration</h4>
                    <p class="text-muted mb-2">Don't have an account? Create your account here</p>

                    <form action=" {{ route('addClient') }} " method="post">
                    @csrf
                        <div class="form-group mb-2">
                            <label class="mb-1" for="fullname">Name</label>
                            <input name="name" class="form-control" type="text" id="fullname" placeholder="Enter name" required>
                        </div>
                        <div class="form-group mb-2">
                            <label class="mb-1" for="emailaddress">Email</label>
                            <input name="email" class="form-control" type="email" id="emailaddress" required placeholder="Enter email">
                        </div>
                        <div class="form-group mb-2">
                            <label class="mb-1" for="password">Password</label>
                            <input name="password" class="form-control" type="password" required id="password" placeholder="Enter password">
                        </div>
                        <div class="form-group mb-2">
                            <label class="mb-1" for="password2">Confirm Password</label>
                            <input name="repassword" class="form-control" type="password" required id="password2" placeholder="Enter password">
                        </div>
                        <div class="form-group mb-2">
                            <label class="mb-1" for="phoneNumber">Zip Code</label>
                            <input name="zipcode" class="form-control" type="text" id="zipcode" placeholder="0-00-00-00" required data-toggle="input-mask" data-mask-format="0-00-00-00">
                        </div>
                        <div class="form-group mb-2">
                            <div class="custom-control custom-checkbox">
                                <input name="" type="checkbox" class="custom-control-input" id="checkbox-signup" required>
                                <label class="custom-control-label" for="checkbox-signup">I accept <a href="#!" class="text-muted">Terms &amp; Conditions</a></label>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-8">
                                <div class="form-group mb-0">
                                    <button class="btn btn-primary btn-block" type="submit"> Submit </button>
                                </div>
                            </div>
                        </div>
                        <hr class="my-3">
                        <div class="text-center">
                            <p class="text-muted font-16">You may also <b>Sign up</b> using</p>
                            <ul class="social-list list-inline mt-2 mb-0">
                                <li class="list-inline-item">
                                    <a href="#!" class="social-btn border-primary bg-primary text-white"><i class="mdi mdi-facebook"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#!" class="social-btn border-danger bg-danger text-white"><i class="mdi mdi-google"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#!" class="social-btn border-info bg-info text-white"><i class="mdi mdi-twitter"></i></a>
                                </li>
                            </ul>
                        </div>
                        <input type="hidden" value="5" name="role">
                    </form>
                    <footer class="footer footer-alt">
                        <p class="text-muted">Already have account? <a href="{{ route('login') }}" class="text-muted ml-1"><b>Log In</b></a></p>
                    </footer>
                </div>
            </div>
        </div>
    </div>

    <!-- Required js -->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>

</body>

</html>