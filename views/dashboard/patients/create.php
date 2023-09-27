<form method="POST" class="form container-usm">
  <h1>Editar información del usuario</h1>
  <?php include_once __DIR__ . '/../../templates/alerts.php'?>
  <div class="field-group">
    <label for="name">Nombre:</label>
    <input type="text" name="name" id="name" value="<?= $patient->name ?>">
  </div>
  <div class="field-group">
    <label for="surname">Apellido:</label>
    <input type="text" name="surname" id="surname" value="<?= $patient->surname ?>">
  </div>
  <div class="field-group">
    <label for="phone">Telefono:</label>
    <input type="tel" name="phone" id="phone" value="<?= $patient->phone ?>">
  </div>
  <div class="field-group">
    <label for="email">Email:</label>
    <input type="mail" name="email" id="email" value="<?= $patient->email ?>">
  </div>
  <div class="field-group">
    <label for="domicile">Domicilio:</label>
    <input type="text" name="domicile" id="domicile" value="<?= $patient->domicile ?>">
  </div>
  <div class="field-group">
    <label for="name">Nombre:</label>
    <select name="id_area" id="idArea">
      <?php foreach($areas as $area): ?>
      <option value="<?= $area->id ?>"><?= $area->name ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="field-group">
    <button type="submit" class="submit-button">Crear Área</button>
  </div>
</form>