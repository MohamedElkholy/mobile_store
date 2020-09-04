@extends('admincp.index')
@section('content')
<div class="row-fluid">
  <div class="widget">
    <div class="widget-body">
      <div class="row-fluid">
        <div class="span6">
          <img style="margin: 20px" src="{{asset(Storage::url(settings()->logo))}}" width="300" alt="">
        </div>
        <div class="span6" style="margin-top: 10px">
          <h2>@lang('admincp.sales_invoice')</h1>
        </div>
      </div>
      <div class="space20"></div>
      <div class="row-fluid invoice-list">
        <div class="span4">
          <h5>{{settings()->store_name}}</h5>
          <p>
            @lang('admincp.address') : {{settings()->address}}
            <br>
            @if(!empty(settings()->commercial_register))
            @lang('admincp.commercial_register') : {{settings()->commercial_register}} <br>
            @endif
            @lang('admincp.phone_number') : {{settings()->phone_number}}<br>
          </p>
        </div>
        @if(!empty($client))
        <div class="span4">
          <h5>@lang('admincp.client_info')</h5>
          <p>
            @lang('admincp.name') : {{$client->name}} <br>
            @lang('admincp.phone_number') : {{$client->phone_number}} <br>
            @lang('admincp.address') : {{$client->address}}
          </p>
        </div>
        @endif
        <div class="span4" id="invoice_info">
          <h5>@lang('admincp.invoice_info')</h5>
          <ul class="unstyled">
            <li><span>@lang('admincp.invoice_number') : </span> <strong> {{$invoice->id}}</strong></li>
            <li><span>@lang('admincp.created_at') : </span> {{$invoice->created_at->format('Y/m/d h:i a')}}</li>
            @if($invoice->status == 'paid')
            <li><span>@lang('admincp.payment_date') : </span> {{$invoice->payment_date }}</li>
            @endif
            <li><span>@lang('admincp.invoice_status') : </span> {{trans('admincp.'.$invoice->status)}}</li>
          </ul>
        </div>
      </div>
      <div class="space20"></div>
      <div class="space20"></div>
      <div class="row-fluid">
        <table class="table table-striped table-hover">
          <thead>
            <th>#</th>
            <th>@lang('admincp.product_name_or_servie_type')</th>
            <th>@lang('admincp.price')</th>
            <th>@lang('admincp.count')</th>
            <th>@lang('admincp.total')</th>
          </thead>
          <tbody class="saled-table">
            @foreach($operations as $key=>$operation)
            <tr>
              <td>{{$key + 1}}</td>
              <td>{{$operation->product != null ? $operation->product['name'] : $operation->service_type}}</td>
              <td>{{$operation->sale_price}}</td>
              <td>{{$operation->saled_count}}</td>
              <td>{{$operation->sale_price * $operation->saled_count}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="space20"></div>
      <div class="row-fluid">
        <div class="span8">
          <div class="space20"></div>
          <div>{{settings()->invoice_message}}</div>
        </div>
        <div class="span4 invoice-block">
          <ul class="unstyled amounts">
            <li> <span>{{$invoice->total_amount}}  @lang('admincp.currency') </span> <strong>@lang('admincp.total_amount') :</strong></li>
            @if($invoice->additional_discount > 0 )
            <li><span>{{round($invoice->additional_discount)}}  % </span> <strong>@lang('admincp.discount') :</strong> </li>
            <li><span>{{$invoice->deserved_amount}}  @lang('admincp.currency') </span> <strong>@lang('admincp.deserved_amount') :</strong> </li>
            @endif
          </ul>
        </div>
      </div>
      <div class="space20"></div>
        @if($invoice->status == 'waiting_paid' || $invoice->status == 'partially_paid')
        {!!Form::open(['url'=>aurl('invoice/done/' .$invoice->id),'method'=>'post','class'=>'form-inline text-center'])!!}
        <div class="form-group d-block">
        {!! Form::label('deserved_amount', trans('admincp.deserved_amount'), []) !!}
        {!! Form::text('deserved_amount', $invoice->rest, ['id'=>'deserved_amount','style'=>'height:40px','class'=>'form-control  invoiceInput','readonly']) !!}
        </div>
        <div class="form-group" style="display: inline-block;">
        {!! Form::label('paid_amount',trans('admincp.paid_amount'),[]) !!}
        {!! Form::number('paid_amount','',['id'=>'paid_amount','style'=>'height:40px','class'=>'form-control invoiceInput','onkeyup'=>'rest_complete(this.value)']) !!}
        </div>
        <div class="form-group" style="display: inline-block;">
        {!! Form::label('rest', trans('admincp.rest'), []) !!}
        {!! Form::text('rest', $invoice->rest, ['id'=>'rest','style'=>'height:40px','class'=>'form-control invoiceInput','readonly']) !!}
        </div>
              <div class="space20"></div>
        {!!Form::submit(trans('admincp.tahseel'),['class'=>'btn btn-primary btn-large hidden-print'])!!}
        <a onclick="printDiv('page')" class="btn btn-success btn-large hidden-print" style="margin-right:25px; ">@lang('admincp.print') <i class="icon-print icon-big"></i></a>
        {!!Form::close()!!}
        @endif
      <br>
      <div style="position: relative;right: 20px;bottom: 20px;">
        @lang('admincp.invoice_editor') : 
      {{$invoice->moderator['name']}}
    </div>
    </div>
  </div>
</div>
<script type="text/javascript">
function printDiv(divName) {
var printContents = document.getElementById(divName).innerHTML;
var originalContents = document.body.innerHTML;
document.body.innerHTML = printContents;
window.print();
document.body.innerHTML = originalContents;
}
function done_invoice(){
$("#")
}
function rest_complete(i){
  var des = $("#deserved_amount").val();
  $("#rest").val(des - i);
 
}
</script>
@endsection