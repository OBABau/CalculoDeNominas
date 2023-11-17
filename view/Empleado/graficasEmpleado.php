<?php 
include('../../data/conexionDB.php');
//include('../../app/sesion.php');
include('../Perfiles/profile+.php');

if (!isset($_SESSION['redirected'])) {
  header("Location: graficasEmpleado.php");
  exit(); // Agrega exit() después de la redirección para detener la ejecución del script
}

$userID = isset($_SESSION['code']) ? $_SESSION['code'] : null; // Verifica si 'code' está definido en $_SESSION
if (!$userID) {
  echo "Error: 'code' no está definido en la sesión.";
  exit();
}

$query = "SELECT MONTH(payDate) as month, SUM(total) as totalIncome
          FROM SALARY
          WHERE worker = ".$_SESSION['code']."
          GROUP BY MONTH(payDate)";
          echo $query;
          echo $_SESSION['code'];
$conexionDB = new ConexionDB(); // Crear una instancia de la clase ConexionDB
$conexion = $conexionDB->connect(); // Usa la instancia para conectarte a la base de datos
$consulta = mysqli_query($conexion, $query);

?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([  
          ['Month', 'Total Income'],
          <?php
          while ($resultado = mysqli_fetch_assoc($consulta)) {
            echo "['".$resultado['month']."',".$resultado['totalIncome']."],";
          }
          ?>
        ]);

        var options = {
          title: 'Monthly Total Income'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>