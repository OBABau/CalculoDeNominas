<?php
include('../data/Empresa.php');
session_start();
$empresa = new Empresa();

// Obtener datos del usuario
$datosUsuario = $empresa->getUserData($_SESSION['start']);
$userId = $empresa->getUser();
$datosEmpresa = $empresa->obtenerDatosEmpresa($_SESSION['start']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información de la Cuenta de la Empresa</title>
</head>
<body>
<div class = "menu">
        Panel de Empleados
        <a href="loginEmpresa.php" class="regresar-button">Regresar</a>
    </div>
              <form action="../app/logout.php" method="post">
                <button type="submit">Logout</button>
            </form>
             

    <h1>Información de la Cuenta de la Empresa</h1>

    <h2>Datos del Usuario</h2>
    <table border="1">
        <tr>
            <th>Email</th>
            <th>Password</th>
        </tr>
        <tr>
            <td><?php echo $datosUsuario['email']; ?></td>
            <td><?php echo $datosUsuario['password']; ?></td>
        </tr>
    </table>

    <h2>Datos de la Empresa</h2>
    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Dirección</th>
            <th>Código Postal</th>
            <th>Ciudad</th>
            <th>Estado</th>
        </tr>
        <?php if ($datosEmpresa): ?>
            <tr>
                <td><?php echo $datosEmpresa['name']; ?></td>
                <td><?php echo $datosEmpresa['addressDesc']; ?></td>
                <td><?php echo $datosEmpresa['CP']; ?></td>
                <td><?php echo $datosEmpresa['city']; ?></td>
                <td><?php echo $datosEmpresa['state']; ?></td>
            </tr>
        <?php else: ?>
            <tr>
                <td colspan="5">No se encontraron datos de la empresa.</td>
            </tr>
        <?php endif; ?>
    </table>
</body>
</html>
