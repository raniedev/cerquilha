//Menu
const menuBtn = document.querySelector("#menu-btn");
const closeBtn = document.querySelector("#close-btn");
const sideMenu = document.querySelector("aside");
const tam = window.innerWidth;

//Nav
const navSino = document.querySelector('#sino');
// const navEnvelope = document.querySelector('#envelope');

//Para salvar a customização do site através de um form invisível e via AJAX
const customFonte = document.getElementsByName('custom_fonte');
const customCor = document.getElementsByName('custom_cor');
const customTema = document.getElementsByName('custom_tema');

//Sidebar
const menuItems = document.querySelectorAll(".menu-item");
const setaAbrir = document.querySelector("#seta-abrir");
const setaFechar = document.querySelector("#seta-fechar");

//Modificar o main container para o tablet
const mainContainer = document.querySelector("main .container");
const mainContainerFilho2 = document.querySelector("main .container:nth-child(2)");
const painelDireita = document.querySelector(".direita .painel-direita");

//Pesquisa dos Usuários
// const notificacoes = document.querySelector('.msgs-popup');
const usuarios = document.querySelector('.usuarios');
const nomes = document.querySelector('#filtrar');
const filtro = document.querySelector('#filtro');
const filtrarUsuario = document.querySelector('#filtrar-usuario');

//Caixas de notificações e mensagens
const caixaNotificar = document.querySelector('.notificacoes-popup');
// const caixaMsgs = document.querySelector('.msgs-popup');

// Mobile Menu
var mobileMenu = document.querySelector('aside .sidebar');

//Tema
const corLogo = document.querySelector('.colorir');
const theme = document.querySelector('#tema');
const themeModal = document.querySelector('.customizar');
const tamFontes = document.querySelectorAll('.escolher-tamfonte span');
var root = document.querySelector(':root');
const minhasCores = document.querySelectorAll('.escolher-cor span');
const Bg0 = document.querySelector('.bg-0');
const Bg1 = document.querySelector('.bg-1');
const Bg2 = document.querySelector('.bg-2');

//Tabs / Abas
const tabs = document.querySelectorAll('.tab');
const tabContents = document.querySelectorAll('.tab-conteudo');

//Tema, Cor de fundo
let lightColorLightness;
let whiteColorLightness;
let darkColorLightness;

//Remove a classe ativo de todos os menus itens
const mudarItemAtivo = () => {
    menuItems.forEach(item => {
        item.classList.remove('ativo');
    });
};

//Mostrar menu mobile
menuBtn.addEventListener('click', () => {
    sideMenu.style.display = 'block';
    menuBtn.style.display = 'none';
    closeBtn.style.display = 'block';
});

//Fechar menu mobile
closeBtn.addEventListener('click', () => {
    sideMenu.style.display = 'none';
    menuBtn.style.display = 'block';
    closeBtn.style.display = 'none';
});


// Esta função combinanda com o resize irá ajustar o bug que ocorre quando fecha o menu pela versão mobile e quando maximiza para versão tablet/desktop o display do menu ficava como none. Logo, não aparecia e quebrava todo o layout
window.addEventListener("resize", checarLargura);

function checarLargura() {
    if (window.innerWidth > 768) {
        sideMenu.style.display = 'block';
        menuBtn.style.display = 'none';
        closeBtn.style.display = 'none';
    } else {
        sideMenu.style.display = 'none';
        menuBtn.style.display = 'block';
        closeBtn.style.display = 'none';
    }

    if (window.innerWidth < 768 || window.innerWidth > 1023) {
        setaAbrir.style.display = 'none';
        setaFechar.style.display = 'none';
    } else {
        setaAbrir.style.display = 'block';
        setaFechar.style.display = 'none';
    }

    if (window.innerWidth > 1023) {
        mainContainer.style.gridTemplateColumns = '18vw auto 20vw';
        painelDireita.style.display = 'block';
        // mainContainerFilho2.style.gap = "1rem";
    } else if (window.innerWidth >= 768 && window.innerWidth <= 1023) {        
        mainContainer.style.gridTemplateColumns = '5rem auto';
        painelDireita.style.display = 'none';
        // mainContainerFilho2.style.gap = "1rem";
    } else {
        
    }
}

