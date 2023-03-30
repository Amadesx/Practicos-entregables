<?php
require_once 'TP1ViajeFeliz.php';

$viaje = new Viaje("", "", "");
// Inicio un bucle "while(true)" que se ejecutara continuamente hasta que se rompa explicitamente, en este caso con un "exit()". Mas abajo se inicializa la variable "$opcion"
// en null para asegurarse de que la variable está definida antes de que se intente leer su valor. Luego hay otro while dentro del primero, el cual se ejecutara hasta el usuario ingrese
// una opcion valida (1,2,3,4), esta se evalua usando la funcion "in_array()", si la opcion no está en el array ("1", "2", "3", "4") se ejecutará hasta que ingrese una opcion valida
while (true) {
    echo "Menu:\n";
    echo "1. Cargar información del viaje\n";
    echo "2. Modificar información del viaje\n";
    echo "3. Ver información del viaje\n";
    echo "4. Salir\n";
    $opcion = null;
    while (!in_array($opcion, array("1", "2", "3", "4"))) {
        echo "Ingrese una opción válida (1-4): ";
        $opcion = trim(fgets(STDIN));
    }
    // En la opcion 1, pide los datos del viaje al usuario para cargar luego la informacion del viaje
    switch ($opcion) {
        case "1":
            echo "Ingrese el código del viaje: ";
            $codigo = trim(fgets(STDIN));
            echo "Ingrese el destino del viaje: ";
            $destino = trim(fgets(STDIN));
            echo "Ingrese la cantidad máxima de pasajeros: ";
            $cant_max_pasajeros = trim(fgets(STDIN));
            $viaje = new Viaje($codigo, $destino, $cant_max_pasajeros);
            echo "Información del viaje cargada correctamente.\n";
            break;
        case "2":
    // En la opcion 2, toma lo que escribe el usuario para después modificar los datos del viaje
            echo "Ingrese el nuevo código del viaje: ";
            $codigo = trim(fgets(STDIN));
            echo "Ingrese el nuevo destino del viaje: ";
            $destino = trim(fgets(STDIN));
            echo "Ingrese la nueva cantidad máxima de pasajeros: ";
            $cant_max_pasajeros = trim(fgets(STDIN));
            $viaje->setCodigo($codigo);
            $viaje->setDestino($destino);
            $viaje->setCantMaxPasajeros($cant_max_pasajeros);
            echo "Información del viaje modificada correctamente.\n";
            break;
        case "3":
    // En la opcion 3, simplemente muestra en la terminal los datos del viaje
            echo "Código del viaje: " . $viaje->getCodigo() . "\n";
            echo "Destino del viaje: " . $viaje->getDestino() . "\n";
            echo "Cantidad máxima de pasajeros: " . $viaje->getCantMaxPasajeros() . "\n";
            break;
        case "4":
            exit();
    }
}
