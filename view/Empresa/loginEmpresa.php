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
    <title>Menu de Opciones</title>
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
                <button class="btnSalir2" type="submit">Logout</button>
            </form>

        </div>
    </div>

    <div class="contenido">
        <div class="contenidoHeader">
            <div class="login">
                <h1>Panel de Empresa </h1>
            </div>
            <div class="panelTitulo">Seleccione una opcion</div>
        </div>

        <div class="contenidoBody">
            <a class="enlaceCard" href="graficasEmpresa.php">
                <div class="card">
                    <div class="circle-img2">
                        <img src="../../img/graficon.svg" alt="Imagen Recibo">
                    </div>
                    <div class="card-text">
                        <p>Graficas</p>
                    </div>

                </div>
            </a>
            <a class="enlaceCard" href="../Empleado/listaEmpleados.php">
                <div class="card">
                    <div class="circle-img2">
                        <img src="../../img/listaEmpleados.svg" alt="Imagen Recibo">
                    </div>
                    <div class="card-text">
                        <p>Lista De Empleados</p>
                    </div>
                </div>
            </a>
            <a class="enlaceCard" href="../Empleado/edicionEmpleados.php">
                <div class="card">
                    <div class="circle-img2">
                        <img src="../../img/edicionEmpleados.svg" alt="Imagen edicionEmpleados">
                    </div>
                    <div class="card-text">
                        <p>Edicion de Empleados</p>
                    </div>
                </div>
            </a>
            <a class="enlaceCard" href="../Perfiles/creacionPerfiles.php">
                <div class="card">
                    <div class="circle-img2">
                        <img src="../../img/perfiles.svg" alt="Imagen graficasEmpresa">
                    </div>
                    <div class="card-text">
                        <p>Creacion de perfiles para empleados</p>
                    </div>
                </div>
            </a>
            <a class="enlaceCard" href="HistorialPagos.php">
                <div class="card"> 
                    <div class="circle-img2">
                        <img src="../../img/historialPagos.svg" alt="Imagen historialPagos">
                    </div>
                    <div class="card-text">
                        <p>Historial de Pagos</p>
                    </div>
                </div>
            </a>
            <a class="enlaceCard" href="../registroEntrada.php">
                <div class="card">
                    <div class="circle-img2">
                        <img src="../../img/historialPagos.svg" alt="Imagen historialPagos">
                    </div>
                    <div class="card-text">
                        <p>Registrar entrada y salida</p>
                    </div>
                
            </div>
        </a>
            
    </div>
        
</body>

</html>