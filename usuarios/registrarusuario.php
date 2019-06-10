<?php
require_once('../conexion/conexion.php');
    $cargo="SELECT * from cargo;";
    $Ecargo=mysqli_query($conexion,$cargo);
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
    <title>Registrar usuarios</title>
</head>
<body>
    <section class="contenedor">
       <?php include_once "../componentes/asidemenu.php"; ?>
        <section class="principal">
        
            <div class="contprin">
            <div class="targetaform">
            <h1 class="titular">Registrar Usuario</h1>
               
               <form action="actionregistrarusuario.php" method="post" ENCTYPE="multipart/form-data">                
               <table>
               <input type="hidden" name="uregistra" value="<?php echo $_SESSION['sesion']; ?>">
                    <tr>
                        <td><label>Nombre:</label></td>
                        <td><input type="text" name="nombre" id="nombre" size="35" required></td>
                    </tr>
                    <tr>
                        <td><label>Apellido:</label></td>
                        <td><input type="text" name="apellido" id="apellido" size="35" required></td>
                    </tr>
                    <tr>
                        <td><label>Nombre de usuario:</label></td>
                        <td><input type="text" name="usuario" id="usuario" size="35" required></td>
                    </tr>
                    <tr>
                        <td><label>Contraseña:</label></td>
                        <td><input type="password" name="clave" id="clave" size="35" required></td>
                    </tr>
                    <tr>
                        <td><label>Cargo:</label></td>
                        <td><select name="cargo" id="cargo" class="selectuser" required>
                            <?php  
                                                               
                                while($row1=mysqli_fetch_array($Ecargo)){ ?>
                                    <option value="<?php echo $row1['id_cargo']; ?>"><?php echo $row1['Nombre_cargo']; ?></option>
                            <?php    
                            }
                            ?>                            
                        </select></td>
                    </tr>
                    <tr>
                        <td><label>Foto:</label></td>
                        <td><input type="file" name="image" id="image" required></td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Registrar Usuario"></td>
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