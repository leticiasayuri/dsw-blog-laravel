<!-- Define a lista de posts da página de início -->

<h2 class="mb-3 mt-5">Publicações</h2>


@if(Auth::user())
    @if(Auth::user()->role == "admin")
        @foreach($posts as $post)
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('posts.show', ['id' => $post->id]) }}"><h3>{{ $post->titulo }}</h3></a>
                    <p class="post-font m-0">{{ $post->resumo }}</p>
                    <p class="text-muted m-0">{{ date('d/m/Y H:m', strtotime($post->created_at)) }}</p>

                    <br>

                    <table>
                        <tr>
                            <td><a href="{{ route('posts.edit', ['id' => $post->id]) }}" class="btn btn-primary">Editar <i class="material-icons">edit</i></a></td>
                            <td>
                                <form action="{{ route('posts.destroy', ['id' => $post->id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Excluir <i class="material-icons">delete</i></button>
                                </form>
                            </td>
                        </tr>
                    </table>
                </div>
            </div><br>
        @endforeach  
    @endif
    @else
        @foreach($posts as $post)
            <li class="mb-5">
                <a href="{{ route('posts.show', ['id' => $post->id]) }}"><h3>{{ $post->titulo }}</h3></a>
                <p class="post-font m-0">{{ $post->resumo }}</p>
                <p class="text-muted m-0">{{ date('d/m/Y H:m', strtotime($post->created_at)) }}</p>
            </li>
        @endforeach
@endif


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