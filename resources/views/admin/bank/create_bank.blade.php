@extends('layouts.admin_layout')
@section('title')
    Add - Bank
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
        <div class="col-sm-6">
            <div class="card-box">
                <h4 class="m-t-0 header-title"><b>Create Bank</b></h4>
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-horizontal" id="form_action" action="{{route('insert_bank')}}" method="post">
                            {{csrf_field()}}
                            <div class="form-group col-md-8">
                                <label class="col-md-3 control-label">Bank Name</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="bank_name" id="bank_name" required="">
                                </div>
                            </div>
                            <div class="form-group col-md-4">
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
        <div class="col-sm-6">
            <div class="card-box table-responsive">
                <h4 class="m-t-0 header-title"><b>Bank</b></h4>
                <table id="subadmin_table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Action</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($bank as $key => $val)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td><input type="hidden" value="{{$val->bank_name}}" id="bank_{{$val->id}}">{{$val->bank_name}}</td>
                        <td><a href="javascript:;" id="{{$val->id}}" class="btn btn-primary edit">Edit</a> <a href="{{route('delete_bank',['id' => $val->id])}}" class="btn btn-danger">Delete</a></td>
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
        $(document).on('click','.edit',function(){
        id = $(this).attr('id');
        bank_name  = $('#bank_'+id).val();
        $('#form_action').append(`<input type="hidden" name="id" value="`+id+`">`);
        $('#bank_name').val(bank_name);
         $('#form_action').attr('action', '{{route('update_bank')}}');
        $.ajax({
               type:'POST',
               url:'{{route('get_ajax_chemical_name')}}',
               data:{
                    "_token": "{{ csrf_token() }}",
                    'item_code' : item_code
               },
               success:function(data){
                data = JSON.parse(data);
                   $('#name_'+id).val(data);
               }
            });
    });
    </script>
@endsection
@endsection
