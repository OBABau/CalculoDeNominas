<?php   
    include('../data/Empresa.php');
    $myobject = new Empresa();

    $myobject->iniciarSesion();
    $myobject->pagoDeServicio();
    header('Location: ../iniciado.php');
?>