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
<html>
<head>
  <title>Actualizar Usuario</title>
</head>
<body>
  <h2>Actualizar Usuario</h2>
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

      <input type="submit" value="Actualizar">
    </form>
  </div>
</body>
</html>
