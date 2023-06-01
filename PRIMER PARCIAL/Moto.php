<?php
include_once "Cliente.php";
include_once "Venta.php";
include_once "Moto.php";
include_once "Empresa.php";
class Moto {
    private $codigo;
    private $costo;
    private $anioFabricacion;
    private $descripcion;
    private $porcentajeIncrementoAnual;
    private $activa;

    public function __construct($codigo, $costo, $anioFabricacion, $descripcion, $porcentajeIncrementoAnual, $activa) {
        $this->codigo = $codigo;
        $this->costo = $costo;
        $this->anioFabricacion = $anioFabricacion;
        $this->descripcion = $descripcion;
        $this->porcentajeIncrementoAnual = $porcentajeIncrementoAnual;
        $this->activa = $activa;
    }
    //Metodos de acceso
    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function setCosto($costo) {
        $this->costo = $costo;
    }

    public function setAnioFabricacion($anioFabricacion) {
        $this->anioFabricacion = $anioFabricacion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setPorcentajeIncrementoAnual($porcentajeIncrementoAnual) {
        $this->porcentajeIncrementoAnual = $porcentajeIncrementoAnual;
    }

    public function setActiva($activa) {
        $this->activa = $activa;
    }
    public function getCodigo() {
        return $this->codigo;
    }

    public function getCosto() {
        return $this->costo;
    }

    public function getAnioFabricacion() {
        return $this->anioFabricacion;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getPorcentajeIncrementoAnual() {
        return $this->porcentajeIncrementoAnual;
    }

    public function getActiva() {
        return $this->activa;
    }
    //los otros metodos
    public function __toString() {
        return "Código: " . $this->getCodigo() . ", Costo: " . $this->getCosto() . ", Año de fabricación: " . $this->getAnioFabricacion() . ", Descripción: " . $this->getDescripcion() . ", Porcentaje de incremento anual: " . $this->getPorcentajeIncrementoAnual() . ", Activa: " . $this->getActiva();
    }
    
    
    public function darPrecioVenta() {
        if (!$this->getActiva()) {
            return -1;
        }
        $anio = date("Y") - $this->getAnioFabricacion();
        return $this->getCosto() + $this->getCosto() * ($anio * $this->getPorcentajeIncrementoAnual());
    }
}