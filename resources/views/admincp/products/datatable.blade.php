@extends('admincp.index')
@section('content')
<div class="row-fluid">
  <div class="span12">
    <!-- BEGIN BORDERED TABLE widget-->
    <div class="widget">

      <div class="widget-body">
    {{$dataTable->table([
      'class'=>'dataTable table table-hover table-striped'
    ],true)}}

      </div>
    </div>
    <!-- END BORDERED TABLE widget-->
  </div>
</div>

@push('js')
{{$dataTable->scripts()}}
@endpush
@endsection