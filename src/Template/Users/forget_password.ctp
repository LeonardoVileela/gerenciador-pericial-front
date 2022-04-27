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
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" rel="stylesheet">
</head>


<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-left">
                <div class="row">
                    <div class="col-2">
                        <img src="https://www.sejusp.ms.gov.br/wp-content/uploads/2014/11/logo_pericias.jpg" class="logo" height="70px">
                    </div>
                    <div class="col-8 text-center">
                        <h2 class="h2"><b>Recuperar Senha</b></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Digite seu e-mail, que iremos enviar um link para redefinir sua senha.</p>
                <?= $this->Form->create(null, ['url' => ['controller' => 'Account', 'action' => 'lostAccount']]); ?>


                <div class="input-group mb-3">
                    <?= $this->Form->input('email', ['class' => 'form-control', 'type' => 'email', 'placeholder' => 'nome@gmail.com', 'label' => 'E-Mail', 'required']) ?>
                </div>
                <div class="row">
                    <div class="col-6">
                        <?= $this->Form->button(__('Recuperar senha'), ['class' => 'btn btn-primary btn-block']) ?>
                    </div>
                    <!-- /.col -->
                </div>
                </form>
                <p class="mb-1 text-center">
                    <?= $this->Html->link("Login", ['controller' => 'Users', 'action' => 'login']) ?>
                </p>
                <?= $this->Form->end() ?>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
</body>

</html>