<?php
require_once('ConexionDB.php');

$db = new ConexionDB();


if ($db->connect()) {
    $titulo = $_POST['titulo'];
    $correo = $_POST['Mail'];
    $descripcion = $_POST['descripcion'];


    $sql = "INSERT INTO ayuda (Titulo, Correo, Descripcion) VALUES ('$titulo', '$correo', '$descripcion')";

    if ($db->execinsert($sql) > 0) {
        header('Location: ../view/ayuda.php?mensaje=Problema enviado correctamente.');
        exit(); 
    } else {
        echo "Error al insertar el registro.";
    }
} else {
    echo "Error en la conexión a la base de datos.";
}
?>
