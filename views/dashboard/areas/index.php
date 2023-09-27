<h1>Áreas</h1>

<div class="container-sm section-sm">
  <?php if (isset($_GET['at']) && isset($_GET['am']) ): ?>
  <div class="alert <?= $_GET['at'] ?>">
    <?= $_GET['am'] ?>
  </div>
  <?php endif?>
</div>

<div class="table-container section">
  <table class="content-table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <?php if($_SESSION['admin']): ?>

        <th>Acciones</th>

        <?php endif; ?>
      </tr>
    </thead>
    <tbody>
      <?php foreach($areas as $area): ?>
      <tr>
        <td data-title="Id"><?= $area->id ?></td>
        <td data-title="Nombre"><?= $area->name ?></td>
        <td data-title="Descripción"><?= $area->description ?></td>
        <?php if($_SESSION['admin']): ?>

        <td data-title="Acciones" class="actions-buttons-container">
          <a href="<?= $_ENV['HOST']  ?>/dashboard/areas/edit?id=<?= $area->id ?>" class="actions-button edit-button">
            <i class="fa-solid fa-pencil"></i>
          </a>
          <a href="<?= $_ENV['HOST']  ?>/dashboard/areas/delete?id=<?= $area->id ?>"
            class="actions-button delete-button">
            <i class="fa-solid fa-trash"></i>
          </a>
        </td>

        <?php endif; ?>
      </tr>
      <?php endforeach ?>
    </tbody>
  </table>
  <?php if($_SESSION['admin']): ?>

  <a href="<?= $_ENV['HOST'] ?>/dashboard/areas/create" class="create-button">Crear área</a>

  <?php endif; ?>
</div>