<?php
require_once("core.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Instalar – <?=$CONF["appname"]?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <script src="bower_components/webcomponentsjs/webcomponents.min.js"></script>

    <link rel="import" href="bower_components/polymer/polymer.html">

    <link rel="import" href="bower_components/core-elements/core-elements.html">
    <link rel="import" href="bower_components/paper-elements/paper-elements.html">
    <link rel="import" href="bower_components/font-roboto/roboto.html">
    <link rel="import" href="custom_elements/install-app/install-app.html">
    <link rel="import" href="custom_elements/common-elements/common-elements.html">
  </head>
  <body fullbleed layout vertical unresolved>
    <?php
    if (isset($_POST["sent"]) && $_POST["sent"] == 1) {
      $sql = array();

      $sql["users"] = "CREATE TABLE users 
      (
      id INT(13) NOT NULL AUTO_INCREMENT, 
      PRIMARY KEY(id),
      username VARCHAR(50),
      name VARCHAR(50),
      surname VARCHAR(100),
      area VARCHAR(100),
      email VARCHAR(100),
      type INT(2),
      clickeduid INT(13),
      password VARCHAR(255)
      )";

      foreach ($sql as $key => $query) {
        if (mysqli_query($con, $query)) {
          echo "<ipad-alert>Tabla '".$key."' creada satisfactoriamente.</ipad-alert>";
        } else {
          die ("<ipad-alert type='danger'>Error al crear tabla '".$key."': " . mysqli_error($con) . "</ipad-alert>");
        }
      }

      if(!mkdir("uploaded_img")) {
          echo "<ipad-alert type='danger'>Error al crear la carpeta uploaded_img. ¿A lo mejor no hay suficientes permisos? Por favor, créala tú mismo y asigna permisos de escritura al servidor.</ipad-alert>";
      } else {
        echo "<ipad-alert>Carpeta para imágenes creada.</ipad-alert>";
      }
      
      $username = htmlspecialchars(mysqli_real_escape_string($con, $_POST['username']));
      $name = htmlspecialchars(mysqli_real_escape_string($con, $_POST['name']));
      $surname = htmlspecialchars(mysqli_real_escape_string($con, $_POST['surname']));
      $email = mysqli_real_escape_string($con, $_POST['email']);
      $password = password_hash(mysqli_real_escape_string($con, $_POST['password']), PASSWORD_DEFAULT);
      $sql6 = "INSERT INTO users (username, name, surname, email, type, password, area) VALUES ('".$username."', '".$name."', '".$surname."', '".$email."', 1, '".$password."', 'Técnico')";
        if (mysqli_query($con,$sql6))
        {
        echo "<ipad-alert>Usuario del ténico creado.</ipad-alert>";
        }
      else
        {
        die ("<ipad-alert type='danger'>Error al crear el usuario administrador: " . mysqli_error($con) . "</ipad-alert>");
        }
      echo "<ipad-alert type='info'>Por favor, ¡elimina el archivo install.php!</ipad-alert>";
      echo "<ipad-alert type='info'><a href='index.php'>Vuelve atrás</a> e inicia sesión con los datos que has introducido.</ipad-alert>";
    } else {
    ?>
    <install-app flex appname="<?=$CONF["appname"]?>"></install-app>
    <?php
    }
    ?>
  </body>
</html>