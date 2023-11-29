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

    <title>Informacion de la Cuenta de la Empresa</title>
</head>

<body>

    <div class="sidebar">
        <div class="headerSidebar">
            <img class="logoImg" src="../../img/img/logo.png" alt="Imagen Logo">
            <div class="tituloSidebar">NÓMINAS</div>
        </div>
        <hr>
        <div class="sidebarContent">                
            <a href="loginEmpresa.php"><i class="fa fa-arrow-left"></i> &nbsp;Regresar</a>
            <a href="../ayuda.php">&nbsp;<i class="fa fa-info"></i> &nbsp;Ayuda</a>
        </div>
        <form class="sidebarFooter" action="../../app/logout.php" method="post">
            <button class="btnSalir" type="submit">Cerrar Sesion</button>
        </form>
    </div>

    <div class="contenido">
        <?php
            include('../../data/Empresa.php');
            session_start();
            $empresa = new Empresa();

            // Obtener datos del usuario
            $datosUsuario = $empresa->getUserData($_SESSION['start']);
            $userId = $empresa->getUser();
            $datosEmpresa = $empresa->obtenerDatosEmpresa($_SESSION['start']);

            ?>

        <h1>Informacion de la Cuenta de la Empresa</h1>
        <hr>
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
                <th>Dirección</th>
                <th>Código Postal</th>
                <th>Ciudad</th>
                <th>Estado</th>
            </tr>
            <?php if ($datosEmpresa): ?>
            <tr>
                <td>
                    <?php echo $datosEmpresa['name']; ?>
                </td>
                <td>
                    <?php echo $datosEmpresa['addressDesc']; ?>
                </td>
                <td>
                    <?php echo $datosEmpresa['CP']; ?>
                </td>
                <td>
                    <?php echo $datosEmpresa['city']; ?>
                </td>
                <td>
                    <?php echo $datosEmpresa['state']; ?>
                </td>
            </tr>
            <?php else: ?>
            <tr>
                <td colspan="5">No se encontraron datos de la empresa.</td>
            </tr>
            <?php endif; ?>
        </table>

    </div>
</body>

</html>