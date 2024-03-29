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
    <title>Usuarios – <?=$CONF["appname"]?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <script src="bower_components/webcomponentsjs/webcomponents.min.js"></script>

    <link rel="import" href="bower_components/polymer/polymer.html">

    <link rel="import" href="custom_elements/dashboard-users/dashboard-users.html">
    <link rel="import" href="custom_elements/dashboard-app/dashboard-app.html">
    <link rel="import" href="custom_elements/common-elements/common-elements.html">
    <link rel="import" href="bower_components/font-roboto/roboto.html">
  </head>
  <body fullbleed layout vertical unresolved>
    <dashboard-app appname="<?=$CONF["appname"]?>" sidebar="users" flex>
      <dashboard-users></dashboard-users>
    </dashboard-app>
  </body>
</html>
<?php
} else {
  header("Location: index.php");
}
?>