<?php
include ('conexionDB.php');

class ingresosYConsultas extends ConexionDB
{
    private $name;
    private $description;
    private $enterprise;

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    /*public function getEnterprise(){

        return $this->enterprise;
    }*/

    public function setEnterprise($enterprise)
    {
        $this->enterprise = $enterprise;
    }

    public function getEnterprise(){
        $result = $this->connect();
        if($result)
        {
            //echo"todo bien";
            $dataset = $this->execquery("select code from enterprise where user in (select code from user where email = '".$_SESSION['start']."')");
        }
        else
        {
            echo"algo salio mal";
            $dataset = "error";
        }
        return $dataset;
    }
    //incomes
    public function insertIncome($amount, $operation)
    {
        $result = $this->connect();
        $query  = "INSERT INTO `incomes`(`code`, `name`, `description`, `enterprise`, `operation`, `amount`) VALUES (null,'".$this->name."','".$this->description."',".$this->enterprise.",'".$operation."', ".$amount.")";
        if ($result)
        {
            echo $query."<br><br>";
            $newid = $this->execinsert($query);
        }
    }

    public function getIncomes(){
        $result = $this->connect();
        if($result)
        {
            //echo"todo bien";
            $dataset = $this->execquery('SELECT * FROM INCOMES WHERE enterprise IN ( SELECT E.code FROM ENTERPRISE E INNER JOIN USER U ON E.user = U.code WHERE U.email = "'.$_SESSION['start'].'" );');
        }
        else
        {
            echo"algo salio mal";
            $dataset = "error";
        }
        return $dataset;
    }
    //

    //Benefits
    public function insertBenefit()
    {
        $result = $this->connect();
        $query  = "INSERT INTO `benefits`(`code`, `name`, `description`, `enterprise`) VALUES (null,'".$this->name."','".$this->description."',".$this->enterprise.")";
        if ($result)
        {
            $newid = $this->execinsert($query);
        }
    }

    public function getBenefits(){
        $result = $this->connect();
        if($result)
        {
            //echo"todo bien";
            $dataset = $this->execquery('SELECT * FROM benefits WHERE enterprise IN ( SELECT E.code FROM ENTERPRISE E INNER JOIN USER U ON E.user = U.code WHERE U.email = "'.$_SESSION['start'].'" );');
        }
        else
        {
            echo"algo salio mal";
            $dataset = "error";
        }
        return $dataset;
    }

    //Profiles

    public function insertProfile()
    {
        $result = $this->connect();
        $query  = "INSERT INTO `profile`(`code`, `name`, `description`, `enterprise`) VALUES (null,'".$this->name."','".$this->description."',".$this->enterprise.")";
        if ($result)
        {
            $newid = $this->execinsert($query);
        }
    }

    public function getProfiles(){
        $result = $this->connect();
        if($result)
        {
            //echo"todo bien";
            $dataset = $this->execquery('SELECT * FROM PROFILE WHERE enterprise IN ( SELECT E.code FROM ENTERPRISE E INNER JOIN USER U ON E.user = U.code WHERE U.email = "'.$_SESSION['start'].'" );');
        }
        else
        {
            echo"algo salio mal";
            $dataset = "error";
        }
        return $dataset;
    }

    public function getIncomesName(){
        $result = $this->connect();
        if($result)
        {
            //echo"todo bien";
            $dataset = $this->execquery('select name from incomes');
        }
        else
        {
            echo"algo salio mal";
            $dataset = "error";
        }
        return $dataset;
    }

    public function setCheckboxes($ingreso, $profile, $type)
    {
        $result = $this->connect();
        if ($result)
        {
            $sql = "select status from profile_".$type." where ".$type." = ".$ingreso." and profile = ".$profile;
            $dataset = $this->execquery("select status from profile_".$type." where ".$type." = ".$ingreso." and profile = ".$profile);
            //echo $sql;
            while ($tupla = mysqli_fetch_assoc($dataset))
            {
            if ($tupla['status'] == 1)
            {
                return true;
            }else
            {
                return false;
            }
        }
        }
    }
}
?>