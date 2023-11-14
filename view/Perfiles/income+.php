<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../../css/income+.css">
</head>
<body>
<header>
    <h1>Ingresos registrados</h1>
</header>
<a href="creacionPerfiles.php" class="regresar-button">Regresar</a>

<br>

<table border="1">
<?php
    include("../../data/ingresosYConsultas+.php");
    session_start();
    $myobject = new ingresosYConsultas;
    $consulta = $myobject->getIncomes();
    if($consulta != 'error')
    {       
        while($tupla = mysqli_fetch_assoc($consulta))
        {   
            echo"<tr>";
            echo"<td>".$tupla['code']."</td>";
            echo"<td>".$tupla['name']."</td>";
            echo"<td>".$tupla['description']."</td>";
            echo"</tr>";
            
        }
    }
?>
</table>

</body>
</html>
