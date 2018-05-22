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

.bg-red{
    background-color: red;
    padding: 5px;
    color: #fff;
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
                <!-- <a class="btn btn-success pull-right" href="{{route('create_inventory')}}" target="_blank">Add More Purchase</a> -->
                <div class="new-purchase">
                    <div class="col-md-3">
                        <h4 class="m-t-0 header-title"><b>Create Purchase</b></h4>
                    </div>
                    <div class="col-md-2">
                        <h4 class="m-t-0 header-title pull-right bg-red"><b>Add Supplier</b></h4>
                    </div>
                    <div class="col-md-2">
                        <h4 class="m-t-0 header-title pull-left bg-red"><b>Add New Item</b></h4>
                    </div>
                    <div class="col-md-5">
                        <div class="col-md-4">
                            <h4 class="m-t-0 header-title"><b>Purchase Order No</b></h4>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control pull-right" name="purchase-order-no">
                        </div>
                        <div class="col-md-2">
                            <h4 class="m-t-0 header-title"><b>D.O.P</b></h4>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control pull-right" name="purchase-order-no">
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
                        
                        <form class="form-horizontal" action="{{route('insert_inventory')}}" method="post">
                            {{csrf_field()}}


                            <div class="form-group col-md-12">
                                <label class="col-md-1 control-label">Supplier</label>
                                <div class="col-md-2">
                                    <select class="form-control" required="" name="supplier">
                                        <option value="">Select Supplier</option>   
                                        @foreach($supplier as $key => $sup)
                                            <option value="{{$sup->id}}">{{$sup->name}}</option>   
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card-box clearfix">                                                        
                                    <div class="form-group col-md-3">
                                        <label class="col-md-4 control-label">Scode</label>
                                        <div class="col-md-8">
                                            <input type="number" class="form-control amount" name="chemical_amount" id="chemical_amount" placeholder="Item amount"  required="">
                                        </div>                                
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="col-md-3 control-label">Name</label>
                                        <div class="col-md-9">
                                            <input type="number" class="form-control amount" name="chemical_amount" id="chemical_amount" placeholder="Item amount"  required="">
                                        </div>                                
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label class="col-md-7 control-label">Company Name</label>
                                        <div class="col-md-5">
                                            <input type="number" class="form-control amount" name="chemical_amount" id="chemical_amount" placeholder="Item amount"  required="">
                                        </div>                                
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="col-md-4 control-label">Phone No</label>
                                        <div class="col-md-8">
                                            <input type="number" class="form-control amount" name="chemical_amount" id="chemical_amount" placeholder="Item amount"  required="">
                                        </div>                                
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="col-md-4 control-label">Mobile No</label>
                                        <div class="col-md-8">
                                            <input type="number" class="form-control amount" name="chemical_amount" id="chemical_amount" placeholder="Item amount"  required="">
                                        </div>                                
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-md-2 control-label">Address</label>
                                        <div class="col-md-10">
                                            <input type="number" class="form-control amount" name="chemical_amount" id="chemical_amount" placeholder="Item amount"  required="">
                                        </div>                                
                                    </div>
                                
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card-box clearfix">                                         
                                    <div class="form-group col-md-6">
                                        <label class="col-md-7 control-label">Credit Balance Limit</label>
                                        <div class="col-md-5">
                                            <input type="number" class="form-control amount" name="chemical_amount" id="chemical_amount" placeholder="Item amount"  required="">
                                        </div>                                
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="col-md-5 control-label">Credit Balance</label>
                                        <div class="col-md-7">
                                            <input type="number" class="form-control amount" name="chemical_amount" id="chemical_amount" placeholder="Item amount"  required="">
                                        </div>                                
                                    </div>
                                     <div class="form-group col-md-6">
                                        <label class="col-md-6 control-label">PD Cheque Limit</label>
                                        <div class="col-md-6">
                                            <input type="number" class="form-control amount" name="chemical_amount" id="chemical_amount" placeholder="Item amount"  required="">
                                        </div>                                
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="col-md-7 control-label">PD Cheque Balance</label>
                                        <div class="col-md-5">
                                            <input type="number" class="form-control amount" name="chemical_amount" id="chemical_amount" placeholder="Item amount"  required="">
                                        </div>                                
                                    </div>
                                
                                </div>
                            </div>
                        </form>
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <div class="row">                                                                                    
                                        <div class="p-20">
                                            <table class="table m-0">                                                    
                                                <thead>
                                                    <tr>
                                                        <th>S.No</th>
                                                        <th>Item Code</th>
                                                        <th width="50%">Descrption</th>
                                                        <th>Quantity</th>
                                                        <th>unit</th>
                                                        <th>Rate</th>
                                                        <th>Value Excl. Tax</th>
                                                        <th>Value incl. Tax</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>Mark</td>
                                                        <td>Otto</td>
                                                        <td>@mdo</td>
                                                        <td>Mark</td>
                                                        <td>Otto</td>
                                                        <td>@mdo</td>
                                                        <td>@mdo</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">2</th>
                                                        <td>Mark</td>
                                                        <td>Otto</td>
                                                        <td>@mdo</td>
                                                        <td>Mark</td>
                                                        <td>Otto</td>
                                                        <td>@mdo</td>
                                                        <td>@mdo</td>
                                                    </tr>
                                                </tbody>
                                                <thead>
                                                    <tr>
                                                        <th>3</th>
                                                        <th>M-983</th>
                                                        <th width="50%"></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th>Total</th>
                                                        <th>1,600/-</th>
                                                        <th>2,300/-</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-offset-6 col-md-6">
                                <div class="card-box clearfix">
                                    <div class="form-group col-md-12">
                                        <label class="col-md-5 control-label">Carriage and Freight</label>
                                        <div class="col-md-7">
                                            <input type="number" class="form-control amount" name="chemical_amount" id="chemical_amount" placeholder="Item amount"  required="">
                                        </div>                                
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-md-5 control-label">Net Total</label>
                                        <div class="col-md-7">
                                            <input type="number" class="form-control amount" name="chemical_amount" id="chemical_amount" placeholder="Item amount"  required="">
                                        </div>                                
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-md-5 control-label">Payment Method</label>
                                        <div class="col-md-7">
                                            <div class="checkbox radio-inline">
                                                <input id="checkbox0" type="checkbox">
                                                <label for="checkbox0">
                                                    Credit
                                                </label>
                                            </div>
                                            <div class="checkbox radio-inline">
                                                <input id="checkbox0" type="checkbox">
                                                <label for="checkbox0">
                                                    Cash
                                                </label>
                                            </div>
                                            <div class="checkbox radio-inline">
                                                <input id="checkbox0" type="checkbox">
                                                <label for="checkbox0">
                                                    Post Dated Cheque
                                                </label>
                                            </div>
                                        </div>                                
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-md-5 control-label">Amount Paid</label>
                                        <div class="col-md-7">
                                            <input type="number" class="form-control amount" name="chemical_amount" id="chemical_amount" placeholder="Item amount"  required="">
                                        </div>                                
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-md-5 control-label">Balance</label>
                                        <div class="col-md-7">
                                            <input type="number" class="form-control amount" name="chemical_amount" id="chemical_amount" placeholder="Item amount"  required="">
                                        </div>                                
                                    </div>
                                </div>
                            </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@section('customScript')
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
            /*$('[name="unit_purchased"]').val(total_purchasing_measure);
             $('[name="purchased_kg"]').html('');
            for(var i = 1;i<=total_purchasing_measure;i++){
                $('[name="purchased_kg"]').append(`<option value="`+i+`">`+i+` kg</option>`);
            }*/
        });
            
        $(document).on('keyup','.quantity' , function (){
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
            $('[name="unit_purchased"]').val(total_purchasing_measure);
             $('[name="purchased_kg"]').html('');
            for(var i = 1;i<=total_purchasing_measure;i++){
                $('[name="purchased_kg"]').append(`<option value="`+i+`">`+i+` kg</option>`);
            }
            alert('please select weigth again');
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
                $('.due').show('slow');
                $('[name="due_date"]').prop('required',true);
                $('[name="due_amount"]').prop('required',true);
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
                $('.cash').show('slow');
                $('[name="cash_recieved"]').prop('required',true);
                
             }else{
                $('.cash').hide('slow');
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

             
        })
    </script> 
@endsection
@endsection