<?php
class Mail {
    private $objectTemplate = null; //objeto con datos para el mail
    private $to; //a quien se le envia el mail
    private $from; //quien envia el mail
    private $fromName;//nombre del enviador de mail que va a figurar
    private $htmlContent;//contenido del mail
    private $subject; //asunto
    private $routeVideo;

    function __construct() {
    }
    public function setTo($para){
        $this->to = $para;
    }
    public function setFrom($de){
        $this->from = $de;
    }
    public function setFromName($deNombre){
        $this->fromName = $deNombre;
    }
    public function setSubject($asunto){
        $this->subject = $asunto;
    }
    public function setObject($object){
        $this->objectTemplate = $object;   
    }
    public function setRouteVideo($ruta){
        $this->routeVideo = $ruta;
    }
    //funcion que envia mail con el archivo adjunto
    public function enviarMailVideoAttachment(){
        //video a adjuntar
        $file = $this->routeVideo;        
        $headers = "From: ".$this->fromName." <".$this->from.">";
        $semi_rand = md5(time());
        $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
        $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";
        $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
                      "Content-Transfer-Encoding: 7bit\n\n" . $this->htmlContent . "\n\n";
        //adjunta el video
        if(!empty($file) > 0){
            if(is_file($file)){
                $message .= "--{$mime_boundary}\n";
                $fp =    fopen($file,"rb");
                $data =  fread($fp,filesize($file));        
                fclose($fp);
                $data = chunk_split(base64_encode($data));
                $message .= "Content-Type: application/octet-stream; name=\"".basename($file)."\"\n" .
                            "Content-Description: ".basename($file)."\n" .
                            "Content-Disposition: attachment;\n" . " filename=\"".basename($file)."\"; size=".filesize($file).";\n" .
                            "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
            }
        }
        $message .= "--{$mime_boundary}--";
        $returnpath = "-f" . $this->from;
        //envia el mail
        mail($this->to, $this->subject, $message, $headers, $returnpath);
    } 
    public function enviarMail(){
        $headers = "From: ".$this->fromName." <".$this->from.">";
        $headers .= "\nMIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        mail($this->to, $this->subject, $this->htmlContent, $headers);
    }
    //template especial para el mail de denuncia infraganti       
    public function setDenunciaFragantiTemplate(){
        $id = $this->objectTemplate['id_denuncia'];
        $dni = $this->objectTemplate['dni'];
        $nombrecompleto = $this->objectTemplate['nombre'].' '.$this->objectTemplate['apellido'];
        $direccion = $this->objectTemplate['direccion'];
        $fecha = $this->objectTemplate['fecha'].' '.$this->objectTemplate['hora'];
        $patente = $this->objectTemplate['patente'];
        $ubicacion = $this->objectTemplate['latitud'].', '.$this->objectTemplate['longitud'];
        $this->htmlContent = "<div>
        <h3>Denuncia Infraganti</h3>
        <hr />
            <dl class='row'>
                <dt class = 'col-sm-2'>
                    Numero de denuncia:
                </dt>
                <dd class = 'col-sm-10'>
                    $id
                </dd>
                <dt class = 'col-sm-2'>
                    Nombre y apellido del testigo:
                </dt>
                <dd class = 'col-sm-10'>
                    $nombrecompleto
                </dd>
                <dt class = 'col-sm-2'>
                    DNI del testigo:
                </dt>
                <dd class = 'col-sm-10'>
                    $dni
                </dd>
                <dt class = 'col-sm-2'>
                    Direccion del testigo:
                </dt>
                <dd class = 'col-sm-10'>
                    $direccion
                </dd>
                <dt class = 'col-sm-2'>
                    Fecha del hecho:
                </dt>
                <dd class = 'col-sm-10'>
                    $fecha
                </dd>
                <dt class = 'col-sm-2'>
                    Patente del infractor:
                </dt>
                <dd class = 'col-sm-10'>
                    $patente
                </dd>
                <dt class = 'col-sm-2'>
                    Ubicacion de infraccion (latitud y longitud):
                </dt>
                <dd class = 'col-sm-10'>
                    $ubicacion
                </dd>
            </dl>
        </div>";       
    }
    public function setHtmlContent($content){
        $this->htmlContent = $content;
    }

}
?>