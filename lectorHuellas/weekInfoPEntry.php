<?php
session_start();
include("../data/Empleado.php");
$empleado = new Empleado();

$empleado->insertEntries($_POST['monday'],$_POST['tuesday'],$_POST['wednesday'],$_POST['thursday'],$_POST['friday'],$_POST['saturday'],$_POST['sunday'],$_SESSION['idAsistencia']);
header("location: weekInfoModifiesEntry.php?mensaje=Actualizacion Exitosa");
?>