<?php
include ("conexionDB.php");
class Perfiles extends ConexionDB
{

//Methods
    public function updateProfiles($profile, $value)
    {
        $result =  $this->connect();
        if($result)
        {
            $validate = $this->execquery("select * from incomes where name  = '".$value."'; ");
            if(mysqli_num_rows($validate)>0){
            $this->execquery('update profile_incomes set status = 1 where profile = '.$profile.' 
            and incomes in (select code from incomes where name = "'.$value.'");');
            }

            $validate = $this->execquery("select * from benefits where name  = '".$value."' ");
            if(mysqli_num_rows($validate)>0){
                $query = $this->execquery('update profile_benefits set status = 1 where profile = '.$profile.' 
                and benefits in (select code from benefits where name = "'.$value.'");');
                echo "<br>";
                echo $query;
            }

        } 
    }

    public function showProfiles()
    {
        $result =  $this->connect();
        if($result)
        {
            $dataset = $this->execquery('Select * from profile where enterprise = '.$_SESSION['code']);
        }else
        {
            $dataset = "algo salio mal";
        }
        return $dataset;
    }
    
    
    public function updateTo0($type )
    {
        $result =  $this->connect();
        if($result)
        {
            $this->execquery('update profile_'.$type.' set status = 0 where profile in (select code from profile where enterprise in (select code from enterprise where user in ( select code from user where email = "'.$_SESSION['start'].'")));');
        } 
    }
 
    
    }

?>