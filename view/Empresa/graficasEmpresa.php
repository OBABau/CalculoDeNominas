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

    <title>Estadísticas de la Empresa</title>
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
        <hr>
        <div class="sidebarContent">
            <a href="../../iniciado.php"><i class="fa fa-home"></i> &nbsp;Inicio</a>
            <a href="loginEmpresa.php"><i class="fa fa-arrow-left"></i> &nbsp;Regresar</a>
            <a href="../ayuda.php">&nbsp;<i class="fa fa-info"></i> &nbsp;Ayuda</a>
        </div>
        <form class="text-center" action="../../app/logout.php" method="post">
            <button class="btnSalir2" type="submit">Cerrar Sesion</button>
        </form>
    </div>

    <div class="contenido">
        <h2>Estadísticas de la Empresa</h2>

        <div class="estadisticas-container">
            <div class="formRow">
                <label for="gastoMensual">Gasto Mensual:</label>
                <input type="text" id="gastoMensual" name="gastoMensual" placeholder="">
            </div>

            <div class="formRow">
                <label for="gastoAnual">Gasto Anual:</label>
                <input type="text" id="gastoAnual" name="gastoAnual" placeholder="">
            </div>
        </div>

     
    </div>
</body>

</html>