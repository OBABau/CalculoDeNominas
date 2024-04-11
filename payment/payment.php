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

    public function setExpirationDate($mes, $anio) {
        $this->expirationDate = $mes."/".$anio;
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
            // Obtener la fecha actual
            $currentDate = date('Y-m-d');
    
            // Calcular la fecha un mes después
            $endDate = date('Y-m-d', strtotime('+1 month', strtotime($currentDate)));
    
            // Establecer el tipo de contrato como "mes"
            $contractType = "mes";
    
            // Construir la consulta SQL con las nuevas columnas
            $query = "INSERT INTO payments (name, cardNumber, cvv, expirationDate, user_id, startContract, finalContract, contractType) VALUES ('$this->name', '$this->cardNumber', '$this->cvv', '$this->expirationDate', '$userId', '$currentDate', '$endDate', '$contractType')";
            $result = $this->connect();
            echo $query;
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
    
    public function insertPayment2() {
        $email = $_SESSION['start'];
        $userId = $this->getUserByEmail();
    
        if ($userId !== false) {
            // Obtener la fecha actual
            $currentDate = date('Y-m-d');
    
            // Calcular la fecha un año después
            $endDate = date('Y-m-d', strtotime('+1 year', strtotime($currentDate)));
    
            // Establecer el tipo de contrato como "año"
            $contractType = "año";
    
            // Construir la consulta SQL con las nuevas columnas
            $query = "INSERT INTO payments (name, cardNumber, cvv, expirationDate, user_id, startContract, finalContract, contractType) VALUES ('$this->name', '$this->cardNumber', '$this->cvv', '$this->expirationDate', '$userId', '$currentDate', '$endDate', '$contractType')";
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