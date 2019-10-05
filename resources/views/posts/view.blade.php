@extends('master')

@section('header')
    @include('menu')
@stop

@section('content')
<div class="jumbotron">
    <div class="container">
        <h1 class="display-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit</h1>
        <p class="post-font">Nunc non diam et augue interdum porta. Ut ut sem varius ligula varius mollis sit amet non augue. Mauris sed eleifend odio, sit amet gravida dolor. Mauris aliquam, mi sed laoreet vehicula, metus neque vulputate ex, porttitor tristique dui nisl tristique neque.</p>
    </div>
</div>

<div class="container col-md-8">
    <div class="mb-5">
    	<p class="text-muted mt-0 mb-4">24 setembro 2019 por Autor</p>
    
    	<div class="post-font">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In iaculis nisl ut purus suscipit, quis cursus purus mattis. Donec interdum dapibus porta. Morbi aliquam justo et dui aliquam, et lobortis tellus vehicula. Donec id nibh mauris. Sed elementum egestas ipsum a mattis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam vehicula, massa sit amet posuere luctus, nisi leo egestas ex, id tincidunt magna sem in sem. Phasellus scelerisque, nisl ut feugiat auctor, ipsum enim bibendum quam, vel eleifend sem magna sit amet erat. Nulla sed volutpat dui.</p>
            <img class="img-fluid mb-4" src="https://via.placeholder.com/1920x1080"/>
            <p>Praesent vestibulum pellentesque augue sit amet luctus. Proin vitae viverra leo, a fringilla urna. Suspendisse semper venenatis lacinia. Aliquam pharetra laoreet blandit. Nunc egestas dapibus risus, et lacinia purus lacinia id. Praesent non urna at urna auctor consequat eget id eros. Maecenas placerat, ex eget tincidunt sodales, lectus risus volutpat massa, quis tempor mi justo sit amet massa. Quisque tellus quam, vestibulum commodo urna tincidunt, semper vestibulum mi. Quisque tincidunt molestie rhoncus. Sed iaculis tellus malesuada malesuada convallis. In hac habitasse platea dictumst.</p>
            <p>Fusce scelerisque tincidunt purus vel vestibulum. Mauris varius enim vitae ligula facilisis condimentum. Aenean a faucibus sem. Cras bibendum, nibh id tincidunt malesuada, magna purus gravida neque, a volutpat nulla lacus ac ligula. Vestibulum ac dictum tortor, ac malesuada sapien. Quisque viverra iaculis lorem. Aliquam erat volutpat. Vivamus hendrerit dignissim dolor.</p>
            <p>Fusce sit amet pharetra nibh. Etiam eget ipsum orci. Fusce at ex ac sapien euismod efficitur et non mauris. Aenean convallis, enim sit amet molestie lobortis, purus orci eleifend sapien, in hendrerit nulla enim ac odio. Proin turpis ipsum, sagittis non rutrum ut, lacinia at lorem. Fusce vel quam odio. Praesent blandit ultrices placerat. Phasellus vitae arcu vitae odio condimentum elementum quis nec metus. Vivamus turpis risus, tincidunt et sem sit amet, luctus suscipit elit. Donec feugiat ante dui, nec scelerisque mauris pulvinar ut. Pellentesque quis vehicula odio, in tincidunt orci.</p>
            <p>Vivamus non maximus arcu, et sagittis felis. Ut tristique pharetra feugiat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vivamus id ante eu lacus dignissim eleifend. Duis vitae orci quam. Quisque maximus id arcu ut feugiat. Sed sed pretium sem.</p>
        </div>        
    </div>
    
    <hr class="col-md-2 offset-md-5"/>
    
    <div class="mt-5">
    	<h2 class="m-0">Comentários</h2>
    	<p class="text-muted mb-4">102 comentários</p>
    
    	<ul>
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
    	</ul>
    </div>
    
</div>
@stop
