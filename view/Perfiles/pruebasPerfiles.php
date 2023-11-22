<?php
session_start();
include ("../../data/perfiles.php");
echo "<br>";
$perfil = new perfiles();
$perfil->updateTo0("incomes");
$perfil->updateTo0("benefits");
echo "llego";
if(isset($_POST['Enviar'])){
    foreach($_POST as $key => $value){
        echo "llego2";
        if(is_array($value)){
            foreach($value as $option){
                echo "Key: " . $key . ", Value: " . $option . "<br>";
                
                $perfil->updateProfiles($key, $option);
            }
        } else {
            echo "Key: " . $key . ", Value: " . $value . "<br>";
        }
    }
}

header("location: creacionPerfiles.php");
?>
