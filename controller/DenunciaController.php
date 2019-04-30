<?php
    require_once('model/DenunciaModel.php');
    class DenunciaController{
        private $model;

        function __construct() {
            $this->model = new DenunciaModel();
        }
        function test(){
            $response = $this->model->postDenuncia(30, 42, "testmail@mail.com", 0, "just testing");
            echo $response;
        }
    }