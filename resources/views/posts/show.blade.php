@auth
    @include('template-top')
    <!-- Variáveis -->
    @php
        if($user) {
            $username = '@'.auth()->user()->username;
            $nome = ucwords($user->name);
            $sobrenome = ucwords($user->lastname);
            $usuario = $user->username;
            $avatar = $user->avatar;
            $data_criacao = $post->created_at;
            $data_atualizacao = $post->updated_at;
            $postado_em = $data_criacao->formatLocalized('%d/%m/%Y - %H:%M:%S');
            $editado_em = $data_atualizacao->formatLocalized('%d/%m/%Y - %H:%M:%S');
        }
    @endphp
        <!-- PARTE CENTRO -->
        <div class="centro">
            <div class="pagina">
                <h2>
                    <a href="{{ route('posts.index') }}">
                        <i class="uil uil-arrow-circle-left"></i>Voltar
                    </a>
                </h2>

                <!-- Aqui determina se a postagem existe ou não -->
                @if($user)
                    <div class="pagina-conteudo show-postagem">
                        @if($post->parent_id)
                            <div class="feed" style="margin-bottom: 1rem;">
                                <div class="head">
                                    <div class="user">
                                        @php
                                            $pai_nome = ucwords($users->find($posts->find($post->parent_id)->user_id)->name);
                                            $pai_sobrenome = ucwords($users->find($posts->find($post->parent_id)->user_id)->lastname);
                                            $pai_usuario = strtolower($users->find($posts->find($post->parent_id)->user_id)->username);
                                            $pai_avatar = $users->find($posts->find($post->parent_id)->user_id)->avatar;
                                            $pai_data_criacao = $users->find($posts->find($post->parent_id)->user_id)->created_at;
                                            $pai_postado_em = $pai_data_criacao->formatLocalized('%d/%m/%Y - %H:%M:%S');
                                        @endphp

                                        <div class="foto-perfil">
                                            <a href="../user/{{$pai_usuario}}">
                                                <img src="{{asset($pai_avatar)}}">
                                            </a>
                                        </div>
                                        <div class="ingo">
                                            <h3>
                                                <a href="../user/{{$pai_usuario}}">{{$pai_nome}} {{$pai_sobrenome}}</a>
                                                <a class="arroba" href="../user/{{$pai_usuario}}"><span class="arroba texto-suave"> {{'@'.$pai_usuario}}</span></a>
                                                @if ($users->find($posts->find($post->parent_id))->hasRole('admin'))
                                                    <i class="uil uil-check selo selo-admin"></i>
                                                @elseif ($users->find($posts->find($post->parent_id))->hasRole('prof'))
                                                    <i class="uil uil-check selo selo-prof"></i>
                                                @endif
                                            </h3>
                                            <small class="texto-suave">Postado em {{$pai_postado_em}}</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="postagem">
                                <p>{!! nl2br(htmlspecialchars($posts->find($post->parent_id)->post)) !!}</p>
                                </div>

                                <div class="photo">
                                </div>
                            </div>
                        @endif

                        <div class="feed">
                            <div class="head">
                                <div class="user">
                                    <div class="foto-perfil">
                                        <a href="../user/{{$usuario}}">
                                            <img src="{{asset($users->find($post->user_id)->avatar)}}">
                                        </a>
                                    </div>
                                    <div class="ingo">
                                        <h3>
                                            <a href="../user/{{$usuario}}">{{$nome}} {{$sobrenome}}</a>
                                            <a class="arroba" href="../user/{{$usuario}}"><span class="arroba texto-suave"> {{'@'.$user->username}}</span></a>                                            
                                            @if ($user->hasRole('admin'))
                                                <i class="uil uil-check selo selo-admin"></i>
                                            @elseif ($user->hasRole('prof'))
                                                <i class="uil uil-check selo selo-prof"></i>
                                            @endif
                                        </h3>
                                        <small class="texto-suave">Postado em {{$postado_em}}</small>
                                    </div>
                                </div>

                                <!-- Só irá aparecer o botão de deletar se a postagem for da pessoa logada ou se o usuário logado é um Admin -->
                                @if(('@'.$users->find($post->user_id)->username == $username)  || auth()->user()->hasRole('admin'))
                                    @can('interagir_postagens', App\Models\User::class)
                                    <span class="edit">
                                        @can('interagir_postagens', App\Models\User::class)
                                        <div class="deletar">
                                            <button descricao="Deletar" class="btn_del_postagem" form="delete-form" type="submit" value="Excluir" data-id_postagem="{{$post->id}}">
                                                <i class="uil uil-trash-alt"></i>
                                            </button>
                                        </div>
                                        @endcan
                                    </span>
                                    @endcan
                                    <!-- form para exclusão -->
                                    <form method="POST" style="display: none" class="form" id="delete-form" action="{{ route('posts.destroy', $post->id) }}">
                                        @csrf
                                        <!-- o método HTTP para exclusão deve ser o DELETE -->
                                        @method('DELETE')
                                    </form>
                                @endif
                            </div>
                            <div class="postagem">
                                <p>{!! nl2br(htmlspecialchars($post->post)) !!}</p>
                            </div>

                            <div class="photo">
                            </div>
                            
                            @can('interagir_postagens', App\Models\User::class)
                                <div class="interagir-postagem">
                                    <!-- Procure o id do comentário entre todas postagens -->
                                    <a onclick="document.getElementById('texto_postagem').focus()">
                                        <div class="comentar">
                                            <span descricao="Comentar">
                                                <i class="uil uil-comment-dots"></i>
                                                <!-- Procure em posts as postagens onde o id desta postagem está presente no parent_id, ou seja, é um comentário em outro comentário. Por fim, faça a contagem das respostas 

                                                Parte que procura o parent_id que será passado em "x"
                                                $posts->where('parent_id', x)->count()
                                                
                                                Onde x é igual a $p->id que corresponde ao id da postagem atual que está em loop pelo foreach
                                                -->
                                                <small>{{$posts->where('parent_id', $post->id)->count()}}</small>
                                            </span>
                                        </div>
                                    </a>
                                    @php
                                        $like = $likes->where('user_id', auth()->user()->id)->where('post_id', $post->id)->first();
                                    @endphp

                                    @if ($like)
                                        <div style="color: #de3163" class="descurtir-{{$post->id}}">
                                    @else
                                        <div class="curtir-{{$post->id}}">
                                    @endif
                                        <span descricao="Curtir">
                                            <i class="uil uil-heart"></i>
                                            <small>
                                                {{$likes->where('post_id', $post->id)->count()}}
                                            </small>
                                        </span>
                                    </div>

                                    <!-- Só irá aparecer o botão de editar se a postagem for da pessoa logada ou se o usuário logado é um Admin -->
                                    @if('@'.$users->find($post->user_id)->username == $username)
                                        <a href="/posts/{{$post->id}}">
                                            <div class="editar">
                                                <a href="./{{$post->id}}/edit">
                                                    <span>
                                                        <i class="uil uil-edit"></i>
                                                        <small>Editar</small>
                                                    </span>
                                                </a>
                                            </div>
                                        </a>
                                    @endif
                                </div>
                            @endcan
                        </div>
                    </div>
                    
                    @can('criar_postagens', App\Models\User::class)
                    <div class="pagina-cabecalho">
                        <h3 class="pagina-subtitulo">
                            <i class="uil uil-pen"></i>Comentar
                        </h3>
                    </div>
                        <div class="pagina-conteudo">
                            @include('partials.comentar')
                            @include('partials.emojis')
                        </div>
                    @else
                        <p class="msg-erro"><i class="uil uil-exclamation-triangle"></i> Você está impossibilitado de fazer um comentário.</p>
                    @endcan

                    <div class="pagina-cabecalho">
                        <h3 class="pagina-subtitulo">
                            <i class="uil uil-comments"></i>Comentários ({{ count($posts->where('parent_id', $post->id)) }})
                        </h3>
                    </div>
                    <div class="pagina-conteudo">
                        <div id="postagens">
                            @include('posts.comentarios')
                        </div>
                        @if(count($posts->where('parent_id', $post->id)) > 10)
                            <button id="show-more-abrir">Mostrar Mais</button>
                        @endif
                    </div>
                @else
                    <h2>
                        <a href="{{ url('/posts/') }}">
                            <i class="uil uil-arrow-circle-left"></i>Voltar
                        </a>
                    </h2>

                    <div class="msg-alerta msg-caixa">
                        <i class="uil uil-exclamation-triangle"></i>
                        Esta postagem não existe.
                    </div>
                @endif
            </div>
        </div>
        <script src="{{asset('js/post.js')}}"></script>
    @include('template-bot')

@endauth

@include('partials.guest')