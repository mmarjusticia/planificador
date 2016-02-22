<?php
class Reserva {
    private $idReserva, $email,$estado;
    function __construct($idReserva=null, $email=null, $estado=null) {
        $this->idReserva = $idReserva;
        $this->email = $email;
        $this->estado = $estado;
    }
    function getIdReserva() {
        return $this->idReserva;
    }

    function getEmail() {
        return $this->email;
    }

    function getEstado() {
        return $this->estado;
    }

    function setIdReserva($idReserva) {
        $this->idReserva = $idReserva;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setEstado($estado) {
        $this->estado = $estado;
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