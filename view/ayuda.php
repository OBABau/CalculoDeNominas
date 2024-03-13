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
    <title>Ayuda</title>
</head>

<body>    
    <nav class="navbar">
        <div class="navbarHeader">
            <div class="navbarTitulo">TFT</div>
        </div>
        <?php
        session_start();
        if (isset($_SESSION['type']))
        {
        ?>
        <div class="navbarCuerpo">                    
            <a class="enlaceNavbar sombraTexto1" href="../iniciado.php"> &nbsp;Inicio <i class="fa fa-chevron-down"></i></a>
        </div>
        <?php
        }
        else {
        ?>
        <div class="navbarCuerpo">                    
            <a class="enlaceNavbar sombraTexto1" href="../index.php"> &nbsp;Inicio <i class="fa fa-chevron-down"></i></a>
        </div>
        <?php
        }
        ?>
    </nav>

    <div class="cuerpo">
        <div class="login-container4">
            <div class="loginHeader">
                <h2>Cúentanos tu problema</h2>
            </div>

            <div class="loginBody">
                

                <form class="login-form" method='POST' action='../app/add/addAyuda.php'>
                    <div class="formRow">
                        <label class="lblinput" for="Mail">Correo electrónico:</label>
                        <i class="fa fa-envelope"></i>
                        <input class="input" type="text" id="Mail" name="Mail" maxlength="50"
                            placeholder="ejemplo@correo.com" required>
                    </div>
                    <div class="formRow">
                        <label class="lblinput" for="text">Título:</label>
                        <input class="input" type="text" id="titulo" name="titulo" maxlength="64"
                            placeholder="Título del problema" required>
                    </div>

                    <div class="formRow">
                        <label class="lblinput" for="text">Descripción:</label>
                        <textarea class="textarea1" name="descripcion" id="descripcion" cols="30" rows="10" style="resize: none;  font-family: 'Poppins', sans-serif;" placeholder="   Descripción del problema" required></textarea>
                    </div>

                    <div class="formRow2">
                        <button class="boton1" type="Submit" name="Iniciar Sesion">Enviar</button>
                    </div>
                </form>
                    <?php
                        // Recupera el mensaje del parámetro de la URL
                        $mensaje = isset($_GET['mensaje']) ? $_GET['mensaje'] : '';

                        if ($mensaje) {
                        echo '<p class="bien">' . $mensaje . '</p>';
                        }
                    ?>
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