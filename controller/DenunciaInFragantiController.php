function publicarDenunciaInFraganti(){
            $video = $this->postImagen();
            if($video){
                $response = $this->model->postDenuncia((float)$_POST['latitud'], (float)$_POST['longitud'], $_POST['mail'], $_POST['estaCompletado'], $descripcion, $imagen);
                $this->view->denunciaSubida($response,false);
                die();
            }
            //el modelo recibe el $video
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