<div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title col-sm-10">Requisições Cadastradas</h3>
            <!-- /.box-header -->
            <div class="box-body table-responsive col-sm-12">
                <div style="text-align: right !important;padding-bottom: 10px;">
                    <label id="label_filter"> Data documento: </label>
                    <select class="form-control input-sm" name="myInput" id="myInput" onchange="javascript:myFunction(this);">
                        <option></option>
                        <option selected value=""><?php if (isset($_GET['year'])) echo $_GET['year'];
                                                    else echo date('Y'); ?></option>
                        <option value="2010">2010</option>
                        <option value="2011">2011</option>
                        <option value="2012">2012</option>
                        <option value="2013">2013</option>
                        <option value="2014">2014</option>
                        <option value="2015">2015</option>
                        <option value="2016">2016</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                        <option value="2026">2026</option>
                        <option value="2027">2027</option>
                        <option value="2028">2028</option>
                        <option value="2029">2029</option>
                        <option value="2030">2030</option>
                        <option value="2030">2031</option>
                    </select>

                </div>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Data Documento</th>
                            <th>Usuário responsável</th>
                            <th>Nº Ofício</th>
                            <th>B.O. nº</th>
                            <th>Tipo de Perícia</th>
                            <th>Exame</th>
                            <th>Opções</th>
                            <th class="visible-md-block">Descrição</th>
                            <th class="visible-md-block">Nº Doc.</th>
                            <th class="visible-md-block">Data Realização Perícia</th>
                            <th class="visible-md-block">I.P. nº</th>
                            <th class="visible-md-block">Outros Proc.</th>
                            <th class="visible-md-block">Escrivão</th>
                            <th class="visible-md-block">Delegacia</th>
                            <th class="visible-md-block">Autoridade Requisitante</th>
                            <th class="visible-md-block">Tipo de endereço</th>
                            <th class="visible-md-block">Logradouro</th>
                            <th class="visible-md-block">Nº</th>
                            <th class="visible-md-block">Bairro</th>
                            <th class="visible-md-block">Cidade</th>
                            <th class="visible-md-block">Nº Laudos Expedidos</th>
                            <th class="visible-md-block">Data Recebimento</th>
                            <th class="visible-md-block">Descrição Ofício</th>
                            <th class="visible-md-block">Observações</th>
                            <th class="visible-md-block">Vitimas</th>
                            <th class="visible-md-block">Marca</th>
                            <th class="visible-md-block">placa</th>
                            <th class="visible-md-block">cor</th>
                            <th class="visible-md-block">id Carro</th>
                            <th class="visible-md-block">Tipo Veículo</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $request) { ?>
                            <tr>
                                <td>
                                    <?php
                                    if ($request->id == "") {
                                        echo "-";
                                    } else {
                                        echo $request->id;
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
                                    if (isset($request->user->name)) {
                                        if ($request->user->name == "") {
                                            echo "-";
                                        } else {
                                            echo $request->user->name;
                                        }
                                    } else {
                                        if ($request->tipo_ocorrencia_descricao == "") {
                                            echo "-";
                                        } else {
                                            echo $request->tipo_ocorrencia_descricao;
                                        }
                                    }
                                    ?>
                                </td>

                                <td>
                                    <?php
                                    if ($request->n_oficio == "") {
                                        echo "-";
                                    } else {
                                        echo $request->n_oficio;
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($request->n_bo == "") {
                                        echo "-";
                                    } else {
                                        echo $request->n_bo;
                                    }

                                    ?>
                                </td>

                                <td>
                                    <?php
                                    if ($request->tipo_pericia == "") {
                                        echo "-";
                                    } else {
                                        echo $request->tipo_pericia;
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($request->exame_pericia == "") {
                                        echo "-";
                                    } else {
                                        echo $request->exame_pericia;
                                    }
                                    ?>
                                </td>
                                <td style="width: 130px;">
                                    <?= $this->Html->link(
                                        '<i class="fa fa-eye" aria-hidden="true"></i>',
                                        '#',
                                        ['escape' => false, 'class' => 'text-black icon-size-small padding_icon', 'data-toggle' => 'modal', 'data-target' => '#modal-default', 'type' => 'button', 'title' => 'Visualizar Requisição']
                                    ) ?>

                                    <?= $this->Html->link(
                                        '<i class="fa fa-edit" aria-hidden="true"></i>',
                                        ['controller' => 'Requisitions', 'action' => 'editRequisition', $request->id],
                                        ['escape' => false, 'class' => 'text-black icon-size-small padding_icon', 'title' => 'Editar Requisição']
                                    ) ?>

                                    <a onclick='readReq()' id='upload-button' class='mouse-pointer text-black icon-size-small padding_icon' title='Upload de documentos' data-toggle='modal' data-id='<?= $request->id ?>' data-documents='<?= json_encode($request->request_documents) ?>' data-target='#modal-document'><i class="fa fa-upload" aria-hidden="true"></i></a>

                                    <a onclick="modalReport('<?= $this->Session->read('Auth.User.token') ?>')" class='mouse-pointer text-black icon-size-small' title='Laudos' data-toggle='modal' data-target='#modal-report' data-id='<?= $request->id ?>'><i class="fa fa-book" aria-hidden="true"></i></a>
                                </td>
                                <td class="visible-md-block">
                                    <?php
                                    if ($request->descricao == "") {
                                        echo "-";
                                    } else {
                                        echo $request->descricao;
                                    }
                                    ?>
                                </td>
                                <td class="visible-md-block">
                                    <?php
                                    if ($request->n_documento == "") {
                                        echo "-";
                                    } else {
                                        echo $request->n_documento;
                                    }
                                    ?>
                                </td>
                                <td class="visible-md-block">
                                    <?php
                                    if ($request->data_realizacao_pericia == "") {
                                        echo "-";
                                    } else {
                                        echo date('d/m/Y', strtotime($request->data_realizacao_pericia));
                                    }
                                    ?>
                                </td>
                                <td class="visible-md-block">
                                    <?php
                                    if ($request->n_ip == "") {
                                        echo "-";
                                    } else {
                                        echo $request->n_ip;
                                    }
                                    ?>
                                </td>
                                <td class="visible-md-block">
                                    <?php
                                    if ($request->outros_proc == "") {
                                        echo "-";
                                    } else {
                                        echo $request->outros_proc;
                                    }
                                    ?>
                                </td>
                                <td class="visible-md-block">
                                    <?php
                                    if ($request->escrivao == "") {
                                        echo "-";
                                    } else {
                                        echo $request->escrivao;
                                    }
                                    ?>
                                </td>
                                <td class="visible-md-block">
                                    <?php
                                    if ($request->delegacia == "") {
                                        echo "-";
                                    } else {
                                        echo $request->delegacia;
                                    }
                                    ?>
                                </td>
                                <td class="visible-md-block">
                                    <?php
                                    if ($request->autoridade_requisitante == "") {
                                        echo "-";
                                    } else {
                                        echo $request->autoridade_requisitante;
                                    }
                                    ?>
                                </td>
                                <td class="visible-md-block">
                                    <?php
                                    if ($request->tipo_logradouro == "") {
                                        echo "-";
                                    } else {
                                        echo $request->tipo_logradouro;
                                    }
                                    ?>
                                </td>
                                <td class="visible-md-block">
                                    <?php
                                    if ($request->logradouro == "") {
                                        echo "-";
                                    } else {
                                        echo $request->logradouro;
                                    }
                                    ?>
                                </td>
                                <td class="visible-md-block">
                                    <?php
                                    if ($request->nmr_logradouro == "") {
                                        echo "-";
                                    } else {
                                        echo $request->nmr_logradouro;
                                    }
                                    ?>
                                </td>
                                <td class="visible-md-block">
                                    <?php
                                    if ($request->bairro == "") {
                                        echo "-";
                                    } else {
                                        echo $request->bairro;
                                    }
                                    ?>
                                </td>
                                <td class="visible-md-block">
                                    <?php
                                    if ($request->cidade == "") {
                                        echo "-";
                                    } else {
                                        echo $request->cidade;
                                    }
                                    ?>
                                </td>
                                <td class="visible-md-block">
                                    <?php
                                    if ($request->n_laudos_expedidos == "") {
                                        echo "-";
                                    } else {
                                        echo $request->n_laudos_expedidos;
                                    }
                                    ?>
                                </td>

                                <td class="visible-md-block">
                                    <?php
                                    if ($request->data_recebimento == "") {
                                        echo "-";
                                    } else {
                                        echo date('d/m/Y', strtotime($request->data_recebimento));
                                    }
                                    ?>
                                </td>

                                <td class="visible-md-block">
                                    <?php
                                    if ($request->descricao_oficio == "") {
                                        echo "-";
                                    } else {
                                        echo $request->descricao_oficio;
                                    }
                                    ?>
                                </td>
                                <td class="visible-md-block">
                                    <?php
                                    if ($request->observacoes == "") {
                                        echo "-";
                                    } else {
                                        echo $request->observacoes;
                                    }
                                    ?>
                                </td>
                                <?php $vit = "" ?>
                                <?php foreach ($request->victims as $key => $victim) { ?>
                                    <?php $vit =  $vit . "# " . ($victim->name) ?>
                                <?php } ?>
                                <td class="visible-md-block"><?= $vit ?></td>
                                <?php $marca = "" ?>
                                <?php $placa = "" ?>
                                <?php $cor = "" ?>
                                <?php $idCarro = "" ?>
                                <?php $tipo_veiculo = "" ?>
                                <?php foreach ($request->vehicles as $key => $vehicle) { ?>
                                    <?php $marca =  $marca . "#" . ($vehicle->marca) ?>
                                    <?php $cor =  $cor . "#" . ($vehicle->cor) ?>
                                    <?php $placa =  $placa . "#" . ($vehicle->placa) ?>
                                    <?php $idCarro =  $idCarro . "#" . ($vehicle->id) ?>
                                    <?php $tipo_veiculo =  $tipo_veiculo . "#" . ($vehicle->tipo_veiculo) ?>
                                <?php } ?>
                                <td class="visible-md-block"><?= $marca ?></td>
                                <td class="visible-md-block"><?= $placa ?></td>
                                <td class="visible-md-block"><?= $cor ?></td>
                                <td class="visible-md-block"><?= $idCarro ?></td>
                                <td class="visible-md-block"><?= $tipo_veiculo ?></td>

                            <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->

        </div>
        <!-- /.box -->

    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Requisição</h4>
            </div>
            <div class="modal-body modal-requisition">
                <span>ID:</span>
                <p id="id"></p>
                <hr class="hr_modal">

                <span>Data do Documento:</span>
                <p id="dataDocumento"></p>
                <span>Data Recebimento:</span>
                <p id="dataRecebimento"></p>
                <hr class="hr_modal">

                <span>Delegacia:</span>
                <p id="delegacia"></p>
                <span>Autoridade Requisitante:</span>
                <p id="autoridadeRequisitante"></p>
                <span>Escrivão:</span>
                <p id="escrivao"></p>
                <hr class="hr_modal">

                <span>Usuário responsável:</span>
                <p id="usuarioResponsavel"></p>
                <span>Observaçoes:</span>
                <p id="observacoes"></p>
                <hr class="hr_modal">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Sair</button>
                <button class="btn btn-primary" data-toggle="modal" data-target="#modal-default2" data-dismiss="modal" type="button">Próximo</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- modal -->
<div class="modal fade" id="modal-default2">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Requisição</h4>
            </div>
            <div class="modal-body modal-requisition">
                <span>Data da Realização Perícia:</span>
                <p id="dataRealizacaoPericia"></p>
                <hr class="hr_modal">
                <span>Tipo da Perícia:</span>
                <p id="tipoPericia"></p>
                <span>Exame: </span>
                <p id="exame"></p>
                <span>Descrição: </span>
                <p id="descricao"></p>
                <hr class="hr_modal">
                <span>Número de laudos Expedidos:</span>
                <p id="NumerolaudosExpedidos"></p>
                <span>Número do Ofício:</span>
                <p id="numeroOficio"></p>
                <span>Descrição do ofício:</span>
                <p id="descricaoOficio"></p>
                <span>Número do Documento:</span>
                <p id="nDoc"></p>
                <span>Número B.O:</span>
                <p id="bo"></p>
                <span>Número IP:</span>
                <p id="ip"></p>
                <span>Outros Procedimentos:</span>
                <p id="outrosProc"></p>
                <hr class="hr_modal">
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary pull-left" data-toggle="modal" data-target="#modal-default" data-dismiss="modal" type="button">Voltar</button>
                <button class="btn btn-primary" data-toggle="modal" data-target="#modal-default3" data-dismiss="modal" type="button">Próximo</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal-default3">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Requisição</h4>
            </div>
            <div class="modal-body">
                <div class="modal-requisition">
                    <span>Tipo De Endereço: </span>
                    <p id="tipoEndereco"></p>
                    <span>Logradouro: </span>
                    <p id="logradouro"></p>
                    <span>Número: </span>
                    <p id="numeroCasa"></p>
                    <span>Bairro: </span>
                    <p id="bairro"></p>
                    <span>Cidade: </span>
                    <p id="cidade"></p>
                    <span>Vitimas: </span>
                    <p id="vitimas"></p>
                    <hr class="hr_modal col-sm-10">
                </div>
                <div>
                    <table class="table table-veiculos">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Marca</th>
                                <th>Placa</th>
                                <th>Cor</th>
                                <th>Tipo</th>
                            </tr>
                        </thead>
                        <tbody id="carros">

                        </tbody>

                    </table>
                </div>

            </div>
            <div class="modal-footer">
                <div class="col-sm-12" id="buttonModal">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modal-default2" data-dismiss="modal" type="button">Voltar</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.Modal -->

<!-- modal laudo -->
<div class="modal fade" id="modal-report" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Laudos</h4>
            </div>

            <div class="modal-footer" id="reports_modal">

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- end modal laudo -->




<!-- modal document -->

<div class="modal fade" tabindex="-1" id="modal-document" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button onclick="reload()" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Documentos</h4>
            </div>
            <div class="modal-body">

                <div id="documents">


                </div>


            </div>

            <div class="modal-footer">
                <?= $this->Form->create(null, ['url' => ['controller' => 'Requisitions', 'action' => 'sendDocument'], 'enctype' => 'multipart/form-data']) ?>
                <?= $this->Form->input('id', [
                    'type' => 'hidden',
                    'label' => false,
                    'id' => 'id-document'
                ]) ?>
                <?= $this->Form->control('document', ['type' => 'file', 'class' => 'pull-left', 'required', 'label' => false]); ?>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Sair</button>
                <?= $this->Form->button(
                    'Salvar alterações',
                    ['class' => 'btn btn-primary ', 'type' => 'submit']
                ) ?>
                <?= $this->Form->end(); ?>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- end modal document -->
<script>
    function httpGet(theUrl, token) {
        var xmlHttp = new XMLHttpRequest();
        xmlHttp.open("GET", theUrl, false); // false for synchronous request
        xmlHttp.setRequestHeader("Authorization", "Bearer " + token + "");
        xmlHttp.send(null);
        return JSON.parse(xmlHttp.responseText);
    }

    function deleteDoc(document, token, divid) {
        if (confirm('Você tem certeza que deseja remover esse documento?')) {
            var url = "<?= "http://localhost/p05-ger-pericial-back" ?>" + "/requests/delete-document/" + document + ".json";
            var response = httpGet(url, token)['success']
            if (response == true) {
                $("#" + divid + "").remove();
            }
            
        }


    }

    function reload(){
        window.location.reload(true);
    }


    function readReq() {
        var button = $(event.currentTarget);
        // var documents = button.data('documents;
        var documents = button.data('documents')
        var id = button.data('id')
        $("div.documents-body").remove();
        for (var i = 0; i < documents.length; i++) {
            $("#documents").append('<div id="doc' + i + '" class="documents-body"><div class="container"><div class="row"><div class="col-md-5"> <a target="_blank" href="<?= "http://localhost/p05-ger-pericial-back" ?>/webroot/files/documents/' + documents[i].doc_name + '" class="btn-block">' + documents[i].title + '</a></div>' +
                '<div class="col-md-2"><a class="mouse-pointer" onclick="deleteDoc(\'' + documents[i].doc_name + '\' , \'<?= $this->Session->read('Auth.User.token') ?>\', \'doc' + i + '\')"><i class="fa fa-trash text-red"></i></a></div></div></div><div class="hr-smaller"><hr></div></div>')
        }
        $('#id-document').val(id)
    }

    function modalReport(token) {
        var button = $(event.currentTarget);
        var id = button.data('id');



        var url = "<?= "http://localhost/p05-ger-pericial-back" ?>" + "/reports/view/" + id + ".json";
        var response = httpGet(url, token)


        if (response.error == true) {

            $("div.laudo-body").remove();
            $("#reports_modal").append('<div class="laudo-body"><a class="btn btn-primary btn-sm pull-left" data-toggle="modal" href="<?= 'http://localhost/p05-ger-pericial-front' ?>/add-report/' + id + '">Adicionar Laudo</a>' +
                '<a disabled class="btn btn-primary btn-sm" data-toggle="modal">Visualizar Laudos</a></div>')
        } else {
            $("div.laudo-body").remove();
            $("#reports_modal").append('<div class="laudo-body"><a class="btn btn-primary btn-sm pull-left" data-toggle="modal" href="<?= 'http://localhost/p05-ger-pericial-front' ?>/add-report/' + id + '">Adicionar Laudo</a>' +
                '<a class="btn btn-primary btn-sm" data-toggle="modal" href="<?= 'http://localhost/p05-ger-pericial-front' ?>/pages/report/' + id + '">Visualizar Laudos</a></div>')
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


<?= $this->Html->script('home-js/requisition.js') ?>