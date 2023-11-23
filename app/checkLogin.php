<?php
session_start();
include('users.php');
echo $_POST['Mail'];

$objeto = new usuarios();
$objeto->setEmail($_POST['Mail']);
$objeto->setPassword($_POST['password']);

// Verificar si es un administrador
$datasetAdmin = $objeto->getAdmin();
if ($datasetAdmin != 'Error' && mysqli_num_rows($datasetAdmin) == 1) {
    $tupla = mysqli_fetch_assoc($datasetAdmin);
    $_SESSION['start'] = $_POST['Mail']; // Guardar el correo electrónico en la sesión
    $_SESSION['type'] = 1; // 1 para administrador
    header('Location: ../iniciado.php');
    exit();
}

// Verificar si es un empleado
$datasetEmployee = $objeto->getEmployee();
if ($datasetEmployee != 'Error' && mysqli_num_rows($datasetEmployee) == 1) {
    $tupla = mysqli_fetch_assoc($datasetEmployee);

    $_SESSION['start'] = $_POST['Mail']; // Guardar el correo electrónico en la sesión
    $_SESSION['type'] = 2; // 2 para empleado

    include('../data/Empleado.php');;
    $empleado = new Empleado();
    $consulta = $empleado->getEmpleado();
    while($tupla = mysqli_fetch_assoc($consulta))
    {
    $_SESSION['code'] = $tupla['code'];
    $_SESSION['userCode'] = $tupla['user'];
    }
    echo $_SESSION['code'];

    header('Location: ../iniciado.php');
    exit();
}

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
    header('Location: ../iniciado.php');
    exit();
}

// Si las credenciales no son válidas, redirigir al formulario de inicio de sesión con un mensaje de error
header('Location: ../view/login.php?error=1');
exit();
?>
