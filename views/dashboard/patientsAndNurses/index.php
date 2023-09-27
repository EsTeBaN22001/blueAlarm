<h1>Pacientes</h1>

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
        <th>Telefono</th>
        <th>Email</th>
        <th>Domicilio</th>
        <th>Area</th>
        <?php if($_SESSION['admin']): ?>

        <th>Acciones</th>

        <?php endif; ?>
      </tr>
    </thead>
    <tbody>
      <?php foreach($patients as $patient): ?>
      <tr>
        <td data-title="Id"><?= $patient->id ?></td>
        <td data-title="Nombre"><?= $patient->name ?></td>
        <td data-title="Apellido"><?= $patient->surname ?></td>
        <td data-title="Telefono"><?= $patient->phone ?></td>
        <td data-title="Email"><?= $patient->email ?></td>
        <td data-title="Domicilio"><?= $patient->domicile ?></td>
        <td data-title="Área"><?= $patient->area ?></td>
        <?php if($_SESSION['admin']): ?>

        <td data-title="Acciones" class="actions-buttons-container">
          <a href="<?= $_ENV['HOST']  ?>/dashboard/patients/edit?id=<?= $patient->id ?>"
            class="actions-button edit-button">
            <i class="fa-solid fa-pencil"></i>
          </a>
          <a href="<?= $_ENV['HOST']  ?>/dashboard/patients/delete?id=<?= $patient->id ?>"
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

  <a href="<?= $_ENV['HOST'] ?>/dashboard/patients/create" class="create-button">Crear paciente</a>

  <?php endif; ?>
</div>