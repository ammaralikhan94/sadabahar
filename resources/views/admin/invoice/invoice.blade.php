@extends('layouts.admin_layout')
@section('title')
  Invoice
@endsection
@section('customCss')
<style type="text/css">
    input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
    -webkit-appearance: none;
    -moz-appearance: none;  
    appearance: none;
    margin: 0; 
}
</style>
@endsection
@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
          <div class="panel-body">
              <div class="clearfix">
                  <div class="pull-left">
                      <h4 class="text-right"><strong>SADABAHAR</strong></h4>
                  </div>
                  <div class="pull-right">
                     {{--  <h4>Invoice # <br>
                          <strong>2015-04-23654789</strong>
                      </h4> --}}
                  </div>
              </div>
              <hr>
              <div class="row">
                  <div class="col-md-12">
                      <div class="pull-left m-t-30">
                          <address>
                            <strong>SADA BAHAR</strong><br>
                            Sadar , Karachi<br>
                            <abbr title="Phone">PHONE:</abbr> (021) 456-7890
                            </address>
                      </div>
                      <div class="pull-right m-t-30">
                          <p><strong>Date: </strong> {{$sale_item[0]['created_at']}}</p><br>
                          <p><strong>Customer: </strong> {{App\Customer::where('id',$sale_item[0]['customer'])->value('name')}} </p><br>
                          <p><strong>Payment Type: </strong> {{($sale_item[0]['payment_cash'] == 1)?'Cash':''}}{{($sale_item[0]['payment_cheque'] == 1)?'Cheque':''}}{{($sale_item[0]['payment_credit'] == 1)?'Cash':''}}</p><br>
                          
                          
                      </div>
                  </div>
              </div>
              <div class="m-h-50"></div>
              <div class="row">
                  <div class="col-md-12">
                      <div class="table-responsive">
                          <table class="table m-t-30">
                              <thead>
                                  <th>Sale Id</th>
                                  <th>Product</th>
                                  <th>Storage Type</th>
                                  <th>Barell Measure</th>
                                  <th>Unit purchased</th>
                                  <th>Unit Cost</th>
                              </tr></thead>
                              <tbody>
                                @foreach($sale_item as $key =>$val)
                                  @php  $sale_price = explode(',', $val->sale_price);
                                        $product = count($sale_price);
                                        $chemical_barrel = explode(',', $val->chemical_barrel);
                                        $sale_unit = explode(',', $val->sale_unit);
                                        $barrel_measure = explode(',', $val->barrel_measure);
                                         @endphp
                                  @for($i=0 ; $i<$product ;$i++)
                                    <tr>
                                        <td>{{$i+1}}</td>
                                        <td>{{$val->get_chemical['chemical_name']}}</td>
                                        <td>{{$chemical_barrel[$i]}}</td>
                                        <td>{{$barrel_measure[$i]}}</td>
                                        <td>{{$sale_unit[$i]}}</td>
                                        <td>{{$sale_price[$i]}}</td>
                                        @php  $total_price[] = $sale_price[$i];@endphp
                                    </tr>
                                  @endfor
                                  @php $cash_recieved = $val->cash_recieved; @endphp
                                @endforeach                                     
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
              <div class="row" style="border-radius: 0px;">
                  <div class="col-md-3 col-md-offset-9">
                      <p class="text-right"><b>Sub-total:</b> {{array_sum($total_price)}} </p>
                     
                      <hr>
                      
                  </div>
              </div>
              <hr>
              <div class="hidden-print">
                  <div class="pull-right">
                      <a href="javascript:window.print()" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></a>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>


@endsection