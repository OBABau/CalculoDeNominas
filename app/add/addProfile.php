<?php
session_start();
echo $_SESSION['start'];
include("../../data/ingresosYConsultas+.php");
 //Inserción del ingreso
$myobject = new ingresosYConsultas;
$myobject -> setName($_POST['profileName']);
$myobject -> setDescription($_POST['profileDescription']);
$consulta = $myobject->getEnterprise();
while ($tupla = mysqli_fetch_assoc($consulta))
{
    $myobject->setEnterprise($tupla['code'] );
}
$myobject -> insertProfile($_POST['profileAmount']);
header("Location: ../../view/Perfiles/profile+.php");
?>