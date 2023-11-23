<?php
include('../../data/admin.php');

if (isset($_GET['id'])) {
    $userIdToDelete = $_GET['id'];
    $instancia4 = new admin();
    $instancia4->reactivarEmpresas($userIdToDelete);
    header("Location: desactivarCuentas.php");
    exit();
}
?>
