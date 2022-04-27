<div style="padding-left: 20px;padding-right: 20px;">
    <!-- Bar chart -->
    <div class="box box-primary">
        <div class="box-header with-border">
            <div class="col-sm-8">
                <h3 class="box-title">Log de alterações</h3>
            </div>
            <div style="text-align: right;" class="col-sm-4">
                <div class="col-sm-10">
                    <?= $this->Form->input('onSearch', [
                        'class' => 'form-control', 'type' => 'text', 'id' => 'onSearch',
                        'label' => false, "placeholder" => "Pesquisar"
                    ]) ?>
                </div>
                <div class="col-sm-2">
                    <a onclick="onSearch()" class="icon-size-medium mouse-pointer"> <i class="fa fa-search"></i></a>
                </div>
            </div>
        </div>

        <div class="box-body table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>

                        <th scope="col">ID</th>
                        <th scope="col">Data/Hora</th>
                        <th scope="col">Nome do usuário</th>
                        <th scope="col">Mensagem</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $log) { ?>
                        <tr>

                            <th><?= $log->id ?></th>
                            <td><?= $log->created ?></td>
                            <td><?php
                                if (!isset($log->user->name)) {
                                    echo "-";
                                } else {
                                    echo $log->user->name;
                                }
                                ?></td>
                            <td><?= $log->message ?></td>


                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div style="text-align: right;">
                <nav aria-label="...">
                    <ul class="pagination">
                        <li id="return" class="page-item">

                            <?php
                            $page = 0;
                            $url = str_replace("Novo/", "", $_SERVER["REQUEST_URI"]);
                            $url = explode("/", $url);

                            if ($url[array_key_last($url)] == "" || $url[array_key_last($url)] == "1") {
                                $page = 1;
                            } else {
                                $page = (int) $url[array_key_last($url)];
                                $page--;
                            }

                            if (!isset($_GET['page'])) $page; ?>
                            <?= $this->Html->link(
                                'Antes',
                                ['controller' => 'Logs', 'action' => 'logs', $page],
                                ['label' => false, 'class' => 'btn btn-primary btn-sm', 'id' => 'button-antes']
                            ) ?>

                        </li>

                        <li id="next" class="page-item">

                            <?php
                            $page = 0;
                            $url = str_replace("Novo/", "", $_SERVER["REQUEST_URI"]);
                            $url = explode("/", $url);



                            if ($url[array_key_last($url)] == "" || $url[array_key_last($url)] == "0") {
                                $page = 1;
                            } else {
                                $page = (int) $url[array_key_last($url)];
                            }

                            if (!isset($_GET['page'])) $page++; ?>
                            <?= $this->Html->link(
                                'Próximo',
                                ['controller' => 'Logs', 'action' => 'logs', $page],
                                ['label' => false, 'class' => 'btn btn-primary btn-sm', 'id' => 'button-proximo']
                            ) ?>
                        </li>


                    </ul>
                </nav>
            </div>

        </div>

    </div>
    <!-- /.box -->
</div>

<script>
    window.onload = blockButton;

    function blockButton() {

        var x = document.URL;
        url = x.split('/')
        position = url.length - 1

        if (url[position] == '' || url[position] == '1' || url[position] == '0' || url[position] == '#') {

            $("#button-antes").remove()
            $("#return").append('<a disabled class="btn btn-primary btn-sm" id="button-antes">Antes</a>');

        }
        var token = "<?php echo $this->Session->read('Auth.User.token'); ?>"
        var y = document.URL;
        urlNext = y.split('/')
        positionNext = urlNext.length - 1
        id = parseInt(urlNext[positionNext])
        id = id + 1
        id - id.toString();



        var url = "<?= "http://localhost/p05-ger-pericial-back" ?>" + "/logs/view.json?page=" + id;
        var response = httpGet(url, token)
        var url = "<?= "http://localhost/p05-ger-pericial-back" ?>" + "/logs/view.json?page=" + "2";
        var responseFirst = httpGet(url, token)
        if (!(responseFirst.code == 404)) {
            if (response.code == 404) {
                $("#button-proximo").remove()
                $("#next").append('<a disabled class="btn btn-primary btn-sm" id="button-proximo">Próximo</a>');

            }
        } else {
            $("#button-proximo").remove()
            $("#next").append('<a disabled class="btn btn-primary btn-sm" id="button-proximo">Próximo</a>');

        }


    }

    function httpGet(theUrl, token) {
        var xmlHttp = new XMLHttpRequest();
        xmlHttp.open("GET", theUrl, false); // false for synchronous request
        xmlHttp.setRequestHeader("Authorization", "Bearer " + token + "");
        xmlHttp.send(null);
        return JSON.parse(xmlHttp.responseText);
    }

    function onSearch() {
        var search = document.getElementById('onSearch').value
        const urlParams = new URLSearchParams(window.location.search);

        urlParams.set('search', search);
        window.location.search = urlParams;

    }
</script>