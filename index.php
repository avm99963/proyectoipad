<?php
require_once("core.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?=$CONF["appname"]?></title>

    <!-- 1. Load webcomponents.min.js for polyfill support. -->
    <script src="bower_components/webcomponentsjs/webcomponents.min.js"></script>

    <!-- 2. Use an HTML Import to bring in the element. -->
    <link rel="import" href="bower_components/core-elements/core-elements.html">
    <link rel="import" href="bower_components/paper-elements/paper-elements.html">
    <link rel="import" href="bower_components/font-roboto/roboto.html">

    <link rel="stylesheet" href="css/index.css">
  </head>
  <body fullbleed vertical layout unresolved>
    <core-header-panel flex>
      <core-toolbar id="mainheader">
        <span><?=$CONF["appname"]?></span>
      </core-toolbar>
      <paper-shadow id="login-container" z="2">
        <h2>Iniciar sesión</h2>
        <form action="login.php" method="POST" autocomplete="off">
          <paper-input-decorator label="Usuario" floatingLabel><input is="core-input" type"text"></paper-input-decorator>
          <paper-input-decorator label="Contraseña" floatingLabel><input is="core-input" type="password"></paper-input-decorator>
          <paper-button raised>Comprobar</paper-button>
        </form>
      </paper-shadow>
    </core-header-panel>
    <script>
      // Wait for 'polymer-ready'. Ensures the element is upgraded.
      window.addEventListener('polymer-ready', function(e) {
        
      });
    </script>
  </body>
</html>