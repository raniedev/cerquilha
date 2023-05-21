<button id="seta-abrir" class="icone-auxiliar mostrar-ocultar-direita" onclick="mostrarDireita()"><i class="uil uil-arrow-left"></i></button>
                    <button id="seta-fechar" class="icone-auxiliar mostrar-ocultar-direita" onclick="ocultarDireita()"><i class="uil uil-arrow-right"></i></button>
                    <div class="painel-direita">
                        <div class="usuarios">
                            <div class="heading">
                                <h4>Usuários</h4><i class="uil uil-user"></i>
                            </div>

                            <!-- código javascript -->
                            <!-- <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script> -->

                            <!-- Barra de pesquisa para procurar usuários -->
							<form id="form-procurar-usuario" class="procurar-usuario" action="{{ route('search.users') }}" method="GET">
								<button class="btn btn-pesquisa"><i class="uil uil-search"></i></button>
								@if(isset($termUsers))
									<input type="search" name="query" value="{{$termUsers}}" placeholder="Procurar Usuário" maxlength="32">
								@else
									<input type="search" name="query" placeholder="Procurar Usuário" maxlength="32">
								@endif
							</form>

							<div class="heading">
                                <h4>Vídeos</h4><i class="uil uil-video"></i>
                            </div>

							<form id="form-procurar-video" class="procurar-usuario" action="{{ route('search.videos') }}" method="GET">
								<button class="btn btn-pesquisa"><i class="uil uil-search"></i></button>
								@if(isset($termVideos))
									<input type="search" name="query" value="{{$termVideos}}" placeholder="Procurar Vídeo" maxlength="32">
								@else
									<input type="search" name="query" placeholder="Procurar Vídeo" maxlength="32">
								@endif
							</form>

                            <!-- Barra de pesquisa para filtrar usuários -->
                            <!-- <div class="procurar-usuario filtrar-usuario">
                            <button class="btn btn-pesquisa" type="button" id="procurar_usuario"><i class="uil uil-filter"></i></button>
                                <input type="search" placeholder="Filtrar Nome" id="filtrar-usuario">
                            </div> -->

                            <!-- Filtragem -->
                            <!-- <div class="category">
                                <h6 class="ativo">Resultado Pesquisa</h6>
                                <h6 class="message-requests">A-Z</h6>
                                <h6 class="message-requests">Z-A</h6>
                            </div> -->

                            <!-- div que conterá a lista de exibição de usuários de acordo com a pesquisa -->
                            <div id="usuarios">

                            </div>
                        </div>
                        <!-- Friend Requests -->
                        <div class="ferramentas">
                            <h4>Ferramentas</h4>
                            <div class="tabela">
                                <ul>
                                    <li><i class="uil uil-calculator-alt"></i>Calculadora</li>
									<div class="calculator">
										<div class="row">
											<button class="number" value="7">7</button>
											<button class="number" value="8">8</button>
											<button class="number" value="9">9</button>
											<button class="operator" value="+">+</button>
										</div>
										<div class="row">
											<button class="number" value="4">4</button>
											<button class="number" value="5">5</button>
											<button class="number" value="6">6</button>
											<button class="operator" value="-">-</button>
										</div>
										<div class="row">
											<button class="number" value="1">1</button>
											<button class="number" value="2">2</button>
											<button class="number" value="3">3</button>
											<button class="operator" value="*">x</button>
										</div>
										<div class="row">
											<button class="clear" value="C">C</button>
											<button class="number" value="0">0</button>
											<button class="equal" value="=">=</button>
											<button class="operator" value="/">÷</button>
										</div>
										<div class="row">
											<input id="result" type="text" readonly>
										</div>
									</div>                               
                                    <!-- <li><i class="uil uil-book-alt"></i>Dicionário</li>
                                    <li><i class="uil uil-globe"></i>Tradutor</li> -->
                                </ul>
                            </div>
                        </div>

                    </div>
                    <!-- End Right -->