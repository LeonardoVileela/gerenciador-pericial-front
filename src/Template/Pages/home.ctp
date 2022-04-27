<div style="padding-left: 20px;padding-right: 20px;">
    <!-- Bar chart -->
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Requisições Recebidas</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>

            </div>
            <div class="box-body table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Data Documento</th>
                            <th>Data Recebimento</th>
                            <th>Situação</th>
                            <th>Opções</th>

                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($requests as $request) { ?>
                            <tr>
                                <td class="txtnome">
                                    <?php
                                    if ($request->id == "") {
                                        echo "-";
                                    } else {
                                        echo $request->id ;
                                    }
                                    ?>
                                </td>
                                <td class="txtnome">
                                    <?php
                                    if ($request->data_documento  == "") {
                                        echo "-";
                                    } else {
                                        echo date('d/m/Y', strtotime($request->data_documento));
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($request->data_recebimento == "") {
                                        echo "-";
                                    } else {
                                        echo date('d/m/Y', strtotime($request->data_recebimento));
                                    }
                                    ?>
                                </td>

                                <td>
                                    Pendente
                                </td>


                                <td>
                                    <?= $this->Html->link(
                                        'Editar requisição',
                                        ['controller' => 'Requisitions', 'action' => 'editRequisition', $request->id],
                                        ['class' => 'btn btn-primary btn-xs']
                                    ) ?>

                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>
        <div class="box-body">
            <div id="bar-chart"></div>


        </div>
        <!-- /.box-body-->
    </div>
    <!-- /.box -->
</div>