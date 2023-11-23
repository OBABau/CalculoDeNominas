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
            <a href="../loginAdmin.php"><i class="fa fa-arrow-left"></i> &nbsp;Regresar</a>
            <a href="../../ayuda.php">&nbsp;<i class="fa fa-info"></i> &nbsp;Ayuda</a>
        </div>

        <form class="sidebarFooter" action="../../app/logout.php" method="post">
            <button class="btnSalir" type="submit">Cerrar Sesion</button>
        </form>
    </div>

    <div class="contenido2">
        <h1>Lista de Usuarios Registrados</h1>
        <table class="table table-striped table-hover">
        <?php
include('../../data/admin.php');
$instancia2 = new admin();

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["reactivar"])) {
    $userIdToReactive = $_POST["reactivar"];
    $instancia2->reactivarUsuario($userIdToReactive);
        }

        $dataset = $instancia2->getUsers0();

    if ($dataset != "error") {
    echo '<tr class="font-weight-bold primary table-primary">';
    echo '<th>ID</th>';
    echo '<th>Correo</th>';
    echo '<th>Contraseña</th>';
    echo '<th>Fecha de creación</th>';
    echo '<th>Acciones</th>';
    echo '</tr>';
    while ($tupla = mysqli_fetch_assoc($dataset)) {
        echo '<tr>';
        echo "<td>" . $tupla['code'] . "</td>";
        echo "<td>" . $tupla['email'] . "</td>";
        echo "<td>" . $tupla['password'] . "</td>";
        echo "<td>" . $tupla['creationDate'] . "</td>";
        echo "<td>";
        echo "<form method='post' action=''>";
        echo "<input type='hidden' name='reactivar' value='" . $tupla['code'] . "'>";
        echo "<button type='submit'>Reactivar</button>";
        echo "</form>";
        echo "</td>";
        echo '</tr>';
    }
} else {
    echo "Algo pasó en la consulta";
}
?>
        </table>
    </div>
</body>

</html>