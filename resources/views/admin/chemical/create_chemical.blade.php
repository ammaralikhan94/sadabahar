@extends('layouts.admin_layout')
@section('title')
    Add - Chemical
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
                <h4 class="m-t-0 header-title"><b>Create Chemical</b></h4>
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-horizontal" action="{{route('insert_chemical')}}" method="post">
                            {{csrf_field()}}
                            <div class="form-group col-md-6">
                                <label class="col-md-2 control-label">Chemical Name</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="chemical_name" required="">
                                </div>
                            </div>

                            
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
@endsection