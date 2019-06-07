<?php

$_SESSION = array();
// Borra la cookie que almacena la sesión
if(isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 42000, '/');
}
// Finalmente, destruye la sesión
@session_destroy();
$mensaje = "Se a cerrado sesion correctamente";
	echo "<script>";
echo "alert('$mensaje');";  
echo "self.location = 'login.html';";
echo "</script>"; 