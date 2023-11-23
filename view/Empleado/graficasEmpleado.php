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
$consultaYearly = $empleado->getDataByYear(); // Agregado

if ($consulta === "error" || $consultaYearly === "error") {
    echo "Error al obtener datos.";
} else {
    ?>
    <html>
    <head>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawCharts);

            function drawCharts() {
                // Gráfica mensual
                var dataMonthly = google.visualization.arrayToDataTable([  
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

                var optionsMonthly = {
                    title: 'Ingreso total mensual'
                };

                var chartMonthly = new google.visualization.PieChart(document.getElementById('piechartMonthly'));
                chartMonthly.draw(dataMonthly, optionsMonthly);

                // Gráfica anual
                var dataYearly = google.visualization.arrayToDataTable([  
                    ['Year', 'Total Income'],
                    <?php
                    while ($resultadoYearly = mysqli_fetch_assoc($consultaYearly)) {
                        $year = $resultadoYearly['year'];
                        echo "['" . $year . "'," . $resultadoYearly['totalIncome'] . "],";
                    }
                    ?>
                ]);

                var optionsYearly = {
                    title: 'Ingreso total anual'
                };

                var chartYearly = new google.visualization.PieChart(document.getElementById('piechartYearly'));
                chartYearly.draw(dataYearly, optionsYearly);
            }
        </script>
    </head>
    <body>
        <div id="piechartMonthly" style="width: 900px; height: 500px;"></div>
        <div id="piechartYearly" style="width: 900px; height: 500px;"></div>
    </body>
    </html>
    <?php
}
?>
