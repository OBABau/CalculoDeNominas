<?php
include('../../data/admin.php');

if (isset($_GET['id'])) {
    $userIdToDelete = $_GET['id'];
    $instancia = new admin();
    $instancia->desactivarUsuario($userIdToDelete);
    header("Location: desactivarCuentas.php");
    exit();
}
?>
