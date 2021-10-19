<?php 
require_once 'Conexion.php';
$conexion = new Conexion();
?>

<?php
if(isset($_POST["guardar"]))
{
    $codigo = $_POST['codigo'];
    $size = getimagesize($_FILES["imagen"]["tmp_name"]);
    if($size !== false)
    {
        $cargarImagen = $_FILES['imagen']['tmp_name'];
        $imagen = fopen($cargarImagen,'rb');

       // $imgContent = addslashes(file_get_contents($imagen));     
        $dataTime = date("Y-m-d H:i:s");

        $sql=$conexion->prepare("INSERT INTO tabla_imagenes
            (codigo, imagen, creado) VALUES (:codigo, :imagen, :creado)");

        //Asignar el contenido de las variables a los parametros
        $sql->bindParam(':codigo',$codigo);
        $sql->bindParam(':imagen',$imagen, PDO::PARAM_LOB);
        $sql->bindParam(':creado',$dataTime);

        //Ejecutar la variable $sql
        $sql->execute();
        unset($sql);   
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>LongBlob</title>
    <meta charset="utf-8">
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
    <form action="" method="post" enctype="multipart/form-data">
        Código de la Imagen :
        <input type="text" name="codigo"> <br>
       

        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupFileAddon01"><i class="fas fa-cloud-upload-alt"></i> </span>
          </div>
          <div class="custom-file">
            <input type="file" accept="image/jpg" name="imagen" class="custom-file-input"  id="image"
            aria-describedby="inputGroupFileAddon01" lang="es">
            <label class="custom-file-label" for="image">Selecciona una imagen (.jpg)</label>
          </div>
        </div><br>
        
        <input type="submit" name="guardar" value="Guardar Imagen"/>
    </form>

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