<?php
session_start();
include ("../../data/perfiles.php");
echo "<br>";
$perfil = new perfiles();

if(isset($_POST['Enviar'])){
    foreach($_POST as $key => $value){
        $perfil->updateTo0("incomes", $key);
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
?>