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
              <th></th>
              <th>@lang('admincp.name')</th>
              <th>@lang('admincp.category')</th>
              <th>@lang('admincp.brand')</th>
              <th>@lang('admincp.count')</th>
              <th>@lang('admincp.sale_price')</th>
              <th>@lang('admincp.edit')</th>
            </tr>
          </thead>
          <tbody>
            @foreach($products as $product)
            <tr>
              <td><img src="{{asset(Storage::url($product->image))}}" class="image50" alt="{{$product->name}}"></td>
              <td><a href="{{aurl('product/'.$product->id)}}">{{$product->name}}</a></td>
              <td>{{$product->category['name']}}</td>
              <td>{{$product->brand['name']}}</td>
              <td>{{$product->count}}</td>
              <td>{{$product->sale_price}} <span> {{trans('admincp.currency')}}</span> </td>
              <td><a href="{{aurl('product/'.$product->id.'/edit')}}" class="btn btn-small btn-info"><i class="icon-edit"></i></a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <br>
        <div class="row-fluid">
          <div class="span6">
            <a href="{{aurl('product/create')}}">
              <button class="btn btn-warning"><i class="icon-plus icon-white"></i>
              @lang('admincp.add_new_product')
              </button>
            </a>
          </div>
          <div class="span6">
            <div class="dataTables_paginate paging_bootstrap pagination">
              {{$products->links()}}
            </div>
          </div>
        </div>

      </div>
    </div>
    <!-- END BORDERED TABLE widget-->
  </div>
</div>
@endsection