    @extends('layouts.admin_layout')
    @section('title')
    	Add - Inventory Charter
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

    <style type="text/css">
        
        .fa-plus, .fa-trash, {
            /*margin-top: 28px;*/
        }
        hr {
            margin-top: 5px !important;
            margin-bottom: 20px;
            border: 0;
            border-top: 1px solid #eee;
        }
        input, select{
            margin-bottom: 10px;
        }

        label{
            margin-top: 10px;
        }

        option{
            text-transform: uppercase;
        }

        input#category_name, input#category_id, input, #brand_name, #measurment_unit{
            text-transform: uppercase;
            font-weight: bold;
        }

        .no-padding{
            padding: 0px;
        }
    </style>
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">            
                <div class="row">
                    <div class="col-md-12">
                        	{{csrf_field()}}
                            <!-- <div class="col-md-6">
                                <h4 class="m-t-0 header-title"><b>Inventory Categories</b></h4>
                            </div> -->
                            <!-- <div class="col-md-6">
                                {{-- <button class="btn btn-success fa fa-plus pull-right"></button> --}}
                                
                            </div> -->
                            <!-- <div class="col-md-12">
                                <hr>
                            </div> -->
                            {{-- PARENT INVENTORY START --}}
                            <div class="form-group col-md-6">
                                <label>Inventory Category</label>
                                <select multiple class="form-control" required="" name="inventory_charter" id="select_inventory">
                                    <!-- <option value="">Select Inventory Category</option>     -->
                                    @foreach($parent_category as $key => $val )
                                        <option value="{{$val->id}}">{{$val->name}}</option>    
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">   
                                <div class="col-md-12">
                                    <div class="col-md-4">
                                        <button type="button" class="btn btn-success fa fa-line-chart"></button>
                                        <button class="btn btn-danger fa fa-list-alt"></button>
                                    </div>
                                    <div class="col-md-8">
                                        <button class="btn btn-danger fa fa-trash pull-right" id="delete_main"></button>
                                        <button class="btn btn-info fa fa-save pull-right"  id="submit_parent" ></button>
                                        <button class="btn btn-warning fa fa-close pull-right" id="cancel_main"></button>
                                    </div>
                                </div>                             
                                <div class="col-md-12">
                                    <label class="col-md-4">Main Category Code</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control amount" name="category_id" id="category_id" placeholder="Category ID" value="{{($count == '')?$count+1:$count}}" style="width: 60px;"  required="" readonly="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label  class="col-md-4">Main Category Name</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control amount" name="category_name" id="category_name" placeholder="Category Name"  required="">
                                    </div>
                                </div>                                
                            </div>
                            <div class="col-md-12">
                                <hr>
                            </div>
                            {{-- PARENT INVENTORY END --}}


                            {{-- PARENT INVENTORY START --}}
                            <!-- <div class="col-md-6">
                                <h4 class="m-t-0 header-title"><b>Sub Inventory Categories</b></h4>
                            </div> -->
                            <!-- <div class="col-md-6">
                                {{-- <button class="btn btn-success fa fa-plus pull-right"></button> --}}
                            </div> -->
                            <!-- <div class="col-md-12">
                                <hr>
                            </div> -->
                            <div class="form-group col-md-6">
                                <label>Sub Category Name</label>
                                <select multiple class="form-control" required="" name="supplier" id="sub_select">
                                    <!-- <option value="">Select Sub Inventory Category</option>                                        -->
                                </select>
                            </div>
                            <div class="form-group col-md-6">    
                                <div class="col-md-12">
                                    <div class="col-md-4">
                                        <button type="button" class="btn btn-success fa fa-line-chart"></button>
                                        <button class="btn btn-danger fa fa-list-alt"></button>
                                    </div>
                                    <div class="col-md-8">
                                        
                                        <button type="button" class="btn btn-danger fa fa-trash pull-right" id="delete_sub"></button>
                                        <button class="btn btn-info fa fa-save pull-right" id="submit_child"></button>
                                        <button class="btn btn-warning fa fa-close pull-right" id="submit_child_cancel"></button>
                                    </div>
                                </div>                            
                                <div class="col-md-12">
                                    <label class="col-md-4">Sub Category Code</label>
                                    <div class="col-md-8">
                                        <input style="width: 60px;" type="text" class="form-control" name="parent_id" id="parent_id" placeholder="Category ID"  required="" readonly="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="col-md-4">Sub Category Name</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="name" id="sub_name" placeholder="Category Name"  required="">
                                    </div>
                                </div>                                
                            </div>
                            {{-- PARENT INVENTORY END --}}
                            <div class="col-md-12">
                                <hr>
                            </div>
                            <!-- <div class="col-md-6">
                                <h4 class="m-t-0 header-title"><b>List of Inventory Items</b></h4>
                            </div> -->
                            <!-- <div class="col-md-6">
                                {{-- <button class="btn btn-success fa fa-plus pull-right"></button> --}}
                                <button type="button" class="btn btn-danger fa fa-trash pull-right" id="delete_item" style="margin-top: 0px !important"></button>
                            </div> -->
                            <!-- <div class="col-md-12">
                                <hr>
                            </div> -->                            
                            <div class="form-group col-md-6">
                                <label>Item</label>
                                <select multiple="" class="form-control" required="" id="item">
                                    
                                </select>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-offset-3 col-md-9 form-group">
                                    {{-- <button class="btn btn-success fa fa-plus pull-right"></button> --}}
                                    <button type="button" class="btn btn-success fa fa-line-chart" ></button>
                                    <button type="button" class="btn btn-danger fa fa-list-alt" ></button>
                                    <button type="button" class="btn btn-warning fa fa-search"></button>
                                    <button type="button" class="btn btn-danger fa fa-trash pull-right" id="delete_item"></button>
                                    <button class="btn btn-info fa fa-save pull-right" id="item_submit"></button>
                                    <button class="btn btn-warning fa fa-close pull-right" id="cancel_item"></button>
                                </div>
                                <div class="form-group">    
                                    <label class="col-md-3 control-label">Item Code</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control amount" name="item_code" id="item_code" placeholder="item code"  required="">
                                    </div>                                    
                                </div>
                                <div class="form-group">    
                                    <label class="col-md-3 control-label">Item Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control amount" name="item_name" id="item_name" placeholder="Item Name"  required="">
                                    </div>                                    
                                </div>
                                <div class="form-group">    
                                    <label class="col-md-3 control-label">Item Description</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control amount" name="item_description" id="item_description" placeholder="Item Description"  required="">
                                    </div>                                    
                                </div>
                                <div class="form-group">    
                                    <label class="col-md-3 control-label">Brand Name</label>
                                    <div class="col-md-9">
                                        
                                        <select name="brand_name" id="brand_name" class="form-control" required="">
                                            <option>Select Brand</option>
                                            @foreach($brand as $key => $val)
                                            <option value="{{$val->brand_name}}">{{$val->brand_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>                                    
                                </div>
                                <div class="form-group">    
                                    <label class="col-md-3 control-label">Purchase Price</label>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control amount" name="purchase_price" id="purchase_price" placeholder="Purchase Price"  required="">
                                    </div>        
                                    <label class="col-md-2 control-label">Sale Price</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control amount" name="selling_price" id="selling_price" placeholder="Sale Price"  required="">
                                    </div>                               
                                </div>
                                <div class="form-group">    
                                    <label class="col-md-3 control-label">Measurement Unit</label>
                                    <div class="col-md-9">
                                          <select name="measurment_unit" id="measurment_unit" class="form-control" required="">
                                            <option value="">Select Measurement</option>
                                            <option value="Kg">Kg</option>
                                            <option value="Liter">Liter</option>
                                            <option value="Quantity">Quantity</option>
                                        </select>
                                    </div>                                    
                                </div>
                                <div class="form-group">    
                                    <label class="col-md-3 control-label">Storage type</label>
                                    <div class="col-md-9">
                                          <select name="storage_type" id="storage_type" class="form-control" required="">
                                            @foreach($item_type as $key => $val)
                                            <option value="{{$val->item_purchase_type}}">{{$val->item_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>                                    
                                </div>
                                <div class="col-md-12">
                                    <label class="col-md-3 no-padding control-label">Inactive Item</label>
                                    <div class="checkbox radio-inline">
                                        <input  type="checkbox" name="status" id="status">
                                        <label for="checkbox0">
                                            
                                        </label>
                                    </div>
                                </div>
                               {{--  <button type="button" class="btn btn-success pull-right" >Submit</button> --}}
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('customScript')
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
    {{-- PARENT CATEGORY INSERT FUNCTION --}}
    <script type="text/javascript">
        $(document).on('click','#submit_parent',function (){
            category_name = $('#category_name').val();
            category_id = $('#category_id').val();
            console.log(category_name);
             $.ajax({
               type:'POST',
               url:'{{route('insert_inventory_charter')}}',
               data:{
                    "_token": "{{ csrf_token() }}",
                    'category_name' : category_name
               },
               success:function(data){
                    $('#select_inventory').append(`<option value='`+category_id+`'>`+category_name+`</option>`);
                    $('#category_id').val(data);
                    $('#select_inventory').css({"border-color" : "green","border" : "2px solid green"}); 
                    $('#category_name').val('');
                    setTimeout(function(){$('#select_inventory').css("border-color", "grey"); }, 1000);

                }
            });
        });
    </script>
    {{-- PARENT CATEGORY INSERT FUNCTION END --}}
    <script type="text/javascript">
        $(document).on('click','#submit_child_cancel',function (){
            $('#sub_name').val('');
        });
        $(document).on('click','#cancel_main',function (){
           $('#category_name').val('');
        })
        $(document).on('click','#cancel_item',function (){
            $('#select_inventory :selected').val('');
            $('#sub_select :selected').val('');
            $("#item_code").val('');
            $("#item_name").val('');
            $("#item_description").val('');
            $("#brand_name").val('');
            $("#purchase_price").val('');
            $("#selling_price").val('');
            $("#measurment_unit").val('');
            $("#status").val('');
            $("#status").attr('checked', false);
            item_code = (Math.random().toString(36).substr(2, 2));
            $("#item_code").val(item_code);


        })
    </script>
    {{-- SUB CATEGORY INSERT FUNCTION --}}
    <script type="text/javascript">
        $(document).on('click','#submit_child',function (){
            category_name = $('#sub_name').val();
            parent_id = $('#parent_id').val();
            
            $.ajax({
               type:'POST',
               url:'{{route('insert_sub_charter')}}',
               data:{
                    "_token": "{{ csrf_token() }}",
                    'category_name' : category_name,
                    'parent_id' : parent_id
               },
               success:function(data){
                    $('#sub_select').append(`<option value='`+data+`'>`+category_name+`</option>`);
                    $('#sub_select').css({"border-color" : "green","border" : "2px solid green"}); 
                    $('#sub_name').val('');
                    setTimeout(function(){$('#sub_select').css("border-color", "grey"); }, 1000);
                }
            });
        });

        $(document).on('change','#select_inventory',function(){
            parent_id = $('#select_inventory :selected').val();
            text = $('#select_inventory :selected').text();
            
            $('#category_name').val(text);
            $('#parent_id').val(parent_id); 
            $.ajax({
               type:'POST',
               url:'{{route('get_category')}}',
               data:{
                    "_token": "{{ csrf_token() }}",
                    'parent_id' : parent_id
               },
               success:function(data){
                console.log(data);
                $('#sub_select').find('option').remove().end().append('');
                $.each( JSON.parse(data), function( index, value ){
                      $('#sub_select').append(`<option value="`+value.id+`">`+value.name+`</option>`);
                    });
                }
            });
        });

         $(document).on('click','#item_submit',function(){
            parent_id           = $('#select_inventory :selected').val();
            sub_id              = $('#sub_select :selected').val();
            item_code           = $("#item_code").val();
            item_name           = $("#item_name").val();
            item_description    = $("#item_description").val();
            brand_name          = $('#brand_name :selected').val();
            purchase_price      = $("#purchase_price").val();
            selling_price       = $("#selling_price").val();
            measurment_unit     = $('#measurment_unit :selected').val();
            status              = $("#status").val();
            storage_type           = $('#storage_type :selected').val();
            
            if($("#status").prop("checked") == true){
                status = 1;
            }else{
                status = 0;
            }
            $.ajax({
               type:'POST',
               url:'{{route('insert_item')}}',
               data:{
                    "_token"             : "{{ csrf_token() }}",
                    'parent_id'          :  parent_id,
                    'sub_id'             :  sub_id,
                    'item_code'          :  item_code,
                    'item_name'          :  item_name,
                    'item_description'   :  item_description,
                    'brand_name'         :  brand_name,
                    'purchase_price'     :  purchase_price,
                    'selling_price'      :  selling_price,
                    'measurment_unit'    :  measurment_unit,
                    'status'             :  status,
                    'storage_type'       : storage_type
                },
                    success:function(data){
                       /* $('#select_inventory :selected').val('');
                        $('#sub_select :selected').val('');
                        $("#item_code").val('');
                        $("#item_name").val('');
                        $("#item_description").val('');
                        $("#brand_name").val('');
                        $("#purchase_price").val('');
                        $("#selling_price").val('');
                        $("#measurment_unit").val('');
                        $("#status").val('');
                        $("#status").attr('checked', false);*/
                        data = JSON.parse(data);
                        if(data.status == 'updated'){

                        }else{
                            $('#item').css({"border-color" : "green","border" : "2px solid green"}); 
                            $('#item').append(`<option value="`+item_name+`">`+item_name+`</opiton>`);
                            setTimeout(function(){$('#item').css("border-color", "grey"); }, 1000);
                            }    
                        }
                        
                });
                /*location.reload();*/
            });

        $(document).on('change','#sub_select',function(){
            parent_id = $('#sub_select :selected').val();
            parent_text = $('#sub_select :selected').text();
            item_code = (Math.random().toString(36).substr(2, 2));
            text = $('#sub_select :selected').text();
            $('#sub_name').val(text);
            $('#parent_id').val(parent_id); 
            $.ajax({
               type:'POST',
               url:'{{route('get_subcategory')}}',
               data:{
                    "_token": "{{ csrf_token() }}",
                    'parent_id' : parent_id
               },
               success:function(data){
                console.log(data);
                $('#item_code').val(item_code);
                $('#item').find('option').remove().end().append('<option value="">Select Item</option>');
                $.each( JSON.parse(data), function( index, value ){
                      $('#item').append(`<option value="`+value.id+`">`+value.item_name+`</option>`);
                    });
                }
            });
        });
        $(document).on('change','#item',function(){
            item_id = $('#item :selected').val();
            $.ajax({
               type:'POST',
               url:'{{route('get_item')}}',
               data:{
                    "_token": "{{ csrf_token() }}",
                    'item_id' : item_id
               },
               success:function(data){
                data = JSON.parse(data);
                $("#item_code").val('');
                $("#item_name").val('');
                $("#item_description").val('');
                $("#brand_name").val('');
                $("#purchase_price").val('');
                $("#selling_price").val('');
                $("#measurment_unit").val('');
                $("#status").val('');
                $("#item_code").val(data.item_code);
                $("#item_name").val(data.item_name);
                $("#item_description").val(data.item_description);
                $("#brand_name").val(data.brand_name);
                $("#purchase_price").val(data.purchase_price);
                $("#selling_price").val(data.selling_price);
                $("#measurment_unit").val(data.measurment_unit);
                $("#storage_type").val(data.storage);
                if(data.status == 1){
                    $("#status").attr('checked', true);
                }else{
                    $("#status").attr('checked', false);
                }
                }
            });
        });

        $(document).on('click','#delete_item',function (){
            item_id = $('#item :selected').val();
            
            $.ajax({
               type:'POST',
               url:'{{route('delete_item')}}',
               data:{
                    "_token": "{{ csrf_token() }}",
                    'item_id' : item_id
               },
               success:function(data){
                data = JSON.parse(data);
                $("#item_code").val('');
                $("#item_name").val('');
                $("#item_description").val('');
                $("#brand_name").val('');
                $("#purchase_price").val('');
                $("#selling_price").val('');
                $("#measurment_unit").val('');
                $("#status").val('');
                $("#status").attr('checked', false);
                $('#item').find('option').remove().end().append('<option value="">Select Item</option>');
                }
            });
        });
        $(document).on('click','#delete_main',function (){
            select_inventory = $('#select_inventory :selected').val();
             $.ajax({
               type:'POST',
               url:'{{route('delete_main')}}',
               data:{
                    "_token": "{{ csrf_token() }}",
                    'select_inventory' : select_inventory
               },
               success:function(data){
                $('#category_name').val('');
                data = JSON.parse(data);
                $("#item_code").val('');
                $("#item_name").val('');
                $("#item_description").val('');
                $("#brand_name").val('');
                $("#purchase_price").val('');
                $("#selling_price").val('');
                $("#measurment_unit").val('');
                $("#status").val('');
                $("#status").attr('checked', false);
                $('#select_inventory').find('option:selected').remove().end();
                $('#item').find('option').remove().end().append('<option value="">Select Item</option>');
                }
            });
        });
        $(document).on('click','#delete_sub',function (){
            sub_select = $('#sub_select :selected').val();
            $.ajax({
               type:'POST',
               url:'{{route('delete_sub')}}',
               data:{
                    "_token": "{{ csrf_token() }}",
                    'sub_select' : sub_select
               },
               success:function(data){
                data = JSON.parse(data);
                $("#parent_id").val('');
                $("#item_code").val('');
                $("#item_name").val('');
                $("#item_description").val('');
                $("#brand_name").val('');
                $("#purchase_price").val('');
                $("#selling_price").val('');
                $("#measurment_unit").val('');
                $("#status").val('');
                $("#status").attr('checked', false);
                parent_id = $('#select_inventory :selected').val();
                $('#parent_id').val(parent_id); 
                $.ajax({
                   type:'POST',
                   url:'{{route('get_category')}}',
                   data:{
                        "_token": "{{ csrf_token() }}",
                        'parent_id' : parent_id
                   },
                   success:function(data){
                    console.log(data);
                    $('#sub_select').find('option').remove().end().append('');
                    $.each( JSON.parse(data), function( index, value ){
                          $('#sub_select').append(`<option value="`+value.id+`">`+value.name+`</option>`);
                        });
                    }
                });
                $('#parent_id').val('');
                 $('#sub_select').find('option:selected').remove().end();
                }
            });
        });
    </script>
@endsection