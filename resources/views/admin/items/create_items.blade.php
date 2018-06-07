@extends('layouts.admin_layout')
@section('title')
Add - Inventory
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
    <div class="col-sm-12">
        <div class="card-box">
            <div class="row">
                <div class="col-md-12">
                    <form class="form-horizontal" action="{{route('insert_item_type')}}" method="post">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <h4 class="m-t-0 header-title"><b>Create Item Type</b></h4>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" style="margin-bottom: 0px !important;">
                                    <label class="col-md-offset-6 col-md-3 control-label">SID:</label>
                                    <label class="col-md-3 control-label" style="text-align: left;">SID</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr>
                        </div>
                        {{csrf_field()}}
                        <div class="form-group col-md-4">
                            <label class="col-md-3 control-label">Item Name</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="item_name" required="">
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="col-md-5 control-label">Item purchase type</label>
                            <div class="col-md-7">
                                <select class="form-control" name="item_purchase_type">
                                    <option value="liter">Liter</option>
                                    <option value="kg">Kg</option>
                                    <option value="quantity">Quantity</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="col-md-4 control-label">Item strength</label>
                            <div class="col-md-8">
                                <input type="number" class="form-control" name="item_type"  required="">
                            </div>
                        </div>
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
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title"><b>Items Type</b></h4>
            <table id="subadmin_table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Item Name</th>
                    <th>Item Type</th>
                    <th>Item Purchase Type</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($items as $key => $val)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$val->item_name}}</td>
                    <td>{{$val->item_type}}</td>
                    <td>{{$val->item_purchase_type}}</td>
                    <td><a class="table-icons" href="{{route('edit_item' , ['id' => $val->id])}}"><i class="fa fa-edit"></a> <a class="table-icons" href="{{route('delete_item_type' , ['id' => $val->id])}}"><i class="fa fa-trash"></a></td>
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