<div class="row">
    <div class="col-md-12" style="height: 200%;">
        <div class="box">
            <div class="box-header">
                <div class="col-sm-8">
                    <h3 class="box-title">Editar Laudo</h3>
                    <?php foreach ($report as $key => $value) {
                        $report = $value;
                    } ?>
                </div>
            </div>
            <div class="box-body">

                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#report" data-toggle="tab">Dados do laudo</a></li>
                        <li><a href="#dados_entrega" data-toggle="tab">Dados da entrega</a></li>
                    </ul>
                    <?= $this->Form->create(null, ['url' => ['controller' => 'Reports', 'action' => 'edit']]); ?>
                    <?= $this->Form->input('id', [
                        'type' => 'hidden', 'value' => $report->id,
                        'label' => false
                    ]) ?>
                    <?= $this->Form->input('user_id', [
                        'type' => 'hidden', 'value' => $report->user_id,
                        'label' => false
                    ]) ?>
                    <div class="tab-content">
                        <!-- report-->
                        <div class="active tab-pane" id="report">

                            
                            <div class="col-sm-3 pad_entry_book">
                                <label>Perito responsável</label>
                                <select name="user_id" class="form-control select" style="width: 100%;">
                                    <option selected="selected" value="<?= $report->user->id ?>"> <?= $report->user->name ?> </option>
                                    <?php foreach ($users as $key => $user) { ?>
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
                                    'label' => false, "placeholder" => "Número do laudo", 'value' => $report->report_id,
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
                                    ['class' => 'form-control select1', 'label' => false,'value' => $report->status]
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
                                        'class' => 'form-control datemask', 'type' => 'text', 'value' => $report->delivery_date, 'label' => false
                                    ]) ?>
                                </div>
                            </div>

                            <div class="col-sm-3 pad_entry_book">
                                <label>Servidor Recebedor</label>
                                <div>
                                    <?= $this->Form->input('receiver', [
                                        'class' => 'form-control', 'type' => 'text',
                                        'label' => false, "placeholder" => "Servidor Recebedor", 'value' => $report->receiver,
                                    ]) ?>
                                </div>
                            </div>

                            <div class="col-sm-3 pad_entry_book">
                                <label>Cargo</label>
                                <div>
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
                                        ['class' => 'form-control select1', 'empty' => 'Cargo', 'label' => false, 'value' => $report->position]
                                    ) ?>
                                </div>
                            </div>



                           
                        </div>
                         <!-- dados da entrega-->
                    </div>
                    <!-- /.tab-content -->
                    <div class="col-sm-12 pad_entry_book">
                        <?= $this->Form->button(__('Editar'), ['class' => 'btn btn-primary']) ?>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
        </div>
    </div>
</div>