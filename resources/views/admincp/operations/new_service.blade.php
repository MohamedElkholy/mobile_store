@extends('admincp.index')
@section('content')
<div class="row-fluid">
  <div class="span12">
    <!-- BEGIN BORDERED TABLE widget-->
    <div class="widget">
      <div class="widget-body">
        {{Form::open(['route'=>'service.store'])}}
        <div class="control-group">
          {{Form::label('service_type',trans('admincp.service_type'))}}
          {{Form::text('service_type',old('service_type'),['class'=>'input-large','style'=>'height:30px'])}}
        </div>
        <div class="control-group">
          {{Form::label('description',trans('admincp.description'))}}
          {{Form::textarea('description',old('description'),['class'=>'input-large','rows'=>'3'])}}
        </div>
        <div class="control-group">
          <div class="input-prepend">
            {{Form::label('original_price',trans('admincp.original_price'))}}
            {{Form::number('original_price',old('original_price'),['class'=>'input-large','style'=>'height:30px;'])}}
            <span class='add-on' style="height: 30px;">@lang('admincp.currency')</span>
          </div>
        </div>
        <div class="control-group">
          <div class="input-prepend">
            {{Form::label('sale_price',trans('admincp.sale_price'))}}
            {{Form::number('sale_price',old('sale_price'),['class'=>'input-large','style'=>'height:30px;'])}}
            <span class='add-on' style="height: 30px;">@lang('admincp.currency')</span>
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

<div class="row-fluid">
  <div class="span12">
    <!-- BEGIN BORDERED TABLE widget-->
    <div class="widget">
      <div class="widget-title">
       <h4>@lang('admincp.client_info') (@lang('admincp.optional'))</h4>
      </div>
      <div class="widget-body">
        <div class="row-fluid">
          <div class="form-control span4">
            {!!Form::label('client_name',trans('admincp.client_name'))!!}
            {{Form::text('client_name','',['class'=>'input-large','style'=>'height:30px;','id'=>'client_name'])}}
          </div>
          <div class="form-control span3">
            {!!Form::label('client_phone',trans('admincp.client_phone_number'))!!}
            {{Form::text('client_phone','',['class'=>'input-large','style'=>'height:30px;','id'=>'client_phone'])}}
          </div>          
          <div class="form-control span3">
            {!!Form::label('client_address',trans('admincp.address'))!!}
            {{Form::text('client_address','',['class'=>'input-large','style'=>'height:30px;','id'=>'client_address'])}}
          </div>
        </div>
      </div>
      <!-- END BORDERED TABLE widget-->
    </div>
  </div>
</div>

<div class="row-fluid">
  <div class="span12">
    <!-- BEGIN BORDERED TABLE widget-->
    <div class="widget">
      <div class="widget-body">
        <div class="row-fluid">
            <button type="button" class="btn btn-danger btn-large" style="margin-left: 15px" onclick="delete_all_selected()">  
              <i class="icon-trash"> </i>@lang('admincp.reset')
            </button>
            {!!Form::submit(trans('admincp.generate_invoice'),['class'=>'btn btn-primary btn-large'])!!}
        </div>
      </div>
      <!-- END BORDERED TABLE widget-->
    </div>
  </div>
</div>
@endsection