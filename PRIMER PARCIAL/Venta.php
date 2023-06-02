<?php
require_once 'Cliente.php';
require_once 'Moto.php';
require_once 'Venta.php';
require_once 'Empresa.php';

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

/**
 * Incorpora una moto a la venta.
 *
 * @param Moto $objMoto El objeto Moto a incorporar.
 * @return void
 */
public function incorporarMoto($objMoto) {
    if ($objMoto->isActiva()) {
        $this->motos[] = $objMoto;
        $this->precioFinal += $objMoto->darPrecioVenta();
    }
}


/**
 * Devuelve una representación en forma de cadena de la venta.
 *
 * @return string Representación en forma de cadena de la venta.
 */
public function __toString()
{
    $motosStr = '';
    foreach ($this->getMotos() as $moto) {
        $motosStr .= $moto->__toString() . "\n";
    }

    return "Venta número: " . $this->getNumero() . "\n" .
           "Fecha: " . $this->getFecha() . "\n" .
           "Cliente: " . $this->getCliente()->__toString() . "\n" .
           "Motos:\n" . $motosStr .
           "Precio final: $" . $this->getPrecioFinal() . "\n";
}

}
