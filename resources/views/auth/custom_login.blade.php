<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $setting->app_name ? $setting->app_name : config('app.name', 'Laravel') }} | Login</title>
    <link rel="apple-touch-icon" href="{{asset ('public/app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ $setting->favicon ? asset ('public/assets/images/ico/'. $setting->favicon) : 
        asset ('public/app-assets/images/ico/favicon.ico')}}">
    <link
        href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i"
        rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset ('public/app-assets/vendors/css/vendors.min.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset ('public/app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset ('public/app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset ('public/app-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset ('public/app-assets/css/components.css')}}">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{asset ('public/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset ('public/app-assets/css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset ('public/app-assets/css/pages/login-register.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset ('public/assets/css/style.css')}}">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu 1-column   blank-page blank-page" data-open="click" data-menu="vertical-menu"
    data-col="1-column">
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="row flexbox-container">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="col-lg-4 col-md-8 col-10 box-shadow-2 p-0">
                            <div class="card border-grey border-lighten-3 m-0">
                                <div class="card-header border-0">
                                    <div class="card-title text-center">
                                        <div class="p-1">
                                            <a href="#"><img src="{{ $setting->logo ? asset ('public/assets/images/logo/'. $setting->logo) : 
                                                asset ('public/app-assets/images/logo/stack-logo-dark-big.png')}}" class="logo" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                                        <span>Login with {{ $setting->app_name ? $setting->app_name : config('app.name', 'Laravel') }}</span></h6>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                @if ($message = Session::get('success'))
                                                    <div class="alert alert-success alert-block col-md-12">
                                                        <button type="button" class="close" data-dismiss="alert">??</button>
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @endif
                                                @if ($message = Session::get('error'))
                                                    <div class="alert alert-danger alert-block col-md-12">
                                                        <button type="button" class="close" data-dismiss="alert">??</button>
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @endif
                                                @if ($errors->any())
                                                    <div class="alert alert-danger col-md-12">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                            <button type="button" class="close" data-dismiss="alert">??</button>
                                                            <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <form class="form-horizontal form-simple" action="{{ route ('login')}}" method="post" novalidate>@csrf
                                            <fieldset class="form-group position-relative has-icon-left mb-0">
                                                <input type="text" name="login" class="form-control form-control-lg" id="user-name"
                                                    placeholder="Your Username or Email" value="{{old('login')}}" required>
                                                <div class="form-control-position">
                                                    <i class="feather icon-user"></i>
                                                </div>
                                                @error('login')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </fieldset>
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="password" name="password" class="form-control form-control-lg"
                                                    id="user-password" placeholder="Enter Password" value="{{old('password')}}" required>
                                                <div class="form-control-position">
                                                    <i class="fa fa-key"></i>
                                                </div>
                                            </fieldset>
                                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                                <i class="feather icon-unlock"></i> Login
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="">
                                        @if (Route::has('password.request'))
                                            <p class="float-sm-left text-center m-0">
                                                <a href="{{ route('password.request') }}" class="card-link">Forgot password?</a>
                                            </p>
                                        @endif
                                        @if (Route::has('register'))
                                            <p class="float-sm-right text-center m-0">New to {{ $setting->app_name ? $setting->app_name : config('app.name', 'Laravel') }}? 
                                                <a href="{{ route ('register') }}" class="card-link">Sign Up</a>
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset ('public/app-assets/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset ('public/app-assets/vendors/js/forms/icheck/icheck.min.js')}}"></script>
    <script src="{{ asset ('public/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset ('public/app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{ asset ('public/app-assets/js/core/app.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset ('public/app-assets/js/scripts/forms/form-login-register.js')}}"></script>
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>