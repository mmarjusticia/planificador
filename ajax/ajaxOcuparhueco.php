<?php
require '../clases/AutoCarga.php';
header('Contet-Type: application/json');
$sesion = new Session();
$bd= new DataBase();
$gestorEspera=new ManageEspera($bd);
$gestorReserva=new ManageReserva($bd);
$id = Request::req("id");
$dia=substr($id,0, 1);
$hora=substr($id,1,2);
if($dia=='l'){
    $d='lunes';}
if($dia=='m'){
    $d='martes';}
if($dia=='x'){
    $d='miercoles';}
if($dia=='j'){
    $d=='jueves';
}
if($dia=='v'){
    $d='viernes';}
if($dia=='s'){
    $d='sábado';}
if($dia=='d'){
    $d='domingo';}

$lista=$gestorEspera->getList();

$bandera=false;
foreach ($lista as $key => $value) {
        if($value->getIdEspera()==$id){
            $estado=$value->getEstado();
            $e=$value->getEmail();
            $bandera=true;
        }}
$ok = json_encode(array('mover' => true));
$no = json_encode(array('mover' => false));
$error=json_encode(array('mover' => 'error'));
        
    
    if($bandera==true){
            $reserva=new Reserva($id,$e,1);
            $gestorReserva->insert($reserva);
            $gestorEspera->delete($estado);
            
            $origen='mmarjusticia@gmail.com';
            $destino=''.$e.'';
            $asunto="Reserva del pabellón municipal";
            $mensaje="se le ha asignado una cita el ".$d."  a las ".$hora."horas";
            require_once '../clases/Google/autoload.php';
            require_once '../clases/class.phpmailer.php';  //las últimas versiones también vienen con autoload
            $cliente = new Google_Client();
            $cliente->setApplicationName('enviarCorreoDesdeGmail');
            $cliente->setClientId('505098225843-sdiumqfakj929lle3rugldjv72ojkpgi.apps.googleusercontent.com');
            $cliente->setClientSecret('dvjJ435G5shs2um5ZG_vVeBs');
            $cliente->setRedirectUri('https://planificador-mmarjusticia.c9users.io/oauth/guardar.php');
            $cliente->setScopes('https://www.googleapis.com/auth/gmail.compose');
            $cliente->setAccessToken(file_get_contents('../oauth/token.conf'));
        if ($cliente->getAccessToken()) {
             $service = new Google_Service_Gmail($cliente);
            try {
                $mail = new PHPMailer();
                $mail->CharSet = "UTF-8";
                $mail->From = $origen;
                $mail->FromName = $destino;
                $mail->AddAddress($destino);
                $mail->AddReplyTo($origen, $destino);
                $mail->Subject = $asunto;
                $mail->Body = $mensaje;
                $mail->preSend();
                $mime = $mail->getSentMIMEMessage();
                $mime = rtrim(strtr(base64_encode($mime), '+/', '-_'), '=');
                $mensaje = new Google_Service_Gmail_Message();
                $mensaje->setRaw($mime);
                $service->users_messages->send('me', $mensaje);
                echo $ok;
                } catch (Exception $e) {
                        print($e->getMessage());
                }   
            }
        else{
            echo $error;
            }
    }
        
//------------------------------------------------
            
            
    if($bandera==false){
            echo $no;
    }
    





   
    
    