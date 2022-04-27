<div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Lista de Novos Usuário</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Cargo</th>
                        <th>E-mail</th>
                        <th>Telefone</th>
                        <?php if ($this->Session->read('Auth.User.role_id') == 2) { ?>
                            <th>Opções</th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($data as $key => $user) { ?>
                        <?php foreach ($user as $u) { ?>
                            <td><?= $u->name ?></td>
                            <td><?= $u->position ?> </td>
                            <td><?= $u->email ?></td>
                            <td><?= $u->phone ?></td>
                            <?php if ($this->Session->read('Auth.User.role_id') == 2) { ?>
                                <td>

                                    <a onclick='aproveUser()' id='aprove-user' class='text-green icon-size-medium' title='Aprovar usuário' data-toggle='modal' data-id='<?= $u->id ?>' data-name='<?= $u->name ?>' data-target='#modal-aprovve'> <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                    </a>
                                    
                                    <a onclick='removeUser()' id='remove-user' class='text-red icon-size-medium' title='Remover usuário' data-toggle='modal' data-id='<?= $u->id ?>' data-name='<?= $u->name ?>' data-target='#modal-remove'> <i class="fa fa-close" aria-hidden="true"></i>
                                    </a>

                                </td>
                            <?php } ?>
                            </tr>
                    <?php }
                    } ?>

                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>

<!-- Modal -->
<div class="modal fade" id="modal-aprovve">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Aprovar usuário</h3>
            </div>
            <div class="modal-body">

                <h4 id="aprove-name-user"> </h4>


            </div>
            <div class="modal-footer">

                <?= $this->Form->create(null, ['url' => ['controller' => 'Users', 'action' => 'authorizeUser']]) ?>
                <?= $this->Form->input('id', [
                    'type' => 'hidden',
                    'label' => false,
                    'id' => 'id-userAprove'
                ]) ?>
                <?= $this->Form->button(
                    'Aprovar',
                    ['class' => 'btn btn-primary ', 'type' => 'submit']
                ) ?>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <?= $this->Form->end(); ?>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- Modal -->
<div class="modal fade" id="modal-remove">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Remover usuário</h3>
            </div>
            <div class="modal-body modal-requisition">

                <h4 id="remove-name-user"> </h4>


            </div>
            <div class="modal-footer">

            <?= $this->Form->create(null, ['url' => ['controller' => 'Users', 'action' => 'unauthorizeUser']]) ?>
                <?= $this->Form->input('id', [
                    'type' => 'hidden',
                    'label' => false,
                    'id' => 'id-userRemove'
                ]) ?>
                <?= $this->Form->button(
                    'Remover',
                    ['class' => 'btn btn-primary ', 'type' => 'submit']
                ) ?>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <?= $this->Form->end(); ?>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>
    function aproveUser() {
        var button = $(event.currentTarget);
        var id = button.data('id')
        var name = button.data('name')

        var textName = 'Tem certeza que deseja aprovar o usuario ' + name + '?'
        document.getElementById('aprove-name-user').innerText = textName
      
        $('#id-userAprove').val(id)
    }

    function removeUser() {
        var button = $(event.currentTarget);
        var id = button.data('id')
        var name = button.data('name')

        var textName = 'Tem certeza que deseja remover o usuario ' + name + '?'
        document.getElementById('remove-name-user').innerText = textName
      
        $('#id-userRemove').val(id)
    }
</script>