<!doctype html>
<html lang="en" class="no-focus">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>SIA-KAS | Login</title>
    <meta name="author" content="Marfiana Ayu Irawati">
    <meta name="robots" content="noindex, nofollow">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="SIA-KAS | Login">
    <meta property="og:site_name" content="SIA-KAS">
    <meta property="og:description" content="Sistem Informasi Akuntansi Kas">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{ asset('assets/media/favicons/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/media/favicons/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/media/favicons/apple-touch-icon-180x180.png') }}">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Fonts and Codebase framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700&display=swap">
    <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/codebase.min.css') }}">

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <link rel="stylesheet" id="css-theme" href="{{ asset('assets/css/themes/flat.min.css') }}">
    <!-- END Stylesheets -->
</head>
<body>

<div id="page-container" class="main-content-boxed">

    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="bg-image" style="background-image: url({{ asset('assets/media/photos/photo34@2x.jpg') }});">
            <div class="row mx-0 bg-black-op">
                <div class="hero-static col-md-8 col-xl-8 d-none d-md-flex align-items-md-end">
                    <div class="p-30 invisible" data-toggle="appear">
                        <p class="font-size-h3 font-w600 text-white">
                            Get Inspired and Create.
                        </p>
                        <p class="font-italic text-white-op">
                            Copyright &copy; <span class="js-year-copy"></span>
                        </p>
                    </div>
                </div>
                <div class="hero-static col-md-4 col-xl-4 d-flex align-items-center bg-white invisible" data-toggle="appear" data-class="animated fadeInRight">
                    <div class="content content-full">
                        <!-- Header -->
                        <div class="px-30 py-10">
                            <a class="link-effect font-w700" href="#">
                                <i class="si si-fire"></i>
                                <span class="font-size-xl text-primary-dark">SIA</span>-<span class="font-size-xl">KAS</span>
                            </a>
                            <h1 class="h3 font-w700 mt-30 mb-10">Welcome to Your Dashboard</h1>
                            <h2 class="h5 font-w400 text-muted mb-0">Please sign in</h2>
                        </div>
                        <!-- END Header -->

                        <!-- Sign In Form -->
                        <form class="js-validation-signin px-30" action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="form-group row">
                                <div class="col-12">
                                    <div class="form-material floating">
                                        <input id="login-username" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        <label for="login-username">Email</label>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <div class="form-material floating">
                                        <input id="login-password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                        <label for="login-password">Password</label>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="login-remember-me" name="login-remember-me" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="login-remember-me">Remember Me</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-sm btn-hero btn-alt-primary">
                                    <i class="si si-login mr-10"></i> Sign In
                                </button>
                            </div>
                        </form>
                        <!-- END Sign In Form -->
                    </div>
                </div>
            </div>
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
</div>
<!-- END Page Container -->

<script src="{{ asset('assets/js/codebase.core.min.js')}}"></script>

<script src="{{ asset('assets/js/codebase.app.min.js')}}"></script>

<!-- Page JS Plugins -->
<script src="{{ asset('assets/js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>

<!-- Page JS Code -->
<script src="{{ asset('assets/js/pages/op_auth_signin.min.js')}}"></script>
</body>
</html>
