<?php
require '../clases/AutoCarga.php';
header('Contet-Type: application/json');
$sesion = new Session();
$no = json_encode(array('login' => false));
$pagina=  Request::req("pagina");


if($sesion->isLogged()){
    $bd = new DataBase();
    $gestor = new ManageReserva($bd);
   
    $reservas = $gestor->getListJson();
        echo '{"estado":' .$reservas. '}';
    $bd->close();
}else{
    echo $no;
}