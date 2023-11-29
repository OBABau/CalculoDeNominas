<?php
include('../../data/empresa.php'); 
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

$dataset = $empresa->getEnterpriseFromUser();
$row = mysqli_fetch_assoc($dataset);
$enterpriseCode = $row['enterprise'];

$consultaBeneficios = $empresa->getTotalBenefitsAmount($enterpriseCode);
$resultadoBeneficios = mysqli_fetch_assoc($consultaBeneficios);
$totalBeneficios = number_format($resultadoBeneficios['totalAmount'], 2); // Redondear a 2 decimales

$consultaTotalAll = $empresa->getDataByTotalAll($userCode);
$resultado = mysqli_fetch_assoc($consultaTotalAll);
$totalCostoNomina = number_format($resultado['totalSum'], 2); // Redondear a 2 decimales

$sumaSalariosbase = $empresa->getTotalProfileSalarys($enterpriseCode);
$resultadosalarios = mysqli_fetch_assoc($sumaSalariosbase);
$totalsalarios = number_format($resultadosalarios['totalSalary'], 2); // Redondear a 2 decimales


$porcentajeISN = 0.0180; 
$totalsalarios = $resultadosalarios['totalSalary'];
$subtotalISN = $totalsalarios * $porcentajeISN;
$totalISN = number_format($subtotalISN, 2); 
?>


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

    <title>Estadisticas de Empresa</title>
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
            <a href="loginEmpresa.php"><i class="fa fa-arrow-left"></i> &nbsp;Regresar</a>
            <a href="../ayuda.php">&nbsp;<i class="fa fa-info"></i> &nbsp;Ayuda</a>
        </div>
        <form class="text-center" action="../../app/logout.php" method="post">
            <button class="btnSalir2" type="submit">Cerrar Sesion</button>
    </div>
        <div class="contenido">
        <h2>Estadísticas de la Empresa</h2>

        <div class="formRow">
            <p>Costo total de nomina: $<?php echo $totalCostoNomina; ?> </p>
            <hr>
            <h2>Distribución de costes de nomina</h2>
            <p>Total de beneficios para la empresa: $<?php echo $totalBeneficios; ?></p>
            <p>Suma de salarios base de todos los perfiles: $<?php echo $totalsalarios?></p>
            <p>Porcentaje ISN: <?php echo $porcentajeISN?> % </p>
            <p>Subtotal ISN: $<?php echo  $subtotalISN?></p>
            <p>ISN (Suma del salario base de los perfiles): $<?php echo $totalISN?></p>
         
            

        </div>
        </div>
</body>

</html>