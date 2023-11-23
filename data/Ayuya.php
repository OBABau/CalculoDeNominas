<?php
include('conexionDB.php');
session_start(); // Necesitas iniciar la sesión para acceder a la variable de sesión 'id_usuario'

class Ayuda extends conexionDB{
    private $Titulo;
    private $Descripcion;
    private $user;

    public function setDescripcion($Descripcion){
        $this->Descripcion = $Descripcion;
    }

    public function setTitulo($Titulo){
        $this->Titulo = $Titulo;
    }

    public function setUser($user){
        $this->user = $user;
    }

    public function setAyuda(){
        // Obtener el código del usuario actual
        $user_code = "";
        if(isset($_SESSION['start']->email)){
            $email = $_SESSION['start']->email;
    
            // Consulta SQL para obtener el código del usuario actual a partir de su correo electrónico
            $sql = "SELECT code FROM user WHERE email = '$email'";
    
            // Ejecutar la consulta SQL y obtener el resultado
            $result = mysqli_query($conn, $sql);
    
            // Verificar si se encontró el usuario
            if(mysqli_num_rows($result) > 0) {
                // Obtener el código del usuario actual
                $user_code = mysqli_fetch_assoc($result)['code'];
            }
        }
    
        // Insertar un registro en la tabla 'ayuda'
        $query = "INSERT INTO ayuda(Titulo, Descripcion, user) VALUES('" . $this->Titulo . "', '" . $this->Descripcion . "', '$user_code')";
        $result = $this->connect();
        
        if($result){
            echo "TODO BIEN";
            $newid = $this->execinsert($query);
        }
        else{
            echo "Algo anda mal";
            $newid = 0;
        }
    }
}
?>