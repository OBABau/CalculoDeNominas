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
            <a href="infoEmpleado.php"><i class="fa fa-user"></i> &nbsp;Información</a>
            <a href="../ayuda.php">&nbsp;<i class="fa fa-info"></i> &nbsp;Ayuda</a>
        </div>

        <form class="sidebarFooter" action="../../app/logout.php" method="post">
            <button class="btnSalir" type="submit">Cerrar Sesion</button>
        </form>
    </div>
    <div class="contenido">
        <h1> Estadisticas </h1>
    <div class="contenidoBody">
            <a class="enlaceCard" href="estadisticas.php">
                <div class="card">
                    <div class="circle-img2">
                        <img src="../../img/iconosfinales/grafica.png" alt="Imagen Grafica">
                    </div>
                    <div class="card-text">
                        <p>Gráficas</p>
                    </div>

                </div>
            </a>
</div>
<br>
<br>
<table class="table table-striped table-hover">
            <?php
                $consulta = mysqli_query("select * from salary where worker = ".$_SESSION['code']);
                $consulta2 = mysqli_query("SELECT sum(sb.total) as total, s.finished from salary_benefits as sb INNER join salary as s on s.code = sb.salary where s.worker = ".$_SESSION['code'];
            );
                $consulta3 = mysqli_query("select * from salary where worker = ".$_SESSION['code']);
                $consulta4 = mysqli_query("select * from salary where worker = ".$_SESSION['code']);
                if($consulta != 'error')
                {       echo'<tr class="font-weight-bold primary table-primary">';
                        echo"<th>Ingreso Anual:</th>";
                        echo "</tr>";

                        echo'<tr class="font-weight-bold primary table-primary">';
                        echo"<th>Ingresos exentos:</th>";
                        echo "</tr>";

                        echo'<tr class="font-weight-bold primary table-primary">';
                        echo"<th>Ingresos Acumulables:</th>";
                        echo "</tr>";

                        echo'<tr class="font-weight-bold primary table-primary">';
                        echo"<th>Subsidio para el empleo:</th>";
                        echo "</tr>";

                        echo'<tr class="font-weight-bold primary table-primary">';
                        echo"<th>Impuesto retenido:</th>";
                        echo "</tr>";
                   
                }
            ?>
        </table>
    </div>
</div>
</body>

</html>