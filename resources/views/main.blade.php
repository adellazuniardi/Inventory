<!doctype html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title') Telkom Inventory </title>
    <link rel="website icon" type="png"
        href="https://www.telkom.co.id/data/image_upload/page/1594112895830_compress_PNG%20Icon%20Telkom.png">
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="{{ asset('style/assets/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('styleassets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/scss/style.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>

<body>

    <script src="{{ asset('style/assets/js/vendor/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('style/assets/js/main.js') }}"></script>



    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
                    aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="">TELKOM INVENTORY</a>
                <a class="navbar-brand hidden" href="">IN</a>
            </div>
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="/home"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    {{-- <li>
                        <a href="/inventory"> <i class="menu-icon fa fa-archive"></i>Inventory</a>
                    </li> --}}


                    <li>
                        <a href="/tambahdata"> <i class="menu-icon fa fa-plus-square"></i>Tambah Data</a>
                    </li>
                    @if (auth()->user()->role == "admin")
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-briefcase"></i>Manajemen</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-archive"></i><a href="/inventory">Manajemen Inventory</a></li>
                            <li><i class="fa fa-building-o"></i><a href="/deskripsi">Manajemen Gudang</a></li>
                        </ul>
                    </li>
                    @endif
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <div id="right-panel" class="right-panel">
        <header id="header" class="header">
            <div class="header-menu">
                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa-tasks"></i></a>
                </div>
                {{-- <link rel="website icon" type="png" --}}
                {{-- href="https://www.telkom.co.id/data/image_upload/page/1594112895830_compress_PNG%20Icon%20Telkom.png">
                        <i class="fa fa-tasks"></i> --}}

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="{{ asset('style/images/profile.png') }}">
                        </a>
                        <div class="user-menu dropdown-menu bg-dark rounded">
                            <a class="nav-link text-white" href="#"><i class="fa fa -cog"></i>{{ Auth::user()->name }}</a>
                            <a class="nav-link text-white" href="/logout"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>

                    <div class="language-select dropdown" id="language-select">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="language"
                            aria-haspopup="true" aria-expanded="true">
                            <i class="flag-icon flag-icon-id"></i>
                        </a>
                        {{-- <div class="dropdown-menu" aria-labelledby="language">
                            <div class="dropdown-item">
                                <span class="flag-icon flag-icon-id"></span>
                            </div>
                        </div> --}}
                    </div>

                </div>
            </div>

        </header><!-- /header -->

        @yield('breadcrumbs')

        @yield('content')

        @yield('ckeditor')

    </div>

    {{-- <footer class="fixed-bottom p-3 bg-dark-subtle">
        <span class="text-muted">Place fixed footer content here.</span>
    </footer> --}}
</body>

</html>
