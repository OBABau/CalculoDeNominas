<?php
include('conexionDB.php');

class Empresa extends ConexionDB {
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

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setNombreFiscal($nombreFiscal) {
        $this->nombreFiscal = $nombreFiscal;
    }

    public function setRfc($rfc) {
        $this->rfc = $rfc;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function setCodigoPostal($codigoPostal) {
        $this->codigoPostal = $codigoPostal;
    }

    public function setCiudad($ciudad) {
        $this->ciudad = $ciudad;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function setCorreo($correo) {
        $this->correo = $correo;
    }

    public function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }


    public function getUser() {
        $result  = $this->connect();
        $query = "select * from user where email = '".$_SESSION['start']."'";
        if ($result)
        {
            $consulta = $this->execquery($query);
            if($tupla = mysqli_fetch_assoc($consulta))
            {
                return $tupla['code'];
            }
        }
    }

    public function setUser($userId) 
    {
    
    $this->userId = $userId;
}

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

public function obtenerDatosEmpresa($email) {
    $result = $this->connect();
    $correo = mysqli_real_escape_string($this->getConnection(), $email);

    $query = "SELECT name, addressDesc, CP, city, state FROM enterprise e
              JOIN user u ON e.user = u.code
              WHERE u.email = '$email'";
    
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




public function actualizarDatosCuenta($correoBuscado, $nuevoCorreo, $nuevaContrasena) {
    $result = $this->connect();
    $correoBuscado = mysqli_real_escape_string($this->getConnection(), $correoBuscado);
    $nuevoCorreo = mysqli_real_escape_string($this->getConnection(), $nuevoCorreo);
    $nuevaContrasena = mysqli_real_escape_string($this->getConnection(), $nuevaContrasena);

    $query = "UPDATE user SET email = '$nuevoCorreo', password = '$nuevaContrasena' WHERE email = '$correoBuscado'";

    if ($result) {
        $resultado = $this->execquery($query);

        return $resultado !== false;
    }

    return false;
}

public function actualizarDatosEmpresa($nombre, $direccion, $codigoPostal, $ciudad, $estado, $correo) {
    $result = $this->connect();
    $nombre = mysqli_real_escape_string($this->getConnection(), $nombre);
    $direccion = mysqli_real_escape_string($this->getConnection(), $direccion);
    $codigoPostal = mysqli_real_escape_string($this->getConnection(), $codigoPostal);
    $ciudad = mysqli_real_escape_string($this->getConnection(), $ciudad);
    $estado = mysqli_real_escape_string($this->getConnection(), $estado);
    $correo = mysqli_real_escape_string($this->getConnection(), $correo);

    $query = "UPDATE enterprise e
              SET
                name = '$nombre',
                addressDesc = '$direccion',
                CP = '$codigoPostal',
                city = '$ciudad',
                state = '$estado'
              WHERE e.user = (SELECT u.code FROM user u WHERE u.email = '$correo')";

    if ($result) {
        $resultado = $this->execquery($query);

        if ($resultado === false) {
            // Muestra el mensaje de error de la base de datos
            echo "Error en la consulta: " . mysqli_error($this->getConnection());
        }

        return $resultado !== false;
    }

    return false;
}

public function pagoDeServicio()
{
    $result = $this->connect();
    $query = "UPDATE user set active = 1 where email = '".$_SESSION['start']."';";
    if($result)
    {
        $this->execquery($query);
    }
}

public function checkCuenta(){
    $result = $this->connect();
    $query = "SELECT Count(*) as total FROM user WHERE email = '".$this->correo."'";
    
    if ($result)
    {
        $dataset = $this->execquery($query);
    }else
    {
        $dataset = "error";
    }
    return $dataset;
}

  
    public function registrarCuenta() {
        // Prepara la consulta SQL para insertar la cuenta del usuario
        $query = "INSERT INTO user (email, password, creationDate, usertype) VALUES ('".$this->correo."', '".$this->contrasena."', NOW(), '3')";
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
    
    public function iniciarSesion()
    {
        session_start();
    }
    
    public function registrarEmpresa() {
        $userId = $this->getUser();
        if ($userId) {
            
            $query = "INSERT INTO enterprise (name, fiscalName, RFC, addressDesc, CP, city, state, user) VALUES 
            ('".$this->nombre."', '".$this->nombreFiscal."', '".$this->rfc."', '".$this->direccion."', 
            '".$this->codigoPostal."', '".$this->ciudad."', '".$this->estado."', '".$userId."')";
    
       
            $result = $this->connect();
            if ($result) {
        
                $dataSet = $this->execquery($query);
    
                if ($dataSet) {
                    return "Registro de empresa exitoso.";
                } else {
                    return "Error al registrar la empresa.";
                }
            } else {
                return "Error en la conexión a la base de datos.";
            }
        } else {
            
            return "ID de usuario inválido.".$_SESSION['start'].$userId;

        }
    }
}



?>