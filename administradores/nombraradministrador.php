<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/sistemstyle.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="../css/simple-line-icons.css" rel="stylesheet" type="text/css">
    <title>definir administrador</title>
</head>
<body>
    <section class="contenedor">
       <?php include_once "../componentes/asidemenu.php"; ?>
        <section class="principal">
        
            <div class="contprin">
            <div class="targetaform">
            <h1 class="titular">Definir como administrador</h1>
            <div class="center"><label>Usted esta a punto de definir a este usuario como administrador,¿desea continuar?</label></div>
            
                <?php                
                
                   
                    $consulta="SELECT * from usuarios where tipo_usuario!='administrador'";

                $datos=mysqli_query($conexion,$consulta);
                
                    ?>
               <form action="actionnombraradmin.php" method="post" ENCTYPE="multipart/form-data">                
               <table>
                                     
                    <input type="hidden" name="uactualiza" value="<?php echo $_SESSION['sesion']; ?>">
                    
                    <tr>
                        <td><label>Usuario:</label></td>
                        <td><select name="usuario" id="usuario" class="selectuser" required>
                            
                            <?php  
                                                               
                                while($row1=mysqli_fetch_array($datos)){ ?>
                                    <option value="<?php echo $row1['id_usuario']; ?>"><?php echo $row1['usuario']; ?></option>
                            <?php    
                            }
                            ?>                            
                        </select></td>
                    </tr>
                    <tr>
                       <td colspan="2" class="center"><input type="submit" value="Nombrar administrador"></td> 
                        
                    </tr>
                </table>                 
    
               </form>
            </div>
            
            </div>
        </section>
    </section>
</body>
</html>