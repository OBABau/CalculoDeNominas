<?php
include('../../data/Empresa.php');
session_start();
$empresa = new Empresa();

$correoBuscado = $_SESSION['start'];

$datosUsuario = $empresa->getUserData($correoBuscado);
$datosEmpresa = $empresa->obtenerDatosEmpresa($correoBuscado);

$correo = $contrasena = $nombre = $direccion = $codigoPostal = $ciudad = $estado = '';

if ($datosUsuario) {
    $correo = $datosUsuario["email"];
    $contrasena = $datosUsuario["password"];
}

// Verifica si se encontraron datos de empresa
if ($datosEmpresa) {
    $nombre = $datosEmpresa['name'];
    $direccion = $datosEmpresa['addressDesc'];
    $codigoPostal = $datosEmpresa['CP'];
    $ciudad = $datosEmpresa['city'];
    $estado = $datosEmpresa['state'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración de Cuenta</title>
</head>
<body>
<div class="menu">
        <?php
            echo $_SESSION['start'];
        ?>
        <a href="loginEmpresa.php">
            <button type="button">Inicio</button>
        </a>
    </div>
    <h1>Configuración de Cuenta</h1>

    <h2>Datos de la cuenta</h2>
    <form action="cambiarDatosCuentaEmpresa.php" method="post">
        <label for="correo">Correo Electrónico:</label>
        <input type="email" id="correo" name="correo" value="<?php echo $correo; ?>" required>

        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" value="<?php echo $contrasena; ?>" required>

        <input type="submit" value="Guardar Cambios">

        <?php
        if (isset($_GET['mensajeCuenta'])) {
            $mensajeCuenta = $_GET['mensajeCuenta'];
            if ($mensajeCuenta === "exito") {
                echo '<p style="color: green;">Datos de cuenta actualizados correctamente.</p>';
                echo '<a href="../../app/logout.php">Logout</a>';
            } elseif ($mensajeCuenta === "error") {
                echo '<p style="color: red;">Error al actualizar los datos de cuenta.</p>';
            }
        }
        ?>
    </form>

    <h2>Datos de la empresa</h2>
    <form action="cambiarDatosEmpresa.php" method="post">
        <label for="nombreEmpresa">Nombre de la Empresa:</label>
        <input type="text" id="nombreEmpresa" name="nombreEmpresa" value="<?php echo $nombre; ?>" required>

        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" value="<?php echo $direccion; ?>" required>

        <label for="codigoPostal">Código Postal:</label>
        <input type="text" id="codigoPostal" name="codigoPostal" value="<?php echo $codigoPostal; ?>" required>

        <label for="ciudad">Ciudad:</label>
        <input type="text" id="ciudad" name="ciudad" value="<?php echo $ciudad; ?>" required>

        <label for="estado">Estado:</label>
        <input type="text" id="estado" name="estado" value="<?php echo $estado; ?>" required>

        <input type="submit" value="Guardar Cambios">

        <?php
        if (isset($_GET['mensajeEmpresa'])) {
            $mensajeEmpresa = $_GET['mensajeEmpresa'];
            if ($mensajeEmpresa === "exito") {
                echo '<p style="color: green;">Datos de empresa actualizados correctamente.</p>';
            } elseif ($mensajeEmpresa === "error") {
                echo '<p style="color: red;">Error al actualizar los datos de empresa.</p>';
            }
        }
        ?>
    </form>
</body>
</html>
