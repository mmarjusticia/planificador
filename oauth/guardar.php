<?php

session_start();

require_once '../../clases/Google/autoload.php';

$cliente = new Google_Client();

$cliente->setApplicationName('proyectoEnviarCorreoDesdeGmail');

$cliente->setClientId('505098225843-sdiumqfakj929lle3rugldjv72ojkpgi.apps.googleusercontent.com'); 

$cliente->setClientSecret('dvjJ435G5shs2um5ZG_vVeBs');

$cliente->setRedirectUri('https://practicausuario-mmarjusticia.c9users.io/oauth/guardar.php');



$cliente->setScopes('https://mail.google.com/');

$cliente->setAccessType('offline');


if (isset($_GET['code'])) {

   $cliente->authenticate($_GET['code']);

   $_SESSION['token'] = $cliente->getAccessToken();

   $archivo = "token.conf";

   $fh = fopen($archivo, 'w') or die("error");

   fwrite($fh, $cliente->getAccessToken()); 
   fclose($fh);

}