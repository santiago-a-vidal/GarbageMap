<?php
require_once('model/DenunciaModel.php');
require_once('view/CapatazView.php');
require_once('clases/MailHelper.php');

class ControllerCapataz{
    private $model;
    private $view;
function __construct() {
        $this->model = new DenunciaModel();
        $this->view = new CapatazView();
}
  function mostrarMapaBasura(){ // llamada a la vista para mostrar el mapa de la basura (solo muestra el mapa los marcadores se agregan despues)
    $this->view->mostraMapa();
  }
  function getDenuncias(){ //esta funcion le solicita al modelo las denuncias sin cumplir, las cuales seran marcadas en el mapa de la basura
    $denuncias=$this->model->getDenunciasIncompletas();
    echo json_encode($denuncias);//se devuelve el arreglo con las denuncias sin cumplir en forma de JSON
  }
  function cumplirDenuncia(){ // Esta funcion implementa el cumplimiento de una denuncia recibe el id de la misma por POST
   $id=(int)$_POST['data'];
   $idRet=$this->model->completarDenuncia($id); // se pasa al id al modelo para que registre el cambio.
   if ($idRet!=-1)
    $this->enviarMailCumplimiento($idRet);
   die();
   echo json_encode($idRet); //retorna un JSON con el id de la denuncia cumplida o -1 en caso de no poder registrar el cumplimiento
  }
  public function enviarMailCumplimiento($id){
    $denuncia = $this->model->getDenuncia($id);
    $fecha = $denuncia['fecha_cumplimiento'];
    $mail = new Mail();
    $mail->setTo($denuncia['mail']);
    $mail->setFrom('luchosan74@gmail.com');
    $mail->setFromName('Sistema GarbageMap');
    $mail->setHtmlContent(
        "<div>
            <hr />
            <h3>La Denuncia $id se completo el dia $fecha</h3>
            <hr />
        </div>"); 
    $mail->setSubject('Denuncia infraganti N°'.$id);
    $mail->enviarMail();

  }
}
