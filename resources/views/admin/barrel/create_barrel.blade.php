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
                        <form class="form-horizontal" action="{{route('insert_item')}}" method="post">
                        	{{csrf_field()}}
                            <div class="form-group col-md-6">
                                <label class="col-md-2 control-label">Barrel Type</label>
                                <div class="col-md-10">
                                    <select class="form-control" name="barrel_type">
                                        <option value="">Select barrel type</option>
                                        @foreach($item_type as $key => $val)
                                            @if($val->item_name == 'drum' || $val->item_name == 'gallon')
                                                <option value="{{$val->id}}" >{{$val->item_name}}</option>
                                            @endif  
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
                                <label class="col-md-2 control-label">Empty barrel</label>
                                <div class="col-md-10">
                                    <input type="number" name="empty_barrel" class="form-control" placeholder="Empty Barrel Quantity">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="col-md-2 control-label">Fully Occupied Barrel</label>
                                <div class="col-md-10">
                                    <input type="number" name="fully_occupied_barrel" class="form-control" placeholder="Fully Occupied  Barrel Quantity" value="0">
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
                   }
                });
            });
        </script>
    @endsection        
@endsection