@php
    $id_usuario = $siteStyle->find(auth()->user()->id)->user_id;
    $cor_principal = $siteStyle->find(auth()->user()->id)->main_color;
    $tema = $siteStyle->find(auth()->user()->id)->theme;
    $tam_fonte = $siteStyle->find(auth()->user()->id)->font_size;
@endphp

<?php
// Variáveis
$tamanho_fonte = array(12, 14, 16, 18, 20);
$nome_cor = array('agua', 'bosque', 'trovao', 'fogo', 'neve');
$icone_tema = array('tear', 'trees', 'bolt-alt', 'fire', 'snowflake');
$nome_background = array('diurno', 'vespertino', 'noturno');
$icone_background = array('sun', 'sunset', 'moon');

// Switch case para verificar qual cor é a armazenada, e passar para as variáveis o HSL correspondente e as variáveis para mudar o logo SVG

switch($cor_principal) {
    case 'agua':
        $principal_h = 213;
        $principal_s = 100;
        $principal_l = 50;
        $invert = 37;
        $sepia = 53;
        $saturate = 6048;
        $hue_rotate = 202;
        $brightness = 99;
        $contrast = 113;
        break;
    case 'bosque':
        $principal_h = 168;
        $principal_s = 76;
        $principal_l = 42;
        $invert = 55;
        $sepia = 67;
        $saturate = 478;
        $hue_rotate = 118;
        $brightness = 96;
        $contrast = 95;
        break;
    case 'trovao':
        $principal_h = 48;
        $principal_s = 89;
        $principal_l = 50;
        $invert = 75;
        $sepia = 83;
        $saturate = 520;
        $hue_rotate = 353;
        $brightness = 97;
        $contrast = 94;
        break;
    case 'fogo':
        $principal_h = 6;
        $principal_s = 73;
        $principal_l = 57;
        $invert = 58;
        $sepia = 53;
        $saturate = 5856;
        $hue_rotate = 334;
        $brightness = 90;
        $contrast = 102;
        break;
    case 'neve':
        $principal_h = 283;
        $principal_s = 39;
        $principal_l = 53;
        $invert = 44;
        $sepia = 14;
        $saturate = 2110;
        $hue_rotate = 238;
        $brightness = 92;
        $contrast = 91;
        break;
    default:
        echo "Cor não encontrada";
        break;
}

