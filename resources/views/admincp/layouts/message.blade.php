@if(count($errors->all())>0)
	<div class="alert alert-danger">
		<button data-dismiss="alert" class="close">×</button>
		<ul>
			@foreach($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</ul>
	</div>
@endif

@if(session()->has('error'))
	<div class="alert alert-danger">
		<button data-dismiss="alert" class="close">×</button>
		<h4>{{session('error')}}</h4>
	</div>
@endif

@if(session()->has('added'))
	<div class="alert alert-success">
		<button data-dismiss="alert" class="close">×</button>
		<h4>{{session('added')}}</h4>
	</div>
@endif

@if(session()->has('settings_updated'))
	<div class="alert alert-success">
		<button data-dismiss="alert" class="close">×</button>
		<h4>{{session('settings_updated')}}</h4>
	</div>
@endif

@if(session()->has('updated'))
	<div class="alert alert-success">
		<button data-dismiss="alert" class="close">×</button>
		<h4>{{session('updated')}}</h4>
	</div>
@endif

@if(session()->has('deleted'))
	<div class="alert alert-success">
		<button data-dismiss="alert" class="close">×</button>
		<h4>{{session('deleted')}}</h4>
	</div>
@endif

@if(session()->has('alert'))
	<div class="alert alert-danger">
		<button data-dismiss="alert" class="close">×</button>
		<h4>{{session('alert')}}</h4>
	</div>
@endif
@if(session()->has('operation_added'))
	<div class="alert alert-success">
		<button data-dismiss="alert" class="close">×</button>
		<h4>{{session('operation_added')}}</h4>
	</div>
@endif


@if(session()->has('client_address_updated'))
	<div class="alert alert-success">
		<button data-dismiss="alert" class="close">×</button>
		<h4>{{session('client_address_updated')}}</h4>
	</div>
@endif

@if(session()->has('client_addedd'))
	<div class="alert alert-success">
		<button data-dismiss="alert" class="close">×</button>
		<h4>{{session('client_addedd')}}</h4>
	</div>
@endif
@if(session()->has('invoice_added'))
	<div class="alert alert-success">
		<button data-dismiss="alert" class="close">×</button>
		<h4>{{session('invoice_added')}}</h4>
	</div>
@endif

