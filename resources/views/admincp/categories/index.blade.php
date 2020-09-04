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
            @foreach($categories as $category)
            <tr>
              <td>@include('admincp.categories.btn.image')</td>
              <td>{{$category->name}}</td>
              <td>{{$category->description}}</td>
              <td>{{$category->keywords}}</td>
              <td>@include('admincp.categories.btn.delete')</td>
              <td><a href="{{aurl('category/'.$category->id.'/edit')}}" class="btn btn-info"><i class="icon-edit"></i></a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <br>
        <a href="{{aurl('category/create')}}">
        <button class="btn btn-warning"><i class="icon-plus icon-white"></i>
        @lang('admincp.add_new_category')
        </button>
        </a>
        <br>
      </div>
    </div>
    <!-- END BORDERED TABLE widget-->
  </div>
</div>
@endsection