<html>

<head>Perfiles</head>
<?php
include("../../data/ingresosYConsultas+.php");
session_start();
$myobject = new ingresosYConsultas;
$consulta = $myobject->getProfiles();
if($consulta != 'error')
{       
    while($tupla = mysqli_fetch_assoc($consulta))
    {   
        $consulta2 = $myobject->getIncomes();
        echo "<table border = 1>";
        echo "<tr>";
        echo "<td>".$tupla['code']."</td>";
        echo "<td>".$tupla['name']."</td>";
        echo "<td>".$tupla['description']."</td>";
        echo '</tr>';
        echo "</table>";
        
?>
<form method = "POST" action = "pruebasPerfiles.php">
<?php
$cont =1;
            while ($tupla2 = mysqli_fetch_assoc($consulta2)){
            echo '<label>
            <input type= "checkbox" id = "ingresos" name = '.$tupla['code'].'[] value = "'.$tupla2['name'].'"> '.$tupla2['name'].'
            </label>';
            $cont++;
            }
        }
    }
?>
<button type = "submit" name  = "Enviar">Enviar</button>
</html>