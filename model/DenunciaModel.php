<?php
    require_once 'Model.php';

    class DenunciaModel extends Model{
        
        function postDenuncia($latitud, $longitud, $mail, $estaCompletada, $descripcion = null){
            $sentencia = $this->db->prepare("INSERT INTO denuncia(latitud, longitud, estaCompleta, descripcion, mail) VALUES(?, ?, ?, ?, ?)");
            if($sentencia->execute(array($latitud, $longitud, $estaCompletada, $descripcion, $mail))){
                return $this->db->lastInsertId();
            }
            else{
                return -1;
            }
        }
    }