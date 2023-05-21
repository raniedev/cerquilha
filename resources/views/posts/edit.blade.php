@auth
    @include('template-top')

        <!-- Mensagem de sucesso ao editar -->
        <!-- @if(session('sucesso-editar'))
            <span class="msg-feedback msg-sucesso"><i class="uil uil-check"></i>{{session('sucesso-editar')}}</span>
        @endif -->
        @if($post != NULL)
            @php
                $data = $post->created_at
            @endphp
        @endif
        <!-- PARTE CENTRO -->
        <div class="centro">
            <div class="pagina">
                @if($post != NULL)
                    <h2>
                        <a href="{{ url('/posts/' . $post->id) }}">
                            <i class="uil uil-arrow-circle-left"></i>Voltar
                        </a>
                    </h2>

                    @if(auth()->user()->id == $post->user_id)
                        <div class="pagina-cabecalho">
                            <h3 class="pagina-subtitulo">
                                <i class="uil uil-edit"></i>Editar
                            </h3>
                            <h5>Postado em {{$data->formatLocalized('%d/%m/%Y - %H:%M:%S')}}</h5>
                        </div>
                        <div class="pagina-conteudo">
                            <!-- o atributo action aponta para a rota que está direcionada ao método store do controlador -->

                            <form id="form_postagem" method="POST" class="input-group create-post" action="{{ route('posts.update', $post->id) }}">
                                @csrf
                                <!-- o método de atualização é o PUT -->
                                @method('PUT')
                                <!-- criando um name para uso na função serialize -->
                                <textarea id="texto_postagem" name="post" class="form-control" placeholder="Edite sua postagem..." maxlength="1100" cols="30" rows="8" name="description">{{ old('description', $post->post) }}</textarea>
                                <span class="input-group-btn">
                                    <button disabled class="btn btn-primary" type="submit" id="btn_postagem">Editar</button>
                                </span>
                            </form>
                            @include('partials.emojis')

                            <!-- note que os botões estão fora dos forms. O atributo form indica qual form o botão pertence -->
                            <div style="display: flex; align-items: center; justify-content: center;">
                                <button class="botao bt-excluir bt-direita" form="delete-form" type="submit" value="Excluir" onclick="return confirm('Tem certeza que deseja excluir este post?')">
                                    <i class="uil uil-trash-alt"></i>Excluir
                                </button>
                            </div>

                            <!-- form para exclusão -->
                            <form method="POST" class="form" id="delete-form" action="{{ route('posts.destroy', $post->id) }}">
                                @csrf
                                <!-- o método HTTP para exclusão deve ser o DELETE -->
                                @method('DELETE')
                            </form>
                        </div>
                    @else
                        <div class="msg-alerta msg-caixa">
                            <i class="uil uil-exclamation-triangle"></i>
                            Você não tem permissão para editar esta postagem.
                        </div>
                    @endif
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