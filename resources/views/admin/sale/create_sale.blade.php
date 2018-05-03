@extends('layouts.admin_layout')
@section('title')
	Add - Purchase
@endsection
@section('customCss')
<style type="text/css">
    input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
    -webkit-appearance: none;
    -moz-appearance: none;  
    appearance: none;
    margin: 0; 
}
</style>
@endsection
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
                <a class="btn btn-danger" href="{{route('delete_inventory' , ['id' => Session::get('id')])}}">Delete</a>
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
                
                <h4 class="m-t-0 header-title"><b>Create Purchase</b></h4>
                <div class="row">
                    <div class="col-md-12">
                        {{-- <small style="padding-left: 460px;"><a href="{{route('create_items')}}" target="_blank">Can not find item , Click here to add</a></small> --}}
                        <form class="form-horizontal" action="{{route('insert_inventory')}}" method="post">
                        	{{csrf_field()}}
                            <div class="form-group col-md-6">
                                <label class="col-md-2 control-label">Date of Purchase</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="dop"  required="" value="<?php echo date('Y-m-d');?>" readonly>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <div class="row">
                                    <label class="col-md-2 control-label">Product</label>
                                    <div class="col-md-10">                                    
                                        <select class="form-control" name="chemical_name" id="chemical_name" required="">
                                                <option value="">Select Product</option>
                                                @foreach($chemical as $key => $val)
                                                    <option value="{{$val->id}}">{{$val->chemical_name}}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="col-md-2 control-label">Quantity Available</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="quantity_available" id="quantity_available" placeholder="Quantity Available"  required="" readonly="">
                                </div>
                            </div>
                           
                            <div class="form-group col-md-6">
                                <label class="col-md-2 control-label">Payment Mode</label>
                                <div class="col-md-10">
                                    <div class="checkbox checkbox-warning" style="float: left; margin-right:5px;">
                                        <input  name="payment_cash" type="checkbox"  value="1" >
                                        <label for="checkbox5">
                                            Cash
                                        </label>
                                     </div>
                                    <div class="checkbox checkbox-warning" style="float: left; margin-right:5px;">
                                        <input  type="checkbox" name="payment_credit"   value="1" >
                                        <label for="checkbox5">
                                             Credit amount
                                        </label>
                                    </div>
                                    <div class="checkbox checkbox-warning" style="float: left; margin-right:5px;">
                                        <input  type="checkbox"  name="payment_cheque" id="pdc" value="1">
                                        <label for="checkbox5">
                                            Post-dated cheque
                                        </label>
                                    </div>
                                </div>
                            </div>

                            {{-- Payment Mode Additional Field --}}

                            <div class="form-group col-md-6" style="display: none;" id="credit_amount">
                                <label class="col-md-2 control-label">Credit Amount</label>
                                <div class="col-md-10">
                                    <input type="number" class="form-control" name="limit_amount" placeholder="amount" =""  >
                                    <p><strong>Credit limit for this supplier is <span id="credit_limit" style="color: red"></span></strong></p>
                                </div>
                                
                            </div>      
                            <input type="hidden" name="added_by" value="{{Auth::user()->id}}">
                             <div class="form-group col-md-6">
                                <label class="col-md-2 control-label"></label>
                                <div class="col-md-10">
                                    <p><strong></strong></p>
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
       $('#chemical_name').on('change',function (){
            id = $(this).attr('id');
            chemical_id = $('#'+id).val();
            /*Get Available Quantity*/ 
            $.ajax({
               type:'POST',
               url:'{{route('get_available_quantity')}}',
               data:{
                    "_token": "{{ csrf_token() }}",
                    'chemical_id' : chemical_id
               },
               success:function(data){
                 console.log();
               }
            }); 
        });
   </script>
@endsection
@endsection