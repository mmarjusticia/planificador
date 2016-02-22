<?php
class Espera {
    private $estado,$idEspera, $email;
    function __construct($estado=null, $idEspera=null, $email=null) {
        $this->estado = $estado;
        $this->idEspera = $idEspera;
        $this->email = $email;
    }
    function getEstado() {
        return $this->estado;
    }

    function getIdEspera() {
        return $this->idEspera;
    }

    function getEmail() {
        return $this->email;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setIdEspera($idEspera) {
        $this->idEspera = $idEspera;
    }

    function setEmail($email) {
        $this->email = $email;
    }

public function getJson() {
        $r = '{';
        foreach ($this as $indice => $valor) {
            $r .= '"' . $indice . '":' . json_encode($valor) . ','; //Se codifican algunos caracteres
        }
        $r = substr($r, 0, -1);
        $r .='}';
        return $r;
    }
    function set($valores, $inicio=0){
        $i = 0;
        foreach ($this as $indice => $valor) {
           $this->$indice = $valores[$i+$inicio];
           $i++;
        }
    }
    
    public function __toString() {
        $r ='';
        foreach ($this as $key => $valor) { 
            $r .= "$valor ";
        }
        return $r;
    }
    
    function read() {
        foreach ($this as $key => $valor){
            $this->$key = Request::req($key);
        }
    }
}
