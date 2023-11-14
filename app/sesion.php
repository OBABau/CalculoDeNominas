<?php
session_start();

if (!isset($_SESSION['redirected'])) {
    $_SESSION['redirected'] = true;
    // Redirigir al usuario después de iniciar sesión
    header('Location: iniciado.php');
    exit();
}

// Verificar si las claves están definidas antes de acceder a ellas
$correoUsuario = isset($_SESSION['start']) ? $_SESSION['start'] : null; 
$userType = isset($_SESSION['type']) ? $_SESSION['type'] : null;

// Luego puedes usar $correoUsuario y $userType en tu código sin generar errores de índice indefinido.
?>
