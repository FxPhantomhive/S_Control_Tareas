<?php
require('conexion.php');


if(isset($_POST['usuario']) && !empty($_POST['usuario']) &&
    isset($_POST['clave']) && !empty($_POST['clave'])
){

    $user=$_POST['usuario'];
    $pass=$_POST['clave'];

  $consulta="SELECT * from usuarios where usuario='$user' && pass='$pass';";

    $resultado=mysqli_query($conexion,$consulta) 
    or die("Ocurrio un error al hacer la consulta");


    $row=mysqli_fetch_array($resultado);
    if($row){

        session_start();
$_SESSION['sesion'] = $row['usuario'];
$_SESSION['tipo_user']=$row['tipo_usuario'];
$_SESSION['foto']=$row['foto'];         
        $mensaje = "Bienvenido: ".$row['usuario']."";
echo "<script>";
echo "alert('$mensaje');";  
echo "window.location = '../proyectos/proyectos.php';";
echo "</script>"; 

    }else
    {
        $mensaje = "verifique su contraseña o contacte con un administrador";
echo "<script>";
echo "alert('$mensaje');";  
echo "window.location = '../login.html';";
echo "</script>";;
    }
}
else
    $mensaje = "algun campo esta vacio";
echo "<script>";
echo "alert('$mensaje');";  
echo "window.location = '../login.php';";
echo "</script>";
?>