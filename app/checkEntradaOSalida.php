<?php
session_start();
include('../data/Empleado.php');
include('../data/users.php');
$empleado = new Empleado();
$objeto = new usuarios();
$objeto->setEmail($_POST['Mail']);
$objeto->setPassword($_POST['password']);

$datasetEmployee = $objeto->getEmployee();
if ($datasetEmployee != 'Error' && mysqli_num_rows($datasetEmployee) == 1){


    $consulta = $empleado->getEmpleadoEntry($_POST['Mail']);
    while($tupla = mysqli_fetch_assoc($consulta))
    {
    $_SESSION['codeRegistro'] = $tupla['code'];

    }
    //echo $_SESSION['codeRegistro'];

    $data = $empleado->getEmpleadoData($_SESSION['codeRegistro']);
    while($tupla = mysqli_fetch_assoc($data))
    {
        echo"sexo";
        $empleado->entryInsert($tupla['code']);
    }
    
    $hoy = date("w");

    // Verificar si el día actual es domingo
    if ($hoy == 0) {
        $empleado->entryInsertSunday();
    } else {
        echo "Hoy no es domingo.";
    }
    header("location: ../view/registroEntrada.php?mensaje=Chequeo correcto.");
}else
{
    header('Location: ../view/registroEntrada.php?error=1');
}
 


?>