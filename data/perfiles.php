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
            $this->execquery('update profile_incomes set status = 1 where profile = '.$profile.' 
            and incomes in (select code from incomes where name = "'.$value.'");');
        } 
    }

    public function updateTo0($type, $profile)
    {
        $result =  $this->connect();
        if($result)
        {
            $this->execquery('update profile_'.$type.' set status = 0 where profile = '.$profile.';');
        } 
    }
}
?>