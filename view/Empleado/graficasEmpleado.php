<?php
include('../../data/conexionDB.php');
include('../Perfiles/profileGraphics.php');
include('../../data/empleado.php');

if (!isset($_SESSION['redirected'])) {
    header("Location: graficasEmpleado.php");
    exit();
}

$userID = isset($_SESSION['code']) ? $_SESSION['code'] : null;
if (!$userID) {
    echo "Error: 'code' no está definido en la sesión.";
    exit();
}

$empleado = new Empleado();
$consulta = $empleado->getData();

if ($consulta === "error") {
    echo "Error al obtener datos.";
} else {
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
                $monthNames = [
                    1 => 'Enero',
                    2 => 'Febrero',
                    3 => 'Marzo',
                    4 => 'Abril',
                    5 => 'Mayo',
                    6 => 'Junio',
                    7 => 'Julio',
                    8 => 'Agosto',
                    9 => 'Septiembre',
                    10 => 'Octubre',
                    11 => 'Noviembre',
                    12 => 'Diciembre',
                ];

                while ($resultado = mysqli_fetch_assoc($consulta)) {
                    $month = $monthNames[$resultado['month']];
                    $year = $resultado['year'];
                    $label = "$month $year";
                    echo "['" . $label . "'," . $resultado['totalIncome'] . "],";
                }
                ?>
            ]);

            var options = {
                title: 'Ingreso total mensual'
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
    <?php
}
?>
