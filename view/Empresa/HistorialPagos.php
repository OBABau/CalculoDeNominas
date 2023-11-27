<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">    
    <link rel="stylesheet" href="../../css/gwen.css">

    <link rel="icon" type="image/x-icon" href="../../img/img/logo.png">

    <title>Historial de Pagos</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: #333;
        }
        .contenido {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top:3rem;
            margin-left: 35%;
            margin-right: 10rem;
            padding: 2rem;
        }

        h3 {
            text-align: center;
            color: #333;
        }
        hr {
            margin: 20px 0;
            border: 0;
            border-top: 1px solid #ddd;
        }
        .info {
            font-size: 18px;
            margin-bottom: 10px;
        }
        .percepciones-deducciones {
            margin-top: 20px;
        }
        .total {
            margin-top: 20px;
            font-size: 20px;
            font-weight: bold;
        }
        </style>
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
                    echo $_SESSION['code']; 
                ?> 
        </div>
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
        <?php
        include ('../../data/Empresa.php');
        $empresa = new empresa();
        $consulta = $empresa->getSalaryExpenses();
        echo "<h2>HISTORIAL DE PAGOS</h2>";
        echo '<table class="table table-striped table-hover">';
        while($tupla = mysqli_fetch_assoc($consulta))
        {
            echo "<table class=\"table table-striped table-hover\">";
                   echo "<tr class=\"font-weight-bold primary table-primary\">";
                   echo "<th>Gastos en sueldo  </th>";
                   echo "<th>Gastos en prestaciones  </th>";
                   echo "<th> Fecha</th>";
                   echo "</tr>";
            echo "<td>".$tupla['total']."</td>";
            $consulta2 = $empresa->getBenefitsExpenses();
            $YOR = 0;
            while ($tupla2 = mysqli_fetch_assoc($consulta2))
            {
                
            if($tupla['finished'] == $tupla2['finished']){
            echo "<td>".$tupla2['total']."</td>";
            $YOR = 1;
            }
        }
           
            if($YOR = 1)
            {
            echo "<td>".$tupla['payDate']."</td>";
            $YOR = 0;
            }else
            {
                echo "<td>0</td>";
                echo "<td>".$tupla['payDate']."</td>";
            }
            $YOR=0;
        }
    
        
        ?>
        
    </div>
</body>

</html>