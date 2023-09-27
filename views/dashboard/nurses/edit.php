<form method="POST" class="form container-usm">
  <h1>Editar información del enfermero</h1>
  <?php include_once __DIR__ . '/../../templates/alerts.php'?>
  <div class="field-group">
    <label for="name">Nombre:</label>
    <input type="text" name="name" id="name" value="<?= $nurse->name ?>">
  </div>
  <div class="field-group">
    <label for="surname">Apellido:</label>
    <input type="text" name="surname" id="surname" value="<?= $nurse->surname ?>">
  </div>
  <div class="field-group">
    <label for="phone">Telefono:</label>
    <input type="tel" name="phone" id="phone" value="<?= $nurse->phone ?>">
  </div>
  <div class="field-group">
    <label for="email">Email:</label>
    <input type="mail" name="email" id="email" value="<?= $nurse->email ?>">
  </div>
  <div class="field-group">
    <label for="domicile">Domicilio:</label>
    <input type="text" name="domicile" id="domicile" value="<?= $nurse->domicile ?>">
  </div>
  <div class="field-group">
    <label for="name">Área:</label>
    <select name="id_area" id="idArea">
      <option selected disabled>-- Seleccionar --</option>
      <?php foreach($areas as $area): ?>
      <option value="<?= $area->id ?>" <?= $area->id == $nurse->id_area ? 'selected' : '' ?>><?= $area->name ?>
      </option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="field-group">
    <button type="submit" class="submit-button">Guardar cambios</button>
  </div>
</form>