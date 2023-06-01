<?php
include_once "Cliente.php";
include_once "Venta.php";
include_once "Moto.php";

class Empresa {
    private $denominacion;
    private $direccion;
    private $clientes;
    private $motos;
    private $ventas;

    public function __construct($denominacion, $direccion, $motos, $clientes, $ventas) {
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->clientes = $clientes;
        $this->motos = $motos;
        $this->ventas = $ventas;
    }

    // Métodos de acceso
    public function setDenominacion($denominacion) {
        $this->denominacion = $denominacion;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function setClientes($clientes) {
        $this->clientes = $clientes;
    }

    public function setMotos($motos) {
        $this->motos = $motos;
    }

    public function setVentas($ventas) {
        $this->ventas = $ventas;
    }
    public function getDenominacion() {
        return $this->denominacion;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function getClientes() {
        return $this->clientes;
    }

    public function getMotos() {
        return $this->motos;
    }

    public function getVentas() {
        return $this->ventas;
    }

    public function __toString() {
        $clientesStr = array();
        foreach ($this->getClientes() as $cliente) {
            $clientesStr[] = (string)$cliente;
        }

        $motosStr = array();
        foreach ($this->getMotos() as $moto) {
            $motosStr[] = (string)$moto;
        }

        $ventasStr = array();
        foreach ($this->getVentas() as $venta) {
            $ventasStr[] = (string)$venta;
        }

        return "Denominación: " . $this->getDenominacion() . ", Dirección: " . $this->getDireccion() . ", Clientes: " . implode(", ", $clientesStr) . ", Motos: " . implode(", ", $motosStr) . ", Ventas: " . implode(", ", $ventasStr);
    }

    public function retornarMoto($codigoMoto) {
        $motoEncontrada = null;
        foreach ($this->getMotos() as $moto) {
            if ($moto->getCodigo() == $codigoMoto) {
                $motoEncontrada = $moto;
                break;
            }
        }
        return $motoEncontrada;
    }

/**
 * Registra una venta en la empresa.
 *
 * @param array $colCodigosMoto Array de códigos de moto a incluir en la venta.
 * @param Cliente $objCliente Objeto Cliente que realiza la compra.
 * @return int|false El precio final de la venta si se pudo realizar, o false si no se pudo realizar la venta.
 */
public function registrarVenta($colCodigosMoto, $objCliente) {
    $motosVenta = array();
    $precioFinal = 0;
    foreach ($colCodigosMoto as $codigoMoto) {
        $objMoto = $this->retornarMoto($codigoMoto);
        if ($objMoto && $objMoto->getActiva()) {
            if ($objMoto->darPrecioVenta() != -1) {
                $motosVenta[] = $objMoto;
                $precioFinal += $objMoto->darPrecioVenta();
            }
        }
    }
    if (empty($motosVenta)) {
        return false;
    }
    $venta = new Venta(count($this->getVentas()) + 1, date("Y-m-d"), $objCliente, $motosVenta, $precioFinal);
    foreach ($motosVenta as $moto) {
        $venta->incorporarMoto($moto);
    }
    $this->ventas[] = $venta;
    return $precioFinal;
}

/**
 * Retorna las ventas realizadas por un cliente específico.
 *
 * @param string $tipo El tipo de documento del cliente.
 * @param string $numDoc El número de documento del cliente.
 * @return array El array de ventas realizadas por el cliente.
 */
public function retornarVentasXCliente($tipo, $numDoc) {
    $ventasCliente = array();
    foreach ($this->getVentas() as $venta) {
        $cliente = $venta->getCliente();
        if ($cliente->getTipoDoc() == $tipo && $cliente->getNumDoc() == $numDoc) {
            $ventasCliente[] = $venta;
        }
    }
    return $ventasCliente;
}

}