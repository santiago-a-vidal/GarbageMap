<?php

class ConfigApp
{
    public static $ACTION = 'action';
    public static $PARAMS = 'params';
    public static $ACTIONS = [
      'hacerDenuncia' => 'DenunciaController#hacerDenuncia',
      'publicarDenuncia' => 'DenunciaController#publicarDenuncia',
      'test' => 'testController#publicarDenuncia',
    ];

}

 ?>