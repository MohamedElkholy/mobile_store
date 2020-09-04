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
              <th>@lang('admincp.operation_number')</th>
              <th>@lang('admincp.operation_type')</th>
              <th>@lang('admincp.product_name_or_servie_type')</th>
              <th>@lang('admincp.count')</th>
              <th>@lang('admincp.invoice_number')</th>
              <th>@lang('admincp.operation_amount')</th>
              <th>@lang('admincp.operation_date')</th>
              <th>@lang('admincp.status')</th>
            </tr>
          </thead>
          <tbody>
            @foreach($operations as $operation)
            <tr>
              <td><a href="{{aurl('operation/'.$operation->id)}}">{{$operation->id}}</a></td>
              <td>{{trans('admincp.'.$operation->type)}}</td>
              <td>
                @if($operation->product !=null)
                  <a href="{{aurl('product/'.$operation->product['id'])}}">{{$operation->product['name']}}</a>
                @else()
                 {{$operation->service_type}}                 
                @endif
              </td>
              <td>{{$operation->saled_count}}</td>
              <td><a href="{{aurl('invoice/'.$operation->invoice_id)}}">{{$operation->invoice_id}}</a></td>
              <td>{{$operation->total_price}}</td>
              <td>{{$operation->created_at->format('Y/m/d')}}</td>
              <td>{{trans('admincp.'.$operation->status)}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="pagination pagination-centered">
        {{$operations->links()}}
      </div>
    </div>
    <!-- END BORDERED TABLE widget-->
  </div>
</div>
@endsection