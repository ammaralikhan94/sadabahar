@extends('layouts.admin_layout')
@section('title')
	Edit - Subadmin
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
                <h4 class="m-t-0 header-title"><b>Edit Sub Admin</b></h4>
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-horizontal" action="{{route('update_subadmin' , ['id' => $user->id])}}" method="POST">
                        	{{csrf_field()}}
                            <div class="form-group col-md-6">
                                <label class="col-md-2 control-label">Name</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="name" value="{{$user->name}}" required="">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="col-md-2 control-label" for="example-email">Email</label>
                                <div class="col-md-10">
                                    <input type="email" id="example-email" name="email" value="{{$user->email}}" class="form-control" placeholder="Email"  required="">
                                </div>
                            </div>
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                            {{-- <div class="form-group col-md-6">
                                <label class="col-md-2 control-label" for="example-email">Password</label>
                                <div class="col-md-10">
                                    <input type="password"  name="password" value="{{$user->password}}" class="form-control" placeholder="Passowrd"  required="">
                                </div>
                            </div>
 --}}
                            <div class="form-group col-md-6">
                                <label class="col-md-2 control-label">Number</label>
                                <div class="col-md-10">
                                    <input type="number" class="form-control" name="phone_number" value="{{$user->phone_number}}" required="">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="col-md-2 control-label">Location</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="address" placeholder="address" value="{{$user->address}}"  required="">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="col-md-2 control-label">Joining Date</label>
                                <div class="col-md-10">
                                    <input type="date" class="form-control" name="joining_date" placeholder="placeholder" value="{{$user->joining_date}}"  required="">
                                </div>
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label class="col-md-2 control-label">Designation</label>
                                <div class="col-md-10">
                                    <select class="form-control" name="role_id" required="">
                                    	<option value="">Select Designation</option>
                                    	@foreach($roles as $key => $val)
                                    		<option value="{{$val->id}}" {{($user->role_id == $val->id)?'selected':''}}>{{$val->roll_name}}</option>
                                    	@endforeach	
                                    </select>
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