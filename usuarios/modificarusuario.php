<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/sistemstyle.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="../css/simple-line-icons.css" rel="stylesheet" type="text/css">
    <title>modificar usuario</title>
</head>
<body>
    <section class="contenedor">
       <?php include_once "../componentes/asidemenu.php"; ?>
        <section class="principal">
        
            <div class="contprin">
            <div class="targetaform">
            <h1 class="titular">Modificar Usuario</h1>
                <?php
                $cargo="SELECT * from cargo;";
                $Ecargo=mysqli_query($conexion,$cargo);
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $consulta="SELECT u.id_usuario,u.nombre,u.apellido,u.usuario,u.pass,u.tipo_usuario,u.id_cargo,c.Nombre_cargo,u.foto,u.usuario_registra,u.fecha_registra,u.usuario_actualiza,u.fecha_actualiza from usuarios as u INNER JOIN cargo as c on u.id_cargo = c.id_cargo where u.id_usuario='".$id."' order by u.id_usuario asc;";

                    //$consulta="select * from usuarios where id_usuario='".$id."';";
                }else{
                $usuario=$_SESSION['sesion'];
                //echo $usuario;
                    $consulta="SELECT u.id_usuario,u.nombre,u.apellido,u.usuario,u.pass,u.tipo_usuario,u.id_cargo,c.Nombre_cargo,u.foto,u.usuario_registra,u.fecha_registra,u.usuario_actualiza,u.fecha_actualiza from usuarios as u INNER JOIN cargo as c on u.id_cargo = c.id_cargo where u.usuario='".$usuario."' order by u.id_usuario asc;";
                //$consulta="select * from usuarios where usuario='".$usuario."';";
                }
                $datos=mysqli_query($conexion,$consulta);
                  while($row=mysqli_fetch_array($datos)){ 
                ?>
               <form action="actionactualizausuario.php" method="post" ENCTYPE="multipart/form-data">                
               <table>
               <input type="hidden" name="id" value="<?php echo $row['id_usuario']; ?>">
               <input type="hidden" name="tipo" value="<?php echo $row['tipo_usuario']; ?>">
               <input type="hidden" name="uactualiza" value="<?php echo $_SESSION['sesion']; ?>">
                    <tr>
                        <td><label>Nombre:</label></td>
                        <td><input type="text" name="nombre" id="nombre" size="35" value="<?php echo $row['nombre']; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label>Apellido:</label></td>
                        <td><input type="text" name="apellido" id="apellido" size="35" value="<?php echo $row['apellido']; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label>Nombre de usuario:</label></td>
                        <td><input type="text" name="usuario" id="usuario" size="35"value="<?php echo $row['usuario']; ?>" required readonly></td>
                    </tr>
                    <tr>
                        <td><label>Contraseña:</label></td>
                        <td><input type="password" name="clave" id="clave" size="35" value="<?php echo $row['pass']; ?>"required></td>
                    </tr>
                    <tr>
                        <td><label>Cargo:</label></td>
                        <td><select name="cargo" id="cargo" class="selectuser" required>
                            <option value="<?php echo $row['id_cargo']; ?>"><?php echo $row['Nombre_cargo']; ?></option>
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
                        <td><img src="../img/<?php echo $row['foto']; ?>" style="width: 250px; height: auto;">
                            <input type="hidden" name="file2" value="<?php echo $row['foto']; ?>">
                            <input type="file" name="image">
                        </td>
                    </tr>
                    <?php } ?>
                    <tr>
                       <td colspan="2" class="center"><input type="submit" value="Modificar usuario"></td> 
                        
                    </tr>
                </table>                 
    
               </form>
            </div>
            
            </div>
        </section>
    </section>
</body>
</html>