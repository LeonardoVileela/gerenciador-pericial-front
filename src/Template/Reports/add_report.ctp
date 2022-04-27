<div class="row">
    <div class="col-md-12" style="height: 200%;">
        <div class="box">
            <div class="box-header">
                <div class="col-sm-8">
                    <h3 class="box-title">Cadastrar Laudo</h3>
                </div>
            </div>
            <div class="box-body">

                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#report" data-toggle="tab">Dados do laudo</a></li>
                        <li><a href="#dados_entrega" data-toggle="tab">Dados da entrega</a></li>

                    </ul>
                    <?= $this->Form->create(null, ['url' => ['controller' => 'Reports', 'action' => 'add'], 'id' => 'theForm']); ?>
                    <?= $this->Form->input('request_id', [
                        'type' => 'hidden', 'value' => $request_id,
                        'label' => false
                    ]) ?>
                    <div class="tab-content">
                        <!-- report-->
                        <div class="active tab-pane" id="report">


                            <div class="col-sm-3 pad_entry_book">
                                <label>Perito responsável</label>
                                <select name="user_id" class="form-control select" style="width: 100%;">
                                    <option selected="selected"></option>
                                    <?php foreach ($data as $key => $user) { ?>
                                        <?php foreach ($user as $u) { ?>
                                            <option value=<?= $u->id ?>><?= $u->name ?></option>
                                    <?php }
                                    } ?>
                                </select>

                                <?= $this->Form->user_id ?>
                            </div>

                            <div class="col-sm-3 pad_entry_book">
                                <label>Número do laudo</label>
                                <?= $this->Form->input('report_id', [
                                    'class' => 'form-control', 'type' => 'text',
                                    'label' => false, "placeholder" => "Número do laudo", 'id' => 'report_id'
                                ]) ?>

                                <?= $this->Form->report_id ?>
                            </div>

                            <div class="col-sm-3 pad_entry_book">
                                <label>Situação</label>
                                <?= $this->Form->select(
                                    'status',
                                    [
                                        'Aguardando distribuição' => 'Aguardando distribuição',
                                        'Aguardando requisição' => 'Aguardando requisição',
                                        'Devolvido ao remetente' => 'Devolvido ao remetente',
                                        'Entregue' => 'Entregue',
                                        'Entregue I.I. Pba' => 'Entregue I.I. Pba',
                                        'Entregue IMOL Pba' => 'Entregue IMOL Pba',
                                        'Enviado para IALF Campo Grande' => 'Enviado para IALF Campo Grande',
                                        'Enviado para IC Campo Grande' => 'Enviado para IC Campo Grande',
                                        'Não está pronto' => 'Não está pronto',
                                        'Perito não foi acionado' => 'Perito não foi acionado',
                                        'Pronto e aguardando entrega' => 'Pronto e aguardando entrega',
                                        'Pronto e aguardando entrega (armas de fogo)' => 'Pronto e aguardando entrega (armas de fogo)',
                                        'Requisição cancelada' => 'Requisição cancelada',
                                        'Pedido do delegado' => 'Pedido do delegado',
                                        'Juiz de Direito' => 'Juiz de Direito',
                                        'Dilação de prazo' => 'Dilação de prazo'
                                    ],
                                    ['class' => 'form-control select1', 'label' => false]
                                ) ?>
                            </div>


                        </div>
                        <!-- report-->

                        <!-- dados da entrega-->
                        <div class="tab-pane" id="dados_entrega">


                            <div class="col-sm-3 pad_entry_book">
                                <label>Data de entrega</label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <?= $this->Form->input('delivery_date', [
                                        'class' => 'form-control datemask', 'type' => 'text', 'label' => false
                                    ]) ?>
                                </div>
                            </div>

                            <div class="col-sm-3 pad_entry_book">
                                <label>Servidor Recebedor</label>
                                <div>
                                    <?= $this->Form->input('receiver', [
                                        'class' => 'form-control', 'type' => 'text',
                                        'label' => false, "placeholder" => "Servidor Recebedor"
                                    ]) ?>
                                </div>
                            </div>



                            <div class="col-sm-3 pad_entry_book">
                                <label>Cargo</label>

                                <?= $this->Form->select(
                                    'position',
                                    [
                                        'Bombeiro' => 'Bombeiro',
                                        'Correios' => 'Correios',
                                        'Delegado' => 'Delegado',
                                        'Escrivão' => 'Escrivão',
                                        'Estagiário' => 'Estagiário',
                                        'Investigador' => 'Investigador',
                                        'Juiz' => 'Juiz',
                                        'Pol. Militar' => 'Pol. Militar',
                                        'Promotor' => 'Promotor',
                                        'Regional' => 'Regional',
                                        'Outros' => 'Outros'
                                    ],
                                    ['class' => 'form-control select1', 'empty' => 'Cargo', 'label' => false]
                                ) ?>
                            </div>

                        </div>
                        <!-- dados da entrega-->

                    </div>
                    <!-- /.tab-content -->
                    <div class="col-sm-12 pad_entry_book">
                        <button class="btn btn-success" type="button" onclick="verifica('<?= $this->Session->read('Auth.User.token') ?>','<?= $request_id ?>')">Salvar</button>
                        <?= $this->Html->link(
                        'Sair',
                        ['controller' => 'Pages', 'action' => 'requisition'],
                        ['class' => 'btn btn-danger']
                    ) ?>
                    </div>
                    <?= $this->Form->end(); ?>
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
        </div>
    </div>
</div>
<script>
    function verifica(token, requestId) {

        reportId = document.getElementById('report_id').value
        
        var url = "<?= "http://localhost/p05-ger-pericial-back" ?>" + "/reports/view/"+ requestId + ".json";
        var response = httpGet(url, token)


        if (response.error == false) {
            validar = confirm("Já existe laudo cadastrado para essa requisição. Deseja cadastrar outro?")
            valition = false
                if (validar == true) {
                    document.getElementById('theForm').submit()
                }
        } else {
            document.getElementById('theForm').submit()
        }

    }

    function httpGet(theUrl, token) {
        var xmlHttp = new XMLHttpRequest();
        xmlHttp.open("GET", theUrl, false); // false for synchronous request
        xmlHttp.setRequestHeader("Authorization", "Bearer " + token + "");
        xmlHttp.send(null);
        return JSON.parse(xmlHttp.responseText);
    }
</script>