<h1>Usuarios</h1>

<div class="container-sm section-sm">
  <?php if (isset($_GET['at']) && isset($_GET['am']) ): ?>
  <div class="alert <?= $_GET['at'] ?>">
    <?= $_GET['am'] ?>
  </div>
  <?php endif?>
</div>

<div class="table-container">
  <table class="content-table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Email</th>
        <th>Administrador</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($users as $user): ?>
      <tr>
        <td data-title="Id"><?= $user->id ?></td>
        <td data-title="Nombre"><?= $user->name ?></td>
        <td data-title="Apellido"><?= $user->surname ?></td>
        <td data-title="Email"><?= $user->email ?></td>
        <td data-title="Administrador"><?= $user->admin ?></td>
        <td data-title="Acciones" class="actions-buttons-container">
          <a href="<?= $_SERVER['HOST']  ?>/dashboard/users/edit?id=<?= $user->id ?>"
            class="actions-button edit-button">
            <i class="fa-solid fa-pencil"></i>
          </a>
          <a href="$_SERVER['HOST']  ?>/dashboard/users/delete?id=<?= $user->id ?>"
            class="actions-button delete-button">
            <i class="fa-solid fa-trash"></i>
          </a>
        </td>
      </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>