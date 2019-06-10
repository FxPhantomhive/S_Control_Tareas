<?php
    include_once '../conexion/conexion.php';
 $consulta="SELECT t.id_tarea,t.Nombre_tarea,t.descripcion,t.id_proyecto,p.Nombre_proyecto,
 t.id_usuario,u.nombre,t.estado,t.usuario_registra,t.fecha_registra,t.usuario_actualiza,t.fecha_actualiza 
 from tareas as t INNER JOIN proyectos as p on t.id_proyecto = p.id_proyecto 
 INNER JOIN usuarios as u on u.id_usuario = t.id_usuario where t.estado='Completada'order by t.id_tarea ASC";
 $datos=mysqli_query($conexion,$consulta);
    
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
    <title>Tareas completadas</title>
    <script language="JavaScript">
        function aviso(url){
            if (!confirm("ALERTA!! va a proceder a eliminar este registro, si desea eliminarlo de click en ACEPTAR\n de lo contrario de click en CANCELAR.")) {
                return false;
            }
            else {
                document.location = url;
                return true;
                }
        }
    </script>
</head>
<body>
    <section class="contenedor">
       <?php include_once "../componentes/asidemenu.php"; ?>
        <section class="principal">
        
            <div class="contprin">
            <div class="targeta">
            <h1 class="titular">Tareas Completadas</h1>
                <table style="border-collapse: collapse; width: 100%;">
                    <thead>
                        <tr>
                            <th>Nombre tarea</th>
                            <th>Descripcion del proyecto</th>
                            <th>Encargado</th>
                            <th>Proyecto</th>
                            <th>estado</th>
                            
                            <th>Registrado por</th>
                            <th>Fecha Registro</th> 
                            <th>Actualizado por</th>
                            <th>Fecha actualizacion</th> 
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <?php 
                        while($row=mysqli_fetch_array($datos)){
                    ?>
                    <tr>
                        <td><?php echo $row['Nombre_tarea']; ?></td>
                        <td><?php echo $row['descripcion']; ?></td>                        
                        <td><?php echo $row['nombre']; ?></td> 
                        <td><?php echo $row['Nombre_proyecto']; ?></td>
                        <td><?php echo $row['estado']; ?></td>
                         
                        <td><?php echo $row['usuario_registra']; ?></td> 
                        <td><?php echo $row['fecha_registra']; ?></td>     
                        <td><?php echo $row['usuario_actualiza']; ?></td> 
                        <td><?php echo $row['fecha_actualiza']; ?></td>                      
                        <td class="center"><a href="modificartarea.php?id=<?php echo $row['id_tarea'];?>" style="text-decoration:none;"><i class="icon-pencil icon-color-modificar"></i></a></td>
                        <td class="center"><a href="javascript:;" onclick="aviso('actioneliminartarea.php?id=<?php echo $row['id_tarea'];?>'); return false;" style="text-decoration:none;"><i class="icon-close icon-color-eliminar"></i></a></td>
                    </tr>
                    <?php 
                        }
                    ?>
                </table>
            </div>
            
            </div>
        </section>
    </section>
</body>
</html>