// procurando nomes
const filtrando = () => {
    // console.log('1');
    const nome = nomes.querySelectorAll('.feed');
    const val = filtro.value.toLowerCase();

    nome.forEach(n => {
        let name = n.querySelector('.filtrar-nome').textContent.toLowerCase();
        if (name.indexOf(val) != -1) {
            n.style.display = 'flex';
        } else {
            n.style.display = 'none';
        }
    });
};

// procurando usuários
const procurandoUsuario = () => {
    const usuario = usuarios.querySelectorAll('.usuario');
    const val = filtrarUsuario.value.toLowerCase();
    usuario.forEach(user => {
        let name = user.querySelector('h5').textContent.toLowerCase();
        if (name.indexOf(val) != -1) {
            user.style.display = 'flex';
        } else {
            user.style.display = 'none';
        }
    });
};

// procura usuario
filtro?.addEventListener('keyup', filtrando);
filtrarUsuario?.addEventListener('keyup', procurandoUsuario);

// Mudar o menu que está ativo
menuItems.forEach(item => {
    item.addEventListener('click', () => {
        mudarItemAtivo();
        item.classList.add('ativo');
    });
});

navSino?.addEventListener('click', () => {
    // Mostra a caixa de notificações
    document.querySelector('.notificacoes-popup').style.display = 'block';
    // document.querySelector('.msgs-popup').style.display = 'none';
    document.querySelector("#sino .contar-notificacoes").style.display = 'none';
    document.querySelector('.contar-notificacoes');
    // if(item.id != 'notificacoes') {
    //     document.querySelector('.notificacoes-popup').style.display = 'none';
    // } else {
    //     document.querySelector('.contar-notificacoes');
    //     // Remove o popup que alerta que tem novas notificações
    // }
});

// navEnvelope.addEventListener('click', () => {
//     // Mostra a caixa de notificações
//     document.querySelector('.notificacoes-popup').style.display = 'none';
//     // document.querySelector('.msgs-popup').style.display = 'block';
//     document.querySelector("#envelope .contar-notificacoes").style.display = 'none';
//     document.querySelector('.contar-notificacoes');
//     // if(item.id != 'notificacoes') {
//     //     document.querySelector('.notificacoes-popup').style.display = 'none';
//     // } else {
//     //     document.querySelector('.contar-notificacoes');
//     //     // Remove o popup que alerta que tem novas notificações
//     // }
// });

const manterNotificar = (parametro) => {
    parametro.style.display = 'block';
}

const fecharNotificar = (parametro) => {
    parametro.style.display = 'none';
}

caixaNotificar?.addEventListener('mouseover', function() {
    // Função anônima que passará os parâmetros necessários
    manterNotificar(caixaNotificar);
});

caixaNotificar?.addEventListener('mouseout', function() {
    // Função anônima que passará os parâmetros necessários
    fecharNotificar(caixaNotificar);
});

// Abre Modal
const openThemeModal = () => {
    themeModal.style.display = 'grid';
}

//closes modal
const closeThemeModal = (e) => {
    if(e.target.classList.contains('customizar')) {
        themeModal.style.display = 'none';
    }
}

themeModal.addEventListener('click', closeThemeModal);
theme.addEventListener('click', openThemeModal);

// Fonts

// Remove classe active dos spans ou seletores de tamanho de fonte
const removerTamFonteAtivo = () => {
    tamFontes.forEach(tam => {
        tam.classList.remove('ativo');
    })
}

tamFontes.forEach(tam => {
    tam.addEventListener('click', () => {
        removerTamFonteAtivo();
        let tamFonte;
        tam.classList.toggle('ativo');

        if (tam.classList.contains('tam-fonte-0')) {
            tamFonte = '12px';
            customFonte[0].checked = true;
        } else if (tam.classList.contains('tam-fonte-1')) {
            tamFonte = '14px';
            customFonte[1].checked = true;
        } else if (tam.classList.contains('tam-fonte-2')) {
            tamFonte = '16px';
            customFonte[2].checked = true;
        } else if (tam.classList.contains('tam-fonte-3')) {
            tamFonte = '18px';            
            customFonte[3].checked = true;
        } else if (tam.classList.contains('tam-fonte-4')) {
            tamFonte = '20px';            
            customFonte[4].checked = true;
        }

        // Muda o tamanho das fontes
        document.querySelector('html').style.fontSize = tamFonte;
    })
})

