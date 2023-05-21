@auth
    @include('template-top')
        <!-- PARTE CENTRO -->
        <div class="centro">
            <div class="pagina">
                @if(session()->has('sucesso-excluir-video'))
                    <div class="msg-sucesso msg-caixa">
                        <h3><span><i class="uil uil-check"></i></span>Feito</h3>
                        {{ session()->get('sucesso-excluir-video') }}
                    </div>
                @endif

                <h2>Vídeos</h2>

                @can('enviar_videos')
                <div class="novo">
                    <a href="/videos/create"><i class="uil uil-plus"></i>Novo Vídeo</a>
                </div>
                @endcan

                <div id="vid-interno">
                    <h3 class="pagina-subtitulo">
                        <span><i class="uil uil-video"></i></span>Subtítulo
                    </h3>
                    <video id="video-interno" controls>
                        <!-- /vids/example.mp4 -->
                        <source id="video-mp4" src="" type="video/mp4">
                        Seu navegador não suporta a tag vídeo.
                    </video>
                    <p id="video-descricao">Descrição</p>
                </div>
            
                <div id="vid-youtube" class="pagina-cabecalho" style="display: none;">
                    <h3 class="pagina-subtitulo">
                        <span><i class="uil uil-video"></i></span>Subtítulo
                    </h3>
                    <!-- Contêiner de vídeo oculto -->
                    <div class="video-container">
                        <iframe id="video-youtube" src="" frameborder="0" allowfullscreen></iframe>
                    </div>
                    <p id="video-descricao">Descrição</p>
                </div>

                <div class="pagina-cabecalho">
                    <h3 class="pagina-subtitulo">
                        <span><i class="uil uil-video"></i></span>Filtrar por Matéria
                    </h3>
                </div>

                <div class="pagina-conteudo">
                    <form id="filtrar-materia" method="GET">
                        <select name="materia">
                            @if (isset($materia) || $materia == null)
                                <option></option>
                                <option value="Português" <?php echo $materia == 'Português' ? 'selected' : ''; ?>>📚 Português</option>
                                <option value="Inglês" <?php echo $materia == 'Inglês' ? 'selected' : ''; ?>>🗽 Inglês</option>
                                <option value="Espanhol" <?php echo $materia == 'Espanhol' ? 'selected' : ''; ?>>💃 Espanhol</option>
                                <option value="Matemática" <?php echo $materia == 'Matemática' ? 'selected' : ''; ?>>🧮 Matemática</option>
                                <option value="Geometria" <?php echo $materia == 'Geometria' ? 'selected' : ''; ?>>📐 Geometria</option>
                                <option value="Física" <?php echo $materia == 'Física' ? 'selected' : ''; ?>>🍎 Física</option>
                                <option value="Química" <?php echo $materia == 'Química' ? 'selected' : ''; ?>>⚗️ Química</option>
                                <option value="Biologia" <?php echo $materia == 'Biologia' ? 'selected' : ''; ?>>🧬 Biologia</option>
                                <option value="História" <?php echo $materia == 'História' ? 'selected' : ''; ?>>🏺 História</option>
                                <option value="Geografia" <?php echo $materia == 'Geografia' ? 'selected' : ''; ?>>🗺️ Geografia</option>
                                <option value="Música" <?php echo $materia == 'Música' ? 'selected' : ''; ?>>🎵 Música</option>
                                <option value="Filosofia" <?php echo $materia == 'Filosofia' ? 'selected' : ''; ?>>🧠 Filosofia</option>
                                <option value="Sociologia" <?php echo $materia == 'Sociologia' ? 'selected' : ''; ?>>👫 Sociologia</option>
                                <option value="Informática" <?php echo $materia == 'Informática' ? 'selected' : ''; ?>>💻 Informática</option>
                                <option value="Artes" <?php echo $materia == 'Artes' ? 'selected' : ''; ?>>🎨 Artes</option>
                            @endif
                        </select>
                    </form>
                </div>

                <script>
                    const selectElement = document.querySelector('select[name="materia"]');
                    const formSubmit = document.querySelector('#filtrar-materia');

                    selectElement.addEventListener('change', function() {
                        // var valorSelecionado = this.value;
                        // if (valorSelecionado === '') {
                        //     alert('Selecione uma matéria');
                        //     return false; // Impede o envio do formulário
                        // } else {
                            formSubmit.submit();
                        // }
                    });
                </script>

                <div class="lista-videos pagina-cabecalho">
                    <h3 class="pagina-subtitulo">
                        <span><i class="uil uil-video"></i></span>Últimos Vídeos
                    </h3>
                </div>

                @if($videos->count() > 0)
                    <div class="pagina-conteudo">
                        @foreach ($videos->sortByDesc('id') as $vid)
                            <div class="resultado-video">
                            @if($vid->internal)
                                <!-- <div>
                                    <button id="btn1" class="btn-trocar-video" data-src="{{$vid->video}}"><i class="uil uil-play"></i>{{$vid->title}}</button>
                                </div> -->

                                <p><a class="underline video-link assistir" href="/videos/{{$vid->id}}"><i class="uil uil-play"></i>{{$vid->title}}</a></p>
                            @else
                                @php
                                    // Calcula o tamanho do link
                                    $tam_link = strlen($vid->video);

                                    // Substring a ser pesquisada 
                                    $procurar = 'watch?v=';

                                    // Recupera a posição inicial do watch?v= 
                                    $index = strpos($vid->video, $procurar);

                                    // Recupera o tamanho do $procurar para fazer o cálculo 
                                    $tam_procurar = strlen($procurar);

                                    /* 
                                    Recupera o código do vídeo do youtube:
                                        1- Link completo.
                                        2- Somar o ínicio de onde achou a substring passada + o tamanho da substring.
                                        3- Calcular o tamanho da string e subtrair pelo início a string, para saber o tamanho final do código. (talvez possa ser ocultado)
                                    */

                                    $codigo = substr($vid->video, $index + $tam_procurar, $tam_link - $index)
                                @endphp
                                <!-- <p><a class="underline video-link assistir" href="https://www.youtube.com/embed/{{$codigo}}"><i class="uil uil-play"></i>{{$vid->title}}</a></p> -->

                                <p><a class="underline video-link assistir" href="/videos/{{$vid->id}}"><i class="uil uil-play"></i>{{$vid->title}}</a></p>
                            @endif

                            @php
                                $data_criacao = $vid->created_at;
                                $data = $data_criacao->formatLocalized('%d/%m/%Y');
                                $hora = $data_criacao->formatLocalized('%H:%M:%S');
                            @endphp
                                <small>
                                    @switch($vid->discipline)
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
                                     - Classe {{$vid->class}}
                                </small>
                                <p class="video-descricao">{!! nl2br(htmlspecialchars($vid->description)) !!}</p>
                                <small>Enviado por <a href="/user/{{$users->find($vid->user_id)->username}}">{{'@'.$users->find($vid->user_id)->username}}</a> em {{$data}} - {{$hora}}</small>

                                @can('interagir_videos')
                                <div class="interagir-postagem" style="display: flex; gap: 2rem; font-size: 1.2rem; padding: 1rem 0 0 0;">
                                    <a href="/videos/{{$vid->id}}">
                                        <div class="comentar">
                                            <span descricao="Comentar">
                                                <i class="uil uil-comment-dots"></i>
                                                <small>{{$questions->where('video_id', $vid->id)->count()}}</small>
                                            </span>
                                        </div>
                                    </a>
                                    
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
                                    @if((auth()->user()->id == $vid->user_id) || auth()->user()->hasRole('admin'))
                                        @if(auth()->user()->id == $vid->user_id)
                                        <a href="/videos/{{$vid->id}}/edit">
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
                                            <button class="botao bt-excluir bt-direita" form="delete-video-{{$vid->id}}" type="submit" value="Excluir" onclick="return confirm('Tem certeza que deseja excluir o vídeo \'{{$vid->title}}\'?')">
                                                <i class="uil uil-trash-alt"></i>Excluir
                                            </button>
                                        </div>
                                        
                                        <!-- form para exclusão -->
                                        <form method="POST" style="display: none" class="form" id="delete-video-{{$vid->id}}" action="{{ route('videos.destroy', $vid->id) }}">
                                            @csrf
                                            <!-- o método HTTP para exclusão deve ser o DELETE -->
                                            @method('DELETE')
                                        </form>
                                    @endif
                                </div>
                                @endcan
                            </div>
                        @endforeach
                    </div>
                @endif

                <style>
                    .container-x {
                        width: 100%;
                        margin: 1rem 0 0 0;
                    }

                    h1 {
                        width: 100%;
                        margin: 0;
                    }

                    .data-hora,
                    .matematica {
                        width: 50%;
                        float: left;
                    }
                </style>
                @if($videos->count() > 25)
                    <a class="mostrar-mais" href="#">Mostrar Mais</a>
                @endif
            </div>
        </div>
    @include('template-bot')
@endauth

@include('partials.guest')