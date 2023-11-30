<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/gwen.css">

    <link rel="icon" type="image/x-icon" href="../../img/img/logo.png">

    <title>Menú de Opciones.</title>

</head>

<body>
    
    <div class="sidebar">
        <div class="headerSidebar">
            <img class="logoImg" src="../../img/img/logo.png" alt="Imagen Logo">
            <div class="tituloSidebar">NÓMINAS</div>
        </div>
        <hr>
            <div class="bienvenidoSideBar">
            <?php
                    session_start();
                    echo "Bienvenido: ";
                    echo $_SESSION['start'];
                ?>
            </div>
        <div class="sidebarContent">                
            <a href="../../iniciado.php"><i class="fa fa-home"></i> &nbsp;Inicio</a>
            <a href="loginEmpleado.php"><i class="fa fa-arrow-left"></i> &nbsp;Regresar</a>
            <a href="../ayuda.php">&nbsp;<i class="fa fa-info"></i> &nbsp;Ayuda</a>
        </div>

        <form class="sidebarFooter" action="../../app/logout.php" method="post">
            <button class="btnSalir" type="submit">Cerrar Sesion</button>
        </form>
    </div>
    <div class="contenido">
        <h1> Estadisticas </h1>
    <div class="contenidoBody">
            <a class="enlaceCard" href="graficasEmpleado.php">
                <div class="card">
                    <div class="circle-img2">
                        <img src="../../img/iconosfinales/grafico.png" alt="Imagen Grafica">
                    </div>
                    <div class="card-text">
                        <p>Gráficas</p>
                    </div>

                </div>
            </a>
</div>


