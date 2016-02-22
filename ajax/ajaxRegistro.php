<?php
require '../clases/AutoCarga.php';
header('Contet-Type: application/json');
$sesion = new Session();
$bd= new DataBase();
$gestor= new ManageUsuario($bd);
$login = Request::req("emailR");
$clave = Request::req("clave");
$claveRepetida=Request::req("claveR");
$usuario=$gestor->get($login);
$email=$usuario->getEmail();
$ok = json_encode(array('registro' => true));
$no = json_encode(array('registro' => false));
if($email!=""){
     echo $no;
     $sesion->destroy();}
else{
    if($clave===$claveRepetida){
        $claveCifrada=sha1($clave.Constant::SEMILLA);
        $usuario2=new Usuario($login,$claveCifrada,0,0); 
        $gestor->insert($usuario2);
        echo $ok;}
      
    else{ echo $no;} }
