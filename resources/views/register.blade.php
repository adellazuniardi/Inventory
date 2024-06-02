<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang=""> <!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Telkom Inventory</title>
    <link rel="website icon" type="png"
        href="https://www.telkom.co.id/data/image_upload/page/1594112895830_compress_PNG%20Icon%20Telkom.png">
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{ asset('style/assets/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/cs-skin-elastic.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-select.less') }}"> -->
    <link rel="stylesheet" href="{{ asset('style/assets/scss/style.css') }}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>

<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="/register"><b>TELKOM <br></b>INVENTORY</a>
                </div>
                <div class="login-form">
                    <form action="/registeruser" method="post">
                        @csrf
                        {{-- Logo --}}
                        <div class="login-logo">
                            <img class="align-content" src="{{ asset('image/primerTelkom.png') }}" alt="logo" width="200px">
                        </div>

                        {{-- User Name --}}
                        <div class="input-group mt-2">
                            <input type="text" class="form-control" name="name" placeholder="User Name" value="{{ old('name') }}" required>
                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                        </div>
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif

                        {{-- Email Address --}}
                        <div class="input-group mt-2">
                            <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required>
                            <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                        </div>
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif

                        {{-- Password --}}
                        <div class="input-group mt-2">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                            <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                        </div>
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif

                        {{-- Register Button --}}
                        <div class="form-actions form-group mt-3">
                            <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Register</button>
                        </div>

                        {{-- Link to Login --}}
                        <div class="register-link m-t-15 text-center">
                            <p>Already have account ? <a href="/login"> Sign in</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('style/assets/js/vendor/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('style/ssets/js/plugins.js') }}"></script>
    <script src="{{ asset('style/assets/js/main.js') }}"></script>


</body>

</html>
