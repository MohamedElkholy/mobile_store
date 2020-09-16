@extends('admincp.index')
@section('content')
<div class="row-fluid">
  <div class="span12">
    <!-- BEGIN BORDERED TABLE widget-->
    <div class="widget">
    <div class="widget-body">
      <div class="alert alert-success" role="alert">
        the value of all products in the stock = {{ $value}}
      </div>
      <div class="alert alert-info" role="alert">
        products type in stock = {{$count}}
      </div>      
      <div class="alert alert-danger" role="alert">
      all product's items =  {{$count_all}}
      </div>
    </div>
    </div>
    <!-- END BORDERED TABLE widget-->
  </div>
</div>

@endsection