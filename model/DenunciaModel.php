<?php
    require_once 'Model.php';

    class DenunciaModel extends Model{
        
        function postDenuncia($latitud, $longitud, $mail, $estaCompletada, $descripcion = null, $route){
            $sentencia = $this->db->prepare("INSERT INTO denuncia(latitud, longitud, estaCompletada, descripcion, mail, routeImagen) VALUES(?, ?, ?, ?, ?, ?)");
            if($sentencia->execute(array($latitud, $longitud, $estaCompletada, $descripcion, $mail, $route))){
                return $this->db->lastInsertId();
            }
            else{
                return -1;
            }
        }
    }