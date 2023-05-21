@auth
    @include('template-top')
        <!-- PARTE CENTRO -->
        <div class="centro">
            <div class="pagina">
                @isset($video)
                    @if(auth()->user()->id == $video->user_id)
                        @if(session()->has('sucesso-editar-video'))
                            <div class="msg-sucesso msg-caixa">
                                <h3><span><i class="uil uil-check"></i></span>Feito</h3>
                                {{ session()->get('sucesso-editar-video') }}
                            </div>
                        @endif
                        <h2>Editar Vídeo</h2>
                        <div class="pagina-cabecalho">
                            <h3 class="pagina-subtitulo">
                                <i class="uil uil-{{ $video->internal ? 'video' : 'youtube'}}"></i>Editar Vídeo {{ $video->internal ? 'Interno' : 'Youtube' }}
                            </h3>
                        </div>

                        <div class="pagina-conteudo">
                            <form id="criar-vid" method="POST" enctype="multipart/form-data" action="{{ route('videos.update', $video->id) }}">
                                @csrf
                                <!-- o método de atualização é o PUT -->
                                @method('PUT')
                                <label for="vid-titulo">Título:</label>
                                <input type="text" id="vid-titulo" name="titulo" value="{{$video->title}}">
                                
                                <label for="vid-descricao">Descrição:</label><br>
                                <textarea id="vid-descricao" class="txtarea" maxlength="1000" name="descricao" rows="10" value="{{$video->description}}">{{ old('descricao', $video->description) }}</textarea>

                                <label>Classe:</label><br>
                                <select name="turma">
                                    <option value="501" <?php echo $video->class == '501' ? 'selected' : ''?>>501</option>
                                    <option value="502" <?php echo $video->class == '502' ? 'selected' : ''?>>502</option>
                                    <option value="601" <?php echo $video->class == '601' ? 'selected' : ''?>>601</option>
                                    <option value="602" <?php echo $video->class == '602' ? 'selected' : ''?>>602</option>
                                    <option value="701" <?php echo $video->class == '701' ? 'selected' : ''?>>701</option>
                                    <option value="702" <?php echo $video->class == '702' ? 'selected' : ''?>>702</option>
                                    <option value="801" <?php echo $video->class == '801' ? 'selected' : ''?>>801</option>
                                    <option value="802" <?php echo $video->class == '802' ? 'selected' : ''?>>802</option>
                                    <option value="901" <?php echo $video->class == '901' ? 'selected' : ''?>>901</option>
                                    <option value="902" <?php echo $video->class == '902' ? 'selected' : ''?>>902</option>
                                    <option value="1001" <?php echo $video->class == '1001' ? 'selected' : ''?>>1001</option>
                                    <option value="1002" <?php echo $video->class == '1002' ? 'selected' : ''?>>1002</option>
                                    <option value="2001" <?php echo $video->class == '2001' ? 'selected' : ''?>>2001</option>
                                    <option value="2002" <?php echo $video->class == '2002' ? 'selected' : ''?>>2002</option>
                                    <option value="3001" <?php echo $video->class == '3001' ? 'selected' : ''?>>3001</option>
                                    <option value="3002" <?php echo $video->class == '3002' ? 'selected' : ''?>>3002</option>
                                </select>

                                <label>Matéria:</label><br>
                                <select name="materia">
                                    <option value="Português" <?php echo $video->discipline == 'Português' ? 'selected' : ''?>>📚 Português</option>
                                    <option value="Inglês" <?php echo $video->discipline == 'Inglês' ? 'selected' : ''?>>🗽 Inglês</option>
                                    <option value="Espanhol" <?php echo $video->discipline == 'Espanhol' ? 'selected' : ''?>>💃 Espanhol</option>
                                    <option value="Matemática" <?php echo $video->discipline == 'Matemática' ? 'selected' : ''?>>🧮 Matemática</option>
                                    <option value="Geometria" <?php echo $video->discipline == 'Geometria' ? 'selected' : ''?>>📐 Geometria</option>
                                    <option value="Física" <?php echo $video->discipline == 'Física' ? 'selected' : ''?>>🍎 Física</option>
                                    <option value="Química" <?php echo $video->discipline == 'Química' ? 'selected' : ''?>>⚗️ Química</option>
                                    <option value="Biologia" <?php echo $video->discipline == 'Biologia' ? 'selected' : ''?>>🧬 Biologia</option>
                                    <option value="História" <?php echo $video->discipline == 'História' ? 'selected' : ''?>>🏺 História</option>
                                    <option value="Geografia" <?php echo $video->discipline == 'Geografia' ? 'selected' : ''?>>🗺️ Geografia</option>
                                    <option value="Música" <?php echo $video->discipline == 'Música' ? 'selected' : ''?>>🎵 Música</option>
                                    <option value="Filosofia" <?php echo $video->discipline == 'Filosofia' ? 'selected' : ''?>>🧠 Filosofia</option>
                                    <option value="Sociologia" <?php echo $video->discipline == 'Sociologia' ? 'selected' : ''?>>👫 Sociologia</option>
                                    <option value="Informática" <?php echo $video->discipline == 'Informática' ? 'selected' : ''?>>💻 Informática</option>
                                    <option value="Artes" <?php echo $video->discipline == 'Artes' ? 'selected' : ''?>>🎨 Artes</option>
                                </select>

                                @if(!$video->internal)
                                    <label for="vid-titulo">Url:</label>
                                    <input type="text" id="vid-titulo" name="link" value="{{$video->video}}">
                                @endif
                                
                                <div class="centralizar">
                                    <input type="submit" class="btn btn-border" value="Editar Vídeo">
                                </div>
                            </form>
                        </div>
                    @else
                        <p>Você não tem permissão para editar este vídeo.</p>
                    @endif
                @else
                    <h2>
                        <a href="{{ url('/videos/') }}">
                            <i class="uil uil-arrow-circle-left"></i>Voltar
                        </a>
                    </h2>
                    <p>Esta vídeo não existe!</p>
                @endisset
            </div>
        </div>
    @include('template-bot')
@endauth

@include('partials.guest')