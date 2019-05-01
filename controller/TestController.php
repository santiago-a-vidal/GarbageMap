<?php
    require_once('model/DenunciaModel.php');
    class TestController{
        private $model;
        function __construct() {
            $this->model = new DenunciaModel();
        }
        function publicarDenuncia(){
            $response = $this->model->postDenuncia(5, 7, 'da', 1, 'please', 'work');
            echo $response;
        }

        function hacerDenuncia(){
            $this->view->formularioDenuncia();
        }
    }