<nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">
    <a class="navbar-brand" href="/">Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse"
        data-target="#navbarCollapse" aria-controls="navbarCollapse"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
        	@if(Auth::user())
        		@if(Auth::user()->role == "admin")
                    <li class="nav-item"><a class="nav-link" href="/postar">Nova postagem</a></li>
                    <li class="nav-item"><a class="nav-link" href="/update">Editar Perfil</a></li>
        		@endif
        		
        		<li class="nav-item"><a class="nav-link" href="/logout">Sair</a></li>
        	@else
            	<li class="nav-item"><a class="nav-link" href="/login">Acessar</a></li>
            	<li class="nav-item"><a class="nav-link" href="/cadastro">Cadastrar-se</a></li>
            @endif
        </ul>
    </div>
</nav>