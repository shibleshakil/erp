<!-- - var menuBorder = true-->
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $setting->app_name ? $setting->app_name : config('app.name', 'Laravel') }} | @yield('title')</title>
    <link rel="apple-touch-icon" href="{{ asset ('public/app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ $setting->favicon ? asset ('public/assets/images/ico/'. $setting->favicon) : 
        asset ('public/app-assets/images/ico/favicon.ico')}}">
    <link
        href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i"
        rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset ('public/app-assets/vendors/css/vendors.min.css')}}">
    <!-- END: Vendor CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('public/app-assets/vendors/css/forms/toggle/switchery.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('public/app-assets/vendors/css/extensions/toastr.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('public/app-assets/css/plugins/forms/validation/form-validation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('public/app-assets/vendors/css/forms/selects/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('public/app-assets/vendors/css/tables/datatable/datatables.min.css')}}">

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset ('public/app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('public/app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('public/app-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('public/app-assets/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('public/app-assets/css/plugins/extensions/toastr.css')}}">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset ('public/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('public/app-assets/css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('public/app-assets/css/core/colors/palette-climacon.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('public/app-assets/fonts/simple-line-icons/style.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('public/app-assets/fonts/meteocons/style.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('public/app-assets/css/pages/users.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset ('public/assets/css/style.css')}}">
    <!-- END: Custom CSS-->
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu"
    data-col="2-columns">
    <input type="hidden" id="csrfToken" value="{{ csrf_token() }}">

    <!-- BEGIN: Header-->
    @include('layouts.header')
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    @include('layouts.sidebar')
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        @yield('content')
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    @include('layouts.footer')
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset ('public/app-assets/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->
    
    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset ('public/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{ asset ('public/app-assets/js/scripts/forms/select/form-select2.js') }}"></script>
    <script src="{{ asset ('public/app-assets/vendors/js/forms/toggle/bootstrap-checkbox.min.js')}}"></script>
    <script src="{{ asset ('public/app-assets/vendors/js/forms/toggle/switchery.min.js')}}"></script>
    <script src="{{ asset ('public/app-assets/vendors/js/forms/repeater/jquery.repeater.min.js')}}"></script>
    <script src="{{ asset ('public/app-assets/vendors/js/extensions/toastr.min.js')}}"></script>
    <script src="{{ asset ('public/app-assets/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
    <script src="{{ asset ('public/app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script src="{{ asset ('public/app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset ('public/app-assets/vendors/js/tables/vfs_fonts.js')}}"></script>
    <script src="{{ asset ('public/app-assets/vendors/js/tables/buttons.print.min.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset ('public/app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{ asset ('public/app-assets/js/core/app.js') }}"></script>
    <!-- END: Theme JS-->
    <!-- BEGIN: Page JS-->
    <script src="{{ asset ('public/app-assets/js/scripts/forms/form-repeater.js') }}"></script>
    <script src="{{ asset ('public/assets/js/datatable.js') }}"></script>
    <script src="{{ asset ('public/assets/js/common.js') }}"></script>
    @yield('script')
    <!-- END: Page JS-->
    <script>
        $(".form").submit( function (){
            $("#submitBtn").attr("disabled", true);
            return true;
        });  
        var createdmsg = '{{Session::get('created')}}';
        var created = '{{Session::has('created')}}';
        if(created){
            toastr.success(
                createdmsg,
                'Created!',
                {
                    positionClass: 'toast-top-right',
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    timeOut: 2000
                }
            );
        }        
        var addedmsg = '{{Session::get('added')}}';
        var added = '{{Session::has('added')}}';
        if(added){
            toastr.success(
                addedmsg,
                'Added!',
                {
                    positionClass: 'toast-top-right',
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    timeOut: 2000
                }
            );
        }
        var successmsg = '{{Session::get('uploaded')}}';
        var success = '{{Session::has('uploaded')}}';
        if(success){
            toastr.success(
                successmsg,
                'Success!',
                {
                    positionClass: 'toast-top-right',
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    timeOut: 2000
                }
            );
        }
        var updatedmsg = '{{Session::get('updated')}}';
        var updated = '{{Session::has('updated')}}';
        if(updated){
            toastr.info(
                updatedmsg,
                'Updated!',
                {
                    positionClass: 'toast-top-right',
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    timeOut: 2000
                }
            );
        }
        var deletedmsg = '{{Session::get('deleted')}}';
        var deleted = '{{Session::has('deleted')}}';
        if(deleted){
            toastr.info(
                deletedmsg,
                'Deleted!',
                {
                    positionClass: 'toast-top-right',
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    timeOut: 2000
                }
            );
        }
        
        var failedmsg = '{{Session::get('failed')}}';
        var failed = '{{Session::has('failed')}}';
        if(failed){
            toastr.warning(
                failedmsg,
                'Duplicate!',
                {
                    positionClass: 'toast-top-right',
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    timeOut: 2000
                }
            );
        }
        var errormsg = '{{Session::get('error')}}';
        var error = '{{Session::has('error')}}';
        if(error){
            toastr.error(
                errormsg,
                'Error!',
                {
                    positionClass: 'toast-top-right',
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    timeOut: 2000
                }
            );
        }
        var warningmsg = '{{Session::get('warning')}}';
        var warning = '{{Session::has('warning')}}';
        if(warning){
            toastr.warning(
                warningmsg,
                'Warning!',
                {
                    positionClass: 'toast-top-right',
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    timeOut: 2000
                }
            );
        }
        var unauthorizedmsg = '{{Session::get('unauthorized')}}';
        var unauthorized = '{{Session::has('unauthorized')}}';
        if(unauthorized){
            toastr.error(
                unauthorizedmsg,
                'Unauthorized!',
                {
                    positionClass: 'toast-top-right',
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    timeOut: 2000
                }
            );
        }
        
    </script>

</body>
<!-- END: Body-->

</html>