@auth
@include('template-top')
            <!-- PARTE CENTRO -->
            @php
                $nome = ucwords($user->name);
                $sobrenome = ucwords($user->lastname);
                $usuario = $user->username;
                $avatar = $user->avatar;
                $auth_id = auth()->user()->id;
            @endphp
            <div class="centro">
                <div class="pagina">
                    @if(auth()->user()->hasRole('admin'))
                        <form action="{{ route('admin.update', $user->id) }}" method="POST" id="mudar_cargo">
                            @csrf
                            <!-- o método de atualização é o PUT -->
                            @method('PUT')
                            <label for="roles">Mudar o cargo de {{'@'.$user->username}}</label>
                            <select id="roles" name="roles" style="margin-bottom: 1rem;">
                                <option value="empty"></option>
                                @if(!$user->hasRole('admin'))
                                    <option value="admin" <?php echo $user->hasRole('admin') ? 'selected' : ''?>>Admin</option>
                                @endif
                                <option value="prof" <?php echo $user->hasRole('prof') ? 'selected' : ''?>>Prof</option>
                                <option value="aluno" <?php echo $user->hasRole('aluno') ? 'selected' : ''?>>Aluno</option>
                                @if((!$user->hasRole('admin')))
                                    <option value="bloqueado" <?php echo $user->hasRole('bloqueado') ? 'selected' : ''?>>Bloqueado</option>
                                @endif
                            </select>
                            <input type="submit" class="btn btn-border" name="mudar-cargo" onclick="return confirm('Tem certeza que deseja mudar o cargo deste usuário?')" value="Mudar Cargo">
                        </form>
                    @endif

                    <div class="pagina-cabecalho">
                        <h3 class="pagina-subtitulo">
                            <i class="uil uil-notes"></i>Informações
                        </h3>
                    </div>
                    <!-- <div class="centralizar">
                        <form action="{{ route('admin.destroy', $user->id) }}" method="POST" id="excluir_usuario" style="margin-bottom: 1rem;">
                            @csrf                            
                            @method('DELETE')
                            <input type="submit" class="btn btn-border botao" name="excluir-usuario" onclick="return confirm('Tem certeza que deseja excluir este usuário?')" value="Excluir Usuário">
                        </form>
                    </div> -->
                    <div class="centralizar">
                        <div class="foto-profile">
                            <img src="{{asset($user->avatar)}}">
                        </div>
                        
                        <div>
                            <h4>
                                {{$nome}} {{$sobrenome}}
                                @if ($user->hasRole('admin'))
                                    <i class="uil uil-check selo selo-admin"></i>
                                @elseif ($user->hasRole('prof'))
                                    <i class="uil uil-check selo selo-prof"></i>
                                @elseif ($user->hasRole('bloqueado'))
                                    <i class="uil uil-ban selo selo-ban"></i>
                                @endif
                            </h4>
                            <p class="texto-suave">{{'@'.$usuario}}</p>
                        </div>

                        @if(!auth()->user()->hasRole('bloqueado'))
                        <div class="seguir">
                            @if ($followers->where('follower_id', $auth_id)->where('user_id', $user->id)->count())
                                <button class="btn btn-primary size-1">Seguindo</button>
                            @else
                                @if (!(auth()->user()->username == $user->username))
                                    <button class="btn btn-border size-1">Seguir</button>
                                @endif
                            @endif
                                <input type="text" class="follower" value="{{$user->id}}" style="display: none;">
                        </div>
                        @endif
    
                        <ul class="page-profile">
                            <li class="tab ativo" data-tab="tab1">
                                <i class="uil uil-comments"></i>Postagens
                            </li>
                            <li class="tab" data-tab="tab2">
                                <i class="uil uil-heart"></i>Curtidas
                            </li>
                            <li class="tab" data-tab="tab3">
                                <i class="uil uil-users-alt"></i>Seguindo
                            </li>
                            <li class="tab" data-tab="tab4">
                                <i class="uil uil-users-alt"></i>Seguidores
                            </li>
                        </ul>
                    </div>

                    <div id="tab1" class="tab-conteudo ativo">
                        <div class="pagina-cabecalho">
                            <h3 class="pagina-subtitulo">
                                <i class="uil uil-comments"></i>Postagens ({{$posts->where('user_id', $user->id)->count()}})
                            </h3>
                        </div>
                        <div class="pagina-conteudo">
                            @include('partials.perfil')
                        </div>
                    </div>

                    <div id="tab2" class="tab-conteudo">
                        <div class="pagina-cabecalho">
                            <h3 class="pagina-subtitulo">
                                <i class="uil uil-heart"></i>Curtidas de {{$user->username}} ({{$likes->where('user_id', $user->id)->count()}})
                            </h3>
                        </div>
                        <div class="pagina-conteudo">
                            @if($likes->where('user_id', $user->id)->count())
                                @foreach($likes->sortByDesc('id') as $like)
                                    @if($like->user_id == $user->id)
                                        @foreach($posts as $post)
                                            @if($post->id == $like->post_id)
                                                @foreach ($users as $u)
                                                    @if($u->id == $post->user_id)
                                                    <div class="curtidas">
                                                        <div class="feed">
                                                            <div class="head">
                                                                <div class="user">
                                                                    <div class="user-foto-perfil">
                                                                        <a href="/user/{{$u->username}}">
                                                                            <img src="{{asset($u->avatar)}}">
                                                                        </a>
                                                                    </div>
                                                                    <div class="ingo">
                                                                        <h3>
                                                                            <span class="filtrar-nome"><a href="/user/{{$u->username}}">{{$u->name}} {{$u->lastname}}</a></span><span class="arroba texto-suave"> <a href="/user/{{$u->username}}" style="color: var(--cor-cinza);">{{'@'.$u->username}}</a></span>
                                                                            @if ($u->hasRole('admin'))
                                                                                <i class="uil uil-check selo selo-admin"></i>
                                                                            @elseif ($u->hasRole('prof'))
                                                                                <i class="uil uil-check selo selo-prof"></i>
                                                                            @endif
                                                                        </h3>
                                                                        @php
                                                                            $postado_em = $post->created_at->formatLocalized('%d/%m/%Y - %H:%M:%S');
                                                                        @endphp
                                                                        <small class="texto-suave">Postado em {{$postado_em}}</small>
                                                                    </div>
                                                                </div>
                                                            
                                                                <!-- Só irá aparecer o botão de deletar se a postagem for da pessoa logada ou se o usuário logado é um Admin -->
                                                                @if(($user->username == auth()->user()->username) || auth()->user()->hasRole('admin'))
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

                                                            <div class="postagem" style="padding-top: .5rem;">
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
                                                                    <span  id="curtir" descricao="Curtir">
                                                                        <i class="uil uil-heart"></i>
                                                                        <small>
                                                                            {{$likes->where('post_id', $post->id)->count()}}
                                                                        </small>
                                                                    </span>
                                                                </div>

                                                                <!-- Só irá aparecer o botão e editar se a postagem for da pessoa logada ou se o usuário logado é um Admin -->
                                                                @if($user->username == auth()->user()->username)
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
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            @else
                                Nenhuma curtida ainda.
                            @endif
                        </div>
                    </div>

                    <div id="tab3" class="tab-conteudo">
                        <div class="pagina-cabecalho">
                            <h3 class="pagina-subtitulo">
                                <i class="uil uil-users-alt"></i>Quem {{$user->username}} está seguindo ({{$followers->where('follower_id', $user->id)->count()}})
                            </h3>
                        </div>
                        <div class="pagina-conteudo">
                            <div id="filtrar">
                                @if($followers->where('follower_id', $user->id)->count())
                                    @foreach ($followers as $f)
                                        @if ($f->follower_id == $user->id)
                                            @php
                                                $usuarios = $users->where('id', $f->user_id);
                                            @endphp
                                            @foreach ($usuarios->sortBy('username') as $u)
                                            <div class="feed">
                                                <div class="head">
                                                    <div class="user">
                                                        <div class="user-foto-perfil">
                                                            <a href="/user/{{$u->username}}">
                                                                <img src="{{asset($u->avatar)}}">
                                                            </a>
                                                        </div>
                                                        <div class="ingo">
                                                            <h3>
                                                                <span class="filtrar-nome"><a href="/user/{{$u->username}}">{{$u->name}} {{$u->lastname}}</a><span class="arroba texto-suave"> <a href="/user/{{$u->username}}" style="color: var(--cor-cinza);">{{'@'.$u->username}}</a></span>
                                                                @if ($u->hasRole('admin'))
                                                                    <i class="uil uil-check selo selo-admin"></i>
                                                                @elseif ($u->hasRole('prof'))
                                                                    <i class="uil uil-check selo selo-prof"></i>
                                                                @endif
                                                            </h3>
                                                            <div class="seguir">
                                                                <!-- O usuário autenticado ao gerar uma procura de usuários, esta variável servirá para checar se cada usuário desta lista já está sendo seguido ou não pelo usuário que está logado
                                                                
                                                                Se sim, vai trocar o botão e mudar a variável $ja_segue para true
                                                                -->
                                                                @php
                                                                    $ja_segue = false
                                                                @endphp

                                                                @foreach ($followers as $follower)
                                                                    @if($follower->user_id == $u->id)
                                                                        @if($follower->follower_id == auth()->user()->id)
                                                                            @php
                                                                                $ja_segue = true
                                                                            @endphp
                                                                        @endif
                                                                    @endif
                                                                @endforeach
                                                                
                                                            @if(!auth()->user()->hasRole('bloqueado'))
                                                                @if (!(auth()->user()->id == $f->user_id))
                                                                    @if ($ja_segue)
                                                                        <button class="btn btn-primary size-1">Seguindo</button>
                                                                    @else
                                                                        <button class="btn btn-border size-1">Seguir</button>
                                                                    @endif
                                                                @else
                                                                <button class="btn btn-disabled" disabled>Você</button>
                                                                @endif
                                                                <input type="text" class="follower" value="{{$u->id}}" style="display: none;">
                                                            @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        @endif
                                    @endforeach
                                @else
                                    Não seguiu ninguém ainda.
                                @endif
                            </div>
                        </div>
                    </div>

                    <div id="tab4" class="tab-conteudo">
                        <div class="pagina-cabecalho">
                            <h3 class="pagina-subtitulo">
                                <i class="uil uil-users-alt"></i>Quem segue {{$user->username}} ({{$followers->where('user_id', $user->id)->count()}})
                            </h3>
                        </div>
                        <div class="pagina-conteudo">
                            <div id="filtrar">
                                @if($followers->where('user_id', $user->id)->count())
                                    @foreach ($followers as $f)
                                        @if ($f->user_id == $user->id)
                                            @php
                                                $usuarios = $users->where('id', $f->follower_id);
                                            @endphp
                                            @foreach ($usuarios->sortBy('username') as $u)
                                            <div class="feed">
                                                <div class="head">
                                                    <div class="user">
                                                        <div class="user-foto-perfil">
                                                            <a href="/user/{{$u->username}}">
                                                                <img src="{{asset($u->avatar)}}">
                                                            </a>
                                                        </div>
                                                        <div class="ingo">
                                                            <h3>
                                                                <span class="filtrar-nome"><a href="/user/{{$u->username}}">{{$u->name}} {{$u->lastname}}</a></span><span class="arroba texto-suave"> <a href="/user/{{$u->username}}" style="color: var(--cor-cinza);">{{'@'.$u->username}}</a></span>
                                                                @if ($u->hasRole('admin'))
                                                                    <i class="uil uil-check selo selo-admin"></i>
                                                                @elseif ($u->hasRole('prof'))
                                                                    <i class="uil uil-check selo selo-prof"></i>
                                                                @endif
                                                            </h3>
                                                            <div class="seguir">
                                                                <!-- O usuário autenticado ao gerar uma procura de usuários, esta variável servirá para checar se cada usuário desta lista já está sendo seguido ou não pelo usuário que está logado
                                                                
                                                                Se sim, vai trocar o botão e mudar a variável $ja_segue para true
                                                                -->
                                                                @php
                                                                    $ja_segue = false
                                                                @endphp

                                                                @foreach ($followers->where('follower_id', auth()->user()->id) as $follower)
                                                                    @if($follower->user_id == $u->id)
                                                                        @php
                                                                            $ja_segue = true
                                                                        @endphp
                                                                    @endif
                                                                @endforeach
                                                                
                                                            @if(!auth()->user()->hasRole('bloqueado'))
                                                                @if (!(auth()->user()->id == $f->follower_id))
                                                                    @if ($ja_segue)
                                                                        <button class="btn btn-primary size-1">Seguindo</button>
                                                                    @else
                                                                        <button class="btn btn-border size-1">Seguir</button>
                                                                    @endif
                                                                @else
                                                                    <button class="btn btn-disabled" disabled>Você</button>
                                                                @endif
                                                                <input type="text" class="follower" value="{{$u->id}}" style="display: none;">
                                                            @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        @endif
                                    @endforeach
                                @else
                                    Não foi seguido por ninguém ainda.
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@include('template-bot')
@endauth

@include('partials.guest')