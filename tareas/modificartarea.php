<?php
    require_once('../conexion/conexion.php');
    $id = $_GET['id'];
    $proy="SELECT * FROM proyectos;";
    $Eproy=mysqli_query($conexion,$proy);
    $usua="SELECT * from usuarios;";
    $Eusua=mysqli_query($conexion,$usua);

    $consulta="SELECT t.id_tarea,t.Nombre_tarea,t.descripcion,t.id_proyecto,p.Nombre_proyecto,
 t.id_usuario,u.nombre,t.estado,t.usuario_registra,t.fecha_registra,t.usuario_actualiza,t.fecha_actualiza 
 from tareas as t INNER JOIN proyectos as p on t.id_proyecto = p.id_proyecto 
 INNER JOIN usuarios as u on u.id_usuario = t.id_usuario where t.id_tarea='".$id."' order by t.id_tarea ASC";
 $datos=mysqli_query($conexion,$consulta);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/sistemstyle.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="../css/simple-line-icons.css" rel="stylesheet" type="text/css">
    <title>Modificar tarea</title>
</head>
<body>
    <section class="contenedor">
       <?php include_once "../componentes/asidemenu.php"; ?>
        <section class="principal">
        
            <div class="contprin">
            <div class="targetaform">
            <h1 class="titular">Modificar Tarea</h1>
                
               <form action="actionactualizatarea.php" method="post">                
               <table>
               <?php 
                    while($row=mysqli_fetch_array($datos)){
                ?>
               <input type="hidden" name="uactualiza" value="<?php echo $_SESSION['sesion']; ?>">
               <input type="hidden" name="id" value="<?php echo $row['id_tarea']; ?>">  
                    <tr>
                        <td><label>Titulo tarea:</label></td>
                        <td><input type="text" name="nombre" id="nombre" size="35" value="<?php echo $row['Nombre_tarea']; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label>Descripcion tarea:</label></td>
                        <td><textarea name="descripcion" id="descripcion" cols="30" rows="10" required><?php echo $row['descripcion']; ?></textarea></td>
                    </tr>
                    <tr>
                        <td><label>Proyecto:</label></td>
                        <td><select name="proyecto" id="proyecto" class="selectuser" required>
                            <option value="<?php echo $row['id_proyecto']; ?>" selected><?php echo $row['Nombre_proyecto']; ?></option>
                            <?php                                 
                                while($row1=mysqli_fetch_array($Eproy)){ ?>
                                    <option value="<?php echo $row1['id_proyecto']; ?>"><?php echo $row1['Nombre_proyecto']; ?></option>
                            <?php    
                            }
                            ?>                            
                        </select></td>
                    </tr>
                    <tr>
                        <td><label>Encargado de tarea:</label></td>
                        <td><select name="encargado" id="encargado" class="selectuser" required>
                            <option value="<?php echo $row['id_usuario']; ?>" selected><?php echo $row['nombre']; ?></option>
                            <?php                                 
                                while($row2=mysqli_fetch_array($Eusua)){ ?>
                                    <option value="<?php echo $row2['id_usuario']; ?>"><?php echo $row2['nombre']; ?></option>
                            <?php    
                            }
                            ?>                            
                        </select></td>
                    </tr>
                    <tr>
                        <td><label>Estado de tarea:</label></td>
                        <td><select name="estado" id="estado" class="selectuser" required>
                                <option value="<?php echo $row['estado']; ?>" selected><?php echo $row['estado']; ?></option>
                                <option value="No iniciada">No iniciada</option>
                                <option value="Pendiente">Pendiente</option>
                                <option value="Completada">Completada</option>
                            </select></td>
                    </tr>
                    <?php 
                        }
                    ?>
                    <tr>
                        <td><input type="submit" value="Registrar tarea"></td>
                        
                    </tr>
                </table>                 
    
               </form>
            </div>
            
            </div>
        </section>
    </section>
</body>
</html>