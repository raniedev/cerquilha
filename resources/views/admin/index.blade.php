@auth
    @include('template-top')
                <!-- PARTE CENTRO -->
                <div class="centro">
                    <div class="pagina">
                        @hasrole('admin')
                            <h2>Painel do Administrador</h2>
                            <ul>
                                <li class="tab ativo" data-tab="tab1"><i class="uil uil-analytics"></i>Estatísticas</li>
                                <li class="tab" data-tab="tab2"><i class="uil uil-ban"></i>Permissões</li>
                            </ul>
                            <div id="tab1" class="tab-conteudo ativo">
                                <div class="pagina-cabecalho">
                                    <h3 class="pagina-subtitulo">
                                        <i class="uil uil-analytics"></i>Visão Geral
                                    </h3>
                                    <h5>Confira as estatísticas gerais da plataforma:</h5>
                                </div>

                                <!-- Calcular a faixa etária dos usuários -->
                                @php
                                    $faixa_11_20 = 0;
                                    $faixa_21_30 = 0;
                                    $faixa_31_40 = 0;
                                    $faixa_41_50 = 0;
                                    $faixa_51_60 = 0;
                                    $faixa_61_mais = 0;
                                @endphp

                                @foreach ($users as $u)
                                    @php
                                        $dateOfBirth = new DateTime($u->birthday);
                                        $today = new DateTime(now());
                                        $age = $today->diff($dateOfBirth)->y;

                                        if ($age >= 11 && $age <= 20) {
                                            $faixa_11_20++;
                                        } else if ($age >= 21 && $age <= 30){
                                            $faixa_21_30++;
                                        } else if ($age >= 31 && $age <= 40){
                                            $faixa_31_40++;
                                        } else if ($age >= 41 && $age <= 50){
                                            $faixa_41_50++;
                                        } else if ($age >= 51 && $age <= 60){
                                            $faixa_51_60++;
                                        } else if ($age >= 61){
                                            $faixa_61_mais++;
                                        }
                                    @endphp
                                @endforeach

                                <div id="chart-11-20" data-count="<?php echo $faixa_11_20; ?>"></div>
                                <div id="chart-21-30" data-count="<?php echo $faixa_21_30; ?>"></div>
                                <div id="chart-31-40" data-count="<?php echo $faixa_31_40; ?>"></div>
                                <div id="chart-41-50" data-count="<?php echo $faixa_41_50; ?>"></div>
                                <div id="chart-51-60" data-count="<?php echo $faixa_51_60; ?>"></div>
                                <div id="chart-61-mais" data-count="<?php echo $faixa_61_mais; ?>"></div>

                                <div id="chart-usuarios" data-count="{{$users->count()}}"></div>
                                <div id="chart-postagens" data-count="{{$posts->count()}}"></div>
                                <div id="chart-videos" data-count="{{$videos->count()}}"></div>

                                <div id="chart-masc" data-count="{{$users->where('gender', 'M')->count()}}"></div>
                                <div id="chart-fem" data-count="{{$users->where('gender', 'F')->count()}}"></div>

                                <div id="chart-font12" data-count="{{$site_style->where('font_size', '12')->count()}}"></div>
                                <div id="chart-font14" data-count="{{$site_style->where('font_size', '14')->count()}}"></div>
                                <div id="chart-font16" data-count="{{$site_style->where('font_size', '16')->count()}}"></div>
                                <div id="chart-font18" data-count="{{$site_style->where('font_size', '18')->count()}}"></div>
                                <div id="chart-font20" data-count="{{$site_style->where('font_size', '20')->count()}}"></div>

                                <div id="chart-agua" data-count="{{$site_style->where('main_color', 'agua')->count()}}"></div>
                                <div id="chart-bosque" data-count="{{$site_style->where('main_color', 'bosque')->count()}}"></div>
                                <div id="chart-trovao" data-count="{{$site_style->where('main_color', 'trovao')->count()}}"></div>
                                <div id="chart-fogo" data-count="{{$site_style->where('main_color', 'fogo')->count()}}"></div>
                                <div id="chart-neve" data-count="{{$site_style->where('main_color', 'neve')->count()}}"></div>

                                <div id="chart-diurno" data-count="{{$site_style->where('theme', 'diurno')->count()}}"></div>
                                <div id="chart-vespertino" data-count="{{$site_style->where('theme', 'vespertino')->count()}}"></div>
                                <div id="chart-noturno" data-count="{{$site_style->where('theme', 'noturno')->count()}}"></div>

                                <div id="chart-respostas" data-count="{{$posts->where('parent_id', '<>', NULL)->count()}}"></div>
                                <div id="chart-likes" data-count="{{$likes->count()}}"></div>

                                <div id="chart-questions" data-count="{{$questions->count()}}"></div>
                                <div id="chart-like-videos" data-count="{{$like_videos->count()}}"></div>
                                
                                <div class="pagina-conteudo">
                                    <div>
                                        <canvas id="grafico-visao-geral"></canvas>
                                        <h3 class="separador">Os 10 últimos usuários registrados na plataforma:</h3>
                                        <table class="separador">
                                            <thead class="tb-menu">
                                                <tr>
                                                    <th>Nome</th>
                                                    <th>Usuário</th>
                                                    <th>Data/Hora</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $count = 1;
                                                @endphp

                                                @foreach($users->sortByDesc('created_at') as $u)
                                                    @php
                                                        $data_registro = $u->created_at;
                                                        $entrou_em = $data_registro->formatLocalized('%d/%m/%Y - %H:%M:%S');
                                                    @endphp
                                                    <tr>
                                                        <td>{{$u->name}} {{$u->lastname}}</td>
                                                        <td><a href="/user/{{$u->username}}">{{'@'.$u->username}}</a></td>
                                                        <td>{{$entrou_em}}</td>
                                                    </tr>
                                                    @php
                                                        $count++;
                                                    @endphp
                                                    @if($count > 10)
                                                        @break
                                                    @endif
                                                @endforeach
                                                <!-- Adicione mais linhas conforme necessário -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="pagina-cabecalho">
                                    <h3 class="pagina-subtitulo">
                                        <i class="uil uil-analytics"></i>Usuários
                                    </h3>
                                    <h5>Confira os detalhes dos usuários:</h5>
                                </div>
                                <div class="pagina-conteudo">
                                    <h3>Gênero</h3>
                                    <canvas id="grafico-usuarios-genero" width="100%" height="18px"></canvas>
                                    <h3 class="separador">Faixa Etária</h3>
                                    <canvas id="grafico-usuarios-idade" width="100%" height="28px"></canvas>
                                    <h3 class="separador">Seguidores</h3>
                                    <p>No momento, há {{$followers->count()}} conexões entre os usuários.</p>
                                    <h3 class="separador">Os 10 usuários que mais foram seguidos na plataforma:</h3>
                                    <table class="separador">
                                        <thead class="tb-menu">
                                            <tr>
                                                <th>Nome</th>
                                                <th>Usuário</th>
                                                <th>Qtd Seguidores</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($top_seguidos as $key => $value)
                                                <tr>
                                                    <td>{{$users->find($key)->name}} {{$users->find($key)->lastname}}</td>
                                                    <td><a href="/user/{{$users->find($key)->username}}">{{'@'.$users->find($key)->username}}</a></td>
                                                    <td>{{$value}}</td>
                                                </tr>
                                            @endforeach
                                            <!-- Adicione mais linhas conforme necessário -->
                                        </tbody>
                                    </table>
                                    <h3 class="separador">Os 10 usuários que mais seguem outros na plataforma:</h3>
                                    <table class="separador">
                                        <thead class="tb-menu">
                                            <tr>
                                                <th>Nome</th>
                                                <th>Usuário</th>
                                                <th>Qtd Seguindo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($top_seguem as $key => $value)
                                                <tr>
                                                    <td>{{$users->find($key)->name}} {{$users->find($key)->lastname}}</td>
                                                    <td><a href="/user/{{$users->find($key)->username}}">{{'@'.$users->find($key)->username}}</a></td>
                                                    <td>{{$value}}</td>
                                                </tr>
                                            @endforeach
                                            <!-- Adicione mais linhas conforme necessário -->
                                        </tbody>
                                    </table>
                                </div>

                                <div class="pagina-cabecalho">
                                    <h3 class="pagina-subtitulo">
                                        <i class="uil uil-analytics"></i>Postagens
                                    </h3>
                                    <h5>Confira os detalhes das postagens:</h5>
                                </div>
                                <div class="pagina-conteudo">
                                    <canvas id="grafico-postagens" width="100%" height="18px"></canvas>

                                    <h3 class="separador">As 10 postagens com mais comentários na plataforma:</h3>
                                    <table class="separador">
                                        <thead class="tb-menu">
                                            <tr>
                                                <th>Postagem</th>
                                                <th>Qtd Comentários</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($top_postagem_comentarios as $key => $value)
                                                @if($key != NULL)
                                                    <tr>
                                                        <td><a href="/posts/{{$key}}">/posts/{{$key}}</a></td>
                                                        <td>{{$value}}</td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                            <!-- Adicione mais linhas conforme necessário -->
                                        </tbody>
                                    </table>

                                    <h3 class="separador">As 10 postagens com mais curtidas na plataforma:</h3>
                                    <table class="separador">
                                        <thead class="tb-menu">
                                            <tr>
                                                <th>Postagem</th>
                                                <th>Qtd Curtidas</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($top_postagem_curtidas as $key => $value)
                                                <tr>
                                                    <td><a href="/posts/{{$key}}">/posts/{{$key}}</a></td>
                                                    <td>{{$value}}</td>
                                                </tr>
                                            @endforeach
                                            <!-- Adicione mais linhas conforme necessário -->
                                        </tbody>
                                    </table>
                                </div>

                                <div class="pagina-cabecalho">
                                    <h3 class="pagina-subtitulo">
                                        <i class="uil uil-analytics"></i>Vídeos
                                    </h3>
                                    <h5>Confira os detalhes dos vídeos:</h5>
                                </div>
                                <div class="pagina-conteudo">
                                    <canvas id="grafico-videos" width="100%" height="18px"></canvas>
                                    <h3 class="separador">Os 10 vídeos com mais comentários na plataforma:</h3>
                                    <table class="separador">
                                        <thead class="tb-menu">
                                            <tr>
                                                <th>Vídeo</th>
                                                <th>Qtd Comentários</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($top_duvida_videos as $key => $value)
                                                <tr>
                                                    <td><a href="/videos/{{$key}}">{{$videos->find($key)->title}}</a></td>
                                                    <td>{{$value}}</td>
                                                </tr>
                                            @endforeach
                                            <!-- Adicione mais linhas conforme necessário -->
                                        </tbody>
                                    </table>

                                    <h3 class="separador">Os 10 vídeos com mais curtidas na plataforma:</h3>
                                    <table class="separador">
                                        <thead class="tb-menu">
                                            <tr>
                                                <th>Vídeo</th>
                                                <th>Qtd Curtidas</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($top_like_videos as $key => $value)
                                                <tr>
                                                    <td><a href="/videos/{{$key}}">{{$videos->find($key)->title}}</a></td>
                                                    <td>{{$value}}</td>
                                                </tr>
                                            @endforeach
                                            <!-- Adicione mais linhas conforme necessário -->
                                        </tbody>
                                    </table>
                                </div>
                            
                                <div class="pagina-cabecalho">
                                    <h3 class="pagina-subtitulo">
                                        <i class="uil uil-analytics"></i>Customização
                                    </h3>
                                    <h5>Confira os tamanhos, cores e temas preferidos dos usuários:</h5>
                                </div>

                                <div class="pagina-conteudo">
                                    <h3>Fonte</h3>
                                    <div style="display: flex;
                                        justify-content: center;
                                        align-items: center;"
                                    >
                                        <canvas id="grafico-estilo-fonte"></canvas>
                                    </div>
                                    <h3>Cor</h3>
                                    <div style="display: flex;
                                        justify-content: center;
                                        align-items: center;"
                                    >
                                        <canvas id="grafico-estilo-cor"></canvas>
                                    </div>
                                    <h3>Tema</h3>
                                    <div style="display: flex;
                                        justify-content: center;
                                        align-items: center;"
                                    >
                                        <canvas id="grafico-estilo-tema"></canvas>
                                    </div>
                                </div>
                            </div>

                            <div id="tab2" class="tab-conteudo">
                                <div class="pagina-cabecalho">
                                    <h3 class="pagina-subtitulo">
                                        <i class="uil uil-ban"></i>Permissões
                                    </h3>
                                    <h5>Confira as permissões permitidas para cada tipo de conta:</h5>
                                </div>

                                <div class="pagina-conteudo">
                                    @foreach($roles as $role)
                                        <table class="separador">
                                            <thead class="tb-menu">
                                                <tr>
                                                    <th colspan="3">{{$role->name}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $permissoes = [];
                                                    $permitir = $role->name . '_' . 'permissoes';
                                                @endphp

                                                <form action="{{ route('admin.update', auth()->user()->id) }}" method="POST" id="{{$permitir}}">
                                                    @csrf
                                                    <!-- o método de atualização é o PUT -->
                                                    @method('PUT')
                                                    @foreach($role->permissions as $permission)
                                                        @php
                                                            $rotulo = $role->name . '_' . $permission->name;
                                                        @endphp

                                                        <tr>
                                                            <td class="sup esq">
                                                                <input type="checkbox" id="{{$rotulo}}" name="{{$rotulo}}" value="1" checked <?php echo $role->name == 'admin' ? 'disabled="disabled"' : '' ?>>
                                                                <label for="{{$rotulo}}"> {{ $permission->name }}</label><br>

                                                                @php
                                                                    array_push($permissoes, $permission->name);
                                                                @endphp
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                    @if($role->name == 'prof')
                                                        @php
                                                            $nome_checkbox = 'prof_criar_postagens';
                                                        @endphp

                                                        @if(!in_array('criar_postagens', $permissoes))
                                                            <tr>
                                                                <td class="sup esq">
                                                                    <input type="checkbox" id="{{$nome_checkbox}}" name="{{$nome_checkbox}}" value="1">
                                                                    <label for="{{$nome_checkbox}}"> criar_postagens</label><br>
                                                                </td>
                                                            </tr>
                                                        @endif

                                                        @php
                                                            $nome_checkbox = 'prof_interagir_postagens';
                                                        @endphp

                                                        @if(!in_array('interagir_postagens', $permissoes))
                                                            <tr>
                                                                <td class="sup esq">
                                                                    <input type="checkbox" id="{{$nome_checkbox}}" name="{{$nome_checkbox}}" value="1">
                                                                    <label for="{{$nome_checkbox}}"> interagir_postagens</label><br>
                                                                </td>
                                                            </tr>
                                                        @endif

                                                        @php
                                                            $nome_checkbox = 'prof_interagir_videos';
                                                        @endphp

                                                        @if(!in_array('interagir_videos', $permissoes))
                                                            <tr>
                                                                <td class="sup esq">
                                                                    <input type="checkbox" id="{{$nome_checkbox}}" name="{{$nome_checkbox}}" value="1">
                                                                    <label for="{{$nome_checkbox}}"> interagir_videos</label><br>
                                                                </td>
                                                            </tr>
                                                        @endif

                                                        @php
                                                            $nome_checkbox = 'prof_enviar_videos';
                                                        @endphp

                                                        @if(!in_array('enviar_videos', $permissoes))
                                                            <tr>
                                                                <td class="sup esq">
                                                                    <input type="checkbox" id="{{$nome_checkbox}}" name="{{$nome_checkbox}}" value="1">
                                                                    <label for="{{$nome_checkbox}}"> enviar_videos</label><br>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endif

                                                    @if($role->name == 'aluno')
                                                        @php
                                                            $nome_checkbox = 'aluno_criar_postagens';
                                                        @endphp

                                                        @if(!in_array('criar_postagens', $permissoes))
                                                            <tr>
                                                                <td class="sup esq">
                                                                    <input type="checkbox" id="{{$nome_checkbox}}" name="{{$nome_checkbox}}" value="1">
                                                                    <label for="{{$nome_checkbox}}"> criar_postagens</label><br>
                                                                </td>
                                                            </tr>
                                                        @endif

                                                        @php
                                                            $nome_checkbox = 'aluno_interagir_postagens';
                                                        @endphp

                                                        @if(!in_array('interagir_postagens', $permissoes))
                                                            <tr>
                                                                <td class="sup esq">
                                                                    <input type="checkbox" id="{{$nome_checkbox}}" name="{{$nome_checkbox}}" value="1">
                                                                    <label for="{{$nome_checkbox}}"> interagir_postagens</label><br>
                                                                </td>
                                                            </tr>
                                                        @endif

                                                        @php
                                                            $nome_checkbox = 'aluno_interagir_videos';
                                                        @endphp

                                                        @if(!in_array('interagir_videos', $permissoes))
                                                            <tr>
                                                                <td class="sup esq">
                                                                    <input type="checkbox" id="{{$nome_checkbox}}" name="{{$nome_checkbox}}" value="1">
                                                                    <label for="{{$nome_checkbox}}"> interagir_videos</label><br>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endif

                                                    <tr>
                                                        <td class="sup bot">
                                                            <input class="btn btn-border <?php echo $role->name == 'admin' ? 'btn-oculto' : '' ?>" type="submit" name="{{$role->name}}-submit" value="Salvar" <?php echo $role->name == 'admin' ? 'disabled' : '' ?>>
                                                        </td>
                                                    </tr>
                                                </form>
                                            </tbody>
                                        </table>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <h2>
                                <a href="{{ url('/home') }}">
                                    <i class="uil uil-arrow-circle-left"></i>Voltar
                                </a>
                            </h2>
                            <div class="msg-alerta msg-caixa">
                            <i class="uil uil-exclamation-triangle"></i>
                                Você não tem permissão para acessar esta página.
                            </div>
                        @endrole
                    </div>
                </div>

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                // Função para ser chamada quando o usuário trocar a cor-principal e o gráfico ser atualizado com a nova cor selecionada
                function graficoVisaoGeral() {
                    // Gráficos usando Chart.js
                    const chart_usuarios = document.getElementById('chart-usuarios').dataset.count;
                    const chart_postagens = document.getElementById('chart-postagens').dataset.count;
                    const chart_videos = document.getElementById('chart-videos').dataset.count;
                    
                    new Chart(document.getElementById("grafico-visao-geral"), {
                        type: 'bar',
                        data: {
                            labels: ["Usuários", "Postagens", "Vídeos"],
                        datasets: [{
                                label: 'Qtd',
                                backgroundColor: ['#4169E1', '#66CDAA', '#F0E68C'],
                                data: [chart_usuarios, chart_postagens, chart_videos]
                            }]
                        },
                        options: {
                            indexAxis: 'x',
                            legend: { display: false },
                        }
                    });
                }

                function graficoUsuariosGenero() {
                    // Gráficos usando Chart.js
                    const chart_masc = document.getElementById('chart-masc').dataset.count;
                    const chart_fem = document.getElementById('chart-fem').dataset.count;
                    
                    new Chart(document.getElementById("grafico-usuarios-genero"), {
                        type: 'bar',
                        data: {
                            labels: ["Masculino", "Feminino"],
                        datasets: [{
                                label: 'Qtd',
                                backgroundColor: ['#4169E1', '#DA70D6'],
                                data: [chart_masc, chart_fem]
                            }]
                        },
                        options: {
                            indexAxis: 'y',
                            legend: { display: false }
                        }
                    });
                }

                function graficoUsuariosIdade() {
                    const chart_11_20 = document.getElementById('chart-11-20').dataset.count;
                    const chart_21_30 = document.getElementById('chart-21-30').dataset.count;
                    const chart_31_40 = document.getElementById('chart-31-40').dataset.count;
                    const chart_41_50 = document.getElementById('chart-41-50').dataset.count;
                    const chart_51_60 = document.getElementById('chart-51-60').dataset.count;
                    const chart_61_mais = document.getElementById('chart-61-mais').dataset.count;
                    
                    new Chart(document.getElementById("grafico-usuarios-idade"), {
                        type: 'bar',
                        data: {
                            labels: ["11-20", "21-30", "31-40", "41-50", "51-60", "61+"],
                            datasets: [{
                            label: 'Qtd',
                            backgroundColor: ['#72bf6a', '#5bb450', '#52a447', '#46923c', '#3b8132', '#276221'],
                            data: [chart_11_20, chart_21_30, chart_31_40, chart_41_50, chart_51_60, chart_61_mais]
                            }]
                        },
                        options: {
                            indexAxis: 'y',
                            legend: { display: false }
                        }
                    });
                }

                function graficoEstiloCor() {
                    const chart_agua = document.getElementById('chart-agua').dataset.count;
                    const chart_bosque = document.getElementById('chart-bosque').dataset.count;
                    const chart_trovao = document.getElementById('chart-trovao').dataset.count;
                    const chart_fogo = document.getElementById('chart-fogo').dataset.count;
                    const chart_neve = document.getElementById('chart-neve').dataset.count;

                    new Chart(document.getElementById("grafico-estilo-cor"), {
                        type: 'doughnut',
                        data: {
                            labels: ['Água', 'Bosque', 'Trovão', 'Fogo', 'Neve'],
                            datasets: [{
                                label: 'Qtd',
                                data: [chart_agua, chart_bosque, chart_trovao, chart_fogo, chart_neve],
                                backgroundColor: ['#0073ff', '#1abc9c', '#f1c40e', '#e74d3c', '#9b58b6'],
                            }]
                        },
                        options: {
                            legend: { display: false },
                            responsive: false
                        }
                    });
                }

                function graficoEstiloTema() {
                    const chart_diurno = document.getElementById('chart-diurno').dataset.count;
                    const chart_vespertino = document.getElementById('chart-vespertino').dataset.count;
                    const chart_noturno = document.getElementById('chart-noturno').dataset.count;

                    new Chart(document.getElementById("grafico-estilo-tema"), {
                        type: 'doughnut',
                        data: {
                            labels: ['Diurno', 'Vespertino', 'Noturno'],
                            datasets: [{
                                label: 'Qtd',
                                data: [chart_diurno, chart_vespertino, chart_noturno],
                                backgroundColor: ['#F0EEF6', '#1F1B32', '#000000'],
                            }]
                        },
                        options: {
                            legend: { display: false },
                            responsive: false
                        }
                    });
                }

                function graficoEstiloFonte() {
                    const chart_font12 = document.getElementById('chart-font12').dataset.count;
                    const chart_font14 = document.getElementById('chart-font14').dataset.count;
                    const chart_font16 = document.getElementById('chart-font16').dataset.count;
                    const chart_font18 = document.getElementById('chart-font18').dataset.count;
                    const chart_font20 = document.getElementById('chart-font20').dataset.count;

                    new Chart(document.getElementById("grafico-estilo-fonte"), {
                        type: 'doughnut',
                        data: {
                            labels: ['12px', '14px', '16px', '18px', '20px'],
                            datasets: [{
                                label: 'Qtd',
                                data: [chart_font12, chart_font14, chart_font16, chart_font18, chart_font20],
                                backgroundColor: ['#8B4513', '#A0522D', '#CD853F', '#F4A460', '#F5DEB3'],
                            }]
                        },
                        options: {
                            legend: { display: false },
                            responsive: false
                        }
                    });
                }

                function graficoPostagens() {
                    const chart_respostas = document.getElementById('chart-respostas').dataset.count;
                    const chart_likes = document.getElementById('chart-likes').dataset.count;
                    
                    new Chart(document.getElementById("grafico-postagens"), {
                        type: 'bar',
                        data: {
                            labels: ["Comentários", "Curtidas"],
                            datasets: [{
                                label: 'Qtd',
                                backgroundColor: ['#aa99c5', '#de3163'],
                                data: [chart_respostas, chart_likes]
                            }]
                        },
                        options: {
                            indexAxis: 'y',
                            legend: { display: false }
                        }
                    });
                }

                function graficoVideos() {
                    const chart_questions = document.getElementById('chart-questions').dataset.count;
                    const chart_like_videos = document.getElementById('chart-like-videos').dataset.count;
                    
                    new Chart(document.getElementById("grafico-videos"), {
                        type: 'bar',
                        data: {
                            labels: ["Comentários", "Curtidas"],
                            datasets: [{
                                label: 'Qtd',
                                backgroundColor: ['#aa99c5', '#de3163'],
                                data: [chart_questions, chart_like_videos]
                            }]
                        },
                        options: {
                            indexAxis: 'y',
                            legend: { display: false }
                        }
                    });
                }


                // Para executar pelo menos 1x a função gráfico
                graficoVisaoGeral();
                graficoUsuariosGenero();
                graficoUsuariosIdade();

                graficoEstiloCor();
                graficoEstiloTema();
                graficoEstiloFonte();

                graficoPostagens();
                graficoVideos();

                </script>
    @include('template-bot')
@endauth

@include('partials.guest')