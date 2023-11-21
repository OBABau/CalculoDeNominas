<?php 
include('../../data/conexionDB.php');
//include('../../app/sesion.php');
include('../Perfiles/profile+.php');

if (!isset($_SESSION['redirected'])) {
  header("Location: graficasEmpleado.php");
  exit(); // Agrega exit() después de la redirección para detener la ejecución del script
}

$userID = isset($_SESSION['code']) ? $_SESSION['code'] : null; // Verifica si 'code' está definido en $_SESSION
if (!$userID) {
  echo "Error: 'code' no está definido en la sesión.";
  exit();
}

$query = "SELECT MONTH(payDate) as month, SUM(total) as totalIncome
          FROM SALARY
          WHERE worker = ".$_SESSION['code']."
          GROUP BY MONTH(payDate)";
          echo $query;
          echo $_SESSION['code'];
$conexionDB = new ConexionDB(); // Crear una instancia de la clase ConexionDB
$conexion = $conexionDB->connect(); // Usa la instancia para conectarte a la base de datos
$consulta = mysqli_query($conexion, $query);
?>
<html>
  <head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/gwen.css">

    <link rel="icon" type="image/x-icon" href="../../img/img/logo.png">

    <title>Graficas Empleado</title>
  </head>
  <body>
    
    <div class="sidebar">
        <div class="headerSidebar">
            <img class="logoImg" src="../../img/img/logo.png" alt="Imagen Logo">
            <div class="tituloSidebar">NÓMINAS</div>
        </div>
        <hr>
            <div class="bienvenidoSideBar">
            <?php
                    session_start();
                    echo "Bienvenido: ";
                    echo $_SESSION['start'];
                ?>
            </div>
        <div class="sidebarContent">
            <a href="../../iniciado.php"><i class="fa fa-home"></i> &nbsp;Inicio</a>
            <a href="loginEmpleado.php"><i class="fa fa-arrow-left"></i> &nbsp;Regresar</a>             
            <a href="../ayuda.php">&nbsp;<i class="fa fa-info"></i> &nbsp;Ayuda</a>
        </div>

        <form class="sidebarFooter" action="../../app/logout.php" method="post">
            <button class="btnSalir" type="submit">Cerrar Sesion</button>
        </form>
    </div>

    <div class="contenido">        
        <h1>Graficas</h1>
        <div id="piechart" style="width: 900px; height: 500px;"></div>
    </div>
    


  </body>
</html>