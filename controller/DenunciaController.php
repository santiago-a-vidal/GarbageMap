<?php
    require_once('model/DenunciaModel.php');
    require_once('view/DenunciaView.php');
    require_once('clases/EmailHelper.php');
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
            $imagen = $_FILES['imagen'];
            $tipo = explode('/', $imagen['type']);
            if($tipo[0] == "image"){
                $imagenReturn = array('tipo' => $tipo[1], 'path' => $_FILES['imagen']['tmp_name']);
            }
            return $imagenReturn;
            
        }

        function hacerDenuncia(){
            $this->view->formularioDenuncia();
        }
        //Muestra la vista para hacer la denuncia infraganti
        function hacerDenunciaInfraganti(){
            $this->view->formularioDenunciaInfraganti();
        }
        //Se guarda la denuncia infraganti, se envia el mail a la subsecretaria y se da un feedback
        function publicarDenunciaInfraganti(){
            $response = $this->model->postDenunciaInfraganti();
            $this->enviarEmail();
            $this->view->denunciaInfragantiSubida($response);
        }
        //funcion que llama a la clase EmailHelper, le carga los datos al mail y lo envia
        private function enviarEmail(){
            $email = new EmailHelper();
            $email->setMensaje('denuncia subida');
            $email->setTo('santosluciano1705@gmail.com');
            $email->setAsunto('Nueva denuncia infraganti');
            $email->setHTML();
            $email->enviarEmail();
        }

    }