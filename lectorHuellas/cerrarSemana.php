<?php
session_start();

include("../data/Empleado.php");
include('../data/Worker.php');
$empleado = new Empleado();
$myconsulta = new Worker();


$datasetWorkersWithUsers = $myconsulta->getAllWorkerWithUsers();
while($tupla2 = mysqli_fetch_assoc($datasetWorkersWithUsers))
{
$consulta = $empleado->getWeekInfo($tupla2['code']);
$days = 0;
while($tupla = mysqli_fetch_assoc($consulta))
{
    for ($i = 1; $i <=7; $i++)
    {
        if($i == 1)
        {
            $dia = "monday";
        }else if($i == 2)
        {
            $dia = "tuesday";
        }else if($i == 3)
        {
            $dia = "wednesday";
        }else if($i == 4)
        {
            $dia = "thursday";
        }else if($i == 5)
        {
            $dia = "friday";
        }else if($i == 6)
        {
            $dia = "saturday";
        }else if($i == 7)
        {
            $dia = "sunday";
        }

        if ($tupla[$dia.'Entry'] != null && $tupla[$dia.'Entry'] != '00:00:00' && $tupla[$dia.'Exit'] != null && $tupla[$dia.'Exit'] != '00:00:00')
        {
            $days += 1;
        }
    }
    echo "<br>";
    

}

}
$empleado->closeWeek($days, $tupla2['code'], $_SESSION['code']);
header('location: confirmarAsistencia.php?mensaje=Se registro exitosamente la asistencia de tus empleados');
?>