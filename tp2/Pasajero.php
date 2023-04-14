<?php

class Pasajero {
    
    private $nombre;
    private $apellido;
    private $num_telefono;
    private $dni;

    public function __construct($nombre, $apellido, $num_telefono, $dni){
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->num_telefono=$num_telefono;
        $this->dni;
    }
    
    public function getNombre(){
        return $this->nombre;
    }

    public function getApellido(){
        return $this->apellido;        
    }

    public function getNum_telefono(){
        return $this->num_telefono;
    }

    public function getDni(){
        return $this->dni;
    }

    public function setNombre($nombre){
        $this->nombre=$nombre;
    } 

    public function setApellido($apellido){
        $this->apellido=$apellido;
    }
    
    public function setNum_telefono($num_telefono){
        $this->num_telefono=$num_telefono;
    }

    public function setDni($dni){
        $this->dni=$dni;
    }
    public function __toString(){
        return "Nombre: " .$this->getNombre(). "Apellido: " .$this->getApellido(). "Numero de telefono: " .$this->getNum_telefono(). "DNI: " .$this->getDni(). "\n";
    }

}
