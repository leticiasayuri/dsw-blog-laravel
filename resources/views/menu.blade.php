<nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">
    <a class="navbar-brand" href="/">Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse"
        data-target="#navbarCollapse" aria-controls="navbarCollapse"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
        	@auth
        		@if(Auth::user()->role == "admin")
                    <li class="nav-item"><a class="nav-link" href="/postar">Nova postagem</a></li>
        		@endif
        		
        		<li class="nav-item"><a class="nav-link" href="{{ route('usuarios.edit', ['id' => Auth::user()->id]) }}">Editar Perfil</a></li>
        		<li class="nav-item"><a class="nav-link" href="/logout">Sair</a></li>
        	@endauth
        	
        	@guest
            	<li class="nav-item"><a class="nav-link" href="/login">Acessar</a></li>
            	<li class="nav-item"><a class="nav-link" href="/cadastro">Cadastrar-se</a></li>
            @endguest
        </ul>
    </div>
</nav>