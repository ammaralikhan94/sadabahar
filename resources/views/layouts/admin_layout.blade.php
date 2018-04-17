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
                        <a href="index.html" class="logo"><span>Ub<i
                                class="md md-album"></i>ld</span></a>
                    </div>
                    <!-- End Logo container-->


                    <div class="menu-extras">

                        <ul class="nav navbar-nav navbar-right pull-right">
                            <li class="navbar-c-items">
                                <form role="search" class="navbar-left app-search pull-left hidden-xs">
                                     <input type="text" placeholder="Search..." class="form-control">
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
                                    <li><a href="javascript:void(0)"><i class="ti-power-off text-danger m-r-10"></i> Logout</a></li>
                                </ul>
                            </li>
                        </ul>
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

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="btn-group pull-right m-t-15">
                            <button type="button" class="btn btn-default dropdown-toggle waves-effect" data-toggle="dropdown" aria-expanded="false">Settings <span class="m-l-5"><i class="fa fa-cog"></i></span></button>
                            <ul class="dropdown-menu drop-menu-right" role="menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </div>
                        <h4 class="page-title">Welcome {{Auth::user()->name}}</h4>
                        <p class="text-muted page-title-alt">Welcome to <strong>Sadabahar</strong> ERP SYSTEM !</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="widget-panel widget-style-2 bg-white">
                            <i class="md md-attach-money text-primary"></i>
                            <h2 class="m-0 text-dark counter font-600">50568</h2>
                            <div class="text-muted m-t-5">Total Revenue</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="widget-panel widget-style-2 bg-white">
                            <i class="md md-add-shopping-cart text-pink"></i>
                            <h2 class="m-0 text-dark counter font-600">1256</h2>
                            <div class="text-muted m-t-5">Sales</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="widget-panel widget-style-2 bg-white">
                            <i class="md md-store-mall-directory text-info"></i>
                            <h2 class="m-0 text-dark counter font-600">18</h2>
                            <div class="text-muted m-t-5">Stores</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="widget-panel widget-style-2 bg-white">
                            <i class="md md-account-child text-custom"></i>
                            <h2 class="m-0 text-dark counter font-600">8564</h2>
                            <div class="text-muted m-t-5">Users</div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box">
                            <h4 class="text-dark header-title m-t-0">Total Revenue</h4>

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="text-center">
                                        <ul class="list-inline chart-detail-list">
                                            <li>
                                                <h5><i class="fa fa-circle m-r-5" style="color: #36404a;"></i>Desktops</h5>
                                            </li>
                                            <li>
                                                <h5><i class="fa fa-circle m-r-5" style="color: #5d9cec;"></i>Tablets</h5>
                                            </li>
                                            <li>
                                                <h5><i class="fa fa-circle m-r-5" style="color: #bbbbbb;"></i>Mobiles</h5>
                                            </li>
                                        </ul>
                                    </div>

                                    <div id="morris-area-with-dotted" style="height: 300px;"></div>

                                </div>



                                 <div class="col-md-4">

                                    <p class="font-600">iMacs <span class="text-primary pull-right">80%</span></p>
                                    <div class="progress m-b-30">
                                      <div class="progress-bar progress-bar-primary progress-animated wow animated" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                      </div><!-- /.progress-bar .progress-bar-danger -->
                                    </div><!-- /.progress .no-rounded -->

                                    <p class="font-600">iBooks <span class="text-pink pull-right">50%</span></p>
                                    <div class="progress m-b-30">
                                      <div class="progress-bar progress-bar-pink progress-animated wow animated" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                                      </div><!-- /.progress-bar .progress-bar-pink -->
                                    </div><!-- /.progress .no-rounded -->

                                    <p class="font-600">iPhone 5s <span class="text-info pull-right">70%</span></p>
                                    <div class="progress m-b-30">
                                      <div class="progress-bar progress-bar-info progress-animated wow animated" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                                      </div><!-- /.progress-bar .progress-bar-info -->
                                    </div><!-- /.progress .no-rounded -->

                                    <p class="font-600">iPhone 6 <span class="text-warning pull-right">65%</span></p>
                                    <div class="progress m-b-30">
                                      <div class="progress-bar progress-bar-warning progress-animated wow animated" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100" style="width: 65%">
                                      </div><!-- /.progress-bar .progress-bar-warning -->
                                    </div><!-- /.progress .no-rounded -->

                                    <p class="font-600">iPhone 6s <span class="text-success pull-right">40%</span></p>
                                    <div class="progress m-b-30">
                                      <div class="progress-bar progress-bar-success progress-animated wow animated" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                      </div><!-- /.progress-bar .progress-bar-success -->
                                    </div><!-- /.progress .no-rounded -->


                                </div>



                            </div>

                            <!-- end row -->

                        </div>

                    </div>



                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-lg-4">
                        <div class="card-box">
                            <div class="bar-widget">
                                <div class="table-box">
                                    <div class="table-detail">
                                        <div class="iconbox bg-info">
                                            <i class="icon-layers"></i>
                                        </div>
                                    </div>

                                    <div class="table-detail">
                                       <h4 class="m-t-0 m-b-5"><b>1256</b></h4>
                                       <h5 class="text-muted m-b-0 m-t-0">Visiters</h5>
                                    </div>
                                    <div class="table-detail text-right">
                                        <span data-plugin="peity-bar" data-colors="#34d3eb,#ebeff2" data-width="120" data-height="45">5,3,9,6,5,9,7,3,5,2,9,7,2,1</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card-box">
                            <div class="bar-widget">
                                <div class="table-box">
                                    <div class="table-detail">
                                        <div class="iconbox bg-custom">
                                            <i class="icon-layers"></i>
                                        </div>
                                    </div>

                                    <div class="table-detail">
                                       <h4 class="m-t-0 m-b-5"><b>1256</b></h4>
                                       <h5 class="text-muted m-b-0 m-t-0">Visiters</h5>
                                    </div>
                                    <div class="table-detail text-right">
                                        <span data-plugin="peity-pie" data-colors="#5fbeaa,#ebeff2" data-width="50" data-height="45">1/5</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card-box">
                            <div class="bar-widget">
                                <div class="table-box">
                                    <div class="table-detail">
                                        <div class="iconbox bg-danger">
                                            <i class="icon-layers"></i>
                                        </div>
                                    </div>

                                    <div class="table-detail">
                                       <h4 class="m-t-0 m-b-5"><b>1256</b></h4>
                                       <h5 class="text-muted m-b-0 m-t-0">Visiters</h5>
                                    </div>
                                    <div class="table-detail text-right">
                                        <span data-plugin="peity-donut" data-colors="#f05050,#ebeff2" data-width="50" data-height="45">1/5</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="row">
                    <!-- Transactions -->
                    <div class="col-lg-4">
                        <div class="card-box">
                            <h4 class="m-t-0 m-b-20 header-title"><b>Last Transactions</b></h4>

                            <div class="nicescroll mx-box">
                                <ul class="list-unstyled transaction-list m-r-5">
                                    <li>
                                        <i class="ti-download text-success"></i>
                                        <span class="tran-text">Advertising</span>
                                        <span class="pull-right text-success tran-price">+$230</span>
                                        <span class="pull-right text-muted">07/09/2015</span>
                                        <span class="clearfix"></span>
                                    </li>

                                    <li>
                                        <i class="ti-upload text-danger"></i>
                                        <span class="tran-text">Support licence</span>
                                        <span class="pull-right text-danger tran-price">-$965</span>
                                        <span class="pull-right text-muted">07/09/2015</span>
                                        <span class="clearfix"></span>
                                    </li>

                                    <li>
                                        <i class="ti-download text-success"></i>
                                        <span class="tran-text">Extended licence</span>
                                        <span class="pull-right text-success tran-price">+$830</span>
                                        <span class="pull-right text-muted">07/09/2015</span>
                                        <span class="clearfix"></span>
                                    </li>

                                    <li>
                                        <i class="ti-download text-success"></i>
                                        <span class="tran-text">Advertising</span>
                                        <span class="pull-right text-success tran-price">+$230</span>
                                        <span class="pull-right text-muted">05/09/2015</span>
                                        <span class="clearfix"></span>
                                    </li>

                                    <li>
                                        <i class="ti-upload text-danger"></i>
                                        <span class="tran-text">New plugins added</span>
                                        <span class="pull-right text-danger tran-price">-$452</span>
                                        <span class="pull-right text-muted">05/09/2015</span>
                                        <span class="clearfix"></span>
                                    </li>

                                    <li>
                                        <i class="ti-download text-success"></i>
                                        <span class="tran-text">Google Inc.</span>
                                        <span class="pull-right text-success tran-price">+$230</span>
                                        <span class="pull-right text-muted">04/09/2015</span>
                                        <span class="clearfix"></span>
                                    </li>

                                    <li>
                                        <i class="ti-upload text-danger"></i>
                                        <span class="tran-text">Facebook Ad</span>
                                        <span class="pull-right text-danger tran-price">-$364</span>
                                        <span class="pull-right text-muted">03/09/2015</span>
                                        <span class="clearfix"></span>
                                    </li>

                                    <li>
                                        <i class="ti-download text-success"></i>
                                        <span class="tran-text">New sale</span>
                                        <span class="pull-right text-success tran-price">+$230</span>
                                        <span class="pull-right text-muted">03/09/2015</span>
                                        <span class="clearfix"></span>
                                    </li>

                                    <li>
                                        <i class="ti-download text-success"></i>
                                        <span class="tran-text">Advertising</span>
                                        <span class="pull-right text-success tran-price">+$230</span>
                                        <span class="pull-right text-muted">29/08/2015</span>
                                        <span class="clearfix"></span>
                                    </li>

                                    <li>
                                        <i class="ti-upload text-danger"></i>
                                        <span class="tran-text">Support licence</span>
                                        <span class="pull-right text-danger tran-price">-$854</span>
                                        <span class="pull-right text-muted">27/08/2015</span>
                                        <span class="clearfix"></span>
                                    </li>


                                </ul>
                            </div>
                        </div>

                    </div> <!-- end col -->

                    <!-- CHAT -->
                    <div class="col-lg-4">
                        <div class="card-box">
                            <h4 class="m-t-0 m-b-20 header-title"><b>Chat</b></h4>

                            <div class="chat-conversation">
                                <ul class="conversation-list nicescroll">
                                    <li class="clearfix">
                                        <div class="chat-avatar">
                                            <img src="{{URL('/')}}/backend/images/avatar-1.jpg" alt="male">
                                            <i>10:00</i>
                                        </div>
                                        <div class="conversation-text">
                                            <div class="ctext-wrap">
                                                <i>John Deo</i>
                                                <p>
                                                    Hello!
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="clearfix odd">
                                        <div class="chat-avatar">
                                            <img src="{{URL('/')}}/backend/images/users/avatar-5.jpg" alt="Female">
                                            <i>10:01</i>
                                        </div>
                                        <div class="conversation-text">
                                            <div class="ctext-wrap">
                                                <i>Smith</i>
                                                <p>
                                                    Hi, How are you? What about our next meeting?
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="clearfix">
                                        <div class="chat-avatar">
                                            <img src="{{URL('/')}}/backend/images/avatar-1.jpg" alt="male">
                                            <i>10:01</i>
                                        </div>
                                        <div class="conversation-text">
                                            <div class="ctext-wrap">
                                                <i>John Deo</i>
                                                <p>
                                                    Yeah everything is fine
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="clearfix odd">
                                        <div class="chat-avatar">
                                            <img src="{{URL('/')}}/backend/images/users/avatar-5.jpg" alt="male">
                                            <i>10:02</i>
                                        </div>
                                        <div class="conversation-text">
                                            <div class="ctext-wrap">
                                                <i>Smith</i>
                                                <p>
                                                    Wow that's great
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <div class="row">
                                    <div class="col-sm-9 chat-inputbar">
                                        <input type="text" class="form-control chat-input" placeholder="Enter your text">
                                    </div>
                                    <div class="col-sm-3 chat-send">
                                        <button type="submit" class="btn btn-md btn-info btn-block waves-effect waves-light">Send</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div> <!-- end col-->


                    <!-- Todos app -->
                    <div class="col-lg-4">
                        <div class="card-box">
                            <h4 class="m-t-0 m-b-20 header-title"><b>Todo</b></h4>
                            <div class="todoapp">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h4 id="todo-message"><span id="todo-remaining"></span> of <span id="todo-total"></span> remaining</h4>
                                    </div>
                                    <div class="col-sm-6">
                                        <a href="" class="pull-right btn btn-primary btn-sm waves-effect waves-light" id="btn-archive">Archive</a>
                                    </div>
                                </div>

                                <ul class="list-group no-margn nicescroll todo-list" style="height: 280px" id="todo-list"></ul>

                                 <form name="todo-form" id="todo-form" role="form" class="m-t-20">
                                    <div class="row">
                                        <div class="col-sm-9 todo-inputbar">
                                            <input type="text" id="todo-input-text" name="todo-input-text" class="form-control" placeholder="Add new todo">
                                        </div>
                                        <div class="col-sm-3 todo-send">
                                            <button class="btn-primary btn-md btn-block btn waves-effect waves-light" type="button" id="todo-btn-submit">Add</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div> <!-- end col -->
                </div> <!-- end row -->


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