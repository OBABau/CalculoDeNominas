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

    <title>Lista Empleados</title>
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
            <a href="../Empresa/loginEmpresa.php"><i class="fa fa-arrow-left"></i> &nbsp;Regresar</a>
            <a href="../ayuda.php">&nbsp;<i class="fa fa-info"></i> &nbsp;Ayuda</a>
        </div>

        <form class="sidebarFooter" action="../../app/logout.php" method="post">
            <button class="btnSalir" type="submit">Cerrar Sesion</button>
        </form>
    </div>

    <div class="contenido2">
        <h2>Agregar un Empleado Nuevo</h2>
        <h6 style='color: red;'>RECUERDA CREAR PERFILES ANTES DE INGRESAR A TUS EMPLEADOS</h6>

        <div class="contenidoBody mx-auto">
            <a class="enlaceCard" href="crearEmpleado.php">
                <div class="card">
                    <div class="circle-img2">
                        <img src="../../img/iconosfinales/añadirusuario.png" alt="Imagen Perfiles">
                    </div>
                    <div class="card-text">
                        <p>Agregar Empleado</p>
                    </div>

                </div>
            </a>
        </div>
        <br>

        <h1>Lista de Usuarios Registrados</h1>
    <table class="table table-striped table-hover">
        <?php
        $url =('../../data/json/worker.json');
        $json = file_get_contents($url);
        $array = json_decode($json, true);
            echo '<tr class="font-weight-bold primary table-primary">';
            echo '<th>Nombre</th>';
            echo '<th>Apellido Paterno</th>';
            echo '<th>Apellido Materno</th>';
            echo '<th>RFC</th>';
            echo '<th>NSS</th>';
            echo '<th>CURP</th>';
            echo '<th>Número de Teléfono</th>';
            echo '<th>Fecha de Entrada</th>';
            echo '<th>Acciones</th>';
            echo '</tr>';
            foreach($array as $workers){
                foreach($workers as $datos){
                    echo '<tr>';
                        echo "<td>" .$datos['name']. "</td>"; 
                        echo "<td>" .$datos['lastName']. "</td>";
                        echo "<td>" .$datos['lastName']. "</td>";
                        echo "<td>" .$datos['RFC']. "</td>";
                        echo "<td>" .$datos['NSS']. "</td>";
                        echo "<td>" .$datos['CURP']. "</td>";
                        echo "<td>" .$datos['number']. "</td>";
                        echo "<td>" .$datos['entryDate']. "</td>"; 
                    echo "<td>";
                    echo "<a href='../../app/actualizar.php?id=" . $datos["code"] . "'>Actualizar</a> | ";
                    echo "<a href='../../app/eliminar.php?id=" . $datos["code"] . "'>Eliminar</a>";
                    echo "</td>";
                    echo '</tr>';
                }
            }
        ?>
    </table>
</body>

</html>