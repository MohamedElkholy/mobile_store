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
              <th>@lang('admincp.name')</th>
              <th>@lang('admincp.login_name')</th>
              <th>@lang('admincp.phone_number')</th>
              <th>@lang('admincp.permissions')</th>
              <th>@lang('admincp.edit')</th>
            </tr>
          </thead>
          <tbody>
            @foreach(moderators() as $moderator)
            <tr>
              <td>{{$moderator->name}}</td>
              <td>{{$moderator->user_name}}</td>
              <td>{{$moderator->phone_number}}</td>
              <td>@include('admincp.moderators.btn.permissions')</td>
              <td><a href="{{aurl('moderator/'.$moderator->id.'/edit')}}" class="btn btn-info"><i class="icon-edit"></i></a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <br>
        <a href="{{aurl('moderator/create')}}">
        <button class="btn btn-warning"><i class="icon-plus icon-white"></i>
        @lang('admincp.add_new_account')
        </button>
        </a>
        <br>
      </div>
    </div>
    <!-- END BORDERED TABLE widget-->
  </div>
</div>
@endsection