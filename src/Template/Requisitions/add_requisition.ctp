<div class="row">
    <div class="col-md-12" style="height: 200%;">
        <div class="box">
            <div class="box-header">

                <div class="col-sm-8">
                    <h3 class="box-title">Cadastrar Requisição</h3>
                </div>

            </div>
            <div class="box-body">


                <!-- segundo menu-->
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#data" data-toggle="tab">Data</a></li>
                        <li><a href="#pericia" data-toggle="tab">Pericia</a></li>
                        <li><a href="#distribuicao" data-toggle="tab">Distribuição</a></li>
                        <li><a href="#veiculo" data-toggle="tab">Veiculo</a></li>
                        <li><a href="#numeroDocumentos" data-toggle="tab">Número de documentos</a></li>
                        <li><a href="#delegacia" data-toggle="tab">Delegacia</a></li>
                        <li><a href="#crime" data-toggle="tab">Crime</a></li>
                        <li><a href="#vitima" data-toggle="tab">Vítima</a></li>
                        <li><a href="#observacoes" data-toggle="tab">Observações</a></li>

                    </ul>
                    <?= $this->Form->create(null, ['url' => ['controller' => 'Requisitions', 'action' => 'add'], 'id' => 'theForm']); ?>
                    <div class="tab-content">
                        <!-- data-->
                        <div class="active tab-pane" id="data">


                            <div class="col-sm-3 pad_entry_book">
                                <label>Data documento</label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <?= $this->Form->input('data_documento', [
                                        'class' => 'form-control datemask', 'type' => 'text', 'label' => false, "id" => "data_doc"
                                    ]) ?>
                                </div>
                            </div>

                            <div class="col-sm-3 pad_entry_book">
                                <label>Data recebimento</label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <?= $this->Form->input('data_recebimento', [
                                        'class' => 'form-control datemask', 'type' => 'text', 'label' => false
                                    ]) ?>
                                </div>
                            </div>

                            <div class="col-sm-3 pad_entry_book">
                                <label>Data realização perícia</label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <?= $this->Form->input('data_realizacao_pericia', [
                                        'class' => 'form-control datemask', 'type' => 'text', 'label' => false
                                    ]) ?>
                                </div>
                            </div>



                        </div>
                        <!-- data-->


                        <!-- pericia-->
                        <div class="tab-pane" id="pericia">

                            <div class="col-sm-4 pad_entry_book">
                                <label>Tipo de perícia</label>
                                <?= $this->Form->select(
                                    'tipo_pericia',
                                    [
                                        '' => '',
                                        'Balística, Instrumentos e Outros' => 'Balística, Instrumentos e Outros',
                                        'Comunicação Interna' => 'Comunicação Interna',
                                        'Crimes Ambientais' => 'Crimes Ambientais',
                                        'Crimes Contra a Vida' => 'Crimes Contra a Vida',
                                        'Crimes Contra o Patrimônio' => 'Crimes Contra o Patrimônio',
                                        'Documentoscopia' => 'Documentoscopia',
                                        'Trânsito' => 'Trânsito',
                                        'Outras Perícias' => 'Outras Perícias',
                                        'Outros' => 'Outros'
                                    ],
                                    ['class' => 'form-control select1', 'name' => 'tipo_pericia', 'id' => 'tipo_pericia']
                                ) ?>
                            </div>

                            <div class="col-sm-4 pad_entry_book">
                                <label>Exame</label>
                                <select name="exame_pericia" id="exame_pericia" class="form-control select1"></select>
                            </div>

                            <?= $this->Form->exame_pericia ?>

                            <div class="col-sm-8 pad_entry_book">
                                <label>Descrição</label>
                                <?= $this->Form->textarea('descricao', [
                                    'class' => 'form-control',
                                    "placeholder" => "descrição...", 'label' => false
                                ]) ?>
                            </div>

                        </div>
                        <!-- pericia-->

                        <!-- distribuicao-->
                        <div class="tab-pane" id="distribuicao">

                            <div class="col-sm-4 pad_entry_book" id="div-ocorrencia">
                                <div id='div-sel-ocorrencia'>
                                    <label>Tipo ocorrência</label>
                                    <select name="tipo_ocorrencia" id="tipo_ocorrencia" class="form-control select1" onchange="ocorrencia()">
                                        <option value="interna" selected>Interna</option>
                                        <option value="externa">Externa</option>
                                        <option value="interna_outras">Interna - Outras</option>
                                    </select>
                                </div>
                            </div>

                            <div id="select_tipo" class="col-sm-4 pad_entry_book">

                                <label>Perito responsavel</label>
                                <div id="inputSelect">
                                    <button class="btn btn-success form-control" type='button' onclick="sortear('<?= $this->Session->read('Auth.User.token') ?>')">Sortear Perito</button>
                                </div>
                            </div>




                        </div>
                        <!-- distribuicao-->


                        <!-- veiculo-->
                        <div class="tab-pane" id="veiculo">

                            <div class="col-sm-12 pad_entry_book">
                                <button type="button" class="btn btn-primary" onclick="insertVehicle()">Adicionar veículo</button>
                            </div>




                            <div id="insert-vehicles">
                                <?php $contador = 0 ?>
                                <div id="<?= 'vehicles' . $contador ?>">
                                    <div class="col-sm-2 pad_entry_book">
                                        <label>Marca</label>
                                        <select name="vehicles[]" class="form-control select1">
                                            <option selected="selected"></option>
                                            option selected="selected"></option>
                                            <option>Agrale</option>
                                            <option>Aston Martin</option>
                                            <option>Audi</option>
                                            <option>Bentley</option>
                                            <option>BMW</option>
                                            <option>Changan</option>
                                            <option>Chery</option>
                                            <option>Chevrolet</option>
                                            <option>Chrysler</option>
                                            <option>Citroën</option>
                                            <option>Dodge</option>
                                            <option>Effa</option>
                                            <option>Ferrari</option>
                                            <option>Fiat</option>
                                            <option>Ford</option>
                                            <option>Geely</option>
                                            <option>General Motors</option>
                                            <option>Hafei</option>
                                            <option>Honda</option>
                                            <option>Hyundai</option>
                                            <option>Iveco</option>
                                            <option>Jac Motors</option>
                                            <option>Jaguar</option>
                                            <option>Jeep</option>
                                            <option>Jinbei</option>
                                            <option>Kia</option>
                                            <option>Lamborghini</option>
                                            <option>Land Rover</option>
                                            <option>Lexus</option>
                                            <option>Lifan</option>
                                            <option>Mahindra</option>
                                            <option>Maserati</option>
                                            <option>Mercedes-Benz</option>
                                            <option>MG Motors</option>
                                            <option>Mini</option>
                                            <option>Mitsubishi</option>
                                            <option>Nissan</option>
                                            <option>Peugeot</option>
                                            <option>Porsche</option>
                                            <option>Ram</option>
                                            <option>Renault</option>
                                            <option>Smart</option>
                                            <option>Ssangyong</option>
                                            <option>Subaru</option>
                                            <option>Suzuki</option>
                                            <option>Tesla</option>
                                            <option>Toyota</option>
                                            <option>Troller</option>
                                            <option>Volkswagen</option>
                                            <option>Volvo</option>
                                            <option>Yamaha</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-3 pad_entry_book">
                                        <label>Cor</label>

                                        <div>
                                            <input name="vehicles[]" type="text" class="form-control" id="inputName" placeholder="Cor">
                                        </div>
                                    </div>

                                    <div class="col-sm-3 pad_entry_book">
                                        <label>Placa</label>

                                        <div>
                                            <input name="vehicles[]" type="text" class="form-control placa" id="inputName" placeholder="Placa">
                                        </div>
                                    </div>
                                    <div class="col-sm-3 pad_entry_book">
                                        <label>Tipo veículo</label>

                                        <div>
                                            <input name="vehicles[]" type="text" class="form-control" id="inputName" placeholder="Tipo veículo">
                                        </div>
                                    </div>

                                    <div class="col-sm-1 pad_entry_book">
                                        <label>Deletar </label>

                                        <div>
                                            <button type="button" class="btn btn-danger" onclick="removeVehicle('<?= 'vehicles' . $contador ?>')"><i class="text-white fa fa-minus"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <script>
                                var cont1 = <?= $contador + 1 ?>;

                                function insertVehicle() {
                                    $("#insert-vehicles").append("<div id='vehicles" + cont1 + "' ><div class='col-sm-2 pad_entry_book'>" +
                                        "<label>Marca</label>" +
                                        "<select name='vehicles[]' class='form-control select1'>" +
                                        "<option selected='selected'></option>" +
                                        "<option>Agrale</option>" +
                                        "<option>Aston Martin</option>" +
                                        "<option>Audi</option>" +
                                        "<option>Bentley</option>" +
                                        "<option>BMW</option>" +
                                        "<option>Changan</option>" +
                                        "<option>Chery</option>" +
                                        "<option>Chevrolet</option>" +
                                        "<option>Chrysler</option>" +
                                        "<option>Citroën</option>" +
                                        "<option>Dodge</option>" +
                                        "<option>Effa</option>" +
                                        "<option>Ferrari</option>" +
                                        "<option>Fiat</option>" +
                                        "<option>Ford</option>" +
                                        "<option>Geely</option>" +
                                        "<option>General Motors</option>" +
                                        "<option>Hafei</option>" +
                                        "<option>Honda</option>" +
                                        "<option>Hyundai</option>" +
                                        "<option>Iveco</option>" +
                                        "<option>Jac Motors</option>" +
                                        "<option>Jaguar</option>" +
                                        "<option>Jeep</option>" +
                                        "<option>Jinbei</option>" +
                                        "<option>Kia</option>" +
                                        "<option>Lamborghini</option>" +
                                        "<option>Land Rover</option>" +
                                        "<option>Lexus</option>" +
                                        "<option>Lifan</option>" +
                                        "<option>Mahindra</option>" +
                                        "<option>Maserati</option>" +
                                        "<option>Mercedes-Benz</option>" +
                                        "<option>MG Motors</option>" +
                                        "<option>Mini</option>" +
                                        "<option>Mitsubishi</option>" +
                                        "<option>Nissan</option>" +
                                        "<option>Peugeot</option>" +
                                        "<option>Porsche</option>" +
                                        "<option>Ram</option>" +
                                        "<option>Renault</option>" +
                                        "<option>Smart</option>" +
                                        "<option>Ssangyong</option>" +
                                        "<option>Subaru</option>" +
                                        "<option>Suzuki</option>" +
                                        "<option>Tesla</option>" +
                                        "<option>Toyota</option>" +
                                        "<option>Troller</option>" +
                                        "<option>Volkswagen</option>" +
                                        "<option>Volvo</option>" +
                                        "<option>Yamaha</option>" +
                                        "</select>" +
                                        "</div>" +

                                        "<div class='col-sm-3 pad_entry_book'>" +
                                        "<label>Cor</label>" +

                                        "<div>" +
                                        "<input name='vehicles[]' type='text' class='form-control' id='inputName' placeholder='cor'>" +
                                        "</div>" +
                                        "</div>" +

                                        "<div class='col-sm-3 pad_entry_book'>" +
                                        "<label>Placa</label>" +

                                        "<div>" +
                                        "<input name='vehicles[]' type='text' class='form-control placa' id='inputName' placeholder='placa'>" +
                                        "</div>" +
                                        "</div>" +

                                        "<div class='col-sm-3 pad_entry_book'>" +
                                        "<label>Tipo veículo</label>" +
                                        "<div>" +
                                        "<input name='vehicles[]' type='text' class='form-control' id='inputName' placeholder='Tipo veículo'>" +
                                        "</div>" +
                                        "</div>" +


                                        "<div class='col-sm-1 pad_entry_book'>" +
                                        "<label>Deletar </label>" + "<div>" +
                                        "<button type='button' class='btn btn-danger' onclick='removeVehicle(" + "\"vehicles" + cont1 + "\"" + ")'><i class='text-white fa fa-minus'></i></button>" +
                                        "</div>" +
                                        "</div>" +
                                        "</div>");
                                    cont1++;

                                    $('.placa').mask('ZZZZZZZ', {
                                        translation: {
                                            'Z': {
                                                pattern: /[0-9a-zA-Z]/,
                                                optional: true
                                            }
                                        }
                                    });
                                }

                                function removeVehicle(vehicles) {
                                    $('#' + vehicles + '').remove();
                                }
                            </script>



                        </div>
                        <!-- veiculo-->

                        <!-- numeroDocumentos-->
                        <div class="tab-pane" id="numeroDocumentos">

                            <div class="col-sm-3 pad_entry_book">
                                <label>Tipo</label>

                                <?= $this->Form->select(
                                    'tipo',
                                    [
                                        'Autos' => 'Autos',
                                        'Mememorando' => 'Mememorando',
                                        'Ofício' => 'Ofício',
                                        'Requisição' => 'Requisição'
                                    ],
                                    ['class' => 'form-control select1', 'empty' => 'Tipo', 'label' => false]
                                ) ?>

                            </div>

                            <div class="col-sm-3 pad_entry_book">
                                <label>Nº Documento</label>

                                <div>
                                    <?= $this->Form->input('n_documento', [
                                        'class' => 'form-control doc', 'type' => 'text',
                                        'label' => false, "placeholder" => "Nº Documento"
                                    ]) ?>
                                </div>
                            </div>

                            <div class="col-sm-3 pad_entry_book">
                                <label>B.O. nº</label>

                                <div>
                                    <?= $this->Form->input('n_bo', [
                                        'class' => 'form-control doc', 'type' => 'text',
                                        'label' => false, "placeholder" => "B.O. nº"
                                    ]) ?>
                                </div>
                            </div>

                            <div class="col-sm-3 pad_entry_book">
                                <label>I.P. nº</label>

                                <div>
                                    <?= $this->Form->input('n_ip', [
                                        'class' => 'form-control doc', 'type' => 'text',
                                        'label' => false, "placeholder" => "I.P. nº"
                                    ]) ?>
                                </div>
                            </div>
                            <div class="col-sm-3 pad_entry_book">
                                <label>Outros Procedimentos</label>

                                <div>
                                    <?= $this->Form->input('outros_proc', [
                                        'class' => 'form-control', 'type' => 'text',
                                        'label' => false, "placeholder" => "Outros Procedimentos"
                                    ]) ?>
                                </div>
                            </div>

                            <div class="col-sm-3 pad_entry_book">
                                <label>Nº Laudos Expedidos</label>
                                <div>
                                    <?= $this->Form->input('n_laudos_expedidos', [
                                        'class' => 'form-control', 'type' => 'text',
                                        'label' => false, "placeholder" => "Nº Laudos Expedidos"
                                    ]) ?>
                                </div>
                            </div>

                            <div class="col-sm-3 pad_entry_book">
                                <label>Nº Ofício</label>
                                <div>
                                    <?= $this->Form->input('n_oficio', [
                                        'class' => 'form-control doc', 'type' => 'text',
                                        'label' => false, "placeholder" => "Nº Ofício"
                                    ]) ?>
                                </div>
                            </div>

                            <div class="col-sm-3 pad_entry_book">
                                <label>Descrição Oficio</label>
                                <div>
                                    <?= $this->Form->input('descricao_oficio', [
                                        'class' => 'form-control', 'type' => 'text',
                                        'label' => false, "placeholder" => "Descrição..."
                                    ]) ?>
                                </div>
                            </div>

                        </div>
                        <!-- numeroDocumentos-->


                        <!-- delegacia-->
                        <div class="tab-pane" id="delegacia">



                            <div class="col-sm-4 pad_entry_book">
                                <label>Delegacia</label>

                                <?= $this->Form->select(
                                    'delegacia',
                                    [
                                        '1ª DP Paranaíba' => '1ª DP Paranaíba',
                                        'Aparecida do Taboado' => 'Aparecida do Taboado',
                                        'Camapuã' => 'Camapuã',
                                        'Campo Grande' => 'Campo Grande',
                                        'Cassilândia' => 'Cassilândia',
                                        'Chapadão do Sul' => 'Chapadão do Sul',
                                        'Costa Rica' => 'Costa Rica',
                                        'DAM' => 'DAM',
                                        'Defensoria Paranaíba' => 'Defensoria Paranaíba',
                                        'Figueirão' => 'Figueirão',
                                        'Forum' => 'Forum',
                                        'IC' => 'IC',
                                        'IALF' => 'IALF',
                                        'Inocência' => 'Inocência',
                                        'Juiz de Direito' => 'Juiz de Direito',
                                        'Paraíso das Aguas' => 'Paraíso das Aguas',
                                        'Polícia Militar' => 'Outros',
                                        'Promotoria' => 'Promotoria'
                                    ],
                                    ['class' => 'form-control select1', 'empty' => 'Delegacia', 'label' => false]
                                ) ?>


                            </div>



                            <div class="col-sm-4 pad_entry_book">
                                <label>Autoridade Requisitante</label>
                                <?= $this->Form->input('autoridade_requisitante', [
                                    'class' => 'form-control', 'type' => 'text',
                                    'label' => false, "placeholder" => "Autoridade Requisitante"
                                ]) ?>
                            </div>





                            <div class="col-sm-4 pad_entry_book">
                                <label>Escrivão</label>
                                <div>
                                    <?= $this->Form->input('escrivao', [
                                        'class' => 'form-control', 'type' => 'text',
                                        'label' => false, "placeholder" => "Escrivão"
                                    ]) ?>
                                </div>
                            </div>


                        </div>
                        <!-- delegacia-->

                        <!-- crime-->
                        <div class="tab-pane" id="crime">



                            <div class="col-sm-4 pad_entry_book">
                                <label>Tipo Logradouro</label>

                                <?= $this->Form->select(
                                    'tipo_logradouro',
                                    [
                                        'Rua' => 'Rua',
                                        'Avenida' => 'Avenida',
                                        'Bifurcação' => 'Bifurcação',
                                        'Entroncamento' => 'Entroncamento',
                                        'Estrada' => 'Estrada',
                                        'Fazenda' => 'Fazenda',
                                        'Rodovia' => 'Rodovia',
                                        'Rotatória' => 'Rotatória',
                                        'Travessa' => 'Travessa'
                                    ],
                                    ['class' => 'form-control select1', 'empty' => 'Tipo Logradouro', 'label' => false]
                                ) ?>

                            </div>

                            <div class="col-sm-4 pad_entry_book">
                                <label>Logradouro</label>
                                <div>
                                    <?= $this->Form->input('logradouro', [
                                        'class' => 'form-control', 'type' => 'text',
                                        'label' => false, "placeholder" => "Logradouro"
                                    ]) ?>
                                </div>
                            </div>

                            <div class="col-sm-4 pad_entry_book">
                                <label>Número</label>
                                <div>
                                    <?= $this->Form->input('nmr_logradouro', [
                                        'class' => 'form-control', 'type' => 'text',
                                        'label' => false, "placeholder" => "Número"
                                    ]) ?>
                                </div>
                            </div>

                            <div class="col-sm-4 pad_entry_book">
                                <label>Bairro</label>
                                <div>
                                    <?= $this->Form->input('bairro', [
                                        'class' => 'form-control', 'type' => 'text',
                                        'label' => false, "placeholder" => "Bairro"
                                    ]) ?>
                                </div>
                            </div>
                            <div class="col-sm-4 pad_entry_book">
                                <label>Cidade</label>
                                <div>
                                    <?= $this->Form->input('cidade', [
                                        'class' => 'form-control', 'type' => 'text',
                                        'label' => false, "placeholder" => "cidade"
                                    ]) ?>
                                </div>
                            </div>


                        </div>
                        <!-- crime-->

                        <!-- vitima-->
                        <div class="tab-pane" id="vitima">

                            <div class="col-sm-12 pad_entry_book">
                                <button type="button" class="btn btn-primary" onclick="insertVictim()">Adicionar vítima</button>
                            </div>

                            <div id="insert-row">
                                <?php $contadorVictim = 0 ?>

                                <div id="<?= 'victim' . $contadorVictim ?>">
                                    <div class="col-sm-3 pad_entry_book">
                                        <label>Vítima</label>
                                        <div>
                                            <input name="victim[]" class="form-control" id="inputName" placeholder="vítima">
                                        </div>
                                    </div>
                                    <div class="col-sm-1 pad_entry_book">
                                        <label>Deletar</label>
                                        <div>
                                            <button type="button" class="btn btn-danger" onclick="removeVictim('<?= 'victim' . $contadorVictim ?>')"><i class="text-white fa fa-minus"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <?= $this->Form->victim ?>

                            </div>

                            <script>
                                var cont = <?= $contadorVictim + 1 ?>;

                                function insertVictim() {
                                    $("#insert-row").append("<div id='victim" + cont + "'>" +
                                        "<div class='col-sm-3 pad_entry_book'>" +
                                        "<label>Vítima</label>" +
                                        "<div>" +
                                        "<input name='victim[]' class='form-control' id='inputName' placeholder='vítima'>" +
                                        "</div>" +
                                        "</div>" +
                                        "<div class='col-sm-1 pad_entry_book'>" +
                                        "<label>Deletar </label>" +
                                        "<div>" +
                                        "<button type='button' class='btn btn-danger' onclick='removeVictim(" + "\"victim" + cont + "\"" + ")'><i class='text-white fa fa-minus'></i></button>" +
                                        "</div>" +
                                        "</div>" +
                                        "</div>"
                                    );
                                    cont++;
                                }

                                function removeVictim(victim) {
                                    $('#' + victim + '').remove();
                                }
                            </script>
                        </div>
                        <!-- vitima-->


                        <!-- observacoes-->
                        <div class="tab-pane" id="observacoes">


                            <div class="col-sm-6 pad_entry_book">
                                <label>Observações</label>
                                <?= $this->Form->textarea('observacoes', [
                                    'class' => 'form-control',
                                    'label' => false, "placeholder" => "Observações"
                                ]) ?>
                            </div>

                        </div>
                        <!-- observacoes-->

                    </div>
                </div>
                <!-- segundo menu-->

                <div class="col-sm-12 pad_entry_book">
                    <button class="btn btn-success" type="button" onclick="verifica()">Salvar</button>
                    <?= $this->Html->link(
                        'Sair',
                        ['controller' => 'Pages', 'action' => 'requisition'],
                        ['class' => 'btn btn-danger']
                    ) ?>
                </div>

                <?= $this->Form->end() ?>
            </div>
            <!-- requisition-->
        </div>
        <!-- /.tab-content -->
    </div>
    <!-- /.nav-tabs-custom -->
