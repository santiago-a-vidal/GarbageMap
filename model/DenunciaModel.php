<?php
    require_once 'Model.php';

    class DenunciaModel extends Model{
        
        function postDenuncia($latitud, $longitud, $mail, $estaCompletada, $descripcion = null, $imagen){
            $destino_final = 'images/' . uniqid() . '.'. $imagen['tipo'];
            move_uploaded_file($imagen['path'], $destino_final);
            $sentencia = $this->db->prepare("INSERT INTO denuncia(latitud, longitud, estaCompletada, descripcion, mail, routeImagen) VALUES(?, ?, ?, ?, ?, ?)");
            if($sentencia->execute(array($latitud, $longitud, $estaCompletada, $descripcion, $mail, $destino_final))){
                return $this->db->lastInsertId();
            }
            else{
                return -1;
            }
        }
    }