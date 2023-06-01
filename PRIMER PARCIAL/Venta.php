<?php
include_once "Cliente.php";
include_once "Venta.php";
include_once "Moto.php";
include_once "Empresa.php";
class Venta {
    private $numero;
    private $fecha;
    private $cliente;
    private $motos;
    private $precioFinal;

    public function __construct($numero, $fecha, $cliente, $motos, $precioFinal) {
        $this->numero = $numero;
        $this->fecha = $fecha;
        $this->cliente = $cliente;
        $this->motos = $motos;
        $this->precioFinal = $precioFinal;
    }
    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function setCliente($cliente) {
        $this->cliente = $cliente;
    }

    public function setMotos($motos) {
        $this->motos = $motos;
    }

    public function setPrecioFinal($precioFinal) {
        $this->precioFinal = $precioFinal;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getCliente() {
        return $this->cliente;
    }

    public function getMotos() {
        return $this->motos;
    }

    public function getPrecioFinal() {
        return $this->precioFinal;
    }

    public function __toString() {
        $motosStr = array();
        foreach ($this->getMotos() as $moto) {
            $motosStr[] = (string)$moto;
        }
        
        $clienteDadoDeBajaStr = $this->getCliente()->getDadoDeBaja() ? "Sí" : "No";
        
        return "Número: " . $this->getNumero() . ", Fecha: " . $this->getFecha() . ", Cliente: " . $this->getCliente()->__toString() . ", Dado de baja: " . $clienteDadoDeBajaStr . ", Motos: " . implode(", ", $motosStr) . ", Precio final: " . $this->getPrecioFinal();
    }
    
    
    public function incorporarMoto($objMoto) {
        if (!$objMoto->getActiva()) {
            return false;
        }
        $this->motos[] = $objMoto;
        $this->precioFinal += $objMoto->darPrecioVenta();
        return true;
    }
            }