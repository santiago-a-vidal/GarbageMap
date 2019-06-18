<?php

class ConfigApp
{
    public static $ACTION = 'action';
    public static $PARAMS = 'params';
    public static $ACTIONS = [
      'hacerDenuncia' => 'DenunciaController#hacerDenuncia',
      'publicarDenuncia' => 'DenunciaController#publicarDenuncia',
      'hacerDenunciaInfraganti' => 'DenunciaController#hacerDenunciaInfraganti',
      'publicarDenunciaInfraganti' => 'DenunciaController#publicarDenunciaInfraganti',
      '' =>'Controller#mostrarIndex',
      'home' =>'Controller#mostrarHome',
      'Ciudadano'=>'Controller#mostrarMenu',
      'Capataz'=>'Controller#mostrarMenu',
      'mapaBasura'=>'ControllerCapataz#mostrarMapaBasura',
      'marcadores'=>'ControllerCapataz#getDenuncias',
      'cumplirDenuncia'=>'ControllerCapataz#cumplirDenuncia'


    ];

}

 ?>
