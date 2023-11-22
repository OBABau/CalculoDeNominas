<?php
include_once('../data/ConexionDB.php');

// Variables para almacenar los valores recuperados de la base de datos
$name = $lastName = $lastName2 = $RFC = $NSS = $CURP = $number = $id = "";

// Verificar si se recibió un ID por GET
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];

    // Conectar a la base de datos
    $conexionDB = new ConexionDB();
    if ($conexionDB->connect()) {
        // Buscar el registro a actualizar
        $searchQuery = "SELECT * FROM WORKER WHERE code=$id";
        $result = $conexionDB->execquery($searchQuery);

        if ($result) {
            $tupla = mysqli_fetch_assoc($result);

            // Asignar los valores recuperados a las variables
            $name = $tupla['name'];
            $lastName = $tupla['lastName'];
            $lastName2 = $tupla['lastName2'];
            $RFC = $tupla['RFC'];
            $NSS = $tupla['NSS'];
            $CURP = $tupla['CURP'];
            $number = $tupla['number'];

            // Cerrar la conexión
            mysqli_close($conexionDB->getConnection());
        } else {
            echo "Error: No se encontró el registro para actualizar.";
        }
    } else {
        echo "Error al conectar a la base de datos.";
    }
} else {
    echo "Error: Falta el parámetro 'id' en la URL.";
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
                    session_start();
                    echo "Bienvenido: ";
                    echo $_SESSION['start'];
                ?>
                 <hr>
        <div class="sidebarContent">
            <a href="../view/Empresa/loginEmpresa.php"><i class="fa fa-home"></i> &nbsp;Panel de empresa</a>
            <a href="../view/Empleado/listaEmpleados.php"><i class="fa fa-arrow-left"></i> &nbsp;Regresar</a>
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
                <h2>Actualizar datos de empleado</h2>
            </div>           
  <div class="loginBody">                
  <form class="login-form" method="POST" action="actualizarEmpleado.php">
  <input type="hidden" name="id" value="<?php echo $id; ?>">
      <div class="formRow">
        <label class="lblinput" for="nombre">Nombre:</label>
        <input class="input" type="text" id="nombre" name="nombre" maxlength="50" value="<?php echo $name; ?>" required>
      </div>        
      <div class="formRow">
        <label class="lblinput" for="apPat">Apellido Paterno:</label>
        <input class="input" type="text" id="apPat" name="apPat" maxlength="30" value="<?php echo $lastName; ?>" required>
      </div>                              
      <div class="formRow">
        <label class="lblinput" for="apMat">Apellido Materno:</label>
        <input class="input" type="text" id="apMat" name="apMat" maxlength="30" value="<?php echo $lastName2; ?>" required>
      </div>          

      <div class="formRow">                        
        <label class="lblinput" for="rfc">RFC:</label>                        
        <input class="input" type="text" name="rfc" id="rfc" title="Debe ingresar exactamente 13 caracteres alfanuméricos" maxlength="13" value="<?php echo $RFC; ?>" required>
      </div>

      <div class="formRow">
        <label class="lblinput" for="nss">NSS:</label>
        <input class="input" type="text" id="nss" name="nss" pattern="\d{11}" title="Debe ingresar exactamente 11 dígitos" minlength="11" maxlength="11" value="<?php echo $NSS; ?>" required>
      </div>        

      <div class="formRow">
        <label class="lblinput" for="curp">CURP:</label>
        <input class="input" type="text" id="curp" name="curp" pattern="[A-Z0-9]{18}" title="Debe ingresar un CURP válido" minlength="18" maxlength="18" value="<?php echo $CURP; ?>" required>
      </div>        

      <div class="formRow">
        <label class="lblinput" for="phone">Número de Teléfono:</label>
        <input class="input" type="text" id="phone" name="phone" pattern="\d{10}" title="Debe ingresar exactamente 12 dígitos" minlength="10" maxlength="10" value="<?php echo $number; ?>" required>
      </div>      

      <div class="formRow">
                        <button class="boton1" type="Submit" value="Enviar">Actualizar</button>
                    </div>  
    </form>
  </div>
  </div>
</body>
</html>
