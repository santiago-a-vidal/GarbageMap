<?php
//clase que facilita la carga del mail y permite enviarlo
class EmailHelper {
    private $mensaje;//mensaje del mail, si es codigo html hay que setearle setHTML()
    private $asunto;//asunto
    private $to;//para quien es el mail
    private $headers;//se usa para indicar si es codigo html o texto plano

    function __construct() {
    }
    //devuelve el mensaje del mail
    public function getMensaje() {
        return $this->mensaje;
    }
    //le setea un mensaje al mail (cuerpo)
    public function setMensaje($msg) {
        if (strlen($msg)< 70)
            $this->mensaje = $msg;
        else
            $this->mensaje = wordwrap($msg,70);
    }
    //devuelve a quien se le esta enviando el mail
    public function getTo(){
        return $this->to;
    }
    //setea a quien se le manda el mail
    public function setTo($mail){
        $this->to = $mail;
    }
    //devuelve el asunto del mail
    public function getAsunto(){
        return $this->asunto;
    }
    //le setea un asunto al mail
    public function setAsunto($nuevoAsunto){
        $this->asunto = $nuevoAsunto;
    }
    //indica que el mensaje es en formato HTML
    public function setHTML(){
        $this->headers = "MIME-Version: 1.0" . "\r\n";
        $this->headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    }
    //le quita la propiedad de ser HTML al mensaje
    public function unsetHTML(){
        $this->headers = "";
    }
    //Envia el mail
    public function enviarEmail(){
        mail($this->getTo(),$this->getAsunto(),$this->getMensaje(),$this->headers);
    }

}
?>