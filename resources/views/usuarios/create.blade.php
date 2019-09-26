@extends('master')

@section('header')
    @include('menu')
@stop

@section('content')
<div class="container col-md-8">
	<div class="col-sm-8 offset-sm-2">
		@if ($errors->any())
      		<div class="alert alert-danger">
        		<ul>
            		@foreach ($errors->all() as $error)
              			<li>{{ $error }}</li>
            		@endforeach
        		</ul>
      		</div><br />
    	@endif		
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
				<input type="password" class="form-control" id="senha" name="senha" placeholder="Password">
			</div>
			<button type="submit" class="btn btn-primary">Cadastrar</button>
		</form>
	</div>
</div>
@stop