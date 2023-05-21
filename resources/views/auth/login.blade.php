<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Entrar - CERQUILHA</title>

		<!-- jquery - link cdn -->
		<!-- <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script> -->
		<script src="./js/3.6.3-jquery.min.js"></script>

		<link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css">
		<link rel="stylesheet" href="./css/entrar.css">

		<!-- código javascript -->
		<script>		
			$(document).ready( function(){
				const iconeOlho = document.querySelector(".icone-olho");
				const campoSenha = document.querySelector(".campo-senha");

				$(".icone-olho").click(function() {					
					if (iconeOlho.classList.value == "icone-olho uil uil-eye") {
						iconeOlho.classList.remove("uil-eye");
						iconeOlho.classList.add("uil-eye-slash");
					} else {
						iconeOlho.classList.remove("uil-eye-slash");
						iconeOlho.classList.add("uil-eye");
					}

					if (campoSenha.type == "password") {
						campoSenha.type = "text";
					} else {
						campoSenha.type = "password";
					}
				});

				// verificar se os campos de usuário e senha foram devidamente preenchidos
				$('#btn_login').click( function(){

					// variável de controle
					var campo_vazio = false;

					if ($('#campo_usuario').val() == '') {

						// caso o campo esteja vazio, iremos alterar a cor das bordas para vermelho como um alerta
						$('#campo_usuario').css({'border-color': '#A94442'});
						campo_vazio = true;
					} else {

						// se o campo for preenchido ele volta pra cor padrão
						$('#campo_usuario').css({'border-color': '#CCC'});
					}

					if ($('#campo_senha').val() == '') {
						$('#campo_senha').css({'border-color': '#A94442'});
						campo_vazio = true;
					} else {
						$('#campo_usuario').css({'border-color': '#CCC'});
					}

					// caso o campo_vazio for true, será interrompido o envio do formulário com o return false, pois sem isso o form. era enviado antes de alterar a cor da borda ;-;
					if (campo_vazio) {
						return false;
					}
				})

			})

		</script>
	</head>

	<body class="entrar">
		<div class="container">
			<div class="caixa esquerda">
				<h1>Seja Bem-vindo!</h1>
				<ul>
					<li><p>Assista vídeo aulas</p></li>
					<li><p>Conecte-se com outros usuários</p></li>
					<li><p>Site totalmente responsivo</p></li>
				</ul>
			</div>
			<div class="caixa direita">
				<!-- ÁREA DE LOGAR -->
				<div class="formulario-entrar">
					<div class="titulo">
						<img src="./images/logo-64.png"> Entrar
					</div>
					<div class="content">
						<form method="POST" action="{{ route('login') }}">
							@csrf
							<img class="login" src="./images/login.png">

							<h3>Insira suas credenciais:</h3>
							<span class="login-feedback">
								<!-- Tratamento de Erros -->

								@error ('email')
									Credenciais inválidas, tente novamente.
								@enderror

								@error ('password')
									Senha inválida, tente novamente.
								@enderror
							</span>
							
							<div class="formulario-info">
								<div class="divisor">
									<input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
									<input type="password" name="password" class="campo-senha" placeholder="Senha" required>
									<span><i class="icone-olho uil uil-eye"></i></span>
									<!-- Remember Me -->
									<div class="block mt-4 lembrarme">
										<label for="remember_me" class="inline-flex items-center">
											<input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
											<span class="ml-2 text-sm text-gray-600">{{ __('Lembrar-me') }}</span>
										</label>
									</div>
                                    <input class="botao" type="submit" value="Entrar">
								</div>
                                <p>
									<!-- <span class="entrar-icone"><i class="uil uil-key-skeleton-alt"></i></span><a href="{{ route('password.request') }}">Recuperar Senha</a> -->
                                <span class="entrar-icone"><i class="uil uil-user"></i></span><a href="{{ route('register') }}">Registrar Usuário</a></p>
							</div>
                            <a class="entrar-google" href="{{ route('google.login') }}">
                                <span class="login-auth"><i class="uil uil-google"></i></span>
                            </a>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>