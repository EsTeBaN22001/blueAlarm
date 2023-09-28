<form method="POST" class="form container-usm">
  <h1>Crear llamado</h1>
  <?php include_once __DIR__ . '/../../templates/alerts.php'?>
  <div class="field-group">
    <label for="id_type">Tipo:</label>
    <select name="id_type" id="id_type">
      <option selected disabled>-- Seleccionar --</option>
      <?php foreach($types as $type): ?>
      <!-- <option value="<?= $type->id ?>"><?= $type->name ?></option> -->
      <option value="<?= $type->id ?>" <?= $type->id == $call->id_type ? 'selected' : '' ?>><?= $type->name ?>
      </option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="field-group">
    <label for="id_area">Área:</label>
    <select name="id_area" id="idArea">
      <option selected disabled>-- Seleccionar --</option>
      <?php foreach($areas as $area): ?>
      <option value="<?= $area->id ?>" <?= $area->id == $call->id_area ? 'selected' : '' ?>><?= $area->name ?>
        <?php endforeach; ?>
    </select>
  </div>
  <div class="field-group">
    <label for="id_patient">Paciente:</label>
    <select name="id_patient" id="id_patient">
      <option selected disabled>-- Seleccionar --</option>
      <?php foreach($patients as $patient): ?>
      <option value="<?= $patient->id ?>" <?= $patient->id == $call->id_patient ? 'selected' : '' ?>>
        <?= $patient->name ?>
        <?php endforeach; ?>
    </select>
  </div>
  <div class="field-group">
    <label for="id_nurse">Enfermero a cargo:</label>
    <select name="id_nurse" id="id_nurse">
      <option selected disabled>-- Seleccionar --</option>
      <?php foreach($nurses as $nurse): ?>
      <option value="<?= $nurse->id ?>" <?= $nurse->id == $call->id_nurse ? 'selected' : '' ?>><?= $nurse->name ?>
        <?php endforeach; ?>
    </select>
  </div>
  <div class="field-group">
    <button type="submit" class="submit-button">Crear llamado</button>
  </div>
</form>