<?php
class ResponsableV{
    private $num_empleado;
    private $num_licencia;
    private $nombre;
    private $apellido;

    public function __construct($num_empleado, $num_licencia, $nombre, $apellido){
        $this->num_empleado=$num_empleado;
        $this->num_licencia=$num_licencia;
        $this->nombre=$nombre;
        $this->apellido=$apellido;
    }
    public function getNum_empleado(){
        return $this->num_empleado;
    }
    public function getNum_licencia(){
        return $this->num_licencia;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;        
    }
    public function setNum_empleado($num_empleado){
        $this->num_empleado=$num_empleado;
    }
    public function setNum_licencia($num_licencia){
        $this->num_licencia=$num_licencia;
    }
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }
    public function setApellido($apellido){
        $this->apellido=$apellido;
    }
    public function __toString(){
        return "Nombre: " .$this->getNombre(). "Apellido: " .$this->getApellido(). "Numero de empleado: " .$this->getNum_empleado(). "Numero de licencia: " .$this->getNum_Licencia(). "\n";
    }
}