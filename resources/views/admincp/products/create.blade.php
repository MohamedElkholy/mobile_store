@extends('admincp.index')
@section('content')
<div class="row-fluid">
  <div class="span12">
    <!-- BEGIN BORDERED TABLE widget-->
    <div class="widget">
      <div class="widget-body">
        {{Form::open(['route'=>'product.store','files' => true])}}
        <div class="control-group">
          {{Form::label('name',trans('admincp.name'))}}
          {{Form::text('name',old('name'),['class'=>'input-large','style'=>'height:30px'])}}
        </div>
        <div class="control-group">
          {{Form::label('description',trans('admincp.description'))}}
          {{Form::textarea('description',old('description'),['class'=>'input-large','rows'=>'3'])}}
        </div>
        <div class="control-group">
          {{Form::label('keywords',trans('admincp.keywords'))}}
          {{Form::textarea('keywords',old('keywords'),['class'=>'input-large','rows'=>'3'])}}
        </div>
        <div class="control-group">
          {{Form::label('brand_id',trans('admincp.brand'))}}
          {{Form::select('brand_id',brands(),old('brand_id'),['class'=>'input-large','style'=>'height:40px;','placeholder'=>'....'])}}
        </div>
        <div class="control-group">
          {{Form::label('category_id',trans('admincp.category'))}}
          {{Form::select('category_id',categories(),old('category_id'),['class'=>'input-large','style'=>'height:40px;','placeholder'=>'....'])}}
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
        <div class="control-group">
          <div class="input-prepend">
            {{Form::label('discount',trans('admincp.discount'))}}
            {{Form::number('discount',old('discount'),['class'=>'input-large','style'=>'height:30px;'])}}
            <span class='add-on' style="height: 30px;"> % </span>            
          </div>
        </div>
        <div class="control-group">
          {{Form::label('count',trans('admincp.count'))}}
          {{Form::number('count',old('count'),['class'=>'input-large','style'=>'height:30px;'])}}
        </div>
        <div class="control-group">
          {!!Form::label('image',trans('admincp.image'))!!}
          {!!Form::file('image')!!}
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