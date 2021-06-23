<?php
    class Conectar{
        protected $dbh;

        protected function Conexion(){
            try{
                $conectar = $this->dbh = new PDO("mysql:host = localhost; dbname=apirest_php","root","");
                return $conectar;
            }catch(Exception $e){
                echo "Error en la conexión: " . $e->getMessage();
                die();
            }

        }
        public function set_names(){
            return $this->dbh->query("SET NAMES 'utf8'");
        }
    }
?>