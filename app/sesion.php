<?php
session_start();

if (!isset($_SESSION['redirected'])) {
    $_SESSION['redirected'] = true;
    header('Location: iniciado.php');
    exit();
}

$correoUsuario = isset($_SESSION['start']) ? $_SESSION['start'] : null; 
$userType = isset($_SESSION['type']) ? $_SESSION['type'] : null;


?>
