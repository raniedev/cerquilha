<div>
    <div class="panel panel-default">
        <div class="panel-body">
            <!-- campo para um post de até 1000 caracteres agrupado à um botão de envio -->
            <form id="form_postagem" method="POST" class="input-group create-post" action="{{ route('videos.comment') }}">
                @csrf
                <!-- criando um name para uso na função serialize -->
                <textarea id="texto_postagem" name="post" class="form-control" placeholder="Escreva um comentário..." maxlength="1100" cols="30" rows="8"></textarea>
                <input class="id-pai" type="text" name="id_video" value="{{$video->id}}">
                <span class="input-group-btn">
                    <button disabled class="btn btn-primary" type="submit" id="btn_postagem">Comentar</button>
                </span>
            </form>
        </div>
    </div>
</div>