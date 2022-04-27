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
<html>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= 'Gerenciador Pericial' ?>
    </title>

    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('fontawesome-free/all.min.css') ?>
    <?= $this->Html->css('icheck-bootstrap/icheck-bootstrap.min.css') ?>
    <?= $this->Html->css('adminlte.min.css') ?>
    <?= $this->Html->css('toastr.min.css') ?>
    <?= $this->Html->css('general.css') ?>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header">
                <div class="row">
                    <div class="col-2">
                        <img src="https://www.sejusp.ms.gov.br/wp-content/uploads/2014/11/logo_pericias.jpg" class="logo" height="70px">
                    </div>
                    <div class="col-8 text-center">
                        <h2 class="h2"><b>Gerenciador Pericial</b></a>
                    </div>
                </div> 
            </div>
            <div class="card-body">
            <?= $this->Form->create(null, ['url' => ['controller' => 'Login', 'action' => 'login']]); ?>
                <div class="input-group mb-3">
                    <?= $this->Form->input('email', ['class' => 'form-control', 'type' => 'email', 'placeholder' => 'nome@gmail.com', 'label' => 'E-Mail', 'tabindex' => '1']) ?>
                    <p class="mb-0">
                        <?= $this->Html->link("Não possui conta? Cadastre-se.", ['controller' => 'Users', 'action' => 'register']) ?>
                    </p>
                </div>
                <div class="input-group mb-3">
                    <?= $this->Form->input('password', ['class' => 'form-control', 'type' => 'password', 'placeholder' => '**********', 'label' => 'Senha', 'tabindex' => '2']) ?>
                    <p class="mb-1">
                        <?= $this->Html->link("Esqueceu sua senha? Clique aqui para recebê-la por e-mail.", ['controller' => 'Users', 'action' => 'forgetPassword']) ?>
                    </p>
                    <!-- <input type="password" class="form-control" placeholder="Password"> -->
                </div>
                <div class="row">
                    <div class="loginBut">
                        <?= $this->Form->button(__('Entrar'), ['tabindex' => '3', 'class' => 'btn btn-primary']) ?>
                        <!-- <button type="submit" class="btn btn-primary btn-block">Entrar</button> -->
                    </div>
                    <!-- /.col -->
                </div>
                <?= $this->Form->end() ?>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
</body>
<?= $this->Html->script('toastr.min.js') ?>
<?= $this->Html->script('sweetalert2.min.js') ?>
<?= $this->Flash->render() ?>

</html>