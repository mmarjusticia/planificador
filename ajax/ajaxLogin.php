<?php
require '../clases/AutoCarga.php';
header('Contet-Type: application/json');
$sesion = new Session();
$bd= new DataBase();
$gestor= new ManageUsuario($bd);
$login = Request::req("email");
$clave = Request::req("clave");
$usuario=$gestor->get($login);
$email=$usuario->getEmail();
$ok = json_encode(array('login' => true));
$no = json_encode(array('login' => false));
$admin = json_encode(array('login' => 'admin'));
if($email!=""){
    $claveUsuario=$usuario->getClave();
    $claveCifrada=sha1($clave.Constant::SEMILLA);
    if($claveUsuario===$claveCifrada){
        
        if($usuario->getAdministrador()==1){
            echo $admin;
        }
        else{echo $ok;}
        $sesion->set('_usuario',$usuario);}
    else{
        echo $no;
        $sesion->destroy();}
}
else{
    echo $no;
    $sesion->destroy();
};