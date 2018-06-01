@extends('layouts.admin_layout')
@section('title')
    Edit - Customer
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
                <h4 class="m-t-0 header-title"><b>Edit Customer</b></h4>
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-horizontal" action="{{route('update_customer')}}" method="post">
                            {{csrf_field()}}
                            <div class="form-group col-md-6">
                                <label class="col-md-2 control-label">Name</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="name" value="{{$customer->name}}" required="">
                                </div>
                            </div>
                    
                            <div class="form-group col-md-6">
                                <label class="col-md-2 control-label">Number</label>
                                <div class="col-md-10">
                                    <input type="number" class="form-control" value="{{$customer->phone_number}}" name="phone_number" placeholder="Number" required="">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="col-md-2 control-label">Location</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" value="{{$customer->address}}" name="address" placeholder="address"  required="">
                                </div>
                            </div>

                            <div class="form-group col-md-6" style="display: none">
                                <label class="col-md-2 control-label">Payment Status</label>
                                <div class="col-md-10">
                                    <select class="form-control"  id="payment_status" name="cheque_status">
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
                                        <option value="cash" {{($customer->payment_mode = 'cash')?'selected':''}}>Cash</option>
                                        <option value="credit_limit" {{($customer->payment_mode = 'credit_limit')?'selected':''}}>Set credit limit</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-6" style="display: none" id="credit_limit" >
                                <label class="col-md-2 control-label">Credit Amount limit</label>
                                <div class="col-md-10">
                                    <input type="numebr" class="form-control" value="{{$customer_amount_limit->customer_amount_limit}}" name="customer_amount_limit" value="0"  >
                                </div>
                            </div>

                            <div class="form-group col-md-6" style="display: none" id="credit_date_limit" >
                                <label class="col-md-2 control-label">Credit Date limit</label>
                                <div class="col-md-10">
                                    <input type="numebr" class="form-control" value="{{$customer_amount_limit->credit_date_limit}}" name="credit_date_limit" value="0"  >
                                </div>
                            </div>
                            <input type="hidden" name="customer_id" value="{{$customer->id}}">
                            <div class="form-group col-md-6" style="display: none" id="cheque_date_limit" >
                                <label class="col-md-2 control-label">Due Days Cheque limit</label>
                                <div class="col-md-10">
                                    <input type="number" class="form-control" value="{{$customer_cheque_bounce->cheque_date_limit}}" name="cheque_date_limit" placeholder="In days"  >
                                </div>
                            </div>

                            <div class="form-group col-md-6" style="display: none" id="cheque_amount_limit" >
                                <label class="col-md-2 control-label">Due Cheque Amount limit</label>
                                <div class="col-md-10">
                                    <input type="numebr" class="form-control" value="{{$customer_cheque_bounce->cheque_date_amount}}" name="cheque_date_amount" value="0"  >
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
                    $('#credit_date_limit').show('slow');
                    $('#cheque_date_limit').show('slow');                
                    $('#cheque_amount_limit').show('slow');
                    $('#credit_limit').attr("required", true);
                    $('#credit_date_limit').attr("required", true);
                    $('#cheque_date_limit').attr("required", true);                
                    $('#cheque_amount_limit').attr("required", true);                        
                }else{
                    $('#credit_limit').hide('slow');
                    $('#credit_date_limit').hide('slow');
                    $('#cheque_date_limit').hide('slow');                
                    $('#cheque_amount_limit').hide('slow');
                    $('#credit_limit').attr("required", false);
                    $('#credit_date_limit').attr("required", false);
                    $('#cheque_date_limit').attr("required", false);                
                    $('#cheque_amount_limit').attr("required", false);   
                }
            });
            $(document).ready( function (){
                var value = $('#payment_mode').val();
                if(value == 'credit_limit'){
                    $('#credit_limit').show('slow');
                    $('#credit_date_limit').show('slow');
                    $('#cheque_date_limit').show('slow');                
                    $('#cheque_amount_limit').show('slow');
                    $('#credit_limit').attr("required", true);
                    $('#credit_date_limit').attr("required", true);
                    $('#cheque_date_limit').attr("required", true);                
                    $('#cheque_amount_limit').attr("required", true);                        
                }else{
                    $('#credit_limit').hide('slow');
                    $('#credit_date_limit').hide('slow');
                    $('#cheque_date_limit').hide('slow');                
                    $('#cheque_amount_limit').hide('slow');
                    $('#credit_limit').attr("required", false);
                    $('#credit_date_limit').attr("required", false);
                    $('#cheque_date_limit').attr("required", false);                
                    $('#cheque_amount_limit').attr("required", false);   
                }
            });
        </script>
    @endsection
@endsection