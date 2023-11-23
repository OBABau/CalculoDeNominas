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
    <link rel="stylesheet" href="../css/gwen.css">

    <link rel="icon" type="image/x-icon" href="../img/img/logo.png">
    <title>Iniciar Sesion</title>
</head>

<body>    
    <nav class="navbar">
        <div class="navbarHeader">
            <div class="navbarTitulo">TFT</div>
        </div>
        
        <div class="navbarCuerpo">                    
            <a class="enlaceNavbar sombraTexto1" href="../index.php"> &nbsp;Inicio <i class="fa fa-chevron-down"></i></a>
            <a class="enlaceNavbar sombraTexto1" href="../view/ayuda.php"> &nbsp;Ayuda <i class="fa fa-chevron-down"></i></a>
        </div>
    </nav>

    <div class="cuerpo">
        <div class="login-container4">
            <div class="loginHeader">
                <h2>Iniciar Sesión</h2>
            </div>

            <div class="loginBody">
                 <?php
                    
                    if (isset($_GET['error']) && $_GET['error'] == 1) {
                        echo '<p class="error">Correo o Contraseña Incorrectos.</p>';
                    }
                ?> 

                <form class="login-form" method='POST' action='../app/checkLogin.php'>
                    <div class="formRow">
                        <label class="lblinput" for="Mail">Correo electrónico:</label>
                        <i class="fa fa-envelope"></i>
                        <input class="input" type="text" id="Mail" name="Mail" maxlength="50"
                            placeholder="ejemplo@correo.com">
                    </div>
                    <div class="formRow">
                        <label class="lblinput" for="password">Contraseña:</label>
                        <i class="fa fa-key"></i>
                        <input class="input" type="password" id="password" name="password" maxlength="16"
                            placeholder="Ingrese su Contraseña">
                    </div>
                
                    <div class="formRow">
                        <button class="boton1" type="Submit" name="Iniciar Sesion">Iniciar Sesión</button>
                    </div>
                </form>
            </div>

        </div>

    </div>

    <div class="footer">
        <div class="mensajeFooter">            
            No nos hacemos responsables por el mal uso de la información aquí presentada.
            <br>
            2023 &copy; TFT            
        </div>
    </div>
</body>

</html>