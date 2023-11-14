<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleados</title>
    <link rel="stylesheet" href="../css/styleMenu.css">
</head>
<body>
    LISTA DE LOS EMPLEADOSM, SE MOSTRARAN TODOS LOS EMPLEADOS, SE PODRAN AÑADIR NUEVOS ASI COMO ELIMINARLOS Y SE PODRA CONSULTAR LA INFORMACION GENERAL DE ESTOS.
    <br><br><br>
    <h1>Agregar empleado jiji </h1>
    <a href="crearEmpleado.php"><img class="perfiles-img" src="../img/perfiles.svg" alt="perfiles"></a>

    <br><br><br>
    <h1>Lista de Usuarios Registrados</h1>
    <table border="1">
      <?php
        include('../app/worker.php');
        $myconsulta = new Worker();
        $dataset = $myconsulta->getAllWorker();
        if ($dataset != "error"){
          while ($tupla = mysqli_fetch_assoc($dataset)){
            echo "<tr>";
            echo "<td>"  . $tupla['name'] . "</td>";
            echo "<td>"  . $tupla['lastName'] . "</td>";
            echo "<td>"  . $tupla['lastName2'] . "</td>";
            echo "<td>"  . $tupla['RFC'] . "</td>";
            echo "<td>"  . $tupla['NSS'] . "</td>";
            echo "<td>"  . $tupla['CURP'] . "</td>";
            echo "<td>"  . $tupla['number'] . "</td>";
            echo "<td>";
            echo "<a href='../app/actualizar.php?id=" . $tupla["code"] . "'>Actualizar</a> | ";
            echo "<a href='eliminar.php?id=" . $tupla["code"] . "'>Eliminar</a>";
            echo "</td>";
            echo "</tr>";
          }
        }
        else{
          echo "algo paso en la consulta";
        }
      ?>
    </table>

</body>
</html>