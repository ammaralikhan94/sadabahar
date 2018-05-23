    @extends('layouts.admin_layout')
    @section('title')
    	Add - Chemical
    @endsection
    @section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
        @endif


        @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
    @endif
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">            
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-horizontal" action="{{route('insert_chemical')}}" method="post">
                        	{{csrf_field()}}
                            <div class="col-md-6">
                                <h4 class="m-t-0 header-title"><b>Inventory Categories</b></h4>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-success fa fa-plus pull-right"></button>
                                <button class="btn btn-danger fa fa-trash pull-right"></button>
                            </div>
                            <div class="col-md-12">
                                <hr>
                            </div>
                            <div class="form-group col-md-6">
                                <select class="form-control" required="" name="supplier">
                                    <option value="">Select Supplier</option>                                       
                                </select>
                            </div>
                            <div class="form-group col-md-6">                                
                                <div class="col-md-4">
                                    <input type="text" class="form-control amount" name="chemical_amount" id="chemical_amount" placeholder="Category ID"  required="">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control amount" name="chemical_amount" id="chemical_amount" placeholder="Category Name"  required="">
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-success">Submit</button>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr>
                            </div>
                            <div class="col-md-6">
                                <h4 class="m-t-0 header-title"><b>Sub Inventory Categories</b></h4>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-success fa fa-plus pull-right"></button>
                                <button class="btn btn-danger fa fa-trash pull-right"></button>
                            </div>
                            <div class="col-md-12">
                                <hr>
                            </div>
                            <div class="form-group col-md-6">
                                <select class="form-control" required="" name="supplier">
                                    <option value="">Select Supplier</option>                                       
                                </select>
                            </div>
                            <div class="form-group col-md-6">                                
                                <div class="col-md-4">
                                    <input type="text" class="form-control amount" name="chemical_amount" id="chemical_amount" placeholder="Category ID"  required="">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control amount" name="chemical_amount" id="chemical_amount" placeholder="Category Name"  required="">
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-success">Submit</button>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <hr>
                            </div>
                            <div class="col-md-6">
                                <h4 class="m-t-0 header-title"><b>List of Inventory Items</b></h4>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-success fa fa-plus pull-right"></button>
                                <button class="btn btn-danger fa fa-trash pull-right"></button>
                            </div>
                            <div class="col-md-12">
                                <hr>
                            </div>
                            <div class="form-group col-md-6">
                                <select class="form-control" required="" name="supplier">
                                    <option value="">Select Supplier</option>                                       
                                </select>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">    
                                    <label class="col-md-3 control-label">Item Code</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control amount" name="chemical_amount" id="chemical_amount" placeholder="Item amount"  required="">
                                    </div>                                    
                                </div>
                                <div class="form-group">    
                                    <label class="col-md-3 control-label">Item Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control amount" name="chemical_amount" id="chemical_amount" placeholder="Item amount"  required="">
                                    </div>                                    
                                </div>
                                <div class="form-group">    
                                    <label class="col-md-3 control-label">Item Description</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control amount" name="chemical_amount" id="chemical_amount" placeholder="Item amount"  required="">
                                    </div>                                    
                                </div>
                                <div class="form-group">    
                                    <label class="col-md-3 control-label">Brand Name</label>
                                    <div class="col-md-9">
                                        <select class="form-control" required="" name="supplier">
                                            <option value="">Select Supplier</option>                                       
                                        </select>
                                    </div>                                    
                                </div>
                                <div class="form-group">    
                                    <label class="col-md-3 control-label">Purchase Price</label>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control amount" name="chemical_amount" id="chemical_amount" placeholder="Purchase Price"  required="">
                                    </div>        
                                    <label class="col-md-3 control-label">Purchase Price</label>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control amount" name="chemical_amount" id="chemical_amount" placeholder="Purchase Price"  required="">
                                    </div>                               
                                </div>
                                <div class="form-group">    
                                    <label class="col-md-3 control-label">Measurement Unit</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control amount" name="chemical_amount" id="chemical_amount" placeholder="Measurement Unit"  required="">
                                    </div>                                    
                                </div>

                                <div class="col-md-12">
                                    <label class="col-md-3 control-label">Inactive Item</label>
                                    <div class="checkbox radio-inline">
                                        <input id="checkbox0" type="checkbox">
                                        <label for="checkbox0">
                                            
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection