<?php
    require_once('../conexion/conexion.php');
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];
    $cargo = $_POST['cargo'];
    $tipo = "normal";
    $usuarioregistra=$_POST['uregistra'];
    $fechar=date("Y-m-d H:i:s"); 
    $carpeta="../img/";
    $upload_temporal = $_FILES['image']['tmp_name'];
    $nombre_temporal=$_FILES['image']['name'];
    $nombre_ruta=$carpeta.$nombre_temporal;
    if(is_uploaded_file($upload_temporal)){
        move_uploaded_file($upload_temporal,$nombre_ruta);
    }  
    $consu2="SELECT * from usuarios where usuario='".$usuario."';";
    $ejec = mysqli_query($conexion,$consu2) or die("Ocurrio un error al hacer la consulta");
    $row=mysqli_fetch_array($ejec);
    if($row){
        $mensaje = "Ya existe un registro con este nombre de usuario";        
    } else {
        $mensaje = "los datos fueron insertados de manera satisfactoria";
        $consu="insert into usuarios(nombre,apellido,usuario,pass,id_cargo,foto,tipo_usuario,usuario_registra,fecha_registra)
                        VALUES ('$nombre','$apellido','$usuario','$clave','$cargo','$nombre_temporal','$tipo','$usuarioregistra','$fechar');";
    $ejecutar=mysqli_query($conexion,$consu);
    } 
    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/sistemstyle.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="../css/simple-line-icons.css" rel="stylesheet" type="text/css">
    <title>Registrar usuario</title>
</head>
<body>
    <section class="contenedor">
       <?php include_once "../componentes/asidemenu.php"; ?>
        <section class="principal">
        
            <div class="contprin">
            <div class="targetaform">
                <h1 class="titular">Registrar Usuario</h1>
                <?php
                    if(mysqli_connect_errno()){
                        echo "surgio un problema al insertar datos en la base de datos <br>";
                        echo "error: ".mysqli_connect_errno()."<br>";
                    }else{
                        echo "<div class='center'> $mensaje </div>";
                        echo "<br>";
                    }
                
                    mysqli_close($conexion);
                ?>
                <div class="center">
                    <a  class="regresar" href="../usuarios/verusuarios.php">Regresar al menu</a>
                </div>
                
            </div>
            
            </div>
        </section>
    </section>
</body>
</html>