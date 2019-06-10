<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/sistemstyle.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="../css/simple-line-icons.css" rel="stylesheet" type="text/css">
    <title>Registrar Departamento</title>
</head>
<body>
    <section class="contenedor">
       <?php include_once "../componentes/asidemenu.php"; ?>
        <section class="principal">
        
            <div class="contprin">
            <div class="targetaform">
            <h1 class="titular">Registrar Departamento</h1>
                
               <form action="actionregistrardepartamento.php" method="post">                
               <table>
               <input type="hidden" name="uregistra" value="<?php echo $_SESSION['sesion']; ?>">
                    <tr>
                        <td><label>Nombre departamento:</label></td>
                        <td><input type="text" name="nombre" id="nombre" size="35" required></td>
                    </tr>
                    <tr>
                        <td><label>Descripcion departamento:</label></td>
                        <td><textarea name="descripcion" id="descripcion" cols="30" rows="10" required></textarea></td>
                    </tr>
                    
                    <tr>
                        <td><input type="submit" value="Registrar departamento"></td>
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