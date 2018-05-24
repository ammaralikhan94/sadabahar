@extends('layouts.admin_layout')
@section('title')
	List - Inventory
@endsection
@section('customCss')
        <!-- DataTables -->
        <link href="{{URL('/')}}/backend/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link href="{{URL('/')}}/backend/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="{{URL('/')}}/backend/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="{{URL('/')}}/backend/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="{{URL('/')}}/backend/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="{{URL('/')}}/backend/plugins/datatables/dataTables.colVis.css" rel="stylesheet" type="text/css"/>
        <link href="{{URL('/')}}/backend/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="{{URL('/')}}/backend/plugins/datatables/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css"/>
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
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title"><b>Inventory</b></h4>
            <table id="subadmin_table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Chemical Name</th>
                    <th>Storage type</th>
                    <th>Quantity</th>
                    <th>Total Amount</th>
                    <th>Payment Mode</th>
                    <th>Payment Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($inventory as $key => $val)
                <tr>
                    <td>{{$val->key + 1}}</td>
                    <td>{{$val->get_chemical['chemical_name']}}</td>
                    <td>{{$val->item_name}}</td>
                    <td>{{$val->quantity}}</td>
                    <td>{{$val->total_amount}}</td>
                    <td>{{($val->payment_cash == 1)?'Cash':''}}   {{($val->payment_credit == 1)?'Credit':''}}  {{($val->payment_cheque == 1)?'Cheque':''}}</td>
                    <td>{{$val->payment_status}}</td>
                    <td><a class="btn btn-primary" href="{{route('edit_inventory' , ['id' => $val->id])}}">Edit</a> <a class="btn btn-danger" href="{{route('delete_inventory' , ['id' => $val->id])}}">Delete</a></td>
                </tr>
                @endforeach
                @foreach($item_charter as $key => $value)
                    <tr>
                        <td>{{$value->key + 1}}</td>
                        <td>{{$value->item_name}}</td>
                        <td>-</td>
                        <td>-</td>
                        <td>{{$value->purchase_price}}</td>
                        <td>-</td>
                        <td>{{($value->payment_status == 0)?'Inactive':'Active'}}</td>
                        <td><a class="btn btn-primary" href="{{route('edit_inventory' , ['id' => $value->id])}}">Edit</a> <a class="btn btn-danger" href="{{route('delete_inventory' , ['id' => $val->id])}}">Delete</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
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
@endsection
@endsection