<form method="POST" class="form container-usm">
  <h1>Editar información del usuario</h1>
  <?php include_once __DIR__ . '/../../templates/alerts.php'?>
  <div class="field-group">
    <label for="name">Nombre:</label>
    <input type="text" name="name" id="name" value="<?= $area->name ?>">
  </div>
  <div class="field-group">
    <label for="description">Descripción:</label>
    <textarea name="description" id="description" cols="30" rows="10"><?= $area->description ?></textarea>
  </div>
  <div class="field-group">
    <button type="submit" class="submit-button">Guardar Cambios</button>
  </div>
</form>