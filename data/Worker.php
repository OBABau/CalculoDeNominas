<?php
include_once("conexionDB.php");


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
    private $checkerName;
    private $checkerID;

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

    public function setCheckerName($checkerName){
        $this->checkerName = $checkerName;
    }

    public function setCheckerID($checkerID){
        $this->checkerID = $checkerID;
    }

    public function setWorker(){
        $query = "INSERT INTO worker(name, lastName, lastName2, RFC, NSS, CURP, number, entryDate, enterprise, user, profile, checkerName, checkerID) VALUES ('".$this->name."', '".$this->lastName."', '".$this->lastName2."', '".$this->RFC."', '".$this->NSS."', '".$this->CURP."', '".$this->number."', NOW(), ".$_SESSION['code'].", null, ".$this->profile.", '".$this->checkerName."', ".$this->checkerID.")";

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


    public function getUsersByEnterprise()
    {
        $result = $this->connect();
        if ($result) {
            // Consulta para obtener los usuarios cuyo worker está asociado a la empresa en sesión
            $query = "SELECT email, password FROM user WHERE worker IN (SELECT code FROM worker WHERE enterprise = " . $_SESSION['code'] . ")";
            $dataset = $this->execquery($query);
    
            if ($dataset) {
                return $dataset;
            } else {
                echo "Algo salió mal al ejecutar la consulta.";
                return "error";
            }
        } else {
            echo "Algo salió mal al conectar a la base de datos.";
            return "error";
        }
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
            $dataset = $this->execquery('SELECT * FROM worker where enterprise  = '.$_SESSION['code'].' AND active = "1"');
        }
        else{
            echo "algo salio mal";
            $dataset = "error";
        }

        return $dataset;
    }


    public function getAllWorkerWithUsers()
    {
        $result = $this->connect();
        if ($result) {
            // Consulta para obtener los datos de los trabajadores y los usuarios asociados
            $query = "SELECT w.*, u.email, u.password 
                      FROM worker w
                      LEFT JOIN user u ON w.code = u.worker
                      WHERE w.enterprise = " . $_SESSION['code'] . " AND w.active = '1'";
    
            $dataset = $this->execquery($query);
            //echo $query;
            if ($dataset) {
                return $dataset;
            } else {
                echo "Algo salió mal al ejecutar la consulta.";
                return "error";
            }
        } else {
            echo "Algo salió mal al conectar a la base de datos.";
            return "error";
        }
    }

    public function updateActiveStatus($id, $status)
    {
        $result = $this->connect();
        if ($result) {
            $dataset = $this->execquery("UPDATE worker SET active = $status WHERE code = $id");
        } else {
            echo "Algo salió mal";
            $dataset = "error";
        }
    
        return $dataset;
    }
    
}//fin de la clase
?>