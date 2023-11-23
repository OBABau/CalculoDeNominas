<?php
include ('Ayuya.php');
$ayuda = new Ayuda();
$ayuda->setTitulo('tit-prob');
$ayuda->setDescripcion('descripcion');
$ayuda->setUser($_SESSION['redirected']); // Asegúrate de que la variable de sesión 'id_usuario' esté definida y tenga el valor correcto
$ayuda->setAyuda();
?>