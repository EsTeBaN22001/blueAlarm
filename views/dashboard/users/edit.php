<form method="POST" class="form container-usm">
  <h1>Editar información del usuario</h1>
  <?php include_once __DIR__ . '/../../templates/alerts.php'?>
  <div class="field-group">
    <label for="name">Nombre:</label>
    <input type="text" name="name" id="name" value="<?= $user->name ?>">
  </div>
  <div class="field-group">
    <label for="surname">Apellido:</label>
    <input type="text" name="surname" id="surname" value="<?= $user->surname ?>">
  </div>
  <div class="field-group">
    <label for="email">Email:</label>
    <input type="mail" name="email" id="email" value="<?= $user->email ?>">
  </div>
  <div class="field-group">
    <label for="admin">Administrador (0 - NO / 1 - SI):</label>
    <input type="text" name="admin" id="admin" value="<?= $user->admin ?>">
  </div>
  <div class="field-group">
    <button type="submit" class="submit-button">Guardar Cambios</button>
  </div>
</form>