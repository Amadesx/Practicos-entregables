<?php

// Objeto Pasajero
class Pasajero {
    private $nombre;
    private $apellido;
    private $telefono;
    private $dni;

    public function __construct($nombre, $apellido, $telefono, $dni) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->telefono = $telefono;
        $this->dni = $dni;
    }
    
    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function getDni() {
        return $this->dni;
    }

    public function setDni($dni) {
        $this->dni = $dni;
    }

    public function __toString() {
        return "- Nombre: " . $this->getNombre() ."\n". "- Apellido: " . $this->getApellido(). "\n" . "- Telefono: " . $this->getTelefono()."\n" . "- DNI: " . $this->getDni(). "\n";
    }
}
