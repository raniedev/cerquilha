@php
    use Carbon\Carbon;
@endphp

@auth
@include('template-top')
    @php
        $id = auth()->user()->id;
        $nome = ucwords(auth()->user()->name);
        $sobrenome = ucwords(auth()->user()->lastname);
        $usuario = auth()->user()->username;
        $email = auth()->user()->email;
        $avatar = auth()->user()->avatar;
        $genero = auth()->user()->gender;
        $data_aniversario = auth()->user()->birthday;

        if($data_aniversario == null) {
            $data = null;
        } else {
            $data_nasc = Carbon::parse(auth()->user()->birthday);
            $data = $data_nasc->format('Y-m-d');
        }
    @endphp
    <!-- PARTE CENTRO -->
    <div class="centro">
        <div class="pagina">

            <!-- Tratamento de Erros -->
            @if ($errors->any())
                <div class="msg-erro msg-caixa">
                    <h3><span><i class="uil uil-exclamation-triangle"></i></span>Erro</h3>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>- {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session()->has('sucesso-imagem'))
                <div class="msg-sucesso msg-caixa">
                    <h3><span><i class="uil uil-check"></i></span>Feito</h3>
                    {{ session()->get('sucesso-imagem') }}
                </div>
            @endif

            @if(session()->has('sucesso-dados'))
                <div class="msg-sucesso msg-caixa">
                    <h3><span><i class="uil uil-check"></i></span>Feito</h3>
                    {{ session()->get('sucesso-dados') }}
                </div>
            @endif

            @if(session()->has('sucesso-senha'))
                <div class="msg-sucesso msg-caixa">
                    <h3><span><i class="uil uil-check"></i></span>Feito</h3>
                    {{ session()->get('sucesso-senha') }}
                </div>
            @endif

            <h2>Configuração</h2>
            <div class="pagina-cabecalho">
                <h3 class="pagina-subtitulo">
                    <span><i class="uil uil-camera"></i></span>Mudar Imagem
                </h3>
                <h4>A imagem precisa ser na extensão .jpg, .jpeg ou .png e não pode ser maior que 2MB.</h4>
            </div>

            <div class="pagina-conteudo">
                <div class="centralizar">
                    <div class="foto-profile">
                        <img src="{{asset($avatar)}}">
                    </div>
                </div>
                @if(!auth()->user()->hasRole('bloqueado'))
                <form action="{{ route('configs.update', $id) }}" method="POST" enctype="multipart/form-data" id="mudar-foto">
                @csrf
                <!-- o método de atualização é o PUT -->
                @method('PUT')
                    <div class="centralizar">
                        <input type="submit" class="btn btn-border" name="trocar-foto" value="Trocar Foto">
                    </div>
                    <label for="imagem">Escolha uma imagem:<br></label>
                    <input type="file" name="imagem" id="imagem"><br>
                </form>
                @else
                    <p class="msg-erro"><i class="uil uil-exclamation-triangle"></i> Você está impossibilitado de mudar as configurações.</p>
                @endif
            </div>
        @if(!auth()->user()->hasRole('bloqueado'))
            <div class="pagina-cabecalho">
                <h3 class="pagina-subtitulo">
                    <span><i class="uil uil-user"></i></span>Dados Pessoais
                </h3>
            </div>
            <div class="pagina-conteudo">
                <form action="{{ route('configs.update', $id) }}" method="POST" id="mudar-dados">
                    @csrf
                    <!-- o método de atualização é o PUT -->
                    @method('PUT')
                    <label for="caixa-nome"><strong>Nome:</strong></label><br>
                    <input type="text" id="caixa-nome" name="nome" value="{{$nome}}" required>

                    <label for="caixa-sobrenome"><strong>Sobrenome:</strong></label><br>
                    <input type="text" id="caixa-sobrenome" name="sobrenome" value="{{$sobrenome}}" required>

                    <label for="caixa-usuario"><strong>Usuário:</strong></label><br>
                    <input type="text" id="caixa-usuario" name="usuario" value="{{$usuario}}" required>

                    <label><strong>Email:</strong></label><br>
                    <input type="email" value="{{$email}}" disabled>

                    <div id="datapicker">
                        <label for="caixa-data"><strong>Data de Nascimento:</strong></label><br>
                        <input type="date" class="caixa-data" id="caixa-data" name="data" value="{{$data}}">
                    </div>
                    
                    <label for="caixa-genero"><strong>Gênero:</strong></label><br>
                    <select id="caixa-genero" name="genero" form="mudar-dados">
                        <option value=""
                            <?php echo $genero == '' ? 'selected' : ''; ?>
                        ></option>

                        <option value="M" 
                            <?php echo $genero == 'M' ? 'selected' : ''; ?>
                        >Masculino</option>

                        <option value="F" 
                            <?php echo $genero == 'F' ? 'selected' : ''; ?>
                        >Feminino</option>
                    </select>
                    <div class="centralizar">
                        <input type="submit" name="trocar-dados" class="btn btn-border" value="Trocar Dados"></input>
                    </div>
                </form>
            </div>
            @if (auth()->user()->google_id == null)
                <div class="pagina-cabecalho">
                    <h3 class="pagina-subtitulo">
                        <span><i class="uil uil-key-skeleton"></i></span> Trocar Senha
                    </h3>
                    <h4>A senha precisa ser composta de pelo menos uma letra maiúscula, uma letra minúscula, um número e no mínimo 8 caracteres.</h4>
                </div>

                <form action="{{ route('configs.update', $id) }}" method="POST" id="mudar-senha">
                @csrf
                <!-- o método de atualização é o PUT -->
                @method('PUT')
                    <div class="caixa-texto caixa-senha">
                        <input type="password" id="senha-atual" name="senha_atual" placeholder="Senha Atual" required>
                        <span id="ver-senha-atual"><i class="icone-olho uil uil-eye"></i></span>
                    </div>
                    <div class="caixa-texto caixa-senha">
                        <input type="password" id="nova-senha" name="nova_senha" placeholder="Nova Senha" required>
                        <span id="ver-nova-senha"><i class="icone-olho uil uil-eye"></i></span>
                    </div>
                    <div class="caixa-texto caixa-senha">
                        <input type="password" id="repetir-nova-senha" name="nova_senha_confirmation" placeholder="Repetir Nova Senha" required>
                        <span id="ver-repetir-nova-senha"><i class="icone-olho uil uil-eye"></i></span>
                    </div>
                    <div class="centralizar">
                        <input type="submit" name="trocar-senha" class="btn btn-border" value="Trocar Senha"></input>
                    </div>
                </form>
            @endif
        @endif
        </div>
    </div>
