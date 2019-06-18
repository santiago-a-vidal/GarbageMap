<?php
    require_once 'Model.php';

    class DenunciaModel extends Model{

        function postDenuncia($latitud, $longitud, $mail, $estaCompletada, $descripcion = null, $imagen, $fecha_cumplimiento){
            $destino_final = 'images/' . uniqid() . '.'. $imagen['tipo'];
            move_uploaded_file($imagen['path'], $destino_final);
            $sentencia = $this->db->prepare("INSERT INTO denuncia(latitud, longitud, estaCompletada, descripcion, mail, routeImagen, fecha_cumplimiento) VALUES(?, ?, ?, ?, ?, ?, ?)");
            if($sentencia->execute([$latitud, $longitud, $estaCompletada, $descripcion, $mail, $destino_final, $fecha_cumplimiento])){
                return $this->db->lastInsertId();
            }
            else{
                return -1;
            }
        }

        function getDenunciasIncompletas(){
            $sentencia = $this->db->prepare("SELECT * FROM denuncia WHERE estaCompletada = 0"); // esta funcion toma de la base de datos todas las denuncias sin cumplir
            $sentencia->execute();
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
        }

        function completarDenuncia($idDenuncia){
            $sentencia = $this->db->prepare("UPDATE denuncia SET estaCompletada = 1, fecha_cumplimiento = CURRENT_DATE WHERE id_denuncia = ?");
            if($sentencia->execute(array($idDenuncia))){
                return $idDenuncia;
            }
            else{
                return -1;
            }

        }

        function getDenuncia($id){
            $sentencia = $this->db->prepare("SELECT mail, fecha_cumplimiento FROM denuncia WHERE id_denuncia=?");
            $sentencia->execute([$id]);
            return $sentencia->fetch(PDO::FETCH_ASSOC);
        }

    }
