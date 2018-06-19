<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">
        <!-- App Favicon icon -->
        <link rel="shortcut icon" href="{{URL('/')}}/backend/images/favicon.ico">
        <!-- App Title -->
        <title>@yield('title')</title>

        <!--Morris Chart CSS -->
		<link rel="stylesheet" href="{{URL('/')}}/backend/plugins/morris/morris.css">
        <!-- Sweet Alert css -->
        <link href="{{URL('/')}}/backend/plugins/bootstrap-sweetalert/sweet-alert.css" rel="stylesheet" type="text/css">

        <link href="{{URL('/')}}/backend/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="{{URL('/')}}/backend/css/core.css" rel="stylesheet" type="text/css" />
        <link href="{{URL('/')}}/backend/css/components.css" rel="stylesheet" type="text/css" />
        <link href="{{URL('/')}}/backend/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="{{URL('/')}}/backend/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="{{URL('/')}}/backend/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="{{URL('/')}}/backend/css/responsive.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        @yield('customCss')
        <script src="{{URL('/')}}/backend/js/modernizr.min.js"></script>

    </head>


    <body>


        <!-- Navigation Bar-->
        <header id="topnav">
            <div class="topbar-main">
                <div class="container">

                    <!-- Logo container-->
                    <div class="logo">
                        <a href="{{route('home')}}" class="logo"><span>SADA BAHAR</span></a>
                    </div>
                    <!-- End Logo container-->


                    <div class="menu-extras">

                        <ul class="nav navbar-nav navbar-right pull-right">
                            <li class="navbar-c-items">
                                <form role="search" class="navbar-left app-search pull-left hidden-xs">
                                     <input type="text" id="mysearch" placeholder="Search..." class="form-control">
                                     <a href=""><i class="fa fa-search"></i></a>
                                </form>
                            </li>
                            <li class="dropdown navbar-c-items">
                                <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                    <i class="icon-bell"></i> <span class="badge badge-xs badge-danger">3</span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-lg">
                                    <li class="notifi-title"><span class="label label-default pull-right">New 3</span>Notification</li>
                                    <li class="list-group slimscroll-noti notification-list">
                                       <!-- list item-->
                                       <a href="javascript:void(0);" class="list-group-item">
                                          <div class="media">
                                             <div class="pull-left p-r-10">
                                                <em class="fa fa-diamond noti-primary"></em>
                                             </div>
                                             <div class="media-body">
                                                <h5 class="media-heading">A new order has been placed A new order has been placed</h5>
                                                <p class="m-0">
                                                    <small>There are new settings available</small>
                                                </p>
                                             </div>
                                          </div>
                                       </a>

                                       <!-- list item-->
                                       <a href="javascript:void(0);" class="list-group-item">
                                          <div class="media">
                                             <div class="pull-left p-r-10">
                                                <em class="fa fa-cog noti-warning"></em>
                                             </div>
                                             <div class="media-body">
                                                <h5 class="media-heading">New settings</h5>
                                                <p class="m-0">
                                                    <small>There are new settings available</small>
                                                </p>
                                             </div>
                                          </div>
                                       </a>

                                       <!-- list item-->
                                       <a href="javascript:void(0);" class="list-group-item">
                                          <div class="media">
                                             <div class="pull-left p-r-10">
                                                <em class="fa fa-bell-o noti-custom"></em>
                                             </div>
                                             <div class="media-body">
                                                <h5 class="media-heading">Updates</h5>
                                                <p class="m-0">
                                                    <small>There are <span class="text-primary font-600">2</span> new updates available</small>
                                                </p>
                                             </div>
                                          </div>
                                       </a>

                                       <!-- list item-->
                                       <a href="javascript:void(0);" class="list-group-item">
                                          <div class="media">
                                             <div class="pull-left p-r-10">
                                                <em class="fa fa-user-plus noti-pink"></em>
                                             </div>
                                             <div class="media-body">
                                                <h5 class="media-heading">New user registered</h5>
                                                <p class="m-0">
                                                    <small>You have 10 unread messages</small>
                                                </p>
                                             </div>
                                          </div>
                                       </a>

                                        <!-- list item-->
                                       <a href="javascript:void(0);" class="list-group-item">
                                          <div class="media">
                                             <div class="pull-left p-r-10">
                                                <em class="fa fa-diamond noti-primary"></em>
                                             </div>
                                             <div class="media-body">
                                                <h5 class="media-heading">A new order has been placed A new order has been placed</h5>
                                                <p class="m-0">
                                                    <small>There are new settings available</small>
                                                </p>
                                             </div>
                                          </div>
                                       </a>

                                       <!-- list item-->
                                       <a href="javascript:void(0);" class="list-group-item">
                                          <div class="media">
                                             <div class="pull-left p-r-10">
                                                <em class="fa fa-cog noti-warning"></em>
                                             </div>
                                             <div class="media-body">
                                                <h5 class="media-heading">New settings</h5>
                                                <p class="m-0">
                                                    <small>There are new settings available</small>
                                                </p>
                                             </div>
                                          </div>
                                       </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="list-group-item text-right">
                                            <small class="font-600">See all notifications</small>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="dropdown navbar-c-items">
                                <a href="" class="dropdown-toggle waves-effect waves-light profile" data-toggle="dropdown" aria-expanded="true"><img src="{{URL('/')}}/backend/images/users/avatar-1.jpg" alt="user-img" class="img-circle"> </a>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0)"><i class="ti-user text-custom m-r-10"></i> Profile</a></li>
                                    <li><a href="javascript:void(0)"><i class="ti-settings text-custom m-r-10"></i> Settings</a></li>
                                    <li><a href="javascript:void(0)"><i class="ti-lock text-custom m-r-10"></i> Lock screen</a></li>
                                    <li class="divider"></li>
                                    <li><a href="{{ route('logout') }}"
                                            ><i class="ti-power-off text-danger m-r-10"></i> Logout</a></li>
                                </ul>
                            </li>
                        </ul>{{-- onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" --}}
                        <div class="menu-item">
                            <!-- Mobile menu toggle-->
                            <a class="navbar-toggle">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </div>
                    </div>

                </div>
            </div>

            
            @include('includes.admin_navbar')
        </header>
        <!-- End Navigation Bar-->


        <div class="wrapper">
            <div class="container">

                @yield('content')

                <!-- Footer -->
                <footer class="footer text-right">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-6">
                                © 2016. All rights reserved.
                            </div>
                            <div class="col-xs-6">
                                <ul class="pull-right list-inline m-b-0">
                                    <li>
                                        <a href="#">About</a>
                                    </li>
                                    <li>
                                        <a href="#">Help</a>
                                    </li>
                                    <li>
                                        <a href="#">Contact</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- End Footer -->

            </div>
        </div>



        <!-- jQuery  -->
        <script src="{{URL('/')}}/backend/js/jquery.min.js"></script>
        <script src="{{URL('/')}}/backend/js/bootstrap.min.js"></script>
        <script src="{{URL('/')}}/backend/js/detect.js"></script>
        <script src="{{URL('/')}}/backend/js/fastclick.js"></script>
        <script src="{{URL('/')}}/backend/js/jquery.slimscroll.js"></script>
        <script src="{{URL('/')}}/backend/js/jquery.blockUI.js"></script>
        <script src="{{URL('/')}}/backend/js/waves.js"></script>
        <script src="{{URL('/')}}/backend/js/wow.min.js"></script>
        <script src="{{URL('/')}}/backend/js/jquery.nicescroll.js"></script>
        <script src="{{URL('/')}}/backend/js/jquery.scrollTo.min.js"></script>

        <!-- Moment js  -->
        <script src="{{URL('/')}}/backend/plugins/moment/moment.js"></script>

        <!-- Morris Chart js -->
        <script src="{{URL('/')}}/backend/plugins/morris/morris.min.js"></script>
        <script src="{{URL('/')}}/backend/plugins/raphael/raphael-min.js"></script>

        <!-- Sweet Alert js -->
        <script src="{{URL('/')}}/backend/plugins/bootstrap-sweetalert/sweet-alert.min.js"></script>

        <!-- Todojs  -->
        <script src="{{URL('/')}}/backend/pages/jquery.todo.js"></script>

        <!-- chatjs  -->
        <script src="{{URL('/')}}/backend/pages/jquery.chat.js"></script>

        <!-- Peity chart -->
        <script src="{{URL('/')}}/backend/plugins/peity/jquery.peity.min.js"></script>

        <!-- App core js -->
		<script src="{{URL('/')}}/backend/js/jquery.core.js"></script>
        <script src="{{URL('/')}}/backend/js/jquery.app.js"></script>

        <!-- Dashboard 2 Js -->
		<script src="{{URL('/')}}/backend/pages/jquery.dashboard_2.js"></script>
    @yield('customScript')
    </body>
</html>