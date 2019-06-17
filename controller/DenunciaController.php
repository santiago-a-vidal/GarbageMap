<?php
    require_once('model/DenunciaModel.php');
    require_once('view/DenunciaView.php');
    require_once('model/DenunciaInFragantiModel.php');
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
                $this->feedbackMail(array('mail' => $_POST['mail'], 'id_denuncia' => $response));

                $this->view->denunciaSubida($response,false);
                die();
            }
            $response = null;
            $this->view->denunciaSubida($response, true);
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
                $this->enviarEmail($denuncia);
                return json_encode($respuesta);
                die();
            }
            $this->view->denunciaSubida(null, true);
            $respuesta['success'] = false;
            return json_encode($respuesta);
        }
        //funcion que envia mail con el video adjunto
        private function enviarEmail($denuncia){
            //mail que simula ser el de la secretaria
            $to = 'santosluciano1705@gmail.com';
            //envia el mail
            $from = 'luchosan74@gmail.com';
            $fromName = 'Sistema GarbageMap';
            $id = $denuncia['id_denuncia'];
            $dni = $denuncia['dni'];
            $nombrecompleto = $denuncia['nombre'].' '.$denuncia['apellido'];
            $direccion = $denuncia['direccion'];
            $fecha = $denuncia['fecha'].' '.$denuncia['hora'];
            $patente = $denuncia['patente'];
            $ubicacion = $denuncia['latitud'].', '.$denuncia['longitud'];
            //asunto del mail
            $subject = 'Denuncia infraganti N°'.$id;

            //video a adjuntar
            $file = $denuncia['routeVideo'];

            //cuerpo del mail
            $htmlContent = "<div>
            <h3>Denuncia Infraganti</h3>
            <hr />
            <dl class='row'>
                <dt class = 'col-sm-2'>
                    Numero de denuncia:
                </dt>
                <dd class = 'col-sm-10'>
                    $id
                </dd>
                <dt class = 'col-sm-2'>
                    Nombre y apellido del testigo:
                </dt>
                <dd class = 'col-sm-10'>
                    $nombrecompleto
                </dd>
                <dt class = 'col-sm-2'>
                    DNI del testigo:
                </dt>
                <dd class = 'col-sm-10'>
                    $dni
                </dd>
                <dt class = 'col-sm-2'>
                    Direccion del testigo:
                </dt>
                <dd class = 'col-sm-10'>
                    $direccion
                </dd>
                <dt class = 'col-sm-2'>
                    Fecha del hecho:
                </dt>
                <dd class = 'col-sm-10'>
                    $fecha
                </dd>
                <dt class = 'col-sm-2'>
                    Patente del infractor:
                </dt>
                <dd class = 'col-sm-10'>
                    $patente
                </dd>
                <dt class = 'col-sm-2'>
                    Ubicacion de infraccion (latitud y longitud):
                </dt>
                <dd class = 'col-sm-10'>
                    $ubicacion
                </dd>
            </dl>
            </div>";

            $headers = "From: $fromName"." <".$from.">";
            $semi_rand = md5(time());
            $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
            $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";
            $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
            "Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n";
            //adjunta el video
            if(!empty($file) > 0){
                if(is_file($file)){
                    $message .= "--{$mime_boundary}\n";
                    $fp =    fopen($file,"rb");
                    $data =  fread($fp,filesize($file));

                    fclose($fp);
                    $data = chunk_split(base64_encode($data));
                    $message .= "Content-Type: application/octet-stream; name=\"".basename($file)."\"\n" .
                    "Content-Description: ".basename($file)."\n" .
                    "Content-Disposition: attachment;\n" . " filename=\"".basename($file)."\"; size=".filesize($file).";\n" .
                    "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
                }
            }
            $message .= "--{$mime_boundary}--";
            $returnpath = "-f" . $from;
            //envia el mail
            mail($to, $subject, $message, $headers, $returnpath);
        }

        private function feedbackMail($denuncia){
            //mail de denunciante
            $to = $denuncia['mail'];
            //envia el mail
            $from = 'luchosan74@gmail.com';
            $fromName = 'Sistema GarbageMap';
            $id = $denuncia['id_denuncia'];
            $subject = 'Denuncia GarbageMap';

            //cuerpo del mail
            $htmlContent = "<div>
            <h3>Denuncia Infraganti</h3>
            <hr />
            <dl class='row'>
                <dt class = 'col-sm-2'>
                    se ha recibido su denuncia correctamente, su numero de denuncia es::
                </dt>
                <dd class = 'col-sm-10'>
                    $id
                </dd>
            </dl>
            </div>";

            $headers = "From: $fromName"." <".$from.">";
            $semi_rand = md5(time());
            $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
            $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";
            $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
            "Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n";
            $message .= "--{$mime_boundary}--";
            $returnpath = "-f" . $from;
            //envia el mail
            mail($to, $subject, $message, $headers, $returnpath);
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
