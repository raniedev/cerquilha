//Postagem/Comentar
const btnPostagem = document.querySelector("#btn_postagem");

// Seleciona o <textarea> e o <span> correspondente
const textarea = document.getElementById("texto_postagem");
const contador = document.getElementById("contador");

// Define o limite máximo de caracteres permitidos
let limite = 1000;

function contadorPostagem() {
    // Obtém o número atual de caracteres no <textarea>
    let numCaracteres = textarea.value.length;
    
    // Exibe o número atual de caracteres no <span> correspondente
    contador.innerHTML = numCaracteres + "/" + limite;
    
    // console.log(numCaracteres);

    // Se o número de caracteres exceder o limite, exibe uma mensagem de erro
    if (numCaracteres > limite) {
        contador.style.color = "hsl(0, 95%, 65%)";
        textarea.style.color = "hsl(0, 95%, 65%)";
        btnPostagem.disabled = true;
        btnPostagem.style.opacity = "25%";
        contador.style.opacity = 1;
    } else if(numCaracteres == 0){
        btnPostagem.disabled = true;
        btnPostagem.style.opacity = "25%";
        contador.style.color = "var(--cor-escura)";
        contador.style.opacity = 1;
    } else {
        contador.style.color = "var(--cor-escura)";
        textarea.style.color = "var(--cor-escura)";
        btnPostagem.disabled = false;
        btnPostagem.style.opacity = "100%";
        contador.style.opacity = 1;        
    }
}

// Adiciona um ouvinte de evento para detectar quando o conteúdo do <textarea> é alterado
textarea?.addEventListener("input", function() {
    contadorPostagem();
});

// Pegando o botão para abrir o modal
const btnModal = document.querySelectorAll(".btn-modal");
const modal = document.querySelectorAll(".modal");
const emojis = document.querySelectorAll(".emoji");
const simbolos = document.querySelectorAll(".simbolos");
const modalEmojis = document.querySelector("#modal-emojis");
const btnEmojis = document.querySelector("#btn-emojis");
const modalSimbolos = document.querySelector("#modal-simbolos");
const btnSimbolos = document.querySelector("#btn-simbolos");

// Irá abrir o modal correspondente que for clicado, usando a cláusula this.
btnModal.forEach(elemento => {
    elemento.addEventListener('click', function() {
        this.style.color = "var(--cor-principal)";
        const caixa = this.nextElementSibling;
        caixa.style.display = "block";
    });
});

// Evento para fechar o modal caso o clique seja no espaços entre os emojis ou paddings/margins (caso tenha)
modal.forEach(elemento => {
    elemento.addEventListener("click", function(e) {
        if (e.target === elemento) {
            const cor = this.previousElementSibling;
            cor.style.color = "#fff";
            this.style.display = "none";
        }
    });
});

// Evento que irá fechar o modal de emojis quando estiver aberto e o clique for fora da caixa e botão
document.addEventListener("click", function(event) {
    if ((event.target !== modalEmojis) && (event.target !== btnEmojis) && (modalEmojis.style.display == "block")) {
        modalEmojis.style.display = "none";
        btnEmojis.style.color = "var(--cor-escura)";
    }
});

// Evento que irá fechar o modal de simbolos quando estiver aberto e o clique for fora da caixa e botão
document.addEventListener("click", function(event) {
    if ((event.target !== modalSimbolos) && (event.target !== btnSimbolos) && (modalSimbolos.style.display == "block")) {
        modalSimbolos.style.display = "none";
        btnSimbolos.style.color = "var(--cor-escura)";
    }
});

// Evento que irá adicionar o emoji clicado ao textarea
emojis.forEach(function(emoji) {
    emoji.addEventListener("click", function() {
        const valorEmoji = this.textContent;
        const valorAtual = textarea.value;
        textarea.value = valorAtual + valorEmoji;
        modalEmojis.style.display = "none";
        btnEmojis.style.color = "var(--cor-escura)";
        contadorPostagem();
    });
});

// Evento que irá adicionar o símbolo clicado ao textarea
simbolos.forEach(function(simbolo) {
    simbolo.addEventListener("click", function() {
        const valorSimbolo = this.textContent;
        const valorAtual = textarea.value;
        textarea.value = valorAtual + valorSimbolo;
        modalSimbolos.style.display = "none";
        btnSimbolos.style.color = "var(--cor-escura)";
        contadorPostagem();
    });
});

// Código para bloquear mais de dois Enters seguidos
textarea.addEventListener("keydown", function (e) {
    let texto = this.value;
    if ((e.key === "Enter") && (texto == '')) {
        e.preventDefault();
        return false;
    } else if (e.key === "Enter") {
        let duasUltimas = texto.substr(texto.length - 2);
        if (duasUltimas === "\n\n") {
            e.preventDefault();
            return false;
        }
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