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
        <div class="container rounded">
            <div class="login-content">
                <div class="login-logo">
                    <a href="/login"><b>TELKOM <br></b>INVENTORY</a>
                </div>
                <div class="login-form">
                    <form action="/loginproses" method="post">
                        @csrf
                        <div class="login-logo">
                            <img class="align-content" src="{{ asset('image/primerTelkom.png') }}" alt="logo"
                                width="200px">
                        </div>
                        <label>Email</label>
                        <div class="input-group mb-2">
                            <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required>
                            <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                            @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                        </div>


                        <label>Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" name="password" placeholder="Password" value="{{ old('password') }}" required>
                            <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                        </div>
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif

                        @if (session('error'))
                            <span class="text-danger">{{ session('error') }}</span>
                        @endif
                        <div class="form-actions form-group mt-3">
                            <button type="submit" class="btn btn-info btn-flat m-b-30 m-t-30">Sign in</button>
                        </div>
                        <div class="register-link m-t-15 text-center">
                            <p>Don't have account ? <a href="/register"> Register Here</a></p>
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
