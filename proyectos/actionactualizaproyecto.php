<?php
    require_once('../conexion/conexion.php');
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $fechain = $_POST['inicio'];
    $fechaen = $_POST['fin'];
    $encargado = $_POST['encargado'];
    $depto = $_POST['departamento'];
    $cat = $_POST['categoria'];
    $usuarioactualiza=$_POST['uactualiza'];
    $fechaa=date("Y-m-d H:i:s"); 

    
    if ($id != null and $nombre != null and $descripcion != null and $fechain != null and $fechaen != null and $encargado != null and $depto != null and $cat != null and $usuarioactualiza != null ){
        $mensaje = "los datos fueron actualizados de manera satisfactoria";

        $consu="update proyectos set Nombre_proyecto='$nombre',descripcion='$descripcion',fecha_inicio='$fechain',fecha_fin='$fechaen',id_usuario='$encargado',id_departamento='$depto',id_categoria='$cat',usuario_actualiza='$usuarioactualiza',fecha_actualiza='$fechaa' where id_proyecto='$id';";
        $ejecutar=mysqli_query($conexion,$consu);
    }else{
        $mensaje = "Existen datos nulos";
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
    <title>Actualizar proyecto</title>
</head>
<body>
    <section class="contenedor">
       <?php include_once "../componentes/asidemenu.php"; ?>
        <section class="principal">
        
            <div class="contprin">
            <div class="targetaform">
                <h1 class="titular">Actualizar proyecto</h1>
                <?php
                    if(mysqli_connect_errno($ejecutar)){
                        echo "surgio un problema al insertar datos en la base de datos <br>";
                        echo "error: ".mysqli_connect_errno()."<br>";
                    }else{
                        echo "<div class='center'> $mensaje </div>";
                        echo "<br>";
                    }
                
                    mysqli_close($conexion);
                ?>
                <div class="center">
                    <a  class="regresar" href="../proyectos/verproyectos.php">Regresar al menu</a>
                </div>
                
            </div>
            
            </div>
        </section>
    </section>
</body>
</html>