<?php
// Receber o nome da parte final que o usuário se encontrar, para marcar no menu qual será o ativo
// Pega a URL da página atual
$url_atual = $_SERVER['REQUEST_URI'];
// Pega a última parte da URL
$nome_arquivo = basename($url_atual);
// Variável para procurar em que posição se encontra o ínicio do .php
$texto_procurado = ".php";
// Posição capturada
$posicao = strpos($nome_arquivo, $texto_procurado);
// Irá remover o restante desnecessário
$pagina = substr($nome_arquivo, 0, $posicao);
?>

@php
    $nome = ucwords(auth()->user()->name);
    $sobrenome = ucwords(auth()->user()->lastname);
    $usuario = '@'.auth()->user()->username;
    $avatar = auth()->user()->avatar;
@endphp

<form action="{{ route('search.posts') }}" method="GET">
    <div class="barra-pesquisa pesquisa-mobile">
        <button class="btn-search-posts"><i class="uil uil-search"></i></button>
        @if(isset($termPosts))
            <input type="search" name="query" value="{{$termPosts}}"placeholder="Buscar em postagens...">
        @else
            <input type="search" name="query" placeholder="Buscar em postagens...">
        @endif
    </div>
</form>

<div class="container">

<!-- PARTE ESQUERDA -->
<aside>
    <div class="sidebar">
        
        @hasrole('admin')
            @if($routeName == 'admin.index')
                <a href="/admin" class="menu-item ativo">
            @else
                <a href="/admin" class="menu-item">
            @endif
                <span><i class="uil uil-user"></i></span>
                <h3>Admin</h3>
            </a>
        @endhasrole

        @if($routeName == 'home')
            <a href="/home" class="menu-item ativo">
        @else                
            <a href="/home" class="menu-item">
        @endif
            <span><i class="uil uil-home"></i></span>
            <h3>Principal</h3>
        </a>

        @if($routeName == 'posts.index' || 
            $routeName == 'posts.show' || 
            $routeName == 'posts.edit')
            <a href="/posts" class="menu-item ativo">
        @else
            <a href="/posts" class="menu-item">
        @endif
            <span><i class="uil uil-pen"></i></span>
            <h3>Postagens</h3>
        </a>

        @if($routeName == 'videos.index' || 
            $routeName == 'videos.show' || 
            $routeName == 'videos.create' ||
            $routeName == 'videos.edit')
            <a href="/videos" class="menu-item ativo">
        @else
            <a href="/videos" class="menu-item">
        @endif
            <span><i class="uil uil-video"></i></span>
            <h3>Vídeos</h3>
        </a>

        @if($routeName == 'search.index' ||
            $routeName == 'search.posts' ||
            $routeName == 'search.users')
            <a href="/search/" class="menu-item ativo">
        @else
            <a href="/search/" class="menu-item">
        @endif
            <span><i class="uil uil-search"></i></span>
            <h3>Procurar</h3>
        </a>

        <a id="tema" class="menu-item">
            <span><i class="uil uil-palette"></i></span>
            <h3>Tema</h3>
        </a>
            @if($routeName == 'configs.index' || 
                $routeName == 'configs.show' || 
                $routeName == 'configs.edit')
                <a href="/configs" class="menu-item ativo">
            @else
                <a href="/configs" class="menu-item">
            @endif
            <span><i class="uil uil-setting"></i></span>
            <h3>Configuração</h3>
        </a>

        <!-- Link para encerrar a sessão -->
        <form method="POST" action="{{ route('logout') }}"
        onclick="event.preventDefault(); this.closest('form').submit();">
            @csrf
                <!-- <a href="/logout" class="menu-item ativo"> -->
                <a href="/logout" class="menu-item">
        </form>
            <span><i class="uil uil-sign-out-alt"></i></span>
            <h3>Sair</h3>
        </a>
    </div>
</aside>