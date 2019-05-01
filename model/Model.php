<?php
    class Model {
        protected $db;
	    function __construct(){
		    $this->db = $this->Connect();
	    }
        function connect(){
            $user = 'root';
            $pass = '';
            $dbname = 'garbagemap';
            return new PDO('mysql:host=localhost;'.'dbname='.$dbname.';charset=utf8', $user, $pass);
        }
    }