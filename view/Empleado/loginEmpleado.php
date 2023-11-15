<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/styleEmpleados.css">
    <link rel="stylesheet" href="../../css/styleMenu.css">
    <title>Menú de Opciones.</title>
    <title>Document</title>
</head>
<body>
    <div class = "barra">
        <h2>Menú<img src="../../img/menu.svg"></h2>
        <ul>
            <li><a href="configuracionEmpleado.php">Configuración</a></li>
            <li><a href="infoEmpleado.php">Información</a></li>
            <li><a href="../ayuda.php">Ayuda</a></li>
        </ul>
    </div>
    <div class = "menu">
        Panel de Empleados
        <a href="../../iniciado.php"><button type="button">Inicio</button></a>
    </div>
              <form action="../../app/logout.php" method="post">
                <button type="submit">Logout</button>
            </form>
    <div class = "container">
        <div class = "option">
            <a href="graficasEmpleado.php">
                <img class = "grafica-img" src="../../img/graficon.svg" alt="grafica">
                    <div class = "graficasTexto"><span>Graficas</span></div>
            </a>
        </div>
        <div class ="option">
            <a href="nominaReciente.php">
                <img class = "nominaReciente-img" src="../../img/nominaReciente.svg" alt="nominaReciente">
                <div class ="graficasTexto"><span>Nomina Reciente</span></div>
            </a>
        </div>
        <Div class ="option">
            <a href="Historialnominas.php">
                <img class = "historialNominas-img" src="../../img/nominas.svg" alt="historialNominas">
                <div class = "historialTxt"><span>Historial De  Nóminas</span></div>
            </a>
        </Div>
    </div>
</body>
</html>