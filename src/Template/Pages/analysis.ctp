<div style="padding-left: 20px;padding-right: 20px;">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Relatório</h3>
            <!-- /.box-header -->
            <div class="box-body table-responsive col-sm-12">
                <table id="example1" class="table">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Esperando Requisição</th>
                            <th>Não estão prontas</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($analysis as $value) {  ?>
                            <tr>
                                <td>
                                    <?php
                                    if (!isset($value->name)) {
                                        echo "-";
                                    } else {
                                        echo $value->name;
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if (!isset($value->waiting_request)) {
                                        echo "-";
                                    } else {
                                        echo $value->waiting_request;
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if (!isset($value->not_ready)) {
                                        echo "-";
                                    } else {
                                        echo $value->not_ready;
                                    }
                                    ?>
                                </td>
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>

<div style="padding-left: 20px;padding-right: 20px;">
    <!-- Bar chart -->
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Total</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>

            </div>
            <div class="box-body table-responsive">
                <div class="box-body chart-responsive col-xs-12">
                    <div class="chart" id="sales-chart" style=" position: center;"></div>
                </div>
            </div>

        </div>
        <div class="box-body">
            <div id="bar-chart"></div>


        </div>
        <!-- /.box-body-->
    </div>
    <!-- /.box -->
</div>

<script>
    window.onload = initPage;

    function initPage() {
        "use strict";
        <?php foreach ($total_analysis as $total) {
            if ($total->status == "Não está pronto") {
                $total_not_ready = $total->count;
            } else {
                $total_waiting_request = $total->count;
            }
        } ?>
        var donut = new Morris.Donut({
            element: 'sales-chart',
            resize: true,
            colors: ["#3c8dbc", "#f56954", "#00a65a"],
            data: [{
                    label: "Esperando Requisição",
                    value: "<?php if(!isset($total_waiting_request)){ echo 0; } else{ echo $total_waiting_request;} ?>"
                },
                {
                    label: "Não Estão Prontos",
                    value: "<?php if(!isset($total_not_ready)){ echo 0; } else{ echo $total_not_ready; } ?>"
                },

            ],
            hideHover: 'auto'
        });

    }
</script>