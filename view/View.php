<?php

class View {  // esta clase se corresponde a la vista del modelo MVC que controla la integracion de las dos entregas,
  private $smarty_page;      //presenta un pagina base con un menu que permite elegir la denuncia

  public function __construct(){
    $this->smarty_page = new Smarty;
  }
  public function verIndex($opc){
      $this->smarty_page->assign('opcion',$opc);
      $this->smarty_page->display('index.tpl');
    }

  public function verHome(){
      $this->smarty_page->display('inicio.tpl');
    }
}
