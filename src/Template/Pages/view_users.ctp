<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->


<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Lista de Usuário</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-striped table-responsive">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Foto</th>
            <th>Nome</th>
            <th>Cargo</th>
            <th>Tipo de Usuário</th>
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
              <td>
                <?php if ($u->profile_picture != null) { ?>
                  <img src="<?= 'http://localhost/p05-ger-pericial-front'  . '/webroot/files/pictures/' . $u->profile_picture ?>" class="user-image imagemUser" alt="User profile picture">
                <?php } else { ?>
                  <img src="webroot/files/pictures/default.png" class="user-image imagemUser" alt="User profile picture">
                <?php } ?>
              </td>
              <td><?= $u->name ?></td>
              <td><?= $u->position ?> </td>
              <?php if ($u->role_id == 2) { ?>
                <td>Administrador</td>
              <?php } else { ?>
                <td>Usuário</td>
              <?php }
              if (strlen($u->email_confirmed) > 12 || $u->email_confirmed == 0) {  ?>

                <td> <?= $u->email ?> <i class="fa fa-close text-red" aria-hidden="true"></i></td>
              <?php } else {   ?>
                <td> <?= $u->email ?> <i class="fa fa-check text-green" aria-hidden="true"></i></td>
              <?php }    ?>
              <td><?= $u->phone ?></td>
              <?php if ($this->Session->read('Auth.User.role_id') == 2) { ?>
                <td>

                  <a onclick='promoteUser()' id='promote-user' class='text-black icon-size-medium' title='Promover usuário' data-toggle='modal' data-id='<?= $u->id ?>' data-name='<?= $u->name ?>' data-target='#modal-promote'>
                    <i class="fa fa-user-secret" aria-hidden="true"></i>
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
<div class="modal fade" id="modal-promote">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Promover usuário</h3>
      </div>
      <div class="modal-body modal-requisition">

        <h4 id="promote-name-user"> </h4>


      </div>
      <div class="modal-footer">

        <?= $this->Form->create(null, ['url' => ['controller' => 'Users', 'action' => 'promoteUser']]) ?>
        <?= $this->Form->input('id', [
          'type' => 'hidden',
          'label' => false,
          'id' => 'id-userPromote'
        ]) ?>
        <?= $this->Form->button(
          'Promover',
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
        <h3 class="modal-title">Desativar usuário</h3>
      </div>
      <div class="modal-body modal-requisition">

        <h4 id="remove-name-user"> </h4>

      </div>
      <div class="modal-footer">

        <?= $this->Form->create(null, ['url' => ['controller' => 'Users', 'action' => 'removeUser']]) ?>
        <?= $this->Form->input('id', [
          'type' => 'hidden',
          'label' => false,
          'id' => 'id-userRemove'
        ]) ?>
        <?= $this->Form->button(
          'Desativar',
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
  function promoteUser() {
    var button = $(event.currentTarget);
    var id = button.data('id')
    var name = button.data('name')

    var textName = 'Tem certeza que deseja promover o usuario ' + name + ' para admin?'
    document.getElementById('promote-name-user').innerText = textName

    $('#id-userPromote').val(id)
  }

  function removeUser() {
    var button = $(event.currentTarget);
    var id = button.data('id')
    var name = button.data('name')

    var textName = 'Tem certeza que deseja desativar o usuario ' + name + ' do sistema?'
    document.getElementById('remove-name-user').innerText = textName

    $('#id-userRemove').val(id)
  }
</script>