<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/styleEmpleados.css">
    <link rel="stylesheet" href="../../css/styleMenu.css">
    <title>Menú de Opciones</title>
</head>

<body>
<div class = "barra">
        <h2>Menú<img src="../../img/menu.svg"></h2>
        <ul>
            <li><a href="configuracionEmpresa.php">Configuración</a></li>
            <li><a href="infoEmpresa.php">Información</a></li>
            <li><a href="../ayuda.php">Ayuda</a></li>
        </ul>
    </div>
    <div class="menu">
        Panel De Empresa
        <?php
            session_start();
            echo $_SESSION['start'];
        ?>
        <a href="../../iniciado.php">
            <button type="button">Inicio</button>
        </a>
        <form action="../../app/logout.php" method="post">
                <button type="submit">Logout</button>
            </form>
    </div>
           

    <div class="container">
        <div class="option">
            <a href="graficasEmpresa.php">
            <img class="grafica-img" src="../../img/graficon.svg" alt="graficaEmpresa">
                <div class ="graficasTexto"><span>Graficas</span></div>
            </a>
        </div>
        <div class="option">
            <a href="../Empleado/listaEmpleados.php">
                <img class="listaEmpleados-img" src="../../img/listaEmpleados.svg" alt="listaEmpleados">
                <div class = "listaEmpleadosTexto"><span>Lista De Empleados</span></div>
            </a>
        </div>
        <div class="option">
            <a href="../Empleado/edicionEmpleados.php">
                <img class="edicionEmpleados-img" src="../../img/edicionEmpleados.svg" alt="edicionEmpleados">
                <div class = "empleadosTextop"><span>Edicion De Empleados</span></div>
            </a>
        </div>
        <div class="option">
            <a href="../Perfiles/creacionPerfiles.php">
                <img class="perfiles-img" src="../../img/perfiles.svg" alt="perfiles">
                <div class = "perfilEmpTexto"><span>Creacion de perfiles para empleados</span></div>
            </a>
        </div>
        <div class="option">
            <a href="HistorialPagos.php">
                <img class="historialPagos-img" src="../../img/historialPagos.svg" alt="historialPagos">
                <div class = "historialTexto"><span>Historial De Pagos</span></div>
            </a>
        </div>
        <div class="option">
            <a href="../registroEntrada.php">
                <img class="historialPagos-img" src="../../img/historialPagos.svg" alt="historialPagos">
                <div class = "historialTexto"><span>Registrar entrada y salida</span></div>
            </a>
        </div>
    </div>
</body>

</html>
