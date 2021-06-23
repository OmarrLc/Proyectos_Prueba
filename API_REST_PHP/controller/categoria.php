<?php
    header("Content-Type: application/json");
    require_once("../config/conexion.php");
    require_once("../models/Categoria.php");
    $categoria = new Categoria();

    $body = json_decode(file_get_contents("php://input"),true);

    switch($_GET["op"]){
        
        case "getAll": 
            $datos = $categoria -> getCategoria();
            echo json_encode($datos);
        break;

        case "getId": 
            $datos = $categoria -> getCategoriaId($body['id']);
            echo json_encode($datos);
        break;

        case "insert": 
            $datos = $categoria -> insertCategoria($body['nombre'], $body['observacion']);
            echo json_encode("Categoria insertada correctamente");
        break;

        case "update": 
            $datos = $categoria -> updateCategoria($body['id'], $body['nombre'], $body['observacion'], $body['estado']);
            echo json_encode("Categoria actualizada correctamente");
        break;

        case "delete": 
            $datos = $categoria -> deleteCategoria($body['id']);
            echo json_encode("Categoria eliminada correctamente");
        break;
    }
?>