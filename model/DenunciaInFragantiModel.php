<?php
    require_once 'Model.php';

    class DenunciaInFragantiModel extends Model{
        
        function postDenuncia($latitud, $longitud, $dni, $nombre, $apellido, $direccion, $fecha, $hora, $video, $patente){
            $destino_final = 'videos/' . uniqid() . '.'. $video['tipo']; //prepara el route del video
            move_uploaded_file($video['path'], $destino_final); //mueve el video hacia el route creado arriba
            $sentencia = $this->db->prepare("INSERT INTO denuncia_especial (dni, nombre, apellido, direccion, fecha, hora, longitud, latitud, patente, routeVideo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            //prepara la insercion
            if($sentencia->execute(array($dni, $nombre, $apellido, $direccion, $fecha, $hora, $longitud, $latitud, $patente, $destino_final))){
                return $this->db->lastInsertId();
                //si la sentencia se ejecuta correctamente devuelve el id de insercion
            }
            else{
                return -1;
            }
        }

        function getDenuncia($id_denuncia){
            $sentencia = $this->db->prepare("SELECT * FROM denuncia_especial WHERE id_denuncia = ?");
            $sentencia->execute(array($id_denuncia));
            return $sentencia->fetch(PDO::FETCH_ASSOC);
        }
    }