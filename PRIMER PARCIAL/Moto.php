<?php
require_once 'Cliente.php';
require_once 'Moto.php';
require_once 'Venta.php';
require_once 'Empresa.php';

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

    public function isActiva() {
        return $this->activa;
    }

/**
 * Calcula y devuelve el precio de venta de la moto.
 *
 * @return float El precio de venta de la moto.
 */
public function darPrecioVenta() {
    if (!$this->isActiva()) {
        return -1;
    }

    $compra = $this->getCosto();
    $anio = date('Y') - $this->getAnioFabricacion();
    $porcentaje = $this->getPorcentajeIncrementoAnual() / 100;

    return $compra + $compra * ($anio * $porcentaje);
}


    public function __toString() {
        return "Moto: " . $this->getDescripcion() . "\n" .
               "Código: " . $this->getCodigo() . "\n" .
               "Costo: $" . $this->getCosto() . "\n" .
               "Año de fabricación: " . $this->getAnioFabricacion() . "\n" .
               "Porcentaje de incremento anual: " . $this->getPorcentajeIncrementoAnual() . "%\n" .
               "Activa: " . ($this->isActiva() ? "Sí" : "No") . "\n";
    }
}
