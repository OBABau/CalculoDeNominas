<?php
include('app/sesion.php');
?>

<html>
<link rel="stylesheet" href="css/style.css" type = "text/css">
<link rel="stylesheet" href="../css/contrato.css" type = "text/css">
        <link rel="stylesheet" href="../css/contrato2.css">
<head>
</head>
<body>
    <header>
        <div class="login">
            <?php echo "Bienvenido," .$_SESSION['start']. "!" ; ?> 
           
        </div>
        <div class="logo">GESTION NÓMINA</div>
        <div class="bars">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
        <nav class="nav-bar">
            <ul>
                <li>
                    <a href="iniciado.php">Inicio</a>
                </li>
                <?php
                // Mostrar opciones de menú dependiendo del tipo de usuario
                if($userType == 1) {
                    echo '<li><a href="view/loginAdmin.php">Panel de Administrador</a></li>';
                } elseif($userType == 2) {
                    echo '<li><a href="view/Empleado/loginEmpleado.php">Panel de Empleado</a></li>';
                } elseif($userType == 3) {
                        include('data/conexionDB.php');
                        $myobject = new ConexionDB();
                        $result = $myobject->connect();
                        if($result)
                        {
                        $consult = $myobject->execquery("select * from user where email ='".$_SESSION['start']."'");
                        $tupla = mysqli_fetch_assoc($consult);
                        if ($tupla['active'] == 1){
                            echo '<li><a href="view/Empresa/loginEmpresa.php">Panel de Empresa</a></li>';
                        }else{
                        echo '<li><a href="view/index2.php">Contratar Servicio</a></li>';
                        }
                        }
                }
                ?>
              <li>
              <form action="app/logout.php" method="post">
                <button type="submit">Logout</button>
            </form>
                </li>
              
            </ul>
        </nav>
    </header>
    <div class="textoInfo">
        <h1>PÁGINA PRINCIPAL</h1>
      
    </div>
</body>
</html>
