<!-- Define a lista de posts da página de início -->

<h2 class="mb-3 mt-5">Publicações</h2>

<ul>
    @foreach($posts as $post) <!-- Teste apenas -->
        <li class="mb-5">
            <a href="{{ route('posts.show', ['id' => $post->id]) }}"><h3>{{ $post->titulo }}</h3></a>
            <p class="post-font m-0">{{ $post->resumo }}</p>
            <p class="text-muted m-0">{{ $post->created_at }}</p>
        </li>
    @endforeach  
</ul>

@if($posts->total() > 10)
    <div class="text-center">
    	@if($posts->currentPage() > 1)
        	<a class="btn btn-light" href="?page={{ $posts->currentPage() - 1 }}">Mais recentes</a>
    	@endif
    
    	@if($posts->hasMorePages())
        	<a class="btn btn-primary" href="{{ $posts->nextPageUrl() }}">Mais antigas</a>
        @endif
    </div>
@endif