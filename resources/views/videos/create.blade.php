@auth
    @include('template-top')
                <!-- PARTE CENTRO -->
                <div class="centro">
                    <div class="pagina">
                        @can('enviar_videos', App\Models\User::class)
                            @if(session()->has('sucesso-criar-video'))
                                <div class="msg-sucesso msg-caixa">
                                    <h3><span><i class="uil uil-check"></i></span>Feito</h3>
                                    {{ session()->get('sucesso-criar-video') }}
                                </div>
                            @endif
                            <h2>Enviar Vídeo</h2>
                            <ul>
                                <li class="tab ativo" data-tab="tab1"><i class="uil uil-video"></i> Interno</li>
                                <li class="tab" data-tab="tab2"><i class="uil uil-youtube"></i> Youtube</li>
                            </ul>
                            <div id="tab1" class="tab-conteudo ativo">
                                <div class="pagina-cabecalho">
                                    <h3 class="pagina-subtitulo">
                                        <i class="uil uil-video"></i> Enviar Vídeo Interno
                                    </h3>
                                </div>
                                <div class="pagina-conteudo">
                                    <form id="criar-vid" action="{{ route('videos.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('POST')

                                        <input type="text" value="{{auth()->user()->id}}" name="usuario_id" style="display: none">

                                        <input type="text" value="1" name="interno" style="display: none">

                                        <label for="vid-titulo">Título:</label>
                                        <input type="text" id="vid-titulo" name="titulo" required>
                                        
                                        <label for="vid-descricao">Descrição:</label><br>
                                        <textarea id="vid-descricao" maxlength="1000" class="txtarea" name="descricao" rows="10" required></textarea>
                                        
                                        @include('videos.create-form')

                                        <label for="video">Selecione vídeo .mp4:</label><br>
                                        <input type="file" id="video" name="video" required>
                                        
                                        <div class="centralizar">
                                            <input type="submit" class="btn btn-border" value="Enviar Vídeo">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div id="tab2" class="tab-conteudo">
                                <div class="pagina-cabecalho">
                                    <h3 class="pagina-subtitulo">
                                        <i class="uil uil-youtube"></i> Enviar Link Youtube
                                    </h3>
                                </div>
                                <div class="pagina-conteudo">
                                    <form id="criar-ytb" method="POST" action="{{ route('videos.store') }}">
                                        @csrf
                                        @method('POST')
                                        
                                        <input type="text" value="{{auth()->user()->id}}" name="usuario_id" style="display: none" required>

                                        <input type="text" value="0" name="interno" style="display: none" required>

                                        <label for="ytb-titulo">Título:</label>
                                        <input type="text" id="ytb-titulo" name="titulo" required>
                                        
                                        <label for="ytb-descricao">Descrição:</label><br>
                                        <textarea id="ytb-descricao" class="txtarea" maxlength="1000" name="descricao" rows="10" required></textarea>
                                        
                                        @include('videos.create-form')

                                        <label for="ytb-titulo">Link Youtube:</label><br>
                                        <small>https://www.youtube.com/watch?v=CódigoVídeo</small>
                                        <input type="text" id="ytb-titulo" name="video" required>

                                        <div class="centralizar">
                                            <input type="submit" class="btn btn-border" value="Enviar Vídeo">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @else
                            <h2>
                                <a href="{{ url('/videos/') }}">
                                    <i class="uil uil-arrow-circle-left"></i>Voltar
                                </a>
                            </h2>
                            <div class="msg-alerta msg-caixa">
                            <i class="uil uil-exclamation-triangle"></i>
                                Você não tem permissão para enviar vídeos.
                            </div>
                        @endcan
                    </div>
                </div>
    @include('template-bot')
@endauth

@include('partials.guest')