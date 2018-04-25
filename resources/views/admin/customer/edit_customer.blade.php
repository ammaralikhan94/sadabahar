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
                        <form class="form-horizontal" action="{{route('update_customer')}}" method="POST">
                        	{{csrf_field()}}
                            <div class="form-group col-md-6">
                                <label class="col-md-2 control-label">Name</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="name" value="{{$customer->name}}" required="">
                                </div>
                            </div>
                           
                            <input type="hidden" name="customer_id" value="{{$customer->id}}">
                            {{-- <div class="form-group col-md-6">
                                <label class="col-md-2 control-label" for="example-email">Password</label>
                                <div class="col-md-10">
                                    <input type="password"  name="password" value="{{$user->password}}" class="form-control" placeholder="Passowrd"  required="">
                                </div>
                            </div>
 --}}
                            <div class="form-group col-md-6">
                                <label class="col-md-2 control-label">Number</label>
                                <div class="col-md-10">
                                    <input type="number" class="form-control" name="phone_number" value="{{$customer->phone_number}}" required="">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="col-md-2 control-label">Location</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="location" placeholder="address" value="{{$customer->location}}"  required="">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="col-md-2 control-label">Cheque Status</label>
                                <div class="col-md-10">
                                    <select class="form-control" required="" name="cheque_status" id="payment_status">
                                        <option value="">Select Payment Status</option>
                                        <option value="cleared" {{($customer->cheque_status == 'cleared')?'selected':''}}>Cleared</option>
                                        <option value="due" {{($customer->cheque_status == 'due')?'selected':''}}>Due</option>
                                        <option value="bounced" {{($customer->cheque_status == 'bounced')?'selected':''}}>Bounced</option>
                                    </select>
                                </div>
                            </div>

                               {{-- <input type="hidden" name="payment_id" value="{{$supplier_payment->id}}"> --}}

                            <div class="form-group col-md-6">
                                <label class="col-md-2 control-label">Payment Mode</label>
                                <div class="col-md-10">
                                    <select class="form-control" required="" name="payment_mode" id="payment_mode">
                                        <option value="">Select Payment Mode</option>
                                        <option value="cash" {{($customer->payment_mode == 'cash')?'selected':''}}>Cash</option>
                                        <option value="credit_limit" {{($customer->payment_mode == 'credit_limit')?'selected':''}}>Set credit limit</option>
                                    </select>
                                </div>
                            </div>   



                           {{-- Payment Amount Limit --}}
                            <div class="form-group col-md-6" id="credit_limit" <?php  if($customer->payment_mode == 'credit_limit'){echo '';}else{?> style="display: none"<?php }?>    id="credit_limit" >
                                <label class="col-md-2 control-label">Amount limit</label>
                                <div class="col-md-10">
                                    <input type="numebr" class="form-control" name="credit_limit" value="{{$customer_amount_limit->customer_amount_limit}}" >
                                </div>
                            </div>
                            {{-- Payment Amount Limit --}}


                            {{-- Payment Mode --}}
                            <div class="form-group col-md-6" id="cheque_due_date"  <?php  if($customer->payment_mode == 'credit_limit'){echo '';}else{?> style="display: none"<?php }?>  >
                                <label class="col-md-2 control-label">Cheque  day limit</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="cheque_date_limit" placeholder="Cheque Due Date" value="{{$customer_cheque_bounce->cheque_date_limit}}"  >
                                </div>
                            </div>

                             <div class="form-group col-md-6" id="cheque_amount_limit" <?php  if($customer->payment_mode == 'credit_limit'){echo '';}else{?> style="display: none"<?php }?> >
                                <label class="col-md-2 control-label">Cheque amount limit</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="cheque_date_amount" placeholder="cheque amount limit" value="{{$customer_cheque_bounce->cheque_date_amount}}"  >
                                </div>
                            </div>
                            {{-- Payment Mode End--}}


                            {{-- Payment Status --}}
                            <div class="form-group col-md-6" id="due_date" <?php  if($customer->cheque_status == 'due'){echo '';}else{?> style="display: none"<?php }?>  >
                                <label class="col-md-2 control-label">Due date</label>
                                <div class="col-md-10">
                                    <input type="date" class="form-control due_date" name="due_date" placeholder="Cheque Due Date" value="{{$customer_payment_limit->due_date}}"  >
                                </div>
                            </div>
                             <div class="form-group col-md-6" id="due_amount" <?php  if($customer->cheque_status == 'due'){echo '';}else{?> style="display: none"<?php }?> >
                                <label class="col-md-2 control-label">Due amount</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control due_amount" name="due_amount" placeholder="cheque amount limit" value="{{$customer_payment_limit->due_amount}}"  >
                                </div>
                            </div>
                            {{-- Payment Status --}}

                        
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
            $(document).ready(function (){
                var value = $("#payment_status").val();
                if(value == 'due_date'){
                    $('#due_date').show('slow');
                    $('#due_amount').hide('slow');
                    $('#due_amount').removeAttr('required');
                }
                if(value == 'amount'){
                    $('#due_date').hide('slow');
                    $('#due_amount').show('slow');
                    $('#due_date').removeAttr('required');
                }
            });

             $(document).on('change' ,'#payment_status', function (){
                var value = $(this).val();
                if(value == 'due'){
                    $('#due_date').show('slow');
                    $('#due_amount').show('slow');
                }
                if(value == 'cleared'){
                    $('#due_date').hide('slow');
                    $('#due_amount').hide('slow');
                    $('#due_date').hide('slow');
                    $('#due_amount').hide('slow');
                    $('.due_date').value('0');
                    $('.due_amount').value('0');
                }
            });

             $(document).on('change' ,'#payment_mode', function (){
                var value = $(this).val();
                if(value == 'credit_limit'){
                    $('#credit_limit').show('slow');
                    $('#cheque_due_date').show('slow');
                    $('#cheque_amount_limit').show('slow');
                }
                if(value == 'cash'){
                    $('#credit_limit').hide('slow');
                    $('#cheque_due_date').hide('slow');
                    $('#cheque_amount_limit').hide('slow');
                }
            });
        </script>
    @endsection
@endsection