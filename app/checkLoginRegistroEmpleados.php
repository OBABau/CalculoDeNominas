<?php
session_start();
include('../data/users.php');
//echo $_POST['Mail'];

$objeto = new usuarios();
$objeto->setEmail($_POST['Mail']);
$objeto->setPassword($_POST['password']);

// Verificar si es una empresa
$datasetEnterprise = $objeto->getEnterprise();
if ($datasetEnterprise != 'Error' && mysqli_num_rows($datasetEnterprise) == 1) {
    $tupla = mysqli_fetch_assoc($datasetEnterprise);
    echo $_POST['Mail'];
    $_SESSION['start'] = $_POST['Mail']; // Guardar el correo electrónico en la sesión
    $_SESSION['type'] = 3; // 3 para empresa
    include("../data/ingresosYConsultas+.php");
    $myobjecto = new ingresosYConsultas();
    $consulta = $myobjecto->getEnterprise();
    while($tupla = mysqli_fetch_assoc($consulta))
    {
    $_SESSION['code'] = $tupla['code'];
    }
    echo $_SESSION['code'];
    header('Location: ../view/registroEntrada.php');
    exit();
}

// Si las credenciales no son válidas, redirigir al formulario de inicio de sesión con un mensaje de error
header('Location: ../view/loginRegistroPersonal.php?error=1');
exit();
?>
