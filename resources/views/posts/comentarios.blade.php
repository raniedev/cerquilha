<!-- se a variável $posts não existir, mostra um h3 com uma mensagem -->
@if (!isset($posts))
    <p style="color: var(--cor-alerta)">Ainda não há nenhum comentário</p>
    <!-- senão, monta a tabela com o dados -->
@else
    @php
        $id_postagem = $post->id;
        $username = '@'.auth()->user()->username;
    @endphp

    <!-- Orde as postagens pelo id mais alto -->
    @foreach ($posts->sortByDesc('id') as $p)
        @if( $p->parent_id == $id_postagem )
            @php
                $data = $p->created_at->formatLocalized('%d/%m/%Y - %H:%M:%S')                    
            @endphp
            <div class="show-more">
                <div class="feed">
                    <div class="head">
                        <div class="user">
                            <div class="foto-perfil">
                                <a href="../user/{{$users->find($p->user_id)->username}}">
                                    <img src="{{asset($users->find($p->user_id)->avatar)}}">
                                </a>
                            </div>
                            <div class="ingo">
                                <h3>
                                    <a href="../user/{{$users->find($p->user_id)->username}}">{{ucwords($users->find($p->user_id)->name)}} {{ucwords($users->find($p->user_id)->lastname)}}</a>
                                    <a class="arroba" href="../user/{{$users->find($p->user_id)->username}}"><span class="arroba texto-suave"> {{'@'.strtolower($users->find($p->user_id)->username)}}</span></a>
                                    
                                    @if ($users->find($p->user_id)->hasRole('admin'))
                                        <i class="uil uil-check selo selo-admin"></i>
                                    @elseif ($users->find($p->user_id)->hasRole('prof'))
                                        <i class="uil uil-check selo selo-prof"></i>
                                    @endif
                                </h3>
                                <small class="texto-suave">Postado em {{$data}}</small>
                            </div>
                        </div>

                        <!-- Só irá aparecer o botão de deletar se a postagem for da pessoa logada ou se o usuário logado é um Admin -->
                        @if(('@'.$users->find($p->user_id)->username == $username)  || auth()->user()->hasRole('admin'))
                            @can('interagir_postagens', App\Models\User::class)
                            <span class="edit">
                                <div class="deletar">
                                    <button descricao="Deletar" class="btn_del_comentario" form="delete-form-comment-{{$p->id}}" value="excluir-postagem" type="submit">
                                        <i class="uil uil-trash-alt"></i>
                                    </button>
                                </div>
                            </span>
                            @endcan

                            <!-- form para exclusão -->
                            <form method="POST" style="display: none" class="form" id="delete-form-comment-{{$p->id}}" action="{{ route('posts.destroy', ['post' => $p->id]) }}">
                                @csrf
                                <!-- o método HTTP para exclusão deve ser o DELETE -->
                                @method('DELETE')
                            </form>
                        @endif
                    </div>
                    <div class="postagem">
                        <p>{!! nl2br(htmlspecialchars($p->post)) !!}</p>
                    </div>

                    <div class="photo">
                    </div>

                    <div class="interagir-postagem">
                        <!-- Procure o id do comentário entre todas postagens -->
                        <a href="/posts/{{$posts->find($p->id)->id}}">
                            <div class="comentar">
                                <span descricao="Comentar">
                                    <i class="uil uil-comment-dots"></i>
                                    <!-- Procure em posts as postagens onde o id desta postagem está presente no parent_id, ou seja, é um comentário em outro comentário. Por fim, faça a contagem das respostas 

                                    Parte que procura o parent_id que será passado em "x"
                                    $posts->where('parent_id', x)->count()
                                    
                                    Onde x é igual a $p->id que corresponde ao id da postagem atual que está em loop pelo foreach
                                    -->
                                    <small>{{$posts->where('parent_id', $p->id)->count()}}</small>
                                </span>
                            </div>
                        </a>
                        @php
                            $like = $likes->where('user_id', auth()->user()->id)->where('post_id', $p->id)->first();
                        @endphp
                    @can('interagir_postagens', App\Models\User::class)
                        @if ($like)
                            <div style="color: #de3163" class="descurtir-{{$p->id}}">
                        @else
                            <div class="curtir-{{$p->id}}">
                        @endif
                            <span descricao="Curtir">
                                <i class="uil uil-heart"></i>
                                <small>
                                    {{$likes->where('post_id', $p->id)->count()}}
                                </small>
                            </span>
                        </div>

                        <!-- Só irá aparecer o botão de editar se a postagem for da pessoa logada ou se o usuário logado é um Admin -->
                        @if('@'.$users->find($p->user_id)->username == $username)
                            <a href="/posts/{{$posts->find($p->id)->id}}/edit">
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
@endif
@if(isset($msg))
    <span class="msg-feedback msg-sucesso"><i class="uil uil-pen"></i>{{$msg}}
@endif