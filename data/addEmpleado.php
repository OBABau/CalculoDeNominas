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
$myWorker->setWorker();

header('Location: ../view/crearEmpleado.php');
?>