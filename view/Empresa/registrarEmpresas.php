<?php
// Verificar si hay un error de contraseña
if (isset($_GET['error']) && $_GET['error'] === 'contrasena') {
    $error_message = '<p style="color: red;">Contraseñas no coinciden.</p>';
} 

// Verificar si hay un error de correo en uso
if (isset($_GET['error']) && $_GET['error'] === 'email_en_uso') {
    $error_message = '<p style="color: red;">Este correo electrónico ya está en uso.</p>';
} 

?>
    
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registro de Empresas</title>
        <link rel="stylesheet" href="../../css/style.css">
        <link rel="stylesheet" href="../../css/styleRegistro.css">
    </head>
    <body>
        <header>
            <div class="logo">GESTION NOMINA</div>
            <div class="bars">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
            <nav class="nav-bar">
                <ul>
                    <li><a href="../../index.php">Inicio</a></li>
                </ul>
            </nav>
        </header>
        <div class="registro-container">
            <h2>Registro de Empresas</h2>
            <form class="registro-form" method="post" action="../../data/addEmpresa.php">

                <label for="correo">Correo Electrónico:</label>
                <input type="email" id="correo" name="correo" required>

                <label for="contrasena">Contraseña:</label>
                <input type="password" id="contrasena" name="contrasena" required>

                <label for="confirmar_contrasena">Confirmar Contraseña:</label>
                <input type="password" id="confirmar_contrasena" name="confirmar_contrasena" required>

                <?php if (!empty($error_message)) { ?>
        <div class="error-message"><?php echo $error_message; ?></div>
    <?php } ?>
    <br>
                <button type="submit">Registrar Empresa</button>
                
            </form>
        </div>
    </body>
    </html>