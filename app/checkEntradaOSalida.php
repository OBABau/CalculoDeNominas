<?php
session_start();
include('../data/Empleado.php');
$empleado = new Empleado();
    $consulta = $empleado->getEmpleadoEntry($_POST['Mail']);
    while($tupla = mysqli_fetch_assoc($consulta))
    {
    $_SESSION['codeRegistro'] = $tupla['code'];

    }
    echo $_SESSION['codeRegistro'];

    $data = $empleado->getEmpleadoData($_SESSION['codeRegistro']);
    while($tupla = mysqli_fetch_assoc($data))
    {
        echo"sexo";
        $empleado->entryInsert($tupla['code'],$tupla['enterprise'],$tupla['profile']);
    }
    
    $hoy = date("w");

    // Verificar si el día actual es domingo
    if ($hoy == 0) {
        $empleado->entryInsertSunday();
    } else {
        echo "Hoy no es domingo.";
    }
 header("location: ../view/registroEntrada.php");


?>