<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
        <h1>Confirmar Asistencia</h1><br>
        <table class="table table-striped table-hover">
            <?php

            include('../data/Worker.php');
            $myconsulta = new Worker();
            $datasetWorkersWithUsers = $myconsulta->getAllWorkerWithUsers();

            if ($datasetWorkersWithUsers != "error") {
                // Imprimir los títulos de la tabla
                echo '<tr class="font-weight-bold primary table-primary">';
                echo '<th>Nombre</th>';
                echo '<th>Apellido Paterno</th>';
                echo '<th>Apellido Materno</th>';
                echo '<th>Asistencia</th>';
                echo '</tr>';

                // Imprimir los datos de la consulta de trabajadores y usuarios
                while ($tupla = mysqli_fetch_assoc($datasetWorkersWithUsers)) {
                    echo '<tr>';
                    echo "<td>" . $tupla['name'] . "</td>";
                    echo "<td>" . $tupla['lastName'] . "</td>";
                    echo "<td>" . $tupla['lastName2'] . "</td>";
                    echo "<td>";
                    echo "<a href='asistencia.php?id=" . $tupla['code'] . "&nombre=" . $tupla['name'] . "&apellido1=" . $tupla['lastName'] . "&apellido2=" . $tupla['lastName2'] . "'>Ver</a>  ";
                    echo "</td>";
                    echo '</tr>';
                }
            } else {
                echo "Algo pasó en la consulta";
            }
            ?>
        </table>
        <br>
        <!-- Botón "Cerrar Semana" con función de confirmación de pop-up -->
        <button class="btnPerfiles" onclick="confirmarCerrarSemana()">Cerrar Semana</button>
   

    <?php
    // Recupera el mensaje del parámetro de la URL
    $mensaje = isset($_GET['mensaje']) ? $_GET['mensaje'] : '';

    if ($mensaje) {
        echo '<br><br><p class="bien">' . $mensaje . '</p>';
    }
    ?> 
 </div>
    <!-- Script para mostrar el pop-up de confirmación y redireccionar -->
    <script>
        function confirmarCerrarSemana() {
            // Mostrar el pop-up de confirmación
            if (confirm("¿Estás seguro de cerrar la semana?")) {
                // Si se confirma, redireccionar al archivo cerrarSemana.php
                window.location.replace("cerrarSemana.php");

            }
        }
    </script>

</body>

</html>