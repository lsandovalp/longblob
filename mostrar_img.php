<?php 
require_once 'Conexion.php';
$conexion = new Conexion();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>LongBlob</title>
  <meta charset="utf-8">
  <link rel="icon" href="images/php-icono.png">
  <link rel="icon" href="images/php-icono.png">
        <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/css/mdb.min.css" rel="stylesheet">

</head>
  <body>
    <center>
    <img src="images/banner.jpg">
  </center>
  
  <hr>
 <a href="subir_img.php">Subir Imagenes</a> |
  <a href="mostrar_img.php">Mostrar Imagenes</a> |
   <a href="">Eliminar Imagenes</a>
  <hr><br>

  <?php

  
  $sql = "SELECT * FROM tabla_imagenes";
  $stmt = $conexion->prepare($sql);
  $stmt->execute();
  ?>

  <table border = '1' align = 'center' width="80%">
    <tr>
      <th>Código</th>
      <th>Imagen</th>
      <th>Fecha de Creacion</th>
    </tr>

  <?php
  while ($campo = $stmt->fetch(PDO::FETCH_ASSOC)) {
      echo '<tr>';
      echo '<td>' . $campo['codigo'] . '</td>';
      echo '<td>' .
      '<img src = "data:image/png;base64,' . base64_encode($campo['imagen']) . '" width = "200px" height = "200px"/>'
      . '</td>';
   
      echo '<td>' . $campo['creado'] . '</td>';
     
      echo '</tr>';
  }
  ?>

  </table>
      <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/js/mdb.min.js"></script>
  </body>
</html>