<?php
    include_once "conexion.php";
    $id = $_GET['id'];

    $consu="delete from usuarios where id_usuario='$id'";
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
    <title>eluminar usuario</title>
</head>
<body>
    <section class="contenedor">
       <?php include_once "componentes/asidemenu.php"; ?>
        <section class="principal">
        
            <div class="contprin">
            <div class="targetaform">
                <h1 class="titular">Eliminar Usuario</h1>
                <?php
                    if(mysqli_connect_errno()){
                        echo "surgio un problema al insertar datos en la base de datos <br>";
                        echo "error: ".mysqli_connect_errno()."<br>";
                    }else{
                        echo "<h1 class='mensajesconfirmacion'>los datos fueron eliminados de manera satisfactoria </h1>";
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