<?php
require_once 'ViajeFeliz.php';

$viaje = new Viaje("", "", "");
while (true) {
    echo "Menu:\n";
    echo "1. Cargar información del viaje\n";
    echo "2. Modificar información del viaje\n";
    echo "3. Ver información del viaje\n";
    echo "4. Agregar pasajero\n";
    echo "5. Eliminar pasajero\n";
    echo "6. Modificar nombre de algun pasajero\n";
    echo "7. Modificar apellido de algun pasajero\n";
    echo "8. Modificar DNI de algun pasajero\n";
    echo "9. Salir\n";
    $opcion = null;
    while (!in_array($opcion, array("1", "2", "3", "4", "5", "6", "7", "8", "9"))) {
        echo "Ingrese una opción válida (1-9): ";
        $opcion = trim(fgets(STDIN));
    }
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
            echo $viaje;
            break;
        case "4":
            echo "Ingrese el nombre del pasajero: ";
            $nombre = trim(fgets(STDIN));
            echo "Ingrese el apellido del pasajero: ";
            $apellido = trim(fgets(STDIN));
            echo "Ingrese el número de documento del pasajero: ";
            $dni = trim(fgets(STDIN));
            $viaje->agregarPasajero($nombre, $apellido, $dni);
            break;
        case "5":
            echo "Ingrese el número de documento del pasajero a eliminar: ";
            $dni = trim(fgets(STDIN));
            $viaje->eliminarPasajero($dni);
            break;
            
        case "6":
            echo "Ingrese el DNI del pasajero que quiera modificar su nombre: ";
            $dni = trim(fgets(STDIN));
            echo "ingrese el nuevo nombre: ";
            $nuevo_nombre = trim(fgets(STDIN));
            $viaje->ModificarNombrePasajero($dni, $nuevo_nombre);
            break;
        
        case "7":
            echo "Ingrese el DNI del pasajero que quiera modificar su apellido: ";
            $dni = trim(fgets(STDIN));
            echo "ingrese el nuevo apellido: ";
            $nuevo_apellido = trim(fgets(STDIN));
            $viaje->modificarApellidoPasajero($dni, $nuevo_apellido);
            break;

        case "8":
            echo "ingrese el DNI del pasajero que quiera modificar: ";
            $dni_actual = trim(fgets(STDIN));
            echo "ingrese el DNI modificado: ";
            $nuevo_dni = trim(fgets(STDIN));
            $viaje->modificarDniPasajero($dni_actual, $nuevo_dni);
            break;

        case "9":
            exit();



            
}
}
