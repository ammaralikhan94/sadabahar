@extends('layouts.admin_layout')
@section('title')
	Add - Subadmin
@endsection
@section('customCss')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- DataTables -->
    <link href="{{URL('/')}}/backend/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{URL('/')}}/backend/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{URL('/')}}/backend/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{URL('/')}}/backend/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{URL('/')}}/backend/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{URL('/')}}/backend/plugins/datatables/dataTables.colVis.css" rel="stylesheet" type="text/css"/>
    <link href="{{URL('/')}}/backend/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{URL('/')}}/backend/plugins/datatables/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css"/>
<style type="text/css">

    hr{
        margin-top: 10px;
        margin-bottom: 10px;
    }


</style>
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
        <div class="col-sm-7">
            <div class="card-box">                
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-horizontal" action="{{route('insert_supplier')}}" method="post">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <h4 class="m-t-0 header-title"><b>Create Supplier</b></h4>
                                </div>
                                <div class="col-md-6">
                                    <!-- <div class="form-group" style="margin-bottom: 0px !important;">
                                        <label class="col-md-offset-6 col-md-3 control-label">SID:</label>
                                        <label class="col-md-3 control-label" style="text-align: left;">SID</label>
                                    </div> -->
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr>
                            </div>
                        	{{csrf_field()}}
                            <div class="form-group col-md-6">
                                <label class="col-md-3 control-label">Supplier Name</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="name" required="">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="col-md-3 control-label">Contact Number</label>
                                <div class="col-md-9">
                                    <input type="number" class="form-control" name="phone_number" placeholder="Number" required="">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="col-md-3 control-label">Company</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="company_name" required="">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="col-md-3 control-label">Address</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="address" placeholder="address"  required="">
                                </div>
                            </div>

                            <div class="form-group col-md-6" style="display: none">
                                <label class="col-md-3 control-label">Payment Status</label>
                                <div class="col-md-9">
                                    <select class="form-control"  id="payment_status" name="cheque_status">
                                        <option value="">Select Payment Status</option>
                                        <option value="cleared">Cleared</option>
                                        <option value="due">Due</option>
                                        <option value="bounced">Bounced</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group col-md-6" style="display: none" id="due_date" >
                                <label class="col-md-3 control-label">Due Date</label>
                                <div class="col-md-9">
                                    <input type="date" class="form-control" name="due_date" placeholder="due date" value="0"  >
                                </div>
                            </div>

                            <div class="form-group col-md-6" style="display: none" id="due_amount" >
                                <label class="col-md-3 control-label">Due Amount</label>
                                <div class="col-md-9">
                                    <input type="numebr" class="form-control" name="due_amount" value="0"  >
                                </div>
                            </div>
                         
                            <div class="form-group col-md-6">
                                <label class="col-md-3 control-label">Payment Terms</label>
                                <div class="col-md-9">
                                    <select class="form-control" required="" name="payment_mode" id="payment_mode">
                                        <option value="">Select Payment Mode</option>
                                        <option value="cash">Cash</option>
                                        <option value="credit_limit">Set limit</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <h4 class="m-t-0 header-title"><b>Set Credit Limit</b></h4>
                                <hr>
                            </div>

                            <div class="form-group col-md-6" style="display: none" id="credit_limit" >
                                <label class="col-md-3 control-label">Credit limit</label>
                                <div class="col-md-9">
                                    <input type="numebr" class="form-control" name="supplier_amount_limit" value="0"  >
                                </div>
                            </div>

                            <div class="form-group col-md-6" style="display: none" id="cheque_date_limit" >
                                <label class="col-md-3 control-label">Days limit</label>
                                <div class="col-md-9">
                                    <input type="number" class="form-control" name="cheque_date_limit" placeholder="In days"  >
                                </div>
                            </div>

                            <div class="col-md-12">
                                <h4 class="m-t-0 header-title"><b>Set PD Cheque Limit</b></h4>
                                <hr>
                            </div>

                            <div class="form-group col-md-6" style="display: none" id="cheque_amount_limit" >
                                <label class="col-md-3 control-label">Cheque limit</label>
                                <div class="col-md-9">
                                    <input type="numebr" class="form-control" name="cheque_amount_limit" value="0"  >
                                </div>
                            </div>

                            <div class="form-group col-md-6" style="display: none" id="credit_date_limit" >
                                <label class="col-md-3 control-label">Days limit</label>
                                <div class="col-md-9">
                                    <input type="number" class="form-control" name="credit_date_limit" placeholder="In days"  >
                                </div>
                            </div>

                            


                            <div class="form-group col-md-6 pull-right">
                                <div class="col-md-offset-9 col-md-3">
                                    <input type="submit" class="form-control btn btn-success"  placeholder="placeholder" value="Submit">
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="card-box table-responsive">
                <div class="col-md-12">
                    <h4 class="m-t-0 header-title"><b>Supplier List</b></h4>
                    <hr>
                </div>
                <table id="subadmin_table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Joining Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($supplier as $key => $val)
                    <tr>
                        <td>{{$val->key + 1}}</td>
                        <td>{{$val->name}}</td>
                        <td>{{$val->phone_number}}</td>
                        <td>{{$val->address}}</td>
                        <td><a class="table-icons" href="{{route('edit_supplier' , ['id' => $val->id])}}"><i class="fa fa-edit"></i></a> {{-- <a class="btn btn-primary" href="{{route('add_payment' , ['id' => $val->id])}}">Add Payment</a> --}}{{-- <a class="btn btn-primary" href="{{route('supplier_payment' , ['id' => $val->id])}}">Payment Detail</a> --}} <a class="table-icons" href="{{route('supplier_payment' , ['id' => $val->id])}}"><i class="fa fa-eye"></i></a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @section('customScript')
        <script type="text/javascript">
            $(document).on('change' ,'#payment_status', function (){
                var value = $(this).val();
                if(value == 'due'){
                    $('#due_date').show('slow');
                    $('#due_amount').show('slow');                
                }else{
                    $('#due_date').hide('slow');
                    $('#due_amount').hide('slow');       
                }
            });
            $(document).on('change' ,'#payment_mode', function (){
                var value = $(this).val();
                if(value == 'credit_limit'){
                    $('#credit_limit').show('slow');
                    $('#credit_date_limit').show('slow');
                    $('#cheque_date_limit').show('slow');                
                    $('#cheque_amount_limit').show('slow');
                    $('#credit_limit').attr("required", true);
                    $('#credit_date_limit').attr("required", true);
                    $('#cheque_date_limit').attr("required", true);                
                    $('#cheque_amount_limit').attr("required", true);                        
                }else{
                    $('#credit_limit').hide('slow');
                    $('#credit_date_limit').hide('slow');
                    $('#cheque_date_limit').hide('slow');                
                    $('#cheque_amount_limit').hide('slow');
                    $('#credit_limit').attr("required", false);
                    $('#credit_date_limit').attr("required", false);
                    $('#cheque_date_limit').attr("required", false);                
                    $('#cheque_amount_limit').attr("required", false);   
                }
            });
        </script>

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
    @endsection
@endsection