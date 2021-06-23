<?php
    class Categoria extends Conectar{
        public function getCategoria(){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM categoria";
            $sql = $conectar->prepare($sql); 
            $sql->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getCategoriaId($id){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM categoria WHERE estado=1 AND id = ?";
            $sql = $conectar->prepare($sql); 
            $sql -> bindValue(1, $id); 
            $sql->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }
        
        public function insertCategoria($nombre, $observacion){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "INSERT INTO categoria (nombre, observacion, estado) VALUE (?,?, '1')";
            $sql = $conectar->prepare($sql); 
            $sql -> bindValue(1, $nombre); 
            $sql -> bindValue(2, $observacion); 
            $sql->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function updateCategoria($id,$nombre, $observacion, $estado){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "UPDATE categoria SET nombre = ?,
                                     observacion = ?,
                                     estado = ?
                                    WHERE id = ?";
            $sql = $conectar->prepare($sql); 
            $sql -> bindValue(1, $nombre); 
            $sql -> bindValue(2, $observacion); 
            $sql -> bindValue(3, $estado); 
            $sql -> bindValue(4, $id, PDO::PARAM_INT); 
            $sql->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function deleteCategoria($id){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "DELETE FROM categoria WHERE id = ?";
            $sql = $conectar->prepare($sql); 
            $sql -> bindValue(1, $id); 
            $sql->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }
        
    }
?>