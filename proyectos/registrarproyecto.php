<?php
    require_once('../conexion/conexion.php');
    $usua="SELECT * from usuarios;";
    $Eusua=mysqli_query($conexion,$usua);

    $cate="SELECT * from categorias;";
    $Ecate=mysqli_query($conexion,$cate);

    $depar="SELECT * FROM departamento;";
    $Edepar=mysqli_query($conexion,$depar);
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
    <title>Registrar Proyecto</title>
</head>
<body>
    <section class="contenedor">
       <?php include_once "../componentes/asidemenu.php"; ?>
        <section class="principal">
        
            <div class="contprin">
            <div class="targetaform">
            <h1 class="titular">Registrar Proyectos</h1>
                
               <form action="actionregistrarproyecto.php" method="post">                
               <table>
                    <input type="hidden" name="uregistra" value="<?php echo $_SESSION['sesion']; ?>">
                    <tr>
                        <td><label>Nombre proyecto:</label></td>
                        <td><input type="text" name="nombre" id="nombre" size="35" required></td>
                    </tr>
                    <tr>
                        <td><label>Descripcion proyecto:</label></td>
                        <td><textarea name="descripcion" id="descripcion" cols="30" rows="10" required></textarea></td>
                    </tr>
                    <tr>
                        <td><label>Fecha de Inicio:</label></td>
                        <td><input type="date" name="inicio" id="inicio" required></td>
                    </tr>
                    <tr>
                        <td><label>Fecha de entrega:</label></td>
                        <td><input type="date" name="fin" id="fin" required></td>
                    </tr>
                    <tr>
                        <td><label>Encargado:</label></td>
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
                        <td><label>Departamento asignado:</label></td>
                        <td><select name="departamento" id="departamento" class="selectuser" required>
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
                        <?php                                 
                            while($row3=mysqli_fetch_array($Ecate)){ ?>
                                <option value="<?php echo $row3['id_categoria']; ?>"><?php echo $row3['Nombre_categoria']; ?></option>
                        <?php    
                        }
                        ?>
                        </select></td>
                        
                    </tr>
                    <tr>
                        <td><input type="submit" value="Registrar proyecto"></td>
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