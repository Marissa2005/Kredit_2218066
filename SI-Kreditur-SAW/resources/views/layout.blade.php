<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BANK SCORE</title>
    <meta name="description" content="BANK-SCORE">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="http://127.0.0.1:8000/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://127.0.0.1:8000/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://127.0.0.1:8000/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="http://127.0.0.1:8000/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="http://127.0.0.1:8000/vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="http://127.0.0.1:8000/vendors/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="http://127.0.0.1:8000/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="http://127.0.0.1:8000/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">

    <link rel="stylesheet" href="http://127.0.0.1:8000/assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>


    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
                    aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="http://127.0.0.1:8000/images/logo.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="http://127.0.0.1:8000/images/logo2.png"
                        alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }} ">
                        <a href="{{ route('dashboard') }}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <li class="{{ request()->routeIs('user.index') ? 'active' : '' }} ">
                        <a href="{{ route('user.index') }}"> <i class="menu-icon fa fa-user"></i>User </a>
                    </li>
                    <li class="{{ request()->routeIs('karyawan.index') ? 'active' : '' }} ">
                        <a href="{{ route('karyawan.index') }}"> <i class="menu-icon fa fa-user"></i>Karyawan </a>
                    </li>
                    <li class="{{ request()->routeIs('kreditur.index') ? 'active' : '' }} ">
                        <a href="{{ route('kreditur.index') }}"><i class="menu-icon fa fa-address-book"></i>Calon
                            Kreditur </a>
                    </li>
                    <li class="{{ request()->routeIs('kriteria.index') ? 'active' : '' }} ">
                        <a href="{{ route('kriteria.index') }}"><i class="menu-icon fa fa-star"></i>Kriteria </a>
                    </li>
                    <li class="{{ request()->routeIs('subKriteria.index') ? 'active' : '' }} ">
                        <a href="{{ route('subKriteria.index') }}"><i class="menu-icon fa fa-life-ring"></i>Sub Kriteria
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('penilaian.index') ? 'active' : '' }} ">
                        <a href="{{ route('penilaian.index') }}"><i class="menu-icon fa fa-life-ring"></i>Penilaian </a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..."
                                    aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                        <div class="dropdown for-notification">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="notification"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="count bg-danger">5</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="notification">
                                <p class="red">You have 3 Notification</p>
                                <a class="dropdown-item media bg-flat-color-1" href="#">
                                    <i class="fa fa-check"></i>
                                    <p>Server #1 overloaded.</p>
                                </a>
                                <a class="dropdown-item media bg-flat-color-4" href="#">
                                    <i class="fa fa-info"></i>
                                    <p>Server #2 overloaded.</p>
                                </a>
                                <a class="dropdown-item media bg-flat-color-5" href="#">
                                    <i class="fa fa-warning"></i>
                                    <p>Server #3 overloaded.</p>
                                </a>
                            </div>
                        </div>

                        <div class="dropdown for-message">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="message"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ti-email"></i>
                                <span class="count bg-primary">9</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="message">
                                <p class="red">You have 4 Mails</p>
                                <a class="dropdown-item media bg-flat-color-1" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="images/avatar/1.jpg"></span>
                                    <span class="message media-body">
                                        <span class="name float-left">Jonathan Smith</span>
                                        <span class="time float-right">Just now</span>
                                        <p>Hello, this is an example msg</p>
                                    </span>
                                </a>
                                <a class="dropdown-item media bg-flat-color-4" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="images/avatar/2.jpg"></span>
                                    <span class="message media-body">
                                        <span class="name float-left">Jack Sanders</span>
                                        <span class="time float-right">5 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                    </span>
                                </a>
                                <a class="dropdown-item media bg-flat-color-5" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="images/avatar/3.jpg"></span>
                                    <span class="message media-body">
                                        <span class="name float-left">Cheryl Wheeler</span>
                                        <span class="time float-right">10 minutes ago</span>
                                        <p>Hello, this is an example msg</p>
                                    </span>
                                </a>
                                <a class="dropdown-item media bg-flat-color-3" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="images/avatar/4.jpg"></span>
                                    <span class="message media-body">
                                        <span class="name float-left">Rachel Santos</span>
                                        <span class="time float-right">15 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="http://127.0.0.1:8000/images/admin.jpg"
                                alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><i class="fa fa-user"></i>{{ session('user.nama') }}</a>
                            <a class="nav-link" href="{{ route('auth.logout') }}"><i class="fa fa-power-off"></i>
                                Logout</a>
                        </div>
                    </div>

                    <div class="language-select dropdown" id="language-select">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="language" aria-haspopup="true"
                            aria-expanded="true">
                            <i class="flag-icon flag-icon-us"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="language">
                            <div class="dropdown-item">
                                <span class="flag-icon flag-icon-fr"></span>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-es"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-us"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-it"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="content mt-3">
            @include('sweetalert::alert')
            @yield('content')
        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="http://127.0.0.1:8000/vendors/jquery/dist/jquery.min.js"></script>
    <script src="http://127.0.0.1:8000/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="http://127.0.0.1:8000/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="http://127.0.0.1:8000/assets/js/main.js"></script>


    <script src="http://127.0.0.1:8000/vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="http://127.0.0.1:8000/assets/js/dashboard.js"></script>
    <script src="http://127.0.0.1:8000/assets/js/widgets.js"></script>
    <script src="http://127.0.0.1:8000/vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="http://127.0.0.1:8000/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="http://127.0.0.1:8000/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>

    <script src="http://127.0.0.1:8000/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="http://127.0.0.1:8000/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="http://127.0.0.1:8000/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="http://127.0.0.1:8000/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="http://127.0.0.1:8000/vendors/jszip/dist/jszip.min.js"></script>
    <script src="http://127.0.0.1:8000/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="http://127.0.0.1:8000/vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="http://127.0.0.1:8000/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="http://127.0.0.1:8000/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="http://127.0.0.1:8000/vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script src="http://127.0.0.1:8000/assets/js/init-scripts/data-table/datatables-init.js"></script>
    <script>
    (function($) {
        "use strict";

        jQuery('#vmap').vectorMap({
            map: 'world_en',
            backgroundColor: null,
            color: '#ffffff',
            hoverOpacity: 0.7,
            selectedColor: '#1de9b6',
            enableZoom: true,
            showTooltip: true,
            values: sample_data,
            scaleColors: ['#1de9b6', '#03a9f5'],
            normalizeFunction: 'polynomial'
        });
    })(jQuery);
    </script>

</body>

</html>