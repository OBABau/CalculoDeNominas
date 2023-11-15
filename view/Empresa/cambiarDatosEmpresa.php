<?php
include('../../data/Empresa.php');

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $empresa = new Empresa();
    $correoBuscado = $_SESSION['start'];

    $nombre = $_POST["nombreEmpresa"];
    $direccion = $_POST["direccion"];
    $codigoPostal = $_POST["codigoPostal"];
    $ciudad = $_POST["ciudad"];
    $estado = $_POST["estado"];
    
    $actualizacionExitosa = $empresa->actualizarDatosEmpresa($nombre, $direccion, $codigoPostal, $ciudad, $estado, $correoBuscado);

    if ($actualizacionExitosa) {
        header("Location: configuracionEmpresa.php?mensajeEmpresa=exito");
        exit();
    } else {
        header("Location: configuracionEmpresa.php?mensajeEmpresa=error");
        exit();
    }
} else {
    echo "Acceso no autorizado.";
}
?>