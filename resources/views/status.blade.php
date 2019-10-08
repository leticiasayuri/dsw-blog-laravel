@if(isset($success) || session()->get('success'))
	<div class="alert alert-success mb-0">
		<p class="mb-0">{{ $success ?? session()->get('success') }}</p>
	</div>
@endif

@if ($errors->any() || isset($exception))
	<div class="alert alert-danger mb-0">
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