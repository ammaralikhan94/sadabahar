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
                        <form class="form-horizontal" action="{{route('insert_sale')}}" method="post">
                        	{{csrf_field()}}


                            <div class="col-md-12">
                                <div class="card-box table-responsive">
                                    <h4 class="m-t-0 header-title"><b>Products</b></h4>
                                    <table class="table table-striped table-bordered" width="50px">
                                        <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Product Quantity Available</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="set_product">
                                        <tr>
                                            <td>
                                                 <select class="form-control" name="chemical_name[]" id="chemical_name" required="">
                                                    <option value="">Select Product</option>
                                                    @foreach($chemical as $key => $val)
                                                        <option value="{{$val->id}}">{{$val->chemical_name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td><input type="text" class="form-control" name="quantity_available[]" id="quantity_available"  required="" readonly=""></td>
                                            <td><button type="button" class="btn btn-primary" id="add_more_product">+</button></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                           {{--  <div class="form-group col-md-6" id="add_product_here">
                                <div class="row">
                                    <label class="col-md-2 control-label">Product</label>
                                    <div class="col-md-6">                                    
                                        <select class="form-control" name="chemical_name" id="chemical_name" required="">
                                                <option value="">Select Product</option>
                                                @foreach($chemical as $key => $val)
                                                    <option value="{{$val->id}}">{{$val->chemical_name}}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                    <label class="col-md-2 control-label">Qty</label>
                                <div class="col-md-2">
                                    <input type="text" class="form-control" name="quantity_available" id="quantity_available"  required="" readonly="">
                                </div>
                                  {{--   <button type="button" class="btn btn-success add_product" >+</button> --}}
                                {{-- </div>
                            </div>  --}}

                            <div class="form-group col-md-6">
                                <label class="col-md-2 control-label">Date of Purchase</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="dop"  required="" value="<?php echo date('Y-m-d');?>">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="col-md-2 control-label">Customer</label>
                                <div class="col-md-10">
                                    <select class="form-control" name="customer" id="customer">
                                        <option value="">Select Customer</option>
                                        @foreach($customer as $key => $val)
                                        <option value="{{$val->id}}">{{$val->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- <div class="form-group col-md-6">
                                <label class="col-md-2 control-label">Sale Price</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="sale_price"  required="" placeholder="Sale Price">
                                </div>
                            </div> --}}

                            {{-- Payment Mode Additional Field --}}

                            <div class="form-group col-md-6" style="display: none;" id="credit_amount">
                                <label class="col-md-2 control-label">Credit Amount</label>
                                <div class="col-md-10">
                                    <input type="number" class="form-control" name="limit_amount" placeholder="amount" min="0">
                                    <p><strong>Credit limit for this customer is <span id="credit_limit" style="color: red"></span></strong></p>
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
                            <div class="col-md-12">
                                <div class="card-box table-responsive">
                                    <h4 class="m-t-0 header-title"><b>Quantity</b></h4>
                                    <table class="table table-striped table-bordered" width="50px">
                                        <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Storage Name</th>
                                            <th>Storage Quantity</th>
                                            <th>Total Storage</th>
                                            <th>Available Quantity</th>
                                            <th>Unit Measure</th>
                                            <th>Sale Unit</th>
                                            <th>Sale Price</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="set_quantity">
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                              <div class="form-group col-md-6" style="float: right;">
                                        {{-- <input  type="checkbox" name="payment_credit"   value="1" > --}}
                                        <strong style="font-size: 20px"> Total Price :</strong>
                                      <span id="total_price" style="font-size: 20px;color: green"></span>
                                    </div>
                            
                            <input type="hidden" name="added_by" value="{{Auth::user()->id}}">
                             <div class="col-md-6" style="margin-left: 1200px">
                                <input type="submit" class="btn btn-success" value="Save" />    
                            </div>
                             <div class="col-md-6" style="margin-left: 1200px">
                                <button type="button" class="btn btn-success" id="calculate" >Calculate </button>    
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@section('customScript')

{{-- FOR FIRST PURCHASE JQUERY WORK START--}}
   <script type="text/javascript">
        count = 0 ;
        $('#chemical_name').on('change',function (){
            id = $(this).attr('id');
            chemical_id = $('#'+id).val();
            option_text = $('#chemical_name option:selected').text();
            /*Get Available Quantity*/ 
            $.ajax({
               type:'POST',
               url:'{{route('get_available_quantity')}}',
               data:{
                    "_token": "{{ csrf_token() }}",
                    'chemical_id' : chemical_id
               },
               success:function(data){
                $('#set_quantity').html('');
                data = JSON.parse(data);
                $('#quantity_available').val(data.barrel_quantity);
                $.each(data.barrel, function(key,val) {        
                console.log(val);     
                    html  = `<tr  id="`+val.id+`">
                        <td>`+option_text+`</td>
                        <td>`+val.barrel_type+`<input type="hidden" name="barrel_type[`+count+`][]" value="`+val.barrel_type+`" /></td>
                        <td><input type="hidden" class="form-control" name="total_barrel[`+count+`][]" value="`+val.total_barrel+`" min="0" max="`+val.total_barrel+`"/>`+val.total_barrel+`</td>
                        <td>`+parseInt(val.total_barrel  * val.total_volume)+`</td>
                        <td>`+val.current_volume+`<input type="hidden" name="current_volume[`+count+`][]" value="`+val.current_volume+`" /></td>
                        <td>`+val.barrel_measure+`<input type="hidden" name="barrel_measure[`+count+`][]" value="`+val.barrel_measure+`"</td>
                        <td><input type="number" class="form-control" name="sale_unit[`+count+`][]" min="0" max="`+parseInt(val.total_barrel  * val.total_volume)+`"/></td>
                        <td><input type="number" name="sale_price[`+count+`][]" class="form-control sale_calculate" /></td>
                        <td><button type="button" class="btn btn-danger delete_row" id="delete_me`+val.id+`"  >Delete</button></td>
                        </tr>`;
                    $('#set_quantity').append(html);
                });   
               }
            }); 
        });
        /*Add more*/
        $(document).on('click','.add_product',function (){
            html = `<div class="form-group col-md-6">
                                <div class="row">
                                    <label class="col-md-2 control-label">Product</label>
                                    <div class="col-md-8">                                    
                                        <select class="form-control" name="chemical_name[]" id="chemical_name" required="">
                                                <option value="">Select Product</option>
                                                @foreach($chemical as $key => $val)
                                                    <option value="{{$val->id}}">{{$val->chemical_name}}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                    <button type="button" class="btn btn-success add_product" >+</button>
                                </div>
                            </div>`;
            $('#add_product_here').append(html);
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
                customer = $('[name="customer"]').val();
                if(customer == ''){
                    alert('please select customer first');
                    return false;
                }
                $('.show_post_cheques').show('slow');
                $('[name="cheque_number"]').prop('required',true);
                $('[name="cheque_image"]').prop('required',true);
                $('[name="limit_cheque_date"]').prop('required',true);
                $('[name="cheque_amount"]').prop('required',true);

                
                 $.ajax({
                   type:'POST',
                   url:'{{route('get-credit-limit-customer')}}',
                   data:{
                        "_token": "{{ csrf_token() }}",
                        'customer' : customer
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
            alert();
            option = $(this).val();
            $("select[name='payment_status']").find("option[value='due']").attr("selected",true);
            $('.due').show('slow');
            $('[name="due_date"]').prop('required',true);
            $('[name="due_amount"]').prop('required',true);
            if($('#pdc').is(":checked")){
                customer = $('[name="customer"]').val();
                if(customer == ''){
                    alert('please select customer first');
                    return false;
                }
                $('.show_post_cheques').show('slow');
               
                 $('[name="cheque_number"]').prop('required',true);
                $('[name="cheque_image"]').prop('required',true);
                $('[name="limit_cheque_date"]').prop('required',true);
                $('[name="cheque_number"]').prop('required',true);
                
                 $.ajax({
                   type:'POST',
                   url:'{{route('get-cheque-limit-customer')}}',
                   data:{
                        "_token": "{{ csrf_token() }}",
                        'customer' : customer
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
                        alert(date_limit);
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
         $(document).on('click','[name="payment_cash"]',function (){

             if($('[name="payment_cash"]').is(":checked")){
                $('.cash').show('slow')
                $('[name="cash_recieved"]').prop('required',true);
             }else{
                $('.cash').hide('slow')
                $('[name="cash_recieved"]').prop('required',false);
             }
        });
         /*get customer limit*/
         $(document).on('change','[name="customer"]',function (){
             option = $(this).val();
             $.ajax({
               type:'POST',
               url:'{{route('get-credit-limit-customer')}}',
               data:{
                    "_token": "{{ csrf_token() }}",
                    'item_type' : option
               },
               success:function(data){
                  data = JSON.parse(data);
                  console.log(data);
                  $('[name="limit_amount"]').attr('max',data.customer_amount_limit);
                  $('#credit_limit').html(data.customer_amount_limit);
               }
            });
         });
         /*Add more Product*/
        $(document).on('click','#add_more_product',function (){
            html = `<tr id="parent_`+count+`">
                        <td>
                             <select class="form-control add_more_product" name="chemical_name[]" id="row_product`+count+`" required="">
                                <option value="">Select Product</option>
                                @foreach($chemical as $key => $val)
                                    <option value="{{$val->id}}">{{$val->chemical_name}}</option>
                                @endforeach
                            </select>
                        </td>
                            <td><input type="text" class="form-control" name="quantity_available[]" id="quantity_available`+count+`"  required="" readonly=""></td>
                            <td><button type="button" class="btn btn-primary" id="add_more_product">+</button> <button type="button" class="btn btn-danger remove_more_product" id="remove_product`+count+`">-</button></td>
                    </tr>`;
            $('#set_product').append(html);
            count++;
        });

        count_product = 0;
        $(document).on('change','.add_more_product',function (){
             id = $(this).attr('id');
             selected_product = $('#'+id).val();
             option_text = $('#'+id+' option:selected').text();
             count_value = id.substr(11);
             $.ajax({
               type:'POST',
               url:'{{route('get_available_quantity')}}',
               data:{
                    "_token": "{{ csrf_token() }}",
                    'chemical_id' : selected_product
               },
               success:function(data){
                data = JSON.parse(data);
                $('#quantity_available'+count_value).val(data.barrel_quantity);
                $('.'+count_value).html('');
                $.each(data.barrel, function(key,val) {
                $('#'+val.id).html('');             
                    html  = `<tr id="`+val.id+`" class="`+count_value+`"></tr>`;
                    $('#set_quantity').append(html);
                    $('#'+val.id).append(`
                        <td>`+option_text+`</td>
                        <td>`+val.barrel_type+`<input type="hidden" name="barrel_type[`+count+`][]" value="`+val.barrel_type+`" /></td>
                        <td><input type="hidden" class="form-control" name="total_barrel[`+count+`][]" value="`+val.total_barrel+`" min="0" max="`+val.total_barrel+`"/>`+val.total_barrel+`</td>
                        <td>`+parseInt(val.total_barrel  * val.total_volume)+`</td>
                        <td>`+val.current_volume+`<input type="hidden" name="current_volume[`+count+`][]" value="`+val.current_volume+`" /></td>
                        <td>`+val.barrel_measure+`<input type="hidden" name="barrel_measure[`+count+`][]" value="`+val.barrel_measure+`"</td>
                        <td><input type="number" class="form-control" name="sale_unit[`+count+`][]" min="0" max="`+parseInt(val.total_barrel  * val.total_volume)+`"/></td>
                        <td><input type="number" name="sale_price[`+count+`][]" class="form-control sale_calculate" /></td>
                        <td><button type="button" class="btn btn-danger delete_row" id="delete_me`+val.id+`" >Delete</button></td>
                        `);
                });   
               }
            }); 
        });
        $(document).on('click','.remove_more_product',function(){
            id = $(this).attr('id');
            id_count =id.substr(14);
            $(this).remove();
            $('.'+id_count).remove();
            $('#parent_'+id_count).remove();
        });
        $(document).on('click','.delete_row',function (){
            id = $(this).attr('id');
            row_id = id.substr(9);
            $("#"+row_id).remove();
        });
        arr = new Array();
        var suma = 0;
        $(document).on('click','#calculate',function (){
           $(".sale_calculate").each(function(val) {
                arr.push($(this).val());
            });
           for (i = 0; i < arr.length; i++) {
              suma += parseInt(arr[i]);
            }
            $('#total_price').html( '');
            $('#total_price').html(`<strong>`+suma+` Rs</strong>`);
        });
   </script>
@endsection
@endsection