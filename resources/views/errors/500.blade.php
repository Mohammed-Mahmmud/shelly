<!doctype html>
<html lang="en" data-layout="vertical" data-sidebar="dark" data-sidebar-size="lg" data-preloader="disable" data-theme="default" data-topbar="light" data-bs-theme="light">


<head>

    <meta charset="utf-8">
    <title>404 Error | Steex - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Minimal Admin & Dashboard Template" name="description">
    <meta content="Themesbrand" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('dashboard')}}/assets/images/favicon.ico">

    <!-- Fonts css load -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link id="fontsLink" href="../../css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Layout config Js -->
    <script src="{{asset('dashboard')}}/assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="{{asset('dashboard')}}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="{{asset('dashboard')}}/assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="{{asset('dashboard')}}/assets/css/app.min.css" rel="stylesheet" type="text/css">
    <!-- custom Css-->
    <link href="{{asset('dashboard')}}/assets/css/custom.min.css" rel="stylesheet" type="text/css">

</head>

<body>

<section class="auth-page-wrapper  position-relative d-flex align-items-center justify-content-center min-vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-11">
                <div >
                    <div class="row g-0 align-items-center">
                        <div class="col-xxl-6 mx-auto">
                            <div class="card mb-0 border-0 shadow-none mb-0">
                                <div class="card-body p-sm-5 m-lg-4">
                                    <div class="error-img text-center px-5">
                                        <img src="{{asset('dashboard')}}/assets/images/auth/500.png" class="img-fluid" alt="404"
                                             style="height:350px">
                                    </div>
                                    <div class="mt-4 text-center pt-3">
                                        <div class="position-relative">
                                            <h1 class="fs-2xl error-subtitle text-uppercase mb-0 text-capitalize" ><span style="color: red;">500</span><br>INTERNAL SERVER ERROR
                                            </h1>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
    <!--end container-->
</section>

<!-- JAVASCRIPT -->
<script src="{{asset('dashboard')}}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('dashboard')}}/assets/libs/simplebar/simplebar.min.js"></script>
<script src="{{asset('dashboard')}}/assets/js/plugins.js"></script>

</body>

</html>
