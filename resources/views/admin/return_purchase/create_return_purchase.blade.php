@extends('layouts.admin_layout')
@section('title')
    Add - Purchase
@endsection
@section('customCss')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!-- DataTables -->
        <link href="{{URL('/')}}/backend/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link href="{{URL('/')}}/backend/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="{{URL('/')}}/backend/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="{{URL('/')}}/backend/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="{{URL('/')}}/backend/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="{{URL('/')}}/backend/plugins/datatables/dataTables.colVis.css" rel="stylesheet" type="text/css"/>
        <link href="{{URL('/')}}/backend/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="{{URL('/')}}/backend/plugins/datatables/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css"/>
<style type="text/css">
    input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
    -webkit-appearance: none;
    -moz-appearance: none;  
    appearance: none;
    margin: 0; 
}

.bg-red{
    background-color: red;
    padding: 5px;
    color: #fff;
}

hr{
        margin-top: 10px;
    margin-bottom: 10px;
}


.table-plus{
    padding: 10px;
    text-align: right;
}

#mycheque .modal-dialog {
    width: 1400px;
    margin: 30px auto;
}

.modal-plus{
    margin-top: 25px;
}
.m-0 input{
            border: none;
}

.m-0 input:focus{
    border: 1px solid green;
}


.table.m-0 > tbody > tr > td{
    border: 1px solid #e3e3e3;
    padding: 0px;
}



table{
        border-color: #e3e3e3 !important;
        border:1px solid #e3e3e3;
        font-size: 12px;
}

