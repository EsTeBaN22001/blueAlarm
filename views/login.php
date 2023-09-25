<div class="login-container">
  <div class="content">
    <div class="text">
      <h3>Registro</h3>
    </div>

    <form method="POST">
      <?php include_once __DIR__ . '/templates/alerts.php'?>
      <div class="field">
        <input type="text" required name="email">
        <span class="fas fa-user"></span>
        <label>Email</label>
      </div>
      <div class="field">
        <input type="password" required name="password">
        <span class="fas fa-lock"></span>
        <label>Contraseña</label>
      </div>
      <input type="submit" value="Login" class="button">

    </form>
  </div>
</div>

<?php

$script = '


';

?>

<script src="/build/js/login.js"></script>