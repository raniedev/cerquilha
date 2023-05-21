@auth
@include('template-top')
            <!-- PARTE CENTRO -->
            @php
                $nome = ucwords(auth()->user()->name);
            @endphp

            @php
                $sobrenome = ucwords(auth()->user()->lastname);
                $usuario = '@'.auth()->user()->username;
                $avatar = auth()->user()->avatar;

                $minhas_postagens = $posts->where('user_id', auth()->user()->id)->count();
                $seguidores = $followers->where('follower_id', auth()->user()->id);

                $postagens_seguidores = 0;
                foreach ($seguidores as $s) {
                    $postagens_seguidores += $posts->where('user_id', $s->user_id)->count();
                }
            @endphp
            
            <div class="centro">
                <div class="pagina">                    
                    <h2><?php date_default_timezone_set("America/Sao_Paulo"); echo date("d/m/Y"); echo ' - ' . date("H:i:s");?></h2>
                    <div class="pagina-cabecalho">
                        <h3 class="pagina-subtitulo">
                            <i class="uil uil-notes"></i>Informações
                        </h3>
                    </div>
                    <div class="centralizar">
                        <div class="foto-profile">
                            <img src="{{asset($avatar)}}">
                        </div>
                        <div>
                            <h4>{{$nome}} {{$sobrenome}}
                                @hasrole('admin')
                                    <i class="uil uil-check selo selo-admin"></i>
                                @endhasrole
                                @hasrole('prof')
                                    <i class="uil uil-check selo selo-prof"></i>
                                @endhasrole
                                @hasrole('bloqueado')
                                    <i class="uil uil-ban selo selo-ban"></i>
                                @endhasrole
                            </h4>
                            <p class="texto-suave">{{$usuario}}</p>
                        </div>

                        <ul class="page-profile">
                            <li class="tab ativo" data-tab="tab1">
                                <i class="uil uil-hourglass"></i>Linha
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
                                <i class="uil uil-hourglass"></i>Linha do Tempo ({{$minhas_postagens + $postagens_seguidores}})
                            </h3>
                        </div>
                        <div class="pagina-conteudo">
                            @include('partials.meu-perfil')
                        </div>
                    </div>

                    <div id="tab2" class="tab-conteudo">
                        <div class="pagina-cabecalho">
                            <h3 class="pagina-subtitulo">
                                <i class="uil uil-heart"></i>Minhas Curtidas ({{$likes->where('user_id', auth()->user()->id)->count()}})
                            </h3>
                        </div>
                        <div class="pagina-conteudo">
                            @if($likes->where('user_id', auth()->user()->id)->count())
                                @foreach($likes->sortByDesc('id') as $like)
                                    @if($like->user_id == auth()->user()->id)
                                        @foreach($posts as $post)
                                            @if($post->id == $like->post_id)
                                                @foreach ($users as $user)
                                                    @if($user->id == $post->user_id)
                                                    <div class="curtidas">
                                                        <div class="feed">
                                                            <div class="head">
                                                                <div class="user">
                                                                    <div class="user-foto-perfil">
                                                                        <a href="user/{{$user->username}}">
                                                                            <img src="{{asset($user->avatar)}}">
                                                                        </a>
                                                                    </div>
                                                                    <div class="ingo">
                                                                        <h3>
                                                                            <a href="user/{{$user->username}}">
                                                                            <span class="filtrar-nome">{{$user->name}} {{$user->lastname}}</span></a>
                                                                            <a class="arroba" href="user/{{$user->username}}">
                                                                            <span class="arroba texto-suave"> {{'@'.$user->username}}</span></a>
                                                                            @if ($user->hasRole('admin'))
                                                                                <i class="uil uil-check selo selo-admin"></i>
                                                                            @elseif ($user->hasRole('prof'))
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
                                Nenhuma postagem curtida ainda.
                            @endif
                        </div>
                    </div>
                    
                    <div id="tab3" class="tab-conteudo">
                        <div class="pagina-cabecalho">
                            <h3 class="pagina-subtitulo">
                                <i class="uil uil-users-alt"></i>Quem Sigo ({{$followers->where('follower_id', auth()->user()->id)->count()}})
                            </h3>
                        </div>
                        <div class="pagina-conteudo">
                            <div id="filtrar">
                                @if($followers->where('follower_id', auth()->user()->id)->count())
                                    @foreach ($followers as $f)
                                        @if ($f->follower_id == auth()->user()->id)
                                            @php
                                                $usuarios = $users->where('id', $f->user_id);
                                            @endphp
                                            @foreach ($usuarios->sortBy('username') as $u)
                                            <div class="feed">
                                                <div class="head">
                                                    <div class="user">
                                                        <div class="user-foto-perfil">
                                                            <a href="user/{{$u->username}}">
                                                                <img src="{{asset($u->avatar)}}">
                                                            </a>
                                                        </div>
                                                        <div class="ingo">
                                                            <h3>
                                                                <a href="user/{{$u->username}}">
                                                                <span class="filtrar-nome">{{$u->name}} {{$u->lastname}}</span></a>

                                                                <a class="arroba" href="user/{{$u->username}}">
                                                                <span class="arroba texto-suave"> {{'@'.$u->username}}</span></a>
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
                                                                @if ($ja_segue)
                                                                    <button class="btn btn-primary size-1">Seguindo</button>
                                                                @else
                                                                    <button class="btn btn-border size-1">Seguir</button>
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
                                    Não segue ninguém ainda.
                                @endif
                            </div>
                        </div>
                    </div>

                    <div id="tab4" class="tab-conteudo">
                        <div class="pagina-cabecalho">
                            <h3 class="pagina-subtitulo">
                                <i class="uil uil-users-alt"></i>Meus Seguidores ({{$followers->where('user_id', auth()->user()->id)->count()}})
                            </h3>
                        </div>
                        <div class="pagina-conteudo">
                            <div id="filtrar">
                                @if($followers->where('user_id', auth()->user()->id)->count())
                                    @foreach ($followers as $f)
                                        @if ($f->user_id == auth()->user()->id)
                                            @php
                                                $usuarios = $users->where('id', $f->follower_id);
                                            @endphp
                                            @foreach ($usuarios->sortBy('username') as $u)
                                            <div class="feed">
                                                <div class="head">
                                                    <div class="user">
                                                        <div class="user-foto-perfil">
                                                            <a href="user/{{$u->username}}">
                                                                <img src="{{asset($u->avatar)}}">
                                                            </a>
                                                        </div>
                                                        <div class="ingo">
                                                            <h3>
                                                                <a href="user/{{$u->username}}">
                                                                <span class="filtrar-nome">{{$u->name}} {{$u->lastname}}</span></a>
                                                                
                                                                <a class="arroba" href="user/{{$u->username}}">
                                                                <span class="arroba texto-suave"> {{'@'.$u->username}}</span></a>
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
                                                                @if ($ja_segue)
                                                                    <button class="btn btn-primary size-1">Seguindo</button>
                                                                @else
                                                                    <button class="btn btn-border size-1">Seguir</button>
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
                                    Ninguém te segue ainda.
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@include('template-bot')
@endauth

@include('partials.guest')