// Switch case para verificar qual tema é o armazenado, e passar para a variável
switch($tema) {
    case 'diurno':
        $dark_color = 17;
        $white_color = 100;
        $light_color = 95;
        break;
    case 'vespertino':
        $dark_color = 95;
        $white_color = 20;
        $light_color = 15;
        break;
    case 'noturno':
        $dark_color = 95;
        $white_color = 10;
        $light_color = 0;
        break;
    default:
        echo "Tema não encontrado";
        break;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">


        @php
            $username = '@'.auth()->user()->username;
        @endphp
        
        <!-- Título dinâmico baseado no nome da rota que estou -->
        <title>
            
            @switch($routeName)
                @case('admin.index')
                    Painel do Administrador
                    @break
                @case('videos.index')
                    Vídeos
                    @break
                @case('videos.show')
                    {{$video->title}}
                    @break
                @case('videos.edit')
                    Editar Vídeo
                    @break
                @case('videos.create')
                    Criar Vídeo
                    @break
                @case('posts.index')
                    Todas Postagens
                    @break
                @case('posts.show')
                    @if($user)
                        {{ucwords($users->find($post['user_id'])->name)}} {{ucwords($users->find($post['user_id'])->lastname)}} postou: "{{$post->post}}"
                    @else
                        Postagem Inexistente
                    @endif
                    @break
                @case('posts.edit')
                    Editar Postagem
                    @break
                @case('search.index')
                    O que deseja procurar?
                    @break
                @case('search.posts')
                    Procurar Postagem
                    @break
                @case('search.users')
                    Procurar Usuário
                    @break
                @case('search.videos')
                    Procurar Vídeos
                    @break
                @case('user.show')
                    Perfil {{'@'.$user->username}}
                    @break
                @case('home')
                    Principal
                    @break
                @case('configs.index')
                    Configuração
                    @break
                @default
                    Título
            @endswitch
            - {{ env('APP_NAME') }}
        </title>

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <script src="{{ asset('js/3.6.3-jquery.min.js') }}"></script>
        <!-- <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script> -->
        <style>
            :root {
                /* Cor para o logo .svg que será passado para o atributo filter */
                --cor-logo: invert(<?php echo $invert.'%'?>) sepia(<?php echo $sepia.'%'?>) saturate(<?php echo $saturate.'%'?>) hue-rotate(<?php echo $hue_rotate.'deg'?>) brightness(<?php echo $brightness.'%'?>) contrast(<?php echo $contrast.'%'?>);

                /* Cor principal do site que sofrerá variações de mudanças para outras cores */
                --cor-principal-hue: <?php echo $principal_h?>; /* Quantidade de matiz do formato HSL */
                --cor-principal-saturation: <?php echo $principal_s.'%'?>; /* Quantidade de saturação do formato HSL */
                --cor-principal-lightness: <?php echo $principal_l.'%'?>; /* Quantidade de luminosidade do formato HSL */
                --cor-principal: hsl(var(--cor-principal-hue), var(--cor-principal-saturation), var(--cor-principal-lightness));

                /* Variação de luminosidade */
                --dark-color-lightness: <?php echo $dark_color.'%'?>;
                --light-color-lightness: <?php echo $light_color.'%'?>;
                --white-color-lightness: <?php echo $white_color.'%'?>;

                /* Padronização do tamanho da fonte */
                --tamanho-fonte: <?php echo $tam_fonte.'px';?>
            }

            <?php
            if($tema == 'vespertino' || $tema == 'noturno' ) {
            ?>
                input.caixa-data::-webkit-calendar-picker-indicator {
                    filter: invert(100%);
                }
            <?php
            }?>
        </style>
    </head>

    <body>
        <nav>        
            <div class="container">

                <div class="menu-mobile">
                    <button id="menu-btn">
                        <span><i class="uil uil-bars"></i></span>
                    </button>
                    <button id="close-btn">
                        <span><i class="uil uil-times"></i></span>
                    </button>
                </div>

                <!-- Área correspondente ao logo -->
                <div class="logo">
                    <a href="{{'/home'}}">
                        <img src="{{asset('images/logo-64.svg')}}" class="colorir" id="cor-logo">
                        <h2>CERQUILHA</h2>
                    </a>
                </div>

                <!-- Área para pesquisar postagens no site -->
                <div class="barra-pesquisa">
                    <form action="{{ route('search.posts') }}" method="GET">
                        <button class="btn-search-posts"><i class="uil uil-search"></i></button>
                        @if(isset($termPosts))
                            <input type="search" name="query" value="{{$termPosts}}"placeholder="Buscar em postagens...">
                        @else
                            <input type="search" name="query" placeholder="Buscar em postagens...">
                        @endif
                    </form>
                </div>

                <!-- Área do usuário para ver a conta logada e fazer logout -->
                <div class="usuario-atual">
                    <div class="info">
                        <p><small>Olá,</small> <b>{{ ucwords(auth()->user()->name) }}</b></p>
                        <small class="texto-suave">
                            @hasrole('admin')
                                Admin
                            @endhasrole

                            @hasrole('prof')
                                Prof
                            @endhasrole

                            @hasrole('aluno')
                                @if (auth()->user()->gender == 'F')
                                    Aluna
                                @else
                                    Aluno
                                @endif
                            @endhasrole

                            @hasrole('bloqueado')
                                Bloqueado
                            @endhasrole
                        </small>
                    </div>
                    <div class="foto-usuario">
                        <a href="../user/{{auth()->user()->username}}">
                            <img src="{{ asset(auth()->user()->avatar) }}">
                        </a>
                    </div>
                </div>
            </div>
        </nav>