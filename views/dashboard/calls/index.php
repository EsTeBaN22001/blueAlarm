<h1>Llamados</h1>

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
        <th>Tipo</th>
        <th>Área</th>
        <th>Paciente</th>
        <th>Enfermero</th>
        <th>Fecha de creación</th>
        <th>Fecha de respuesta</th>
        <th>Estado</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($calls as $call): ?>
      <tr>
        <td data-title="Id"><?= $call->id ?></td>
        <td data-title="Tipo"><?= $call->type ?></td>
        <td data-title="Área"><?= $call->area ?></td>
        <td data-title="Paciente"><?= $call->patient ?></td>
        <td data-title="Enfermero"><?= $call->nurse ?></td>
        <td data-title="Fecha de creación" class="dateFormat"><?= $call->started_date ?></td>
        <?php if($call->response_date === $call->started_date): ?>
        <td data-title="Fecha respuesta"> - </td>
        <?php else: ?>
        <td data-title="Fecha respuesta" class="dateFormat"><?= $call->response_date ?></td>
        <?php endif; ?>
        <td data-title="Estado respuesta" class="answered-buttons-container">
          <a href="<?php $_ENV['HOST'] ?>/dashboard/calls/edit-state?id=<?= $call->id ?>"
            class="answered-button <?= $call->answered == "Pendiente" ? 'pendient-button': 'completed-button' ?>"><?= $call->answered ?></a>
        </td>
        <?php if($_SESSION['admin']): ?>

        <td data-title="Acciones" class="actions-buttons-container">
          <a href="<?= $_ENV['HOST']  ?>/dashboard/calls/delete?id=<?= $call->id ?>"
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

  <a href="<?= $_ENV['HOST'] ?>/dashboard/calls/create" class="create-button">Crear llamado</a>

  <?php endif; ?>
</div>

<?php 

$script = '
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/locale/es.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment-duration-format/2.3.2/moment-duration-format.min.js"></script>
<script src="/build/js/dayjsConfig.js"></script>
';

?>