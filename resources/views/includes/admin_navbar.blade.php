<div class="navbar-custom">
                <div class="container">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">
                            <li class="has-submenu">
                                <a href="{{URl('/')}}"><i class="md md-dashboard"></i>Dashboard</a></li>
                            <li class="has-submenu">
                                <a href="#"><i class="fa fa-user-plus"></i></i>Users</a>
                                <ul class="submenu">
                                    <li><a href="{{route('createSubadmin')}}"><i class="fa fa-user-plus"></i> Create Sub Admin</a></li>
                                    <li><a href="{{route('list_subadmin')}}"><i class="fa  fa-list "></i></i></i> List Sub Admin</a></li>
                                    {{-- <li><a href="ui-loading-buttons.html">Loading Buttons</a></li>
                                    <li><a href="ui-panels.html">Panels</a></li>
                                    <li><a href="ui-portlets.html">Portlets</a></li>
                                    <li><a href="ui-checkbox-radio.html">Checkboxs-Radios</a></li>
                                    <li><a href="ui-tabs.html">Tabs</a></li> 
                                    <li><a href="ui-modals.html">Modals</a></li>
                                    <li><a href="ui-progressbars.html">Progress Bars</a></li>
                                    <li><a href="ui-notification.html">Notification</a></li>
                                    <li><a href="ui-images.html">Images</a></li>
                                    <li><a href="ui-carousel.html">Carousel</a>
                                    <li><a href="ui-video.html">Video</a>
                                    <li><a href="ui-bootstrap.html">Bootstrap UI</a></li>
                                    <li><a href="ui-typography.html">Typography</a></li> --}}
                                </ul>
                            </li>


                           <li class="has-submenu">
                                <a href="#"><i class="fa  fa-truck "></i>Supplier</a>
                                <ul class="submenu megamenu">
                                    <li>
                                        <ul>
                                            <li><a href="{{route('create_supplier')}}"><i class="fa  fa-truck "></i> Add Supplier</a></li>
                                            <li><a href="{{route('list_supplier')}}"><i class="fa  fa-list  "></i> List Supplier</a></li>
                                        </ul>
                                    </li>
                                </ul>       
                            </li> 
                            
                            <li class="has-submenu">
                                <a href="#"><i class="fa fa-street-view"></i>Customer</a>
                                <ul class="submenu megamenu">
                                    <li>
                                        <ul>
                                            <li><a href="{{route('create_customer')}}">Add Customer</a></li>
                                            <li><a href="{{route('list_customer')}}">List Customer</a></li>
                                        </ul>
                                    </li>
                                </ul>       
                            </li>   
                        </ul>
                        <!-- End navigation menu        -->
                    </div>
                </div> <!-- end container -->
            </div> <!-- end navbar-custom -->