<div class="navbar-custom">
<div class="container">
    <div id="navigation">
        <!-- Navigation Menu-->
        <ul class="navigation-menu">
            <li class="has-submenu bg-danger-hvr">
                <a href="{{URl('/')}}"><i class="md md-dashboard"></i>Dashboard</a></li>
            {{-- <li class="has-submenu">
                <a href="#"><i class="fa fa-user-plus"></i></i>Users</a>
                <ul class="submenu">
                    <li><a href="{{route('createSubadmin')}}"><i class="fa fa-user-plus"></i> Create Sub Admin</a></li>
                    <li><a href="{{route('list_subadmin')}}"><i class="fa  fa-list "></i></i></i> List Sub Admin</a></li>
                </ul>
            </li> --}}
           <li class="has-submenu">
               <li class="bg-warning-hvr"><a href="{{route('create_supplier')}}"><i class="fa  fa-truck "></i> Add Supplier</a></li>
            </li> 
            <li class="has-submenu">
                <li class="bg-success-hvr"><a href="{{route('create_customer')}}"><i class="fa fa-street-view"></i>Customer</a></li>                       
            </li>   
            <li class="has-submenu bg-info-hvr">
             <a href="#"><i class="fa fa-opencart"></i>Purchase</a>
                <ul class="submenu megamenu">
                    <li>
                        <ul>
                            <li><a href="{{route('create_inventory')}}" class="bg-info-hvr"><i class="fa fa-opencart"></i>Add Purchase</a></li>
                            <li><a href="{{route('return_purchase')}}" class="bg-info-hvr"><i class="fa  fa-list  "></i>Purchase Return</a></li>
                            <li><a href="{{route('purchase_exchange')}}" class="bg-info-hvr"><i class="fa  fa-list  "></i>Purchase Exchange</a></li>
                        </ul>
                    </li>
                </ul>       
            </li> 
             <li class="has-submenu bg-inverse-hvr">
                <a href="{{route('create_sale')}}"><i class="fa fa-opencart"></i>Sale</a></li>
            </li>  
           {{--  <li class="has-submenu">
             <a href="#"><i class="fa fa-shopping-basket"></i>Product Sale</a>
                <ul class="submenu megamenu">
                    <li>
                        <ul>
                            <li><a href="{{route('create_sale')}}"><i class="fa fa-shopping-basket"></i> Add Sale</a></li>
                            <li><a href="{{route('list_inventory')}}"><i class="fa  fa-list  "></i>  List Sale</a></li>
                        </ul>
                    </li>
                </ul>       
            </li>  --}}
            <li class="has-submenu">

                <li><a href="{{route('create_items')}}"><i class="fa fa-wrench"></i> Add Storage Type</a></li>
                <!-- <li><a href="{{route('list_items')}}"><i class="fa  fa-list  "></i>  List Storage Type</a></li> -->

                <li class="bg-purple-hvr"><a href="{{route('create_items')}}"><i class="fa fa-database"></i>Storage Type</a></li>                       

            </li>  
            

            <li class="has-submenu bg-inverse-hvr">
                <a href="{{route('create_charter')}}"><i class="fa fa-opencart"></i>Add New Item</a></li>
            </li>  


            <li class="has-submenu bg-inverse-hvr">
                <a href="{{route('list_barrel')}}"><i class="fa  fa-bitbucket"></i>Inventory</a></li>
            </li>  
             {{-- <li class="has-submenu">
                <a href="{{route('get_invoice')}}"><i class="fa  fa-bitbucket"></i>Invoice</a></li>
                      
            </li>   --}}
            {{-- <li class="has-submenu">
             <a href="#"><i class="fa  fa-money"></i>Expense</a>
                <ul class="submenu megamenu">
                    <li>
                        <ul>
                            <li><a href="{{route('create_expense')}}"><i class="fa  fa-money"></i> Regular Expense</a></li>
                            <li><a href="{{route('create_expense')}}"><i class="fa  fa-money"></i> Fixed Expense</a></li>
                            <li><a href="{{route('create_expense')}}"><i class="fa  fa-money"></i> salary Expense </a></li>
                            
                        </ul>
                    </li>
                </ul>       
            </li>  --}}
           <li class="has-submenu bg-danger-hvr">
             <a href="#"><i class="fa   fa-eyedropper"></i>Items</a>
                <ul class="submenu megamenu">
                    <li>
                        <ul>
                            <li><a href="{{route('create_charter')}}" class="bg-danger-hvr"><i class="fa  fa-bitbucket"></i>Chart of items</a></li>
                           <li><a href="{{route('list_inventory')}}" class="bg-danger-hvr"><i class="fa  fa-list  "></i>List Of Items</a></li>
                        </ul>
                    </li>
                </ul>       
            </li> 
            <li class="has-submenu bg-warning-hvr">
             <a href="#"><i class="fa  fa-info"></i>General</a>
                <ul class="submenu megamenu">
                    <li>
                        <ul>
                            <li><a href="{{route('create_brand')}}" class="bg-warning-hvr"><i class="fa  fa-tag"></i>Brands</a></li>
                            <!-- <li><a href="{{route('list_brand')}}"><i class="fa  fa-bitbucket"></i>List Brand</a></li> -->
                            <li><a href="{{route('create_bank')}}" class="bg-warning-hvr"><i class="fa  fa-university"></i>Banks</a></li>
                            <!-- <li><a href="{{route('list_bank')}}"><i class="fa  fa-bitbucket"></i>List Bank</a></li> -->
                        </ul>
                    </li>
                </ul>       
            </li> 
        </ul>
        <!-- End navigation menu        -->
    </div>
</div> <!-- end container -->
</div> <!-- end navbar-custom -->