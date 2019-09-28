@if(isset($success))
	<div class="alert alert-success">
		<p>{{ $success }}</p>
	</div>
@endif

@if ($errors->any() || isset($exception))
	<div class="alert alert-danger">
		<ul>
			@if(isset($exception))
				<li>{{ $exception }}</li>
			@endif
			
    		@foreach ($errors->all() as $error)
      			<li>{{ $error }}</li>
    		@endforeach
		</ul>
	</div>
@endif	