<?php
include('../app/sesion.php');
include('../app/Worker.php');

$myWorker = new Worker();
$myWorker->setName($_POST ['name']);
$myWorker->setLastName($_POST ['apPat']);
$myWorker->setLastName2($_POST ['apMat']);
$myWorker->setRFC($_POST ['rfc']);
$myWorker->setNSS($_POST ['nss']);
$myWorker->setCurp($_POST ['curp']);
$myWorker->setNumber($_POST ['phone']);
$newid = $myWorker->setWorker();
$myWorker->setCorreo($_POST['mail']);
$myWorker->setContrasena($_POST['pass']);
$myWorker->registrarCuenta($newid);


//header('Location: ../view/Empleado/crearEmpleado.php');
?>