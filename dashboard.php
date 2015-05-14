<?php
require_once("core.php");
if (!loggedin()) {
  header("Location: index.php");
}
if (istechnician()) {
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Panel de Control – <?=$CONF["appname"]?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <script src="bower_components/webcomponentsjs/webcomponents.min.js"></script>

    <link rel="import" href="bower_components/polymer/polymer.html">

    <link rel="import" href="bower_components/core-elements/core-elements.html">
    <link rel="import" href="bower_components/paper-elements/paper-elements.html">
    <link rel="import" href="bower_components/font-roboto/roboto.html">
    <link rel="import" href="bower_components/core-icons/social-icons.html">
    <link rel="import" href="custom_elements/dashboard-app/dashboard-app.html">
    <link rel="import" href="custom_elements/common-elements/common-elements.html">
  </head>
  <body fullbleed layout vertical unresolved>
    <dashboard-app appname="<?=$CONF["appname"]?>" sidebar="dashboard" flex>
      <p>Bienvenido al panel de control.</p>
    </dashboard-app>
  </body>
</html>
<?php
} else {
  header("Location: index.php");
}
?>