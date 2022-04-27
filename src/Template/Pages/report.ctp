<div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Laudos Cadastrados</h3>
            <!-- /.box-header -->
            <div class="box-body table-responsive">

                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Data de entrega</th>
                            <th>Perito responsável</th>
                            <th>Servidor recebedor</th>
                            <th>Cargo</th>
                            <th>Número do laudo</th>
                            <th>Situação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $report) { ?>
                            <tr>
                                <td>
                                    <?php
                                    if ($report->delivery_date  == "") {
                                        echo "-";
                                    } else {
                                        echo date('d/m/Y', strtotime($report->delivery_date));
                                    }
                                    ?>
                                </td>

                                <td>
                                    <?php
                                    if ($report->user->name == "") {
                                        echo "-";
                                    } else {
                                        echo $report->user->name;
                                    }
                                    ?>
                                </td>

                                <td>
                                    <?php
                                    if ($report->receiver == "") {
                                        echo "-";
                                    } else {
                                        echo $report->receiver;
                                    }
                                    ?>
                                </td>
                                
                                <td>
                                    <?php
                                    if ($report->position == "") {
                                        echo "-";
                                    } else {
                                        echo $report->position;
                                    }
                                    ?>
                                </td>

                                <td>
                                    <?php
                                    if ($report->report_id == "") {
                                        echo "-";
                                    } else {
                                        echo $report->report_id ;
                                    }
                                    ?>
                                </td>


                                <td>
                                    <?php
                                    if ($report->status == "") {
                                        echo "-";
                                    } else {
                                        echo $report->status ;
                                    }
                                    ?></td>
                                    <td>
                                    <?= $this->Html->link(
                                        'Editar Laudo',
                                        ['controller' => 'Reports', 'action' => 'editReport', $report->id],
                                        ['class' => 'btn btn-primary btn-xs']
                                    ) ?></td>
                              

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>