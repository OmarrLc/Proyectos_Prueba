<?php
    class Conexion{
        private $dbHost = "localhost";
        private $dbUser = "root";
        private $dbPass = "";
        private $dbName = "apirest_slim";
        
        public function connect(){
            $mysqlConnect = "mysql:host=$this->dbHost;dbname=$this->dbName";
            $dbConnect  = new PDO($mysqlConnect, $this->dbUser, $this->dbPass);
            $dbConnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $dbConnect;
        }
    }
?>