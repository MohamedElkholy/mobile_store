@extends('admincp.index')
@section('content')
<div class="row-fluid">
  <div class="span12">
    <!-- BEGIN BORDERED TABLE widget-->
    <div class="widget">
      <div class="widget-body">
        {{Form::open(['route'=>'moderator.store'])}}
          <div class="control-group">
            {{Form::label('name',trans('admincp.name'))}}
            {{Form::text('name',old('name'),['class'=>'input-large','style'=>'height:30px;'])}}
          </div>
          <div class="control-group">
            {{Form::label('email',trans('admincp.email'))}}
            {{Form::email('email',old('email'),['class'=>'input-large','style'=>'height:30px;'])}}
          </div>          
          <div class="control-group">
            {{Form::label('user_name',trans('admincp.login_name'))}}
            {{Form::text('user_name',old('user_name'),['class'=>'input-large','style'=>'height:30px;'])}}
          </div>
          <div class="control-group">
            {{Form::label('phone_number',trans('admincp.phone_number'))}}
            {{Form::text('phone_number',old('phone_number'),['class'=>'input-large','style'=>'height:30px;'])}}
          </div>
          <div class="control-group">
            {{Form::label('password',trans('admincp.password'))}}
            {{Form::password('password',['class'=>'input-large','style'=>'height:30px;'])}}
          </div>
          <div class="control-group">
            {{Form::label('permissions',trans('admincp.permissions'))}}            
            {{Form::select('permissions',['admin'=>trans('admincp.admin'),'moderator'=>trans('admincp.moderator')],null,['style'=>'height:40px;'])}}
          </div>
            {!!Form::reset(trans('admincp.reset'),['class'=>'btn btn-warning'])!!}
            {!!Form::submit(trans('admincp.save'),['class'=>'btn btn-primary'])!!}
          {{Form::close()}}
      </div>
    </div>
    <!-- END BORDERED TABLE widget-->
  </div>
</div>
@endsection