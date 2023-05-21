@php
    $username = auth()->user()->username;
@endphp

@if ($count == 0)
    <div id="nenhuma-postagem">
        <div id="np-info">
            <p><i class="uil uil-frown"></i></p>
            <p>Nenhum resultado foi encontrado.</p>
        </div>
    </div>
@else        
    @foreach ($users->sortBy('username') as $user)

        @php
            $data_criacao = $user->created_at;
            $data = $data_criacao->formatLocalized('%d/%m/%Y - %H:%M:%S');
        @endphp

        @if ($username != $user->username)
            <div class="feed">
                <div class="head">
                    <div class="user">
                        <div class="user-foto-perfil">
                            <a href="../user/{{$user->username}}">
                                <img src="{{asset($user->avatar)}}">
                            </a>
                        </div>
                        <div class="ingo">
                            <h3>
                                <a href="../user/{{$user->username}}">
                                <span class="filtrar-nome">{{$user->name}} {{$user->lastname}}</span></a>

                                <a class="arroba" href="../user/{{$user->username}}">
                                <span class="arroba texto-suave"> {{'@'.$user->username}}</span></a>

                                @if ($user->hasRole('admin'))
                                    <i class="uil uil-check selo selo-admin"></i>
                                @elseif ($user->hasRole('prof'))
                                    <i class="uil uil-check selo selo-prof"></i>
                                @endif
                            </h3>
                            <small class="texto-suave">Entrou em {{$data}}</small>
                            <div class="seguir">
                                <!-- O usuário autenticado ao gerar uma procura de usuários, esta variável servirá para checar se cada usuário desta lista já está sendo seguido ou não pelo usuário que está logado
                                
                                Se sim, vai trocar o botão e mudar a variável $ja_segue para true
                                -->
                                @php
                                    $ja_segue = false
                                @endphp

                                @foreach ($followers as $follower)
                                    @if($follower->user_id == $user->id)
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
                                <input type="text" class="follower" value="{{$user->id}}" style="display: none;">
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
@endif