<html>

<head>Perfiles</head>
<?php
include("../../data/ingresosYConsultas+.php");
session_start();
$myobject = new ingresosYConsultas();
$consulta = $myobject->getProfiles();
$perfil = new ingresosYConsultas();
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
        echo "Ingresos";
        echo "<br>";
        while ($tupla2 = mysqli_fetch_assoc($consulta2))
        {
            $checked = $perfil->setCheckboxes($tupla2['code'],$tupla['code'], "incomes");
            if($checked)
            {
            echo '<label>
            <input type= "checkbox" id = "ingresos" name = '.$tupla['code'].'[] value = "'.$tupla2['name'].'" checked > '.$tupla2['name'].'
            </label>';
            }
            else
            {
                echo '<label>
            <input type= "checkbox" id = "ingresos" name = '.$tupla['code'].'[] value = "'.$tupla2['name'].'" > '.$tupla2['name'].'
            </label>';
            }
        }
        echo "<br>";
        echo "Prestaciones";
        echo "<br>";

        $consulta2 = $myobject->getBenefits();
        while ($tupla2 = mysqli_fetch_assoc($consulta2)){
            $checked = $perfil->setCheckboxes($tupla2['code'],$tupla['code'], "benefits");
            if($checked)
            {
            echo '<label>
            <input type= "checkbox" id = "ingresos" name = '.$tupla['code'].'[] value = "'.$tupla2['name'].'" checked > '.$tupla2['name'].'
            </label>';
            }
            else
            {
                echo '<label>
            <input type= "checkbox" id = "ingresos" name = '.$tupla['code'].'[] value = "'.$tupla2['name'].'" > '.$tupla2['name'].'
            </label>';
            }
        }
        }
    }

    
            ?>
    <button type = "submit" name  = "Enviar">Enviar</button>
</body>
