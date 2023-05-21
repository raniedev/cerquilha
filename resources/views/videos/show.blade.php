@auth
    @include('template-top')
                <!-- PARTE CENTRO -->
                <div class="centro">
                    <div class="pagina">
                        @isset($video)
                        <h2>Assistir Vídeo</h2>
                        <div class="pagina-cabecalho">
                            <h3 class="pagina-subtitulo">
                                <i class="uil uil-video"></i>{{$video->title}}
                            </h3>
                            <h5>
                                @switch($video->discipline)
                                    @case('Português')
                                        📚 Português
                                        @break
                                    @case('Inglês')
                                        🗽 Inglês
                                        @break
                                    @case('Espanhol')
                                        💃 Espanhol
                                        @break
                                    @case('Matemática')
                                        🧮 Matemática
                                        @break
                                    @case('Geometria')
                                        📐 Geometria
                                        @break
                                    @case('Física')
                                        🍎 Física
                                        @break
                                    @case('Química')
                                        ⚗️ Química
                                        @break
                                    @case('Biologia')
                                        🧬 Biologia
                                        @break
                                    @case('História')
                                        🏺 História
                                        @break
                                    @case('Geografia')
                                        🗺️ Geografia
                                        @break
                                    @case('Música')
                                        🎵 Música
                                        @break
                                    @case('Filosofia')
                                        🧠 Filosofia
                                        @break
                                    @case('Sociologia')
                                        👫 Sociologia
                                        @break
                                    @case('Informática')
                                        💻 Informática
                                        @break
                                    @case('Artes')
                                        🎨 Artes
                                        @break
                                    @default
                                        Default
                                @endswitch
                                    - Classe {{$video->class}}
                            </h5>
                        </div>
                        <div class="pagina-conteudo">
                        <?php                             
                            $start = strpos($video->video, '/watch?v=') + strlen('/watch?v=');
                            $video_id = substr($video->video, $start);
                        ?>

                        @if($video->internal)
                            <video width="100%" height="100%" controls>
                                <source src="/{{$video->video}}" type="video/mp4">
                                Seu navegador não suporta a tag de vídeo do HTML.
                            </video>
                        @else
                            <iframe width="100%" height="480"
                            src="https://www.youtube.com/embed/<?php echo $video_id ?>">
                            </iframe>
                        @endif

                        <h4 class="video-description">{{$video->description}}</h4>
                        @php
                            $data_criacao = $video->created_at;
                            $data_atualizacao = $video->updated_at;
                            $postado_em = $data_criacao->formatLocalized('%d/%m/%Y - %H:%M:%S');
                            $editado_em = $data_atualizacao->formatLocalized('%d/%m/%Y - %H:%M:%S');
                        @endphp
                        <small>Enviado por <a href="/user/{{$users->find($video->user_id)->username}}">{{'@'.$users->find($video->user_id)->username}}</a> em {{$postado_em}}</small>
                        </div>

                        @can('interagir_videos', App\Models\User::class)
                        <div class="interagir-postagem" style="display: flex; gap: 2rem; font-size: 1.2rem; padding: 1rem 0 0 0;">
                            <div class="comentar">
                                <span descricao="Comentar">
                                    <i class="uil uil-comment-dots"></i>
                                    <small>{{$questions->where('video_id', $video->id)->count()}}</small>
                                </span>
                            </div>

                            <!-- Onde user_id = ao id do usuário logado e o video_id é igual do id do vídeo atual-->
                            @if ($like_videos->where('user_id', auth()->user()->id)->where('video_id', $video->id)->isNotEmpty())
                            <div style="color: #de3163" class="vid-descurtir-{{$video->id}}">
                            @else
                            <div class="vid-curtir-{{$video->id}}">
                            @endif
                                <span  id="curtir" descricao="Curtir">
                                    <i class="uil uil-heart"></i>
                                    <small>{{$like_videos->where('video_id', $video->id)->count()}}</small>
                                    <!-- $like_videos->where('video_id', $video->id)->count() -->
                                </span>
                            </div>

                            <!-- Só irá aparecer o botão e editar se a postagem for da pessoa logada ou se o usuário logado é um Admin -->

                            @if((auth()->user()->id == $video->user_id) || auth()->user()->hasRole('admin'))
                                @if(auth()->user()->id == $video->user_id)
                                <a href="/videos/{{$video->id}}/edit">
                                    <div class="editar">
                                        <span>
                                            <i class="uil uil-edit"></i>
                                            <small>Editar</small>
                                        </span>
                                    </div>
                                </a>
                                @endif

                                <!-- note que os botões estão fora dos forms. O atributo form indica qual form o botão pertence -->
                                <div style="display: flex; align-items: center; justify-content: center;">
                                    <button class="botao bt-excluir bt-direita" form="delete-video" type="submit" value="Excluir" onclick="return confirm('Tem certeza que deseja excluir este vídeo?')">
                                        <i class="uil uil-trash-alt"></i>Excluir
                                    </button>
                                </div>
                                <!-- form para exclusão -->
                                <form method="POST" style="display: none" class="form" id="delete-video" action="{{ route('videos.destroy', $video->id) }}">
                                    @csrf
                                    <!-- o método HTTP para exclusão deve ser o DELETE -->
                                    @method('DELETE')
                                </form>
                            @endif
                        </div>
                        @else
                            <p class="msg-erro"><i class="uil uil-exclamation-triangle"></i> Você está impossibilitado de interagir com os vídeos.</p>
                        @endcan

                        @can('interagir_videos', App\Models\User::class)
                        <div class="pagina-cabecalho">
                            <h3 class="pagina-subtitulo">
                                <i class="uil uil-pen"></i>Tirar Dúvida
                            </h3>
                            <div class="pagina-conteudo">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <!-- campo para um post de até 1000 caracteres agrupado à um botão de envio -->
                                        <form id="form_postagem" method="POST" class="input-group create-post" action="{{ route('videos.comment') }}">
                                            @csrf
                                            <!-- criando um name para uso na função serialize -->
                                            <textarea id="texto_postagem" name="post" class="form-control" placeholder="Escreva um comentário..." maxlength="1100" cols="30" rows="8"></textarea>
                                            <input class="id-pai" type="text" name="id_video" value="{{$video->id}}">
                                            <input class="id-pai" type="text" name="resposta" value="">
                                            <span class="input-group-btn">
                                                <button disabled class="btn btn-primary" type="submit" id="btn_postagem">Comentár</button>
                                            </span>
                                        </form>
                                    </div>
                                </div>
                                @include('partials.emojis')
                            </div>
                        </div>
                        @endcan

                        <div class="pagina-cabecalho">
                            <h3 class="pagina-subtitulo">
                                <i class="uil uil-comments"></i>Dúvidas
                            </h3>
                        </div>
                        <div class="pagina-conteudo">
                            <div id="postagens">
                                @if ($questions->where('video_id', $video->id)->count() == 0)
                                    Nenhum comentário
                                @else
                                    @foreach($questions->where('video_id', $video->id)->sortByDesc('id') as $q)
                                        @if($q->answer == null)
                                            {{-- Variáveis --}}
                                            @php
                                                $username = auth()->user()->username;

                                                $nome = ucwords($users->find($q->user_id)->name);
                                                $sobrenome = ucwords($users->find($q->user_id)->lastname);
                                                $usuario = $users->find($q->user_id)->username;
                                                $avatar = $users->find($q->user_id)->avatar;
                                                $data_criacao = $q->created_at;
                                                $data_atualizacao = $q->updated_at;
                                                $postado_em = $data_criacao->formatLocalized('%d/%m/%Y - %H:%M:%S');
                                                $editado_em = $data_atualizacao->formatLocalized('%d/%m/%Y - %H:%M:%S');

                                                $like = $like_videos->where('user_id', auth()->user()->id)->where('video_id', $q->id)->first();
                                            @endphp
                                            <div class="show-more">
                                                <div class="feed">
                                                    <div class="head">
                                                        <div class="user">
                                                            <div class="foto-perfil">
                                                                <a href="user/{{$usuario}}">
                                                                    <img src="{{asset($avatar)}}">
                                                                </a>
                                                            </div>
                                                            <div class="ingo">
                                                                <h3>
                                                                    <a href="user/{{$usuario}}">{{$nome}} {{$sobrenome}}</a>
                                                                    <a class="arroba" href="user/{{$usuario}}"><span class="arroba texto-suave"> {{'@'.$usuario}}</span></a>
                                                                    @if ($users->find($q->user_id)->hasRole('admin'))
                                                                        <i class="uil uil-check selo selo-admin"></i>
                                                                    @elseif ($users->find($q->user_id)->hasRole('prof'))
                                                                        <i class="uil uil-check selo selo-prof"></i>
                                                                    @endif
                                                                </h3>
                                                                <small class="texto-suave">Postado em {{$postado_em}}</small>
                                                            </div>
                                                        </div>
                                                        
                                                        <!-- Só irá aparecer o botão de deletar se a postagem for da pessoa logada ou se o usuário logado é um Admin -->
                                                        @if(($username == $usuario) || auth()->user()->hasRole('admin'))
                                                            @can('interagir_videos', App\Models\User::class)
                                                            <span class="edit">
                                                                <div class="deletar">
                                                                    <button descricao="Deletar" class="btn_del_postagem" form="delete-form-{{$q->id}}" type="submit" value="Excluir" onclick="return confirm('Tem certeza que deseja excluir esta dúvida?')">
                                                                        <i class="uil uil-trash-alt"></i>
                                                                    </button>
                                                                </div>
                                                            </span>
                                                            @endcan
                                                            <!-- form para exclusão -->
                                                            <form method="POST" style="display: none" class="form" id="delete-form-{{$q->id}}" action="{{ route('questions.destroy', $q->id) }}">
                                                                @csrf
                                                                <!-- o método HTTP para exclusão deve ser o DELETE -->
                                                                @method('DELETE')
                                                            </form>
                                                        @endif
                                                    </div>

                                                    <div class="postagem">
                                                        <p>{!! nl2br(htmlspecialchars($q->post)) !!}</p>

                                                        <!-- Resposta (se houver) -->
                                                        @if($questions->where('answer', $q->id)->count() > 0)
                                                            @php
                                                                $resposta = $questions->where('answer', $q->id)->first();
                                                                $user = $users->where('id', $resposta->user_id)->first();
                                                                $resposta_data = $resposta->updated_at;
                                                                $resposta_postado_em = $resposta_data->formatLocalized('%d/%m/%Y - %H:%M:%S');
                                                            @endphp
                                                            <div class="user" style="margin-left: 1rem; margin-top: 1rem; padding-top: 1rem; padding-left: 1rem; background: var(--cor-clara); border-left: 2px solid var(--cor-principal);">
                                                                <div class="foto-perfil">
                                                                    <a href="user/{{$user->username}}">
                                                                        <img src="{{asset($user->avatar)}}">
                                                                    </a>
                                                                </div>
                                                                <div class="ingo">
                                                                    <h3>
                                                                        <a href="user/{{$usuario}}">{{$user->name}} {{$user->lastname}}</a>
                                                                        <a class="arroba" href="user/{{$user->username}}"><span class="arroba texto-suave"> {{'@'.$user->username}}</span></a>
                                                                        @if ($user->hasRole('admin'))
                                                                            <i class="uil uil-check selo selo-admin"></i>
                                                                        @elseif ($user->hasRole('prof'))
                                                                            <i class="uil uil-check selo selo-prof"></i>
                                                                        @endif
                                                                    </h3>
                                                                    <small class="texto-suave">Postado em {{$resposta_postado_em}}</small>
                                                                </div>
                                                            </div>
                                                            <div>
                                                            <p style="padding: 0 1rem 1rem 2rem; background: var(--cor-clara); border-left: 2px solid var(--cor-principal);">{!! nl2br(htmlspecialchars($resposta->post)) !!}</p>
                                                            </div>

                                                            @if(($user->id == auth()->user()->id) || auth()->user()->hasRole('admin'))
                                                                @can('criar_postagens', App\Models\User::class)
                                                                <span class="resp">
                                                                    <div class="deleta">
                                                                        <p><button class="btn btndel-tirar-duvida" form="delete-resposta-{{$q->id}}" type="submit" value="Excluir" onclick="return confirm('Tem certeza que deseja excluir esta resposta?')">
                                                                            <i class="uil uil-trash-alt"></i> Excluir
                                                                        </button></p>
                                                                    </div>
                                                                </span>
                                                                <!-- form para exclusão -->
                                                                <form method="POST" style="display: none" class="form" id="delete-resposta-{{$q->id}}" action="{{ route('questions.destroy', $resposta->id) }}">
                                                                    @csrf
                                                                    <!-- o método HTTP para exclusão deve ser o DELETE -->
                                                                    @method('DELETE')
                                                                </form>
                                                                @endcan
                                                            @endif
                                                        @else
                                                            @if($video->user_id == auth()->user()->id)
                                                                @can('interagir_videos', App\Models\User::class)
                                                                <form id="form_postagem_{{$q->id}}" method="POST" class="input-group create-post" action="{{ route('videos.comment') }}">
                                                                    @csrf
                                                                    <!-- criando um name para uso na função serialize -->
                                                                    <textarea id="texto_postagem" name="post" class="form-control" placeholder="Responder dúvida..." maxlength="1100" cols="30" rows="8"></textarea>
                                                                    <input class="id-pai" type="text" name="id_video" value="{{$video->id}}">
                                                                    <input class="id-pai" type="text" name="resposta" value="{{$q->id}}">
                                                                    <span class="input-group-btn">
                                                                        <button class="btn btn-primary" type="submit">Comentar</button>
                                                                    </span>
                                                                </form>
                                                                @endcan
                                                            @else
                                                                <p class="duvida-resp">Aguardando resposta do professor</p>
                                                            @endif
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        @else
                            <h2>Vídeo Inexistente</h2>
                        @endisset
                    </div>
                </div>
    <script src="{{asset('js/post.js')}}"></script>
    @include('template-bot')
@endauth

@include('partials.guest')