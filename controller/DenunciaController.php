<?php
    require_once('model/DenunciaModel.php');
    require_once('view/DenunciaView.php');
    class DenunciaController{
        private $model;
        private $view;
        function __construct() {
            $this->model = new DenunciaModel();
            $this->view = new DenunciaView();
        }
        function publicarDenuncia(){
            $descripcion = null;
            if($_POST['descripcion']){
                $descripcion = $_POST['descripcion'];
            }
            $routeImagen;
            //aca falta el codigo para hacer el routeo de la imagen
            $response = $this->model->postDenuncia($_POST['latitud'], $_POST['longitud'], $_POST['mail'], $_POST['estaCompletado'], $descripcion, $routeImagen);
            $this->view->denunciaSubida($response);
        }

        function hacerDenuncia(){
            $this->view->formularioDenuncia();
        }
    }