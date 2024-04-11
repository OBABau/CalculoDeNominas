<html>

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="../css/gwen.css">

    <link rel="icon" type="image/x-icon" href="../img/img/logo.png">
    <title>Registrar E/S</title>
</head>
<header>
    <nav class="nav-bar">
        <ul>
            <li>
                <a href="../index.php">Inicio</a>
            </li>
        </ul>
    </nav>
</header>
<div class="sidebar">
    <div class="headerSidebar">
        <img class="logoImg" src="../img/img/logo.png" alt="Imagen Logo">
        <div class="tituloSidebar">NÓMINAS</div>
    </div>

    <div class="userSidebar">
    </div>

    <div class="sidebarContent">
        <a href="../app/logout.php">&nbsp;<i class="fa fa-power-off"></i> &nbsp;Cerrar Sesion</a>
    </div>
</div>

<body>

    <div class="contenido">
        <h3 style='color: red;'>Chequeo de entrada y salida al turno<br>
    Recuerda checar una vez para tu entrada al turno y una vez para tu salida </h3>
        <div class="login-container">
            <div class="loginHeader">
                <h2>Registrar Entrada o Salida de turno de trabajo de empleados</h2>
            </div>

            <div class="loginBody">
                <!-- <?php
                // Verificar si hay un error y mostrar el mensaje correspondiente
                if (isset($_GET['error']) && $_GET['error'] == 1) {                    
                    echo '<p class="error">Correo o Contraseña Incorrectos.</p>';
                }
                ?> -->                
                
                <form class="login-form" method='POST' action='../app/checkEntradaOSalida.php'>
                    <div class="formRow">
                        <label class="lblinput" for="Mail">Correo electrónico:</label>
                        <i class="fa fa-envelope"></i>
                        <input class="input" type="text" id="Mail" name="Mail" maxlength="50" placeholder="ejemplo@correo.com">
                    </div>
                    <div class="formRow">
                        <label class="lblinput" for="password">Contraseña:</label>
                        <i class="fa fa-key"></i>
                        <input class="input" type="password" id="password" name="password" maxlength="16" placeholder="Ingrese su Contraseña">
                    </div>
                    <?php
                    if (isset($_GET['error']) && $_GET['error'] == 1) {
                        echo '<p class="error">Correo no encontrado o contrasena incorrecta</p>';
                    } 
                    ?>     
                     <?php
                        // Recupera el mensaje del parámetro de la URL
                        $mensaje = isset($_GET['mensaje']) ? $_GET['mensaje'] : '';

                        if ($mensaje) {
                            if($mensaje == "Registro duplicado")
                            {
                                echo '<p class="error">' . $mensaje . '</p>';
                            }else
                            {
                                echo '<p class="bien">' . $mensaje . '</p>';
                            }
                        }
                    ?>                                                      
                    <div class="formRow2">
                        <button class="boton1" type="Submit" name="Iniciar Sesion">Registrar</button>
                    </div>                    
                </form>
            </div>

        </div>
        <h3 style='color: red;'>Recuerda si quieres revisar tus datos o nominas como empleado, dirigete a la <br>pagina principal desde tu propio dispositivo  y inicia sesión con tu cuenta de empleado</h3> 
    </div>
</body>

</html>