@if(count($errors->all())>0)
	<div class="alert alert-danger">
		<ul>
			@foreach($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</ul>
	</div>
@endif

@if(session()->has('added'))
	<div class="alert alert-success">
		<h4>{{session('added')}}</h4>
	</div>
@endif

@if(session()->has('error'))
	<div class="alert alert-danger">
		<h4>{{session('error')}}</h4>
	</div>
@endif

@if(session()->has('edited'))
	<div class="alert alert-success">
		<h4>{{session('edited')}}</h4>
	</div>
@endif

@if(session()->has('deleted'))
	<div class="alert alert-success">
		<h4>{{session('deleted')}}</h4>
	</div>
@endif
@if(session()->has('settings_updated'))
	<div class="alert alert-success">
		<h4>{{session('settings_updated')}}</h4>
	</div>
@endif
