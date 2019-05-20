<?php
    require_once 'Model.php';

    class DenunciaModel extends Model{
        
        function postDenuncia($latitud, $longitud, $dni, $nombre, $apellido, $dir_testigo, $fecha, $hora, $video){
            $destino_final = 'videos/' . uniqid() . '.'. $imagen['tipo'];
            move_uploaded_file($imagen['path'], $destino_final);
            $sentencia = $this->db->prepare("INSERT INTO denuncia_in_fraganti(latitud, longitud, dni, nombre, apellido, dir_testigo, fecha, hora, route_video) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");
            if($sentencia->execute(array($latitud, $longitud, $dni, $nombre, $apellido, $dir_testigo, $fecha, $hora, $destino_final))){
                return $this->db->lastInsertId();
            }
            else{
                return -1;
            }
        }

        function getDenuncia($id_denuncia){
            $sentencia = $this->db->prepare("SELECT * FROM denuncia_in_fraganti WHERE id_denuncia_in_fraganti = ?");
            $sentencia->execute(arrau($id_denuncia));
            return $sentencia->fetch(PDO::FETCH_ASSOC);
        }
    }