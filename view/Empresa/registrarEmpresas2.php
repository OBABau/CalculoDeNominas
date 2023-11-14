<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Empresas</title>

    <link rel="stylesheet" href="../css/styleRegistro.css">
</head>
<body>
    <?php
    session_start();
    ?>
    <header>
        <div class="logo">GESTION NOMINA</div>
        <div class="bars">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
        <nav class="nav-bar">
            <ul>
                <li><a href="../index.php">Inicio</a></li>
            </ul>
        </nav>
    </header>
    <div class="registro-container">
        <h2>Registro de Empresas</h2>
        <form class="registro-form" method="post" action="../data/addEmpresa2.php">
            <label for="nombre">Nombre de la Empresa:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="nombre_fiscal">Nombre Fiscal:</label>
            <input type="text" id="nombre_fiscal" name="nombre_fiscal" required>

            <label for="rfc">RFC:</label>
            <input type="text" id="rfc" name="rfc" required>

            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion" required>

            <label for="codigo_postal">Código Postal:</label>
            <input type="text" id="codigo_postal" name="codigo_postal" required>

            <label for="ciudad">Ciudad:</label>
            <input type="text" id="ciudad" name="ciudad" required>

            <label for="estado">Estado:</label>
            <input type="text" id="estado" name="estado" required>

        
            <button type="submit">Registrar Empresa</button>
        </form>
    </div>
</body>
</html>