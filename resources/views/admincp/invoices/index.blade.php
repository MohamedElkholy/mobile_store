@extends('admincp.index')
@section('content')
<div class="row-fluid">
  <div class="span12">
    <!-- BEGIN BORDERED TABLE widget-->
    <div class="widget">
      <div class="widget-body">
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th>@lang('admincp.invoice_number')</th>
              <th>@lang('admincp.client_name')</th>
              <th>@lang('admincp.status')</th>
              <th>@lang('admincp.created_at')</th>
              <th>@lang('admincp.creation_time')</th>
              <th>@lang('admincp.deserved_amount')</th>
            </tr>
          </thead>
          <tbody>
            @foreach($invoices as $invoice)
            <tr>
              <td><a href="{{aurl('invoice/'.$invoice->id)}}">{{$invoice->id}}</a></td>
              <td><a href="{{aurl('client/' .$invoice->client['id'])}}">{{$invoice->client['name']}}</a></td>
              <td>{{trans('admincp.'.$invoice->status )}}</td>
              <td>{{$invoice->created_at->format('Y/m/d')}}</td>
              <td>{{$invoice->created_at->format('h:i a')}}</td>
              <td>{{$invoice->deserved_amount}} <span>@lang('admincp.currency') </span></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
          <div class="pagination pagination-centered">
      {{$invoices->links()}}
    </div>
    </div>
    <!-- END BORDERED TABLE widget-->
  </div>
</div>
@endsection