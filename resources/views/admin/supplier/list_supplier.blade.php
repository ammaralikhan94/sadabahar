@extends('layouts.admin_layout')
@section('title')
	Add - Supplier
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
            <h4 class="m-t-0 header-title"><b>Supplier</b></h4>
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
                    <td><a class="btn btn-primary" href="{{route('edit_supplier' , ['id' => $val->id])}}">Edit</a> {{-- <a class="btn btn-primary" href="{{route('add_payment' , ['id' => $val->id])}}">Add Payment</a> --}}{{-- <a class="btn btn-primary" href="{{route('supplier_payment' , ['id' => $val->id])}}">Payment Detail</a> --}} <a class="btn btn-success" href="{{route('supplier_payment' , ['id' => $val->id])}}">Payment details</a></td>
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