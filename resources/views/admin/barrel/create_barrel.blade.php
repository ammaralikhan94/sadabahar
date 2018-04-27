@extends('layouts.admin_layout')
@section('title')
	Add - Barrel Inventory
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
                <h4 class="m-t-0 header-title"><b>Create Item Type</b></h4>
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-horizontal" action="{{route('insert_barrel')}}" method="post">
                        	{{csrf_field()}}
                            <div class="form-group col-md-6">
                                <label class="col-md-2 control-label">Barrel Type</label>
                                <div class="col-md-10">
                                    <select class="form-control" name="barrel_type">
                                        <option value="">Select barrel type</option>
                                        @foreach($item_type as $key => $val)
                                                <option value="{{$val->get_chemical['id']}}" >{{$val->item_name}}   ({{$val->get_chemical['chemical_name']}})</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                             <div class="form-group col-md-6">
                                <label class="col-md-2 control-label">Barrel Type</label>
                                <div class="col-md-4">
                                    <input type="text" name="barrel_strength" class="form-control" readonly="">
                                </div>
                                <label class="col-md-2 control-label">Barrel Strength</label>
                                <div class="col-md-4">
                                    <input type="text" name="barrel_measure" class="form-control" readonly="">
                                </div>
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label class="col-md-2 control-label">Chemical</label>
                                <div class="col-md-10">
                                    <select class="form-control" name="chemical_name">
                                        <option value="">Select Chemical</option>
                                        @foreach($inventory_chemical as $key => $chem)
                                            <option value="{{$chem->get_chemical['id']}}">{{$chem->get_chemical['chemical_name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="col-md-2 control-label">Empty barrel</label>
                                <div class="col-md-10">
                                    <input type="number" name="empty_barrel" class="form-control" placeholder="Empty Barrel Quantity" required="">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="col-md-2 control-label">Fully Occupied Barrel</label>
                                <div class="col-md-10">
                                    <input type="number" name="fully_occupied_barrel" class="form-control" placeholder="Fully Occupied  Barrel Quantity" value="0" readonly="">
                                </div>
                            </div>


                             <div class="form-group col-md-6">
                                <label class="col-md-2 control-label">Total <span id="type"></span> </label>
                                <div class="col-md-10">
                                    <input type="text" name="total_barrel" class="form-control" placeholder="Total number of drums" readonly="">
                                </div>
                            </div>

                            

                            <div class="form-group col-md-6">
                                <label class="col-md-2 control-label">Condition</label>
                                <div class="col-md-10">
                                    <select class="form-control" name="item_purchase_type">
                                        <option value="new">New</option>
                                        <option value="used">Used</option>      
                                    </select>
                                </div>
                            </div>

                            

                            <div class="form-group col-md-6">
                                <label class="col-md-2 control-label">Volume</label>
                                <div class="col-md-3">
                                    <input type="number" name="current_volume" class="form-control" placeholder="In kg" value="0">
                                    <small>Volume remaining <span id="remaining_volume" style="color: red"></span></small>
                                </div>
                                <label class="col-md-2 control-label">Volume unit</label>
                                <div class="col-md-3">
                                    <input type="text" name="current_unit" class="form-control"  readonly="">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="col-md-2 control-label">Total Volume</label>
                                <div class="col-md-10">
                                    <input type="number" name="total_volume" class="form-control" placeholder="In kg" value="0" readonly="">
                                </div>
                            </div>

                             <div class="form-group col-md-6">
                                
                            </div>
                            {{-- Drum 25 (stength) liter(type)  --}}

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
            $(document).on('change','[name="barrel_type"]',function (){
                option = $(this).val();
                barrel_type = $('[name="barrel_type"] option:selected').text();
                $('#type').html('');
                if(barrel_type != 'Select barrel type'){
                    $('#type').append(barrel_type);
                }
                $.ajax({
                   type:'POST',
                   url:'{{route('get-barrel-type')}}',
                   data:{
                        "_token": "{{ csrf_token() }}",
                        'item_type' : option
                    },
                   success:function(data){
                      data = JSON.parse(data);
                      $('[name="barrel_strength"]').val(data.item_type);
                      $('[name="barrel_measure"]').val(data.item_purchase_type);
                      $('[name="current_unit"]').val(data.item_purchase_type);
                   }
                });
            });
            /*Chemical Name*/
            $(document).on('change','[name="chemical_name"]',function (){
                chemical_id = $(this).val();
                barrel_type = $('[name="barrel_type"] option:selected').text();
                barrel_val = $('[name="barrel_type"] option:selected').val();
                barrel_type = barrel_type.substring(0,4);
                if(barrel_val == ''){
                    alert('Please select barrel type first');
                    $('[name="chemical_name"]').val($("#target option:first").val());
                    return false;
                }
                $.ajax({
                   type:'POST',
                   url:'{{route('get-chemical')}}',
                   data:{
                        "_token": "{{ csrf_token() }}",
                        'chemical_id' : chemical_id,
                        'barrel_type' : barrel_type
                    },
                   success:function(data){
                      data = JSON.parse(data);
                      console.log(data);
                      barrel_quantity = data.barrel_quantity;
                      total_quantity = data.total_quantity;
                      $('[name="total_barrel"]').val(barrel_quantity);
                      $('[name="fully_occupied_barrel"]').val(barrel_quantity);
                      $('[name="total_volume"]').val(total_quantity);
                   }
                });
            });
            /*Restrict empty barrel*/
            set_max_voume = 0;
            $(document).on('keyup','[name="empty_barrel"]',function (){
                total_quantity = $('[name="total_barrel"]').val();
                value_entered  = $('[name="empty_barrel"]').val();
                total_volume = $('[name="total_volume"]').val();
                barrel_strength = $('[name="barrel_strength"]').val();
                if(value_entered > total_quantity){
                    alert('Empty barrel for this chemical can not be more then barrel present in inventory');
                    value_entered  = $('[name="empty_barrel"]').val('');
                    return false;
                }
                for(var i=0;i<value_entered;i++){
                    set_max_voume = parseInt(total_volume) - parseInt(barrel_strength); 
                    total_volume  = set_max_voume;
                }
                    empty_barrel = parseInt(total_quantity) -  parseInt(value_entered);

                    $('[name="current_volume"]').attr('max',set_max_voume);
                    $('[name="fully_occupied_barrel"]').val(empty_barrel);
                    $('#remaining_volume').html(set_max_voume);
                
            })
            $(document).on('keyup','[name="current_volume"]',function (){
                total_volume = parseInt($('[name="total_volume"]').val());
                value_entered  = parseInt($('[name="current_volume"]').val());

                if(total_volume < value_entered ){
                    alert('Empty volume can not be more then total volume');
                    value_entered  = $('[name="current_volume"]').val('');
                    return false;
                }
                $('[name="current_volume"]').val(value_entered);
            })
        </script>
    @endsection        
@endsection