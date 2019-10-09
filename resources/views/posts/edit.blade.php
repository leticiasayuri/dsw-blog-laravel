@extends('master')

@section('header')
    @include('menu')
@stop

@section('content')
<style>
    #js-texto {
        height: 1px;
        padding: 0px;
        margin: 0px;
        border: none;
        outline: none;
        margin-top: -1px;
    }
</style>

<div class="container col-lg-8 col-md-10">
	<h2 class="mb-3 mt-5">Nova postagem</h2>

	<form action="{{route('posts.update', ['id' => $post->id])}}" method="post" id="js-post-form">
		@csrf
	
        <div class="form-group">
            <label for="js-title">Título da postagem</label>
            <input type="text" class="form-control" id="js-title" name="titulo" maxlength="100" value="{{ $post->titulo }}" required/>
            <p class="text-muted">Máximo 100 caracteres</p>
        </div>
        
        <div class="form-group">
            <label for="js-resumo">Resumo da postagem</label>
            <textarea class="form-control" id="js-resumo" rows="3" maxlength="300" name="resumo" required>{{ $post->resumo }}</textarea>
            <p class="text-muted">Máximo 300 caracteres</p>
        </div>
        
        <div id="js-quill-container">
            <!-- Post -->
        </div>
        <input class="mb-4 d-block" height="0px" type="text" name="conteudo" id="js-texto">
        
        <div class="alert alert-danger" id="js-erro-nocontent" style="display: none;"> 
    		<p class="m-0">Sua postagem deve conter um texto.</p>
    	</div>
        
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>

<script>
var POST_CONTENT = <?php echo $post->conteudo ?>;
</script>

<script src="{{ asset('js/posts_edit.js') }}"></script>
@stop