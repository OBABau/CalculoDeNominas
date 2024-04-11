<!DOCTYPE html>
<html lang="es">

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

    <link rel="icon" type="image/x-icon" href="../../img/img/logo.png">
    <title>Registro de Empresas</title>
    <script src='https://www.google.com/recaptcha/api.js' async defer ></script>
</head>

<body>
    <nav class="navbar">
        <div class="navbarHeader">
            <div class="navbarTitulo">TFT</div>
        </div>
        
        <div class="navbarCuerpo">                    
            <a class="enlaceNavbar sombraTexto1" href="../../index.php"> &nbsp;Inicio<i class="fa fa-chevron-down"></i></a>
            <a class="enlaceNavbar sombraTexto1" href="../../view/ayuda.php"> &nbsp;Ayuda<i class="fa fa-chevron-down"></i></a>
        </div>
    </nav>

    <div class="cuerpo">
        <?php
            // Verificar si hay un error de contraseña
            if (isset($_GET['error']) && $_GET['error'] === 'contrasena') {
                $error_message = '<p class="error">Contraseñas no coinciden.</p>';
            } 
            // Verificar si hay un error de correo en uso
            if (isset($_GET['error']) && $_GET['error'] === 'email_en_uso') {
                $error_message = '<p class="error">Este correo electrónico ya está en uso.</p>';
            } 
        ?> 
        <div class="login-container3">
            <div class="loginHeader">
                <h2>Registro de Empresas</h2>
            </div> 

            <div class="loginBody">
                <form class="login-form" method="post" action="../../app/add/addEmpresa.php">
                    <div class="formRow">
                        <label class="lblinput" for="correo">Correo electrónico:</label>
                        <i class="fa fa-envelope"></i>
                        <input class="input" type="email" id="correo" name="correo" maxlength="50"
                            placeholder="ejemplo@correo.com" required>
                    </div>
                    <div class="formRow">
                        <label class="lblinput" for="contrasena">Contraseña:</label>
                        <i class="fa fa-key"></i>
                        <input class="input" type="password" id="contrasena" name="contrasena" maxlength="16"
                            placeholder="Ingrese su Contraseña" required>
                    </div>
                    <div class="formRow">
                        <label class="lblinput" for="confirmar_contrasena">Confirmar Contraseña:</label>
                        <i class="fa fa-key"></i>
                        <input class="input" type="password" id="confirmar_contrasena" name="confirmar_contrasena" maxlength="16"
                            placeholder="Confirme su Contraseña" required>
                    </div>          
                    <div class="formRow">
                        <?php if (!empty($error_message)) { ?>
                            <div class="error"><?php echo $error_message; ?></div>
                        <?php } ?>
                    </div>
                    <div class="formRow">
                    </div>
                            <div class="g-recaptcha" data-sitekey="6LcKoLMpAAAAAHHMZAqrTsxiCIwV69m88DUoQchD">
                        </div>
                        <button class="boton2" type="Submit" name="registrarEmpresa">Registrar Empresa</button>
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