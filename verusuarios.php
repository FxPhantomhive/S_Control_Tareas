<?php
    include_once 'conexion.php';
 $consulta="select * from usuarios;";
 $datos=mysqli_query($conexion,$consulta);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/sistemstyle.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="css/simple-line-icons.css" rel="stylesheet" type="text/css">
    <title>Proyectos</title>
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
       <?php include_once "componentes/asidemenu.php"; ?>
        <section class="principal">
        
            <div class="contprin">
            <div class="targeta">
            <h1 class="titular">Usuarios</h1>
                <table style="border-collapse: collapse; width: 100%;">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Usuario</th>
                            <th>Tipo de usuario</th>   
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
                        <td><?php echo $row['nombre']; ?></td>
                        <td><?php echo $row['apellido']; ?></td>
                        <td><?php echo $row['usuario']; ?></td>
                        <td><?php echo $row['tipo_usuario']; ?></td> 
                        <td><?php echo $row['usuario_registra']; ?></td> 
                        <td><?php echo $row['fecha_registra']; ?></td>   
                        <td><?php echo $row['usuario_actualiza']; ?></td> 
                        <td><?php echo $row['fecha_actualiza']; ?></td>                      
                        <td class="center"><a href="modificarusuario.php?id=<?php echo $row['id_usuario'];?>" style="text-decoration:none;"><i class="icon-pencil icon-color-modificar"></i></a></td>
                        <td class="center"><a href="javascript:;" onclick="aviso('actioneliminausuario.php?id=<?php echo $row['id_usuario'];?>'); return false;" style="text-decoration:none;"><i class="icon-close icon-color-eliminar"></i></a></td>
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