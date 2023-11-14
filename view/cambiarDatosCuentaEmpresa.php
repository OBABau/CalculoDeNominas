<?php
include('../data/Empresa.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    $empresa = new Empresa();
    $correoBuscado = $_SESSION['start'];

    $nuevoCorreo = $_POST["correo"];
    $nuevaContrasena = $_POST["contrasena"];

   
    $actualizacionExitosa = $empresa->actualizarDatosCuenta($correoBuscado, $nuevoCorreo, $nuevaContrasena);

    if ($actualizacionExitosa) {
       
        header("Location: configuracionEmpresa.php?mensajeCuenta=exito");
        exit();
    } else {
       
        header("Location: configuracionEmpresa.php?mensajeCuenta=error");
        exit();
    }
} else {
    
    echo "Acceso no autorizado.";
}
?>
