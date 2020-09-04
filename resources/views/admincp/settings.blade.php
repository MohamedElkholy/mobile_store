@extends('admincp.index')
@section('content')
<div class="row-fluid">
  <div class="span12">
    <!-- BEGIN BORDERED TABLE widget-->
    <div class="widget">
      <div class="widget-body">
        {{Form::open(['url'=>aurl('settings/update'),'method'=>'put','files' => true])}}
        <div class="row-fluid">
          <div class="span4">
            <div class="control-group">
              {{Form::label('store_name',trans('admincp.store_name'))}}
              {{Form::text('store_name',$settings->store_name,['class'=>'input-large ','style'=>'height:30px'])}}
            </div>
          </div>
          <div class="span4">
            <div class="control-group">
              {{Form::label('store_logo',trans('admincp.store_logo'))}}
              {{Form::text('store_logo',$settings->store_logo,['class'=>'input-large ','style'=>'height:30px'])}}
            </div>
          </div>
        </div>
        <div class="row-fluid">
          <div class="span4">
            <div class="control-group">
              {{Form::label('phone_number',trans('admincp.phone_number'))}}
              {{Form::text('phone_number',$settings->phone_number,['class'=>'input-large ','style'=>'height:30px'])}}
            </div>
          </div>
          <div class="span4">
            <div class="control-group">
              {{Form::label('address',trans('admincp.address'))}}
              {{Form::text('address',$settings->address,['class'=>'input-large ','style'=>'height:30px'])}}
            </div>
          </div>
        </div>
        <div class="row-fluid">
          <div class="span4">
            <div class="form-group">
              {!!Form::label('status',trans('admincp.site_status'))!!}
              {!!Form::select('status',['opened'=>trans('admincp.opened'),'closed'=>trans('admincp.closed')],$settings->status,['class'=>'input-large','style'=>'height:40px;'])!!}
            </div>
          </div>
          <div class="span4">
            <div class="control-group">
              {{Form::label('close_message',trans('admincp.close_message'))}}
              {{Form::textarea('close_message',$settings->close_message,['class'=>'input-large ','rows'=>'3'])}}
            </div>
          </div>
        </div>
        <div class="row-fluid">
          <div class="span4">
            <div class="control-group">
              {{Form::label('commercial_register',trans('admincp.commercial_register'))}}
              {{Form::text('commercial_register',$settings->commercial_register,['class'=>'input-large ','style'=>'height:30px'])}}
            </div>
          </div>
          <div class="span4">
            <div class="control-group">
              {{Form::label('invoice_message',trans('admincp.invoice_message'))}}
              {{Form::textarea('invoice_message',$settings->invoice_message,['class'=>'input-large','rows'=>'3'])}}
            </div>
          </div>
        </div>
        <div class="row-fluid">
          <div class="span4">
            <div class="control-group">
              {!!Form::label('logo',trans('admincp.logo'))!!}
              {!!Form::file('logo',['id'=>'nologo'])!!}
              @if(!empty($settings->logo))
              <img src="{{asset(Storage::url($settings->logo))}}"/ width="50" height="50">
              @endif
            </div>
          </div>
          <div class="span4">
            <div class="control-group">
              {!!Form::label('icon',trans('admincp.icon'))!!}
              {!!Form::file('icon')!!}
              @if(!empty($settings->icon))
              <img src="{{asset(Storage::url($settings->icon))}}"/ width="50" height="50">
              @endif
            </div>
          </div>
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