<div class="col-md-12" style="padding-bottom: 10px;" id="top">
    <div class="col-sm-2 remove">
        <label for="ano">Mês Inicial: </label>
        <select name="mes_inicial" id="mes_inicial" class="form-control select1">
            <option id="inicial" value="<?php if (isset($_GET['month_start'])) echo $_GET['month_start'];
                                        else echo date('m'); ?>" disabled selected></option>
            <option value="01">Janeiro</option>
            <option value="02">Fevereiro</option>
            <option value="03">Março</option>
            <option value="04">Abril</option>
            <option value="05">Maio</option>
            <option value="06">Junho</option>
            <option value="07">Julho</option>
            <option value="08">Agosto</option>
            <option value="09">Setembro</option>
            <option value="10">Outubro</option>
            <option value="11">Novembro</option>
            <option value="12">Dezembro</option>
        </select>
    </div>
    <div class="col-sm-2 remove">
        <label for="ano">Mês Final: </label>
        <select name="mes_final" id="mes_final" class="form-control select1">
            <option id="final" value="<?php if (isset($_GET['month_end'])) echo $_GET['month_end'];
                                        else echo date('m'); ?>" disabled selected></option>
            <option value="01">Janeiro</option>
            <option value="02">Fevereiro</option>
            <option value="03">Março</option>
            <option value="04">Abril</option>
            <option value="05">Maio</option>
            <option value="06">Junho</option>
            <option value="07">Julho</option>
            <option value="08">Agosto</option>
            <option value="09">Setembro</option>
            <option value="10">Outubro</option>
            <option value="11">Novembro</option>
            <option value="12">Dezembro</option>

        </select>
    </div>

    <div class="col-sm-2 remove">
        <label for="ano">Ano: </label>
        <select name="ano" id="ano" class="form-control select1">
            <option id="anoAtual" value="<?php if (isset($_GET['year'])) echo $_GET['year'];
                                            else echo date('Y'); ?>" disabled selected>Ano</option>
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

    <div class="col-sm-2 remove" style="padding-top: 27px;">
        <button onclick="buscaEstatistica()" class="btn btn-primary btn-sm">Buscar</button>
    </div>

    <div class="col-sm-4 remove" style="padding-top: 27px; text-align: right;">
        <a onclick='imprimir()' class='mouse-pointer text-black icon-size-medium' title='Imprimir'><i class="fa fa-print" aria-hidden="true"></i></a>
    </div>
</div>


