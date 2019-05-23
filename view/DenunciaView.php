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

  public function formularioDenunciaInfraganti(){  //Se agrego el manejador de la vista que muestra el formulario de la denuncia infraganti
    $this->smarty->display('denunciaInFraganti.tpl');
  }

  public function denunciaSubida($response,$error = false){
    $this->smarty->assign('response',$response);
    $this->smarty->assign('error',$error);
    $this->smarty->display('denunciasubida.tpl');
  }

  function testForm(){
    $this->smarty->display('denunciaInFraganti.tpl');
  }
}


?>
