<?php
include('../data/conexionDB.php');
    class usuarios extends ConexionDB {
        private $email;
        private $password;
        private $userType;


        public function getEmail()
        {
            return $this->email;
        }

        public function setEmail($email){
            $this->email = $email;
        }

        public function setPassword($password){
            $this->password = $password;
        } 
        public function getAdmin(){
            $result = $this->connect();
            if ($result) {
                $query = "SELECT * FROM user WHERE email = '".$this->email."' AND password = '".$this->password."' AND userType='1'";
     
                $dataset = $this->execquery($query);
            } else {
                $dataset = "Error";
            }
            return $dataset;
        }
        
        public function getEmployee(){
            $result = $this->connect();
            if ($result) {
                $query = "SELECT * FROM user WHERE email = '".$this->email."' AND password = '".$this->password."' AND userType='2'";
           
                $dataset = $this->execquery($query);
            } else {
                $dataset = "Error";
            }
            return $dataset;
        }
        
        public function getEnterprise(){
            $result = $this->connect();
            if ($result) {
                $query = "SELECT * FROM user WHERE email = '".$this->email."' AND password = '".$this->password."' AND userType='3'";
             
                $dataset = $this->execquery($query);
            } else {
                $dataset = "Error";
            }
            return $dataset;
        }
        

        
    }
?>