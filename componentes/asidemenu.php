<?php
 require('../conexion/conexion.php');
session_start();
if(isset($_SESSION['sesion'])){
}else{
    $mensaje = "No haz iniciado sesion, No tienes derecho de ver esta pagina";
    echo "<script>";
echo "alert('$mensaje');";  
echo "self.location = '../login.html';";
echo "</script>"; 
}
$tipo=$_SESSION['tipo_user'];

?>
<aside class="opciones">
    <div class="contimg">
        
        <img src="../img/<?php echo $_SESSION['foto'];?>" class="imgperfil">
        
    <div class="titlehead">
        <h3 class="usuario"><?php echo $_SESSION['sesion'];?></h3>
        <h1 class="modusuario"><i class="icon-settings icon-color-moduser"></i><a href="../usuarios/modificarusuario.php"class="modperfil">Modificar perfil</a></h1>
    </div>
    </div>
    
    <div class="itemsmenu">
        <?php 
        if( $tipo== "administrador"){
         ?>
         <div class="items "><i class="icon-home icon-color"></i><a href="../conexion/inicio.php" class="aitem ">Inicio </a></div>
        <div class="items"><i class="icon-note icon-color"></i><a href="../proyectos/registrarproyecto.php" class="aitem">Registrar proyectos</a></div>
        <div class="items"><i class="icon-list icon-color"></i><a href="../proyectos/verproyectos.php" class="aitem">Ver Proyectos</a></div>
        <div class="items"><i class="icon-plus icon-color"></i><a href="../categorias/registrarcategoria.php" class="aitem">Nueva Categoria</a></div>
        <div class="items"><i class="icon-tag icon-color"></i><a href="../categorias/vercategorias.php" class="aitem">Ver Categorias</a></div>

        <div class="items"><i class="icon-plus  icon-color"></i><a href="../departamentos/registrardepartamento.php" class="aitem ">Nuevo departamento</a></div>
        <div class="items"><i class="icon-direction icon-color"></i><a href="../departamentos/verdepartamentos.php" class="aitem ">Ver departamentos</a></div>
        <div class="items"><i class="icon-plus icon-color"></i><a href="../cargos/registrarcargo.php" class="aitem ">Nuevo cargo</a></div>
        <div class="items"><i class="icon-badge icon-color"></i><a href="../cargos/vercargos.php" class="aitem ">Ver cargos</a></div>

        <div class="items"><i class="icon-pin icon-color"></i><a href="../tareas/registrartarea.php" class="aitem">Registrar Tareas</a></div>
        <div class="items"><i class="icon-list icon-color"></i><a href="../tareas/vertareas.php" class="aitem">Ver Tareas</a></div>
        <div class="items"><i class="icon-hourglass icon-color"></i><a href="../tareas/tareassini.php" class="aitem">Tareas Sin iniciar</a></div>
        <div class="items"><i class="icon-clock icon-color"></i><a href="../tareas/tareaspend.php" class="aitem">Tareas pendientes</a></div>
        <div class="items"><i class="icon-check icon-color"></i><a href="../tareas/tareascomp.php" class="aitem">Tareas completadas</a></div>
        <div class="items"><i class="icon-user-follow icon-color"></i><a href="../usuarios/registrarusuario.php" class="aitem ">Registrar Usuarios</a></div>
        <div class="items"><i class="icon-user icon-color"></i><a href="../usuarios/verusuarios.php" class="aitem ">Ver usuarios</a></div>
        <div class="items"><i class="icon-globe icon-color"></i><a href="../administradores/nombraradministrador.php" class="aitem ">Definir nuevos administradores</a></div>
        <div class="items"><i class="icon-eye icon-color"></i><a href="../administradores/veradministradores.php" class="aitem ">Gestion de administradores</a></div>
        <?php
        }else if($tipo== "normal"){
        ?>
        <div class="items "><i class="icon-home icon-color"></i><a href="../conexion/inicio.php" class="aitem ">Inicio </a></div>
        
        <div class="items"><i class="icon-pin icon-color"></i><a href="../tareas/registrartarea.php" class="aitem">Registrar Tareas</a></div>
        <div class="items"><i class="icon-list icon-color"></i><a href="../tareas/vertareas.php" class="aitem">Ver Tareas</a></div>
        <div class="items"><i class="icon-hourglass icon-color"></i><a href="../tareas/tareassini.php" class="aitem">Tareas Sin iniciar</a></div>
        <div class="items"><i class="icon-clock icon-color"></i><a href="../tareas/tareaspend.php" class="aitem">Tareas pendientes</a></div>
        <div class="items"><i class="icon-check icon-color"></i><a href="../tareas/tareascomp.php" class="aitem">Tareas completadas</a></div>
        
        <?php 
        }
        ?>
    </div>
    <div class="cerrars">
        <h3 class="sesiontext"><i class="icon-logout icon-color-cerrarsecion"></i><a href="../conexion/cerrarsesion.php" class="aitem">Cerrar Sesion</a></h3>
    </div>
    <!-- http://megadin.lab.themebucket.net/simple-line-icons.html -->
</aside> 
        