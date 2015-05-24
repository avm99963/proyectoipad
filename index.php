<?php
require_once("core.php");
if (mysqli_query($con, "SELECT * FROM users") === FALSE) {
  header("Location: install.php");
}
if (loggedin()) {
  header("Location: dashboard.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?=$CONF["appname"]?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <script src="bower_components/webcomponentsjs/webcomponents.min.js"></script>

    <link rel="import" href="bower_components/polymer/polymer.html">

    <link rel="import" href="custom_elements/login-app/login-app.html">
    <link rel="import" href="custom_elements/common-elements/common-elements.html">
    <link rel="import" href="bower_components/font-roboto/roboto.html">
  </head>
  <body fullbleed layout vertical unresolved>
    <login-app appname="<?=$CONF["appname"]?>" flex>
      <?php
      if (isset($_GET["msg"])) {
        if ($_GET["msg"] == "empty")
          echo "<ipad-alert type='info'>Por favor, rellena todo el formulario</ipad-alert>";
        if ($_GET["msg"] == "loginwrong")
          echo "<ipad-alert type='danger'>Los datos de inicio de sesión no eran correctos</ipad-alert>";
        if ($_GET["msg"] == "logoutsuccess")
          echo "<ipad-alert type='info'>Se ha cerrado sesión correctamente</ipad-alert>";
      }
      ?>
    </login-app>
  </body>
</html>