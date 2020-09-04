@extends('admin.index')
@section('content')
<div class="box box-danger">
  <div class="box-header with-border">
    <h3 class="box-title">{{$title}}</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    {!!Form::open(['url'=>aurl('settings'),'files' => true])!!}
    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          {!!Form::label('site_ar_name',trans('admin.site_ar_name'))!!}
          {!!Form::text('site_ar_name',settings()->site_ar_name,['class'=>'form-control'])!!}
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          {!!Form::label('site_en_name',trans('admin.site_en_name'))!!}
          {!!Form::text('site_en_name',settings()->site_en_name,['class'=>'form-control'])!!}
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          {!!Form::label('email',trans('admin.email'))!!}
          {!!Form::email('email',settings()->email,['class'=>'form-control'])!!}
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          {!!Form::label('main_lang',trans('admin.main_lang'))!!}
          {!!Form::select('main_lang',['ar'=>trans('admin.arabic'),'en'=>trans('admin.english')],settings()->main_lang,['class'=>'form-control'])!!}
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          {!!Form::label('description',trans('admin.site_description'))!!}
          {!!Form::textArea('description',settings()->description,['class'=>'form-control','rows'=>'3'])!!}
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          {!!Form::label('keywords',trans('admin.keywords'))!!}
          {!!Form::textArea('keywords',settings()->keywords,['class'=>'form-control','rows'=>'3'])!!}
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          {!!Form::label('logo',trans('admin.logo'))!!}
          {!!Form::file('logo')!!}
          @if(!empty(settings()->logo))
          <img src="{{Storage::url(settings()->logo)}}"/ width="50" height="50">
          @endif
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          {!!Form::label('icon',trans('admin.icon'))!!}
          {!!Form::file('icon')!!}
          @if(!empty(settings()->icon))
          <img src="{{Storage::url(settings()->icon)}}"/ width="50" height="50">
          @endif
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          {!!Form::label('status',trans('admin.site_status'))!!}
          {!!Form::select('status',['open'=>trans('admin.opened'),'close'=>trans('admin.closed')],settings()->status,['class'=>'form-control'])!!}
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          {!!Form::label('close_message',trans('admin.close_message'))!!}
          {!!Form::textArea('close_message',settings()->close_message,['class'=>'form-control','rows'=>'3'])!!}
        </div>
      </div>
    </div>
    {!!Form::reset(trans('admin.reset'),['class'=>'btn btn-danger'])!!}
    {!!Form::submit(trans('admin.save'),['class'=>'btn btn-primary'])!!}
    {!!Form::close()!!}
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
@endsection