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
              <th>@lang('admincp.client_number')</th>
              <th>@lang('admincp.name')</th>
              <th>@lang('admincp.phone_number')</th>
              <th>@lang('admincp.address')</th>
              <th>@lang('admincp.invoices_count')</th>
            </tr>
          </thead>
          <tbody>
            @foreach($clients as $client)
            <tr>
              <td><a href="{{aurl('client/'.$client->id)}}">{{$client->id}}</a></td>
              <td>{{$client->name}}</td>
              <td>{{$client->phone_number}}</td>
              <td>{{$client->address}}</td>
              <td>
                {{($client->invoices)->count()}}
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
          <div class="pagination pagination-centered">
      {{$clients->links()}}
    </div>
    </div>
    <!-- END BORDERED TABLE widget-->
  </div>
</div>
@endsection