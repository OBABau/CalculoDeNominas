<?php
include_once('conexionDB.php');
class Empleado extends ConexionDB
{
    private $nombre;
    private $nombreFiscal;
    private $rfc;
    private $direccion;
    private $codigoPostal;
    private $ciudad;
    private $estado;
    private $correo;
    private $contrasena;
    private $userId;

    public function getUserData($email) {
        $result = $this->connect();
        $email = mysqli_real_escape_string($this->getConnection(), $email);
    
        $query = "SELECT email, password FROM user WHERE email = '$email'";
    
        if ($result) {
            $consulta = $this->execquery($query);
    
            if ($consulta) {
               
                if ($tupla = mysqli_fetch_assoc($consulta)) {
                    return $tupla;
                }
            }
        }
    
        return false;
    }

    public function obtenerDatosEmpleado() {
    $result = $this->connect();
    $query = "SELECT * FROM worker where code = ".$_SESSION['code']."";
    if ($result) {
        $dataset = $this->execquery($query);
    }

    return $dataset;
}

public function setUser($userId) 
    {
    
    $this->userId = $userId;
}
public function getEmpleado(){
    $result = $this->connect();
    if($result)
    {
        //echo"todo bien";
        $dataset = $this->execquery("select * from worker where user in (select code from user where email = '".$_SESSION['start']."')");
    }
    else
    {
        echo"algo salio mal";
        $dataset = "error";
    }
    return $dataset;
}

public function getData() {
    $result = $this->connect();
    if ($result) {
        $query = "SELECT 
            YEAR(payDate) as year,
            MONTH(payDate) as month, 
            SUM(total) as totalIncome 
        FROM (
            SELECT 
                payDate,
                MONTH(payDate) as month, 
                total
            FROM 
                SALARY 
            WHERE 
                worker IN (SELECT code FROM WORKER WHERE user = ". $_SESSION['userCode'].") 
                AND MONTH(payDate) IS NOT NULL
                AND total <> 0
        ) AS subquery
        GROUP BY 
            year, month";
        $dataset = $this->execquery($query);

        if ($dataset) {
            return $dataset;
        } else {
            echo "Error al ejecutar la consulta.";
            return false;
        }
    } else {
        echo "Error en la conexión a la base de datos.";
        return false;
    }
}
public function getDataByYear() {
    $result = $this->connect();
    if ($result) {
        $query = "SELECT 
            YEAR(payDate) as year, 
            SUM(total) as totalIncome 
        FROM SALARY 
        WHERE worker IN (SELECT code FROM WORKER WHERE user = ". $_SESSION['userCode'].") 
            AND YEAR(payDate) IS NOT NULL 
            AND total <> 0 
        GROUP BY year";
        $dataset = $this->execquery($query);

        if ($dataset) {
            return $dataset;
        } else {
            echo "Error al ejecutar la consulta.";
            return false;
        }
    } else {
        echo "Error en la conexión a la base de datos.";
        return false;
    }
}




public function getEmpleadoEntry($email){
    $result = $this->connect();
    if($result)
    {
        //echo"todo bien";
        $dataset = $this->execquery("select code from worker where user in (select code from user where email = '".$email."')");
    }
    else
    {
        echo"algo salio mal";
        $dataset = "error";
    }
    return $dataset;
}

public function getEmpleadoData($codeW){
    $result = $this->connect();
    if($result)
    {
        //echo"todo bien";
        $dataset = $this->execquery("select * from worker where code = ".$codeW."");
    }
    else
    {
        echo"algo salio mal";
        $dataset = "error";
    }
    return $dataset;
}

public function entryInsert( $worker, $enterprise, $profile ){
    $result = $this->connect();
    if($result)
    {
        //echo"todo bien";
        $dataset = $this->execquery("update salary 
        set
        days = days + 1,
        worker = ".$worker.",
        enterprise= ".$enterprise.",
        profile=".$profile."
        where 
        worker = ".$worker." and finished = false
        ");
    }
    else
    {
        echo"algo salio mal";
        $dataset = "error";
    }
    return $dataset;
}
}
?>