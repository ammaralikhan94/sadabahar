@extends('layouts.admin_layout')
@section('title')
	Edit - Supplier
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
                <h4 class="m-t-0 header-title"><b>Edit Supplier</b></h4>
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-horizontal" action="{{route('update_supplier')}}" method="POST">
                        	{{csrf_field()}}
                            <div class="form-group col-md-6">
                                <label class="col-md-2 control-label">Name</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="name" value="{{$supplier->name}}" required="">
                                </div>
                            </div>
                           
                            <input type="hidden" name="supplier_id" value="{{$supplier->id}}">
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
                                    <input type="number" class="form-control" name="phone_number" value="{{$supplier->phone_number}}" required="">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="col-md-2 control-label">Location</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="address" placeholder="address" value="{{$supplier->address}}"  required="">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="col-md-2 control-label">Cheque Status</label>
                                <div class="col-md-10">
                                    <select class="form-control" required="" name="cheque_status" id="payment_status">
                                        <option value="">Select Payment Status</option>
                                        <option value="cleared" {{($supplier->cheque_status == 'cleared')?'selected':''}}>Cleared</option>
                                        <optgroup label="Due">
                                            <option value="due_date" {{($supplier->cheque_status == 'due_date')?'selected':''}}>Due Date</option>
                                            <option value="amount" {{($supplier->cheque_status == 'amount')?'selected':''}}>Due Amount</option>
                                        </optgroup>
                                        <option value="bounced" {{($supplier->cheque_status == 'bounced')?'selected':''}}>Bounced</option>
                                    </select>
                                </div>
                            </div>

                               <input type="hidden" name="payment_id" value="{{$supplier_payment->id}}">


                             <div class="form-group col-md-6" style="display: none" id="due_date">
                                <label class="col-md-2 control-label">Due date</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="due_date" placeholder="Due date" value="{{$supplier_payment->due_date}}"  >
                                </div>
                            </div>

                             <div class="form-group col-md-6" style="display: none" id="due_amount">
                                <label class="col-md-2 control-label">Due amount</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="due_amount" placeholder="Due amount" value="{{$supplier_payment->due_amount}}"  >
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
        </script>
    @endsection
@endsection