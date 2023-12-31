<?php
include_once('conexionDB.php');

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
    public function insertIncome($amount)
    {
        $result = $this->connect();
        $query  = "INSERT INTO `incomes`(`code`, `name`, `description`, `enterprise`, `amount`) VALUES (null,'".$this->name."','".$this->description."',".$this->enterprise.", ".$amount.")";
        if ($result)
        {
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
    public function insertBenefit($amount)
    {
        $result = $this->connect();
        $query  = "INSERT INTO `benefits`(`code`, `name`, `description`, `enterprise`, amount) VALUES (null,'".$this->name."','".$this->description."',".$this->enterprise.", ".$amount.")";
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

    public function getBenefitsByProfile($name){
        $result = $this->connect();
        if($result)
        {
            //echo"todo bien";
            $dataset = $this->execquery('SELECT * FROM benefits WHERE name = "'.$name.'"');
        }
        else
        {
            echo"algo salio mal";
            $dataset = "error";
        }
        return $dataset;
    }

    public function getSalary($worker){
        $result = $this->connect();
        if($result)
        {
            //echo"todo bien";
            //echo 'SELECT code from salary where worker = '.$worker.' and finished = 0;';
            $dataset = $this->execquery('SELECT code from salary where worker = '.$worker.' and finished = 0;');
        }
        else
        {
            echo"algo salio mal";
            $dataset = "error";
        }
        return $dataset;
    }


    public function insertSalaryBenefits($benefit, $amount, $salary)
    {
        $result = $this->connect();
        $query  = "INSERT INTO salary_benefits values (".$benefit.",".$salary.",".$amount.")";
        if ($result)
        {
            echo $query;
            $newid = $this->execinsert($query);
        }
    }

    //Profiles

    public function insertProfile($income)
    {
        $result = $this->connect();
        $query  = "INSERT INTO `profile`(`code`, `name`, `description`, `enterprise`, income) VALUES (null,'".$this->name."','".$this->description."',".$this->enterprise.", ".$income.")";
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