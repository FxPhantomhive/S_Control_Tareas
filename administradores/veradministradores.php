<?php
    include_once '../conexion/conexion.php';
 $consulta="SELECT u.id_usuario,u.nombre,u.apellido,u.usuario,u.tipo_usuario,u.id_cargo,c.Nombre_cargo,u.usuario_registra,u.fecha_registra,u.usuario_actualiza,u.fecha_actualiza from usuarios as u INNER JOIN cargo as c on u.id_cargo = c.id_cargo where u.tipo_usuario='administrador' order by u.id_usuario asc;";
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
    <title>Administradores</title>
    <script language="JavaScript">
        function aviso(url){
            if (!confirm("ALERTA!! va a proceder a revocar privilegios de administrador a este usuario, si desea continuar de click en ACEPTAR\n de lo contrario de click en CANCELAR.")) {
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
            <h1 class="titular">Administradores</h1>
                <table style="border-collapse: collapse; width: 100%;">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Usuario</th>
                            <th>Tipo de usuario</th>
                            <th>Cargo</th>    
                            <th>Registrado por</th>
                            <th>Fecha Registro</th> 
                            <th>Actualizado por</th>
                            <th>Fecha actualizacion</th>                        
                            
                            <th>Eliminar como administrador</th>
                        </tr>
                    </thead>
                    <?php 
                        while($row=mysqli_fetch_array($datos)){
                    ?>
                    <tr>
                        <td><?php echo $row['nombre']; ?></td>
                        <td><?php echo $row['apellido']; ?></td>
                        <td><?php echo $row['usuario']; ?></td>
                        <td><?php echo $row['tipo_usuario']; ?></td> 
                        <td><?php echo $row['Nombre_cargo']; ?></td>
                        <td><?php echo $row['usuario_registra']; ?></td> 
                        <td><?php echo $row['fecha_registra']; ?></td>   
                        <td><?php echo $row['usuario_actualiza']; ?></td> 
                        <td><?php echo $row['fecha_actualiza']; ?></td>                      
                        <td class="center"><a href="javascript:;" onclick="aviso('quitaradministador.php?id=<?php echo $row['id_usuario'];?>'); return false;" style="text-decoration:none;"><i class="icon-close icon-color-eliminar"></i></a></td>
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