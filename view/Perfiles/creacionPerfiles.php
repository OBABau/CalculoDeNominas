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

    <title>Creacion Perfil</title>
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
                <a href="../Empresa/loginEmpresa.php"><i class="fa fa-arrow-left"></i> &nbsp;Regresar</a>
                <a href="../ayuda.php">&nbsp;<i class="fa fa-info"></i> &nbsp;Ayuda</a>
            </div>
            <form class="sidebarFooter" action="app/logout.php" method="post">
                <button class="btnSalir" type="submit">Cerrar Sesion</button>
            </form>
        </div>           

    <div class="contenido">
        <div class="contenidoHeader">
            <div class="login">
                <h1>AQUÍ SE CREARÁN LOS PERFILES</h1>
                <p>ESTOS PERFILES TENDRÁN DIFERENTES CARACTERÍSTICAS COMO LOS INGRESOS, QUE SE AJUSTARÁN PARA CADA TIPO DE
                    EMPLEADO</p>                
            </div>            
        </div>        

        <div class="contenidoBody">
            <a class="enlaceCard" href="newIncome+.php">
                <div class="card">
                    <div class="circle-img2">
                        <img src="../../img/graficon.svg" alt="Imagen graficaEmpresa">
                    </div>
                    <div class="card-text">
                        <p>Nuevo Ingreso</p>
                    </div>
                </div>
            </a>

            <a class="enlaceCard" href="newBenefit+.php">
                <div class="card">
                    <div class="circle-img2">
                        <img src="../../img/nuevaPresentacion.svg" alt="Imagen Nueva prestación">
                    </div>
                    <div class="card-text">
                        <p>Nueva prestación</p>
                    </div>
                </div>
            </a>


            <a class="enlaceCard" href="newProfile+.php">
                <div class="card">
                    <div class="circle-img2">
                        <img src="../../img/perfiles.svg" alt="Imagen perfiles">
                    </div>
                    <div class="card-text">
                        <p>Nuevo perfil</p>
                    </div>
                </div>
            </a>
                   
            <a class="enlaceCard" href="income+.php">
                <div class="card">
                    <div class="circle-img2">
                        <img src="../../img/graficon.svg" alt="Imagen graficaEmpresa">
                    </div>
                    <div class="card-text">
                        <p>Ingresos</p>
                    </div>
                </div>
            </a>

            <a class="enlaceCard" href="benefits+.php">
                <div class="card">
                    <div class="circle-img2">
                        <img src="../../img/nuevaPresentacion.svg" alt="Imagen Prestaciones">
                    </div>
                    <div class="card-text">
                        <p>Prestaciones</p>
                    </div>
                </div>
            </a>

            <a class="enlaceCard" href="profile+.php">
                <div class="card">
                    <div class="circle-img2">
                        <img src="../../img/perfiles.svg" alt="Imagen perfiles">
                    </div>
                    <div class="card-text">
                        <p>Perfiles</p>
                    </div>
                </div>
            </a>



        </div>
</body>

</html>