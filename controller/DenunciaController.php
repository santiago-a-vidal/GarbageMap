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
            $imagen = $this->postImagen();
            if($imagen){
                $response = $this->model->postDenuncia((float)$_POST['latitud'], (float)$_POST['longitud'], $_POST['mail'], $_POST['estaCompletado'], $descripcion, $imagen);
                $this->view->denunciaSubida($response,false);
                die();
            }
            $response = null;
            $this->view->denunciaSubida($response,true);
        }

        private function postImagen(){
            $imagenReturn = null;
            print_r($_FILES['imagen']);
            $imagen = $_FILES['imagen'];
            $tipo = explode('/', $imagen['type']);
            if($tipo[0] == "image"){
                $imagenReturn = array('tipo' => $tipo[1], 'path' => $_FILES['imagen']['tmp_name']);
            }
            return $imagenReturn;
            
        }

        private function postVideo(){
            $videoReturn = null;
            $video = $_FILES['video'];
            $tipo = explode('/', $video['type']);
            if($tipo[0] == "video"){
                $videoReturn = array('tipo' => $tipo[1], 'path' => $_FILES['video']['tmp_name']);
            }
            return $videoReturn;
        }

        function hacerDenuncia(){
            $this->view->formularioDenuncia();
        }

    }