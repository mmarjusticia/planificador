<?php
class ManageUsuario{
    private $bd = null;
    private $tabla = "usuario";
    
    function __construct(DataBase $bd) {
        $this->bd = $bd;
    }
    
    function get($email){
        //devuelve un objeto de la clase usuario
        $parametros = array();
        $parametros[email] = $email;
        $this->bd->select($this->tabla, "*", "email=:email", $parametros);
        $fila=$this->bd->getRow();
        $usuario = new Usuario();
        $usuario->set($fila);
        return $usuario;
    }
    
    function delete($email){
        $parametros = array();
        $parametros['email'] = $email;
        return $this->bd->delete($this->tabla, $parametros);
    }
    
    
    function deleteUsuarios($parametros){
        return $this->bd->delete($this->tabla, $parametros);
    }
    
  
    
    function set(Usuario $usuario){
        //Update de todos los campos menos el id, el id se usara como el where para el update numero de filas modificadas
        $parametrosSet=array();
        $parametrosSet['email']=$usuario->getEmail();
        $parametrosSet['clave']=$usuario->getClave();
        $parametrosSet['administrador']=$usuario->getAdministrador();
        $parametrosSet['activo']=$usuario->getActivo();
        
        $parametrosWhere = array();
        $parametrosWhere['email'] = $usuario->getEmail();
        return $this->bd->update($this->tabla, $parametrosSet, $parametrosWhere);
        
    }
    
    function insert(Usuario $usuario){
        //Se pasa un objeto usuario y se inserta, se devuelve el email del elemento con el que se ha insertado
        $parametrosSet=array();
        $parametrosSet['email']=$usuario->getEmail();
        $parametrosSet['clave']=$usuario->getClave();
        $parametrosSet['administrador']=$usuario->getAdministrador();
        $parametrosSet['activo']=$usuario->getActivo();
        return $this->bd->insert($this->tabla, $parametrosSet);
    }
    
    function getList($pagina=1, $orden="", $nrpp=Constant::NRPP, $condicion ="1=1", $parametros = array()){
        
        $ordenPredeterminado = "$orden,email";
        if($orden==="" || $orden === null){
            $ordenPredeterminado = "email";
        }
         $registroInicial = ($pagina-1)*$nrpp;
         $this->bd->select($this->tabla, "*", $condicion, $parametros , $ordenPredeterminado , "$registroInicial, $nrpp");
         $r=array();
         while($fila =$this->bd->getRow()){
             $usuario = new Usuario();
             $usuario->set($fila);
             $r[]=$usuario;
         }
         return $r;
    }
    
    function getListJson($pagina=1, $orden="", $nrpp=Constant::NRPP, $condicion ="1=1", $parametros = array()){
        $lista = $this->getList($pagina, $orden, $nrpp, $condicion, $parametros);
        $r = "[ ";
        foreach ($lista as $objeto){
            $r .= $objeto->getJson() . ",";
        }
        $r = substr($r, 0, -1) . "]";
        return $r;
    }
    
     function getValuesSelect(){
        $this->bd->query($this->tabla, "ID, Name", array(), "Name");
        $array = array();
        while($fila=$this->bd->getRow()){
            $array[$fila[0]] = $fila[1];
        }
        return $array;
    }
    
    function count($condicion="1 = 1", $parametros = array()){
        return $this->bd->count($this->tabla, $condicion, $parametros);
    }
}