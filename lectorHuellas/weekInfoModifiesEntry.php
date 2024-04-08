
<?php
    session_start();
include_once('../data/ConexionDB.php');

// Variables para almacenar los valores recuperados de la base de datos
$name = $lastName = $lastName2 = $RFC = $NSS = $CURP = $number = $id = "";

// Verificar si se recibió un ID por GET

    include ("../data/Empleado.php");
        $empleado = new Empleado();
            $consulta = $empleado->getWeekInfo($_SESSION['idAsistencia']);
            if($tupla = mysqli_fetch_assoc($consulta))
            {
                $mondayEntry = $tupla['mondayEntry'];
                $mondayExit = $tupla['mondayExit'];

                $tuesdayEntry = $tupla['tuesdayEntry'];
                $tuesdayExit = $tupla['tuesdayExit'];

                $wednesdayEntry = $tupla['wednesdayEntry'];
                $wednesdayExit = $tupla['wednesdayExit'];

                $thurdayEntry = $tupla['thursdayEntry'];
                $thursdayExit = $tupla['thursdayExit'];

                $fridayEntry = $tupla['fridayEntry'];
                $fridayExit = $tupla['fridayExit'];

                $saturdayEntry = $tupla['saturdayEntry'];
                $saturdayExit = $tupla['saturdayExit'];

                $sundayEntry = $tupla['sundayEntry'];
                $sundayExit = $tupla['sundayExit'];

                //echo $checkerDays;
            }

?>

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

    <link rel="icon" type="image/x-icon" href="../../img/img/logo.png">

    <title>Lista Empleados</title>
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
                    
                    echo "Bienvenido: ";
                    echo $_SESSION['start'];
                ?>
                 <hr>
        <div class="sidebarContent">
            <a href="../view/Empresa/loginEmpresa.php"><i class="fa fa-home"></i> &nbsp;Inicio</a>
            <a href="confirmarAsistencia.php"><i class="fa fa-arrow-left"></i> &nbsp;Regresar</a>
            <a href="../view/ayuda.php">&nbsp;<i class="fa fa-info"></i> &nbsp;Ayuda</a>
        </div>
       
        <form class="sidebarFooter" action="../../app/logout.php" method="post">
            <button class="btnSalir" type="submit">Cerrar Sesion</button>
        </form>
    </div>
    </div>
    <div class="contenido">        
        <div class="login-container2">
            <div class="loginHeader">
                <h2>Actualizar horas de entrada</h2>
            </div>           
  <div class="loginBody">                
    <form class="login-form" method="POST" action="weekInfoPEntry.php">
        <label class="lblinput" for="monday">Lunes:</label>
        <input type="time" id="monday" name="monday" value="<?php echo $mondayEntry; ?>" >
    
        <label class="lblinput" for="tuesday">Martes:</label>
        <input type="time" id="tuesday" name="tuesday" value="<?php echo $tuesdayEntry; ?>" >
        
        <label class="lblinput" for="wednesday">Miercoles:</label>
        <input type="time" id="wednesday" name="wednesday" value="<?php echo $wednesdayEntry; ?>" >

        <label class="lblinput" for="thursday">Jueves:</label>
        <input type="time" id="thursday" name="thursday" value="<?php echo $thurdayEntry; ?>" >

        <label class="lblinput" for="friday">Viernes:</label>
        <input type="time" id="friday" name="friday" value="<?php echo $fridayEntry; ?>" >

        <label class="lblinput" for="saturday">Sabado:</label>
        <input type="time" id="saturday" name="saturday" value="<?php echo $saturdayEntry; ?>" >

        <label class="lblinput" for="sunday">Domingo:</label>
        <input type="time" id="sunday" name="sunday" value="<?php echo $sundayEntry; ?>" >

      <div class="formRow">
                        <button class="boton1" type="Submit" value="Enviar">Actualizar</button>
        </div>  
    </form>
  </div>

  <?php
    // Recupera el mensaje del parámetro de la URL
    $mensaje = isset($_GET['mensaje']) ? $_GET['mensaje'] : '';

    if ($mensaje) {
        echo '<br><br><p class="bien">' . $mensaje . '</p>';
    }
    ?> 
</div>
  </div>
</body>
</html>