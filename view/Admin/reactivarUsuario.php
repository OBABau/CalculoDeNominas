<?php
include('../../data/admin.php');

if (isset($_GET['id'])) {
    $userIdToDelete = $_GET['id'];
    $instancia2 = new admin();
    $instancia2->reactivarUsuario($userIdToReactive);
    header("Location: reactivarUsuarios.php");
    exit();
}
?>
