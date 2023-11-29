<?php
session_start();
include ("../data/perfiles.php");
include("../data/ingresosYConsultas+.php");
echo "<br>";
$perfil = new perfiles();
$myobject = new ingresosYConsultas();



if(isset($_POST['Enviar'])){
    foreach($_POST as $key => $value){
        //echo "llego2";
        if(is_array($value)){
            
            foreach($value as $option){
                echo "Key: " . $key . ", Value: " . $option . "<br>";
                $consulta = $myobject->getBenefitsByProfile($option);
                $consulta2 = $myobject->getSalary($key);
                while($tupla = mysqli_fetch_assoc($consulta))
                {

                while ($tupla2 = mysqli_fetch_assoc($consulta2))
                {
                $myobject->insertSalaryBenefits($tupla['code'],$tupla['amount'],$tupla2['code']);
                header("location: ../view/Empresa/loginEmpresa.php");
                }
                }
            }
        } else {
            //echo "Key: " . $key . ", Value: " . $value . "<br>";
        }
        header("location: ../view/Empresa/loginEmpresa.php");
    }
}



?>