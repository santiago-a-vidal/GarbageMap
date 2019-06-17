<?php

class CapatazView {
  private $smarty;

  public function __construct(){
    $this->smarty = new Smarty;
  }

  public function mostraMapa(){
    $this->smarty->display('mapaBasura.tpl');
  }

}


?>
