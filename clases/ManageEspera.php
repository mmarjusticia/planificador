<?php
class ManageEspera {

    private $bd = null;
    private $tabla = "espera";
    
    function __construct(DataBase $bd) {
        $this->bd = $bd;
    }
    
    function get($estado){
        //devuelve un objeto de la clase espera
        $parametros = array();
        $parametros[estado] = $estado;
        $this->bd->select($this->tabla, "*", "estado=:estado", $parametros);
        $fila=$this->bd->getRow();
        $espera = new Espera();
        $espera->set($fila);
        return $espera;
    }
    
    function delete($estado){
        $parametros = array();
        $parametros['estado'] = $estado;
        return $this->bd->delete($this->tabla, $parametros);
    }
    
    
    function deleteEsperas($parametros){
        return $this->bd->delete($this->tabla, $parametros);
    }
    
  
    
    function set(Espera $espera){
        //Update de todos los campos menos el id, el id se usara como el where para el update numero de filas modificadas
        $parametrosSet=array();       
        $parametrosSet['estado']=$espera->getEstado();
        $parametrosSet['idEspera']=$espera->getIdEspera();
        $parametrosSet['email']=$espera->getEmail();
        
        $parametrosWhere = array();
        $parametrosWhere['estado']=$espera->getEstado();
        return $this->bd->update($this->tabla, $parametrosSet, $parametrosWhere);
        
    }
    
    function insert(Espera $espera){
        //Se pasa un objeto espera y se inserta, se devuelve el id del elemento con el que se ha insertado
        $parametrosSet=array();
        $parametrosSet['estado']=$espera->getEstado();
        $parametrosSet['idEspera']=$espera->getIdEspera();
        $parametrosSet['email']=$espera->getEmail();
        return $this->bd->insert($this->tabla, $parametrosSet);
    }
    
    function getList($pagina=1, $orden="", $nrpp=Constant::NRPP, $condicion ="1=1", $parametros = array()){
        
        $ordenPredeterminado = "estado";
        if($orden==="" || $orden === null){
            $ordenPredeterminado = "estado";
        }
         $registroInicial = ($pagina-1)*$nrpp;
         $this->bd->select($this->tabla, "*", $condicion, $parametros , $ordenPredeterminado , "$registroInicial, $nrpp");
         $r=array();
         while($fila =$this->bd->getRow()){
             $espera = new Espera();
             $espera->set($fila);
             $r[]=$espera;
         }
         return $r;
    }
     function getListWhere($condicion,$pagina=1, $nrpp=Constant::NRPP){
         $registroInicial = ($pagina-1)*$nrpp;
         $this->bd->select($this->tabla, "*", $condicion, array(), "estado", "$registroInicial, $nrpp");
         $r=array();
         while($fila =$this->bd->getRow()){
             $espera = new Espera();
             $espera->set($fila);
             $r[]=$espera;
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



