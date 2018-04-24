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
                                            <li><a href="{{route('create_customer')}}"><i class="fa fa-street-view"></i> Add Customer</a></li>
                                            <li><a href="{{route('list_customer')}}"><i class="fa  fa-list  "></i>  List Customer</a></li>
                                        </ul>
                                    </li>
                                </ul>       
                            </li>   
                            <li class="has-submenu">
                             <a href="#"><i class="fa fa-opencart"></i>Inventory</a>
                                <ul class="submenu megamenu">
                                    <li>
                                        <ul>
                                            <li><a href="{{route('create_inventory')}}"><i class="fa fa-opencart"></i> Add Inventory</a></li>
                                            <li><a href="{{route('list_inventory')}}"><i class="fa  fa-list  "></i>  List Inventory</a></li>
                                        </ul>
                                    </li>
                                </ul>       
                            </li> 
                            <li class="has-submenu">
                             <a href="#"><i class="fa fa-wrench"></i>Add Item Purchase Type</a>
                                <ul class="submenu megamenu">
                                    <li>
                                        <ul>
                                            <li><a href="{{route('create_items')}}"><i class="fa fa-wrench"></i> Add Purchase Type</a></li>
                                            <li><a href="{{route('list_items')}}"><i class="fa  fa-list  "></i>  List Purchase Types</a></li>
                                        </ul>
                                    </li>
                                </ul>       
                            </li>  
                            <li class="has-submenu">
                                <a href="#"><i class="fa  fa-bitbucket"></i>Barrel</a>
                                <ul class="submenu megamenu">
                                    <li>
                                        <ul>
                                            <li><a href="{{route('create_barrel')}}"><i class="fa  fa-bitbucket"></i> Add Barrel</a></li>
                                        </ul>
                                    </li>
                                </ul>       
                            </li>  
                            <li class="has-submenu">
                             <a href="#"><i class="fa  fa-money"></i>Expense</a>
                                <ul class="submenu megamenu">
                                    <li>
                                        <ul>
                                            <li><a href="{{route('create_expense')}}"><i class="fa  fa-money"></i> Add Expense</a></li>
                                            {{-- <li><a href="{{route('list_inventory')}}"><i class="fa  fa-list  "></i>  List Inventory</a></li> --}}
                                        </ul>
                                    </li>
                                </ul>       
                            </li> 
                            <li class="has-submenu">
                             <a href="#"><i class="fa  fa-money"></i>Chemical</a>
                                <ul class="submenu megamenu">
                                    <li>
                                        <ul>
                                            <li><a href="{{route('create_chemical')}}"><i class="fa  fa-money"></i> Add Chemical</a></li>
                                            <li><a href="{{route('list_chemical')}}"><i class="fa  fa-list  "></i>  List Chemical</a></li>
                                        </ul>
                                    </li>
                                </ul>       
                            </li> 
                        </ul>
                        <!-- End navigation menu        -->
                    </div>
                </div> <!-- end container -->
            </div> <!-- end navbar-custom -->