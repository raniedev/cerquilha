
$(document).ready( function(){

    $('#texto_postagem').click( function(){
        // ao clicar no campo, a msg de sucesso de um post anterior eh ocultado.
        $('#msg_postagem').html('');

        if( $(this).val() == '' ){
            // retonando ao height padrão de 34px
            $(this).css('height', '5rem');
        }
    });

    // aumenta a altura automaticamente conforme digita ou apaga
    $('#texto_postagem').on('keyup change onpaste', function () {
        var alturaScroll = this.scrollHeight;
        var alturaCaixa = $(this).height();

        if (alturaScroll > (alturaCaixa + 10)) {
            if (alturaScroll > 500) return;
            $(this).css('height', alturaScroll);
        }

        if( $(this).val() == '' ){
            // retonando ao height padrão de 34px
            $(this).css('height', '5rem');
        }
    });

    // associar o evento de click ao botão
    $('#btn_postagem').click( function(){
        btnPostagem.disabled = true;
        btnPostagem.style.opacity = "25%";
        contador.style.opacity = 0;

        // verificando se o campo postagem não está vazio
        if ($('#texto_postagem').val().length > 0) {

            // será enviado a informação do campo postagem para um script php através de uma requisição ajax
            $.ajax({
                url: 'inclui_postagem.php',
                method: 'post',
                // para formulário com vários campos, podemos simplificar a captura de todos com a função jquery serialize
                data: $('#form_postagem').serialize(),
                success: function(data) {

                    // limpando o campo postagem caso haja sucesso na requisição
                    $('#texto_postagem').val('');

                    // exibirá uma msg de sucesso abaixo do campo
                    // $('#msg_postagem').html('<br>Postado com sucesso!');
                    $('#msg_postagem').html('<span class="msg-feedback msg-sucesso"><i class="uil uil-check"></i>Postado com sucesso.</span>');

                    // para que a postagem recém-postada já apareça na timeline sem precisar dar refresh, podemos chamar a função aqui
                    atualizaPostagem();

                    atualizaQtdePostagem();
                }
            });
        }

    });

    $.ajax({
            url: 'get_seguidores.php',
            success: function(data) {

                // caso requisição foi sucesso, será inserido o retorno da requisição na div postagens
                $('#seguidores').html(data);


            }
        });

    function atualizaPostagem(){

        // carregar as postagens
        $.ajax({
            url: 'get_postagem.php',
            success: function(data) {

                // caso requisição foi sucesso, será inserido o retorno da requisição na div postagens
                $('#postagens').html(data);

                $('.btn_del_postagem').click( function(){

                    // recuperando o valor do atributo customizado
                    var id_postagem = $(this).data('id_postagem');

                    // enviando para del_postagem.php via requisição
                    $.ajax({
                        url: 'del_postagem.php',
                        method: 'post',

                        // será enviado o id da postagem recuperado do botão através de um JSON ({})
                        data: { id_postagem: id_postagem },
                        success: function(data){
                            alert('Postagem removido com sucesso !');
                        }
                    });

                    atualizaPostagem();
                    atualizaQtdePostagem();

                });
            }
        });


    }

    // atualiza qtde postagens
    function atualizaQtdePostagem() {

        $.ajax({

            url: 'qtde_postagens.php',
            success: function(data) {

                $('#qtde_postagens').html(data);
            }
        })
    }

    // executa a função
    atualizaPostagem();
    atualizaQtdePostagem();

    // Customizar site
    
    // $('#form-customizar').click( function(){
    //     // Prevent the form from submitting
    //     event.preventDefault();

    //     // Get the values of the input fields
    //     let custom_fonte = $('input[name="custom_fonte"]:checked').val();
    //     let custom_cor = $('input[name="custom_cor"]:checked').val();
    //     let custom_tema = $('input[name="custom_tema"]:checked').val();

    //     // Send the data to the server using AJAX
    //     $.ajax({
    //         url: 'customizar_site.php',
    //         method: 'POST',
    //         data: {
    //             custom_fonte: custom_fonte,
    //             custom_cor: custom_cor,
    //             custom_tema: custom_tema
    //         },
    //         success: function(response) {
    //             alert('Feito!');
    //         },
    //         error: function() {
    //             alert('Algo deu errado.');
    //         }
    //     });
    // });
});