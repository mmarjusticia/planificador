<?php
require '../clases/AutoCarga.php';
header('Contet-Type: application/json');
$sesion = new Session();
$bd= new DataBase();
$gestor= new ManageUsuario($bd);
$id = Request::req("id");
$gestorReserva=new ManageReserva($bd);
$reserva=$gestorReserva->get($id);
$estado=$reserva->getEstado();
$idreserva=$reserva->getIdReserva();
$usuario=$sesion->get('_usuario');
$email=$usuario->getEmail();
$emailReserva=$reserva->getEmail();
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
$ok = json_encode(array('reserva' => $idreserva));
$no = json_encode(array('reserva' => true));
$propia=json_encode(array('reserva' => 'propia'));
$error=json_encode(array('reserva' => 'error'));

if($estado==1){
    if($email==$emailReserva){
         $gestorReserva->delete($id);
          $origen='mmarjusticia@gmail.com';
            $destino=''.$email.'';
            $asunto="CANCELACIÓN DE RESERVA del pabellón municipal";
            $mensaje="Ha cancelado la cita el  ".$d."  a las ".$hora."horas";
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
                echo $propia;
                } catch (Exception $e) {
                        print($e->getMessage());
                }   
            }
        else{
            echo $error;
            }
       
        
    }
    else{
        
     echo $ok;}
     }
else{
    
    $reserva3= new Reserva($id,$email,1);
    $gestorReserva->insert($reserva3);
    $origen='mmarjusticia@gmail.com';
            $destino=''.$email.'';
            $asunto="Reserva del pabellón municipal";
            $mensaje="se le ha asignado una cita el  ".$d."  a las ".$hora."horas";
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
                echo $no;
                } catch (Exception $e) {
                        print($e->getMessage());
                }   
            }
        else{
            echo $error;
            }
    
    }
      
   
