<?php
    require_once('model/DenunciaModel.php');
    require_once('view/DenunciaView.php');
    require_once('model/DenunciaInFragantiModel.php');
    require_once('clases/MailHelper.php');

    class DenunciaController{
        private $model;
        private $modelInFraganti;
        private $view;
        function __construct() {
            $this->model = new DenunciaModel();
            $this->modelInFraganti = new DenunciaInFragantiModel();
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
                $response = $this->model->postDenuncia((float)$_POST['latitud'], (float)$_POST['longitud'], $_POST['mail'], 0, $descripcion, $imagen, null);
                //llama a el feedback por mail
                if ($response==-1){
                    $this->view->denunciaSubida($response,true);
                }else{
                    $this->feedbackMail($response);
                    $this->view->denunciaSubida($response,false);    
                }
                die();
            }
            $response = null;
            $this->view->denunciaSubida($response, true);
        }
        private function feedbackMail($id_denuncia){
            $mail = new Mail();
            $mail->setTo($_POST['mail']);
            $mail->setFrom('luchosan74@gmail.com');
            $mail->setFromName('Sistema GarbageMap');
            $mail->setHtmlContent(
                "<div>
                    <h3>Denuncia Infraganti realizada con exito!</h3>
                    <hr />
                    <dl class='row'>
                        <dt class = 'col-sm-2'>
                            Numero de denuncia:
                        </dt>
                        <dd class = 'col-sm-10'>
                            $id_denuncia
                        </dd>
                    </dl>
                </div>"); 
            $mail->setSubject('Denuncia infraganti N°'.$id_denuncia);
            $mail->enviarMail();
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
                $response = $this->modelInFraganti->postDenuncia((float)$_POST['latitud'], (float)$_POST['longitud'], $_POST['dni'], $_POST['nombre'], $_POST['apellido'], $_POST['direccion'], $_POST['fecha'],$_POST['hora'], $video, $_POST['patente']);
                $denuncia = $this->modelInFraganti->getDenuncia($response);
                $respuesta['success'] = true;
                $respuesta['id'] = $response;
                $this->view->denunciaSubida($response);
                $this->enviarEmailInfraganti($denuncia);
                return json_encode($respuesta);
                die();
            }
            $this->view->denunciaSubida(null, true);
            $respuesta['success'] = false;
            return json_encode($respuesta);
        }
        //funcion que envia mail con el video adjunto
        private function enviarEmailInfraganti($denuncia){
            $mail = new Mail();
            $mail->setTo('santosluciano1705@gmail.com');
            $mail->setFrom('luchosan74@gmail.com');
            $mail->setFromName('Sistema GarbageMap');
            $mail->setObject($denuncia);
            $mail->setSubject('Denuncia infraganti N°'.$denuncia['id_denuncia']);
            $mail->setRouteVideo($denuncia['routeVideo']);
            $mail->setDenunciaFragantiTemplate();
            $mail->enviarMailVideoAttachment();
        }

        private function postVideo(){
            $videoReturn = null;
            $video = $_FILES['video'];
            $tipo = explode('/', $video['type']); //separa el tipo de video en tipo[0] que tipo de archivo es (video, imagen, etc) y tipo[1] la extension
            if($tipo[0] == "video"){ //si es un video
                $videoReturn = array('tipo' => $tipo[1], 'path' => $_FILES['video']['tmp_name']); //regresa un array con la extension y el path temporal del archivo
            }
            return $videoReturn;
        }
    }
