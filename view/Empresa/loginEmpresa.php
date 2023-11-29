<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="../../css/gwen.css">

    <link rel="icon" type="image/x-icon" href="../../img/img/logo.png">
    <title>Menú  de Opciones</title>
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

        <div class="userSidebar">
        </div>

        <div class="sidebarContent">
        <a  href="../../iniciado.php"><i class="fa fa-home"></i>&nbsp;Inicio</a>
            <a href="configuracionEmpresa.php"><i class="fa fa-cog"></i> &nbsp;Configuración</a>
            <a href="infoEmpresa.php"><i class="fa fa-user"></i> &nbsp;Información</a>
            <a href="../ayuda.php">&nbsp;<i class="fa fa-info"></i> &nbsp;Ayuda</a>

           
<form action="../../app/logout.php" method="post">
            <form action="../../app/logout.php" method="post">
                <button class="btnSalir2" type="submit">Cerrar Sesíon</button>
            </form>

        </div>
    </div>

    <div class="contenido">
        <div class="contenidoHeader">
            <div class="login">
                <h1>Panel de Empresa </h1>
            </div>
            <div class="panelTitulo">Seleccione una opción</div>
               <h4 style='color: red;'> Recuerda crear perfiles antes de acceder a las demas opciones. </h4>
        </div>

        <div class="contenidoBody">
            <a class="enlaceCard" href="graficasEmpresa.php">
                <div class="card">
                    <div class="circle-img2">
                        <img src="../../img/iconosfinales/grafica.png" alt="Imagen Recibo">
                    </div>
                    <div class="card-text">
                        <p>Gráficas</p>
                    </div>

                </div>
            </a>
            <a class="enlaceCard" href="../Perfiles/creacionPerfiles.php">
                <div class="card">
                    <div class="circle-img2">
                        <img src="../../img/iconosfinales/creacionperfiles.png" alt="Imagen graficasEmpresa">
                    </div>
                    <div class="card-text">
                        <p>Creación de perfiles para empleados</p>
                    </div>
                </div>
            </a>

            <a class="enlaceCard" href="estadisticaEmpresa.php">
                <div class="card">
                    <div class="circle-img2">
                        <img src="../../img/iconosfinales/estad.jpg" alt="Imagen estadisticas">
                    </div>
                    <div class="card-text">
                        <p>Estadisticas de la empresa</p>
                    </div>
                </div>
            </a>

            <a class="enlaceCard" href="../Empleado/edicionEmpleados.php">
                <div class="card">
                    <div class="circle-img2">
                        <img src="../../img/iconosfinales/edicionprestaciones.png" alt="Imagen edicionEmpleados">
                    </div>
                    <div class="card-text">
                        <p>Edición de prestaciones</p>
                    </div>
                </div>
            </a>
            <a class="enlaceCard" href="../Empleado/listaEmpleados.php">
                <div class="card">
                    <div class="circle-img2">
                        <img src="../../img/iconosfinales/empleado.png" alt="Imagen Recibo">
                    </div>
                    <div class="card-text">
                        <p>Lista De Empleados</p>
                    </div>
                </div>
            </a>
            <a class="enlaceCard" href="HistorialPagos.php">
                <div class="card"> 
                    <div class="circle-img2">
                        <img src="../../img/iconosfinales/historial.png" alt="Imagen historialPagos">
                    </div>
                    <div class="card-text">
                        <p>Historial de Pagos</p>
                    </div>
                </div>
            </a>    
    </div>
        
</body>

</html>