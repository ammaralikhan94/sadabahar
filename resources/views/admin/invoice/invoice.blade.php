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
{{-- @php 
  var_dump($purchase_item);die;
@endphp --}}
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
          <div class="panel-body">
              <div class="clearfix">
                  <div class="pull-left">
                      <h4 class="text-right"><strong>SADABAHAR</strong></h4>
                  </div>
                  <div class="pull-right">
                     <h4>Invoice # <br>
                          <strong>{{$invoice}}</strong>
                      </h4>
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
                          <p><strong>Date: </strong> {{date('d-m-Y')}}</p><br>
                          <p><strong>Supplier: </strong> {{App\Supplier::where('id',$purchase_item[0]['supplier'])->value('name')}} </p><br>
                          <p><strong>Payment Type: </strong> {{(isset($purchase_item[0]['payment_cash']) &&  $purchase_item[0]['payment_cash'] == 'on')?'Cash,':''}}{{(isset($purchase_item[0]['payment_cheque']) && $purchase_item[0]['payment_cheque'] == 'on')?'Cheque,':''}}{{(isset($purchase_item[0]['payment_credit']) &&  $purchase_item[0]['payment_credit'] == 'on')?'credit,':''}}</p><br>
                      </div>
                  </div>
              </div>
              <div class="m-h-50"></div>
              <div class="row">
                  <div class="col-md-12">
                      <div class="table-responsive">
                          <table class="table m-t-30">
                              <thead>
                                  <th>Item code</th>
                                  <th>Item Name</th>
                                  <th>Storage Type</th>
                                  <th>Item Measure</th>
                                  <th>Per Unit Price</th>
                                  <th>Purchase Quantity</th>
                                  <th>Purchase Cost</th>
                                  <th>Excluding Tax</th>
                                  <th>Including Tax</th>
                              </tr></thead>
                              <tbody>
                                @foreach($purchase_item as $key => $val)
                                    <tr>
                                        <td>{{$val->item_code}}</td>
                                        <td>{{$val->item_name}}</td>
                                        <td>{{$val->storage_type}}</td>
                                        <td>{{$val->purchasing_type}}</td>
                                        <td>{{$val->purchase_unit}}</td>
                                        <td>{{$val->quantity}}</td>
                                        <td>{{$val->unit_purchased}}</td>
                                        <td>{{$val->exc_tax}}</td>
                                        <td>{{$val->inc_code}}</td>
                                    </tr>
                                @endforeach
                                 {{--  @php $cash_recieved = $val->cash_recieved; @endphp --}}
                                                                   
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
              <div class="row" style="border-radius: 0px;">
                  <div class="col-md-3 col-md-offset-9">
                    @php 
                      if(isset($purchase_item[0]['payment_cash']) && !empty($purchase_item[0]['payment_cash'])){
                    @endphp
                      <p class="text-right"><b>Cash Recieved:</b> {{$purchase_item[0]['cash_recieved']}} </p><br>
                      @php }@endphp 
                      @php 
                      if(isset($purchase_item[0]['cheque_amount']) && !empty($purchase_item[0]['cheque_amount'])){
                    @endphp
                      <p class="text-right"><b>Cheque Payment:</b> {{$purchase_item[0]['cheque_amount']}} </p><br>
                      @php }@endphp 
                      @php 
                      if(isset($purchase_item[0]['amount_credit']) && !empty($purchase_item[0]['amount_credit'])){
                    @endphp
                      <p class="text-right"><b>Credit Cash:</b> {{$purchase_item[0]['amount_credit']}} </p><br>
                      @php }@endphp 
                      @php 
                      if($purchase_item[0]['carriage'] != ''){
                      @endphp
                      <p class="text-right"><b>Carriage:</b> {{$purchase_item[0]['carriage']}} </p><br>
                      <p class="text-right"><b>Sub-total:</b> {{$purchase_item[0]['net_total']}} </p>
                      @php }else{@endphp
                      <p class="text-right"><b>Sub-total:</b> {{$purchase_item[0]['net_total']}} </p>
                      @php }@endphp 
                      <hr>
                      
                  </div>
              </div>
              <hr>
              <div class="hidden-print">
                 <div class="pull-right" style="margin-left: 10px">
                      <a href="{{route('dashboard')}}" class="btn btn-inverse waves-effect waves-light">Close</i></a>
                  </div>
                  <div class="pull-right">
                      <a href="javascript:window.print()" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></a>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>


@endsection