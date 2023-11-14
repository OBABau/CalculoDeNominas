<?php
//ConexionDB.php

class ConexionDB{
	private $HOST="";
	private $USER="";
	private $PASS="";
	private $DB="";
	private $connection;
	private $dataset; //resultado de la consulta

//constructor
	public function __construct(){
		$this->HOST="localhost";
		$this->USER="root";
		$this->PASS="";
		$this->DB="calculo_de_nominas";
	}
	public function getConnection() {
        return $this->connection;
    }
	

	/*
	public function_constructor($PHOST,$PUSER, $PPASS, $PDB){
		$this->HOST= $PHOST;
		$this->USER= $PUSER;
		$this->PASS=$PPASS;
		$this->DB=$PDB;
	}
	*/
	//metodo para conectar ala base de datos
	public function connect (){
		$this ->connection = mysqli_connect($this->HOST, $this->USER, $this->PASS, $this->DB);
		if ($this -> connection == true){
			/*echo "Si conecta a la BD ";*/
			return true;
		}
		else {
			echo "No conecto a la BD";
			return false;
		}
	}//fin de conectar

	public function execquery ($query) {
	$this->dataset = mysqli_query($this->connection, $query);
	if($this->dataset){
		/*echo " la consulta va bien";*/
		return $this->dataset;
	}
	else{
		echo "algo paso en la consulta";
		return 0;
	}
}

public function execinsert($query){
	if(mysqli_query($this->connection, $query) > 0 ){
		//echo"insercion exitosa";
		$newid = $this->connection->insert_id;
	}
	else{
		$newid = 0;
		echo"insercion fallida";
		echo $query;
	}
	return $newid;
}
}

?>