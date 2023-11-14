<?php
session_start();
echo $_SESSION['start'];
include("../data/ingresosYConsultas+.php");
// Insercion del ingreso
$myobject = new ingresosYConsultas;
$myobject -> setName($_POST['incomeName']);
$myobject -> setDescription($_POST['incomeDescription']);
$consulta = $myobject->getEnterprise();
while ($tupla = mysqli_fetch_assoc($consulta))
{
    $myobject->setenterprise($tupla['code']);
}
$myobject -> insertIncome();
header("Location: ../view/Perfiles/income+.php");
?>