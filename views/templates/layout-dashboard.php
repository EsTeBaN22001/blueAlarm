<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sidebar Menu | Side Navigation Bar</title>
  <!-- CSS -->
  <link rel="stylesheet" href="/build/css/app.css">

  <!-- Boxicons CSS -->
  <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css">
  <link data-minify="1" rel="stylesheet" type="text/css"
    href="https://www.pakainfo.com/wp-content/cache/min/1/font-awesome/4.7.0/css/font-awesome.min.css?ver=1695192036">

  <!-- FontAwesome icons CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <nav>
    <div class="logo">
      <i class="bx bx-menu menu-icon"></i>
      <span class="logo-name">BlueAlarm</span>
    </div>
    <div class="sidebar">
      <div class="logo">
        <i class="bx bx-menu menu-icon"></i>
        <span class="logo-name">BlueAlarm</span>
      </div>
      <div class="sidebar-content">
        <ul class="lists">
          <li class="list">
            <a href="<?= $_ENV['HOST']  ?>/dashboard" class="nav-link">
              <i class="bx bx-home icon"></i>
              <span class="link">Inicio</span>
            </a>
          </li>
          <li class="list">
            <a href="<?= $_ENV['HOST']  ?>/dashboard/users" class="nav-link">
              <i class="bx bx-group icon"></i>
              <span class="link">Usuarios</span>
            </a>
          </li>
          <li class="list">
            <a href="<?= $_ENV['HOST']  ?>/dashboard/areas" class="nav-link">
              <i class="bx bx-pie-chart-alt-2 icon"></i>
              <span class="link">Gestion de area</span>
            </a>
          </li>
          <li class="list">
            <a href="#" class="nav-link">
              <i class="bx bx-map icon"></i>
              <span class="link">Asignacion de area</span>
            </a>
          </li>
          <li class="list">
            <a href="#" class="nav-link">
              <i class="bx bx-phone icon"></i>
              <span class="link">Registro llamados</span>
            </a>
          </li>
          <li class="list">
            <a href="#" class="nav-link">
              <i class="bx bx-bar-chart-alt-2 icon"></i>
              <span class="link">Promedio respuesta</span>
            </a>
          </li>
        </ul>
        <li class="list logout-link">
          <a href="<?= $_ENV['HOST'] ?>/logout" class="nav-link">
            <i class="bx bx-log-out icon"></i>
            <span class="link">Logout</span>
          </a>
        </li>
      </div>
    </div>
    </div>
  </nav>

  <div class="main-part">
    <?= $content; ?>
  </div>

  <section class="overlay"></section>

  <?php

    if(!$_SERVER['PATH_INFO'] == '/dashboard'){
      echo '  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"
      integrity="sha512-uKQ39gEGiyUJl4AI6L+ekBdGKpGw4xJ55+xyJG7YFlJokPNYegn9KwQ3P8A7aFQAUtUsAQHep+d/lrGqrbPIDQ=="
      crossorigin="anonymous" referrerpolicy="no-referrer"></script>';
    }

  ?>

  <script src="/build/js/menu-dashboard.js"></script>

  <?= $script ?? ''; ?>


</body>

</html>