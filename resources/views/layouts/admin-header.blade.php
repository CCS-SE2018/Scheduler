<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">
        <meta name="csrf-token" content="{{ csrf_token() }}" />


        <title>CIA Admin Page</title>
        {!! HTML::style('public/back-end/css/bootstrap.min.css') !!}
        <!-- Base Css Files -->
        <!-- <link href="../public/back-end/css/bootstrap.min.css" rel="stylesheet" /> -->

        <!-- Font Icons -->
        <link href="public/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="public/assets/ionicon/css/ionicons.min.css" rel="stylesheet" />
        <link href="public/back-end/css/material-design-iconic-font.min.css" rel="stylesheet">

        <!-- animate css -->
        <link href="public/back-end/css/animate.css" rel="stylesheet" />

        <!-- Waves-effect -->
        <link href="public/back-end/css/waves-effect.css" rel="stylesheet">

        <!-- Plugin Css-->
        <link rel="stylesheet" href="public/assets/magnific-popup/magnific-popup.css" />
        <link rel="stylesheet" href="public/assets/jquery-datatables-editable/datatables.css" />

        <!-- Custom Files -->
        <link href="public/back-end/css/helper.css" rel="stylesheet" type="text/css" />
        <link href="public/back-end/css/style.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="public/back-end/js/modernizr.min.js"></script>

    </head>



    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">
                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="/" class="logo"><i class="md md-terrain"></i> <span>TS</span></a>
                    </div>
                </div>
                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>

                            <ul class="nav navbar-nav navbar-right pull-right">
                                </li>
                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="md md-crop-free"></i></a>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->

                    </div>
                </div>
            </div>
            <!-- Top Bar End -->
@include ('layouts.admin-sidebar')
