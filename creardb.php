<?php
$usuario = "root";
$password = "";
$servidor = "localhost";
$basededatos = "sistemaDPWEB";

// creación de la conexión a la base de datos con mysql_connect()
$conexion = mysqli_connect( $servidor, $usuario, $password ) or die ("No se ha podido conectar al servidor de Base de datos");
// Creacion de la base de datos
  $consulta1="CREATE DATABASE IF NOT EXISTS sistemaDPWEB";
// Ejecutando consulta
  $ejecutar=mysqli_query($conexion,$consulta1);
  
  $db = mysqli_select_db( $conexion, $basededatos ) or die ( "ERROR: No se a podido establecer conexion con la base de datos" );
//borrando tablas para inpedir errores (es el mismo funcionamiento de drop table if exist)
  $consulta2="DROP TABLE cargo,categorias, departamento, proyectos, tareas, usuarios;";
  $ejecutar2=mysqli_query($conexion,$consulta2);
//tabla categorias con sus datos
  $consulta3="CREATE TABLE categorias (
    id_categoria int AUTO_INCREMENT PRIMARY KEY,
    Nombre_categoria varchar(200),
    descripcion varchar(200),
    usuario_registra varchar(20),
    fecha_registra datetime,
    usuario_actualiza varchar(20),
    fecha_actualiza datetime
)ENGINE=INNODB;";
  $ejecutar3=mysqli_query($conexion,$consulta3);
  $consulta4="insert into categorias (Nombre_categoria,descripcion,usuario_registra,fecha_registra) values ('Sistemas CRM','Sistemas de control de relaciones con clientes','BDpredeterminado','2019-06-09 00:00:20');";
  $ejecutar4=mysqli_query($conexion,$consulta4);
  $consulta5="insert into categorias (Nombre_categoria,descripcion,usuario_registra,fecha_registra) values ('Sistemas AR','Sistemas de Realidad Aumentada','BDpredeterminado','2019-06-09 00:00:21');";
  $ejecutar5=mysqli_query($conexion,$consulta5);
  //tabla departamento
  $consulta6="CREATE TABLE departamento (
    id_departamento int AUTO_INCREMENT PRIMARY KEY,
    Nombre_departamento varchar(200),
    descripcion varchar(200),
    usuario_registra varchar(20),
    fecha_registra datetime,
    usuario_actualiza varchar(20),
    fecha_actualiza datetime
)ENGINE=INNODB;";
  $ejecutar6=mysqli_query($conexion,$consulta6);
  $consulta7="insert into departamento (Nombre_departamento,descripcion,usuario_registra,fecha_registra) values ('Depto. Ventas','Departamento de ventas','BDpredeterminado','2019-06-09 00:00:20');";
  $ejecutar7=mysqli_query($conexion,$consulta7);
  $consulta8="insert into departamento (Nombre_departamento,descripcion,usuario_registra,fecha_registra) values ('Depto. Desarrollo','Departamento de desarrollo de productos','BDpredeterminado','2019-06-09 00:00:21');";
  $ejecutar8=mysqli_query($conexion,$consulta8);
   //tabla cargo
   $consulta9="CREATE TABLE cargo (
    id_cargo int AUTO_INCREMENT PRIMARY KEY,
    Nombre_cargo varchar(200),
    descripcion varchar(200),
    usuario_registra varchar(20),
    fecha_registra datetime,
    usuario_actualiza varchar(20),
    fecha_actualiza datetime
)ENGINE=INNODB;";
  $ejecutar9=mysqli_query($conexion,$consulta9);
  $consulta10="insert into cargo (Nombre_cargo,descripcion,usuario_registra,fecha_registra) values ('Supervisor','Supervisor de proyecto','BDpredeterminado','2019-06-09 00:00:20');";
  $ejecutar10=mysqli_query($conexion,$consulta10);
  $consulta11="insert into cargo (Nombre_cargo,descripcion,usuario_registra,fecha_registra) values ('Fullstack','Desarrollador Fullstack','BDpredeterminado','2019-06-09 00:00:21');";
  $ejecutar11=mysqli_query($conexion,$consulta11);

     //tabla usuarios
     $consulta12="CREATE TABLE usuarios(
      id_usuario int AUTO_INCREMENT PRIMARY KEY,
        nombre varchar(100),
        apellido varchar(100),
        usuario varchar(20),
        pass varchar(30),
        tipo_usuario varchar(30),
        id_cargo int,
        FOREIGN KEY (id_cargo) REFERENCES cargo(id_cargo),
        foto varchar(200),
        usuario_registra varchar(20),
        fecha_registra datetime,
        usuario_actualiza varchar(20),
        fecha_actualiza datetime
    )ENGINE=INNODB;";
    $ejecutar12=mysqli_query($conexion,$consulta12);
    $consulta13="insert into usuarios (nombre,apellido,usuario,pass,tipo_usuario,id_cargo,foto,usuario_registra,fecha_registra) values ('Felix','Melendez','FxPhantomhive','1234','administrador','1','img1.jpg','BDpredeterminado','2019-05-30 17:15:20');";
    $ejecutar13=mysqli_query($conexion,$consulta13);
    $consulta14="insert into usuarios (nombre,apellido,usuario,pass,tipo_usuario,id_cargo,foto,usuario_registra,fecha_registra) values ('Fernando','Gonzalez','Ferjocode','1234','normal','2','img2.jpg','BDpredeterminado','2019-05-30 17:15:20');";
    $ejecutar14=mysqli_query($conexion,$consulta14);

    //tabla proyectos
    $consulta15="CREATE TABLE proyectos (
      id_proyecto int AUTO_INCREMENT PRIMARY KEY,
      Nombre_proyecto varchar(200),
      descripcion varchar(200),
      fecha_inicio date,
      fecha_fin date,
      id_usuario int,
      FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario),
      id_departamento int,
      FOREIGN KEY (id_departamento) REFERENCES departamento(id_departamento),
      id_categoria int,
      FOREIGN KEY (id_categoria) REFERENCES categorias(id_categoria),
      usuario_registra varchar(20),
      fecha_registra datetime,
      usuario_actualiza varchar(20),
      fecha_actualiza datetime
  )ENGINE=INNODB;";
  $ejecutar15=mysqli_query($conexion,$consulta15);
  $consulta16="insert into proyectos(Nombre_proyecto,descripcion,fecha_inicio,fecha_fin,id_usuario,id_departamento,id_categoria,usuario_registra,fecha_registra) VALUES ('Sistema DPWEB','Sistema final para DPWeb','2019-04-1','2019-06-10',1,2,1,'BDpredeterminado','2019-05-30 17:15:20');";
  $ejecutar16=mysqli_query($conexion,$consulta16);

    //tabla tareas
  $consulta17="CREATE TABLE tareas (
    id_tarea int AUTO_INCREMENT PRIMARY KEY,
    Nombre_tarea varchar(200),
    descripcion varchar(200),
    id_proyecto int,
    FOREIGN KEY (id_proyecto) REFERENCES proyectos(id_proyecto),
    estado varchar(100),
    id_usuario int,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario),
    usuario_registra varchar(20),
    fecha_registra datetime,
    usuario_actualiza varchar(20),
    fecha_actualiza datetime
)ENGINE=INNODB;";
$ejecutar17=mysqli_query($conexion,$consulta17);
$consulta18="insert into tareas(Nombre_tarea,descripcion,id_proyecto,id_usuario,estado,usuario_registra,fecha_registra) VALUES ('Crear Landingpage','Creacion de Landingpage sistema',1,1,'Completada','BDpredeterminado','2019-05-30 17:15:20');";
$ejecutar18=mysqli_query($conexion,$consulta18);
 
  if(mysqli_connect_errno()){
      echo "surgio un problema al crear la base de datos <br>";
      echo "error: ".mysqli_connect_errno()."<br>";
  }else{
      
  }
  
  mysqli_close($conexion);

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Graph Studio - Sistema de control de proyectos</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="css/simple-line-icons.css" rel="stylesheet" type="text/css">
</head>

