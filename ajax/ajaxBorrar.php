<?php
require '../clases/AutoCarga.php';
header('Contet-Type: application/json');
$sesion = new Session();
$bd=new DataBase();
$bd->erase('reserva');
$bd->erase('espera');
$ok = json_encode(array('reseteo' => true));
echo $ok;