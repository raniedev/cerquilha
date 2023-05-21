@if ($posts->count() == 0)
    <div id="nenhuma-postagem">
        <div id="np-info">
            <p><i class="uil uil-frown"></i></p>
            <p>Nenhum resultado foi encontrado.</p>
        </div>
    </div>
@else        
    @foreach ($posts->sortByDesc('id') as $post)
        {{-- Se for null significa que não é uma resposta --}}
        {{-- Variáveis --}}
        @php
            $username = auth()->user()->username;

            $nome = ucwords($users->find($post->user_id)->name);
            $sobrenome = ucwords($users->find($post->user_id)->lastname);
            $usuario = $users->find($post->user_id)->username;
            $avatar = $users->find($post->user_id)->avatar;
            $data_criacao = $post->created_at;
            $data_atualizacao = $post->updated_at;
            $postado_em = $data_criacao->formatLocalized('%d/%m/%Y - %H:%M:%S');
            $editado_em = $data_atualizacao->formatLocalized('%d/%m/%Y - %H:%M:%S');

            $like = $likes->where('user_id', auth()->user()->id)->where('post_id', $post->id)->first();
        @endphp
        <div class="show-more">
            <div class="feed">
                <div class="head">
                    <div class="user">
                        <div class="foto-perfil">
                            <a href="../user/{{$usuario}}">
                                <img src="{{asset($avatar)}}">
                            </a>
                        </div>
                        <div class="ingo">
                            <h3>
                                <a href="../user/{{$usuario}}">{{$nome}} {{$sobrenome}}</a>
                                <a class="arroba" href="../user/{{$usuario}}"><span class="arroba texto-suave"> {{'@'.$usuario}}</span></a>
                            </h3>
                            <small class="texto-suave">Postado em {{$postado_em}}</small>
                        </div>
                    </div>

                    <!-- Só irá aparecer o botão de deletar se a postagem for da pessoa logada ou se o usuário logado é um Admin -->
                @if(!auth()->user()->hasRole('bloqueado'))
                    @if($username == $usuario)
                        <span class="edit">
                            <div class="deletar">
                                <button descricao="Deletar" class="btn_del_postagem" form="delete-form-{{$post->id}}" type="submit" value="Excluir" onclick="return confirm('Tem certeza que deseja excluir este post?')">
                                    <i class="uil uil-trash-alt"></i>
                                </button>
                            </div>
                        </span>
                        <!-- form para exclusão -->
                        <form method="POST" style="display: none" class="form" id="delete-form-{{$post->id}}" action="{{ route('posts.destroy', ['post' => $post->id]) }}">
                            @csrf
                            <!-- o método HTTP para exclusão deve ser o DELETE -->
                            @method('DELETE')
                        </form>
                    @endif
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
                @if(!auth()->user()->hasRole('bloqueado'))
                    @if ($like)
                        <div style="color: #de3163" class="descurtir-{{$post->id}}">
                    @else
                        <div class="curtir-{{$post->id}}">
                    @endif
                        <span  id="curtir" descricao="Curtir">
                            <i class="uil uil-heart"></i>
                            <small>
                                {{$likes->where('post_id', $post->id)->count()}}
                            </small>
                        </span>
                    </div>

                    <!-- Só irá aparecer o botão e editar se a postagem for da pessoa logada ou se o usuário logado é um Admin -->
                    @if($username == $usuario)
                        <a href="/posts/{{$post->id}}/edit">
                            <div class="editar">
                                <span>
                                    <i class="uil uil-edit"></i>
                                    <small>Editar</small>
                                </span>
                            </div>
                        </a>
                    @endif
                @endif
                </div>
            </div>
        </div>
    @endforeach
    @if ($posts->count() > 10)
        <button id="show-more-abrir">Mostrar Mais</button>
    @endif
@endif