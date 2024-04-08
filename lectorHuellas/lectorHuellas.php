<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/gwen.css">

    <link rel="icon" type="image/x-icon" href="../img/img/logo.png">

    <title>Edicion Prestaciones</title>
</head>

<body>

    <div class="sidebar">
        <div class="headerSidebar">
            <img class="logoImg" src="../img/img/logo.png" alt="Imagen Logo">
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
            <a href="../iniciado.php"><i class="fa fa-home"></i> &nbsp;Inicio</a>
            <a href="../view/Empresa/loginEmpresa.php"><i class="fa fa-arrow-left"></i> &nbsp;Regresar</a>
            <a href="../view/ayuda.php">&nbsp;<i class="fa fa-info"></i> &nbsp;Ayuda</a>
        </div>

        <form class="sidebarFooter" action="../app/logout.php" method="post">
            <button class="btnSalir" type="submit">Cerrar Sesion</button>
        </form>
    </div>

    

<div class="contenido">
<form action="procesar.php" method="post" enctype="multipart/form-data">

<h1>Subir asistencia</h1>
<h3 style='color: red;'>En este apartado sube el archivo 'Todos los informes.xslx' que proporciona el checador para registrar la asistencia de tus empleados</h3>

<br>
<br>
<div class="boton-personalizado">
  <span id="nombre-archivo">Seleccionar archivo</span>
  <input type="file" name="archivo" id="archivo" accept=".xlsx" onchange="mostrarNombreArchivo()">
</div>


<?php
    // Recupera el mensaje del parámetro de la URL
    $mensaje = isset($_GET['mensaje']) ? $_GET['mensaje'] : '';

    if ($mensaje) {
        echo '<br><br><p class="bien">' . $mensaje . '</p>';
    }
    ?> 
    <br><br>
    <input type="submit" class = 'btnPerfiles' value="Enviar">
</form>
</div>

<script>

function mostrarNombreArchivo() {
  var inputArchivo = document.getElementById('archivo');
  var nombreArchivoMostrado = document.getElementById('nombre-archivo');
  if (inputArchivo.files.length > 0) {
    nombreArchivoMostrado.textContent = inputArchivo.files[0].name;
  } else {
    nombreArchivoMostrado.textContent = 'Seleccionar archivo';
  }
}
</script>