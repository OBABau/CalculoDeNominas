<?php
include("Empresa.php");
$miEmpresa2 = new Empresa();
$miEmpresa2 ->iniciarSesion();
$nombre = $_POST['nombre'];
$nombreFiscal = $_POST['nombre_fiscal'];
$rfc = $_POST['rfc'];
$direccion = $_POST['direccion'];
$codigoPostal = $_POST['codigo_postal'];
$ciudad = $_POST['ciudad'];
$estado = $_POST['estado'];
$correo = $_SESSION['start'];


$miEmpresa2->setNombre($nombre);
$miEmpresa2->setNombreFiscal($nombreFiscal);
$miEmpresa2->setRfc($rfc);
$miEmpresa2->setDireccion($direccion);
$miEmpresa2->setCodigoPostal($codigoPostal);
$miEmpresa2->setCiudad($ciudad);
$miEmpresa2->setEstado($estado);

// Registra la empresa y obtiene el mensaje de resultado
$mensaje = $miEmpresa2->registrarEmpresa();

// Imprime los datos ingresados y el mensaje de resultado
echo "Nombre: " . $nombre . "<br>";
echo "Nombre Fiscal: " . $nombreFiscal . "<br>";
echo "RFC: " . $rfc . "<br>";
echo "Dirección: " . $direccion . "<br>";
echo "Código Postal: " . $codigoPostal . "<br>";
echo "Ciudad: " . $ciudad . "<br>";
echo "Estado: " . $estado . "<br>";
echo $_SESSION['start'];
echo "Mensaje del servidor: " . $mensaje;
header("Location: ../index.php");
?>