@include('template-bot')

@endauth

@include('partials.guest')

<script>
    // Configurações
    const verSenhaAtual = document.querySelector('#ver-senha-atual i');
    const verNovaSenha = document.querySelector('#ver-nova-senha i');
    const verRepetirNovaSenha = document.querySelector('#ver-repetir-nova-senha i');
    const senhaAtual = document.querySelector('#senha-atual');
    const novaSenha = document.querySelector('#nova-senha');
    const repetirNovaSenha = document.querySelector('#repetir-nova-senha');
    
    // Configurações
    verSenhaAtual.addEventListener('click', () => {
        if(senhaAtual.type == "password") {
            senhaAtual.type = "text";
            verSenhaAtual.classList.remove("uil-eye");
            verSenhaAtual.classList.add("uil-eye-slash");
        } else {
            senhaAtual.type = "password";
            verSenhaAtual.classList.remove("uil-eye-slash");
            verSenhaAtual.classList.add("uil-eye");
        }
    });

    verNovaSenha.addEventListener('click', () => {
        if(novaSenha.type == "password") {
            novaSenha.type = "text";
            verNovaSenha.classList.remove("uil-eye");
            verNovaSenha.classList.add("uil-eye-slash");
        } else {
            novaSenha.type = "password";
            verNovaSenha.classList.remove("uil-eye-slash");
            verNovaSenha.classList.add("uil-eye");
        }
    });

    verRepetirNovaSenha.addEventListener('click', () => {
        if(repetirNovaSenha.type == "password") {
            repetirNovaSenha.type = "text";
            verRepetirNovaSenha.classList.remove("uil-eye");
            verRepetirNovaSenha.classList.add("uil-eye-slash");
        } else {
            repetirNovaSenha.type = "password";
            verRepetirNovaSenha.classList.remove("uil-eye-slash");
            verRepetirNovaSenha.classList.add("uil-eye");
        }
    });

    // Date, trocar a cor
    const dataPicker = document.querySelector('#datapicker input[type="date"]');
    const Bg_0 = document.querySelector('.bg-0');
    const Bg_1 = document.querySelector('.bg-1');
    const Bg_2 = document.querySelector('.bg-2');

    Bg_0.addEventListener('click', () => {
        // remove a classe caixa-data do input
        dataPicker.classList.remove('caixa-data');
    });

    Bg_1.addEventListener('click', () => {
        // adiciona a classe caixa-data ao input
        dataPicker.classList.add('caixa-data');
    });

    Bg_2.addEventListener('click', () => {
        // adiciona a classe caixa-data ao input
        dataPicker.classList.add('caixa-data');
    });    

</script>