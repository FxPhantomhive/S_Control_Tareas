<?php
    include_once "conexion.php";
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];
    $tipo = "normal";
    $usuarioregistra=$_POST['uregistra'];
    $fechar=date("Y-m-d H:i:s"); 
    $carpeta="img/";
    $upload_temporal = $_FILES['image']['tmp_name'];
    $nombre_temporal=$_FILES['image']['name'];
    $nombre_ruta=$carpeta.$nombre_temporal;
    if(is_uploaded_file($upload_temporal)){
        move_uploaded_file($upload_temporal,$nombre_ruta);
    }    
    $consu="insert into usuarios(nombre,apellido,usuario,pass,foto,tipo_usuario,usuario_registra,fecha_registra)
                        VALUES ('$nombre','$apellido','$usuario','$clave','$nombre_temporal','$tipo','$usuarioregistra','$fechar');";
    $ejecutar=mysqli_query($conexion,$consu);
    if(mysqli_connect_errno()){
        echo "surgio un problema al insertar datos en la base de datos <br>";
        echo "error: ".mysqli_connect_errno()."<br>";
    }else{
        echo "los datos fueron insertados de manera satisfactoria <br>";
    }

    mysqli_close($conexion);
?>