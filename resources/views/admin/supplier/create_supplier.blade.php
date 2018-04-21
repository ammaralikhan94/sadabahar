@extends('layouts.admin_layout')
@section('title')
	Add - Subadmin
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
                <h4 class="m-t-0 header-title"><b>Create Supplier</b></h4>
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-horizontal" action="{{route('insert_supplier')}}" method="post">
                        	{{csrf_field()}}
                            <div class="form-group col-md-6">
                                <label class="col-md-2 control-label">Name</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="name" required="">
                                </div>
                            </div>
                    
                            <div class="form-group col-md-6">
                                <label class="col-md-2 control-label">Number</label>
                                <div class="col-md-10">
                                    <input type="number" class="form-control" name="phone_number" placeholder="Number" required="">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="col-md-2 control-label">Location</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="address" placeholder="address"  required="">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="col-md-2 control-label">Payment Status</label>
                                <div class="col-md-10">
                                    <select class="form-control" required="" id="payment_status" name="cheque_status">
                                        <option value="">Select Payment Status</option>
                                        <option value="cleared">Cleared</option>
                                        <option value="due">Due</option>
                                        <option value="bounced">Bounced</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group col-md-6" style="display: none" id="due_date" >
                                <label class="col-md-2 control-label">Due Date</label>
                                <div class="col-md-10">
                                    <input type="date" class="form-control" name="due_date" placeholder="due date" value="0"  >
                                </div>
                            </div>

                            <div class="form-group col-md-6" style="display: none" id="due_amount" >
                                <label class="col-md-2 control-label">Due Amount</label>
                                <div class="col-md-10">
                                    <input type="numebr" class="form-control" name="due_amount" value="0"  >
                                </div>
                            </div>
                         
                            <div class="form-group col-md-6">
                                <label class="col-md-2 control-label">Payment Mode</label>
                                <div class="col-md-10">
                                    <select class="form-control" required="" name="payment_mode" id="payment_mode">
                                        <option value="">Select Payment Mode</option>
                                        <option value="cash">Cash</option>
                                        <option value="credit_limit">Set credit limit</option>
                                        <option value="post_dated_cheques">Post-dated cheques</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-6" style="display: none" id="credit_limit" >
                                <label class="col-md-2 control-label">Amount limit</label>
                                <div class="col-md-10">
                                    <input type="numebr" class="form-control" name="supplier_amount_limit" value="0"  >
                                </div>
                            </div>

                            <div class="form-group col-md-6" style="display: none" id="cheque_date_limit" >
                                <label class="col-md-2 control-label">Due Date limit</label>
                                <div class="col-md-10">
                                    <input type="number" class="form-control" name="cheque_date_limit" placeholder="In days"  >
                                </div>
                            </div>

                            <div class="form-group col-md-6" style="display: none" id="cheque_amount_limit" >
                                <label class="col-md-2 control-label">Due Amount limit</label>
                                <div class="col-md-10">
                                    <input type="numebr" class="form-control" name="cheque_amount_limit" value="0"  >
                                </div>
                            </div>


                            <div class="form-group col-md-6 pull-right">
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
            $(document).on('change' ,'#payment_status', function (){
                var value = $(this).val();
                if(value == 'due'){
                    $('#due_date').show('slow');
                    $('#due_amount').show('slow');                
                }else{
                    $('#due_date').hide('slow');
                    $('#due_amount').hide('slow');       
                }
            });
            $(document).on('change' ,'#payment_mode', function (){
                var value = $(this).val();
                if(value == 'credit_limit'){
                    $('#credit_limit').show('slow');
                    $('#cheque_date_limit').hide('slow');                
                    $('#cheque_amount_limit').hide('slow');            
                }
                
                if(value == 'post_dated_cheques'){
                    $('#cheque_date_limit').show('slow');                
                    $('#cheque_amount_limit').show('slow');         
                    $('#credit_limit').hide('slow');         
                }
            });
        </script>
    @endsection
@endsection