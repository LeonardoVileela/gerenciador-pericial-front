<?php

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Gerenciador Pericial</title>

    <?= $this->Html->meta('icon') ?>




    <?= $this->Html->css('home-css/bootstrap.min.css') ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?= $this->Html->css('home-css/AdminLTE.min.css') ?>
    <?= $this->Html->css('home-css/_all-skins.min.css') ?>
    <?= $this->Html->css('home-css/daterangepicker.css') ?>
    <?= $this->Html->css('home-css/bootstrap-colorpicker.min.css') ?>
    <?= $this->Html->css('home-css/bootstrap-timepicker.min.css') ?>
    <?= $this->Html->css('toastr.min.css') ?>
    <?= $this->Html->css('general.css') ?>
    <?= $this->Html->css('table-css/jquery-table.css') ?>


    <?= $this->Html->css('home-css/ionicons.min.css') ?>
    <?= $this->Html->css('home-css/bootstrap-datepicker.min.css') ?>
    <?= $this->Html->css('home-css/all.css') ?>
    <?= $this->Html->css('home-css/select2.min.css') ?>
    <?= $this->Html->css('home-css/dataTables.bootstrap4.min.css') ?>





    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->

            <?= $this->Html->link(
                '<span class="logo-mini"><b>GP</b></span> <span class="logo-lg"><b>Gerenciador Pericial</b></span>',
                ['controller' => 'Pages', 'action' => 'home'],
                ['escape' => false, 'class' => 'logo']
            ) ?>

            <!-- <a href="index2.html" class="logo">
                mini logo for sidebar mini 50x50 pixels
                <span class="logo-mini"><b>GP</b></span>
                logo for regular state and mobile devices
                <span class="logo-lg"><b>Gerenciador Pericial</b></span>
            </a> -->
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <?php if ($this->Session->read('Auth.User.profile_picture') != null) { ?>
                                    <img src="<?= 'http://localhost/p05-ger-pericial-front' . '/webroot/files/pictures/' .  $this->Session->read('Auth.User.profile_picture') ?>" class="user-image" alt="User profile picture">
                                <?php } else { ?>
                                    <img src="<?= 'http://localhost/p05-ger-pericial-front' . "/webroot/files/pictures/default.png" ?>" class="user-image" alt="User profile picture">
                                <?php } ?>
                                <span class="hidden-xs"><?= $this->Session->read('Auth.User.name'); ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <?php if ($this->Session->read('Auth.User.profile_picture') != null) { ?>
                                        <img src="<?= 'http://localhost/p05-ger-pericial-front' . '/webroot/files/pictures/' . $this->Session->read('Auth.User.profile_picture') ?>" class="img-circle" alt="User profile picture">
                                    <?php } else { ?>
                                        <img src="<?= 'http://localhost/p05-ger-pericial-front' . "/webroot/files/pictures/default.png" ?>" class="img-circle" alt="User profile picture ">
                                    <?php } ?>

                                    <p><?= $this->Session->read('Auth.User.name'); ?><small><?php if ($this->Session->read('Auth.User.role_id') == 2) {
                                                                                                echo "Administrador";
                                                                                            } else {
                                                                                                echo "Usuário";
                                                                                            }
                                                                                            ?></small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <?= $this->Html->link(
                                            'Perfil',
                                            ['controller' => 'Pages', 'action' => 'profile'],
                                            ['class' => 'btn btn-default btn-flat']
                                        ) ?>
                                    </div>
                                    <div class="pull-right">
                                        <?= $this->Html->link(
                                            'Sair <i class="fa fa-sign-out" aria-hidden="true"></i>',
                                            ['controller' => 'Login', 'action' => 'logout'],
                                            ['escape' => false, 'class' => 'btn btn-default btn-flat']
                                        ) ?>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                        <li>
                            <?= $this->Html->link(
                                '<i class="fa fa-sign-out" aria-hidden="true"></i>',
                                ['controller' => 'Login', 'action' => 'logout'],
                                ['escape' => false]
                            ) ?>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">Menu de Navagação</li>

                    <li>
                        <?= $this->Html->link(
                            '<i class="fa fa-home"></i> <span>Home</span>  <span class="pull-right-container">
                            <i class="pull-right"></i>
                          </span>',
                            ['controller' => 'Pages', 'action' => 'home'],
                            ['escape' => false, 'class' => 'pull-right-container']
                        ) ?>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-file-text-o"></i> <span>Livro De Entrada</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">


                            <li class="active"><?= $this->Html->link(
                                                    '<i class="fa fa-plus-square"></i> Cadastrar Nova Requisição',
                                                    ['controller' => 'Requisitions', 'action' => 'add-requisition'],
                                                    ['escape' => false]
                                                ) ?></li>

                            <li class="active"><?= $this->Html->link(
                                                    '<i class="fa fa-wpforms"></i> Requisições',
                                                    ['controller' => 'Pages', 'action' => 'requisition'],
                                                    ['escape' => false]
                                                ) ?></li>

                            <li class="active"><?= $this->Html->link(
                                                    '<i class="fa fa-book"></i> Laudos',
                                                    ['controller' => 'Pages', 'action' => 'report'],
                                                    ['escape' => false]
                                                ) ?></li>

                        </ul>
                    </li>


                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-user"></i> <span>Usuários</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">

                            <?php if ($this->Session->read('Auth.User.role_id') == 2) { ?>
                                <li class="active"><?= $this->Html->link(
                                                        '<i class="fa fa-user-plus"></i> Novos Usuários',
                                                        ['controller' => 'Pages', 'action' => 'viewUnUsers'],
                                                        ['escape' => false]
                                                    ) ?></li>

                            <?php } ?>

                            <li class="active"><?= $this->Html->link(
                                                    '<i class="fa fa-users"></i> Lista de Usuários',
                                                    ['controller' => 'Pages', 'action' => 'viewUsers'],
                                                    ['escape' => false]
                                                ) ?></li>

                            <?php if ($this->Session->read('Auth.User.role_id') == 2) { ?>
                                <li class="active"><?= $this->Html->link(
                                                        '<i class="fa fa-user-times"></i> Usuários Inativos',
                                                        ['controller' => 'Pages', 'action' => 'viewInactive'],
                                                        ['escape' => false]
                                                    ) ?></li>

                            <?php } ?>

                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-line-chart"></i> <span>Relatórios</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">


                            <li class="active"><?= $this->Html->link(
                                                    '<i class="fa fa-pie-chart"></i> Estatísticas',
                                                    ['controller' => 'Pages', 'action' => 'statistics'],
                                                    ['escape' => false]
                                                ) ?></li>
                            <li class="active"><?= $this->Html->link(
                                                    '<i class="fa fa-bar-chart"></i> Relatório de requisições',
                                                    ['controller' => 'Pages', 'action' => 'analysis'],
                                                    ['escape' => false]
                                                ) ?></li>

                            <?php if ($this->Session->read('Auth.User.role_id') == 2) { ?>
                                <li class="active"><?= $this->Html->link(
                                                        '<i class="fa fa-history"></i> Log de alterações',
                                                        ['controller' => 'Logs', 'action' => 'logs'],
                                                        ['escape' => false]
                                                    ) ?></li>

                            <?php } ?>





                        </ul>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                </div>
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <?php if ($this->Session->read('Auth.User.confirmation') == false || $this->Session->read('Auth.User.actived') == false) { ?>
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Conta não autorizada</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">

                                    <div class="text-red">
                                        <h3>Você não tem autorização para acessar o sistema. Por favor, contate algum administrador.</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } else { ?>
                        <?= $this->fetch('content') ?>
                    <?php } ?>


                    <!-- right col -->
                </div>
                <!-- /.row (main row) -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1.0
            </div>
            <strong>Copyright &copy; 2020 <a href="https://ufms.br">Universidade Federal do Mato Grosso do Sul</a>.</strong> All rights
            reserved.
        </footer>


        <?= $this->Html->script('home-js/jquery.min.js') ?>
        <?= $this->Html->script('home-js/bootstrap.min.js') ?>
        <?= $this->Html->script('home-js/adminlte.min.js') ?>
        <?= $this->Html->script('sweetalert2.min.js') ?>
        <?= $this->Html->script('toastr.min.js') ?>
        <?= $this->Html->script('table-js/scroll.js') ?>
        <?= $this->Html->script('table-js/fastclick.js') ?>
        <?= $this->Html->script('home-js/fontawesome.min.js') ?>

        <?= $this->Html->script('home-js/moment.min.js') ?>
        <?= $this->Html->script('home-js/daterangepicker.js') ?>
        <?= $this->Html->script('home-js/bootstrap-datepicker.min.js') ?>
        <?= $this->Html->script('home-js/bootstrap-colorpicker.min.js') ?>
        <?= $this->Html->script('home-js/bootstrap-timepicker.min.js') ?>

        <?= $this->Html->script('home-js/jquery.slimscroll.min.js') ?>
        <?= $this->Html->script('home-js/icheck.min.js') ?>
        <?= $this->Html->script('home-js/fastclick.js') ?>
        <?= $this->Html->script('home-js/demo.js') ?>
        <?= $this->Html->script('home-js/select2.full.min.js') ?>

        <?= $this->Html->script('home-js/morris.min.js') ?>
        <?= $this->Html->script('home-js/raphael.min.js') ?>

        <?= $this->Html->script('home-js/jquery.mask.js') ?>
        <?= $this->Html->script('home-js/jquery.min.js') ?>

        <?= $this->Html->script('home-js/jquery.dataTables.min.js') ?>

        <?= $this->Html->script('home-js/dataTables.bootstrap4.min.js') ?>








        <script>
            $(function() {
                //Initialize Select2 Elements
                $('.select2').select2()

                $('.datemask').mask('00/00/0000');

                $('.doc').mask('0000/0000', {
                    reverse: true
                });


                $('.placa').mask('ZZZZZZZ', {
                    translation: {
                        'Z': {
                            pattern: /[0-9a-zA-Z]/,
                            optional: true
                        }
                    }
                });

                //Date range picker
                $('#reservation').daterangepicker()
                //Date range picker with time picker
                $('#reservationtime').daterangepicker({
                    timePicker: true,
                    timePickerIncrement: 30,
                    locale: {
                        format: 'MM/DD/YYYY hh:mm A'
                    }
                })
                //Date range as a button
                $('#daterange-btn').daterangepicker({
                        ranges: {
                            'Today': [moment(), moment()],
                            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                            'This Month': [moment().startOf('month'), moment().endOf('month')],
                            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                        },
                        startDate: moment().subtract(29, 'days'),
                        endDate: moment()
                    },
                    function(start, end) {
                        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
                    }
                )

                //Date picker
                $('#datepicker').datepicker({
                    autoclose: true
                })

                //iCheck for checkbox and radio inputs
                $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                    checkboxClass: 'icheckbox_minimal-blue',
                    radioClass: 'iradio_minimal-blue'
                })
                //Red color scheme for iCheck
                $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                    checkboxClass: 'icheckbox_minimal-red',
                    radioClass: 'iradio_minimal-red'
                })
                //Flat red color scheme for iCheck
                $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                    checkboxClass: 'icheckbox_flat-green',
                    radioClass: 'iradio_flat-green'
                })

                //Colorpicker
                $('.my-colorpicker1').colorpicker()
                //color picker with addon
                $('.my-colorpicker2').colorpicker()

                //Timepicker
                $('.timepicker').timepicker({
                    showInputs: false
                })
            })
        </script>


        <script>
            $(function() {
                $('#example1').DataTable()
                $('#example2').DataTable({
                    'paging': true,
                    'lengthChange': false,
                    'searching': false,
                    'ordering': true,
                    'info': true,
                    'autoWidth': false
                })
            })
        </script>

        <script>
            $('#modal').on('shown.bs.modal', function() {
                $('#myInput').trigger('focus')
            })
        </script>

        <?= $this->Flash->render() ?>



</body>

</html>