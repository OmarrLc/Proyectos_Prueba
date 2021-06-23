<?php
    require_once("../src/config/conexion.php");
    
    class Cliente{

        public function getClientes(){
          $sql = "SELECT * FROM cliente";
            try{
                $conexion = new Conexion();
                $conexion = $conexion->connect();
                $resultado = $conexion->query($sql);

                if ($resultado->rowCount() > 0){
                    $clientes = $resultado->fetchAll(PDO::FETCH_OBJ);
                    return json_encode($clientes);
                }else{
                    return json_encode("No existen clientes en la BD");
                }
                $resultado = null;
                $conexion = null;
            }catch(PDOException $e){
                echo '{"error " : ' .$e->getMessage().'}'; 
            }
        }

        public function getClienteId($id){
            $sql = "SELECT * FROM cliente WHERE id= :id";
              try{
                  $conexion = new Conexion();
                  $conexion = $conexion->connect();
                  $resultado = $conexion->prepare($sql);

                  $resultado->bindParam('id', $id);
                  $resultado->execute();
  
                  if ($resultado->rowCount() > 0){
                      $cliente = $resultado->fetchAll(PDO::FETCH_OBJ);
                      return json_encode($cliente);
                  }else{
                      return json_encode("No existen cliente con el ID:" .$id. "en la BD");
                  }
                  $resultado = null;
                  $conexion = null;
              }catch(PDOException $e){
                  echo '{"error " : ' .$e->getMessage().'}'; 
              }
          }

          public function insertCliente($nombre,$apellido,$telefono,$email){
            $sql = "INSERT INTO cliente (nombre, apellido, telefono, email) VALUE (:nombre,:apellido,:telefono,:email)";
              try{
                  $conexion = new Conexion();
                  $conexion = $conexion->connect();
                  $resultado = $conexion->prepare($sql);

                  $resultado->bindParam('nombre', $nombre);
                  $resultado->bindParam('apellido', $apellido);
                  $resultado->bindParam('telefono', $telefono);
                  $resultado->bindParam('email', $email);
                  $resultado->execute();
                  return json_encode("Cliente agregado Exitosamente");
                  $resultado = null;
                  $conexion = null;
              }catch(PDOException $e){
                  echo '{"error " : ' .$e->getMessage().'}'; 
              }
          }

          public function updateCliente($id,$nombre,$apellido,$telefono,$email){
            $sql = "UPDATE cliente SET nombre = :nombre,
                                    apellido = :apellido, 
                                    telefono = :telefono,
                                    email = :email
                                    WHERE id = :id";
              try{
                  $conexion = new Conexion();
                  $conexion = $conexion->connect();
                  $resultado = $conexion->prepare($sql);

                  $resultado->bindParam('nombre', $nombre);
                  $resultado->bindParam('apellido', $apellido);
                  $resultado->bindParam('telefono', $telefono);
                  $resultado->bindParam('email', $email);
                  $resultado->bindParam('id', $id);
                  $resultado->execute();
                  return json_encode("Cliente modificado Exitosamente");
                  $resultado = null;
                  $conexion = null;
              }catch(PDOException $e){
                  echo '{"error " : ' .$e->getMessage().'}'; 
              }
          }
          
          public function deleteCliente($id){
            $sql = "DELETE FROM cliente WHERE id= :id";
              try{
                  $conexion = new Conexion();
                  $conexion = $conexion->connect();
                  $resultado = $conexion->prepare($sql);

                  $resultado->bindParam('id', $id);
                  $resultado->execute();
                  return json_encode("Cliente eliminado Exitosamente");
                  $resultado = null;
                  $conexion = null;
              }catch(PDOException $e){
                  echo '{"error " : ' .$e->getMessage().'}'; 
              }
          }
    }
?>



