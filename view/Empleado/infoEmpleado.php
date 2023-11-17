<?php
include('../../data/Empleado.php');
session_start();
$empleado = new Empleado();

// Obtener datos del usuario
$datosUsuario = $empleado->getUserData($_SESSION['start']);
$userId = $empleado->setUser($_SESSION['code']);
$datosEmpleado = $empleado->obtenerDatosEmpleado();

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
        <a href="loginEmpleado.php" class="regresar-button">Regresar</a>
    </div>
              <form action="../../app/logout.php" method="post">
                <button type="submit">Logout</button>
            </form>
             

    <h1>Información de la Cuenta del Empleado</h1>

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
            <th>Apellido paterno</th>
            <th>Apellido materno</th>
            <th>RFC</th>
            <th>NSS</th>
            <th>CURP</th>
            <th>Numero</th>
            <th>Fecha de entrada</th>
        </tr>
        <?php while ($tupla = mysqli_fetch_assoc($datosEmpleado)) {?>
            <tr>
                <td><?php echo $tupla['name']; ?></td>
                <td><?php echo $tupla['lastName']; ?></td>
                <td><?php echo $tupla['lastName2']; ?></td>
                <td><?php echo $tupla['RFC']; ?></td>
                <td><?php echo $tupla['NSS']; ?></td>
                <td><?php echo $tupla['CURP']; ?></td>
                <td><?php echo $tupla['number']; ?></td>
                <td><?php echo $tupla['entryDate']; ?></td>
            </tr>
        <?php } ?>
            
    </table>
</body>
</html>