// Remove a classe ativo das cores
const changeActiveColorClass = () => {
    minhasCores.forEach(colorPicker => {
        colorPicker.classList.remove('ativo');
    });
}

// Cor principal
minhasCores.forEach(cor => {
    cor.addEventListener('click', () => {
        let primaryH, primaryS, primaryL, corLogo;

        // Remover a classe "active"para as cores
        changeActiveColorClass();
        
        if(cor.classList.contains('cor-0')){
            primaryH = 213;
            primaryS = 100;
            primaryL = 50;
            cor.classList.add('ativo');
            customCor[0].checked = true;
            corLogo = "invert(37%) sepia(53%) saturate(6048%) hue-rotate(202deg) brightness(99%) contrast(113%)";
        } else if (cor.classList.contains('cor-1')) {
            primaryH = 168;
            primaryS = 76;
            primaryL = 42;
            cor.classList.add('ativo');
            customCor[1].checked = true;
            corLogo = "invert(55%) sepia(67%) saturate(478%) hue-rotate(118deg) brightness(96%) contrast(95%)";
        } else if (cor.classList.contains('cor-2')) {
            primaryH = 48;
            primaryS = 89;
            primaryL = 50;
            cor.classList.add('ativo');
            customCor[2].checked = true;
            corLogo = "invert(75%) sepia(83%) saturate(520%) hue-rotate(353deg) brightness(97%) contrast(94%)";
        } else if (cor.classList.contains('cor-3')) {
            primaryH = 6;
            primaryS = 73;
            primaryL = 57;
            cor.classList.add('ativo');
            customCor[3].checked = true;
            corLogo = "invert(58%) sepia(53%) saturate(5856%) hue-rotate(334deg) brightness(90%) contrast(102%)";
        } else if (cor.classList.contains('cor-4')) {
            primaryH = 283;
            primaryS = 39;
            primaryL = 53;
            cor.classList.add('ativo');
            customCor[4].checked = true;
            corLogo = "invert(44%) sepia(14%) saturate(2110%) hue-rotate(238deg) brightness(92%) contrast(91%)";
        }

        root.style.setProperty('--cor-principal-hue', primaryH);
        root.style.setProperty('--cor-principal-saturation', primaryS+"%");
        root.style.setProperty('--cor-principal-lightness', primaryL+"%");

        root.style.setProperty('--cor-logo', corLogo);
        cor_hsl = "hsl("+primaryH+","+primaryS+"%,"+primaryL+"%"+")";
        // grafico();
    });
});

// Mudar a cor de fundo
const changeBG = () => {
    root.style.setProperty('--light-color-lightness', lightColorLightness);
    root.style.setProperty('--white-color-lightness', whiteColorLightness);
    root.style.setProperty('--dark-color-lightness', darkColorLightness);
}

Bg0.addEventListener('click', () => {
    darkColorLightness = '17%';
    whiteColorLightness = '100%';
    lightColorLightness = '95%';

    // add active class
    Bg0.classList.add('ativo');

    // remove active class from the others
    Bg1.classList.remove('ativo');
    Bg2.classList.remove('ativo');

    customTema[0].checked = true;
    changeBG();
});

Bg1.addEventListener('click', () => {
    darkColorLightness = '95%';
    whiteColorLightness = '20%';
    lightColorLightness = '15%';

    // add active class
    Bg1.classList.add('ativo');

    // remove active class from the others
    Bg0.classList.remove('ativo');
    Bg2.classList.remove('ativo');

    customTema[1].checked = true;
    changeBG();
});

Bg2.addEventListener('click', () => {
    darkColorLightness = '95%';
    whiteColorLightness = '10%';
    lightColorLightness = '0%';

    // add active class
    Bg2.classList.add('ativo');

    // remove active class from the others
    Bg0.classList.remove('ativo');
    Bg1.classList.remove('ativo');
    
    customTema[2].checked = true;
    changeBG();
});

// Funções para rolagem da página
function voltarTopo() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

function voltarBase() {
    window.scrollTo( { behavior: "smooth", top: document.body.scrollHeight});
}

// Mostrar/Ocultar Aside da direita no tamanho tablet
function mostrarDireita() {
    setaAbrir.style.display = 'none';
    setaFechar.style.display = 'block';
    painelDireita.style.display = 'block';
    // Vai mostrar novamente a lateral direita
    mainContainer.style.gridTemplateColumns = "5rem auto 16rem";
    // Vai recolocar o gap para a lateral direita
    mainContainerFilho2.style.gap = "1rem";
}

