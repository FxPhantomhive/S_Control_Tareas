<?php
    $id = $_GET['id'];
    require_once('../conexion/conexion.php');
    $usua="SELECT * from usuarios;";
    $Eusua=mysqli_query($conexion,$usua);

    $cate="SELECT * from categorias;";
    $Ecate=mysqli_query($conexion,$cate);

    $depar="SELECT * FROM departamento;";
    $Edepar=mysqli_query($conexion,$depar);

    $consulta="SELECT p.id_proyecto,p.Nombre_proyecto,p.descripcion,u.nombre,p.fecha_inicio,p.fecha_fin,d.Nombre_departamento,c.Nombre_categoria,
    p.fecha_registra,p.usuario_registra,p.usuario_actualiza,p.fecha_actualiza,p.id_usuario,p.id_departamento,p.id_categoria
    from proyectos as p INNER JOIN usuarios as u on p.id_usuario = u.id_usuario 
    INNER JOIN departamento as d on d.id_departamento = p.id_departamento 
    INNER JOIN categorias as c on c.id_categoria = p.id_categoria where p.id_proyecto='".$id."';";
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
    <title>Modificar Proyecto</title>
</head>
<body>
    <section class="contenedor">
       <?php include_once "../componentes/asidemenu.php"; ?>
        <section class="principal">
        
            <div class="contprin">
            <div class="targetaform">
            <h1 class="titular">Modificar Proyectos</h1>
                
               <form action="actionactualizaproyecto.php" method="post">                
               <table>
                   
                    <?php 
                        while($row=mysqli_fetch_array($datos)){
                    ?>
                    <input type="hidden" name="id" value="<?php echo $row['id_proyecto']; ?>">               
                    <input type="hidden" name="uactualiza" value="<?php echo $_SESSION['sesion']; ?>">
                    <tr>
                        <td><label>Nombre proyecto:</label></td>
                        <td><input type="text" name="nombre" id="nombre" size="35" value="<?php echo $row['Nombre_proyecto']; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label>Descripcion proyecto:</label></td>
                        <td><textarea name="descripcion" id="descripcion" cols="30" rows="10" required><?php echo $row['descripcion']; ?></textarea></td>
                    </tr>
                    <tr>
                        <td><label>Fecha de Inicio:</label></td>
                        <td><input type="date" name="inicio" id="inicio" value="<?php echo $row['fecha_inicio'];?>" required></td>
                    </tr>
                    <tr>
                        <td><label>Fecha de entrega:</label></td>
                        <td><input type="date" name="fin" id="fin" value="<?php echo $row['fecha_fin'];?>" required></td>
                    </tr>
                    <tr>
                        <td><label>Encargado:</label></td>
                        <td><select name="encargado" id="encargado" class="selectuser" required>
                                <option value="<?php echo $row['id_usuario']; ?>" selected><?php echo $row['nombre']; ?></option>
                            <?php  
                                                               
                                while($row1=mysqli_fetch_array($Eusua)){ ?>
                                    <option value="<?php echo $row1['id_usuario']; ?>"><?php echo $row1['nombre']; ?></option>
                            <?php    
                            }
                            ?>                            
                        </select></td>
                    </tr>
                    <tr>
                        <td><label>Departamento asignado:</label></td>
                        <td><select name="departamento" id="departamento" class="selectuser" required>
                        <option value="<?php echo $row['id_departamento']; ?>" selected><?php echo $row['Nombre_departamento']; ?></option>
                        <?php                                 
                            while($row2=mysqli_fetch_array($Edepar)){ ?>
                                <option value="<?php echo $row2['id_departamento']; ?>"><?php echo $row2['Nombre_departamento']; ?></option>
                        <?php    
                        }
                        ?>
                        </select></td>
                    </tr>
                    <tr>
                        <td><label>Categoria de proyecto:</label></td>
                        <td><select name="categoria" id="categoria" class="selectuser" required>
                        <option value="<?php echo $row['id_categoria']; ?>"selected ><?php echo $row['Nombre_categoria']; ?></option>
                        <?php                                 
                            while($row3=mysqli_fetch_array($Ecate)){ ?>
                                <option value="<?php echo $row3['id_categoria']; ?>"><?php echo $row3['Nombre_categoria']; ?></option>
                        <?php    
                        }
                        ?>
                        </select></td>
                        
                    </tr>
                    <?php 
                        }
                    ?>
                    <tr>
                        <td><input type="submit" value="Modificar proyecto"></td>
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