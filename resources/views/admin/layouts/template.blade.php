<!doctype html>
<html class="fixed sidebar-left-xs">
    <head>

        <!-- Basic -->
        <meta charset="UTF-8">

        <title>Admin</title>
        <meta name="keywords" content="ผู้ใช้งาน" />
        <meta name="description" content="ผู้ใช้งาน">


        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <!-- Load It Like A Native App -->
        <meta name="apple-touch-fullscreen" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <!-- Bootstrap Core CSS -->
    @include('admin.layouts.inc-stylesheet')
	@yield('admin.stylesheet')

</head>

<body class="loading-overlay-showing" data-loading-overlay>
        <span class="loading-overlay dark">
            <span class="loader white"></span>
        </span>

    <section class="body">


        <header class="header">
                <div class="logo-container">
                    <a href="#" class="logo pull-left">
                    <img src="{{url('master/assets/image/TOP657971755logo-website.png')}}" height="40"  />
                </a>
                    <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened"
                    data-target="html" data-fire-event="sidebar-left-opened">
                        <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                    </div>
                </div>

                <!-- start: search & user box -->
                @include('admin.layouts.inc-header')
                <!-- end: search & user box -->
            </header>
            <!-- end: header -->


<div class="inner-wrapper">
@include('admin.layouts.inc-left-slidebar')


                @yield('admin.content')

                <!-- /.row -->
   </div>
@include('admin.layouts.inc-right-sidebar')
    </section>
    <!-- /#section -->

    <!-- jQuery -->
	@include('admin.layouts.inc-scripts')
    @yield('scripts')








</body>

</html>
