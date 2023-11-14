<?php
include('Worker.php');
include_once('../data/conexionDB.php');

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["code"])) {
    $code = $_POST["code"];
    $name = $_POST["name"];
    $lastName = $_POST["apPat"];
    $lastName2 = $_POST["apMat"];
    $RFC = $_POST["rfc"];
    $NSS = $_POST["nss"];
    $CURP = $_POST["curp"];
    $number = $_POST["phone"];

    // Actualizar los datos del usuario en la base de datos
    $sql = "UPDATE worker SET name='$name', lastName='$lastName', lastName2 = '$lastName2', RFC = '$RFC', NSS = '$NSS', CURP= '$CURP', number='$number' WHERE code=$code";

    if (connect()->query($sql) === TRUE) {
        header("Location: listaEmpleados.php");
        echo "Datos actualizados correctamente.";
    } else {
        echo "Error al actualizar los datos: " . connect()->false;
    }
}

// Obtener datos del usuario para prellenar el formulario
$code = null;
$name = "";
$lastName = "";
$lastName2 = "";
$RFC = "";
$NSS = "";
$CURP = "";
$number = "";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["code"]) && is_numeric($_GET["code"])) {
    $code = $_GET["code"];
    $sql = "SELECT * FROM worker WHERE code=$code";
    $result = connect()->query($sql);

    if ($result->num_rows > 0) {
        $tupla = $result->fetch_assoc();
        $name = $tupla["name"];
        $lastName = $tupla["apPat"];
        $lastName2 = $tupla["apMat"];
        $RFC = $tupla["rfc"];
        $NSS = $tupla["nss"];
        $CURP = $tupla["curp"];
        $number = $tupla["phone"];
    } else {
        echo "Usuario no encontrado.";
        exit();
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["code"])) {
    // En caso de datos de formulario POST sin ID, usar el ID del formulario POST
    $code = $_POST["code"];
} else {
    echo "sexo";
    exit();
}

connect()->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Actualizar Usuario</title>
</head>
<body>
  <h2>Actualizar Usuario</h2>

  <form action="actualizar.php" method="post">
    <input type="hidden" name="id" value="<?php echo $code; ?>">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="name" value="<?php echo $name; ?>" required><br><br>

    <label for="nombre">Apellido Paterno:</label>
    <input type="text" id="nombre" name="apPat" value="<?php echo $lastName; ?>" required><br><br>

    <label for="nombre">Apellido Materno:</label>
    <input type="text" id="nombre" name="apMat" value="<?php echo $lastName2; ?>" required><br><br>

    <label for="nombre">RFC:</label>
    <input type="text" id="nombre" name="rfc" pattern="[A-Z0-9]{13}" title="Debe ingresar exactamente 13 caracteres alfanuméricos" value="<?php echo $RFC; ?>" required><br><br>

    <label for="nombre">NSS:</label>
    <input type="text" id="nombre" name="nss" pattern="\d{11}" title="Debe ingresar exactamente 11 dígitos" value="<?php echo $NSS; ?>" required><br><br>

    <label for="nombre">CURP:</label>
    <input type="text" id="nombre" name="curp" pattern="[A-Z0-9]{13}" title="Debe ingresar un CURP válido" value="<?php echo $CURP; ?>" required><br><br>

    <label for="nombre">Número de teléfono:</label>
    <input type="text" id="nombre" name="phone" pattern="\d{12}" title="Debe ingresar exactamente 12 dígitos" value="<?php echo $number; ?>" required><br><br>

    <input type="submit" value="Actualizar Usuario">
  </form>

</body>
</html>

