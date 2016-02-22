<?php
require '../clases/AutoCarga.php';
header('Contet-Type: application/json');
$sesion = new Session();
$bd= new DataBase();
$gestor= new ManageUsuario($bd);
$id = Request::req("id");
$gestorEspera=new ManageEspera($bd);
$usuario=$sesion->get('_usuario');
$email=$usuario->getEmail();
$condicion='idEspera='.$id.'';
$lista=$gestorEspera->getList();

$cont=0;
$bandera=true;

foreach ($lista as $key => $value) {
    if($value->getIdEspera()==$id){
        $cont=$cont+1;
        if($value->getEmail()==$email)
        {   $bandera=false; 
        }
    }
}

$num=$cont+1;
$e=$id.$num;
$ok = json_encode(array('espera' => $id));
$no = json_encode(array('espera' => false));
if($bandera===true)
{

$espera2=new Espera($e,$id,$email);
$gestorEspera->insert($espera2);

    
echo $ok;
    
}
else{

  echo $no;}
  
   
    
    