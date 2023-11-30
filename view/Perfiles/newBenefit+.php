<!DOCTYPE html>
<html>

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="../../css/gwen.css">

    <link rel="icon" type="image/x-icon" href="../../img/img/logo.png">

    <title>Registro de Prestacion</title>
</head>

<body>

    <div class="contenido">
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
            <a href="../Empresa/loginEmpresa.php"><i class="fa fa-home"></i> &nbsp;Panel Empresa</a>
                <a href="creacionPerfiles.php"><i class="fa fa-arrow-left"></i> &nbsp;Regresar</a>
                <a href="../ayuda.php">&nbsp;<i class="fa fa-info"></i> &nbsp;Ayuda</a>
            </div>
            <form class="sidebarFooter" action="../../app/logout.php" method="post">
                <button class="btnSalir" type="submit">Cerrar Sesion</button>
            </form>
        </div>                    

        <div class="login-container">
            <div class="loginHeader">
                <h1>Registro de un Nuevo Tipo de Prestacion</h1>       
            </div>

            <div class="loginBody">                
                <form class="login-form" method="POST" action="../../app/addBenefits.php">
                    <div class="formRow">
                        <label class="lblinput" for="benefitName">Nombre de la prestación:</label>
                        <i class="fa fa-envelope"></i>
                        <input class="input" type="text" id="benefitName" name="benefitName" maxlength="30"
                            placeholder="Ingrese el Nombre">
                    </div>
                    <div class="formRow">
                        <label class="lblinput" for="benefitDescription">Descripción:</label>
                        <i class="fa fa-user"></i>
                        <input class="input" type="text" id="benefitDescription" name="benefitDescription" maxlength="100"
                            placeholder="Ingrese la Descripcion">
                    </div>  
                    <div class="formRow">                        
                        <label class="lblinput" for="benefitAmount">Bonificacion semanal:</label>                        
                        <input class="inputNumber" type="decimal" name="benefitAmount" id="benefitAmount" maxlength="100" pattern="^[0-9]+(\.[0-9]+)?$"
                        placeholder="0">
                    </div>                           
                    <div class="formRow">
                        <button class="boton1" type="Submit" value="Enviar">Registrar</button>
                    </div>                
                </form>
            </div>

        </div>
    

    </div>
</body>

</html>