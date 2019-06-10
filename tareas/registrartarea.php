<?php
    require_once('../conexion/conexion.php');
    
    $proy="SELECT * FROM proyectos;";
    $Eproy=mysqli_query($conexion,$proy);
    $usua="SELECT * from usuarios;";
    $Eusua=mysqli_query($conexion,$usua);
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
    <title>Registrar tarea</title>
</head>
<body>
    <section class="contenedor">
       <?php include_once "../componentes/asidemenu.php"; ?>
        <section class="principal">
        
            <div class="contprin">
            <div class="targetaform">
            <h1 class="titular">Registrar Tarea</h1>
                
               <form action="actionregistrartarea.php" method="post">                
               <table>
               <input type="hidden" name="uregistra" value="<?php echo $_SESSION['sesion']; ?>">
                    <tr>
                        <td><label>Titulo tarea:</label></td>
                        <td><input type="text" name="nombre" id="nombre" size="35" required></td>
                    </tr>
                    <tr>
                        <td><label>Descripcion tarea:</label></td>
                        <td><textarea name="descripcion" id="descripcion" cols="30" rows="10" required></textarea></td>
                    </tr>
                    <tr>
                        <td><label>Proyecto:</label></td>
                        <td><select name="proyecto" id="proyecto" class="selectuser" required>
                            <?php                                 
                                while($row=mysqli_fetch_array($Eproy)){ ?>
                                    <option value="<?php echo $row['id_proyecto']; ?>"><?php echo $row['Nombre_proyecto']; ?></option>
                            <?php    
                            }
                            ?>                            
                        </select></td>
                    </tr>
                    <tr>
                        <td><label>Encargado de tarea:</label></td>
                        <td><select name="encargado" id="encargado" class="selectuser" required>
                            <?php                                 
                                while($row=mysqli_fetch_array($Eusua)){ ?>
                                    <option value="<?php echo $row['id_usuario']; ?>"><?php echo $row['nombre']; ?></option>
                            <?php    
                            }
                            ?>                            
                        </select></td>
                    </tr>
                    <tr>
                        <td><label>Estado de tarea:</label></td>
                        <td><select name="estado" id="estado" class="selectuser" required>
                                <option value="No iniciada">No iniciada</option>
                                <option value="Pendiente">Pendiente</option>
                                <option value="Completada">Completada</option>
                            </select></td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Registrar tarea"></td>
                        <td><input type="reset" value="Limpiar"></td>
                    </tr>
                </table>                 
    
               </form>
            </div>
            
            </div>
        </section>
    </section>
</body>
</html>