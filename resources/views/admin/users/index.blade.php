@extends('admin.index')
@section('content')
<div class="box">
	<div class="box-header">
		<h3 class="box-title">{{$title}}</h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		{!!Form::open(['id'=>'form_data','url'=>aurl('users/destroy/all'),'method'=>'delete'])!!}
		{{$dataTable->table([
			'class'=>'dataTable table table-bordered table-hover table-striped'
		],true)}}
		{!!Form::close()!!}
	</div>
	<!-- /.box-body -->
</div>
<!-- /.box -->

<!-- Trigger the modal with a button -->

<!-- bootstrap modal // copied from w3schools -->
<!-- Modal -->
<div id="multiple_delete" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">@lang('admin.delete')</h4>
      </div>
      <div class="modal-body ">
      	<div class="empty_record hidden">
        	<div class="alert alert-warning">@lang('admin.pls_check_some_records')</div>
      	</div>
      	<div class="not_empty_record hidden">
        	<div class="alert alert-danger">@lang('admin.ask_delete') <span class="record_count">5</span> @lang('admin.record') @lang('admin.qm')</div>
      	</div>
  	</div>
      <div class="modal-footer">
      	<div class="empty_record hidden">
        	<button type="button" class="btn btn-default" data-dismiss="modal">@lang('admin.close')</button>
		</div>	
      	<div class="not_empty_record hidden">
        	<input type="submit" class="btn btn-danger del_all" value="{{trans('admin.delete_all')}}">
        	<button type="button" class="btn btn-default" data-dismiss="modal">@lang('admin.cancel')</button>
      	</div>
      </div>
    </div>

  </div>
</div>

<!-- end bootstrap modal // copied from w3schools -->

@push('js')
<script>
delete_all();
</script>
{{$dataTable->scripts()}}
@endpush
@endsection