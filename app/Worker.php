<?php
include('../data/conexionDB.php');


class Worker extends ConexionDB{
    //atributos
    private $name;
    private $lastName;
    private $lastName2;
    private $RFC;
    private $NSS;
    private $CURP;
    private $number;
    private $code;

    //metodos
    public function setName($name){
        $this->name = $name;
    }

    public function setLastName($lastName){
        $this->lastName = $lastName;
    }

    public function setLastName2($lastName2){
        $this->lastName2 = $lastName2;
    }

    public function setRFC($RFC){
        $this->RFC = $RFC;
    }

    public function setNSS($NSS){
        $this->NSS = $NSS;
    }

    public function setCurp($CURP){
        $this->CURP = $CURP;
    }

    public function setNumber($number){
        $this->number = $number;
    }

    public function setWorker(){
        $query = "INSERT INTO worker(name, lastName, lastName2, RFC, NSS, CURP, number, entryDate) VALUES ('".$this->name."', '".$this->lastName."', '".$this->lastName2."', '".$this->RFC."', '".$this->NSS."', '".$this->CURP."', '".$this->number."', NOW())";

        $result = $this->connect();
         if($result){
            echo "todo bien";
            $newid = $this->execinsert($query);
         }
         else{
            echo "algo anda mal.jpg";
            $newid = 0;
         }
    }


    public function getAllWorker(){
        $result = $this->connect();
        if ($result){
            $dataset = $this->execquery('SELECT * FROM worker');
        }
        else{
            echo "algo salio mal";
            $dataset = "error";
        }

        return $dataset;
    }



}//fin de la clase
?>