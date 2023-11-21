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

    <title>Info Empleado</title>
</head>

<body>

    <div class="sidebar">
        <div class="headerSidebar">
            <img class="logoImg" src="../../img/img/logo.png" alt="Imagen Logo">
            <div class="tituloSidebar">NÓMINAS</div>
        </div>
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
        <?php
            include('../../data/Empleado.php');
            $empleado = new Empleado();
            // Obtener datos del usuario
            $datosUsuario = $empleado->getUserData($_SESSION['start']);
            $userId = $empleado->setUser($_SESSION['code']);
            $datosEmpleado = $empleado->obtenerDatosEmpleado();
        ?>

        <h1>Información de la Cuenta del Empleado</h1>

        <h2>Datos del Usuario</h2>
        <table class="table table-striped table-hover">
            <tr class="font-weight-bold primary table-primary">
                <th>Email</th>
                <th>Password</th>
            </tr>
            <tr>
                <td>
                    <?php echo $datosUsuario['email']; ?>
                </td>
                <td>
                    <?php echo $datosUsuario['password']; ?>
                </td>
            </tr>
        </table>

        <h2>Datos de la Empresa</h2>
        <table class="table table-striped table-hover">
            <tr class="font-weight-bold primary table-primary">
                <th>Nombre</th>
                <th>Apellido paterno</th>
                <th>Apellido materno</th>
                <th>RFC</th>
                <th>NSS</th>
                <th>CURP</th>
                <th>Numero</th>
                <th>Fecha de entrada</th>
            </tr>
            <?php while ($tupla = mysqli_fetch_assoc($datosEmpleado)) {?>
            <tr>
                <td>
                    <?php echo $tupla['name']; ?>
                </td>
                <td>
                    <?php echo $tupla['lastName']; ?>
                </td>
                <td>
                    <?php echo $tupla['lastName2']; ?>
                </td>
                <td>
                    <?php echo $tupla['RFC']; ?>
                </td>
                <td>
                    <?php echo $tupla['NSS']; ?>
                </td>
                <td>
                    <?php echo $tupla['CURP']; ?>
                </td>
                <td>
                    <?php echo $tupla['number']; ?>
                </td>
                <td>
                    <?php echo $tupla['entryDate']; ?>
                </td>
            </tr>
            <?php } ?>

        </table>
    </div>
</body>

</html>