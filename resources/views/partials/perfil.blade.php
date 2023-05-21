<!-- se a variável $posts não existir, mostra um h3 com uma mensagem -->
@if (!isset($posts))
    <h3 style="color: red">Erro, nenhum registro encontrado!</h3>
    <!-- senão, monta a tabela com o dados -->
@else
    @if($posts->where('user_id', $user->id)->count())
        @foreach ($posts->sortByDesc('id') as $post)
            {{-- Se for null significa que não é uma resposta --}}
            @if($post->user_id == $user->id)
                {{-- Variáveis --}}
                @php
                    $nome = ucwords($users->find($post->user_id)->name);
                    $sobrenome = ucwords($users->find($post->user_id)->lastname);
                    $usuario = $users->find($post->user_id)->username;
                    $auth_username = auth()->user()->username;
                    $avatar = $users->find($post->user_id)->avatar;
                    $data_criacao = $post->created_at;
                    $data_atualizacao = $post->updated_at;
                    $postado_em = $data_criacao->formatLocalized('%d/%m/%Y - %H:%M:%S');
                    $editado_em = $data_atualizacao->formatLocalized('%d/%m/%Y - %H:%M:%S');
                    $username = $user->username;
                    $like = $likes->where('user_id', $user->id)->where('post_id', $post->id)->first();
                @endphp

                <div class="show-more">
                    <div class="feed margin">
                        <div class="head">
                            <div class="user">
                                <div class="foto-perfil">
                                    <a href="/user/{{$usuario}}">
                                        <img src="{{asset($avatar)}}">
                                    </a>
                                </div>
                                <div class="ingo">
                                    <h3>
                                        <a href="/user/{{$usuario}}">{{$nome}} {{$sobrenome}}</a><span class="arroba texto-suave"> <a href="/user/{{$usuario}}" style="color: var(--cor-cinza);">{{'@'.$usuario}}</a></span>
                                        @if ($users->find($post->user_id)->hasRole('admin'))
                                            <i class="uil uil-check selo selo-admin"></i>
                                        @elseif ($users->find($post->user_id)->hasRole('prof'))
                                            <i class="uil uil-check selo selo-prof"></i>
                                        @endif
                                    </h3>
                                    <small class="texto-suave">Postado em {{$postado_em}}</small>
                                </div>
                            </div>
                            
                            <!-- Só irá aparecer o botão de deletar se a postagem for da pessoa logada ou se o usuário logado é um Admin -->
                            @if(($username == $auth_username) || auth()->user()->hasRole('admin'))
                                @can('interagir_postagens', App\Models\User::class)
                                <span class="edit">
                                    <div class="deletar">
                                        <button descricao="Deletar" class="btn_del_postagem" form="delete-form-{{$post->id}}" type="submit" value="Excluir" onclick="return confirm('Tem certeza que deseja excluir este post?')">
                                            <i class="uil uil-trash-alt"></i>
                                        </button>
                                    </div>
                                </span>
                                @endcan
                                
                                <!-- form para exclusão -->
                                <form method="POST" style="display: none" class="form" id="delete-form-{{$post->id}}" action="{{ route('posts.destroy', ['post' => $post->id]) }}">
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

                        <div class="interagir-postagem">
                            <a href="/posts/{{$post->id}}">
                                <div class="comentar">
                                    <span descricao="Comentar">
                                        <i class="uil uil-comment-dots"></i>
                                        <small>{{$posts->where('parent_id', $post->id)->count()}}</small>
                                    </span>
                                </div>
                            </a>
                            
                        @can('interagir_postagens', App\Models\User::class)
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

                            <!-- Só irá aparecer o botão e editar se a postagem for da pessoa logada ou se o usuário logado é um Admin -->
                            
                            @if($username == $auth_username)
                                <a href="/posts/{{$post->id}}/edit">
                                    <div class="editar">
                                        <span>
                                            <i class="uil uil-edit"></i>
                                            <small>Editar</small>
                                        </span>
                                    </div>
                                </a>
                            @endif
                        @endcan
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    @else
        Nenhuma postagem ainda.
    @endif

    @if($posts->where('user_id', $user->id)->count() > 10)
        <button id="show-more-abrir">Mostrar Mais</button>
    @endif
@endif
@if(isset($msg))
    <span class="msg-feedback msg-sucesso"><i class="uil uil-pen"></i>{{$msg}}
@endif