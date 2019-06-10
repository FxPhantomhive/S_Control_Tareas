<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/sistemstyle.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="../css/simple-line-icons.css" rel="stylesheet" type="text/css">
    <title>modificar departamento</title>
</head>
<body>
    <section class="contenedor">
       <?php include_once "../componentes/asidemenu.php"; ?>
        <section class="principal">
        
            <div class="contprin">
            <div class="targetaform">
            <h1 class="titular">Modificar departamento</h1>
                <?php
                $id = $_GET['id'];
                $consulta="select * from departamento where id_departamento='".$id."';";
                
                $datos=mysqli_query($conexion,$consulta);
                  while($row=mysqli_fetch_array($datos)){ 
                ?>
               <form action="actionactualizadepartamento.php" method="post" ENCTYPE="multipart/form-data">                
               <table>
               <input type="hidden" name="id" value="<?php echo $row['id_departamento']; ?>">               
               <input type="hidden" name="uactualiza" value="<?php echo $_SESSION['sesion']; ?>">
                    <tr>
                        <td><label>Nombre Departamento:</label></td>
                        <td><input type="text" name="nombre" id="nombre" size="35" value="<?php echo $row['Nombre_departamento']; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label>Descripcion:</label></td>
                        <td><input type="text" name="descripcion" id="descripcion" size="35" value="<?php echo $row['descripcion']; ?>" required></td>
                    </tr>
                    
                    <?php } ?>
                    <tr>
                       <td colspan="2" class="center"><input type="submit" value="Modificar departamento"></td> 
                        
                    </tr>
                </table>                 
    
               </form>
            </div>
            
            </div>
        </section>
    </section>
</body>
</html>