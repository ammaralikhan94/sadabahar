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
                        <small style="padding-left: 460px;"><a href="{{route('create_items')}}">Can not find item , Click here to add</a></small>
                        <form class="form-horizontal" action="{{route('insert_inventory')}}" method="post">
                        	{{csrf_field()}}
                            <div class="form-group col-md-6">
                                <div class="row">
                                    <label class="col-md-2 control-label">Purchase Item Name</label>
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
                                <label class="col-md-2 control-label">Date of Purchase</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="dop"  required="" value="<?php echo date('Y-m-d');?>" readonly>
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
                                <div class="row">
                                    <label class="col-md-2 control-label">Chemical</label>
                                    <div class="col-md-10">                                    
                                        <select class="form-control" name="chemical_name" required="">
                                                <option value="">Select Chemical</option>
                                                @foreach($chemical as $key => $val)
                                                    <option value="{{$val->id}}">{{$val->chemical_name}}</option>
                                                @endforeach
                                        </select>
                                    </div>
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
                                <label class="col-md-2 control-label">Payment Mode</label>
                                <div class="col-md-10">
                                    {{-- <select class="form-control" required="" name="payment_mode" id="payment_mode">
                                        <option value="">Select Payment Mode</option>
                                        <option value="cash">Cash</option>
                                        <option value="credit_amount">Credit amount</option>
                                        <option value="pdc">Post-dated cheques</option>
                                    </select> --}}
                                    <div class="checkbox checkbox-warning" style="float: left; margin-right:5px;">
                                            <input id="checkbox5" name="payment_mode" type="checkbox" value="cash" checked>
                                            <label for="checkbox5">
                                                Cash
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-warning" style="float: left; margin-right:5px;">
                                            <input id="checkbox5" type="checkbox" name="payment_mode" id="credit_amount"  value="credit_amount" >
                                            <label for="checkbox5">
                                                Credit amount
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-warning" style="float: left; margin-right:5px;">
                                            <input id="checkbox5" type="checkbox"  name="payment_mode" id="pdc" value="pdc">
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
                                    <input type="number" class="form-control" name="limit_amount" placeholder="amount"  required=""  >
                                </div>
                                <p><strong>Credit limit for this supplier is <span id="credit_limit" style="color: red"></span></strong></p>
                            </div>      
                            <input type="hidden" name="added_by" value="{{Auth::user()->id}}">
                            {{-- Post Dated Cheques --}}
                            <div class="form-group col-md-6 show_post_cheques" style="display: none">
                                <label class="col-md-2 control-label">Add cheque number</label>
                                <div class="col-md-10">
                                    <input type="number" class="form-control" name="cheque_number">
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
                            {{-- Payment Mode Additional Field --}}
                            
                            <div class="form-group col-md-6 ">
                                <label class="col-md-2 control-label">Cash Recieved</label>
                                <div class="col-md-10">
                                    <input type="number" class="form-control" name="cash_recieved" placeholder="Amount recieved" required="" >
                                </div>
                            </div>


                             <div class="form-group col-md-6">
                                <label class="col-md-2 control-label">Payment Status</label>
                                <div class="col-md-10">
                                    <select class="form-control" required="" name="payment_status" id="payment_status">
                                        <option value="">Select Payment Status</option>
                                        <option value="cash">Cash</option>
                                        <option value="due">Due</option>
                                        <option value="bounched">Bounced</option>
                                    </select>
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
            toal_purchasing_measure = parseInt(get_item_quantity *   quantity);
            $('#calculation_detail').html('<strong>'+chemical_amount+' * '+quantity+' = '+total_amount+' rs </strong><br><strong>Total '+purchasing_type+' = '+toal_purchasing_measure+'</strong>');
            $('#total_amount').val(total_amount);
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
                  $('#list_itemtype').html(data.item_type+' '+purchase_type+'<input type="hidden" name="total_quantity" id="get_item_quantity" value="'+data.item_type+'"/>');
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
        $(document).on('click','[name="payment_mode"]',function (){
            option = $(this).val();
            
            if($('#credit_amount').is(":checked")){
                alert('checked he credit amount');
            }

            if($('#pdc').is(":checked")){
                alert('pdc');
            }
            if(option == 'credit_amount'){
                $('#credit_amount').show('slow');
                $('.show_post_cheques').hide();
                $('[name="cheque_number"]').prop('required',true);
                $('[name="cheque_image"]').prop('required',true);
                $('[name="limit_cheque_date"]').prop('required',true);
                $('[name="cheque_number"]').prop('required',true);
                total_amount = $('[name="total_amount"]').val();
                cash_recieved = $('[name="cash_recieved"]').val();
                credit_amount = parseInt(total_amount -   cash_recieved);
                $('[name="limit_amount"]').val(credit_amount);
            }if(option == 'pdc'){
                supplier = $('[name="supplier"]').val();
                if(supplier == ''){
                    alert('please select supplier first');
                    return false;
                }
                $('.show_post_cheques').show('slow');
                $('#credit_amount').show('slow');
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
                $('[name="due_amount"]').prop('required',false);
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
    

    </script> 
@endsection
@endsection