@extends('master')

@section('header')
    @include('menu')
@stop

@section('content')
<div class="container col-md-8">
	<div class="col-sm-8 offset-sm-2">	
		<form method="post" action="{{route('usuarios.auth')}}">
			@csrf
			<div class="form-group">
				<label for="email">E-mail</label>
				<input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Digite seu e-mail">
			</div>
			<div class="form-group">
				<label for="senha">Senha</label>
				<input type="password" class="form-control" id="senha" name="senha" placeholder="Password">
			</div>
			<button type="submit" class="btn btn-primary">Acessar</button>
		</form>
	</div>
</div>
@stop