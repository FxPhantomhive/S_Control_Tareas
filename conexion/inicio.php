<?php
    include_once 'conexion.php';
 $consulta1 = "SELECT COUNT(id_proyecto) as pro FROM proyectos";
 $datos1=mysqli_query($conexion,$consulta1);
 $consulta2 = "SELECT COUNT(id_tarea) as tar FROM tareas";
 $datos2=mysqli_query($conexion,$consulta2);
 $consulta3 = "SELECT COUNT(id_tarea) as tarc FROM tareas WHERE estado='Completada'";
 $datos3=mysqli_query($conexion,$consulta3);
 $consulta4 = "SELECT COUNT(id_tarea) as tarni FROM tareas WHERE estado='No iniciada'";
 $datos4=mysqli_query($conexion,$consulta4);
 $consulta5 = "SELECT COUNT(id_tarea) as tarpen FROM tareas WHERE estado='Pendiente'";
 $datos5=mysqli_query($conexion,$consulta5);  
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
    <title>inicio</title>
 
</head>
<body>
    <section class="contenedor">
       <?php include_once "../componentes/asidemenu.php"; ?>
        <section class="principal">
        <div class="contprin">
            <div class="contprin2">
                <div class="targeta2">
                    <h1 class="titular2">Proyectos creados</h1>
                    <?php 
                        while($row1=mysqli_fetch_array($datos1)){
                    ?>
                    <h1 class="titular"><?php echo $row1['pro']; ?></h1>
                    <?php 
                        }
                    ?>
                </div>
                
                <div class="targeta2">
                    <h1 class="titular2">Tareas Registradas</h1>
                    <?php 
                        while($row2=mysqli_fetch_array($datos2)){
                    ?>
                    <h1 class="titular"><?php echo $row2['tar']; ?></h1>
                    <?php 
                        }
                    ?>
                </div>
            </div>
            <div class="contprin2">
                <div class="targeta2">
                    <h1 class="titular2">Tareas completadas</h1>
                    <?php 
                        while($row3=mysqli_fetch_array($datos3)){
                    ?>
                    <h1 class="titular"><?php echo $row3['tarc']; ?></h1>
                    <?php 
                        }
                    ?>
                </div>
                <div class="targeta2">
                    <h1 class="titular2">Tareas No iniciadas</h1>
                    <?php 
                        while($row4=mysqli_fetch_array($datos4)){
                    ?>
                    <h1 class="titular"><?php echo $row4['tarni']; ?></h1>
                    <?php 
                        }
                    ?>
                </div>
                <div class="targeta2">
                    <h1 class="titular2">Tareas pendientes</h1>
                    <?php 
                        while($row5=mysqli_fetch_array($datos5)){
                    ?>
                    <h1 class="titular"><?php echo $row5['tarpen']; ?></h1>
                    <?php 
                        }
                    ?>
                </div>
            </div>
        </div>    
        </section>
    </section>
</body>
</html>