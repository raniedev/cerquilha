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
?>

<!-- Customização do tema -->
<div class="customizar">
    <div class="card">
        <h2>Customização do site</h2>
        <p class="texto-suave">Tamanho da fonte, cor e tema.</p>

        <!-- Font Size -->
        <div class="font-size">
            <h4>Tamanho da fonte</h4>
            <div>
                <h6>Aa</h6>
                <div class="escolher-tamfonte">
                    <?php
                    /*  NOTAS: Laço de repetição para colocar:
                    **  01) as classes tam-fonte-0, tam-fonte-1 ... e assim por diante, para fazer o css funcionar
                    **  02) if/else para verificar e adicionar como classe qual está ativo
                    */
                    $loop = 0;
                    for($loop; $loop < count($tamanho_fonte); $loop++) {
                        if ($tamanho_fonte[$loop] == $tam_fonte) {
                            echo '<span class="tam-fonte-'.$loop.' ativo"></span>';
                        } else {
                            echo '<span class="tam-fonte-'.$loop.'"></span>';
                        }
                    }?>
                </div>
                <h3>Aa</h3>
            </div>
        </div>

        <!-- Cor principal -->
        <div class="color">
            <h4>Cor principal:</h4>
            <div class="escolher-cor">
            <?php              
            $loop = 0;
            // Switch case para receber qual é a cor atual e aplicar através de um laço de repetição for
            switch($cor_principal) {
                case $nome_cor[0]:
                    for($loop; $loop < count($icone_tema); $loop++) {
                        if($loop == 0) {
                            echo '<span class="cor-'.$loop.' ativo"><i class="uil uil-'.$icone_tema[$loop].'"></i></span>';
                        } else {
                            echo '<span class="cor-'.$loop.'"><i class="uil uil-'.$icone_tema[$loop].'"></i></span>';
                        }
                    }
                    break;
                case $nome_cor[1]:
                    for($loop; $loop < count($icone_tema); $loop++) {
                        if($loop == 1) {
                            echo '<span class="cor-'.$loop.' ativo"><i class="uil uil-'.$icone_tema[$loop].'"></i></span>';
                        } else {
                            echo '<span class="cor-'.$loop.'"><i class="uil uil-'.$icone_tema[$loop].'"></i></span>';
                        }
                    }
                    break;
                case $nome_cor[2]:
                    for($loop; $loop < count($icone_tema); $loop++) {
                        if($loop == 2) {
                            echo '<span class="cor-'.$loop.' ativo"><i class="uil uil-'.$icone_tema[$loop].'"></i></span>';
                        } else {
                            echo '<span class="cor-'.$loop.'"><i class="uil uil-'.$icone_tema[$loop].'"></i></span>';
                        }
                    }
                    break;
                case $nome_cor[3]:
                    for($loop; $loop < count($icone_tema); $loop++) {
                        if($loop == 3) {
                            echo '<span class="cor-'.$loop.' ativo"><i class="uil uil-'.$icone_tema[$loop].'"></i></span>';
                        } else {
                            echo '<span class="cor-'.$loop.'"><i class="uil uil-'.$icone_tema[$loop].'"></i></span>';
                        }
                    }
                    break;
                case $nome_cor[4]:
                    for($loop; $loop < count($icone_tema); $loop++) {
                        if($loop == 4) {
                            echo '<span class="cor-'.$loop.' ativo"><i class="uil uil-'.$icone_tema[$loop].'"></i></span>';
                        } else {
                            echo '<span class="cor-'.$loop.'"><i class="uil uil-'.$icone_tema[$loop].'"></i></span>';
                        }
                    }
                    break;
                default:
                    break;
            }?>
            </div>
        </div>
        
        <?php
        $loop = 0;
        ?>
        <!-- Cor de fundo do tema -->
        <div class="background">
            <h4>Escolha seu tema:</h4>
            <div class="escolher-tema">
                <?php
                /*  NOTAS: Laço de repetição para colocar:
                **  01) as classes bg-0, bg-1 ... e assim por diante, para fazer o css funcionar
                **  02) colocar os ícones correspondentes vindo do array $icone_background
                **  03) colocar os nomes correspondentes vindo do array $nome_background
                **  04) if/else para verificar e adicionar como classe qual está ativo
                **  05) função ucwords() para por a primeira letra como maiúscula
                ** removi for="bg-0"
                */
                $loop = 0;
                for($loop; $loop < count($nome_background); $loop++) {
                    if ($tema == $nome_background[$loop]) {
                    echo '<div class="bg-'.$loop.' ativo">';
                    } else {
                        echo '<div class="bg-'.$loop.'">';
                    }
                    echo
                        '<span></span>
                        <i class="uil uil-'.$icone_background[$loop].'"></i>
                        <h5>'.ucwords($nome_background[$loop]).'</h5>
                    </div>';
                }?>
            </div>
        </div>

        <?php                
        $loop = 0;
        ?>

        @php
            $auth_id = auth()->user()->id;
        @endphp

        <form method="POST" action="{{ route('atualizar-layout', ['id' => $auth_id]) }}?timestamp={{ session('timestamp') }}" id="form-customizar">
            @csrf
            @method('POST')

            <?php
            for($loop; $loop < count($tamanho_fonte); $loop++) {
                if ($tamanho_fonte[$loop] == $tam_fonte) {
                    echo '<input class="form-site-estilo" type="radio" name="custom_fonte" value='.$tamanho_fonte[$loop].' checked>';
                } else {
                    echo '<input class="form-site-estilo" type="radio" name="custom_fonte" value='.$tamanho_fonte[$loop].'>';
                }
            }
            $loop = 0;
            for($loop; $loop < count($nome_cor); $loop++) {
                if ($nome_cor[$loop] == $cor_principal) {
                    echo '<input class="form-site-estilo" type="radio" name="custom_cor" value="'.$nome_cor[$loop].'" checked>';
                } else {
                    echo '<input class="form-site-estilo" type="radio" name="custom_cor" value="'.$nome_cor[$loop].'">';
                }
            }
            $loop = 0;
            for($loop; $loop < count($nome_background); $loop++) {
                if ($nome_background[$loop] == $tema) {
                    echo '<input class="form-site-estilo" type="radio" name="custom_tema" value="'.$nome_background[$loop].'" checked>';
                } else {
                    echo '<input class="form-site-estilo" type="radio" name="custom_tema" value="'.$nome_background[$loop].'">';
                }
            }?>
            <input type="submit" class="btn btn-border" value="Salvar">
        </form>
    </div>
</div>