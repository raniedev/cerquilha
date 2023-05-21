@auth
    @include('template-top')
                <!-- PARTE CENTRO -->
                <div class="centro">
                    <div class="pagina">
                        <h2>O que deseja procurar?</h2>
                        <div class="pagina-cabecalho">
                            <h3 class="pagina-subtitulo">
                                <i class="uil uil-search"></i>Procurar Postagem
                            </h3>
                        </div>
                        <div class="pagina-conteudo">
                            <!-- Barra de pesquisa para procurar em postagens -->
							<form id="form-procurar-postagem" class="procurar-algo" action="{{ route('search.posts') }}" method="GET">								
									<input type="search" name="query" maxlength="256">
							</form>
                            <div class="centralizar">
                                <input form="form-procurar-postagem" type="submit" class="btn btn-border" value="Procurar Postagem"></input>
                            </div>
                        </div>

                        <div class="pagina-cabecalho">
                            <h3 class="pagina-subtitulo">
                                <i class="uil uil-search"></i>Procurar Usuário
                            </h3>
                        </div>
                        <div class="pagina-conteudo">
                            <!-- Barra de pesquisa para procurar usuários -->
							<form id="form-procurar-usuario" class="procurar-algo" action="{{ route('search.users') }}" method="GET">								
									<input type="search" name="query" maxlength="32">
							</form>
                            <div class="centralizar">
                                <input form="form-procurar-usuario" type="submit" class="btn btn-border" value="Procurar Usuário"></input>
                            </div>
                        </div>

                        <div class="pagina-cabecalho">
                            <h3 class="pagina-subtitulo">
                                <i class="uil uil-search"></i>Procurar Video
                            </h3>
                        </div>
                        <div class="pagina-conteudo">
                            <!-- Barra de pesquisa para procurar usuários -->
							<form id="form-procurar-video" class="procurar-algo" action="{{ route('search.videos') }}" method="GET">								
									<input type="search" name="query" maxlength="32">
							</form>
                            <div class="centralizar">
                                <input form="form-procurar-video" type="submit" class="btn btn-border" value="Procurar Vídeo"></input>
                            </div>
                        </div>
                    </div>
                </div>
    @include('template-bot')
@endauth

@include('partials.guest')