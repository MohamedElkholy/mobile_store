@extends('admincp.index')
@section('content')
<div class="row-fluid">
  <div class="span12">
    <!-- BEGIN BORDERED TABLE widget-->
    <div class="widget">
      <div class="widget-title">
        <h4>@lang('admincp.change_password')</h4>
      </div>
      <div class="widget-body">
        {!!Form::open(['url'=>aurl('moderator/profile/'.$moderator->id),'method'=>'PUT'])!!}
        <div class="control-group">
          {!!Form::label('password',trans('admincp.new_password'))!!}
          {!!Form::password('password',['class'=>'input-large','style'=>'height:30px;'])!!}
        </div>
        <div class="control-group">
          {!!Form::label('password_confirmation',trans('admincp.password_confirmation'))!!}
          {!!Form::password('password_confirmation',['class'=>'input-large','style'=>'height:30px;'])!!}
        </div>
        {!!Form::reset(trans('admincp.reset'),['class'=>'btn btn-warning'])!!}
        {!!Form::submit(trans('admincp.save'),['class'=>'btn btn-primary'])!!}
        {!!Form::close()!!}
      </div>
    </div>
    <!-- END BORDERED TABLE widget-->
  </div>
</div>
@endsection