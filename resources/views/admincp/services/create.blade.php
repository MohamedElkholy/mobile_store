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
@endsection