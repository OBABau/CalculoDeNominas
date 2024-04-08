<?php
session_start();
include("../data/Empleado.php");
$empleado = new Empleado();
$days =  $_POST['days'];
$tardies =  $_POST['tardies'];
$sunday =  $_POST['sunday'];

$empleado->updateCheckerInfo($days,$sunday,$tardies,$_SESSION["idAsistencia"]);
header("location: checkerModifies.php?mensaje=Actualizacion Exitosa");
?>