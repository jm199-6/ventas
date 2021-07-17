<!DOCTYPE html>

<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title id="pageTitle"></title>

    <link rel="stylesheet" href="./views/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="./views/bootstrap/css/bootstrap-reboot.css">
    <link rel="stylesheet" href="./views/bootstrap/css/bootstrap-grid.css">
    <link rel="stylesheet" href="./views/bootstrap/css/fa.css">
    <link rel="stylesheet" href="./views/bootstrap/css/style.css">

    <script src="./views/bootstrap/js/jquery-3.5.0.js" charset="utf-8"></script>
    <script src="./views/bootstrap/js/bootstrap.js" charset="utf-8"></script>
    <script src="./views/bootstrap/js/bootstrap.bundle.js" charset="utf-8"></script>
    <script src="./views/bootstrap/js/script.js" charset="utf-8"></script>

  </head>
  <body>
    <header>
      <?php
        $router = new routerC();
        $router->getMenu();
      ?>
    </header>

    <div class="container" style="padding-top:80px;">
      <?php
        $router->route();
      ?>
    </div>
    <!--footer class="navbar fixed-bottom navbar-expand-lg navbar-dark bg-dark">
      <!--span>&copy;</span-->
    <!--/footer-->
  </body>
</html>
