<?php
require_once 'Cliente.php';
require_once 'Moto.php';
require_once 'Venta.php';
require_once 'Empresa.php';

// Crear clientes
$objCliente1 = new Cliente("Juan", "Pérez", false, "DNI", "12345678");
$objCliente2 = new Cliente("María", "Gómez", false, "DNI", "98765432");

// Crear motos
$objMoto1 = new Moto(11, 2230000, 2022, "Benelli Imperiale 400", 85, true);
$objMoto2 = new Moto(12, 584000, 2021, "Zanella Zr 150 Ohc", 70, true);
$objMoto3 = new Moto(13, 999900, 2023, "Zanella Patagonian Eagle 250", 55, false);

// Crear empresa
$empresa = new Empresa("Alta Gama", "Av Argentina 123", [$objMoto1, $objMoto2, $objMoto3], [$objCliente1, $objCliente2], []);

// Registrar venta 1
$colCodigosMoto1 = [11, 12, 13];
$precioFinal1 = $empresa->registrarVenta($colCodigosMoto1, $objCliente2);
echo "Importe final de la venta 1: $" . $precioFinal1 . "\n";

// Registrar venta 2
$colCodigosMoto2 = [0];
$precioFinal2 = $empresa->registrarVenta($colCodigosMoto2, $objCliente2);
echo "Importe final de la venta 2: $" . $precioFinal2 . "\n";

// Obtener ventas del cliente 2
$ventasCliente2 = $empresa->retornarVentasXCliente("DNI", "98765432");
echo "Ventas del cliente 2:\n";
foreach ($ventasCliente2 as $venta) {
    echo $venta->__toString() . "\n";
}

// Imprimir información de la empresa
echo $empresa->__toString();
