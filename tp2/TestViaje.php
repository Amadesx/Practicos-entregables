<?php
include_once 'Viaje.php';
include_once 'Pasajero.php';
include_once 'ResponsableV.php';


// Programa Principal
$viaje = null;
$opcion = 0;

while ($opcion != 6) {
    echo "Menu: \n";
    echo "1. Cargar la información del viaje \n";
    echo "2. Modificar la información del viaje \n";
    echo "3. Ver la información \n";
    echo "4. Agregar un pasajero \n";
    echo "5. Modificar informacion del pasajero \n";
    echo "6. Salir \n";
    echo "Seleccione una opcion: ";
    $opcion = readline();

    switch ($opcion) {
        case 1:
            echo "Ingrese el codigo del viaje: ";
            $codigo = readline();
            echo "Ingrese el destino del viaje: ";
            $destino = readline();
            echo "Ingrese la cantidad maxima de pasajeros: ";
            $cantidadMaximaPasajeros = readline();
            echo "Ingrese el numero de empleado del responsable: ";
            $numeroEmpleado = readline();
            echo "Ingrese el numero de licencia del responsable: ";
            $numeroLicencia = readline();
            echo "Ingrese el nombre del responsable: ";
            $nombre = readline();
            echo "Ingrese el apellido del responsable: ";
            $apellido = readline();

            $responsable = new ResponsableV($numeroEmpleado, $numeroLicencia, $nombre, $apellido);
            $viaje = new Viaje($codigo, $destino, $cantidadMaximaPasajeros, array(), $responsable);
            echo "Viaje cargado con exito \n";
            break;
        case 2:
            echo "Ingrese el nuevo codigo del viaje: ";
            $codigo = readline();
            echo "Ingrese el nuevo destino del viaje: ";
            $destino = readline();
            echo "Ingrese la nueva cantidad maxima de pasajeros: ";
            $cantidadMaximaPasajeros = readline();
            echo "Ingrese el nuevo numero de empleado del responsable: ";
            $numeroEmpleado = readline();
            echo "Ingrese el nuevo numero de licencia del responsable: ";
            $numeroLicencia = readline();
            echo "Ingrese el nuevo nombre del responsable: ";
            $nombre = readline();
            echo "Ingrese el nuevo apellido del responsable: ";
            $apellido = readline();

            $responsable = new ResponsableV($numeroEmpleado, $numeroLicencia, $nombre, $apellido);
            $viaje->setCodigo($codigo);
            $viaje->setDestino($destino);
            $viaje->setCantidadMaximaPasajeros($cantidadMaximaPasajeros);
            $viaje->setResponsable($responsable);
            echo "Informacion del viaje modificada con exito \n";
            break;
        case 3:
            echo $viaje;
            break;
        case 4:
            echo "Ingrese el nombre del pasajero: ";
            $nombre = readline();
            echo "Ingrese el apellido del pasajero: ";
            $apellido = readline();
            echo "Ingrese el telefono del pasajero: ";
            $telefono = readline();
            echo "Ingrese el DNI del pasajero: ";
            $dni = readline();
        
            $pasajero = new Pasajero($nombre, $apellido, $telefono, $dni);
            if ($viaje->agregarPasajero($pasajero)) {
                echo "Pasajero agregado con exito \n";
            } else {
                echo "No se pudo agregar el pasajero. El viaje ya está completo \n";
            }
            break;
        case 5:
            echo "Ingrese el indice del pasajero a modificar: ";
            $indice = readline();
            echo "Ingrese el nuevo nombre del pasajero: ";
            $nombre = readline();
            echo "Ingrese el nuevo apellido del pasajero: ";
            $apellido = readline();
            echo "Ingrese el nuevo telefono del pasajero: ";
            $telefono = readline();
            echo "Ingrese el nuevo DNI del pasajero: ";
            $dni = readline();

            $pasajero = new Pasajero($nombre, $apellido, $telefono, $dni);
            $viaje->getListaPasajeros()[$indice] = $pasajero;
            echo "Informacion del pasajero modificada con exito \n";
            break;
        case 6:
            echo "Adios \n";
            break;
        default:
        echo "Opcion invalida \n";
        break;
}
}