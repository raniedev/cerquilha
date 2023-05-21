@auth
    @include('template-top')
                @php
                    $count = 0;
                @endphp
                <!-- PARTE CENTRO -->
                <div class="centro">
                    <div class="pagina">
                        <h2>Procurar Usuário</h2>
                        <div class="pagina-cabecalho">
                            <h3 class="pagina-subtitulo">
                                <i class="uil uil-search"></i>Resultados 
                                @foreach ($users as $user) 
                                    @if ($user->username !== auth()->user()->username)
                                        @php $count++; @endphp
                                    @endif
                                @endforeach 
                                ({{$count}})
                            </h3>

                            <!-- Barra de pesquisa para filtrar usuários -->
                            <div style="display: flex;" class="procurar-usuario p-us filtrar-usuario">
                            <button class="btn btn-pesquisa" type="button" id="procurar_usuario"><i style="margin-bottom: 1rem;" class="uil uil-filter"></i></button>
                                <input type="search" placeholder="Filtrar Nome" id="filtro">
                            </div>
                        </div>
                        <div class="pagina-conteudo">
                            <div id="filtrar">
                                @include('search.users-resultado')
                            </div>
                        </div>
                    </div>
                </div>
    @include('template-bot')
@endauth

@include('partials.guest')