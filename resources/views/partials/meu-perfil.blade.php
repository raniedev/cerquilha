<!-- se a variável $posts não existir, mostra um h3 com uma mensagem -->
@if (!isset($posts))
    <h3 style="color: red">Erro, nenhum registro encontrado!</h3>
    <!-- senão, monta a tabela com o dados -->
@else

    @if ($minhas_postagens == 0 && $postagens_seguidores == 0)
        <div id="nenhuma-postagem">
            <div id="np-info">
                <p><i class="uil uil-frown"></i></p>
                <p>Não há nada para mostrar na sua linha do tempo:</p>
                <p>• Faça sua primeira postagem;</p>
                <p>• Siga outros usuários para começarmos.</p>
            </div>
        </div>
    @else
        @foreach ($results->sortByDesc('created_at') as $result)
            {{-- Se for null significa que não é uma resposta --}}
                {{-- Variáveis --}}
                @php
                    $username = auth()->user()->username;

                    $nome = ucwords($users->find($result->user_id)->name);
                    $sobrenome = ucwords($users->find($result->user_id)->lastname);
                    $usuario = $users->find($result->user_id)->username;
                    $avatar = $users->find($result->user_id)->avatar;
                    $data_criacao = $result->created_at;
                    $data_atualizacao = $result->updated_at;
                    $postado_em = $data_criacao->formatLocalized('%d/%m/%Y - %H:%M:%S');
                    $editado_em = $data_atualizacao->formatLocalized('%d/%m/%Y - %H:%M:%S');

                    
                    $like = $likes->where('user_id', auth()->user()->id)->where('post_id', $result->id)->first();
                @endphp

                <div class="show-more">
                    <div class="feed margin">
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

                                        <a class="arroba" href="user/{{$usuario}}">
                                        <span class="arroba texto-suave"> {{'@'.$usuario}}</span></a>
                                        @if ($users->find($result->user_id)->hasRole('admin'))
                                            <i class="uil uil-check selo selo-admin"></i>
                                        @elseif ($users->find($result->user_id)->hasRole('prof'))
                                            <i class="uil uil-check selo selo-prof"></i>
                                        @endif
                                    </h3>
                                    <small class="texto-suave">Postado em {{$postado_em}}</small>
                                </div>
                            </div>

                            <!-- Só irá aparecer o botão de deletar se a postagem for da pessoa logada ou se o usuário logado é um Admin -->
                            @if(($username == $usuario) || auth()->user()->hasRole('admin'))
                                @can('interagir_postagens', App\Models\User::class)
                                <span class="edit">
                                    <div class="deletar">
                                        <button descricao="Deletar" class="btn_del_postagem" form="delete-form-{{$result->id}}" type="submit" value="Excluir" onclick="return confirm('Tem certeza que deseja excluir este post?')">
                                            <i class="uil uil-trash-alt"></i>
                                        </button>
                                    </div>
                                </span>
                                @endcan
                                
                                <!-- form para exclusão -->
                                <form method="POST" style="display: none" class="form" id="delete-form-{{$result->id}}" action="{{ route('posts.destroy', ['post' => $result->id]) }}">
                                    @csrf
                                    <!-- o método HTTP para exclusão deve ser o DELETE -->
                                    @method('DELETE')
                                </form>
                            @endif

                        </div>
                        <div class="postagem">
                            <p>{!! nl2br(htmlspecialchars($result->post)) !!}</p>
                        </div>

                        <div class="photo">
                        </div>

                        <div class="interagir-postagem">
                            <a href="/posts/{{$result->id}}">
                                <div class="comentar">
                                    <span descricao="Comentar">
                                        <i class="uil uil-comment-dots"></i>
                                        <small>{{$results->where('parent_id', $result->id)->count()}}</small>
                                    </span>
                                </div>
                            </a>
                        @can('interagir_postagens', App\Models\User::class)
                            @if ($like)
                                <div style="color: #de3163" class="descurtir-{{$result->id}}">
                            @else
                                <div class="curtir-{{$result->id}}">
                            @endif
                                <span descricao="Curtir">
                                    <i class="uil uil-heart"></i>
                                    <small>
                                        {{$likes->where('post_id', $result->id)->count()}}
                                    </small>
                                </span>
                            </div>

                            <!-- Só irá aparecer o botão e editar se a postagem for da pessoa logada ou se o usuário logado é um Admin -->
                            @if($username == $usuario)
                                <a href="/posts/{{$result->id}}/edit">
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
        @endforeach
        
        
        @if(($minhas_postagens + $postagens_seguidores) > 10)
            <button id="show-more-abrir">Mostrar Mais</button>
        @endif
        
    @endif
@endif
@if(isset($msg))
    <span class="msg-feedback msg-sucesso"><i class="uil uil-pen"></i>{{$msg}}
@endif