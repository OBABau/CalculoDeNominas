<?php
include('../sesion.php');
include('../../data/Worker.php');
include('../../data/Empresa.php');
$empresas = new Empresa();

$empresas->setCorreo($_POST['mail']);
$consulta = $empresas->checkCuenta();

$tupla = mysqli_fetch_assoc($consulta);

if ($tupla['total'] > 0) {
    // El correo electrónico ya está en uso, redirigir de vuelta al formulario con un mensaje de error
    header("Location: ../../view/Empleado/crearEmpleado.php?error=email_en_uso");
    exit();
}

$myWorker = new Worker();
$myWorker->setName($_POST ['nombre']);
$myWorker->setLastName($_POST ['apPat']);
$myWorker->setLastName2($_POST ['apMat']);
$myWorker->setRFC($_POST ['rfc']);
$myWorker->setNSS($_POST ['nss']);
$myWorker->setCurp($_POST ['curp']);
$myWorker->setNumber($_POST ['phone']);
$myWorker->setProfile($_POST['perfiles']);
$myWorker->setCheckerName($_POST['nombreChecador']);
$myWorker->setCheckerID($_POST['checkerID']);
$newid = $myWorker->setWorker();
$myWorker->setCorreo($_POST['mail']);
$myWorker->setContrasena($_POST['pass']);
$myWorker->registrarCuenta($newid);



header('Location: ../../view/Empleado/crearEmpleado.php?success=1');
?>