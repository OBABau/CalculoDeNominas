<?php
include('conexionDB.php');
    class admin extends ConexionDB {
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

        public function getUsers(){
            $result = $this->connect();
            if ($result) {
                $query = "SELECT `code`, `email`, `password`, `creationDate` FROM `user` WHERE `hell` = 1";
                $dataset = $this->execquery($query);
            } else {
                $dataset = "Error";
            }
            return $dataset;
        }
        public function getUsers0(){
            $result = $this->connect();
            if ($result) {
                $query = "SELECT `code`, `email`, `password`, `creationDate` FROM `user` WHERE `hell` = 0";
                $dataset = $this->execquery($query);
            } else {
                $dataset = "Error";
            }
            return $dataset;
        }

        
            public function desactivarUsuario($userId) {
                $result = $this->connect();
                if ($result) {
                $query = "UPDATE `user` SET `hell` = 0 WHERE `code` = '$userId'";
                $this->execquery($query);$dataset = $this->execquery($query);
            } else {
                $dataset = "Error";
            }
            return $dataset;
        }
        public function reactivarUsuario($userId) {
            $result = $this->connect();
            if ($result) {
            $query = "UPDATE `user` SET `hell` = 1 WHERE `code` = '$userId'";
            $this->execquery($query);$dataset = $this->execquery($query);
        } else {
            $dataset = "Error";
        }
        return $dataset;
    }
        }
?>