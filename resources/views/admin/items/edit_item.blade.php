@extends('layouts.admin_layout')
@section('title')
	Edit - Item
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
                <h4 class="m-t-0 header-title"><b>Edit Item Type</b></h4>
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-horizontal" action="{{route('update_item')}}" method="post">
                        	{{csrf_field()}}
                            <div class="form-group col-md-4">
                                <label class="col-md-3 control-label">Item Name</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="item_name" value="{{$item->item_name}}" required="">
                                </div>
                            </div>
                            <input type="hidden" name="item_id" value="{{$item->id}}">
                            <div class="form-group col-md-4">
                                <label class="col-md-3 control-label">Item purchase type</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="item_purchase_type">
                                        <option value="liter" {{($item->item_purchase_type == 'liter')?'selected':''}}>Liter</option>
                                        <option value="kg" {{($item->item_purchase_type == 'kg')?'selected':''}}>Kg</option>
                                        <option value="square_feet" {{($item->item_purchase_type == 'square_feet')?'selected':''}}>square feet</option>
                                        <option value="quantity" {{($item->item_purchase_type == 'quantity')?'selected':''}}>Quantity</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label class="col-md-3 control-label">Item strength</label>
                                <div class="col-md-9">
                                    <input type="number" class="form-control" name="item_type" value="{{$item->item_type}}"  required="">
                                </div>
                            </div>

                            {{-- Drum       25 (stength) liter(type)  --}}
                            <div class="form-group col-md-12">
                                <div class="col-md-offset-10 col-md-2">
                                    <input type="submit" class="form-control btn btn-success"  placeholder="placeholder" value="Save">
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection