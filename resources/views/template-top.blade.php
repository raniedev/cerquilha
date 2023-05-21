@include('partials.nav')

        <main>
        <!-- Se não tiver autenticado vai para a tela de login -->
        @if (!auth()->check())
            {{ redirect('/') }}
        @endif

            <!-- PARTE ESQUERDA -->
            @include('partials.esquerda')