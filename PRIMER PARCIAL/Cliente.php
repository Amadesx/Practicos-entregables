<?php
require_once 'Cliente.php';
require_once 'Moto.php';
require_once 'Venta.php';
require_once 'Empresa.php';

class Cliente {
    private $nombre;
    private $apellido;
    private $dadoDeBaja;
    private $tipoDocumento;
    private $numeroDocumento;

    public function __construct($nombre, $apellido, $dadoDeBaja, $tipoDocumento, $numeroDocumento) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->dadoDeBaja = $dadoDeBaja;
        $this->tipoDocumento = $tipoDocumento;
        $this->numeroDocumento = $numeroDocumento;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function isDadoDeBaja() {
        return $this->dadoDeBaja;
    }

    public function getTipoDocumento() {
        return $this->tipoDocumento;
    }

    public function getNumeroDocumento() {
        return $this->numeroDocumento;
    }

    public function __toString() {
        return "Cliente: " . $this->getNombre() . " " . $this->getApellido() . "\n" .
               "Dado de baja: " . ($this->isDadoDeBaja() ? "Sí" : "No") . "\n" .
               "Tipo de documento: " . $this->getTipoDocumento() . "\n" .
               "Número de documento: " . $this->getNumeroDocumento() . "\n";
    }
}
