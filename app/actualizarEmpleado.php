<?php
include_once('../data/ConexionDB.php');

// Procesar el formulario si se envió
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $id = $_POST["id"];

    // Conectar a la base de datos
    $conexionDB = new ConexionDB();
    if ($conexionDB->connect()) {
        // Obtener valores del formulario
        $name = $_POST["nombre"];
        $lastName = $_POST["apPat"];
        $lastName2 = $_POST["apMat"];
        $RFC = $_POST["rfc"];
        $NSS = $_POST["nss"];
        $CURP = $_POST["curp"];
        $number = $_POST["phone"];

        // Actualizar el registro en la base de datos
        $updateQuery = "UPDATE WORKER 
                        SET name='$name', 
                            lastName='$lastName', 
                            lastName2='$lastName2', 
                            RFC='$RFC', 
                            NSS='$NSS', 
                            CURP='$CURP', 
                            number='$number' 
                        WHERE code=$id";

        if ($conexionDB->execquery($updateQuery)) {
            header("Location: ../view/Empleado/listaEmpleados.php");
            exit();
        } else {
            echo "Error en la actualización: " . mysqli_error($conexionDB->getConnection());
        }

        // Cerrar la conexión
        mysqli_close($conexionDB->getConnection());
    } else {
        echo "Error al conectar a la base de datos.";
    }
}
?>
