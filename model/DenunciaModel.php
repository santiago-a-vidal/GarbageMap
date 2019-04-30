<?php
    require_once 'Model.php';

    class DenunciaModel{
        protected $db;
	    function __construct(){
		    $this->db = $this->Connect();
	    }
        function connect(){
            $user = 'root';
            $pass = '';
            $dbname = 'testreloco';
            return new PDO('mysql:host=localhost;'.'dbname='.$dbname.';charset=utf8', $user, $pass);
        }
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