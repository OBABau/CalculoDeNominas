<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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

        <div class="sidebarContent">
            <a href="../../iniciado.php"><i class="fa fa-home"></i> &nbsp;Inicio</a>
            <a href="../loginAdmin.php"><i class="fa fa-user"></i> &nbsp;Regresar</a>
        </div>

        <form class="sidebarFooter" action="../../app/logout.php" method="post">
            <button class="btnSalir" type="submit">Cerrar Sesion</button>
        </form>
    </div>

    <div class="contenido">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Descripcion</th>
                    <!-- Agrega más encabezados según sea necesario -->
                </tr>
            </thead>
            <tbody>
                <?php
                include('../../app/FAQ.php');
                $instancia = new FAQs();
                $result = $instancia->getFAQs();
                if ($result == "error") {
                    echo "<tr><td colspan='4'>No hay nada para mostrar</td></tr>";
                } else {
                    while ($tupla = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $tupla['code'] . "</td>";
                        echo "<td>" . $tupla['Titulo'] . "</td>";
                        echo "<td>" . $tupla['Correo'] . "</td>";
                        echo "<td>" . $tupla['Descripcion'] . "</td>";
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
    
</html>
