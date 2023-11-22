<?php
include('Worker.php');

// Verificar si se recibió un ID por GET
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];

    $myconsulta = new Worker();

    $result = $myconsulta->updateActiveStatus($id, 0);

    if ($result) {
        header("Location: ../view/Empleado/listaEmpleados.php");
    } else {
        echo "Error al marcar el usuario como inactivo.";
    }
} else {
    echo "No se proporcionó un ID válido.";
}
?>