function ocultarDireita() {
    setaAbrir.style.display = 'block';
    setaFechar.style.display = 'none';
    painelDireita.style.display  = 'none';
    // Vai sumir com a parte lateral direita
    mainContainer.style.gridTemplateColumns = "5rem auto";
    // Vai tirar já que a lateral direita foi removida
}

// Calculadora

const buttons = document.querySelectorAll('button');
const result = document.getElementById('result');
let expression = '';

function handleButtonClick(event) {
  const button = event.target;
  const value = button.value;

  if (value === '=') {
    try {
      const answer = eval(expression);
      result.value = answer;
    } catch (error) {
      result.value = 'Inválido';
    }
    expression = '';
  } else if (value === 'C') {
    result.value = '';
    expression = '';
  } else {
    expression += value;
    result.value = expression;
  }
}

buttons.forEach(button => {
  button.addEventListener('click', handleButtonClick);
});

// Código para mudar as abas de uma página
tabs.forEach(tab => {
    tab.addEventListener('click', () => {
        // Remove a classe "ativo" de todas as abas e conteúdos
        tabs.forEach(tab => {
            tab.classList.remove('ativo');
        });
        tabContents.forEach(tabContent => {
            tabContent.classList.remove('ativo');
        });

        // Adiciona a classe "ativo" na aba e no conteúdo correspondente
        const tabId = tab.getAttribute('data-tab');
        const tabContent = document.querySelector(`#${tabId}`);
        tab.classList.add('ativo');
        tabContent.classList.add('ativo');
    });
});



// AJAX
// Seleciona todos os botões com classes que começam com "curtir-"
const curtir = document.querySelectorAll('[class^="curtir-"]');
const descurtir = document.querySelectorAll('[class^="descurtir-"]');
let numero, nome, classe, curtidas;

// function trocarClasses(numero, nome) {
//     if (this.classList.contains('[class^="curtir-"]')) {
//         this.classList.remove(nome);
//         this.classList.add('descurtir-' + numero);
//     } else {
//         this.classList.remove('descurtir');
//         this.classList.add('curtir');
//     }
// }

