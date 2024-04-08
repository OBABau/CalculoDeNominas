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
    <link rel="stylesheet" href="../css/gwen.css">

    <link rel="icon" type="image/x-icon" href="../img/img/logo.png">

    <title>Edicion Prestaciones</title>
</head>

<body>

    <div class="sidebar">
        <div class="headerSidebar">
            <img class="logoImg" src="../img/img/logo.png" alt="Imagen Logo">
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
            <a href="../iniciado.php"><i class="fa fa-home"></i> &nbsp;Inicio</a>
            <a href="confirmarAsistencia.php"><i class="fa fa-arrow-left"></i> &nbsp;Regresar</a>
            <a href="../view/ayuda.php">&nbsp;<i class="fa fa-info"></i> &nbsp;Ayuda</a>
        </div>

        <form class="sidebarFooter" action="../app/logout.php" method="post">
            <button class="btnSalir" type="submit">Cerrar Sesion</button>
        </form>
    </div>

    <div class = 'contenido'>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
            $id = $_GET["id"];
            $_SESSION['idAsistencia'] = $id;
            $nombre = $_GET["nombre"];
            $apellido1 = $_GET["apellido1"];
            $apellido2 = $_GET["apellido2"];
        }
        
        echo "<h1>Registro de asistencia de $nombre $apellido1 $apellido2 <h1>";?>
        <br>
        <h2>Asistencia registrada por Checador</h2>
        <table class="table table-striped table-hover">
            <tr class="font-weight-bold primary table-primary">
                <th>Dias Trabajados</th>
                <th>Retardos</th>
                <th>Trabajo Domingo</th>
                <th>Modificar</th>
            </tr>
        <?php
        include ("../data/Empleado.php");
        $empleado = new Empleado();
            $consulta = $empleado->getCheckerInfo($id);
            if($tupla = mysqli_fetch_assoc($consulta))
            {
                echo "<td>" . $tupla['checkerDays'] . "</td>";
                echo "<td>" . $tupla['tardies'] . "</td>";
                echo "<td>" . $tupla['sunday'] . "</td>";
                echo "<td>";
                echo "<a href='checkerModifies.php'>Modificar</a>";
                echo "</td>";
            }

        ?>
        </table>
        <br>
        <h2>Asistencia registrada manualmente</h2>

        <table class="table table-striped table-hover">
            <tr class="font-weight-bold primary table-primary">
                <th></th>
                <th>Lunes</th>
                <th>Martes</th>
                <th>Miercoles</th>
                <th>Jueves</th>
                <th>Viernes</th>
                <th>Sabado</th>
                <th>Domingo</th>
                <th>Modificar</th>
            </tr>
            
            <tr>
                <th>Entrada</th>
            <?php
                 $consulta = $empleado->getWeekInfo($id);
                    if($tupla = mysqli_fetch_assoc($consulta))
                    {
                        echo "<td>" . $tupla['mondayEntry'] . "</td>";
                        echo "<td>" . $tupla['tuesdayEntry'] . "</td>";
                        echo "<td>" . $tupla['wednesdayEntry'] . "</td>";
                        echo "<td>" . $tupla['thursdayEntry'] . "</td>";
                        echo "<td>" . $tupla['fridayEntry'] . "</td>";
                        echo "<td>" . $tupla['saturdayEntry'] . "</td>";
                        echo "<td>" . $tupla['sundayEntry'] . "</td>";
                        echo "<td>";
                        echo "<a href='weekInfoModifiesEntry.php'>Modificar</a>";
                        echo "</td>";
                    }
            ?>
            </tr>

            <tr>
                <th>Salida</th>
            <?php
                 $consulta = $empleado->getWeekInfo($id);
                    if($tupla = mysqli_fetch_assoc($consulta))
                    {
                        echo "<td>" . $tupla['mondayExit'] . "</td>";
                        echo "<td>" . $tupla['tuesdayExit'] . "</td>";
                        echo "<td>" . $tupla['wednesdayExit'] . "</td>";
                        echo "<td>" . $tupla['thursdayExit'] . "</td>";
                        echo "<td>" . $tupla['fridayExit'] . "</td>";
                        echo "<td>" . $tupla['saturdayExit'] . "</td>";
                        echo "<td>" . $tupla['sundayExit'] . "</td>";
                        echo "<td>";
                        echo "<a href='weekInfoModifiesExit.php'>Modificar</a>";
                        echo "</td>";
                    }
            ?>
            </tr>

    </div>

</body>
