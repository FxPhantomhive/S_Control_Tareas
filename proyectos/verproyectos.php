<?php
    include_once '../conexion/conexion.php';
 $consulta="SELECT p.id_proyecto,p.Nombre_proyecto,p.descripcion,u.nombre,p.fecha_inicio,p.fecha_fin,d.Nombre_departamento,c.Nombre_categoria,
 p.fecha_registra,p.usuario_registra,p.usuario_actualiza,p.fecha_actualiza 
 from proyectos as p INNER JOIN usuarios as u on p.id_usuario = u.id_usuario 
 INNER JOIN departamento as d on d.id_departamento = p.id_departamento 
 INNER JOIN categorias as c on c.id_categoria = p.id_categoria order by p.id_proyecto DESC";
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
    <title>Proyectos</title>
</head>
<body>
    <section class="contenedor">
       <?php include_once "../componentes/asidemenu.php"; ?>
        <section class="principal">
        
            <div class="contprin">
            <div class="targeta">
            <h1 class="titular">Proyectos</h1>
                <table style="border-collapse: collapse; width: 100%;">
                    <thead>
                        <tr>
                            <th>Nombre del proyecto</th>
                            <th>Descripcion del proyecto</th>
                            <th>Encargado</th>
                            <th>Fecha de inicio</th>
                            <th>Fecha de entrega</th>
                            <th>departamento asignado</th>
                            <th>Categoria</th>
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
                        <td><?php echo $row['Nombre_proyecto']; ?></td>
                        <td><?php echo $row['descripcion']; ?></td>                        
                        <td><?php echo $row['nombre']; ?></td> 
                        <td><?php echo $row['fecha_inicio']; ?></td>
                        <td><?php echo $row['fecha_fin']; ?></td>
                        <td><?php echo $row['Nombre_departamento']; ?></td> 
                        <td><?php echo $row['Nombre_categoria']; ?></td> 
                        <td><?php echo $row['usuario_registra']; ?></td> 
                        <td><?php echo $row['fecha_registra']; ?></td>     
                        <td><?php echo $row['usuario_actualiza']; ?></td> 
                        <td><?php echo $row['fecha_actualiza']; ?></td>                      
                        <td class="center"><a href="modificardepartamento.php?id=<?php echo $row['id_departamento'];?>" style="text-decoration:none;"><i class="icon-pencil icon-color-modificar"></i></a></td>
                        <td class="center"><a href="javascript:;" onclick="aviso('actioneliminardepartamento.php?id=<?php echo $row['id_departamento'];?>'); return false;" style="text-decoration:none;"><i class="icon-close icon-color-eliminar"></i></a></td>
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