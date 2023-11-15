<?php
include("Empresa.php");

$miEmpresa = new Empresa();
$miEmpresa->setCorreo($_POST['correo']);

// Verificar si el correo electrónico ya está en uso
$consulta = $miEmpresa->checkCuenta();
$tupla = mysqli_fetch_assoc($consulta);

if ($tupla['total'] > 0) {
    // El correo electrónico ya está en uso, redirigir de vuelta al formulario con un mensaje de error
    header("Location: ../view/Empresa/registrarEmpresas.php?error=email_en_uso");
    exit();
}

// Verificar si las contraseñas coinciden
if ($_POST['contrasena'] === $_POST['confirmar_contrasena']) {
    // Las contraseñas son iguales, puedes proceder con el registro
    $miEmpresa->setContrasena($_POST['contrasena']);
    $miEmpresa->registrarCuenta();
    session_start();
    $_SESSION['start'] = $_POST['correo']; // Guardar el correo electrónico en la sesión
    $_SESSION['type'] = 3; // 3 para empresa
    header("Location: ../view/Empresa/registrarEmpresas2.php");
    exit();
} else {
    // Las contraseñas no coinciden, redirigir al usuario de vuelta al formulario con un mensaje de error
    header("Location: ../view/Empresa/registrarEmpresas.php?error=contrasena");
    exit();
}
?>
