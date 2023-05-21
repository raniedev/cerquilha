@auth
    @include('template-top')
                @php
                    $count = 0;
                @endphp
                <!-- PARTE CENTRO -->
                <div class="centro">
                    <div class="pagina">
                        <h2>Procurar Vídeo</h2>
                        <div class="pagina-cabecalho">
                            <h3 class="pagina-subtitulo">
                                <i class="uil uil-search"></i>Resultados ({{$videos->count()}})
                            </h3>
                        </div>
                        <div class="pagina-conteudo">
                            <div id="postagens">
                                <div class="procurar-video">
                                    @if($videos->count() > 0)
                                        @foreach ($videos->sortByDesc('id') as $vid)
                                            @php
                                                $data_criacao = $vid->created_at;
                                                $data = $data_criacao->formatLocalized('%d/%m/%Y');
                                                $hora = $data_criacao->formatLocalized('%H:%M:%S');
                                            @endphp
                                            <div class="resultado-video">
                                                <p><a class="underline" href="/videos/{{$vid->id}}"><i class="uil uil-play"></i>{{$vid->title}} - {{$vid->discipline}}</a></p>
                                                <p>{{$vid->description}}</p>
                                                <small>Enviado por <a href="/user/{{$users->find($vid->user_id)->username}}">{{'@'.$users->find($vid->user_id)->username}}</a> em {{$data}} - {{$hora}}</small>

                                                <div class="interagir-postagem" style="display: flex; gap: 2rem; font-size: 1.2rem; padding: 1rem 0;">
                                                    <a href="/videos/{{$vid->id}}">
                                                        <div class="comentar">
                                                            <span descricao="Comentar">
                                                                <i class="uil uil-comment-dots"></i>
                                                                <small>{{$questions->where('video_id', $vid->id)->count()}}</small>
                                                            </span>
                                                        </div>
                                                    </a>
                                                @if(!auth()->user()->hasRole('bloqueado'))
                                                    <!-- $like -->
                                                    @if ($like_videos->where('user_id', auth()->user()->id)->where('video_id', $vid->id)->isNotEmpty())
                                                    <div style="color: #de3163" class="vid-descurtir-{{$vid->id}}">
                                                    @else
                                                    <div class="vid-curtir-{{$vid->id}}">
                                                    @endif
                                                        <span  id="curtir" descricao="Curtir">
                                                            <i class="uil uil-heart"></i>
                                                            <small>{{$like_videos->where('video_id', $vid->id)->count()}}
                                                                <!-- $likes->where('post_id', $post->id)->count() -->
                                                            </small>
                                                        </span>
                                                    </div>

                                                    <!-- Só irá aparecer o botão e editar se a postagem for da pessoa logada ou se o usuário logado é um Admin -->

                                                    @if(auth()->user()->id == $vid->user_id)
                                                        <a href="/videos/{{$vid->id}}/edit">
                                                            <div class="editar">
                                                                <span>
                                                                    <i class="uil uil-edit"></i>
                                                                    <small>Editar</small>
                                                                </span>
                                                            </div>
                                                        </a>

                                                        <!-- note que os botões estão fora dos forms. O atributo form indica qual form o botão pertence -->
                                                        <div style="display: flex; align-items: center; justify-content: center;">
                                                            <button class="botao bt-excluir bt-direita" form="delete-video" type="submit" value="Excluir" onclick="return confirm('Tem certeza que deseja excluir o vídeo \'{{$vid->title}}\'?')">
                                                                <i class="uil uil-trash-alt"></i>Excluir
                                                            </button>
                                                        </div>
                                                        <!-- form para exclusão -->
                                                        <form method="POST" style="display: none" class="form" id="delete-video" action="{{ route('videos.destroy', $vid->id) }}">
                                                            @csrf
                                                            <!-- o método HTTP para exclusão deve ser o DELETE -->
                                                            @method('DELETE')
                                                        </form>
                                                    @endif
                                                @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div id="nenhuma-postagem">
                                            <div id="np-info">
                                                <p><i class="uil uil-frown"></i></p>
                                                <p>Nenhum resultado foi encontrado.</p>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    @include('template-bot')
@endauth

@include('partials.guest')