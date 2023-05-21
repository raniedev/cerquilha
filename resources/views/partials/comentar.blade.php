<!-- painel central (onde fica timeline) -->
<div>
    <div class="panel panel-default">
        <div class="panel-body">
            <!-- campo para um post de até 1000 caracteres agrupado à um botão de envio -->
            <form id="form_postagem" method="POST" class="input-group create-post" action="{{ route('posts.store') }}">
                @csrf
                <!-- criando um name para uso na função serialize -->
                <textarea id="texto_postagem" name="post" class="form-control" placeholder="Escreva um comentário..." maxlength="1100" cols="30" rows="8"></textarea>
                <input class="id-pai" type="text" name="id_parent" value="{{$post->id}}">
                <span class="input-group-btn">
                    <button disabled class="btn btn-primary" type="submit" id="btn_postagem">Comentar</button>
                </span>
            </form>

            <!-- Mensagem de confirmação avisando que a mensagem foi postada com sucesso -->
            <span id="msg_postagem"></span>
        </div>
    </div>

    <!-- div que conterá a linha do tempo com postangens do usuário atual e quem ele segue -->
    <!-- <div id="postagens">
    </div> -->
</div>