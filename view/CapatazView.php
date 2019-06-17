<?php

class CapatazView {
  private $smarty;

  public function __construct(){
    $this->smarty = new Smarty;
  }

  public function mostraMapa(){ // muestra el div que contendra el mapa de la basura
    $this->smarty->display('mapaBasura.tpl');
  }

}


?>
