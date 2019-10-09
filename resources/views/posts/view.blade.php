@extends('master')

@section('header')
    @include('menu')
@stop

@section('content')
<div class="jumbotron">
    <div class="container">
        <h1 class="display-4">{{ $post->titulo }}</h1>
        <p class="post-font">{{ $post->resumo }}</p>
    </div>
</div>

<div class="container col-md-8">
    <div class="mb-5 quill-post">
    	<p class="text-muted mt-0 mb-4">{{ $post->created_at }} por {{ $post->autor()->nome }}</p>

    	<div id="js-quill-container" class="post-font quill-post-content">
            <!-- Conteúdo da postagem -->
		</div>        
    </div>
    
    <hr id="comentarios" class="col-md-2 offset-md-5"/>
    
    <div class="mt-5">
    	<h2 class="m-0">Comentários</h2>
    	<p class="text-muted mb-4">{{ $post->qtdComentarios() }} comentários</p>
	
		@auth
			<form class="mb-5" data-target="#js-comentarios" method="post" action="{{route('comentarios.store')}}">
				@csrf

				<input type="hidden" name="id_post" value="{{ $post->id }}"/>

				<div class="form-group">
					<label for="js-resumo">Escreva um comentário:</label>
					<textarea class="form-control" id="js-comentario" rows="2" maxlength="128" name="conteudo" required></textarea>
					<p class="text-muted">Máximo 128 caracteres</p>
				</div>
				
				<input class="btn btn-primary" type="submit" value="Comentar"/>
			</form>
		@endauth

    	<ul id="js-comentarios">
    		@foreach($post->comentarios() as $comentario)
				@if (!$comentario->id_responde)
					<li class="mb-5 post-comment" id="cometario-{{ $comentario->id }}">
						<p class="m-0"><span class="text-muted">{{ $comentario->created_at }}</span> {{ $comentario->autor()->nome }} diz:</p>
						<p class="mt-0 mb-2">{{ $comentario->conteudo }}</p>
						
						<a data-toggle="collapse" href="#reponder-comentario-{{ $comentario->id }}" role="button" aria-expanded="false" aria-controls="reponder-comentario-{{ $comentario->id }}">
							Responder
						</a>

						@if ($comentario->autor()->id == Auth::user()->id)
							<a class="ml-3 text-danger" onclick="confirmarDeletarComantario(event)" href="{{ route('comentarios.destroy', ['id' => $comentario->id]) }}" role="button">Excluir comentário</a>
						@endif

						<div class="collapse" id="reponder-comentario-{{ $comentario->id }}">
							<form method="post" action="{{route('comentarios.store')}}">
								@csrf
								
								<input type="hidden" name="id_responde" value="{{ $comentario->id }}"/>
								<input type="hidden" name="id_post" value="{{ $post->id }}"/>
								
								<textarea class="form-control mb-2" rows="2" name="conteudo" maxlength="128" required></textarea>
								<input class="btn btn-primary btn-sm" type="submit" value="Enviar resposta"/>
							</form>
						</div>

						<ul>
							@foreach($comentario->respostas()->getResults() as $resposta)
								<li class="mt-3 post-comment">
									<p class="m-0"><span class="text-muted">{{ $resposta->created_at }}</span> {{ $resposta->autor()->nome }} diz:</p>
									<p class="mt-0 mb-2">{{ $resposta->conteudo }}</p>
								</li>
							@endforeach
						</ul>
					</li>
				@endif
    		@endforeach
    	
    		<!-- 
				<li class="mb-5 post-comment">
					<p class="m-0"><span class="text-muted">24 setembro 2019</span> Leitor diz:</p>
					<p class="m-0">Nunc non diam et augue interdum porta. Mauris aliquam, mi sed laoreet vehicula, metus neque vulputate ex, porttitor tristique dui nisl tristique neque.</p>
					
					<a data-toggle="collapse" href="#reponder-post-1" role="button" aria-expanded="false" aria-controls="reponder-post-1">
						Responder
					</a>
					
					<div class="collapse" id="reponder-post-1">
						<form action="/comentario/responde">
							<input type="hidden" name="commentario" value="id"/>
							<textarea class="form-control mb-2" rows="2" name="resposta" maxlength="128" required></textarea>
							<input class="btn btn-primary btn-sm" type="submit" value="Enviar resposta"/>
						</form>
					</div>
					
					<hr/>
					<ul>
						<li class="mt-3 post-comment">
							<p class="m-0"><span class="text-muted">24 setembro 2019</span> Leitor diz:</p>
							<p class="m-0">Nunc non diam et augue interdum porta. Mauris aliquam, mi sed laoreet vehicula, metus neque vulputate ex, porttitor tristique dui nisl tristique neque.</p>
						
							<a data-toggle="collapse" href="#reponder-post-2" role="button" aria-expanded="false" aria-controls="reponder-post-2">
								Responder
							</a>
							
							<div class="collapse" id="reponder-post-2">
								<form action="/comentario/responde">
									<input type="hidden" name="commentario" value="id"/>
									<textarea class="form-control mb-2" rows="2" name="resposta" maxlength="128" required></textarea>
									<input class="btn btn-primary btn-sm" type="submit" value="Enviar resposta"/>
								</form>
							</div>
						</li>
					</ul>
				</li>
				
				<li class="mb-5 post-comment">
					<p class="m-0"><span class="text-muted">24 setembro 2019</span> Leitor diz:</p>
					<p class="m-0">Nunc non diam et augue interdum porta. Mauris aliquam, mi sed laoreet vehicula, metus neque vulputate ex, porttitor tristique dui nisl tristique neque.</p>
					
					<a data-toggle="collapse" href="#reponder-post-3" role="button" aria-expanded="false" aria-controls="reponder-post-3">
						Responder
					</a>
					
					<div class="collapse" id="reponder-post-3">
						<form action="/comentario/responde">
							<input type="hidden" name="commentario" value="id"/>
							<textarea class="form-control mb-2" rows="2" name="resposta" maxlength="128" required></textarea>
							<input class="btn btn-primary btn-sm" type="submit" value="Enviar resposta"/>
						</form>
					</div>
					
					<hr/>
					<ul>
						<li class="mt-3 post-comment">
							<p class="m-0"><span class="text-muted">24 setembro 2019</span> Leitor diz:</p>
							<p class="m-0">Nunc non diam et augue interdum porta. Mauris aliquam, mi sed laoreet vehicula, metus neque vulputate ex, porttitor tristique dui nisl tristique neque.</p>
							
							<a data-toggle="collapse" href="#reponder-post-4" role="button" aria-expanded="false" aria-controls="reponder-post-4">
								Responder
							</a>
							
							<div class="collapse" id="reponder-post-4">
								<form action="/comentario/responde">
									<input type="hidden" name="commentario" value="id"/>
									<textarea class="form-control mb-2" rows="2" name="resposta" maxlength="128" required></textarea>
									<input class="btn btn-primary btn-sm" type="submit" value="Enviar resposta"/>
								</form>
							</div>
							
							<hr/>
							<ul>
								<li class="mt-3 post-comment">
									<p class="m-0"><span class="text-muted">24 setembro 2019</span> Leitor diz:</p>
									<p class="m-0">Nunc non diam et augue interdum porta. Mauris aliquam, mi sed laoreet vehicula, metus neque vulputate ex, porttitor tristique dui nisl tristique neque.</p>
								
									<a data-toggle="collapse" href="#reponder-post-5" role="button" aria-expanded="false" aria-controls="reponder-post-5">
										Responder
									</a>
									
									<div class="collapse" id="reponder-post-5">
										<form action="/comentario/responde">
											<input type="hidden" name="commentario" value="id"/>
											<textarea class="form-control mb-2" rows="2" name="resposta" maxlength="128" required></textarea>
											<input class="btn btn-primary btn-sm" type="submit" value="Enviar resposta"/>
										</form>
									</div>
								</li>
							</ul>
						</li>
					</ul>
				</li>
				
				<li class="mb-5 post-comment">
					<p class="m-0"><span class="text-muted">24 setembro 2019</span> Leitor diz:</p>
					<p class="mt-0 mb-2">Nunc non diam et augue interdum porta. Mauris aliquam, mi sed laoreet vehicula, metus neque vulputate ex, porttitor tristique dui nisl tristique neque.</p>
					
					<a data-toggle="collapse" href="#reponder-post-6" role="button" aria-expanded="false" aria-controls="reponder-post-6">
						Responder
					</a>
					
					<div class="collapse" id="reponder-post-6">
						<form action="/comentario/responde">
							<input type="hidden" name="commentario" value="id"/>
							<textarea class="form-control mb-2" rows="2" name="resposta" maxlength="128" required></textarea>
							<input class="btn btn-primary btn-sm" type="submit" value="Enviar resposta"/>
						</form>
					</div>
				</li>
             -->
    	</ul>
    </div>
    
</div>

<script>
var POST_CONTENT = <?php echo $post->conteudo ?>;
</script>

<script src="{{ asset('js/posts_view.js') }}"></script>
@stop

<script>
	function confirmarDeletarComantario(event) {
		if(!confirm('Deseja mesmo excluir o comentário?')) {
			event.preventDefault();
		}
	}
</script>