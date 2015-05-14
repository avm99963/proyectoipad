<?php
require_once("core.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?=$CONF["appname"]?></title>

    <script src="bower_components/webcomponentsjs/webcomponents.min.js"></script>

    <link rel="import" href="bower_components/polymer/polymer.html">

    <link rel="import" href="bower_components/core-elements/core-elements.html">
    <link rel="import" href="bower_components/paper-elements/paper-elements.html">
    <link rel="import" href="bower_components/font-roboto/roboto.html">
    <link rel="import" href="custom_elements/install-app/install-app.html">
  </head>
  <body fullbleed layout vertical unresolved>
    <install-app flex><?=$CONF["appname"]?></install-app>
  </body>
</html>