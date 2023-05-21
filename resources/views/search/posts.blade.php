@auth
    @include('template-top')
                <!-- PARTE CENTRO -->
                <div class="centro">
                    <div class="pagina">
                        <h2>Procurar Postagem</h2>
                        <div class="pagina-cabecalho">
                            <h3 class="pagina-subtitulo">
                                <i class="uil uil-search"></i>Resultados ({{$posts->count()}})
                            </h3>
                        </div>
                        <div class="pagina-conteudo">
                            <div id="postagens">
                                @include('search.posts-resultado')
                            </div>
                        </div>
                    </div>
                </div>
    @include('template-bot')
@endauth

@include('partials.guest')