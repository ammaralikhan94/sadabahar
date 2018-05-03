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
                <a class="btn btn-success pull-right" href="{{route('create_inventory')}}" target="_blank">Add More Purchase</a>
                <h4 class="m-t-0 header-title"><b>Create Purchase</b></h4>
                <div class="row">
                    <div class="col-md-12">
                        <small style="padding-left: 460px;"><a href="{{route('create_items')}}" target="_blank">Can not find item , Click here to add</a></small>
                        <form class="form-horizontal" action="{{route('insert_inventory')}}" method="post">
                        	{{csrf_field()}}
                            <div class="form-group col-md-6">
                                <label class="col-md-2 control-label">Date of Purchase</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="dop"  required="" value="<?php echo date('Y-m-d');?>" readonly>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="col-md-2 control-label">Supplier</label>
                                <div class="col-md-10">
                                    <select class="form-control" required="" name="supplier">
                                        <option value="">Select Supplier</option>   
                                        @foreach($supplier as $key => $sup)
                                            <option value="{{$sup->id}}">{{$sup->name}}</option>   
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <div class="row">
                                    <label class="col-md-2 control-label">Product</label>
                                    <div class="col-md-10">                                    
                                        <select class="form-control" name="chemical_name" required="">
                                                <option value="">Select Product</option>
                                                @foreach($chemical as $key => $val)
                                                    <option value="{{$val->id}}">{{$val->chemical_name}}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <div class="row">
                                    <label class="col-md-2 control-label">Item Storage</label>
                                    <div class="col-md-10">                                    
                                        <select class="form-control" name="item_name">
                                                <option value="">Select Purchasing Item</option>
                                                @foreach($item_type as $key => $val)
                                                    <option value="{{$val->item_name}}">{{$val->item_name}}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            

                            <div class="form-group col-md-6">
                                <label class="col-md-2 control-label">Purchase Unit Type</label>
                                <div class="col-md-4">
                                     <select class="form-control" name="purchase_unit">
                                         <option value="">Select Purchase Unit Type</option>
                                         <option value="kg">Kg</option>
                                         <option value="liter">Liter</option>
                                         <option value="gram">Gram</option>
                                         <option value="quantity">Quantity</option>
                                     </select>
                                </div>
                                <label class="col-md-2 control-label">Unit Purchased</label>
                                <div class="col-md-4">
                                    <input type="number" class="form-control" name="unit_purchased"  placeholder="Enter Unit Purchased"  required="">
                                </div>
                            </div>



                            <div class="form-group col-md-6">
                                <label class="col-md-2 control-label">Item Amount</label>
                                <div class="col-md-3">
                                    <input type="number" class="form-control amount" name="chemical_amount" id="chemical_amount" placeholder="Item amount"  required="">
                                </div>
                                <label class="col-md-3 control-label">Quantity</label>
                                <div class="col-md-3">
                                     <input type="number" class="form-control quantity" name="quantity" id="barrel_amount" placeholder="barrel amount"  required="" value="1">
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
                            {{-- Post Dated Cheques --}}
                            
                            {{-- Payment Mode Additional Field --}}
                            
                            <div class="form-group col-md-6 cash"  style="display: none">
                                <label class="col-md-2 control-label">Cash Recieved</label>
                                <div class="col-md-10">
                                    <input type="number" class="form-control" name="cash_recieved" placeholder="Amount recieved" >
                                </div>
                            </div>
                            <div class="form-group col-md-6 show_post_cheques" style="display: none">
                                <label class="col-md-2 control-label">Add cheque number</label>
                                <div class="col-md-10">
                                    <input type="number" class="form-control" name="cheque_number">
                                </div>
                            </div>  

                            <div class="form-group col-md-6 show_post_cheques" style="display: none">
                                <label class="col-md-2 control-label">Cheque Amount</label>
                                <div class="col-md-10">
                                    <input type="number" class="form-control"  name="cheque_amount"  >
                                </div>
                            </div>

                            <div class="form-group col-md-6 show_post_cheques" style="display: none">
                                <label class="col-md-2 control-label">Upload Cheque</label>
                                <div class="col-md-10">
                                    <input type="file" class="form-control"  name="cheque_image"  >
                                </div>
                            </div>

                            <div class="form-group col-md-6 show_post_cheques" style="display: none">
                                <label class="col-md-2 control-label">Cheque Date</label>
                                <div class="col-md-10">
                                    <input type="date" class="form-control" name="limit_cheque_date" min="@php echo date('Y-m-d'); @endphp"  id="limit_cheque_date"  >
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="col-md-2 control-label">Payment Status</label>
                                <div class="col-md-10">
                                    <select class="form-control" required="" name="payment_status" id="payment_status">
                                        <option value="">Select Payment Status</option>
                                        <option value="cleared">cleared</option>
                                        <option value="due">Due</option>
                                        <option value="bounched">Bounced</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="col-md-2 control-label">Purchase Amount</label>
                                <div class="col-md-10">
                                   <input type="number" name="purchase_amount" class="form-control" required="">
                                </div>
                            </div>

                            <div class="form-group col-md-6 due" style="display: none">
                                <label class="col-md-2 control-label">Due Date</label>
                                <div class="col-md-10">
                                    <input type="date" class="form-control" name="due_date"  min="{{date("Y-m-d")}}">
                                </div>
                            </div>
                            <div class="form-group col-md-6 due" style="display: none">
                                <label class="col-md-2 control-label">Due amount</label>
                                <div class="col-md-10">
                                    <input type="number" class="form-control" name="due_amount"  >
                                </div>
                            </div>
                            

                            <div class="form-group col-md-6">
                                <label class="col-md-3 control-label">Purchase Quanity Type</label>
                                <div class="col-md-3">
                                    <input type="text" name="purchasing_type" id="purchasing_type" class="form-control" readonly="">
                                </div>
                                <label class="col-md-2 control-label"></label>
                                <div class="col-md-3">
                                    <p>Per <strong id="list_itemname"></strong> contain <strong id="list_itemtype"></strong></p>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                            	<label class="col-md-2 control-label"></label>
                                <div class="col-md-10">
                                    <input type="submit" class="form-control btn btn-success"  placeholder="placeholder" value="Save">
                                </div>
                            </div>

                             <div class="form-group col-md-6">
                                <label class="col-md-2 control-label">Calculation</label>
                                <div class="col-md-10" id="calculation_detail">
                                   

                                </div>
                                <input type="hidden" name="strength" value="0"/>
                                <input type="hidden" name="total_strength" value="0"/>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="col-md-2 control-label">Calculation</label>
                                <div class="col-md-10" id="calculation_gram">
                                   
                                   
                                </div>
                            </div>

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
        $(document).on('keyup','.amount,.quantity' , function (){
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

                    /********************Recaling********************************/
               }
            });
        }); 

        /*Payment method show on credit seletion*/
        $(document).on('click','[name="payment_credit"]',function (){
            option = $(this).val();
            
            if($('[name="payment_credit"]').is(":checked")){
                $('#credit_amount').show('slow');
                total_amount = $('[name="total_amount"]').val();
                cash_recieved = $('[name="cash_recieved"]').val();
                credit_amount = parseInt(total_amount -   cash_recieved);
                $('[name="limit_amount"]').val(credit_amount);
            }else{
                 $('#credit_amount').hide('slow');
            }

            if($('#pdc').is(":checked")){
                supplier = $('[name="supplier"]').val();
                if(supplier == ''){
                    alert('please select supplier first');
                    return false;
                }
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


            if($('#pdc').is(":checked")){
                supplier = $('[name="supplier"]').val();
                if(supplier == ''){
                    alert('please select supplier first');
                    return false;
                }
                $('.show_post_cheques').show('slow');
               
                 $('[name="cheque_number"]').prop('required',true);
                $('[name="cheque_image"]').prop('required',true);
                $('[name="limit_cheque_date"]').prop('required',true);
                $('[name="cheque_number"]').prop('required',true);
                
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
                 $('#credit_limit').html(data.supplier_amount_limit);
                 $('[name="limit_amount"]').attr('max' , data.supplier_amount_limit);
                 
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
                $('.cash').show('slow')
                $('[name="cash_recieved"]').prop('required',true);
             }else{
                $('.cash').hide('slow')
                $('[name="cash_recieved"]').prop('required',false);
             }
        });
        $(document).on('change','[name="purchase_unit"]',function (){
             purchase_unit = $('[name="purchase_unit"] option:selected').val();
             selected_unit = $('[name="measure_type"]').val();
             if(selected_unit == 'quantity' && purchase_unit != selected_unit ){
               $('[name="purchase_unit"] option:last').prop("selected", "selected");
               alert('Your are not allowed to convert quantity to other conversion!');
             }
             if(purchase_unit == 'quantity' && selected_unit == 'kg' || selected_unit == 'liter'){
                strength = $('[name="strength"]').val();
                $('[name="unit_purchased"]').val(strength);
             }

             
        })
    </script> 
@endsection
@endsection