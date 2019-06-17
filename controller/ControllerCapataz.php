<?php
require_once('model/DenunciaModel.php');
require_once('view/CapatazView.php');

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
    $this->model->getDenunciasIncompletas();
  }


}
