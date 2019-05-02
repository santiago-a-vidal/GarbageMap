<?php
require('libs/Smarty.class.php');

class DenunciaView {
  private $smarty;

  public function __construct(){
    $this->smarty = new Smarty;
  }

  public function formularioDenuncia(){
    $this->smarty->display('denunciapage.tpl');
  }
  public function denunciaSubida(){
  }

}


?>
