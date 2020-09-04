@extends('admincp.index')
@section('content')
<div class="row-fluid">
  <div class="span12">
    <!-- BEGIN BORDERED TABLE widget-->
    <div class="widget">
      <div class="widget-body">
        {{Form::open(['route'=>['brand.update',$brand->id],'method'=>'put','files' => true])}}
          <div class="control-group">
            {{Form::label('name',trans('admincp.name'))}}
            {{Form::text('name',$brand->name,['class'=>'input-large','style'=>'height:30px;'])}}
          </div>
          <div class="control-group">
            {{Form::label('description',trans('admincp.description'))}}
            {{Form::text('description',$brand->description,['class'=>'input-large','style'=>'height:30px;'])}}
          </div>
          <div class="control-group">
            {{Form::label('keywords',trans('admincp.keywords'))}}
            {{Form::text('keywords',$brand->keywords,['class'=>'input-large','style'=>'height:30px;'])}}
          </div>
          <div class="control-group">
          {!!Form::label('image',trans('admincp.image'))!!}
          {!!Form::file('image')!!}
          @if(!empty($brand->image))
          <img src="{{asset(Storage::url($brand->image))}}"/ width="50" height="50">
          @endif
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