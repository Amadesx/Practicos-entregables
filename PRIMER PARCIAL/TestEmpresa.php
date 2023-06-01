<?php
include_once "Cliente.php";
include_once "Venta.php";
include_once "Moto.php";
include_once "Empresa.php";

$objCliente1 = new Cliente("Juan", "Pérez", false, "DNI", "12345678");
$objCliente2 = new Cliente("María", "González", false, "DNI", "23456789");

$obMoto1 = new Moto(11, 2230000, 2022, "Benelli Imperiale 400", 0.85, true);
$obMoto2 = new Moto(12, 584000, 2021, "Zanella Zr 150 Ohc", 0.7, true);
$obMoto3 = new Moto(13, 999900, 2023, "Zanella Patagonian Eagle 250", 0.55, false);

$empresa = new Empresa("Alta Gama", "Av Argentina 123", array($obMoto1, $obMoto2, $obMoto3), array($objCliente1, $objCliente2), array());

$precioFinal = $empresa->registrarVenta(array($obMoto1->getCodigo(), $obMoto2->getCodigo(), $obMoto3->getCodigo()), $objCliente2);
if ($precioFinal) {
    echo "Precio final de la venta 1: " . $precioFinal . "\n\n";
}

$precioFinal = $empresa->registrarVenta(array($obMoto2->getCodigo(), $obMoto3->getCodigo()), $objCliente1);
if ($precioFinal) {
    echo "Precio final de la venta 2: " . $precioFinal . "\n\n";
}

$ventasCliente1 = $empresa->retornarVentasXCliente("DNI", "12345678");
if (!empty($ventasCliente1)) {
    echo "Ventas realizadas por el cliente 1: \n";
    foreach ($ventasCliente1 as $venta) {
        echo $venta . "\n\n";
    }
} else {
    echo "No se encontraron ventas para el cliente 1\n\n";
}

$ventasCliente2 = $empresa->retornarVentasXCliente("DNI", "23456789");
if (!empty($ventasCliente2)) {
    echo "Ventas realizadas por el cliente 2: \n";
    foreach ($ventasCliente2 as $venta) {
        echo $venta . "\n\n";
    }
} else {
    echo "No se encontraron ventas para el cliente 2\n\n";
}
