<?php
    include_once "conexion.php";
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];
    $tipo = $_POST['tipo'];
    $usuarioactualiza=$_POST['uactualiza'];
    $fechaa=date("Y-m-d H:i:s"); 


    $revisar = $_FILES["image"]["name"];
    if($revisar !== ""){
         $carpeta="img/";
         $upload_temporal = $_FILES['image']['tmp_name'];
         $nombre_temporal=$_FILES['image']['name'];
         $nombre_ruta=$carpeta.$nombre_temporal;
         if(is_uploaded_file($upload_temporal)){
             move_uploaded_file($upload_temporal,$nombre_ruta);
         }
     }else{
         $nombre_temporal=$_POST["file2"];
     } 
  /*   echo $id;
     echo $nombre;
     echo $apellido;
     echo $usuario;
     echo $clave;
     echo $tipo;
     echo $nombre_temporal; */
    $consu="update usuarios set nombre='$nombre',apellido='$apellido',usuario='$usuario',pass='$clave',foto='$nombre_temporal',tipo_usuario='$tipo',usuario_actualiza='$usuarioactualiza',fecha_actualiza='$fechaa' where id_usuario='$id';";
    $ejecutar=mysqli_query($conexion,$consu);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/sistemstyle.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="css/simple-line-icons.css" rel="stylesheet" type="text/css">
    <title>modificar usuario</title>
</head>
<body>
    <section class="contenedor">
       <?php include_once "componentes/asidemenu.php"; ?>
        <section class="principal">
        
            <div class="contprin">
            <div class="targetaform">
                <h1 class="titular">Modificar Usuario</h1>
                <?php
                    if(mysqli_connect_errno()){
                        echo "surgio un problema al insertar datos en la base de datos <br>";
                        echo "error: ".mysqli_connect_errno()."<br>";
                    }else{
                        echo "<h1 class='mensajesconfirmacion'>los datos fueron modificados de manera satisfactoria </h1>";
                    }
                
                    mysqli_close($conexion);
                ?>
                <div class="center">
                    <a  class="regresar" href="proyectos.php">Regresar al menu</a>
                </div>
                
            </div>
            
            </div>
        </section>
    </section>
</body>
</html>