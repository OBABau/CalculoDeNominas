<?php
include('../../data/conexionDB.php');
class FAQs extends ConexionDB{
    private $titulo;
    private $correo;
    private $descripcion;

    public function setTitulo($titulo){
        return $this->titulo = $titulo;
    }

    public function setCorreo($correo){
        return $this->correo = $correo;
    }

    public function setDescripcion($descripcion){
        return $this->descripcion = $descripcion;
    }

    public function getFAQs(){
        $result = $this->connect();
        if ($result) {
            $query = "SELECT * FROM ayuda";

            $dataset = $this->execquery($query);
        } else {
            $dataset = "error";
            return $dataset;
        }
        return $dataset;
    }
}
?>