<!-- <?php
include('../app/sesion.php');
?> -->
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="../../css/gwen.css">

    <link rel="icon" type="image/x-icon" href="../img/img/logo.png">

    <title>Index</title>
</head>

<body>
    <header>        
        <nav class="navbar">
            <div class="navbarHeader">
                <div class="navbarTitulo">TFT</div>
            </div>
            
            <div class="navbarCuerpo">            
                <a class="enlaceNavbar" href="../../index.php">Inicio &nbsp;<i class="fa fa-chevron-down"></i></a>
                <a class="enlaceNavbar" href="registrarEmpresas.php">Regístrate &nbsp;<i class="fa fa-chevron-down"></i></a>
            </div>

            <div class="navbarFooter">
                <a href="../login.php">
                    <button class="btnNavbar" type="submit">Iniciar Sesión</button>
                </a>
            </div>
        </nav>
    </header>

    <div class="cuerpo">
        <h1 style="text-align: center;">VISUALIZACIÓN DE SERVICIOS DISPONIBLES</h1>

        <div class="contenedorCartas">
            <div class="carta">
                <div class="carta-header">
                    <img class="imagenCarta" src="../../img/paquete1.jpg" alt="Imagen Paquete1">
                </div>
                <div class="carta-body">
                    <div class="cartaTitulo">Plan Mensual</div>
                    <p>Contrata nuestro servicio por 1 mes: </p>  
                    <ul>
                    -Administras tus empleados.   <br>
                    -Registra entrada/salida de tus empleados.  <br>
                    -Calcula nóminas.
                    </ul>                  
                </div>
                <div class="carta-footer">                    
                </div>
            </div>

            <div class="carta">
                <div class="carta-header">
                    <img class="imagenCarta" src="../../img/paquete2.jpg" alt="Imagen Paquete1">
                </div>
                <div class="carta-body">
                    <div class="cartaTitulo">Plan 2</div>
                    <p>Próximamente, paquete en desarrollo...</p>
                </div>
                <div class="carta-footer">                    
                </div>
            </div>            
        </div>


    </div>    
</body>
</html>