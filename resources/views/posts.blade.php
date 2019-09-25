<!-- Define a lista de posts da página de início -->

<h2 class="mb-3 mt-5">Publicações</h2>

<ul>
    @foreach([1, 2, 3, 4, 5, 6, 7, 8, 9, 10] as $i) <!-- Teste apenas -->
        <li class="mb-5">
            <a href="/post"><h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit</h3></a>
            <p class="post-font m-0">Nunc non diam et augue interdum porta. Ut ut sem varius ligula varius mollis sit amet non augue. Mauris sed eleifend odio, sit amet gravida dolor. Mauris aliquam, mi sed laoreet vehicula, metus neque vulputate ex, porttitor tristique dui nisl tristique neque.</p>
            <p class="text-muted m-0">24 setembro 2019</p>
        </li>
    @endforeach  
</ul>

<div class="text-center">
    <a class="btn btn-primary" href="#">Carregar mais ...</a>
</div>