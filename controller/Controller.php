<?php
require_once('model/Model.php');
require_once('view/View.php');

class Controller{
    private $model;
    private $view;
function __construct() {
        $this->model = new Model();
        $this->view = new View();
    }
function mostrarIndex(){
  $secc="Ciudadano";
  $this->view->verIndex($secc);
}

function mostrarHome(){
  $this->view->verHome();
}
function mostrarMenu(){
  $secc=$_GET['action'];
  $this->view->verIndex($secc);
}

}
