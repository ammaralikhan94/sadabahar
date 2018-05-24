@extends('layouts.admin_layout')
@section('title')
	Add - Expense
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
                <h4 class="m-t-0 header-title"><b>Create Expense</b></h4>
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-horizontal" action="{{route('insert_supplier_amount')}}" method="post">
                        	{{csrf_field()}}
                            
                            <div class="form-group col-md-12">
                                <label class="col-md-2 control-label">Payment Mode</label>
                                <div class="col-md-10">
                                        <div class="checkbox checkbox-warning" style="float: left; margin-right:5px;">
                                            <input  type="checkbox" name="credit_limit" id="credit_amount_check"  value="credit_amount" >
                                            <label for="checkbox5">
                                                Credit amount
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-warning" style="float: left; margin-right:5px;">
                                            <input  type="checkbox"  name="post_cheque" id="pdc" value="pdc">
                                            <label for="checkbox5">
                                                Post-dated cheque
                                            </label>
                                        </div>
                                    </div>
                                </div>



                                {{-- for credit limit --}}
                                <div class="form-group col-md-6 credit-amount" style="display: none">
                                    <label class="col-md-2 control-label">Credit Amount</label>
                                    <div class="col-md-10">
                                        <input type="number" name="credit_amount" class="form-control" placeholder="Credit amount" max="{{$credit_limit}}">
                                        <small>Your limit is <span style="color: red">{{$credit_limit}}</span></small>
                                    </div>
                                </div>

                                <div class="form-group col-md-6 credit-amount" style="display: none">
                                    <label class="col-md-2 control-label">Credit Amount Return Date</label>
                                    <div class="col-md-10">
                                        <input type="date" name="return_credit_date" class="form-control" min="@php echo date('Y-m-d'); @endphp" placeholder="Return credit amount date">
                                    </div>
                                </div>
                                {{-- for credit limit End--}}

                                {{-- For post date cheque --}}
                                <div class="form-group col-md-6 pcl" style="display: none">
                                    <label class="col-md-2 control-label">Cheque Number</label>
                                    <div class="col-md-10">
                                        <input type="number" name="cheque_number" class="form-control"  placeholder="Enter Cash Number">
                                    </div>
                                </div>
                                <div class="form-group col-md-6 pcl" style="display: none">
                                    <label class="col-md-2 control-label">Cheque Limit Date</label>
                                    <div class="col-md-10">
                                        <input type="date" name="cheque_date_limit" min="@php echo date('Y-m-d'); @endphp" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group col-md-6 pcl" style="display: none">
                                    <label class="col-md-2 control-label">Branch Name</label>
                                    <div class="col-md-10">
                                        <input type="text" name="branch_name" placeholder="Branch Name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group col-md-6 pcl" style="display: none">
                                    <label class="col-md-2 control-label">Cheque Image</label>
                                    <div class="col-md-10">
                                        <input type="file" name="cheque_image"  class="form-control">
                                    </div>
                                </div>

                                 <div class="form-group col-md-6 pcl" style="display: none">
                                    <label class="col-md-2 control-label">Cheque Image</label>
                                    <div class="col-md-10">
                                        <input type="file" name="cheque_image"  class="form-control">
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
            $(document).on('click','#credit_amount_check',function (){
                if($('#credit_amount_check').is(':checked')){
                    $('.credit-amount').show('slow');
                    $('.credit-amount').prop('required',true);
                    $('[name="credit_amount"]').prop('required',true);
                    $('[name="return_credit_date"]').prop('required',true);
                }else{
                    $('.credit-amount').hide('slow');
                    $('.credit-amount').removeAttr('required');
                    $('[name="credit_amount"]').removeAttr('required');
                    $('[name="return_credit_date"]').removeAttr('required');
                }
            });
            $(document).on('click','#pdc',function (){
                if($('#pdc').is(':checked')){
                    $('.pcl').show('slow');
                    $('.pcl').prop('required',true);
                    $('[name="cheque_number"]').prop('required',true);
                    $('[name="cheque_date_limit"]').prop('required',true);
                    $('[name="branch_name"]').prop('required',true);
                    $('[name="cheque_image"]').prop('required',true);
                }else{
                    $('.pcl').hide('slow');
                    $('.pcl').removeAttr('required');
                    $('[name="cheque_number"]').prop('required',false);
                    $('[name="cheque_date_limit"]').prop('required',false);
                    $('[name="branch_name"]').prop('required',false);
                    $('[name="cheque_image"]').prop('required',false);
                }
            });
        </script>
    @endsection        
@endsection