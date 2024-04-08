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

    <title>Edicion Prestaciones</title>
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
    <form method = "POST" action = "../../app/benefitsModifies.php">
        <h1>Edicion de prestaciones</h1>
        <h3 style='color: red;'>Si no vez datos, primero debes de crear a tus empleados.</h3>
        
        <br>
        <br>
        <?php
include('../../data/worker.php');
include('../../data/ingresosYConsultas+.php');
$myconsulta = new Worker();
$dataset = $myconsulta->getAllWorker();
$myobject = new ingresosYConsultas();
$perfil = new ingresosYConsultas();


if ($dataset != "error") {
    // Imprimir los títulos de la tabla
   
    // Imprimir los datos de la consulta
    while ($tupla = mysqli_fetch_assoc($dataset)) {
        echo '<table class="table table-striped table-hover">';
        echo '<tr class="font-weight-bold primary table-primary">';
        echo '<th>Nombre</th>';
        echo '<th>Apellido Paterno</th>';
        echo '<th>Apellido Materno</th>';
        
        echo '</tr>';
        echo '<tr>';
        echo "<td>" . $tupla['name'] . "</td>";
        echo "<td>" . $tupla['lastName'] . "</td>";
        echo "<td>" . $tupla['lastName2'] . "</td>";
        echo '</tr>';
        echo '</table>';

        echo "<label class=\"font-weight-bold primary table-primary\" >Prestaciones</label>";
        echo "<br>";
        $consulta2 = $myobject->getBenefits();
        while ($tupla2 = mysqli_fetch_assoc($consulta2)){
            $checked = $perfil->setCheckboxes($tupla2['code'],$tupla['profile'], "benefits");
            if($checked)
            {
            echo '<label>
            <input type= "checkbox" id = "ingresos" name = '.$tupla['code'].'[] value = "'.$tupla2['name'].'" checked > '.$tupla2['name'].'
            </label>';
            }
            else
            {
                echo '<label>
            <input type= "checkbox" id = "ingresos" name = '.$tupla['code'].'[] value = "'.$tupla2['name'].'" > '.$tupla2['name'].'
            </label>';
            }
            echo '<span style="margin-right: 30px;"></span>';
        }
        echo '<br>';
    }}
 else {
    echo "Algo pasó en la consulta";
}
?>
<button class = "btnPerfiles" type = "submit" name  = "Enviar">Enviar</button>
    </div>
</body>

</html>