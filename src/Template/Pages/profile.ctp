<div class="row">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 id="user-profile">
            Perfil do Usuário
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="col-md-4">
            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile" id="box_profile">
                    <?php if ($this->Session->read('Auth.User.profile_picture') != null) { ?>
                        <img src="webroot/files/pictures/<?= $this->Session->read('Auth.User.profile_picture') ?>" class="profile-user-img img-responsive img-circle" alt="User profile picture">
                    <?php } else { ?>
                        <img src="webroot/files/pictures/default.png" class="profile-user-img img-responsive img-circle" alt="User profile picture">
                    <?php }  ?>
                    <h3 class="profile-username text-center"><?= $this->Session->read('Auth.User.name') ?></h3>

                    <p class="text-muted text-center"><?= $this->Session->read('Auth.User.position') ?></p>
                    <?= $this->Form->create(null, ['url' => ['controller' => 'Users', 'action' => 'uploadFile'], 'type' => 'file']); ?>
                    <?= $this->Form->input('id', ['type' => 'hidden', 'value' => $this->Session->read('Auth.User.id'), 'label' => false]) ?>
                    <?= $this->Form->control('profile_picture[]', ['type' => 'file', 'accept' => 'image/png, image/jpeg', 'required', 'label' => false]); ?>
                    <div id="button_profile">
                        <?= $this->Form->button('Salvar nova foto', ['class' => 'btn btn-primary btn-block',]) ?>
                    </div>
                    <?= $this->Form->end(); ?>

                </div>
                <!-- /.box-body -->
            </div>
        </div>

        <!-- /.col -->
        <div class="col-md-8">
            <!-- /.nav-tabs-custom -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#activity" data-toggle="tab">Editar Perfil</a></li>
                </ul>
                <div class="tab-content">
                    <div class="active tab-pane" id="activity">

                        <?= $this->Form->create(null, ['url' => ['controller' => 'Users', 'action' => 'edit'], 'class' => 'form-horizontal']); ?>
                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">Nome</label>
                            <?= $this->Form->input('id', [
                                'type' => 'hidden',
                                'value' => $this->Session->read('Auth.User.id'), 'label' => false
                            ]) ?>

                            <div class="col-sm-10">
                                <?= $this->Form->input('name', [
                                    'class' => 'form-control', 'type' => 'text',
                                    'value' => $this->Session->read('Auth.User.name'), 'label' => false
                                ]) ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="col-sm-2 control-label" id="padProfile">E-mail</label>
                            <div>
                                <?php
                                $convert =  $this->Session->read('Auth.User');
                                $us = (object) $convert;
                                ?>
                                <?php if (strlen($us->email_confirmed) > 12 || $us->email_confirmed == 0) {  ?>
                                    <div id="emailProfile">
                                        <td> <?= $us->email ?> <i class="fa fa-close text-red" aria-hidden="true"></i></td>
                                    </div>
                                    <div id="buttonVerifyProfile">
                                        <?= $this->Html->link('Verificar E-mail', ['controller' => 'Account', 'action' => 'resendEmail'], ["class" => "btn btn-success btn-xs"]); ?>
                                    </div>


                                <?php } else {   ?>

                                    <div id="emailProfile">
                                        <td> <?= $us->email ?> <i class="fa fa-check text-green" aria-hidden="true"></i></td>
                                    </div>

                                <?php }    ?>
                            </div>


                        </div>
                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">Telefone</label>

                            <div class="col-sm-10">
                                <?= $this->Form->input('phone', [
                                    'class' => 'form-control', 'type' => 'phone',
                                    'value' => $this->Session->read('Auth.User.phone'), 'label' => false
                                ]) ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputExperience" class="col-sm-2 control-label">Cargo</label>

                            <div class="col-sm-10">
                                <?= $this->Form->input('position', [
                                    'class' => 'form-control', 'type' => 'text', 'disabled',
                                    'value' => $this->Session->read('Auth.User.position'), 'label' => false
                                ]) ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputSkills" class="col-sm-2 control-label">Confirmação</label>

                            <div class="col-sm-10">
                                <?php if ($this->Session->read('Auth.User.confirmation') == 1) { ?>
                                    <div class="checkbox"><span class='text-green text-bold'>Conta Autorizada</span></div>
                                <?php } else { ?>
                                    <div class="checkbox"><span class='text-red text-bold'>Conta Não Autorizada</span></div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <?= $this->Form->button(__('Salvar alterações'), ['class' => 'btn btn-success']) ?>
                            </div>
                        </div>
                        <?= $this->Form->end() ?>


                    </div>
                    <!-- /.tab-pane -->

                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
        </div>
    </section>
    <!-- /.col -->
</div>
<!-- /.row -->