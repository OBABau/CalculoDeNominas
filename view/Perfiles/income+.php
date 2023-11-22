<!DOCTYPE html>
<html>

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

    <title>Ingresos Registrados</title>
</head>

<body>
    <div class="contenido">
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
            <a href="../Empresa/loginEmpresa.php"><i class="fa fa-home"></i> &nbsp;Panel Empresa</a>
                <a href="creacionPerfiles.php"><i class="fa fa-arrow-left"></i> &nbsp;Regresar</a>
                <a href="../ayuda.php">&nbsp;<i class="fa fa-info"></i> &nbsp;Ayuda</a>
            </div>
            <form class="sidebarFooter" action="app/logout.php" method="post">
                <button class="btnSalir" type="submit">Cerrar Sesion</button>
            </form>
        </div>           

        <h1>Ingresos Registrados</h1>
        <table class="table table-striped table-hover">
            <?php
            include("../../data/ingresosYConsultas+.php");

            $myobject = new ingresosYConsultas;
            $consulta = $myobject->getIncomes();
            if($consulta != 'error')
            {       
                while($tupla = mysqli_fetch_assoc($consulta))
                {   
                    echo '<tr class="font-weight-bold primary table-primary">';
                    echo"<td>".$tupla['code']."</td>";
                    echo"<td>".$tupla['name']."</td>";
                    echo"<td>".$tupla['description']."</td>";
                    echo"</tr>";
                    
                }
            }
        ?>            
        </table>

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>