// Loop para saber em qual classe curtir- foi clicada
curtir.forEach(function(elemento) {
    // pegar o número referente a classe
    elemento.addEventListener('click', function() {
        nome = elemento.classList[0];
        classe = elemento.classList[0].substr(0, 6);

        if (classe == 'curtir') {
            numero = parseInt(elemento.classList[0].substr(7));
            curtidas = document.querySelector(".curtir-" + numero + " small");
            curtidas.textContent = parseInt(curtidas.textContent) + 1;
            elemento.classList.remove(nome);
            elemento.classList.add('descurtir-' + numero);
            elemento.style.color = '#de3163';
            $.ajax({
                url: '/likes',
                method: 'POST',
                cache: false,
                data: {
                    post_id: numero
                },
                success: function(response) {
                    // console.log(response);
                    console.log('Curtiu postagem número: ' + numero);
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                    // console.log('Erro!');
                }
            });
        } else {
            numero = parseInt(elemento.classList[0].substr(10));
            curtidas = document.querySelector(".descurtir-" + numero + " small");
            curtidas.textContent = parseInt(curtidas.textContent) - 1;
            elemento.classList.remove(nome);
            elemento.classList.add('curtir-' + numero);
            elemento.style.removeProperty('color');
            $.ajax({
                url: '/likes/' + numero,
                method: 'DELETE',
                cache: false,
                data: {
                    post_id: numero
                },
                success: function(response) {
                    console.log('Removeu a curtida na postagem número: ' + numero);
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        }
        // trocarClasses(numero, nome);
    });
});

descurtir.forEach(function(elemento) {
    // pegar o número referente a classe
    elemento.addEventListener('click', function() {
        nome = elemento.classList[0];
        classe = elemento.classList[0].substr(0, 9);

        if (classe == 'descurtir') {
            numero = parseInt(elemento.classList[0].substr(10));
            curtidas = document.querySelector(".descurtir-" + numero + " small");
            curtidas.textContent = parseInt(curtidas.textContent) - 1;
            elemento.classList.remove(nome);
            elemento.classList.add('curtir-' + numero);
            elemento.style.removeProperty('color');
            $.ajax({
                url: '/likes/' + numero,
                method: 'DELETE',
                cache: false,
                data: {
                    post_id: numero

                },
                success: function(response) {
                    console.log('Removeu a curtida na postagem número: ' + numero);
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        } else {
            numero = parseInt(elemento.classList[0].substr(7));
            curtidas = document.querySelector(".curtir-" + numero + " small");
            curtidas.textContent = parseInt(curtidas.textContent) + 1;
            elemento.classList.remove(nome);
            elemento.classList.add('descurtir-' + numero);
            elemento.style.color = '#de3163';
            $.ajax({
                url: '/likes',
                method: 'POST',
                cache: false,
                data: {
                    post_id: numero
                },
                success: function(response) {
                    // console.log(response);
                    console.log('Curtiu postagem número: ' + numero);
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                    // console.log('Erro!');
                }
            });
        }
    });
});



// Seleciona todos os botões com classes que começam com "curtir-"
const vid_curtir = document.querySelectorAll('[class^="vid-curtir-"]');
const vid_descurtir = document.querySelectorAll('[class^="vid-descurtir-"]');
let vid_numero, vid_nome, vid_classe, vid_curtidas;

// Loop para saber em qual classe curtir- foi clicada
vid_curtir.forEach(function(elemento) {
    // pegar o número referente a classe
    elemento.addEventListener('click', function() {
        vid_nome = elemento.classList[0];
        vid_classe = elemento.classList[0].substr(4, 6);

        if (vid_classe == 'curtir') {
            vid_numero = parseInt(elemento.classList[0].substr(11, 12));
            vid_curtidas = document.querySelector(".vid-curtir-" + vid_numero + " small");
            vid_curtidas.textContent = parseInt(vid_curtidas.textContent) + 1;

            elemento.classList.remove(vid_nome);
            elemento.classList.add('vid-descurtir-' + vid_numero);
            elemento.style.color = '#de3163';

            var token = document.head.querySelector('meta[name="csrf-token"]').content;

            $.ajax({
                url: '/likes-video',
                method: 'POST',
                cache: false,
                data: {
                    video_id: vid_numero,
                },
                headers: {
                  'X-CSRF-TOKEN': token
                },
                success: function(response) {
                    // console.log(response);
                    console.log('Curtiu vídeo número: ' + vid_numero);
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                    // console.log('Erro!');
                }
            });
        } else {
            vid_numero = parseInt(elemento.classList[0].substr(14, 15));
            vid_curtidas = document.querySelector(".vid-descurtir-" + vid_numero + " small");
            vid_curtidas.textContent = parseInt(vid_curtidas.textContent) - 1;

            elemento.classList.remove(vid_nome);
            elemento.classList.add('vid-curtir-' + vid_numero);
            elemento.style.removeProperty('color');

            var token = document.head.querySelector('meta[name="csrf-token"]').content;

            $.ajax({
                url: '/likes-video/' + vid_numero,
                method: 'DELETE',
                cache: false,
                data: {
                    video_id: vid_numero
                },
                headers: {
                  'X-CSRF-TOKEN': token
                },
                success: function(response) {
                    console.log('Removeu a curtida na postagem número: ' + vid_numero);
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        }
    });
});

vid_descurtir.forEach(function(elemento) {
    // pegar o número referente a classe
    elemento.addEventListener('click', function() {
        vid_nome = elemento.classList[0];
        vid_classe = elemento.classList[0].substr(4, 9);

        if (vid_classe == 'descurtir') {
            vid_numero = parseInt(elemento.classList[0].substr(14, 15));
            vid_curtidas = document.querySelector(".vid-descurtir-" + vid_numero + " small");
            vid_curtidas.textContent = parseInt(vid_curtidas.textContent) - 1;

            elemento.classList.remove(vid_nome);
            elemento.classList.add('vid-curtir-' + vid_numero);
            elemento.style.removeProperty('color');

            var token = document.head.querySelector('meta[name="csrf-token"]').content;

            $.ajax({
                url: '/likes-video/' + vid_numero,
                method: 'DELETE',
                cache: false,
                data: {
                    video_id: vid_numero
                },
                headers: {
                  'X-CSRF-TOKEN': token
                },
                success: function(response) {
                    console.log('Removeu a curtida no vídeo número: ' + vid_numero);
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        } else {
                vid_numero = parseInt(elemento.classList[0].substr(11, 12));
                vid_curtidas = document.querySelector(".vid-curtir-" + vid_numero + " small");
                vid_curtidas.textContent = parseInt(vid_curtidas.textContent) + 1;

                elemento.classList.remove(vid_nome);
                elemento.classList.add('vid-descurtir-' + vid_numero);
                elemento.style.color = '#de3163';

                var token = document.head.querySelector('meta[name="csrf-token"]').content;

            $.ajax({
                url: '/likes-video',
                method: 'POST',
                cache: false,
                data: {
                    video_id: vid_numero
                },
                headers: {
                  'X-CSRF-TOKEN': token
                },
                success: function(response) {
                    // console.log(response);
                    console.log('Curtiu vídeo número: ' + vid_numero);
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                    // console.log('Erro!');
                }
            });
        }
    });
});




// MOSTRAR MAIS
let showMoreBtn = document.getElementById("show-more-abrir");
let items = document.getElementsByClassName("show-more");

let numToShow = 10;
let numToShowIncrement = 10;

showMoreBtn?.addEventListener("click", function() {
    numToShow += numToShowIncrement;
    for (let i = 0; i < items.length; i++) {
        if (i < numToShow) {
            items[i].style.display = "block";
        } else {
            items[i].style.display = "none";
        }
    }

    if (numToShow >= items.length) {
        showMoreBtn.style.display = "none";
    }
});

// FOLLOW / UNFOLLOW
// Seleciona todos os botões de seguir
const btns = document.querySelectorAll('.seguir .btn');
const followers = document.querySelectorAll('.follower');

// Adiciona o evento de clique para cada botão
btns.forEach((btn, index) => {
    btn.addEventListener('click', () => {
        
        // Recebe o valor do usuário
        let numero = followers[index].value;

        // Alterna as classes dos botões
        btn.classList.toggle('btn-primary');
        btn.classList.toggle('btn-border');

        if (btn.textContent === 'Seguir') {
            btn.textContent = 'Seguindo';
            $.ajax({
                url: '/followers',
                method: 'POST',
                cache: false,
                data: {
                    seguir: numero
                },
                success: function(response) {
                    // console.log(response);
                    console.log('Começou a seguir o usuário: ' + numero);
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                    // console.log('Erro!');
                }
            });
        } else if (btn.textContent === 'Seguindo') {
            btn.textContent = 'Seguir';
            $.ajax({
                url: '/followers/' + numero,
                method: 'DELETE',
                cache: false,
                data: {
                    seguir: numero
                },
                success: function(response) {
                    console.log('Deixou de seguir o usuário: ' + numero);
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        }
    });
});

// Seleciona todos os links de vídeo
// const videoYoutube = document.querySelector('#vid-youtube');
// const videoInterno = document.querySelector('#vid-interno');
// const videoLinks = document.querySelectorAll('.video-link');
// const videoPlayer = document.querySelector('#video-youtube');
// const videoTitle = document.querySelector('#vid-title');
// const videoDescription = document.querySelector('#vid-description');

// Adiciona um ouvinte de evento de clique a cada link de vídeo
// videoLinks.forEach((link) => {
//     link.addEventListener('click', (event) => {
//     event.preventDefault(); // Interrompe o comportamento padrão do link
//     const videoUrl = link.href; // Obtém a URL do vídeo do link

//     // Define a URL do vídeo como a origem do iframe e o torna visível
//     videoPlayer.src = videoUrl;
//     videoYoutube.style.display = 'block';
//     videoInterno.style.display = 'none';
//     // Defina a largura do vídeo para 100% da largura do contêiner
//     videoPlayer.style.width = '100%';
//     });
// });

// Trocar o vídeo
// $(document).ready(function() {
//     $('.btn-trocar-video').click(function() {
//         var novoSrc = $(this).data('src');
//         $('#video-mp4').attr('src', novoSrc);
//         document.getElementById("video-interno").load();
//         videoYoutube.style.display = 'none';
//         videoInterno.style.display = 'block';
//         function voltarTopo() {
//             window.scrollTo({ top: 0, behavior: 'smooth' });
//         }
//     });
// });

// console.log(videoTitle.textContent);
// console.log(videoDescription.textContent);