table .form-control {
    background-color: #FFFFFF;
    border: 1px solid #E3E3E3;
    border-radius: 0px;
    color: #565656;
    padding: 0px 0px;
    height: 25px;
    max-width: 100%;
    -webkit-box-shadow: none;
    box-shadow: none;
    -webkit-transition: all 300ms linear;
    -moz-transition: all 300ms linear;
    -o-transition: all 300ms linear;
    -ms-transition: all 300ms linear;
    transition: all 300ms linear;
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
    <form class="form-horizontal" action="{{route('save_return')}}" method="post" enctype="multipart/form-data">
<div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <!-- <a class="btn btn-success pull-right" href="{{route('create_inventory')}}" target="_blank">Add More Purchase</a> -->
                <div class="new-purchase">
                    <div class="col-md-3">
                        <h4 class="m-t-0 header-title" style="margin-top: 10px !important;"><b>Create Purchase</b></h4>
                    </div>
                    <div class="col-md-4">
                        <button type="button" class="btn btn-danger pull-right" data-toggle="modal" data-target="#myModal">Add  Item Type</button>
                    </div>
                    <div class="col-md-5 pull-right">
                        <div class="col-md-5">
                            <h4 class="m-t-0 header-title" style="margin-top: 10px !important; text-align: right;"><b>Purchase Order No</b></h4>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control pull-right" name="invoice_number" value="{{$invoice_number}}" readonly="" readonly="">
                        </div>
                        <div class="col-md-2">
                            <h4 class="m-t-0 header-title" style="margin-top: 10px !important;text-align: right;"><b>D.O.P</b></h4>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control pull-right" name="dop" value="{{date('d-m-Y')}}">
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <hr>
                </div>
                <div class="new-purchase">
                    <div class="col-md-12">
                        <h4 class="m-t-0 header-title"><b>Supplier Details</b></h4>
                    </div>
                </div>
                <div class="col-md-12">
                    <hr>
                </div>
                <div class="row">
                    <div class="col-md-12">
                            {{csrf_field()}}
                            <div class="form-group col-md-12">
                                {{-- @php
                                    var_dump($inventory[0]->supplier);die;
                                @endphp --}}
                                <div class="col-md-2">
                                    <label>Supplier</label>
                                    <input type="radio"  name="vendor" checked="" id="supplier" {{($inventory[0]->supplier == '')?'':'checked'}}>
                                    <label>Customer</label>
                                    <input type="radio"  name="vendor"  id="customer" {{($inventory[0]->customer =='')?'':'checked'}}>
                                </div>
                            </div>
                            
                            @if($inventory[0]->supplier != '' )
                            <div class="form-group col-md-12" id="type_supplier">
                                <label class="col-md-1 control-label">Supplier</label>
                                <div class="col-md-2">
                                    <select class="form-control" required="" name="supplier">
                                        <option value="">Select Supplier</option>   
                                        @foreach($supplier as $key => $sup)
                                            <option value="{{$sup->id}}" {{($inventory[0]->supplier == $sup->id)?'selected':'' }}>{{$sup->name}}</option>   
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @else
                            <div class="form-group col-md-12" id="type_customer" style="display: none;">
                                <label class="col-md-1 control-label">Customer</label>
                                <div class="col-md-2">
                                    <select class="form-control" name="customer">
                                        <option value="">Select Customer</option>   
                                        @foreach($customer as $key => $cus)
                                            <option value="{{$cus->id}}">{{$cus->name}}</option>   
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @endif
                            <div class="col-md-6">
                                <div class="card-box clearfix">                                                        
                                    <div class="form-group col-md-4">
                                        <!-- <label class="col-md-4 control-label">Scode</label> -->
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="scode" id="scode" placeholder="scode"  required="" readonly="">
                                        </div>                                
                                    </div>
                                    <div class="form-group col-md-4">
                                        <!-- <label class="col-md-3 control-label">Name</label> -->
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="name" id="name" placeholder="Full Name"  required="" readonly="">
                                        </div>                                
                                    </div>
                                    <div class="form-group col-md-5" style="width: 40%">
                                        <!-- <label class="col-md-7 control-label">Company Name</label> -->
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Company Name"  required="" readonly="">
                                        </div>                                
                                    </div>
                                    <div class="form-group col-md-12">
                                        <!-- <label class="col-md-4 control-label">Phone No</label> -->
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="phone_no" id="phone_no" placeholder="Phone No"  required="" readonly="">
                                        </div>                                
                                    </div>
                                    <div class="form-group col-md-12">
                                        <!-- <label class="col-md-2 control-label">Address</label> -->
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="address" id="address" placeholder="Address"  required="" readonly="">
                                        </div>                                
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card-box clearfix" style="padding: 13px;">                                         
                                    <div class="col-md-12">
                                        <h4 class="m-t-0 header-title" style="margin-top: 10px !important;"><b>Credit Limit</b></h4>
                                        <div class="form-group col-md-6">
                                            <!-- <label class="col-md-7 control-label">Credit Balance Limit</label> -->
                                            <div class="col-md-12">
                                                <input type="number" class="form-control" name="credit_balance_limit" id="credit_balance_limit" placeholder="Credit balance limit"  required="" readonly="">
                                            </div>                                
                                        </div>
                                        <div class="form-group col-md-6">
                                            <!-- <label class="col-md-5 control-label">Credit Balance</label> -->
                                            <div class="col-md-12">
                                                <input type="number" class="form-control" name="credit_balance" id="credit_balance" placeholder="Credit Balance"  required="" readonly="">
                                            </div>                                
                                        </div>
                                    </div>
                                     <div class="col-md-12">
                                        <h4 class="m-t-0 header-title" style="margin-top: 10px !important;"><b>Post-dated Cheque Limit</b></h4>
                                         <div class="form-group col-md-6">
                                            <!-- <label class="col-md-6 control-label">PD Cheque Limit</label> -->
                                            <div class="col-md-12">
                                                <input type="number" class="form-control amount" name="pd_cheque_limit" id="pd_cheque_limit" placeholder="Post-dated Cheque Limit"  required="" readonly="">
                                            </div>                                
                                        </div>
                                        <div class="form-group col-md-6">
                                            <!-- <label class="col-md-7 control-label">PD Cheque Balance</label> -->
                                            <div class="col-md-12">
                                                <input type="number" class="form-control amount" name="pd_cheque_balance" id="pd_cheque_balance" placeholder="Post-dated Cheque Balance"  required="" readonly="">
                                            </div>                                
                                        </div>
                                     </div>
                                
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="card-box" style="padding: 0px 20px 0px 20px;">
                                    <div class="row">    
                                    <div class="col-md-12">
                                         {{-- <div class="table-plus">
                                             <button type="button" id="add_more" class="btn btn-success fa fa-plus" ></button>
                                         </div> --}}
                                    </div>                                                                               
                                    @php $return_item = App\Save_return::where('invoice_number',$invoice_number)->get(); $return = 0; $check_item = count($return_item);@endphp
                                        <div class="p-20">
                                            <table class="table m-0">                                                    
                                                <thead style="background-color: #ccc;">
                                                    <tr>
                                                        <th>S.No</th>
                                                        <th>Item Code</th>
                                                        <th width="15%">Descrption</th>
                                                        <th>Measurment</th>
                                                        <th width="10%">Storage Type</th>
                                                        <th width="7%">Storage Quantity</th>
                                                        <th width="7%">Quantity</th>
                                                        <th>Cost/</th>
                                                        <th  width="7%">unit</th>
                                                        <th>Rate</th>
                                                        <th>Value Excl. Tax</th>
                                                        <th>Value incl. Tax</th>
                                                        <th >Return</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="add_here">
                                                    @php $count = 1; @endphp
                                                    @foreach($inventory as $key =>$val)
                                                    <tr id="return_row_{{$count}}">
                                                        <th scope="row">1</th>
                                                        <td><input type="hidden" id="inventory_id_{{$count}}" value="{{$val->id}}" /><input type="text" id="code_{{$count}}" class="form-control code"  value="{{$val->item_code}}" required=""></td>
                                                        <td><input type="text" id="name_{{$count}}" class="form-control name"  value="{{$val->item_name}}" required=""></td>
                                                        <td>
                                                            <select  id="measurment_{{$count}}" class="form-control" required="">
                                                                <option>Select Mesurement</option>
                                                                <option value="Kg" {{($val->purchasing_type == 'kg')?'selected':''}}>Kg</option>
                                                                <option value="liter" {{($val->purchasing_type == 'liter')?'selected':''}}>Liter</option>
                                                                <option value="quantity" {{($val->purchasing_type == 'quantity')?'selected':''}}>Quantity</option>
                                                            </select>
                                                        </td>
                                                        <td><select  id="storage_type_{{$count}}" class="form-control add_item_type" required=""> 
                                                            <option value="">Select Storage type</option>
                                                            @foreach($item_type as $key => $value)
                                                                <option value="{{$value->item_name}}" {{($val->storage_type == $value->item_name)?'selected':''}}>{{$value->item_name}}</option>
                                                            @endforeach
                                                        </select></td>
                                                        <td><input type="number" id="storeage_quantity_{{$count}}" class="form-control storeage_quantity"  required="" value="{{App\item_purchase_type::where('item_name',$val->storage_type)->value('item_type') * $val->quantity}}"></td>
                                                        <td><input type="number" id="quantity_{{$count}}" class="form-control quantity"  required="" value="{{$val->quantity}}"></td>
                                                        <td><input type="number" id="cost_{{$count}}" class="form-control cost"  required="" value="{{$val->cost}}"></td>
                                                        <td style="display: flex">
                                                            <input type="text" id="unit_{{$count}}" class="form-control unit"  value="{{$val->purchase_unit}}" @php if(empty($val->purchase_unit)){ @endphp
                                                                        style="display: none;" 

                                                                    @php }@endphp>
                                                            <select class="form-control kg" id="kg_{{$count}}"  {{($val->kg != '')?'':'style="display: none"'}}>
                                                                <option value="">Kg</option>
                                                                @for($i=1;$i<100;$i++)
                                                                        <option value="{{$i}}"  {{($val->kg == $i)?'selected':''}}>{{$i}}</option>
                                                                    @if($i == $val->kg)
                                                                    @php break;@endphp 
                                                                    @endif
                                                                @endfor
                                                            </select>
                                                            <input type="text" id="gram_{{$count}}" class="form-control gram"  {{($val->gram != '')?'':'style="display: none"'}}  value="{{$val->gram}}" /></td>
                                                        <td><input type="number" id="rate_{{$count}}" class="form-control rate calculate"  value="{{$val->unit_purchased}}" required=""></td>
                                                        <td><input type="text"  id="exc_tax_{{$count}}" class="form-control calculate exc_tax"  required="" value="{{$val->unit_purchased}}"></td>
                                                        <td><input type="text"  class="form-control calculate inc_code" id="inc_code_{{$count}}"  value="{{$val->inc_code}}"></td>
                                                        <td>@php if($check_item == 0){@endphp <button type="button" class="btn btn-danger return" id="return_{{$count}}">Return</button> @php }else{@endphp <strong><p style="color: red">Item Is Returned</p></strong> @php }@endphp  </td>
                                                    </tr>
                                                    @php $count++; @endphp
                                                    @endforeach
                                                    {{-- ************************************************ RETURN ********************************** --}}

                                                    @foreach($return_item as $key => $item)

                                                    @php $inventory = App\Inventory::where('id',$item->inventory_id)->first(); $return =1;@endphp 
                                                    <tr id="return_row_{{$return}}" style="background-color: orange">
                                                        <th scope="row">1</th>
                                                        <td><input type="hidden" id="inventory_id_{{$return}}" value="{{$item->id}}" /><input type="text" id="code_{{$return}}" class="form-control code"  value="{{$inventory->item_code}}" required=""></td>
                                                        <td><input type="text" id="name_{{$return}}" class="form-control name"  value="{{$inventory->item_name}}" required=""></td>
                                                        <td>
                                                            <select  id="measurment_{{$return}}" class="form-control" required="">
                                                                <option>Select Mesurement</option>
                                                                <option value="Kg" {{($inventory->purchasing_type == 'kg')?'selected':''}}>Kg</option>
                                                                <option value="liter" {{($inventory->purchasing_type == 'liter')?'selected':''}}>Liter</option>
                                                                <option value="quantity" {{($inventory->purchasing_type == 'quantity')?'selected':''}}>Quantity</option>
                                                            </select>
                                                        </td>
                                                        <td><select  id="storage_type_{{$return}}" class="form-control add_item_type" required=""> 
                                                            <option value="">Select Storage type</option>
                                                            @foreach($item_type as $key => $value)
                                                                <option value="{{$value->item_name}}" {{($inventory->storage_type == $value->item_name)?'selected':''}}>{{$value->item_name}}</option>
                                                            @endforeach
                                                        </select></td>
                                                        <td><input type="number" id="storeage_quantity_{{$return}}" class="form-control storeage_quantity"  required="" value="{{App\item_purchase_type::where('item_name',$inventory->storage_type)->value('item_type') * $inventory->quantity}}"></td>
                                                        <td><input type="number" id="quantity_{{$return}}" class="form-control quantity"  required="" value="{{$inventory->quantity}}"></td>
                                                        <td><input type="number" id="cost_{{$return}}" class="form-control cost"  required="" value="{{$item->cost}}"></td>
                                                        <td  style="display: flex;">
                                                            <input type="text" id="unit_{{$return}}" class="form-control unit"  value="{{$item->purchase_unit}}" @php if(empty($item->purchase_unit)){ @endphp
                                                                        style="display: none;" 

                                                                    @php }@endphp>
                                                            <select class="form-control kg" id="kg_{{$return}}"  {{($item->kg != '')?'':'style="display: none"'}}>
                                                                <option value="">Kg</option>
                                                                @for($i=1;$i<100;$i++)
                                                                        <option value="{{$i}}"  {{($item->kg == $i)?'selected':''}}>{{$i}}</option>
                                                                    @if($i == $item->kg)
                                                                    @php break;@endphp 
                                                                    @endif
                                                                @endfor
                                                            </select>
                                                            <input type="text" id="gram_{{$return}}" class="form-control gram"  {{($item->gram != '')?'':'style="display: none"'}}  value="{{$item->gram}}" /></td>
                                                        <td><input type="number" id="rate_{{$return}}" class="form-control rate calculate"  value="{{$item->rate}}" required=""></td>
                                                        <td><input type="text"  id="exc_tax_{{$return}}" class="form-control calculate exc_tax"  required="" value="{{$item->exc_tax}}"></td>
                                                        <td><input type="text"  class="form-control calculate inc_code" id="inc_code_{{$return}}"  value="{{$item->inc_code}}"></td>
                                                        <td><button type="button" class="btn btn-danger return" id="return_{{$return}}">Return</button></td>
                                                    </tr>   
                                                     @php $return++; @endphp
                                                    @endforeach





                                                    {{-- ************************************************ RETURN ********************************** --}}
                                                    <thead style="background-color: #ccc;">
                                                    <tr>
                                                        <th  colspan="10"></th>
                                                        
                                                        <th id="total_rs">{{-- Total {{$val->net_total}} --}}</th>
                                                        <th id="total_rs_ex">{{-- Value Excl. Tax {{$val->net_total}} --}}</th>
                                                        <th id="tax_rs">{{-- Value incl. Tax {{$val->net_total}} --}}</th>
                                                        </tr>
                                                    </thead>
                                                </tbody>
                                            </table>
                                             <div>
                                                <strong id="append_unit"></strong>
                                            </div>
                                        </div>                
                                    </div>
                                </div>  
                            </div>

                            <div class="col-md-6">
                                <div class="card-box table-responsive">
                                    <h4 class="m-t-0 header-title"><b>Items Type</b></h4>
                                    {{-- <table id="subadmin_table" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Item Name</th>
                                            <th>Item Type</th>
                                            <th>Item Purchase Type</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            
                                        <tr>
                                            <td>asdfsad</td>
                                            <td>adsfa</td>
                                            <td>asdfas</td>
                                            <td>asdfasd</td>
                                            <td>asdfas</td>
                                        </tr>
                                        </tbody>
                                    </table> --}}

                                     @php 
                                     if(isset($val->payment_cheque) && !empty($val->payment_cheque)){
                                        $cheque_amount = explode(',',$inventory[0]['cheque_amount']);
                                        $bank_name = explode(',',$inventory[0]['bank_name']);
                                        $cheque_number = explode(',',$inventory[0]['cheque_number']);
                                        $cheque_image = explode(',',$inventory[0]['cheque_image']);
                                        $limit_cheque_date = explode(',',$inventory[0]['limit_cheque_date']);
                                        $new_count = count($cheque_number);
                                     }
                                    @endphp 
                                      @php 
                                      if(isset($val->carriage) && !empty($val->carriage)){
                                    @endphp
                                      <p class="text-right"><b>Carriage:</b> {{$val->carriage}} </p><br>
                                      @php }@endphp 
                                      @php 
                                      if(isset($val->net_total) && !empty($val->net_total)){
                                    @endphp
                                      <p class="text-right"><b>Net Total:</b> {{$val->net_total}} </p><br>
                                      @php }@endphp 
                                       @php 
                                      if(isset($val->net_total) && !empty($val->net_total)){
                                    @endphp
                                      <p class="text-right"><b>Payment mode:</b>  {{($val->payment_credit == "on")?'Credit,':''}}
                                         {{($val->payment_cash == "on")?'Cash,':''}}
                                         {{($val->payment_cheque == "on")?'Cheque,':''}} </p><br>
                                      @php }@endphp 

                                       @php 
                                      if(isset($val->cash_recieved) && !empty($val->cash_recieved)){
                                    @endphp
                                      <p class="text-right"><b>Cash Recieved:</b>  {{$val->cash_recieved}}
                                          </p><br>
                                      @php }@endphp 

                                      @php 
                                      if(isset($val->amount_credit) && !empty($val->amount_credit)){
                                    @endphp
                                      <p class="text-right"><b>Amount Credit:</b>  {{$val->amount_credit}}
                                          </p><br>
                                      @php }@endphp 
                                      
                                    @php
                                        if(isset($val->payment_cheque) && !empty($val->payment_cheque)){
                                    @endphp
                                     @for($i=0;$i<$new_count;$i++)  
                                      <p class="text-right"><b>Cheque Amount:</b> {{$cheque_amount[$i]}}
                                          </p><br>  
                                      @endfor
                                      @php }@endphp 
                                </div>
                            </div>
                           
                            <div class="col-md-6">
                                <div class="card-box clearfix">
                                    <div class="form-group col-md-12">
                                        <label class="col-md-5 control-label">Carriage and Freight</label>
                                        <div class="col-md-7">
                                            <input type="number" class="form-control amount" name="carriage" id="carriage"  placeholder="Carriage" >
                                        </div>                                
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-md-5 control-label">Balance</label>
                                        <div class="col-md-7">
                                            <input type="number" class="form-control amount" name="net_total" id="net_total" placeholder="Balance"  required="">
                                        </div>                                
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label class="col-md-5 control-label">Payment Method</label>
                                        <div class="col-md-7">
                                            <div class="checkbox radio-inline">
                                                <input  type="checkbox" name="payment_credit">
                                                <label for="checkbox0">
                                                    Credit
                                                </label>
                                            </div>
                                            <div class="checkbox radio-inline">
                                                <input  type="checkbox" name="payment_cash" >
                                                <label for="checkbox0">
                                                    Cash
                                                </label>
                                            </div>
                                            <div class="checkbox radio-inline">
                                                <input  type="checkbox" name="payment_cheque" id="pdc" >
                                                <label for="checkbox0">
                                                    Post Dated Cheque
                                                </label>
                                            </div>
                                        </div>                                
                                    </div>
                                     <div class="form-group col-md-12 credit_amount_field"  style="display: none" >
                                        <label class="col-md-5 control-label">Amount Credit</label>
                                        <div class="col-md-7">
                                            <input type="number" class="form-control amount" name="amount_credit" id="amount_credit" placeholder="Credit Amount"  >
                                        </div>                                
                                    </div>
                                    <div class="form-group col-md-12 credit_amount_field"  style="display: none">
                                        <label class="col-md-5 control-label">Credit Date Limit</label>
                                        <div class="col-md-7">
                                            <input type="date" class="form-control amount" name="credit_date_limit" id="credit_date_limit" placeholder="Credit Date Limit"   >
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12" id="cash_recieved"  style="display: none" >
                                        <label class="col-md-5 control-label">Cash Recieved</label>
                                        <div class="col-md-7">
                                            <input type="number" class="form-control amount"  name="cash_recieved" id="cash_recieved" placeholder="Cash Recieved"  >
                                        </div>                                  
                                    </div>
                                    {{-- *************************POST DATE CHEQUE ************************ --}}
                                    <input type="Submit" value="Submit" class="btn btn-success pull-right">
                                </div>
                            </div>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    {{-- Modal for add cheques --}}
    <div class="modal fade" id="mycheque" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Cheques</h4>
        </div>
       
        <div class="modal-body">
          <div class="col-md-12" >
            <div class="card-box clearfix" id="add_cheque_here">
                                                                     
                    <div class="form-group col-md-3">
                        <label class="col-md-12 control-label">Bank Name</label>
                        <div class="col-md-12">
                            <select class="form-control" name="bank_name[]">
                                @foreach($bank as $key => $val)
                                    <option value="{{$val->bank_name}}" >{{$val->bank_name}}</option>
                                @endforeach
                            </select>
                        </div>                                
                    </div>
                    <div class="form-group col-md-2">
                        <label class="col-md-12 control-label">Cheque Number</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="cheque_number[]"  placeholder="Cheque Number" >
                        </div>                                
                    </div>
                    <div class="form-group col-md-2">
                        <label class="col-md-12 control-label">Cheque Amount</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="cheque_amount[]"  placeholder="Cheque Amount" >
                        </div>                                
                    </div>
                    <div class="form-group col-md-2">
                        <label class="col-md-12 control-label">Cheque Image</label>
                        <div class="col-md-12">
                            <input type="file" class="form-control" name="cheque_image[]"  placeholder="Cheque Image"  >
                        </div>                                
                    </div>
                    <div class="form-group col-md-2">
                        <label class="col-md-12 control-label">Cheque Date Limit</label>
                        <div class="col-md-12">
                            <input type="date" class="form-control" name="limit_cheque_date[]"  placeholder="Cheque Date Limit" >
                        </div>                                
                    </div>
                    <div class="form-group col-md-1">
                        <label class="col-md-12 control-label"></label>
                        <div class="col-md-12">
                            <button type="button"  class="btn btn-success fa fa-plus modal-plus add_more_cheques" ></button>
                        </div>                                
                    </div>
                
            </div>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Save</button>
        </div>
      </div>
    </div>
  </div>
  <input type="hidden" class="form-control pull-right" name="invoice_number" value="{{$invoice_number}}" readonly="" readonly="">
  {{--  --}}
</form>
    {{-- Modal for add more cheques --}}
    {{-- Modal for new item --}}
        <div class="modal" id="myModal">
          <div class="modal-dialog">
            <div class="modal-content">
              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Add Item </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <!-- Modal body -->
              <div class="modal-body">
               <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title"><b>Create Item Type</b></h4>
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" action="{{route('insert_item_type')}}" method="post">
                                {{csrf_field()}}
                                <div class="form-group col-md-12">
                                    <label class="col-md-2 control-label">Item Name</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="item_name" id="item_name" required="">
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="col-md-2 control-label">Item purchase type</label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="item_purchase_type" id="item_purchase_type">
                                            <option value="liter">Liter</option>
                                            <option value="kg">Kg</option>
                                            <option value="quantity">Quantity</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="col-md-2 control-label">Item strength</label>
                                    <div class="col-md-10">
                                        <input type="number" class="form-control" name="item_type" id="item_type"  required="">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-md-2 control-label"></label>
                                    <div class="col-md-10">
                                        <button id="save_item" type="button" class="form-control btn btn-success"  placeholder="placeholder">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" id="close_modal" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
    {{-- Modal for new item --}}
@section('customScript')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="{{URL('/')}}/backend/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="{{URL('/')}}/backend/plugins/datatables/dataTables.bootstrap.js"></script>
        <script src="{{URL('/')}}/backend/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="{{URL('/')}}/backend/plugins/datatables/buttons.bootstrap.min.js"></script>
        <script src="{{URL('/')}}/backend/plugins/datatables/jszip.min.js"></script>
        <script src="{{URL('/')}}/backend/plugins/datatables/pdfmake.min.js"></script>
        <script src="{{URL('/')}}/backend/plugins/datatables/vfs_fonts.js"></script>
        <script src="{{URL('/')}}/backend/plugins/datatables/buttons.html5.min.js"></script>
        <script src="{{URL('/')}}/backend/plugins/datatables/buttons.print.min.js"></script>
        <script src="{{URL('/')}}/backend/plugins/datatables/dataTables.fixedHeader.min.js"></script>
        <script src="{{URL('/')}}/backend/plugins/datatables/dataTables.keyTable.min.js"></script>
        <script src="{{URL('/')}}/backend/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="{{URL('/')}}/backend/plugins/datatables/responsive.bootstrap.min.js"></script>
        <script src="{{URL('/')}}/backend/plugins/datatables/dataTables.scroller.min.js"></script>
        <script src="{{URL('/')}}/backend/plugins/datatables/dataTables.colVis.js"></script>
        <script src="{{URL('/')}}/backend/plugins/datatables/dataTables.fixedColumns.min.js"></script>

        <script src="{{URL('/')}}/backend/pages/datatables.init.js"></script>
    <script type="text/javascript">
        $('#subadmin_table').DataTable();
    </script>

    
<script>
    $(document).on('click','[name="vendor"]',function (){
        type = $(this).attr('id');
        if(type == 'customer'){
             $('#scode').val('');
            $('#name').val('');
            $('#company_name').val('');
            $('#phone_no').val('');
            $('#address').val('');
            $('#credit_balance_limit').val('');
            $('#credit_balance').val('');
            $('#pd_cheque_limit').val('');
            $('#pd_cheque_balance').val('');
            $('[name="limit_amount"]').val('');
            $('#type_supplier').hide('slow');
            $('[name="supplier"]').prop('required',false);
             $('#type_customer').show('slow');
            $('[name="customer"]').prop('required',true);
        }if(type == 'supplier'){
             $('#scode').val('');
            $('#name').val('');
            $('#company_name').val('');
            $('#phone_no').val('');
            $('#address').val('');
            $('#credit_balance_limit').val('');
            $('#credit_balance').val('');
            $('#pd_cheque_limit').val('');
            $('#pd_cheque_balance').val('');
            $('[name="limit_amount"]').val('');
            $('#type_customer').hide('slow');
            $('[name="customer"]').prop('required',false);
             $('#type_supplier').show('slow');
            $('[name="supplier"]').prop('required',true);
        }
    });
    $(document).on('click','.return' , function (){
        id = $(this).attr('id');
        id = id.substring(7);
        inventory_id = $("#inventory_id_"+id).val();
        
        $("#add_here").append(`<tr id="return_row_{{$count}}" style="background-color:orange">
                                                        <th scope="row">1</th>
                                                        <td><input type="hidden" value="`+inventory_id+`" name="inventory_id[]"/><input type="text" id="code_{{$count}}" class="form-control code" name="item_code[]" value="{{$val->item_code}}" required=""></td>
                                                        <td><input type="text" id="name_{{$count}}" class="form-control name" name="description[]" value="{{$val->item_name}}" required=""></td>
                                                        <td>
                                                            <select name="measurment[]" id="measurment_{{$count}}" class="form-control" required="">
                                                                <option>Select Mesurement</option>
                                                                <option value="Kg" {{($val->purchasing_type == 'kg')?'selected':''}}>Kg</option>
                                                                <option value="liter" {{($val->purchasing_type == 'liter')?'selected':''}}>Liter</option>
                                                                <option value="quantity" {{($val->purchasing_type == 'quantity')?'selected':''}}>Quantity</option>
                                                            </select>
                                                        </td>
                                                        <td><select name="storage_type[]" id="storage_type_{{$count}}" class="form-control add_item_type" required=""> 
                                                            <option value="">Select Storage type</option>
                                                            @foreach($item_type as $key => $value)
                                                                <option value="{{$value->item_name}}" {{($val->storage_type == $value->item_name)?'selected':''}}>{{$value->item_name}}</option>
                                                            @endforeach
                                                        </select></td>
                                                        <td><input type="number" id="storeage_quantity_{{$count}}" class="form-control storeage_quantity" name="storeage_quantity[]" required="" value="{{App\item_purchase_type::where('item_name',$val->storage_type)->value('item_type') * $val->quantity}}"></td>
                                                        <td><input type="number" id="quantity_{{$count}}" class="form-control quantity" name="quantity[]" required="" value="{{$val->quantity}}"></td>
                                                        <td><input type="number" id="cost_{{$count}}" class="form-control cost" name="cost[]" required="" value="{{$val->cost}}"></td>
                                                        <td>
                                                            <input type="text" id="unit_{{$count}}" class="form-control unit" name="unit[]" value="{{$val->purchase_unit}}" @php if(empty($val->purchase_unit)){ @endphp
                                                                        style="display: none;" 

                                                                    @php }@endphp>
                                                            <select class="form-control kg" id="kg_{{$count}}" name="kg[]" {{($val->kg != '')?'':'style="display: none"'}}>
                                                                <option value="">Kg</option>
                                                                @for($i=1;$i<100;$i++)
                                                                        <option value="{{$i}}"  {{($val->kg == $i)?'selected':''}}>{{$i}}</option>
                                                                    @if($i == $val->kg)
                                                                    @php break;@endphp 
                                                                    @endif
                                                                @endfor
                                                            </select>
                                                            <input type="text" id="gram_{{$count}}" class="form-control gram" name="gram[]" {{($val->gram != '')?'':'style="display: none"'}}  value="{{$val->gram}}" /></td>
                                                        <td><input type="number" id="rate_{{$count}}" class="form-control rate calculate" name="rate[]" value="{{$val->unit_purchased}}" required=""></td>
                                                        <td><input type="text"  id="exc_tax_{{$count}}" class="form-control calculate exc_tax" name="exc_tax[]" required="" value="{{$val->unit_purchased}}"></td>
                                                        <td><input type="text"  class="form-control calculate inc_code" id="inc_code_{{$count}}" name="inc_code[]" value="{{$val->inc_code}}"></td>
                                                        <td><button type="button" class="btn btn-danger return" id="return_{{$count}}">Return</button></td>
                                                    </tr>`);
        /*$("#return_row_"+id).clone(false).prop('id', 'change_css'+id ).appendTo("#add_here");*/
        code= $("#code_"+id).val();
        name= $("#name_"+id).val();
        measurment= $("#measurment_"+id).val();
        storage_type= $("#storage_type_"+id).val();
        storeage_quantity= $("#storeage_quantity_"+id).val();
        quantity= $("#quantity_"+id).val();
        unit= $("#unit_"+id).val();
        cost= $("#cost_"+id).val();
        kg= $("#kg_"+id).val();
        gram= $("#gram_"+id).val();
        rate= $("#rate_"+id).val();
        unit= $("#unit_"+id).val();
        exc_tax = $("#exc_tax_"+id).val();
        inc_code= $("#inc_code_"+id).val();
        new_id = parseInt(id)+1;
         $("#code_"+new_id).val(code);
         $("#name_"+new_id).val(name);
         $('#measurment_'+new_id+' option[value="'+measurment+'"]').attr("selected", "selected");
         $('#storage_type_'+new_id+' option[value="'+storage_type+'"]').attr("selected", "selected");
         $("#storeage_quantity_"+new_id).val(storeage_quantity);
         $("#quantity_"+new_id).val(quantity);
         $("#cost_"+new_id).val(cost);
         $('#kg_'+new_id+' option[value="'+kg+'"]').attr("selected", "selected");
         $("#gram_"+new_id).val(gram);
         $("#rate_"+new_id).val(rate);
         $("#unit_"+new_id).val(unit);
         $("#exc_tax_"+new_id).val(exc_tax);
         $("#inc_code_"+new_id).val(inc_code);
        $('#change_css'+new_id).css("background-color", "orange");

    });
    $(document).on('click','.add_more_cheques',function (){
        html = `<div class="form-group col-md-3">
                    <label class="col-md-12 control-label">Bank Name</label>
                    <div class="col-md-12">
                         <select class="form-control" name="bank_name[]">
                            @foreach($bank as $key => $val)
                                <option value="{{$val->bank_name}}">{{$val->bank_name}}</option>
                            @endforeach
                        </select>
                    </div>                                
                </div>
                <div class="form-group col-md-2">
                    <label class="col-md-12 control-label">Cheque Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="cheque_number[]"  placeholder="Cheque Number"  required="">
                    </div>                                
                </div>
                <div class="form-group col-md-2">
                    <label class="col-md-12 control-label">Cheque Amount</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="cheque_amount[]"  placeholder="Cheque Amount"  required="">
                    </div>                                
                </div>
                <div class="form-group col-md-2">
                    <label class="col-md-12 control-label">Cheque Image</label>
                    <div class="col-md-12">
                        <input type="file" class="form-control" name="cheque_image[]"  placeholder="Cheque Image"  required="">
                    </div>                                
                </div>
                <div class="form-group col-md-2">
                    <label class="col-md-12 control-label">Cheque Date Limit</label>
                    <div class="col-md-12">
                        <input type="date" class="form-control" name="limit_cheque_date[]"  placeholder="Cheque Date Limit"  required="">
                    </div>                                
                </div>
                <div class="form-group col-md-1">
                    <label class="col-md-12 control-label"></label>
                    <div class="col-md-12">
                        <button type="button"  class="btn btn-success fa fa-plus modal-plus add_more_cheques" ></button>
                    </div>                                
                </div>`;
            $('#add_cheque_here').append(html);
    }); 
    var sum =  0;
    var tax =  0; 
    var total_max = 0 ;
    var carriage = 0;
    $(document).on('keyup','.unit',function (){
        id = $(this).attr('id');
        id = id.substring(5);
        measure_type = $('#check_type_quantity option:selected').val();
        /*alert(measure_type);*/
        unit = parseInt($('#unit_'+id).val());
        cost = parseInt($('#cost_'+id).val());
        rate = unit * cost;
        $('#rate_'+id).val(rate);  
        $('#exc_tax_'+id).val(rate);  
        sum = 0; 
         $('[name="rate[]"]').each(function(){
            amount = $(this).val();
            if(amount != ''){
                sum =  parseInt(amount) + sum;    
            }
        });
        $('#total_rs').html('');
        $('#total_rs').html('Balance:  '+sum);
        $('#total_rs_ex').html('');
        $('#total_rs_ex').html('Balance:  '+sum);
        $('#net_total').val(sum);
        total = sum;
    }); 

    $(document).on('change','.kg',function (){
        id = $(this).attr('id');
        id = id.substring(3);
        /*alert(measure_type);*/
        unit = parseInt($('#kg_'+id+' option:selected').val());
        cost = parseInt($('#cost_'+id).val());
        value =$('#gram_'+id).val();
        
        if(value == ''){
        rate = parseFloat($('#cost_'+id).val()) *   $('#kg_'+id).val();
        }
        else{
            gram = parseFloat(value)/1000;
            new_rate = parseFloat($('#cost_'+id).val()) * gram;
            rate = unit * cost;
            rate = rate + new_rate;    
        }
        $('#rate_'+id).val(rate);  
        
        $('#exc_tax_'+id).val(rate);  
        /*sum = 0; 
         $('[name="rate[]"]').each(function(){
            amount = $(this).val();
            if(amount != ''){
                sum =  parseInt(amount) - sum;    
            }
        });
        console.log(sum);*/

        $('#total_rs').html('');
        $('#total_rs').html('Balance:  '+Math.abs(rate));
        $('#total_rs_ex').html('');
        $('#total_rs_ex').html('Balance:  '+Math.abs(rate));
        $('#net_total').val(Math.abs(rate));
        total = Math.abs(rate);
    }); 

    $(document).on('focusout','.gram',function(){
        id = $(this).attr('id');
        id = id.substring(5);
        value = $(this).val();
        if(value == ''){
            /*gram = parseFloat(value)/1000;*/
            new_rate = parseFloat($('#cost_'+id).val()) * $('#kg_'+id).val();
           
           /* new_rate = parseInt(new_rate) + parseInt(rate);*/
        }else{
            gram = parseFloat(value)/1000;
            new_rate = parseFloat($('#cost_'+id).val()) * gram;
            rate = $('#rate_'+id).val();
            new_rate = parseInt(new_rate) + parseInt(rate);
        }
        
        $('#total_rs').html('Balance:  '+Math.abs(new_rate));
        $('#total_rs_ex').html('Balance:  '+Math.abs(new_rate));
        $('#rate_'+id).val(new_rate);
        $('#exc_tax_'+id).val(new_rate);
        $('#net_total').val(new_rate);
    });

    $(document).on('change','.add_item_type',function (){
        id = $(this).attr('id');
        item_type = $(this).val();
        
        id = id.substring(13);

        $.ajax({
               type:'POST',
               url:'{{route('get-barrel-type')}}',
               data:{
                    "_token": "{{ csrf_token() }}",
                    'item_type' : item_type
               },
               success:function(data){
                data = JSON.parse(data);
                console.log(id);
                   $('#storeage_quantity_'+id).val(data.item_type);
                   $('#quantity_'+id).attr('max',data.item_type);
                   $('#append_unit').html('');
                   if(data.item_purchase_type == 'kg'){
                    $('#unit_'+id).hide();
                    $('#kg_'+id).show('slow');
                    $('#gram_'+id).show('slow');
                   }else{
                    $('#unit_'+id).show();
                    $('#kg_'+id).hide('slow');
                    $('#gram_'+id).hide('slow');
                   }    
                    $('#append_unit').append(`<input type="hidden" value="`+data.item_type+`" name="storage_strength[]" id="check_type_quantity" />Each `+data.item_name+` contain `+data.item_type+` `+data.item_purchase_type+``);


               }
            });
    });
    /******/
   /* $(document).on('keyup','[name="exc_tax[]"]',function (){
        tax = 0;
        $('[name="exc_tax[]"]').each(function(){
            amount = $(this).val();
            if(amount != ''){
                tax =  parseInt(amount) + parseInt(tax);    
            }
        });
        $('#tax_rs').html('');
        $('#tax_rs').html(`Tax Rs:  `+tax);
         $('[name="inc_code[]"]').each(function(){
            amount = $(this).val();
            if(amount != ''){
                tax =  parseInt(amount) + parseInt(tax);    
            }
        });
        $('#tax_rs').html('');
        $('#tax_rs').html(`Tax Rs:  `+tax);
        $('#net_total').val(parseInt(tax)+parseInt(sum));
    });*/
    /******/
    /******/
    $(document).on('keyup','[name="inc_code[]"]',function (){
        tax = 0;
        $('[name="inc_code[]"]').each(function(){
            amount = $(this).val();
            if(amount != ''){
                tax =  parseInt(amount) + parseInt(tax);    
            }
        });
        $('#tax_rs').html('');
        $('#tax_rs').html(`Tax Rs:  `+tax);
       /* $('[name="exc_tax[]"]').each(function(){
            amount = $(this).val();
            if(amount != ''){
                tax =  parseInt(amount) + parseInt(tax);    
            }
        });*/
        $('#tax_rs').html('');
        $('#tax_rs').html(`Tax Rs:  `+tax);
        $('#net_total').val(parseInt(tax)+parseInt(sum));
    }); 
    /***/
    $(document).on('focusout','#carriage',function (){
       net_total = $('#net_total').val();
       
       total_money = parseInt(net_total) + parseInt($(this).val());
       $('#net_total').val(total_money);
       carriage = total_money;
    });
    /***/
    row = 4;
    $(document).on('click','#add_more',function (){
        html = `<tr>
                   <th scope="row">`+row+`</th>
                    <td><input type="text" id="code_`+row+`" class="form-control code" name="item_code[]"></td>
                    <td><input type="text" id="name_`+row+`" class="form-control name" name="description[]"></td>
                    <td>
                        <select name="measurment[]" class="form-control">
                            <option>Select measurment</option>
                            <option value="kg">Kg</option>
                            <option value="liter">Liter</option>
                            <option value="quantity">Quantity</option>
                        </select>
                    </td>
                     <td><select name="storage_type[]"  id="storage_type_`+row+`" class="form-control add_item_type">
                        @foreach($item_type as $key => $val)
                            <option value="{{$val->item_name}}">{{$val->item_name}}</option>
                        @endforeach
                    </select></td>
                    <td><input type="number" id="storeage_quantity_`+row+`" class="form-control storeage_quantity" name="storeage_quantity[]" required=""></td>
                    <td><input type="number" id="quantity_`+row+`" class="form-control quantity" name="quantity[]"></td>
                    <td><input type="number" id="cost_`+row+`" class="form-control cost" name="cost[]" required=""></td>
                    <td><input type="text"   id="unit_`+row+`"  class="form-control unit" name="unit[]">
                     <select class="form-control kg" id="kg_`+row+`" name="kg[]" style="display: none">
                        <option value="">Kg</option>
                        @for($i=1;$i<100;$i++)
                        <option>{{$i}}</option>
                        @endfor
                    </select>
                    <input type="text" id="gram_`+row+`" class="form-control gram" name="gram[]" style="display: none;" /></td>
                    <td><input type="number"   id="rate_`+row+`"  class="form-control rate calculate" name="rate[]"></td>
                    <td><input type="text"   id="exc_tax_`+row+`" class="form-control calculate exc_tax" name="exc_tax[]"></td>
                    <td><input type="text"   class="form-control calculate inc_code" name="inc_code[]"></td>
                </tr>`;
                $('#add_here').append(html);
                row++;
    });
    /******/
    $(document).on('focusout',function (){
        total_rupees = parseInt(sum)+parseInt(tax)
        carriage = $('#carriage').val();
        sum_of_product = parseInt(total_rupees) + parseInt(carriage)
        total = parseInt(tax)+parseInt(sum);
        total = total + parseInt(carriage);
        $('#net_total').val();
    });
    /******/
   
    /******/
    $(document).on('focusout','.code',function(){
        id = $(this).attr('id');
        id = id.substring(5);
        item_code = $('#code_'+id).val();
        $.ajax({
               type:'POST',
               url:'{{route('get_ajax_chemical_name')}}',
               data:{
                    "_token": "{{ csrf_token() }}",
                    'item_code' : item_code
               },
               success:function(data){
                data = JSON.parse(data);
                   $('#name_'+id).val(data);
               }
            });
    });

    $(document).on('focusout','.name',function(){
        id = $(this).attr('id');
        id = id.substring(5);
        item_name = $('#name_'+id).val();
        $.ajax({
               type:'POST',
               url:'{{route('get_ajax_chemical_code')}}',
               data:{
                    "_token": "{{ csrf_token() }}",
                    'item_name' : item_name
               },
               success:function(data){
                data = JSON.parse(data);
                 if(data == null){
                    return false;
                }
                   $('#code_'+id).val(data);
               }
            });
    });

    $('.code').autocomplete({
        source : '{{route('get_suggestion')}}',
        minlength:1,
        autoFocus:true,
        select:function(e,ui){
            source : ui;
        }
    });

    $('.name').autocomplete({
        source : '{{route('get_suggestion_name')}}',
        minlength:1,
        autoFocus:true,
        select:function(e,ui){
            source : ui;
        }
    });

    $(document).on('keyup','.quantity',function (){
        value = $(this).attr('id');
        id    = value.substring(9);
        multiply_by = $('#check_type_quantity').val();
        multiply_to = $(this).val();
        result = '';
        result = parseInt(multiply_by) * parseInt(multiply_to);
        $('#unit_'+id).attr('max',result);
        $('#storeage_quantity_'+id).val(result);

    });

  </script>
    <script type="text/javascript">
        $(document).on('keyup','.amount' , function (){
            chemical_amount = $('#chemical_amount').val();
            quantity   = $('.quantity').val();
            purchasing_type = $('#purchasing_type').val();
            get_item_quantity = $('#get_item_quantity').val();
            total_amount    = parseInt(quantity *  chemical_amount);
            $('#total_amount').val(total_amount);
            total_purchasing_measure = parseInt(get_item_quantity *   quantity);
            $('#calculation_detail').html('<strong>'+chemical_amount+' * '+quantity+' = '+total_amount+' rs </strong><br><strong>Total '+purchasing_type+' = '+total_purchasing_measure+'</strong>');
            $('#total_amount').val(total_amount);
            $('[name="total_strength"]').val(total_purchasing_measure);
        });
    
        /*Ajax Getting item detail */
        $(document).on('change','[name="item_name"]',function (){
            option = $(this).val();

            $.ajax({
               type:'POST',
               url:'{{route('get-purchase-type')}}',
               data:{
                    "_token": "{{ csrf_token() }}",
                    'item_type' : option
               },
               success:function(data){
                  data = JSON.parse(data);
                  $('#purchasing_type').val('');
                  $('#list_itemname').html('');
                  $('#list_itemtype').html('');
                  purchase_type = data.item_purchase_type;
                  $('#purchasing_type').val(purchase_type);
                  $('#list_itemname').html(data.item_name);
                  $('#list_itemtype').html(data.item_type+' '+purchase_type+'<input type="hidden" name="total_quantity" id="get_item_quantity" value="'+data.item_type+'"/><input type="hidden" name="measure_type"  value="'+purchase_type+'"/>');
                  $('[name="strength"]').val(data.item_type);
                  $('[name="total_strength"]').val(data.item_type);
                   chemical_amount = $('#chemical_amount').val();
                   /***************************Recalling************************/
                    quantity   = $('.quantity').val();
                    purchasing_type = $('#purchasing_type').val();
                    get_item_quantity = $('#get_item_quantity').val();
                    total_amount    = parseInt(quantity *  chemical_amount);
                    $('#total_amount').val(total_amount);
                    toal_purchasing_measure = parseInt(get_item_quantity *   quantity);
                    $('#calculation_detail').html('<strong>Total amount '+chemical_amount+' * '+quantity+' = '+total_amount+' rs </strong><br><strong>Total '+purchasing_type+' = '+toal_purchasing_measure+'</strong>');
                    $('[name="unit_purchased"]').val(toal_purchasing_measure);
                    /********************Recaling********************************/
               }
            });
        }); 
        /*Payment method show on credit seletion*/
        $(document).on('click','[name="payment_credit"]',function (){
            option = $(this).val();
            $("select[name='payment_status']").find("option[value='due']").attr("selected",true);
            if($('[name="payment_credit"]').is(":checked")){
                balance_credit = $('#credit_balance').val();
                if(balance_credit == 0){
                   balance_credit=  $('#credit_balance_limit').val();
                   $('#amount_credit').attr('max',balance_credit);
                }else{
                    $('#amount_credit').attr('max',balance_credit);
                }
                $('.credit_amount_field').show('slow');
                $('#amount_credit').prop('required',false);
                $('#credit_date_limit').prop('required',false);
                total_amount = $('[name="total_amount"]').val();
                cash_recieved = $('[name="cash_recieved"]').val();
                credit_amount = parseInt(total_amount -   cash_recieved);
                $('[name="limit_amount"]').val(credit_amount);
            }else{
                 $('.credit_amount_field').hide('slow');
            }

            if($('#pdc').is(":checked")){
                supplier = $('[name="supplier"]').val();

                if(supplier == ''){
                    alert('please select supplier first');
                    return false;
                }
                alert();
                $('.show_post_cheques').show('slow');
                $('[name="cheque_number"]').prop('required',true);
                $('[name="cheque_image"]').prop('required',true);
                $('[name="limit_cheque_date"]').prop('required',true);
                $('[name="cheque_amount"]').prop('required',true);
                 $.ajax({
                   type:'POST',
                   url:'{{route('get-cheque-limit')}}',
                   data:{
                        "_token": "{{ csrf_token() }}",
                        'supplier' : supplier
                   },
                   success:function(data){
                        data = JSON.parse(data);
                        
                        var someDate = new Date();
                        var numberOfDaysToAdd = parseInt(data.cheque_date_limit);
                        datee = someDate.setDate(someDate.getDate() + numberOfDaysToAdd); 
                        var dd =( '0' + ( someDate.getDate()+1) ).slice( -2 );
                        var mm = ( '0' + (someDate.getMonth()+1) ).slice( -2 );
                        var y = someDate.getFullYear();
                        date_limit = someFormattedDate = y + '-'+ mm + '-'+ dd;
                        $('#limit_cheque_date').attr('max',date_limit);
                        $('[name="due_date"]').attr('max' ,date_limit);
                   }
                });
            }else{
                 $('.show_post_cheques').hide('slow');
            }
                
           
        });

        $(document).on('click','[name="payment_cheque"]',function (){
            option = $(this).val();
            $("select[name='payment_status']").find("option[value='due']").attr("selected",true);
            $('.due').show('slow');
            $('[name="due_date"]').prop('required',true);
            $('[name="due_amount"]').prop('required',true);
            if($('#pdc').is(":checked")){
                supplier = $('[name="supplier"]').val();
                if(supplier == ''){
                    alert('please select supplier first');
                    return false;
                }
                $('[name="amount_credit"]').prop('required',false);
                $('[name="credit_date_limit"]').prop('required',false);
                $('[name="cash_recieved"]').prop('required',false); 
                $('.show_post_cheques').show('slow');
                $('[name="cheque_number"]').prop('required',true);
                $('[name="cheque_image"]').prop('required',true);
                $('[name="limit_cheque_date"]').prop('required',true);
                $('[name="cheque_number"]').prop('required',true);
                 $('#mycheque').modal('show');  
                 $.ajax({
                   type:'POST',
                   url:'{{route('get-cheque-limit')}}',
                   data:{
                        "_token": "{{ csrf_token() }}",
                        'supplier' : supplier
                   },
                   success:function(data){
                        data = JSON.parse(data);
                        console.log(data);
                        var someDate = new Date();
                        var numberOfDaysToAdd = parseInt(data.cheque_date_limit);
                        datee = someDate.setDate(someDate.getDate() + numberOfDaysToAdd); 
                        var dd =( '0' + ( someDate.getDate()+1) ).slice( -2 );
                        var mm = ( '0' + (someDate.getMonth()+1) ).slice( -2 );
                        var y = someDate.getFullYear();
                        date_limit = someFormattedDate = y + '-'+ mm + '-'+ dd;
                        $('#limit_cheque_date').attr('max',date_limit);
                   }
                });
            }else{
                 $('.show_post_cheques').hide('slow');
            }
                
            if(option == 'credit_amount'){
                
            }if(option == 'pdc'){
                
            }else{
                $('[name="cheque_number"]').prop('required',false);
                $('[name="cheque_image"]').prop('required',false);
                $('[name="limit_cheque_date"]').prop('required',false);
                $('[name="cheque_number"]').prop('required',false);
            }
        });

        /*Get selected supplier credit limit*/
         $(document).on('change','[name="supplier"]',function (){
            supplier = $(this).val();
           
            $.ajax({
               type:'POST',
               url:'{{route('get-credit-limit')}}',
               data:{
                    "_token": "{{ csrf_token() }}",
                    'supplier' : supplier
               },
               success:function(data){
                 data = JSON.parse(data);
                 console.log(data);
                 $('#scode').val(data['supplier'].id);
                 $('#name').val(data['supplier'].name);
                 $('#company_name').val(data['supplier'].company_name);
                 $('#phone_no').val(data['supplier'].phone_number);
                 $('#address').val(data['supplier'].address);
                 $('#credit_balance_limit').val(data['supplier_amount'].supplier_amount_limit);
                 $('#credit_balance').val(data.remaining_credit);
                 $('#pd_cheque_limit').val(data['supplier_amount'].supplier_amount_limit);
                 $('#pd_cheque_balance').val(data.remaining_cheque);
                 $('[name="limit_amount"]').attr('max' , data.supplier_amount_limit);
                 var someDate = new Date();
                 var numberOfDaysToAdd = parseInt(data['supplier_amount'].credit_date_limit);
                 datee = someDate.setDate(someDate.getDate() + numberOfDaysToAdd); 
                 var dd =( '0' + ( someDate.getDate()+1) ).slice( -2 );
                 var mm = ( '0' + (someDate.getMonth()+1) ).slice( -2 );
                 var y = someDate.getFullYear();
                 date_limit = someFormattedDate = y + '-'+ mm + '-'+ dd;
                  $('#credit_date_limit').attr('max',date_limit);
               }
            });

        });

         $(document).ready(function(){
             supplier = $("[name='supplier']").val();
           
            $.ajax({
               type:'POST',
               url:'{{route('get-credit-limit')}}',
               data:{
                    "_token": "{{ csrf_token() }}",
                    'supplier' : supplier
               },
               success:function(data){
                 data = JSON.parse(data);
                 console.log(data);
                 $('#scode').val(data['supplier'].id);
                 $('#name').val(data['supplier'].name);
                 $('#company_name').val(data['supplier'].company_name);
                 $('#phone_no').val(data['supplier'].phone_number);
                 $('#address').val(data['supplier'].address);
                 $('#credit_balance_limit').val(data['supplier_amount'].supplier_amount_limit);
                 $('#credit_balance').val(data.remaining_credit);
                 $('#pd_cheque_limit').val(data['supplier_amount'].supplier_amount_limit);
                 $('#pd_cheque_balance').val(data.remaining_cheque);
                 $('[name="limit_amount"]').attr('max' , data.supplier_amount_limit);
                 var someDate = new Date();
                 var numberOfDaysToAdd = parseInt(data['supplier_amount'].credit_date_limit);
                 datee = someDate.setDate(someDate.getDate() + numberOfDaysToAdd); 
                 var dd =( '0' + ( someDate.getDate()+1) ).slice( -2 );
                 var mm = ( '0' + (someDate.getMonth()+1) ).slice( -2 );
                 var y = someDate.getFullYear();
                 date_limit = someFormattedDate = y + '-'+ mm + '-'+ dd;
                  $('#credit_date_limit').attr('max',date_limit);
               }
            });

         });

         /*Get selected customer credit limit*/
         $(document).on('change','[name="customer"]',function (){
            customer = $(this).val();
           
            $.ajax({
               type:'POST',
               url:'{{route('get-credit-limit-customer')}}',
               data:{
                    "_token": "{{ csrf_token() }}",
                    'customer' : customer
               },
               success:function(data){
                 data = JSON.parse(data);
                 console.log(data);
                 $('#scode').val(data['customer'].id);
                 $('#name').val(data['customer'].name);
                 $('#company_name').val(data['customer'].company_name);
                 $('#phone_no').val(data['customer'].phone_number);
                 $('#address').val(data['customer'].address);
                 $('#credit_balance_limit').val(data['customer_amount'].customer_amount_limit);
                 $('#credit_balance').val(data.remaining_credit);
                 $('#pd_cheque_limit').val(data['customer_amount'].customer_amount_limit);
                 $('#pd_cheque_balance').val(data.remaining_cheque);
                 $('[name="limit_amount"]').attr('max' , data.customer_amount_limit);
                 var someDate = new Date();
                 var numberOfDaysToAdd = parseInt(data['customer_amount'].credit_date_limit);
                 datee = someDate.setDate(someDate.getDate() + numberOfDaysToAdd); 
                 var dd =( '0' + ( someDate.getDate()+1) ).slice( -2 );
                 var mm = ( '0' + (someDate.getMonth()+1) ).slice( -2 );
                 var y = someDate.getFullYear();
                 date_limit = someFormattedDate = y + '-'+ mm + '-'+ dd;
                  $('#credit_date_limit').attr('max',date_limit);
               }
            });

        });
    
        $(document).ready(function(){
            customer = $("[name='customer']").val();
           
            $.ajax({
               type:'POST',
               url:'{{route('get-credit-limit-customer')}}',
               data:{
                    "_token": "{{ csrf_token() }}",
                    'customer' : customer
               },
               success:function(data){
                 data = JSON.parse(data);
                 console.log(data);
                 $('#scode').val(data['customer'].id);
                 $('#name').val(data['customer'].name);
                 $('#company_name').val(data['customer'].company_name);
                 $('#phone_no').val(data['customer'].phone_number);
                 $('#address').val(data['customer'].address);
                 $('#credit_balance_limit').val(data['customer_amount'].customer_amount_limit);
                 $('#credit_balance').val(data.remaining_credit);
                 $('#pd_cheque_limit').val(data['customer_amount'].customer_amount_limit);
                 $('#pd_cheque_balance').val(data.remaining_cheque);
                 $('[name="limit_amount"]').attr('max' , data.customer_amount_limit);
                 var someDate = new Date();
                 var numberOfDaysToAdd = parseInt(data['customer_amount'].credit_date_limit);
                 datee = someDate.setDate(someDate.getDate() + numberOfDaysToAdd); 
                 var dd =( '0' + ( someDate.getDate()+1) ).slice( -2 );
                 var mm = ( '0' + (someDate.getMonth()+1) ).slice( -2 );
                 var y = someDate.getFullYear();
                 date_limit = someFormattedDate = y + '-'+ mm + '-'+ dd;
                  $('#credit_date_limit').attr('max',date_limit);
               }
            });
        });       

         /*Payment Status*/ 
         $(document).on('change','#payment_status',function (){
            payment_status = $(this).val();
            if(payment_status == 'due'){
                $('.due').show('slow');
                $('[name="due_date"]').prop('required',true);
                $('[name="due_amount"]').prop('required',true);
            }else{
                $('.due').hide('hide');
                $('[name="due_date"]').prop('required',false);
                $('[name="due_amount"]').prop('required',false);
            }
         });
         $(document).on('keyup','[name="cash_recieved"]',function (){
             total_amount = $('[name="total_amount"]').val();
                cash_recieved = $('[name="cash_recieved"]').val();
                credit_amount = parseInt(total_amount -   cash_recieved);
                $('[name="limit_amount"]').val(credit_amount);
         }); 
         $(document).on('blur','[name="due_amount"]',function (){
             total_amount = $('[name="limit_amount"]').val();
                cash_recieved = $('[name="due_amount"]').val();
                credit_amount = parseInt(total_amount) -   parseInt(cash_recieved);
                $('[name="limit_amount"]').val(credit_amount);
         }); 
          $(document).on('keyup','[name="unit_purchased"]',function (){
            unit_entered = parseInt($('[name="unit_purchased"]').val());
            unit_limit = parseInt($('[name="total_strength"]').val());

            purchase_unit = $('[name="purchase_unit"] option:selected').val();
             if(purchase_unit == 'gram'){
                 unit_entered = parseInt($('[name="unit_purchased"]').val());
                 conversion_unit = unit_entered;
                 limit_conversion = unit_limit * 1000;
                  $('#calculation_gram').html('<strong>1 kg = 1000 grams so '+unit_entered+' / 1000 = '+conversion_unit+'</strong>');
                if( conversion_unit > limit_conversion){
                    $('[name="unit_purchased"]').val('');
                    alert('Maximum unit for purchase is '+limit_conversion);
                }
            }
            if(purchase_unit == 'kg' || purchase_unit == 'liter' ){
                if(unit_limit < unit_entered){
                    alert('Can not buy unit more then the drum units');
                    $('[name="unit_purchased"]').val('');
                }
            }  
         }); 
        $(document).on('click','[name="payment_cash"]',function (){
             if($('[name="payment_cash"]').is(":checked")){
                $('#cash_recieved').show('slow');
                $('[name="cash_recieved"]').prop('required',true);
                $('[name="amount_credit"]').prop('required',false);
                $('[name="credit_date_limit"]').prop('required',false);
                $('[name="cheque_number"]').prop('required',false);
                $('[name="cheque_image"]').prop('required',false);
                $('[name="cheque_amount"]').prop('required',false);
                $('[name="limit_cheque_date"]').prop('required',false);
             }else{
                $('#cash_recieved').hide('slow');
                $('[name="cash_recieved"]').prop('required',false);
             }
        });
        $(document).on('change','[name="purchase_unit"]',function (){
             purchase_unit = $('[name="purchase_unit"] option:selected').val();
             selected_unit = $('[name="measure_type"]').val();
             total_strength = $('[name="total_strength"]').val();
             if(selected_unit == 'quantity' && purchase_unit != selected_unit ){
               $('[name="purchase_unit"] option:last').prop("selected", "selected");
               alert('Your are not allowed to convert quantity to other conversion!');
            }
            if(purchase_unit == 'kg'){
                $('.unit_purchased').hide();
                $('.purchased_gram').show();
                $('.purchased_kg').show();
                $('[name="purchased_kg"]').html('');
                for(var i = 1;i<=total_strength;i++){
                    $('[name="purchased_kg"]').append(`<option value="`+i+`">`+i+` kg</option>`);
                }
            }else{
                $('.unit_purchased').show();
                $('.purchased_kg').hide();
                $('.purchased_gram').hide();
            }
            if(purchase_unit == 'quantity' && selected_unit == 'kg' || selected_unit == 'liter'){
                strength = $('[name="strength"]').val();
                $('[name="unit_purchased"]').val(strength);
            }
        });
        $(document).on('click','#save_item',function(){
            item_type = $('#item_type').val();
            item_name = $('#item_name').val();
            item_purchase_type =  $('#item_purchase_type :selected').val();
            $.ajax({
               type:'POST',
               url:'{{route('insert-item-type')}}',
               data:{
                    "_token": "{{ csrf_token() }}",
                    'item_type' : item_type,
                    'item_name' : item_name,
                    'item_purchase_type' : item_purchase_type
               },
               success:function(data){
                data = JSON.parse(data);
                html = `<option value='`+item_name+`'>`+item_name+`<option>`;
                item_type = $('#item_type').val('');
                item_name = $('#item_name').val('');
                $('.add_item_type').append(html);
                item_purchase_type =  $('#item_purchase_type :selected').val('');
                 $('#close_modal').trigger('click');
               }
            });
        });
        $(document).on('focusout','.name',function(){
            id = $(this).attr('id');
            description = $('#'+id).val();
            $.ajax({
               type:'POST',
               url:'{{route('check_item')}}',
               data:{
                    "_token": "{{ csrf_token() }}",
                    'description' : description,
               },
               success:function(data){
                /*data = JSON.parse(data);*/
                console.log(data);
                if(data == 'false'){
                    $('#'+id).val('');
                    alert('Item does not exist in stock');
                }
               }
            });
        });
    </script> 
@endsection
@endsection