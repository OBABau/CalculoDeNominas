<?php
include('../../data/Empresa.php'); 
session_start();

if (!isset($_SESSION['start'])) {
    header("Location: ../../iniciado.php");
    exit();
}

$empresa = new Empresa();
$userCode = $empresa->getUser();

if (!$userCode) {
    echo "Error al obtener el código del usuario.";
    exit();
}

$consultaTotalAll = $empresa->getDataByTotalAll($userCode);
$consultaByMonth = $empresa->getDataByMonth($userCode);
$consultaByYear = $empresa->getDataByYear($userCode);

$resultado = mysqli_fetch_assoc($consultaTotalAll);

if ($consultaTotalAll === false || $consultaByMonth === false || $consultaByYear === false) {
    echo "Error al obtener datos.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">    
    <link rel="stylesheet" href="../../css/gwen.css">

    <link rel="icon" type="image/x-icon" href="../../img/img/logo.png">

    <title>Estadísticas de la Empresa</title>
    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            // Gráfico para gastos mensuales
            var dataMonth = new google.visualization.DataTable();
            dataMonth.addColumn('string', 'Mes');
            dataMonth.addColumn('number', 'Total Mes');

            <?php while ($row = mysqli_fetch_assoc($consultaByMonth)): ?>
                dataMonth.addRow(['<?php echo $row['mes'] . " " . $row['anio']; ?>', <?php echo $row['totalMes']; ?>]);
            <?php endwhile; ?>

            var optionsMonth = {
                title: 'Gastos en sueldo base mensuales de la empresa',
                legend: { position: 'none' },
            };

            var chartMonth = new google.visualization.ColumnChart(document.getElementById('chart_div_month'));
            chartMonth.draw(dataMonth, optionsMonth);

            // Gráfico para gastos anuales
            var dataYear = new google.visualization.DataTable();
            dataYear.addColumn('string', 'Año');
            dataYear.addColumn('number', 'Total Año');
                
            <?php while ($row = mysqli_fetch_assoc($consultaByYear)): ?>
                dataYear.addRow(['<?php echo $row['anio']; ?>', <?php echo $row['totalAnio']; ?>]);
            <?php endwhile; ?>

            var optionsYear = {
                title: 'Gastos en sueldo base anuales de la empresa',
                legend: { position: 'none' },
            };

            var chartYear = new google.visualization.ColumnChart(document.getElementById('chart_div_year'));
            chartYear.draw(dataYear, optionsYear);
        }
    </script>
</head>

<body>
    <div class="sidebar">
        <div class="headerSidebar">
            <img class="logoImg" src="../../img/img/logo.png" alt="Imagen Logo">
            <div class="tituloSidebar">NÓMINAS</div>
        </div>
        <hr>
        <div class="bienvenidoSideBar">
            <?php echo "Bienvenido: " . $_SESSION['start']; ?> 
        </div>
        <hr>
        <div class="sidebarContent">
            <a href="../../iniciado.php"><i class="fa fa-home"></i> &nbsp;Inicio</a>
            <a href="loginEmpresa.php"><i class="fa fa-arrow-left"></i> &nbsp;Regresar</a>
            <a href="../ayuda.php">&nbsp;<i class="fa fa-info"></i> &nbsp;Ayuda</a>
        </div>
        <form class="text-center" action="../../app/logout.php" method="post">
            <button class="btnSalir2" type="submit">Cerrar Sesion</button>
        </form>
    </div>

    <div class="contenido">
        <h2>Estadísticas de la Empresa</h2>

        <div class="formRow">
            <p>Total de gastos de la empresa (Todos los tiempos): $<?php echo $resultado['totalSum']; ?> </p>
        </div>
        <hr>
        <br>
        <p>Gastos de la empresa por mes:</p>
        <div id="chart_div_month" style="width: 900px; height: 500px;"></div>
        
        <br>
        <p>Gastos de la empresa por año:</p>
        <div id="chart_div_year" style="width: 900px; height: 500px;"></div>
    </div>
</body>

</html>
