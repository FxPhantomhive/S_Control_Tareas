<?php
    require_once('../conexion/conexion.php');
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $usuarioregistra=$_POST['uregistra'];
    $fechar=date("Y-m-d H:i:s"); 

    $consu2="SELECT * from categorias where Nombre_categoria='".$nombre."';";
    $ejec = mysqli_query($conexion,$consu2) or die("Ocurrio un error al hacer la consulta");
    $row=mysqli_fetch_array($ejec);
    if($row){
        $mensaje = "Ya existe un registro con este nombre de categoria";        
    } else {
        if ($nombre != null and $descripcion != null and $usuarioregistra != null ){
            $mensaje = "los datos fueron insertados de manera satisfactoria";
        $consu="insert into categorias(Nombre_categoria,descripcion,usuario_registra,fecha_registra)
                        VALUES ('$nombre','$descripcion','$usuarioregistra','$fechar');";
        $ejecutar=mysqli_query($conexion,$consu);
        }else{
            $mensaje = "Existen datos nulos";
        }      
        
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
    <title>Registrar categoria</title>
</head>
<body>
    <section class="contenedor">
       <?php include_once "../componentes/asidemenu.php"; ?>
        <section class="principal">
        
            <div class="contprin">
            <div class="targetaform">
                <h1 class="titular">Registrar categoria</h1>
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
                    <a  class="regresar" href="../categorias/vercategorias.php">Regresar al menu</a>
                </div>
                
            </div>
            
            </div>
        </section>
    </section>
</body>
</html>