<div class="row">
    <section class="content">
        <div class="col-md-6">
            <!-- /.nav-tabs-custom -->
            <div class="nav-tabs-custom">
                <div class="tab-content">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Trânsito</h3>
                        </div>

                        <div class="box-body no-padding">
                            <table class="table table-responsive table-condensed">
                                <tr>
                                    <th>Exame</th>
                                    <th style="width: 40px">Quantidade</th>
                                </tr>

                                <tr>
                                    <td>Acidente de Trânsito com Vítima Fatal</td>
                                    <?php if (!isset($transito["Acidente de Trânsito com Vítima Fatal"])) { ?>
                                        <td class="center"><span class="badge bg-gray">0</span></td>
                                    <?php } else { ?>
                                        <td class="center"><span class="badge bg-green"><?= $transito["Acidente de Trânsito com Vítima Fatal"] ?></span></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <td>Acidente de Trânsito com Vítima Lesão Corporal</td>
                                    <?php if (!isset($transito["Acidente de Trânsito com Vítima Lesão Corporal"])) { ?>
                                        <td class="center"><span class="badge bg-gray">0</span></td>
                                    <?php } else { ?>
                                        <td class="center"><span class="badge bg-green"><?= $transito["Acidente de Trânsito com Vítima Lesão Corporal"] ?></span></td>
                                    <?php } ?>
                                </tr>

                                <tr>
                                    <td>Acidente de Trânsito com Veículo Oficial</td>
                                    <?php if (!isset($transito["Acidente de Trânsito com Veículo Oficial"])) { ?>
                                        <td class="center"><span class="badge bg-gray">0</span></td>
                                    <?php } else { ?>
                                        <td class="center"><span class="badge bg-green"><?= $transito["Acidente de Trânsito com Veículo Oficial"] ?></span></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <td>Vistoria em Veículos Envolvidos em Acidente de Trânsito</td>
                                    <?php if (!isset($transito["Vistoria em Veículos Envolvidos em Acidente de Trânsito"])) { ?>
                                        <td class="center"><span class="badge bg-gray">0</span></td>
                                    <?php } else { ?>
                                        <td class="center"><span class="badge bg-green"><?= $transito["Vistoria em Veículos Envolvidos em Acidente de Trânsito"] ?></span></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <td>Vistoria em local Relacionado com Acidente de Trânsito</td>
                                    <?php if (!isset($transito["Vistoria em local Relacionado com Acidente de Trânsito"])) { ?>
                                        <td class="center"><span class="badge bg-gray">0</span></td>
                                    <?php } else { ?>
                                        <td class="center"><span class="badge bg-green"><?= $transito["Vistoria em local Relacionado com Acidente de Trânsito"] ?></span></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <td>Outros Exames - Trânsito</td>
                                    <?php if (!isset($transito["Outros Exames - Trânsito"])) { ?>
                                        <td class="center"><span class="badge bg-gray">0</span></td>
                                    <?php } else { ?>
                                        <td class="center"><span class="badge bg-green"><?= $transito["Outros Exames - Trânsito"] ?></span></td>
                                    <?php } ?>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <div class="col-md-6">
            <!-- /.nav-tabs-custom -->
            <div class="nav-tabs-custom">
                <div class="tab-content">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Crimes Contra o Patrimônio</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-condensed">
                                <tr>
                                    <th>Exame</th>
                                    <th style="width: 40px">Quantidade</th>
                                </tr>

                                <tr>
                                    <td>Exame em Local de Furto</td>
                                    <?php if (!isset($crimesContraPatrimonio["Exame em Local de Furto"])) { ?>
                                        <td class="center"><span class="badge bg-gray">0</span></td>
                                    <?php } else { ?>
                                        <td class="center"><span class="badge bg-green"><?= $crimesContraPatrimonio["Exame em Local de Furto"] ?></span></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <td>Vistoria em Veículo Furto</td>
                                    <?php if (!isset($crimesContraPatrimonio["Vistoria em Veículo Furto"])) { ?>
                                        <td class="center"><span class="badge bg-gray">0</span></td>
                                    <?php } else { ?>
                                        <td class="center"><span class="badge bg-green"><?= $crimesContraPatrimonio["Vistoria em Veículo Furto"] ?></span></td>
                                    <?php } ?>
                                </tr>

                                <tr>
                                    <td>Vistoria em Local Incêndio</td>
                                    <?php if (!isset($crimesContraPatrimonio["Vistoria em Local Incêndio"])) { ?>
                                        <td class="center"><span class="badge bg-gray">0</span></td>
                                    <?php } else { ?>
                                        <td class="center"><span class="badge bg-green"><?= $crimesContraPatrimonio["Vistoria em Local Incêndio"] ?></span></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <td>Exame em Local de Furto de Energia Elétrica</td>
                                    <?php if (!isset($crimesContraPatrimonio["Exame em Local de Furto de Energia Elétrica"])) { ?>
                                        <td class="center"><span class="badge bg-gray">0</span></td>
                                    <?php } else { ?>
                                        <td class="center"><span class="badge bg-green"><?= $crimesContraPatrimonio["Exame em Local de Furto de Energia Elétrica"] ?></span></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <td>Exame em Local de Danos Materiais</td>
                                    <?php if (!isset($crimesContraPatrimonio["Exame em Local de Danos Materiais"])) { ?>
                                        <td class="center"><span class="badge bg-gray">0</span></td>
                                    <?php } else { ?>
                                        <td class="center"><span class="badge bg-green"><?= $crimesContraPatrimonio["Exame em Local de Danos Materiais"] ?></span></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <td>Autos de Avaliação</td>
                                    <?php if (!isset($crimesContraPatrimonio["Autos de Avaliação"])) { ?>
                                        <td class="center"><span class="badge bg-gray">0</span></td>
                                    <?php } else { ?>
                                        <td class="center"><span class="badge bg-green"><?= $crimesContraPatrimonio["Autos de Avaliação"] ?></span></td>
                                    <?php } ?>

                                </tr>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-6">
            <div class="nav-tabs-custom">
                <div class="tab-content">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Outros</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <table class="table table-condensed">
                                <tr>
                                    <th>Exame</th>
                                    <th style="width: 40px">Quantidade</th>
                                </tr>

                                <tr>
                                    <td>Reconstituições</td>
                                    <?php if (!isset($outros["Reconstituições"])) { ?>
                                        <td class="center"><span class="badge bg-gray">0</span></td>
                                    <?php } else { ?>
                                        <td class="center"><span class="badge bg-green"><?= $outros["Reconstituições"] ?></span></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <td>Exame de Corpo de Delito Indireto</td>
                                    <?php if (!isset($outros["Exame de Corpo de Delito Indireto"])) { ?>
                                        <td class="center"><span class="badge bg-gray">0</span></td>
                                    <?php } else { ?>
                                        <td class="center"><span class="badge bg-green"><?= $outros["Exame de Corpo de Delito Indireto"] ?></span></td>
                                    <?php } ?>
                                </tr>

                                <tr>
                                    <td>Outros Exames</td>
                                    <?php if (!isset($outros["Outros Exames"])) { ?>
                                        <td class="center"><span class="badge bg-gray">0</span></td>
                                    <?php } else { ?>
                                        <td class="center"><span class="badge bg-green"><?= $outros["Outros Exames"] ?></span></td>
                                    <?php } ?>

                                </tr>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6" id="documentoscopia">
            <div class="nav-tabs-custom">
                <div class="tab-content">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Documentoscopia</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-condensed">
                                <tr>
                                    <th>Exame</th>
                                    <th style="width: 40px">Quantidade</th>
                                </tr>

                                <tr>
                                    <td>Exame Grafotécnico</td>
                                    <?php if (!isset($documentoscopia["Exame Grafotécnico"])) { ?>
                                        <td class="center"><span class="badge bg-gray">0</span></td>
                                    <?php } else { ?>
                                        <td class="center"><span class="badge bg-green"><?= $documentoscopia["Exame Grafotécnico"] ?></span></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <td>Exame em Documentos</td>
                                    <?php if (!isset($documentoscopia["Exame em Documentos"])) { ?>
                                        <td class="center"><span class="badge bg-gray">0</span></td>
                                    <?php } else { ?>
                                        <td class="center"><span class="badge bg-green"><?= $documentoscopia["Exame em Documentos"] ?></span></td>
                                    <?php } ?>
                                </tr>

                                <tr>
                                    <td>Outros Exames Documentoscopia</td>
                                    <?php if (!isset($documentoscopia["Outros Exames Documentoscopia"])) { ?>
                                        <td class="center"><span class="badge bg-gray">0</span></td>
                                    <?php } else { ?>
                                        <td class="center"><span class="badge bg-green"><?= $documentoscopia["Outros Exames Documentoscopia"] ?></span></td>
                                    <?php } ?>

                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>


        <div class="col-md-6">
            <div class="nav-tabs-custom">
                <div class="tab-content">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Crimes Contra a Vida</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-condensed">
                                <tr>
                                    <th>Exame</th>
                                    <th style="width: 40px">Quantidade</th>
                                </tr>

                                <tr>
                                    <td>Homicídio</td>
                                    <?php if (!isset($crimesContraVida["Homicídio"])) { ?>
                                        <td class="center"><span class="badge bg-gray">0</span></td>
                                    <?php } else { ?>
                                        <td class="center"><span class="badge bg-green"><?= $crimesContraVida["Homicídio"] ?></span></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <td>Suicídio</td>
                                    <?php if (!isset($crimesContraVida["Suicídio"])) { ?>
                                        <td class="center"><span class="badge bg-gray">0</span></td>
                                    <?php } else { ?>
                                        <td class="center"><span class="badge bg-green"><?= $crimesContraVida["Suicídio"] ?></span></td>
                                    <?php } ?>
                                </tr>

                                <tr>
                                    <td>Cadáveres Encontrados</td>
                                    <?php if (!isset($crimesContraVida["Cadáveres Encontrados"])) { ?>
                                        <td class="center"><span class="badge bg-gray">0</span></td>
                                    <?php } else { ?>
                                        <td class="center"><span class="badge bg-green"><?= $crimesContraVida["Cadáveres Encontrados"] ?></span></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <td>Vistoria em Local - Tentativa de Homicídio</td>
                                    <?php if (!isset($crimesContraVida["Vistoria em Local - Tentativa de Homicídio"])) { ?>
                                        <td class="center"><span class="badge bg-gray">0</span></td>
                                    <?php } else { ?>
                                        <td class="center"><span class="badge bg-green"><?= $crimesContraVida["Vistoria em Local - Tentativa de Homicídio"] ?></span></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <td>Vistoria em Local - Tentativa de Suicídio</td>
                                    <?php if (!isset($crimesContraVida["Vistoria em Local - Tentativa de Suicídio"])) { ?>
                                        <td class="center"><span class="badge bg-gray">0</span></td>
                                    <?php } else { ?>
                                        <td class="center"><span class="badge bg-green"><?= $crimesContraVida["Vistoria em Local - Tentativa de Suicídio"] ?></span></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <td>Vistoria em Local - Vestígios de Tiro</td>
                                    <?php if (!isset($crimesContraVida["Vistoria em Local - Vestígios de Tiro"])) { ?>
                                        <td class="center"><span class="badge bg-gray">0</span></td>
                                    <?php } else { ?>
                                        <td class="center"><span class="badge bg-green"><?= $crimesContraVida["Vistoria em Local - Vestígios de Tiro"] ?></span></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <td>Acidentes de Trabalho</td>
                                    <?php if (!isset($crimesContraVida["Acidentes de Trabalho"])) { ?>
                                        <td class="center"><span class="badge bg-gray">0</span></td>
                                    <?php } else { ?>
                                        <td class="center"><span class="badge bg-green"><?= $crimesContraVida["Acidentes de Trabalho"] ?></span></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <td>Outros Exames - Crimes Contra a Vida</td>
                                    <?php if (!isset($crimesContraVida["Outros Exames - Crimes Contra a Vida"])) { ?>
                                        <td class="center"><span class="badge bg-gray">0</span></td>
                                    <?php } else { ?>
                                        <td class="center"><span class="badge bg-green"><?= $crimesContraVida["Outros Exames - Crimes Contra a Vida"] ?></span></td>
                                    <?php } ?>

                                </tr>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="nav-tabs-custom">
                <div class="tab-content" style="height: 370px">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Outras Perícias</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsivea no-padding">
                            <table class="table table-condensed">
                                <tr>
                                    <th>Exame</th>
                                    <th style="width: 40px">Quantidade</th>
                                </tr>

                                <tr>
                                    <td>Exame Metalográfico</td>
                                    <?php if (!isset($outrasPericias["Exame Metalográfico"])) { ?>
                                        <td class="center"><span class="badge bg-gray">0</span></td>
                                    <?php } else { ?>
                                        <td class="center"><span class="badge bg-green"><?= $outrasPericias["Exame Metalográfico"]  ?></span></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <td>Vistoria em Veículos</td>
                                    <?php if (!isset($outrasPericias["Vistoria em Veículos"])) { ?>
                                        <td class="center"><span class="badge bg-gray">0</span></td>
                                    <?php } else { ?>
                                        <td class="center"><span class="badge bg-green"><?= $outrasPericias["Vistoria em Veículos"]  ?></span></td>
                                    <?php } ?>
                                </tr>

                                <tr>
                                    <td>Exame Preliminar de Constatação de Entorpecentes</td>
                                    <?php if (!isset($outrasPericias["Exame Preliminar de Constatação de Entorpecentes"])) { ?>
                                        <td class="center"><span class="badge bg-gray">0</span></td>
                                    <?php } else { ?>
                                        <td class="center"><span class="badge bg-green"><?= $outrasPericias["Exame Preliminar de Constatação de Entorpecentes"]  ?></span></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <td>CDs e DVDs</td>
                                    <?php if (!isset($outrasPericias["CDs e DVDs"])) { ?>
                                        <td class="center"><span class="badge bg-gray">0</span></td>
                                    <?php } else { ?>
                                        <td class="center"><span class="badge bg-green"><?= $outrasPericias["CDs e DVDs"]  ?></span></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <td>Degravação de Áudio</td>
                                    <?php if (!isset($outrasPericias["Degravação de Áudio"])) { ?>
                                        <td class="center"><span class="badge bg-gray">0</span></td>
                                    <?php } else { ?>
                                        <td class="center"><span class="badge bg-green"><?= $outrasPericias["Degravação de Áudio"]  ?></span></td>
                                    <?php } ?>

                                </tr>
                                <tr>
                                    <td>Telefone Celular - Transcrição de Dados</td>
                                    <?php if (!isset($outrasPericias["Telefone Celular - Transcrição de Dados"])) { ?>
                                        <td class="center"><span class="badge bg-gray">0</span></td>
                                    <?php } else { ?>
                                        <td class="center"><span class="badge bg-green"><?= $outrasPericias["Telefone Celular - Transcrição de Dados"]  ?></span></td>
                                    <?php } ?>

                                </tr>
                                <tr>
                                    <td>Objetos</td>
                                    <?php if (!isset($outrasPericias["Objetos"])) { ?>
                                        <td class="center"><span class="badge bg-gray">0</span></td>
                                    <?php } else { ?>
                                        <td class="center"><span class="badge bg-green"><?= $outrasPericias["Objetos"]  ?></span></td>
                                    <?php } ?>

                                </tr>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-6">
            <div class="nav-tabs-custom">
                <div class="tab-content">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Balística, Instrumentos e Outros</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <table class="table table-condensed">
                                <tr>
                                    <th>Exame</th>
                                    <th style="width: 40px">Quantidade</th>
                                </tr>

                                <tr>
                                    <td>Exame em Armas de Fogo</td>
                                    <?php if (!isset($balistica["Exame em Armas de Fogo"])) { ?>
                                        <td class="center"><span class="badge bg-gray">0</span></td>
                                    <?php } else { ?>
                                        <td class="center"><span class="badge bg-green"><?= $balistica["Exame em Armas de Fogo"]  ?></span></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <td>Exame em Munições</td>
                                    <?php if (!isset($balistica["Exame em Munições"])) { ?>
                                        <td class="center"><span class="badge bg-gray">0</span></td>
                                    <?php } else { ?>
                                        <td class="center"><span class="badge bg-green"><?= $balistica["Exame em Munições"]  ?></span></td>
                                    <?php } ?>
                                </tr>

                                <tr>
                                    <td>Exames em Armas Brancas</td>
                                    <?php if (!isset($balistica["Exames em Armas Brancas"])) { ?>
                                        <td class="center"><span class="badge bg-gray">0</span></td>
                                    <?php } else { ?>
                                        <td class="center"><span class="badge bg-green"><?= $balistica["Exames em Armas Brancas"]  ?></span></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <td>Exame em Outros Instrumentos</td>
                                    <?php if (!isset($balistica["Exames em Armas Brancas"])) { ?>
                                        <td class="center"><span class="badge bg-gray">0</span></td>
                                    <?php } else { ?>
                                        <td class="center"><span class="badge bg-green"><?= $balistica["Exame em Outros Instrumentos"]  ?></span></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <td>Exames Químicos / Bioquímicos</td>
                                    <?php if (!isset($balistica["Exames Químicos / Bioquímicos"])) { ?>
                                        <td class="center"><span class="badge bg-gray">0</span></td>
                                    <?php } else { ?>
                                        <td class="center"><span class="badge bg-green"><?= $balistica["Exames Químicos / Bioquímicos"]  ?></span></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <td>Exame Resioduográfico</td>
                                    <?php if (!isset($balistica["Exames Químicos / Bioquímicos"])) { ?>
                                        <td class="center"><span class="badge bg-gray">0</span></td>
                                    <?php } else { ?>
                                        <td class="center"><span class="badge bg-green"><?= $balistica["Exame Resioduográfico"]  ?></span></td>
                                    <?php } ?>
                                </tr>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="nav-tabs-custom">
                <div class="tab-content">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Crimes Ambientais</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-condensed">
                                <tr>
                                    <th>Exame</th>
                                    <th style="width: 40px">Quantidade</th>
                                </tr>

                                <tr>
                                    <td>Incêndio em Mata</td>
                                    <?php if (!isset($crimesAmbientais["Incêndio em Mata"])) { ?>
                                        <td class="center"><span class="badge bg-gray">0</span></td>
                                    <?php } else { ?>
                                        <td class="center"><span class="badge bg-green"><?= $crimesAmbientais["Incêndio em Mata"]  ?></span></td>
                                    <?php } ?>

                                </tr>
                                <tr>
                                    <td>Desmatamento e Assoreameto de Rio</td>
                                    <?php if (!isset($crimesAmbientais["Desmatamento e Assoreameto de Rio"])) { ?>
                                        <td class="center"><span class="badge bg-gray">0</span></td>
                                    <?php } else { ?>
                                        <td class="center"><span class="badge bg-green"><?= $crimesAmbientais["Desmatamento e Assoreameto de Rio"]  ?></span></td>
                                    <?php } ?>
                                </tr>

                                <tr>
                                    <td>Incêndio em Veículo</td>
                                    <?php if (!isset($crimesAmbientais["Incêndio em Veículo"])) { ?>
                                        <td class="center"><span class="badge bg-gray">0</span></td>
                                    <?php } else { ?>
                                        <td class="center"><span class="badge bg-green"><?= $crimesAmbientais["Incêndio em Veículo"]  ?></span></td>
                                    <?php } ?>
                                </tr>

                                <tr>
                                    <td>Exame em Pescado</td>
                                    <?php if (!isset($crimesAmbientais["Exame em Pescado"])) { ?>
                                        <td class="center"><span class="badge bg-gray">0</span></td>
                                    <?php } else { ?>
                                        <td class="center"><span class="badge bg-green"><?= $crimesAmbientais["Exame em Pescado"]  ?></span></td>
                                    <?php } ?>
                                </tr>

                                <tr>
                                    <td>Outros Exames Crimes Ambientais</td>
                                    <?php if (!isset($crimesAmbientais["Outros Exames Crimes Ambientais"])) { ?>
                                        <td class="center"><span class="badge bg-gray">0</span></td>
                                    <?php } else { ?>
                                        <td class="center"><span class="badge bg-green"><?= $crimesAmbientais["Outros Exames Crimes Ambientais"]  ?></span></td>
                                    <?php } ?>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </section>

</div>

<script>
    window.onload = dataAtual;

    function dataAtual() {
        now = new Date
        monName = new Array("Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro")
        var url_atual = window.location.href;

        url = url_atual.indexOf("=")


        if (url == -1) {
            mes = monName[now.getMonth()]
            anoAtual = now.getFullYear()

            document.getElementById('inicial').innerText = mes
            document.getElementById('final').innerText = mes
            document.getElementById('anoAtual').innerText = anoAtual.toString()
        } else {

            var query = location.search.slice(1);
            var partes = query.split('&');
            var data = {};
            partes.forEach(function(parte) {
                var chaveValor = parte.split('=');
                var chave = chaveValor[0];
                var valor = chaveValor[1];
                data[chave] = valor;
            });

            document.getElementById('inicial').innerText = monName[parseInt(data.month_start) - 1]
            document.getElementById('final').innerText = monName[parseInt(data.month_end) - 1]
            document.getElementById('anoAtual').innerText = data.year

        }

    }

    function buscaEstatistica() {
        var ano = document.getElementById('ano').value
        var mesIncial = document.getElementById('mes_inicial').value
        var mesFinal = document.getElementById('mes_final').value
        const urlParams = new URLSearchParams(window.location.search);

        urlParams.set('year', ano);
        urlParams.set('month_start', mesIncial);
        urlParams.set('month_end', mesFinal);

        window.location.search = urlParams;

    }

    function imprimir() {

        oldPage = document.getElementById("top").innerHTML
        $('.remove').remove();
        document.getElementById("documentoscopia").style.paddingTop =  "80px"
        window.print();
        document.getElementById("top").innerHTML = oldPage;
        document.getElementById("documentoscopia").style.paddingTop =  "0px"    
    }
</script>