<?php
include(__DIR__."/../data/conexionDB.php");


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
    private $correo;
    private $contrasena;
    private $profile;

    //metodos
    public function setCorreo($correo) {
        $this->correo = $correo;
    }

    public function setProfile($profile) {
        $this->profile = $profile;
    }
    public function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }

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
        $query = "INSERT INTO worker(name, lastName, lastName2, RFC, NSS, CURP, number, entryDate, enterprise, user, profile) VALUES ('".$this->name."', '".$this->lastName."', '".$this->lastName2."', '".$this->RFC."', '".$this->NSS."', '".$this->CURP."', '".$this->number."', NOW(), ".$_SESSION['code'].", null, ".$this->profile.")";

        $result = $this->connect();
         if($result){
            echo "todo bien";
            $newid = $this->execinsert($query);
         }
         else{
            echo "algo anda mal.jpg";
            $newid = 0;
         }
         return $newid;
    }

    public function registrarCuenta($workerId) {
        // Prepara la consulta SQL para insertar la cuenta del usuario
        $query = "INSERT INTO user (email, password, creationDate, usertype, worker) VALUES ('".$this->correo."', '".$this->contrasena."', NOW(), '2', $workerId)";
        // Conecta a la base de datos y ejecuta la consulta
        $result = $this->connect();
        if ($result) {
            // Ejecuta la consulta para registrar la cuenta del usuario
            $dataSet = $this->execquery($query);
            
            // Verifica si la consulta se ejecutó correctamente
            if ($dataSet) {
                // Obtén el ID del usuario recién registrado
                $userId = mysqli_insert_id($this->getConnection());
                
                // Devuelve el ID del usuario
                return $userId;
            } else {
                return false;
            }
        } else {
            return false;
        }
        
    }

    public function getAllWorker(){
        $result = $this->connect();
        if ($result){
            $dataset = $this->execquery('SELECT * FROM worker where enterprise  = '.$_SESSION['code'].'');
        }
        else{
            echo "algo salio mal";
            $dataset = "error";
        }

        return $dataset;
    }



}//fin de la clase
?>