<?php

// recuperando os erros ou sucesso.
$erro_usuario = isset($_GET['erro_usuario']) ? $_GET['erro_usuario'] : 0;
$erro_email   = isset($_GET['erro_email']) ? $_GET['erro_email'] : 0;
$cad_sucesso  = isset($_GET['success']) ? $_GET['success'] : 0;

?>

<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Registrar Usuário - CERQUILHA</title>

		<!-- jquery - link cdn -->
		<!-- <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script> -->
		<script src="./js/3.6.3-jquery.min.js"></script>

		<link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css">
		<link rel="stylesheet" href="./css/registrar.css">

		<script>
			$(document).ready(function() {
				// CONSTANTES				
				const campoUsuario = document.querySelector("#campo-usuario");
				const campoSenha = document.querySelector(".campo-senha");
				const repetirSenha = document.querySelector(".repetir-senha");
				const campoEmail = document.querySelector(".campo-email");
				const iconeOlho = document.querySelectorAll(".icone-olho");
				const labelUsuario = document.querySelector("#label-usuario");
				const labelChecarSenha = document.querySelector("#label-checar-senha");
				const labelRepetirSenha = document.querySelector("#label-repetir-senha");

				// VARIÁVEIS			
				// Pegando todos os filhos para manipular seu conteúdo
				let label = labelChecarSenha.children;
				let label2 = labelRepetirSenha.children;

				// Função para trocar os ícones do olho e mostrar/ocultar a senha
				$(".icone-olho").click(function() {
					// Trocar ícone
					iconeOlho.forEach(function ocultarMostrarOlhos(item, index, arr) {
						arr[index] = item;
						if(arr[index].classList.value == "icone-olho uil uil-eye") {
							arr[index].classList.remove("uil-eye");
							arr[index].classList.add("uil-eye-slash");
						} else {
							arr[index].classList.remove("uil-eye-slash");
							arr[index].classList.add("uil-eye");
						}
					});

					// Trocar Input
					if (campoSenha.type == "password" && repetirSenha.type == "password") {
						campoSenha.type = "text";
						repetirSenha.type = "text";
					} else {
						campoSenha.type = "password";
						repetirSenha.type = "password";
					}
				});

				// REGEX
				// [a-zA-Z0-9._] = De a até z, A até Z, 0 até 9, como símbolo apenas . ponto e _ underline
				// {4,16} = No mínimo 4 caracteres e no máximo 16
				function regexUsuario(usuario) {
					let formato = /^[a-zA-Z0-9._]{4,16}$/;
					return formato.test(usuario);
				}

				// Regex da senha de forma completa
				// (?=.*\d) ao menos um número [0-9]
				// (?=.*[a-z]) caracteres de a-z minúsculo
				// (?=.*[A-Z]) caracteres de a-z maiúsculo
				// .{8,} no mínimo 8 caracteres
				function regexSenha(senha) {
				  	let formato = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
  					return formato.test(senha);
				}

				// Regex da senha de forma fragmentada
				function regexQuantosDigitos(senha) {
					let formato = /^.{8,}$/;
					return formato.test(senha);
				}

				function regexMinuscula(senha) {
					let formato = /^(?=.*[a-z]).{1,}$/;
					return formato.test(senha);
				}

				function regexMaiuscula(senha) {
					let formato = /^(?=.*[A-Z]).{1,}$/;
					return formato.test(senha);
				}

				function regexNumero(senha) {
					let formato = /^(?=.*\d).{1,}$/;
					return formato.test(senha);
				}

				function checarUsuario(a) {
					return a;
				}

				// Vai checar as senhas para modificar e estilizar
				function checarSenha(senha1, senha2, cor1, cor2) {
					// Sendo a senha diferente uma da outra irá estilizar de vermelho
					if (senha1.value !== senha2.value) {
						senha1.style.border = "1px solid " + cor1;
						senha1.style.color = cor1;
						senha2.style.border = "1px solid " + cor1;
						senha2.style.color = cor1;
						label2[0].textContent = "✗Diferente"
						label2[0].style.color = cor1;
					// Vai retornar as cores para a cor normal se as caixas estiverem vazias
					} else if (senha1.value == "" && senha2.value == "") {
						senha1.style.removeProperty('border');
						senha1.style.removeProperty('color');
						senha2.style.removeProperty('border');
						senha2.style.removeProperty('color');
						label2[0].textContent = "✗Diferente"
						label2[0].style.color = "#333";
						let loop = 0;
						while (loop < label.length) {
							label[loop].style.color = '#333';
							loop++;
						}
					// Sendo a senha igual uma da outra irá estilizar de verde
					} else {
						senha1.style.border = "1px solid " + cor2;
						senha1.style.color = cor2;
						senha2.style.border = "1px solid " + cor2;
						senha2.style.color = cor2;
						label2[0].textContent = "✓Igual"
						label2[0].style.color = cor2;
					}
				}

				// Função para checar e substituir os labels com ✓ e ✗ com o que estiver correto e errado respectivamente
				function checarRegex (funcao, indice, texto, simbolo1 = "✓", simbolo2 = "✗") {
					let cor1 = "#FB5151", cor2 = "#4CBD4C";

					if (funcao(campoSenha.value)) {
						label[indice].textContent = simbolo1 + texto;
						label[indice].style.color = cor2;
					} else {
						label[indice].textContent = simbolo2 + texto;
						label[indice].style.color = cor1;
					}
				}

				//Verifica se o campo usuário está de acordo com o seu regex
				campoUsuario.addEventListener("input", function() {
					
				});

				// Verificar a senha a cada vez que insere ou remove caracteres no input
				campoSenha.addEventListener("input", function() {
					// Vai trocar o texto do primeiro span se o tamanho for >= 8
					checarRegex(regexQuantosDigitos, 0, "8");
					// Vai trocar o texto do segundo span ao inserir pelo menos uma letra minúscula
					checarRegex(regexMinuscula, 1, "Minúscula");
					// Vai trocar o texto do terceiro span ao inserir pelo menos uma letra maiúscula
					checarRegex(regexMaiuscula, 2, "Maiúscula");
					// Vai trocar o texto do quarto span ao inserir pelo menos um número
					checarRegex(regexNumero, 3, "Número");
					// Checando se as duas senhas batem
					checarSenha(campoSenha, repetirSenha, "#FB5151", "#4CBD4C");
				});

				// Verificar a repetição da senha a cada vez que insere ou remove caracteres no input
				repetirSenha.addEventListener("input", function() {
					// Checando se as duas senhas batem
					checarSenha(campoSenha, repetirSenha, "#FB5151", "#4CBD4C");
				});

				campoUsuario.addEventListener("focus", function(event) {
					labelUsuario.classList.remove('esvair');
					labelUsuario.classList.add('aparecer');
				});

				campoUsuario.addEventListener("blur", function(event) {
					labelUsuario.classList.remove('aparecer');
					labelUsuario.classList.add('esvair');
				});

				campoSenha.addEventListener("focus", function(event) {
					labelChecarSenha.classList.remove('esvair');
					labelChecarSenha.classList.add('aparecer');
					labelRepetirSenha.classList.remove('esvair');
					labelRepetirSenha.classList.add('aparecer');
				});

				campoSenha.addEventListener("blur", function(event) {
					labelChecarSenha.classList.remove('aparecer');
					labelChecarSenha.classList.add('esvair');
					labelRepetirSenha.classList.remove('aparecer');
					labelRepetirSenha.classList.add('esvair');
				});

				function espacoBloqueado() {
					if (event.keyCode === 32) {
						event.preventDefault();
						return false;
					}
				};

				// Impede que o entre com espaço
				campoSenha.addEventListener("keydown", function(event){
					espacoBloqueado();
				});

				repetirSenha.addEventListener("keydown", function(event){
					espacoBloqueado();
				});

				campoUsuario.addEventListener("keydown", function(event){
					espacoBloqueado();
				});

				campoEmail.addEventListener("keydown", function(event){
					espacoBloqueado();
				});

				repetirSenha.addEventListener("focus", function(event) {
					labelChecarSenha.classList.remove('esvair');
					labelChecarSenha.classList.add('aparecer');
					labelRepetirSenha.classList.remove('esvair');
					labelRepetirSenha.classList.add('aparecer');
				});

				repetirSenha.addEventListener("blur", function(event) {
					labelChecarSenha.classList.remove('aparecer');
					labelChecarSenha.classList.add('esvair');
					labelRepetirSenha.classList.remove('aparecer');
					labelRepetirSenha.classList.add('esvair');
				});
			});
		</script>

	</head>

	<body class="registrar">

		<!-- TRATAMENTO DE ERRO: Campo senha e repetir senha são diferentes -->
		@if(session('erro-senha-diferente'))
			<span class="msg-feedback msg-erro"><i class="uil uil-exclamation-triangle"></i>{{ session('erro-senha-diferente') }}</span>
		@endif
		
		<!-- TRATAMENTO DE ERRO: Senha não cumpre Regex estabelecido -->
		@if(session('erro-senha-regex'))
			<span class="msg-feedback msg-erro"><i class="uil uil-exclamation-triangle"></i>{{ session('erro-senha-regex') }}</span>
		@endif

		<!-- TRATAMENTO DE ERRO: Registrar Usuário -->
		@if(session('erro-email') && session('erro-usuario'))
    		<span class="msg-feedback msg-erro"><i class="uil uil-exclamation-triangle"></i>{{ session('erro-email') . ' ' . session('erro-usuario') }}</span>
		@elseif(session('erro-email'))
			<span class="msg-feedback msg-erro"><i class="uil uil-exclamation-triangle"></i>{{ session('erro-email') }}</span>
		@elseif(session('erro-usuario'))
			<span class="msg-feedback msg-erro"><i class="uil uil-exclamation-triangle"></i>{{ session	('erro-usuario') }}</span>
		@endif

		<div class="formulario-registrar">
				<div class="titulo">
					<img src="./images/logo-64.png"> Registrar Usuário
				</div>
				<div class="content">

				<form method="POST" action="{{ route('register') }}">
				@csrf
					<div class="formulario-info">
						<div class="divisor">
							<span class="details">Nome</span>
							<input type="text" name="nome" placeholder="Insira seu nome" value="{{old('nome')}}" required>
						</div>
						<div class="divisor">
							<span class="details">Sobrenome</span>
							<input type="text" name="sobrenome" placeholder="Insira seu sobrenome" value="{{ old('sobrenome') }}" required>
						</div>
						<div class="divisor">
							<span class="details">Usuário</span>
							<input type="text" id="campo-usuario" name="usuario" placeholder="Insira seu nome de perfil" value="{{ old('usuario') }}" required>
							<small class="esconder" id="label-usuario">
								<span>Letras</span>
								<span>Números</span>
								<span>.ponto _sublinhado</span>
								<span>4~16</span>
							</small>
						</div>
						<div class="divisor">
							<span class="details">Email</span>
							<input type="email" class="campo-email" name="email" placeholder="Insira seu email" value="{{ old('email') }}" required>
						</div>
						<div class="divisor div-senha">
							<span class="details div-senha">Senha</span>
							<input type="password" class="campo-senha" name="senha" placeholder="Mínimo 8 caracteres" required>
							<span><i class="icone-olho uil uil-eye"></i></span>
							<small class="esconder" id="label-checar-senha">
								<span>✗8</span>
								<span>✗Minúscula</span>
								<span>✗Maiúscula</span>
								<span>✗Número</span>
							</small>
						</div>
						<div class="divisor div-senha">
							<span class="details">Repetir Senha</span>
							<input type="password" class="repetir-senha" name="repetir_senha" placeholder="Mínimo 8 caracteres" required>
							<span><i class="icone-olho uil uil-eye"></i></span>
							<small class="esconder" id="label-repetir-senha">
								<span>✗Diferente</span>
							</small>
						</div>
						<div class="divisor">
							<span class="details">Gênero</span>
							<div class="genero">
								<input type="radio" id="genero-m" name="genero" value="M" {{ old('genero') == 'M' ? 'checked' : ''}} required>
								<label for="genero-m"><span><i class="uil uil-mars"></i></span> Masculino</label>
								<input type="radio" id="genero-f" name="genero" value="F" {{ old('genero') == 'F' ? 'checked' : ''}} required>
								<label for="genero-f"><span><i class="uil uil-venus"></i></span>Feminino</label>
							</div>
						</div>
						<div class="divisor">
							<span class="details">Data de Nascimento</span>
							<input type="date" name="data_nasc" value="{{ old('data_nasc') }}"  required>
						</div>
					</div>
					<div class="button">
						<input type="submit" value="Registrar">
					</div>
					<p>Já possui uma conta? <a href="{{ route('login') }}"><span><i class="uil uil-sign-in-alt"></i></span>Entrar</a></p>
				</form>
			</div>
		</div>
	</body>
</html>