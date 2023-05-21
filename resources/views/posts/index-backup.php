{{-- herda a view 'base' --}}
@extends('posts.base')
{{-- cria a seção content, definida na base, para injetar o código --}}
@section('content')
    <h2>Postagens</h2>
    {{-- se a variável $posts não existir, mostra um h3 com uma mensagem --}}
    @if (!isset($posts))
        <h3 style="color: red">Nenhum Registro Encontrado!</h3>
        {{-- senão, monta a tabela com o dados --}}
    @else
        <table class="data-table">
            <thead>
                <tr>
                    <th>Postagem</th>
                    <th colspan="2">Opções</th>
                </tr>
            </thead>
            <tbody>
                {{-- itera sobre a coleção de posts --}}
                @foreach ($posts as $p)
                    <tr>
                        <td> {{ $p->post }} </td>
                        {{-- vai para a rota show, passando o id como parâmetro --}}
                        <td> <a href="{{ route('posts.show', $p->id) }}">Exibir</a> </td>
                        <td> <a href="{{ route('posts.edit', $p->id) }}">Editar</a> </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    {{-- mostra a qtde de posts cadastrados. --}}
                    <td colspan="5">Postagens: {{ $posts->count() }}</td>
                </tr>
            </tfoot>
        </table>
    @endif
    @if(isset($msg))
        <script>
            alert("{{$msg}}");
        </script>
    @endif
@endsection