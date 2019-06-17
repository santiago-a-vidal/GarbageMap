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
  function mostrarMapaBasura(){
    $this->view->mostraMapa();
  }
  function getDenuncias(){
    $this->model->getDenunciasIncompletas();
  }


}
