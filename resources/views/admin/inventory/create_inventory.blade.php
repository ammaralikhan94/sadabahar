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
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="address" placeholder="address"  required="">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="col-md-2 control-label">Purchase Amount</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="address" placeholder="address"  required="">
                                </div>
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label class="col-md-2 control-label">Payment Status</label>
                                <div class="col-md-10">
                                    <select class="form-control" required="" name="payment_status">
                                        <option value="">Select Payment Status</option>
                                        <option value="cleared">Cleared</option>
                                        <option value="new_customer">New Customer</option>
                                        <optgroup label="Due">
                                            <option value="due_date">Due Date</option>
                                            <option value="amount">Due Amount</option>
                                        </optgroup>
                                        <option value="bounced">Bounced</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="col-md-2 control-label">Payment Mode</label>
                                <div class="col-md-10">
                                    <select class="form-control" required="" name="payment_mode" id="payment_mode">
                                        <option value="">Select Payment Status</option>
                                        <option value="cash">Cash</option>
                                        <option value="credit_limit">Set credit limit</option>
                                        <optgroup label="Post Dated Cheques">
                                            <option value="date_limit">Date Limit</option>
                                            <option value="amount_limit">Amount Limit</option>
                                        </optgroup>
                                        <option value="bounced">Bounced</option>
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

@endsection