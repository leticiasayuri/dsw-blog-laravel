@extends('master')

@section('header')
    @include('menu')
@stop

@section('content')
<div class="container col-md-8">
	<div class="col-sm-8 offset-sm-2">	
		<form method="post" action="{{route('usuarios.store')}}">
			@csrf
			<div class="form-group">
				<label for="nome">Nome</label>
				<input type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu nome">
			</div>
			<div class="form-group">
				<label for="email">E-mail</label>
				<input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Digite seu e-mail">
				<small id="emailHelp" class="form-text text-muted">Não vamos compartilhar seu e-mail.</small>
			</div>
			<div class="form-group">
				<label for="senha">Senha</label>
				<input type="password" class="form-control" id="senha" aria-describedby="senhaHelp" name="senha" placeholder="Password">
			</div>
			<small id="senhaHelp" class="form-text text-muted">A senha deve ter, no mínimo, 6 caracteres e conter, no mínimo, 1 letra maiúscula, 1 letra minúscula, 1 dígito numérico e 1 caracter especial.</small><br>
			
			<button type="submit" class="btn btn-primary">Cadastrar</button>
		</form>
	</div>
</div>
@stop