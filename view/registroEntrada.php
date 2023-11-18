<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<header>
    <div class= "logo">GESTION NOMINA</div>
    <div class="bars">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
    </div>
</header>
<body>
    <div class="login-container">
        <h2>Registrar entrada o salida</h2>

        <?php
        // Verificar si hay un error y mostrar el mensaje correspondiente
        if (isset($_GET['error']) && $_GET['error'] == 1) {
            echo '<p style="color: red;">Correo o contraseña incorrectos.</p>';
        }
        ?>

        <form class="login-form" method='POST' action='../app/checkEntradaOSalida.php'>
            <label for="Mail">Correo electrónico:</label>
            <input type="text" id="Mail" name="Mail">

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password">

            <button type="Submit" name="Iniciar Sesion">Registrar</button>
        </form>
    </div>
</body>
</html>