<br>
<br>
<div class = "contenidoBody">
<table class="table table-striped table-hover">
            <?php
                include ('../../data/empleado.php');
                $empleado = new Empleado();
                $subsidioTotal = 0;
                $totalISR = 0;
                $totalExentos = 0;
                $ingresoA = 0;
                $consulta = $empleado->getEmpleadoSalaryAll($_SESSION['code']);
                while($tupla = mysqli_fetch_assoc($consulta)){
                $consulta2 = $empleado->getEmpleadoSalary_Benefits($_SESSION['code']);
                while($tupla2 = mysqli_fetch_assoc($consulta2)){
                    $consulta4 = $empleado->getEmpleadoProfile($tupla['profile']);
                    while ($tupla4 = mysqli_fetch_assoc($consulta4))
                    {
                        
                $ingresoA += $tupla2['total'] + $tupla['total'];
                if($consulta != 'error')
                {       
                //------------------------------------------------------------------------------------------------------
                $consulta5 = $empleado->getBenefits($tupla['code']);
                $totalBenefits = 0;
                while ($tupla5 = mysqli_fetch_assoc($consulta5))
                {
                    $totalBenefits +=$tupla5['total'];
                    //echo $tupla5['name'].": $".$tupla5['total'];
                    //echo "<br>";
                }
                $totalGravable = 0;
                $totalGravable += $totalBenefits;
                $totalGravable += $tupla['total'];
                $totalGravable += $tupla['total']/6;
                if($totalGravable <= 0)
                {
                    $subsidio = 0;
                } else if ($totalGravable <= 407.33)
                {
                    $subsidio = 93.73;

                }else if ($totalGravable <= 610.96)
                {
                    $subsidio = 93.66;

                }else if ($totalGravable <= 799.68)
                {
                    $subsidio = 93.66;

                }else if ($totalGravable <= 814.66)
                {
                    $subsidio = 90.44;

                }else if ($totalGravable <= 1023.75)
                {
                    $subsidio = 88.06;

                }else if ($totalGravable <= 1086.19)
                {
                   $subsidio = 81.55;

                }else if ($totalGravable <= 1228.57)
                {
                    $subsidio = 74.83;

                }else if ($totalGravable <= 1433.32)
                {
                    $subsidio = 67.83;
                }else if ($totalGravable <= 1638.07)
                {
                    $subsidio = 58.38;

                }else if ($totalGravable <= 1699.88)
                {
                   $subsidio = 50.12;
                }else
                {
                    $subsidio = 0;
                }
                //------------------------------------------------------------------------------------------
                if ($tupla['sunday'] == 1)
                {
                    //echo "Prima dominical: ".$tupla4['income']/2;
                    $totalP += $tupla4['income']/2;
                    $totalGravable += $tupla4['income']/2;
                    //echo "<br>";
                    $totalExentos += $tupla4['income']/2;
                }
                //echo "<br>";
                //echo '<hr class="guion-under" style="border: none; height: 1px; color: #000; background-color: #000; margin: 0px; padding: 0px;">';
                //echo "<br>";
                //echo "<h5>Deducciones</h5>";
                $totalD = 0; 
                if ($totalGravable <= 0)
                {
                    
                    $ISR = 0;
                }else if ($totalGravable <= 171.78)
                {
                    $diferencia = $totalGravable - 0.01;
                    $impuestoMarginal = $diferencia*0.0192;
                    $ISR = $impuestoMarginal + 0;

                }else if ($totalGravable <= 1458.03)
                {
                    $diferencia = $totalGravable - 171.79;
                    $impuestoMarginal = $diferencia*0.064;
                    $ISR = $impuestoMarginal + 3.29;

                }else if ($totalGravable <= 2562.35)
                {
                    $diferencia = $totalGravable - 1458.04;
                    $impuestoMarginal = $diferencia*0.1088;
                    $ISR = $impuestoMarginal + 85.61;

                }else if ($totalGravable <= 2978.64)
                {
                    $diferencia = $totalGravable - 2562.36;
                    $impuestoMarginal = $diferencia*0.16;
                    $ISR = $impuestoMarginal + 105.80;

                }else if ($totalGravable <= 3566.22)
                {
                    $diferencia = $totalGravable - 2978.65;
                    $impuestoMarginal = $diferencia*0.1792;
                    $ISR = $impuestoMarginal + 272.37;

                }else if ($totalGravable <= 7192.64)
                {
                    $diferencia = $totalGravable - 3566.23;
                    $impuestoMarginal = $diferencia*0.2136;
                    $ISR = $impuestoMarginal + 377.65;

                }else if ($totalGravable <= 11336.57)
                {
                    $diferencia = $totalGravable - 7192.65;
                    $impuestoMarginal = $diferencia*0.2352;
                    $ISR = $impuestoMarginal + 1152.27;

                }else if ($totalGravable <= 21643.30)
                {
                    $diferencia = $totalGravable - 11336.58;
                    $impuestoMarginal = $diferencia*0.30;
                    $ISR = $impuestoMarginal + 2126.95;

                }else if ($totalGravable <= 28857.78)
                {
                    $diferencia = $totalGravable - 21643.31;
                    $impuestoMarginal = $diferencia*0.32;
                    $ISR = $impuestoMarginal + 5218.92;

                }else if ($totalGravable <= 86573.34)
                {
                    $diferencia = $totalGravable - 28857.79;
                    $impuestoMarginal = $diferencia*0.34;
                    $ISR = $impuestoMarginal + 7527.59;

                }else
                {
                    $diferencia = $totalGravable - 86573.35;
                    $impuestoMarginal = $diferencia*0.35;
                    $ISR = $impuestoMarginal + 27150.83;
                }

                //echo "ISR: $".$ISR;
                //echo "Subsidio para el empleo: $".$subsidio;
                $totalISR += $ISR;
                $subsidioTotal += $subsidio;
                        
                   
                }
            }}}
            
                       
                        echo'<tr class="font-weight-bold primary table-primary">';
                        echo"<th>Ingreso Anual: $ ".number_format($ingresoA , 3)."</th>";
                        echo "</tr>";

                        echo'<tr class="font-weight-bold primary table-primary">';
                        echo"<th>Ingresos exentos: $ ".number_format($totalExentos , 3)."</th>";
                        echo "</tr>";

                        echo'<tr class="font-weight-bold primary table-primary">';
                        echo"<th>Ingresos Acumulables: $ ".number_format($ingresoA - $totalISR , 3)."</th>";
                        echo "</tr>";

                        echo'<tr class="font-weight-bold primary table-primary">';
                        echo"<th>Subsidio para el empleo: $ ".number_format($subsidioTotal, 3)."</th>";
                        echo "</tr>";

                        echo'<tr class="font-weight-bold primary table-primary">';
                        echo"<th>Impuesto retenido: $ ".number_format($totalISR , 3)."</th>";
                        echo "</tr>";
            ?>
        </table>
    </div>
</div>
</body>

</html>