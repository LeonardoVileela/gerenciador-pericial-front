<?php

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

$this->layout = false;

?>
<!DOCTYPE html>
<html style="background: #E9ECEF;">


<head>
    <meta charset="utf-8">
    <?= $this->Html->charset() ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gerenciador Pericial</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">


    <?= $this->Html->css('home-css/bootstrap.min.css') ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?= $this->Html->css('home-css/AdminLTE.min.css') ?>
    <?= $this->Html->css('home-css/ionicons.min.css') ?>
    <?= $this->Html->css('home-css/blue.css') ?>


    <?= $this->Html->css('toastr.min.css') ?>
    <?= $this->Html->css('general.css') ?>


    <?= $this->Html->css('home-css/ionicons.min.css') ?>
    <?= $this->Html->css('home-css/bootstrap-datepicker.min.css') ?>
    <?= $this->Html->css('home-css/all.css') ?>
    <?= $this->Html->css('home-css/select2.min.css') ?>
    <?= $this->Html->css('home-css/dataTables.bootstrap4.min.css') ?>
</head>

<body class="hold-transition register-page" style="background: #E9ECEF;">
    <div class="register-box" style="margin-top: 20px;">
        <div class="register-box-body" style="color: black;">
            <div class="register-logo">
                <b>Novo Cadastro</b>
            </div>

            <?= $this->Form->create($users, ['url' => ['controller' => 'Users', 'action' => 'register']]); ?>
            <div class="form-group has-feedback">
                <?= $this->Form->input('name', ['class' => 'form-control', 'type' => 'text', 'placeholder' => 'José da Silva', 'label' => 'Nome Completo *']) ?>
            </div>
            <div class="form-group has-feedback">
                <?= $this->Form->input('phone', [
                    'class' => 'form-control phone', 'type' => 'text',
                    'placeholder' => '(67) 99999-9999', 'label' => 'Telefone *'
                ]) ?>
            </div>

            <div class="form-group has-feedback">
                <?= $this->Form->input('email', ['class' => 'form-control', 'type' => 'email', 'placeholder' => 'nome@gmail.com', 'label' => 'E-Mail *']) ?>
            </div>
            <div class="form-group has-feedback">
                <label for="name">Cargo *</label>
                <?= $this->Form->select('position', ['Agente de Polícia Científica' => 'Agente de Polícia Científica', 'Médico Legista' => 'Médico Legista', 'Perito Criminal' => 'Perito Criminal', 'Perito Papiloscopista' => 'Perito Papiloscopista', 'Estagiário' => 'Estagiário'], ['class' => 'form-control', 'empty' => 'Selecione']) ?>
            </div>
            <div class="form-group has-feedback">
                <?= $this->Form->input('password', ['class' => 'form-control', 'type' => 'password', 'placeholder' => '**********', 'label' => 'Senha *']) ?>
            </div>
            <div class="form-group has-feedback">
                <?= $this->Form->input('confirmPassword', ['class' => 'form-control', 'type' => 'password', 'placeholder' => '**********', 'label' => 'Confirmação de senha *']) ?>
            </div>
            <div class="row">
                <!-- /.col -->
                <div class="col-xs-12">
                    <button class="btn btn-primary btn-block btn-flat" type="submit" style="background: #263667; border-color: #263667; ">Cadastrar</button>
                </div>
                <!-- /.col -->
            </div>
            <?= $this->Form->end() ?>
            <div style="text-align: center;">
            <u><?= $this->Html->link("Já sou cadastrado.", ['controller' => 'Users', 'action' => 'login'],[ 'class' => 'text-center', 'style' => 'color:#263667;']) ?></u>
            </div>
        </div>
        <!-- /.form-box -->
    </div>
    <!-- /.register-box -->
</body>

</html>

<?= $this->Html->script('home-js/icheck.min.js') ?>
<?= $this->Html->script('home-js/bootstrap.min.js') ?>
<?= $this->Html->script('home-js/jquery.min.js') ?>
<?= $this->Html->script('home-js/jquery.mask.js') ?>


<script>
    $(function() {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
</script>
<script>
    window.onload = phone;

    function phone() {
        $('.phone').mask('(00) 00000-0000');

    }
</script>

<?= $this->Html->script('toastr.min.js') ?>
<?= $this->Html->script('sweetalert2.min.js') ?>
<?= $this->Flash->render() ?>