<body>

    <div class="contenido-principal">
    <!--Navbar    --> 
    <header>
            <nav class="navbar navbar-expand-lg navbar-light  static-top">
                <div class="container">
                  <a class="navbar-brand" href="index.html">Graph Studio</a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                  <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                      <li class="nav-item active">
                        <a class="nav-link" href="index.html">Inicio
                              <span class="sr-only">(current)</span>
                            </a>
                      </li>
                      <li class="nav-item">
                      <!--<a class='nav-link' href='login.php'>Log in</a>     --> 
                      <a class='nav-link' href='sobre-nosotros.html'><stronge>Sobre nosotros</stronge></a> 
                      </li>
                      <li class="nav-item">
                        <a class='nav-link' href='servicios.html'><stronge>Servicios</stronge></a>         
                        </li>
                        
                        <li class="nav-item">
                            <a class='nav-link' href='sistema-proyecto.html'>Sistema de control de proyectos</a>         
                        </li>
                        <li class="nav-item">
                          <a class='nav-link' href='creardb.php'>Crear Base de datos</a>         
                      </li>
                      <li class="nav-item">
                      <a class='nav-link' href='login.html'><stronge>Iniciar Sesion</stronge></a>         
                      </li>        
                    </ul>
                  </div>
                </div>
              </nav>            
        </header>
      <!-- Page Content -->
<div class="container">

    <!-- Portfolio Item Heading -->
    <h1 class="my-4">Sistema de Gestion de Proyectos
      <small>- Creacion de la base de datos</small>
    </h1>
  
    <!-- Portfolio Item Row -->
    <div class="row text-center">
      
    <div class="space-order"> </div>
      <div class="text-center">
        <h3 class="my-3">Base de datos creada satisfactoriamente</h3>
        <p> La base de datos a sido creada, usted puede hacer uso del sistema en la seccion Iniciar Sesion y utilizando las credenciales proveidas en la documentacion
          si existen dudas o consultas sobre el sistema puede contactar con nosotros por medio de nuestro correo institucional 2552952017@mail.utec.edu.sv para darle soporte tecnico oportuno
        </p>        
      </div>
  
    </div>
    <!-- /.row -->
   
  
    <!-- Footer -->
  <footer class="footer bg-light fixed-bottom static-bottom">
    <div class="container">
      <div class="row">
        <div class=" h-100 text-center text-lg-left my-auto">
          <ul class="list-inline mb-2">
            <li class="list-inline-item">
              <a href="index.html">Inicio</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="sobre-nosotros.hmtl">Sobre nosotros</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="servicios.html">Servicios</a>
            </li>            
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="sistema-proyecto">Sistema de control de proyectos</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="login.html">Iniciar Sesion</a>
            </li>
          </ul>
          <p class="text-muted small mb-4 mb-lg-0">&copy; Desarrollo de la plataforma web Ciclo 01-2019. All Rights Reserved.</p>
        </div>
        <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
          <ul class="list-inline mb-0">
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-facebook fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-twitter-square fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-instagram fa-2x fa-fw"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
</body>

</html>