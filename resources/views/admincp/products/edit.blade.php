@extends('admincp.index')
@section('content')
<div class="row-fluid">
  <div class="span12">
    <!-- BEGIN BORDERED TABLE widget-->
    <div class="widget">
      <div class="widget-body">
        {{Form::open(['route'=>['product.update',$product->id],'method'=>'put','files' => true])}}
        <div class="control-group">
          {{Form::label('name',trans('admincp.name'))}}
          {{Form::text('name',$product->name,['class'=>'input-large','style'=>'height:30px'])}}
        </div>
        <div class="control-group">
          {{Form::label('description',trans('admincp.description'))}}
          {{Form::textarea('description',$product->description,['class'=>'input-large','rows'=>'3'])}}
        </div>
        <div class="control-group">
          {{Form::label('keywords',trans('admincp.keywords'))}}
          {{Form::textarea('keywords',$product->keywords,['class'=>'input-large','rows'=>'3'])}}
        </div>
        <div class="control-group">
          {{Form::label('brand_id',trans('admincp.brand'))}}
          {{Form::select('brand_id',brands(),$product->brand_id,['class'=>'input-large','style'=>'height:40px;','placeholder'=>'....'])}}
        </div>
        <div class="control-group">
          {{Form::label('category_id',trans('admincp.category'))}}
          {{Form::select('category_id',categories(),$product->category_id,['class'=>'input-large','style'=>'height:40px;','placeholder'=>'....'])}}
        </div>
        <div class="control-group">
          <div class="input-prepend">
            {{Form::label('original_price',trans('admincp.original_price'))}}
            {{Form::number('original_price',$product->original_price,['class'=>'input-large','style'=>'height:30px;'])}}
            <span class='add-on' style="height: 30px;">@lang('admincp.currency')</span>
          </div>
        </div>
        <div class="control-group">
          <div class="input-prepend">
            {{Form::label('sale_price',trans('admincp.sale_price'))}}
            {{Form::number('sale_price',$product->sale_price,['class'=>'input-large','style'=>'height:30px;'])}}
            <span class='add-on' style="height: 30px;">@lang('admincp.currency')</span>
          </div>
        </div>
        <div class="control-group">
          <div class="input-prepend">
            {{Form::label('discount',trans('admincp.discount'))}}
            {{Form::number('discount',$product->discount,['class'=>'input-large','style'=>'height:30px;'])}}
            <span class='add-on' style="height: 30px;">%</span>
          </div>
        </div>
        <div class="control-group">
          {{Form::label('count',trans('admincp.count'))}}
          {{Form::number('count',$product->count,['class'=>'input-large','style'=>'height:30px;'])}}
        </div>
        <div class="control-group">
          {!!Form::label('image',trans('admincp.image'))!!}
          {!!Form::file('image')!!}
          @if(!empty($product->image))
          <img src="{{asset(Storage::url($product->image))}}"/ width="50" height="50">
          @endif          
        </div>
        {!!Form::reset(trans('admincp.reset'),['class'=>'btn btn-warning'])!!}
        {!!Form::submit(trans('admincp.save'),['class'=>'btn btn-primary'])!!}
        {{Form::close()}}
        {!!Form::open(['route'=>['product.destroy',$product->id],'method'=>'delete'])!!}
        {!!Form::submit(trans('admincp.delete'),['class'=>'btn btn-danger'])!!}
        {!!Form::close()!!}
      </div>
    </div>
    <!-- END BORDERED TABLE widget-->
  </div>
</div>
@endsection