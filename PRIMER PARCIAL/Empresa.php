<?php
require_once 'Cliente.php';
require_once 'Moto.php';
require_once 'Venta.php';
require_once 'Empresa.php';

class Empresa {
    private $denominacion;
    private $direccion;
    private $clientes;
    private $motos;
    private $ventasRealizadas;

    public function __construct($denominacion, $direccion, $motos, $clientes, $ventasRealizadas) {
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->motos = $motos;
        $this->clientes = $clientes;
        $this->ventasRealizadas = $ventasRealizadas;
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

    public function getVentasRealizadas() {
        return $this->ventasRealizadas;
    }

/**
 * Retorna el objeto de moto correspondiente al código especificado.
 *
 * @param string $codigoMoto El código de la moto a buscar.
 * @return Moto|null El objeto de moto correspondiente al código, o null si no se encontró ninguna coincidencia.
 */
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
 * Registra una venta con las motos correspondientes para un cliente dado.
 *
 * @param array    $colCodigosMoto Un arreglo de códigos de moto para incluir en la venta.
 * @param Cliente  $objCliente     El objeto Cliente asociado a la venta.
 * @return float                   El precio final de la venta.
 */
public function registrarVenta($colCodigosMoto, $objCliente) {
    $motosVenta = array();
    $precioFinal = 0;

    // Iterar sobre los códigos de moto proporcionados
    foreach ($colCodigosMoto as $codigoMoto) {
        $moto = $this->retornarMoto($codigoMoto);
        
        // Verificar si la moto existe y está activa
        if ($moto != null && $moto->isActiva()) {
            $motosVenta[] = $moto;
            $precioFinal += $moto->darPrecioVenta();
        }
    }

    // Crear una nueva venta
    $venta = new Venta(count($this->getVentasRealizadas()) + 1, date('Y-m-d'), $objCliente, [], $precioFinal);

    // Incorporar las motos a la venta
    foreach ($motosVenta as $motoVenta) {
        $venta->incorporarMoto($motoVenta);
    }

    // Agregar la venta a la lista de ventas realizadas
    $this->ventasRealizadas[] = $venta;

    // Devolver el precio final de la venta
    return $precioFinal;
}

    public function retornarVentasXCliente($tipo, $numDoc) {
        $ventasCliente = array();

        foreach ($this->getVentasRealizadas() as $venta) {
            $cliente = $venta->getCliente();
            if ($cliente->getTipoDocumento() == $tipo && $cliente->getNumeroDocumento() == $numDoc) {
                $ventasCliente[] = $venta;
            }
        }

        return $ventasCliente;
    }

    public function __toString()
    {
        $clientesStr = '';
        foreach ($this->getClientes() as $cliente) {
            $clientesStr .= $cliente->__toString() . "\n";
        }
    
        $motosStr = '';
        foreach ($this->getMotos() as $moto) {
            $motosStr .= $moto->__toString() . "\n";
        }
    
        $ventasStr = '';
        foreach ($this->getVentasRealizadas() as $venta) {
            $ventasStr .= $venta->__toString() . "\n";
        }
    
        return "Empresa: " . $this->getDenominacion() . "\n" .
               "Dirección: " . $this->getDireccion() . "\n" .
               "Clientes:\n" . $clientesStr .
               "Motos:\n" . $motosStr .
               "Ventas realizadas:\n" . $ventasStr;
    }
}
