<?php
session_start();
echo $_SESSION['start'];
include("../data/ingresosYConsultas+.php");
// Insercion del ingreso
$myobject = new ingresosYConsultas;
$myobject -> setName($_POST['benefitName']);
$myobject -> setDescription($_POST['benefitDescription']);
$consulta = $myobject->getEnterprise();
while ($tupla = mysqli_fetch_assoc($consulta))
{
    $myobject->setenterprise($tupla['code']);
}
$myobject -> insertBenefit();
header("Location: ../view/Perfiles/benefits+.php");
