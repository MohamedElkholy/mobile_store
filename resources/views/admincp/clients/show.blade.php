@extends('admincp.index')
@section('content')
<div class="row-fluid">
  <div class="span12">
    <!-- BEGIN BORDERED TABLE widget-->
    <div class="widget">
      <div class="widget-title">
        <h4>
        @lang('admincp.client_info')
        </h4>
      </div>
      <div class="widget-body">
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th>@lang('admincp.id')</th>
              <th>@lang('admincp.name')</th>
              <th>@lang('admincp.phone_number')</th>
              <th>@lang('admincp.address')</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{$client->id}}</td>
              <td>{{$client->name}}</td>
              <td>{{$client->phone_number}}</td>
              <td>{{$client->address}}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="widget">
      <div class="widget-title">
        <h4>
        @lang('admincp.client_invoices')
        </h4>
      </div>
      <div class="widget-body">
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th>@lang('admincp.invoice_number')</th>
              <th>@lang('admincp.status')</th>
              <th>@lang('admincp.created_at')</th>
              <th>@lang('admincp.creation_time')</th>
              <th>@lang('admincp.deserved_amount')</th>
            </tr>
          </thead>
          <tbody>
            @foreach($client->invoices as $invoice)
            <tr>
              <td><a href="{{aurl('invoice/'.$invoice->id)}}">{{$invoice->id}}</a></td>
              <td>{{trans('admincp.'.$invoice->status )}}</td>
              <td>{{$invoice->created_at->format('Y/m/d')}}</td>
              <td>{{$invoice->created_at->format('h:i a')}}</td>
              <td>{{$invoice->deserved_amount}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <!-- END BORDERED TABLE widget-->
  </div>
</div>
@endsection