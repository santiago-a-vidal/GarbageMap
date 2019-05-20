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

        //denuncia normal
        //muestra el formulario para hacer la denuncia
        function hacerDenuncia(){
            $this->view->formularioDenuncia();
        }
        //carga la denuncia en la base de datos y da un feedback al usuario
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
        //funcion para subir la imagen
        private function postImagen(){
            $imagenReturn = null;
            $imagen = $_FILES['imagen'];
            $tipo = explode('/', $imagen['type']);
            if($tipo[0] == "image"){
                $imagenReturn = array('tipo' => $tipo[1], 'path' => $_FILES['imagen']['tmp_name']);
            }
            return $imagenReturn;
            
        }
        
        //denuncia infraganti
        //Muestra la vista para hacer la denuncia infraganti
        function hacerDenunciaInfraganti(){
            $this->view->formularioDenunciaInfraganti();
        }
        //Se guarda la denuncia infraganti, se envia el mail a la subsecretaria y se da un feedback
        function publicarDenunciaInfraganti(){
            $video = $this->postVideo();
            if($video){
                $response = $this->model->postDenunciaInfraganti((float)$_POST['latitud'], (float)$_POST['longitud'], $_POST['dni'], $_POST['nombre'], $_POST['apellido'], $_POST['dir_testigo'], $_POST['fecha'],$_POST['hora'], $video);
                $this->enviarEmail((float)$_POST['latitud'], (float)$_POST['longitud'], $_POST['dni'], $_POST['nombre'], $_POST['apellido'], $_POST['dir_testigo'], $_POST['fecha'],$_POST['hora'], $video, $response);
                $this->view->denunciaInfragantiSubida($response,false);
                die();
            }
            $response = null;
            $this->view->denunciaInfragantiSubida($response,true);
        }
        //funcion que llama a la clase EmailHelper, 
        //le carga los datos al mail (numero de denuncia y link a la misma) y lo envia
        private function enviarEmail($response){
            $email = new EmailHelper();
            $email->setAsunto('Denuncia Infraganti N°'+$response);
            $msg = '<div>
            <h5>Denuncia Infraganti</h5>
            <hr />
            <dl class="row">
                <dt class = "col-sm-2">
                    Numero de denuncia: 
                </dt>
                <dd class = "col-sm-10">'
                    +$response+
                '</dd>
                <dt class = "col-sm-2">
                    Link a denuncia:
                </dt>
                <dd class = "col-sm-10">
                    www.garbageMap.com/DenunciaInfraganti/'+$response+
                '</dd>
            </dl>
            </div>';
            $email->setMensaje($msg);
            $email->setTo('santosluciano1705@gmail.com');//simula el mail de la subsecretaria
            $email->setHTML();
            $email->enviarEmail();
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
    }


