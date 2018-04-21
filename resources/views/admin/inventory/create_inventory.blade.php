@extends('layouts.admin_layout')
@section('title')
	Add - Inventory
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
                <h4 class="m-t-0 header-title"><b>Create Inventory</b></h4>
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-horizontal" action="{{route('insert_inventory')}}" method="post">
                        	{{csrf_field()}}
                            <div class="form-group col-md-6">
                                <label class="col-md-2 control-label">Chemical Name</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="chemical_name" required="">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="col-md-2 control-label">Date of Purchase</label>
                                <div class="col-md-10">
                                    <input type="date" class="form-control" name="dop"  required="">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="col-md-2 control-label">Purchase Quanity</label>
                                <div class="col-md-3">
                                    <input type="number" class="form-control" name="quantity" placeholder="quantity"  required="">
                                </div>
                                <label class="col-md-3 control-label">Purchase Quanity Type</label>
                                <div class="col-md-3">
                                    <select class="form-control">
                                        <option value="">Select Type</option>
                                        <option value="kg">Kg</option>
                                        <option value="liter">liter</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="col-md-2 control-label">Chemical Amount</label>
                                <div class="col-md-3">
                                    <input type="number" class="form-control s_amount" name="chemical_amount" id="chemical_amount" placeholder="Chemical amount"  required="">
                                </div>
                                <label class="col-md-3 control-label">Barrel Amount</label>
                                <div class="col-md-3">
                                     <input type="number" class="form-control s_amount" name="barrel_amount" id="barrel_amount" placeholder="barrel amount"  required="">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="col-md-2 control-label">Purchase Amount</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="total_amount" id="total_amount" placeholder="amount"  required="" readonly="">
                                </div>
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label class="col-md-2 control-label">Payment Mode</label>
                                <div class="col-md-10">
                                    <select class="form-control" required="" name="payment_mode" id="payment_mode">
                                        <option value="">Select Payment Status</option>
                                        <option value="cash">Cash</option>
                                        <option value="credit_limit">Set credit limit</option>
                                        <option value="pdc">Post-dated cheques</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group col-md-6">
                            	<label class="col-md-2 control-label"></label>
                                <div class="col-md-10">
                                    <input type="submit" class="form-control btn btn-success"  placeholder="placeholder" value="Save">
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@section('customScript')
    <script type="text/javascript">
        $(document).on('keyup','.s_amount' , function (){
            chemical_amount = $('#chemical_amount').val();
            barrel_amount   = $('#barrel_amount').val();
            chemical_amount = 0;
            total_amount    = parseInt(barrel_amount)  +  chemical_amount;
            $('#total_amount').val(total_amount);
        });
    </script> 
@endsection
@endsection