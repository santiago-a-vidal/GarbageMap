<?php
require_once('model/Model.php');
require_once('view/View.php');
require_once('clases/EmailHelper.php');

class Controller{
    private $model;
    private $view;
function __construct() {
        $this->model = new Model();
        $this->view = new View();
    }
function mostrarIndex(){
  $this->view->verIndex();
}

function mostrarHome(){
  $this->view->verHome();
}
}
