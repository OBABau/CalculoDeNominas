<?php
include_once('../data/conexionDB.php');
class Payment extends ConexionDB {
    private $name;
    private $cardNumber;
    private $cvv;
    private $expirationDate;
    private $userId;

    public function setName($name) {
        $this->name = $name;
    }

    public function setCardNumber($cardNumber) {
        $this->cardNumber = $cardNumber;
    }

    public function setCvv($cvv) {
        $this->cvv = $cvv;
    }

    public function setExpirationDate($expirationDate) {
        $this->expirationDate = $expirationDate;
    }

    public function setUserId($userId) {
        $this->userId = $userId;
    }

    public function getUserByEmail() {
        $result  = $this->connect();
        $query = "SELECT * FROM user WHERE email = '".$_SESSION['start']."'";
        
        if ($result) {
            $consulta = $this->execquery($query);
            
            if($tupla = mysqli_fetch_assoc($consulta)) {
                return $tupla['code'];
            }
        }
        return false;
    }
    


    public function insertPayment() {
        $email = $_SESSION['start'];
        $userId = $this->getUserByEmail();
    
        if ($userId !== false) {
            $query = "INSERT INTO payments (name, cardNumber, cvv, expirationDate, user_id) VALUES ('$this->name', '$this->cardNumber', '$this->cvv', '$this->expirationDate', '$userId')";
            $result = $this->connect();
    
            if ($result) {
                echo "Todo bien";
                $newid = $this->execinsert($query);
            } else {
                echo "Algo anda mal.jpg";
                $newid = 0;
            }
        } else {
            echo "Error: No se pudo obtener el ID del usuario.";
        }
    }
    
    
    

   
    
    
}