</div>

<script type='text/javascript'>
    var user = null

    let tipo_pericia = document.querySelector('#tipo_pericia');
    let secao0 = [""];
    let secao1 = ["Exame em Armas de Fogo", "Exame em Munições", "Exames em Armas Brancas", "Exame em Outros Instrumentos", "Exames Químicos / Bioquímicos", "Exame Resioduográfico"];
    let secao2 = ["Comunicação Interna"];
    let secao3 = ["Incêndio em Mata", "Desmatamento e Assoreameto de Rio", "Incêndio em Veículo", "Exame em Pescado", "Outros Exames Crimes Ambientais"];
    let secao4 = ["Homicídio", "Suicídio", "Cadáveres Encontrados", "Vistoria em Local - Tentativa de Homicídio", "Vistoria em Local - Tentativa de Suicídio", "Vistoria em Local - Vestígios de Tiro", "Acidentes de Trabalho", "Outros Exames - Crimes Contra a Vida"];
    let secao5 = ["Exame em Local de Furto", "Vistoria em Veículo Furto", "Vistoria em Local Incêndio", "Exame em Local de Furto de Energia Elétrica", "Exame em Local de Danos Materiais", "Autos de Avaliação"];
    let secao6 = ["Exame Grafotécnico", "Exame em Documentos", "Outros Exames Documentoscopia"];
    let secao7 = ["Acidente de Trânsito com Vítima Fatal", "Acidente de Trânsito com Vítima Lesão Corporal", "Acidente de Trânsito com Veículo Oficial", "Vistoria em Veículos Envolvidos em Acidente de Trânsito", "Vistoria em local Relacionado com Acidente de Trânsito", "Outros Exames - Trânsito"];
    let secao8 = ["Exame Metalográfico", "Vistoria em Veículos", "Exame Preliminar de Constatação de Entorpecentes", "CDs e DVDs","Degravação de Áudio", "Telefone Celular - Transcrição de Dados", "Objetos"];
    let secao9 = ["Reconstituições", "Exame de Corpo de Delito Indireto", "Outros Exames"];


    tipo_pericia.addEventListener('change', () => {
        switch (tipo_pericia.value) {
            case "":
                criaSelect(secao0);
                break;
            case "Balística, Instrumentos e Outros":
                criaSelect(secao1);
                break;
            case "Comunicação Interna":
                criaSelect(secao2);
                break;
            case "Crimes Ambientais":
                criaSelect(secao3);
                break;
            case "Crimes Contra a Vida":
                criaSelect(secao4);
                break;
            case "Crimes Contra o Patrimônio":
                criaSelect(secao5);
                break;
            case "Documentoscopia":
                criaSelect(secao6);
                break;
            case "Trânsito":
                criaSelect(secao7);
                break;
            case "Outras Perícias":
                criaSelect(secao8);
                break;
            case "Outros":
                criaSelect(secao9);
                break;
        }
    });

    function limpaSelect(selectbox) {
        var i;
        for (i = selectbox.options.length - 1; i >= 0; i--) {
            selectbox.remove(i);
        }
    }

    function criaOption(elemento) {
        let selectSecaoEscolhida = document.querySelector('#exame_pericia');
        let criaElementoOption = document.createElement('option');
        let insereSelect = selectSecaoEscolhida.appendChild(criaElementoOption);
        criaElementoOption.textContent = elemento;
    }

    function comparaSecoes(primeiraSecao, segundaSecao) {
        if (primeiraSecao == segundaSecao) {
            primeiraSecao.forEach((elemento) => {
                criaOption(elemento);
            });
        }
    }

    function criaSelect(tipo_pericia) {
        limpaSelect(document.querySelector('#exame_pericia'));

        comparaSecoes(tipo_pericia, secao0);
        comparaSecoes(tipo_pericia, secao1);
        comparaSecoes(tipo_pericia, secao2);
        comparaSecoes(tipo_pericia, secao3);
        comparaSecoes(tipo_pericia, secao4);
        comparaSecoes(tipo_pericia, secao5);
        comparaSecoes(tipo_pericia, secao6);
        comparaSecoes(tipo_pericia, secao7);
        comparaSecoes(tipo_pericia, secao8);
        comparaSecoes(tipo_pericia, secao9);
    }


    function ocorrencia() {

        let tipo_ocorrencia = document.querySelector('#tipo_ocorrencia');
        switch (tipo_ocorrencia.value) {
            case "interna":
                deleteSelect();
                criaSel();
                break;
            case "externa":
                deleteSelect();
                criaInput();
                break;
            case "interna_outras":
                deleteSelect();
                criaInput2();
                break;
        }
    }


    function criaSel() {
        if (this.user === null) {
            $("#select_tipo").append(
                "<div id='inputSelect'>" +
                '<button class="btn btn-success form-control" type="button" onclick="sortear(' + '\'' + '<?= $this->Session->read("Auth.User.token") ?>' + '\'' + ')">Sortear Perito</button>' +
                "</div>"
            )
        } else {
            $("#select_tipo").append("<div id='inputSelect'>" +
                '<input type="hidden" name="user_id" value="' + this.user.id + '">' +
                '<input type="text" disabled class="form-control" value="' + this.user.name + '">' +
                "</div>"
            )
        }
    }

    function criaInput() {
        $("#select_tipo").append(
            "<div id='inputSelect'>" +
            '<select name="user_id" class="form-control select" style="width: 100%;"><option selected disabled>Selecione um perito</option>' +
            <?php foreach ($data as $key => $user) { ?> <?php foreach ($user as $u) { ?> '<option value=' + '<?= $u->id ?>' + '>' + '<?= $u->name ?>' + '</option>' +
            <?php }
                                                    } ?> '</select>' +
            "</div>"
        )
    }

    function criaInput2() {
        $("#select_tipo").append(
            "<div id='inputSelect'>" +
            '<input type="text" name="tipo_ocorrencia_descricao" class="form-control" placeholder="Descrição Da Ocorrência Interna">'+
            "</div>"
        )
    }

    

    function deleteSelect() {
        $('#inputSelect').remove();
    }

    function sortear(token) {

        var url = "<?= "http://localhost/p05-ger-pericial-back" ?>" + "/requests/select.json";
        var user_id = httpGet(url, token)
        
        if(user_id.error == true){
            return alert("Não existe perito criminal cadastrado no sistema")
        }

        url = "<?= "http://localhost/p05-ger-pericial-back" ?>" + "/users/view-one/" + user_id.user_selected + ".json";

        this.user = httpGet(url, token).user[0]


        deleteSelect()
        $("#select_tipo").append("<div id='inputSelect'>" +
            '<input type="hidden" name="user_id" value="' + user.id + '">' +
            '<input type="text" disabled class="form-control" value="' + user.name + '">' +
            "</div>"
        )


    }

    function httpGet(theUrl, token) {
        var xmlHttp = new XMLHttpRequest();
        xmlHttp.open("GET", theUrl, false); // false for synchronous request
        xmlHttp.setRequestHeader("Authorization", "Bearer " + token + "");
        xmlHttp.send(null);
        return JSON.parse(xmlHttp.responseText);
    }

    function verifica() {
        inputSalvar = document.getElementById("inputSelect").innerText
        inputSalvar = inputSalvar.trim()
        dataDoc = document.getElementById('data_doc').value



        if (dataDoc == "" || dataDoc == "dd/mm/yyyy") {
            alert("Data documento deve ser preenchida")
        } else if (inputSalvar == "Sortear Perito") {
            alert("Perito não distribuido")
        } else {
            document.getElementById('theForm').submit()
        }


    }
</script>