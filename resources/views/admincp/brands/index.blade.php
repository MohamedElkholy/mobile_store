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
              <th>@lang('admincp.image')</th>
              <th>@lang('admincp.name')</th>
              <th>@lang('admincp.description')</th>
              <th>@lang('admincp.keywords')</th>
              <th>@lang('admincp.edit')</th>
              <th>@lang('admincp.delete')</th>
            </tr>
          </thead>
          <tbody>
            @foreach($brands as $brand)
            <tr>
              <td>@include('admincp.brands.btn.image')</td>
              <td>{{$brand->name}}</td>
              <td>{{$brand->description}}</td>
              <td>{{$brand->keywords}}</td>
              <td><a href="{{aurl('brand/'.$brand->id.'/edit')}}" class="btn btn-info"><i class="icon-edit"></i></a></td>
              <td>@include('admincp.brands.btn.delete')</td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <br>
        <a href="{{aurl('brand/create')}}">
        <button class="btn btn-warning"><i class="icon-plus icon-white"></i>
        @lang('admincp.add_new_brand')
        </button>
        </a>
        <br>
      </div>
    </div>
    <!-- END BORDERED TABLE widget-->
  </div>
</div>
@endsection