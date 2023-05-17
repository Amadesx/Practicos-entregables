<?php

require_once 'Pasajero.php';
require_once 'PasajeroVIP.php';
require_once 'PasajeroNecesidadesEspeciales.php';
require_once 'Viaje.php';

// Crear objetos de pasajeros
$pasajero1 = new Pasajero("Juan", "A1", "T123");
$pasajeroVIP1 = new PasajeroVIP("Pedro", "B2", "T456", "VF789", 400);
$pasajeroEspecial1 = new PasajeroNecesidadesEspeciales("María", "C3", "T789", true, true, true);

// Crear objeto de viaje
$viaje1 = new Viaje(1000, 3);

// Vender pasajes
echo "Costo del pasaje para pasajero 1: $" . $viaje1->venderPasaje($pasajero1) . "\n";
echo "Costo del pasaje para pasajero VIP 1: $" . $viaje1->venderPasaje($pasajeroVIP1) . "\n";
echo "Costo del pasaje para pasajero especial 1: $" . $viaje1->venderPasaje($pasajeroEspecial1) . "\n";

// Mostrar información del viaje
echo "Costo total del viaje: $" . $viaje1->getCostoViaje() . "\n";
echo "Costo total abonado por los pasajeros: $" . $viaje1->getCostoAbonado() . "\n";
echo "Cantidad de pasajeros en el viaje: " . count($viaje1->getPasajeros()) . "\n";
echo "Pasajeros en el viaje:\n";
foreach ($viaje1->getPasajeros() as $pasajero) {
    echo $pasajero->getNombre() . "\n";
}
