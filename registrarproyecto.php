<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/sistemstyle.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="css/simple-line-icons.css" rel="stylesheet" type="text/css">
    <title>Registrar Proyecto</title>
</head>
<body>
    <section class="contenedor">
       <?php include_once "componentes/asidemenu.php"; ?>
        <section class="principal">
        
            <div class="contprin">
            <div class="targetaform">
            <h1 class="titular">Registrar Proyectos</h1>
                
               <form action="Aregip.php" method="post">                
               <table>
                    <tr>
                        <td><label>Nombre proyecto:</label></td>
                        <td><input type="text" name="titulo" id="titulo" size="35" required></td>
                    </tr>
                    <tr>
                        <td><label>Descripcion proyecto:</label></td>
                        <td><textarea name="descripcion" id="descripcion" cols="30" rows="10" required></textarea></td>
                    </tr>
                    <tr>
                        <td><label>Fecha de Registro:</label></td>
                        <td><input type="date" name="inicio" id="inicio" required></td>
                    </tr>
                    <tr>
                        <td><label>Fecha de entrega:</label></td>
                        <td><input type="date" name="fin" id="fin" required></td>
                    </tr>
                    <tr>
                        <td><label>Encargado:</label></td>
                        <td><select name="encargado" id="" class="selectuser" required>
                            <option value="usuario">usuario</option>
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