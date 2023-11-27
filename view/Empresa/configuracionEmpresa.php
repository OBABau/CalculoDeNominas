<?php
include('../../data/Empresa.php');
session_start();
$empresa = new Empresa();

$correoBuscado = $_SESSION['start'];

$datosUsuario = $empresa->getUserData($correoBuscado);
$datosEmpresa = $empresa->obtenerDatosEmpresa($correoBuscado);

$correo = $contrasena = $nombre = $direccion = $codigoPostal = $ciudad = $estado = '';

if ($datosUsuario) {
    $correo = $datosUsuario["email"];
    $contrasena = $datosUsuario["password"];
}
    
// Verifica si se encontraron datos de empresa
if ($datosEmpresa) {
    $nombre = $datosEmpresa['name'];
    $direccion = $datosEmpresa['addressDesc'];
    $codigoPostal = $datosEmpresa['CP'];
    $ciudad = $datosEmpresa['city'];
    $estado = $datosEmpresa['state'];
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
    <link rel="stylesheet" href="../../css/gwen.css">

    <link rel="icon" type="image/x-icon" href="../../img/img/logo.png">
    <title>Configuracion de Cuenta</title>
</head>

<body>
    <div class="sidebar">
        <div class="headerSidebar">
            <img class="logoImg" src="../../img/img/logo.png" alt="Imagen Logo">
            <div class="tituloSidebar">NÓMINAS</div>
        </div>
        <hr>
        <div class="bienvenidoSideBar">
             <?php echo "Bienvenido," .$_SESSION['start']. "!" ; ?>  
        </div>
        <div class="sidebarContent">
            <a href="loginEmpresa.php"><i class="fa fa-home"></i> &nbsp;Inicio</a>
             <a href="loginEmpresa.php"><i class="fa fa-arrow-left"></i> &nbsp;Regresar</a>
            <a href="../ayuda.php">&nbsp;<i class="fa fa-info"></i> &nbsp;Ayuda</a>
        </div>
        <form class="text-center" action="../../app/logout.php" method="post">
            <button class="btnSalir2" type="submit">Cerrar Sesion</button>
        </form>
    </div>
    <div class="contenido">

        <h1>Configuración de Cuenta</h1>
       

        <div class="login-container">
            <div class="loginHeader">
                <h2>Datos de la Cuenta</h2>
            </div>

            <div class="loginBody">
                <form class="login-form" method='POST' action="cambiarDatosCuentaEmpresa.php">
                    <div class="formRow">
                        <label class="lblinput" for="correo">Correo Electrónico:</label>
                        <i class="fa fa-envelope"></i>
                        <input class="input" type="email" id="correo" name="correo" maxlength="50" value="<?php echo $correo; ?>" required>
                    </div>
                    <div class="formRow">
                        <label class="lblinput" for="contrasena">Contraseña:</label>
                        <i class="fa fa-key"></i>
                        <input class="input" type="password" id="contrasena" name="contrasena" maxlength="16" value="<?php echo $contrasena; ?>" required>
                    </div>                    
                    <div class="formRow">
                        <button class="boton1" type="Submit" name="Guardar">Guardar</button>
                    </div>                    
                </form>
            </div>
        </div>                                            
        </form>

        <?php
        if (isset($_GET['mensajeCuenta'])) {
            $mensajeCuenta = $_GET['mensajeCuenta'];
            if ($mensajeCuenta === "exito") {
                echo '<p class="bien">Datos de cuenta actualizados correctamente.</p>';                
                echo '<a class="aBtn2" href="../../app/logout.php">Logout</a>';
            } elseif ($mensajeCuenta === "error") {
                echo '<p class="error">Error al actualizar los datos de cuenta.</p>';
            }
        }
    ?>
        <h1>Configuración de la Empresa</h1>       
        <div class="login-container">
            <div class="loginHeader">
                <h2>Datos de la Empresa</h2>
            </div>

            <div class="loginBody">
                <form class="login-form" method='POST' action="cambiarDatosEmpresa.php">
                    <div class="formRow">
                        <label class="lblinput" for="nombreEmpresa">Nombre de la Empresa:</label>
                        <i class="fa fa-envelope"></i>
                        <input class="input" type="text" id="nombreEmpresa" name="nombreEmpresa" maxlength="50" value="<?php echo $nombre; ?>" required>
                    </div>
                    <div class="formRow">
                        <label class="lblinput" for="direccion">Dirección:</label>
                        <i class="fa fa-key"></i>
                        <input class="input" type="text" id="direccion" name="direccion" maxlength="50" value="<?php echo $contrasena; ?>" required>
                    </div>
                    <div class="formRow">
                        <label class="lblinput" for="direccion">Código Postal:</label>
                        <i class="fa fa-key"></i>
                        <input class="input" type="text" id="codigoPostal" name="codigoPostal" maxlength="50" value="<?php echo $codigoPostal; ?>" required>
                    </div>
                    <div class="formRow">
                        <label class="lblinput" for="ciudad">Ciudad:</label>
                        <i class="fa fa-key"></i>
                        <input class="input" type="text" id="ciudad" name="ciudad" maxlength="50" value="<?php echo $ciudad; ?>" required>
                    </div>
                    <div class="formRow">
                        <label class="lblinput" for="estado">Estado:</label>
                        <i class="fa fa-key"></i>
                        <input class="input" type="text" id="estado" name="estado" maxlength="50" value="<?php echo $estado; ?>" required>
                    </div>  
                    <div class="formRow">
                        <button class="boton1" type="Submit" name="Guardar">Guardar</button>
                    </div>                    
                </form>
            </div>
        </div>                                                        
        <?php
        if (isset($_GET['mensajeEmpresa'])) {
            $mensajeEmpresa = $_GET['mensajeEmpresa'];
            if ($mensajeEmpresa === "exito") {
                echo '<p class="bien">Datos de empresa actualizados correctamente.</p>';
            } elseif ($mensajeEmpresa === "error") {
                echo '<p class="error">Error al actualizar los datos de empresa.</p>';
            }
        }
        ?>    
    </div>
</body>

</html>