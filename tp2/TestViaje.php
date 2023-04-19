<?php
include_once 'Viaje.php';
include_once 'Pasajero.php';
include_once 'ResponsableV.php';


// Programa Principal
$viaje = null;
$opcion = 0;
// un while que va a repetir el menú hasta que la variable $opcion no sea 6
while ($opcion != 6) {
    echo "Menu: \n";
    echo "1. Cargar la información del viaje \n";
    echo "2. Modificar la información del viaje \n";
    echo "3. Ver la información \n";
    echo "4. Agregar un pasajero \n";
    echo "5. Modificar informacion del pasajero \n";
    echo "6. Salir \n";
    echo "Seleccione una opcion: ";
    $opcion = trim(fgets(STDIN));

    switch ($opcion) {
        // Crea el objeto ResponsableV y Viaje con los datos que ingresa el usuario.
        case 1:
            echo "Ingrese el codigo del viaje: ";
            $codigo = trim(fgets(STDIN));
            echo "Ingrese el destino del viaje: ";
            $destino = trim(fgets(STDIN));
            echo "Ingrese la cantidad maxima de pasajeros: ";
            $cantidadMaximaPasajeros = trim(fgets(STDIN));
            echo "Ingrese el numero de empleado del responsable: ";
            $numeroEmpleado = trim(fgets(STDIN));
            echo "Ingrese el numero de licencia del responsable: ";
            $numeroLicencia = trim(fgets(STDIN));
            echo "Ingrese el nombre del responsable: ";
            $nombre = trim(fgets(STDIN));
            echo "Ingrese el apellido del responsable: ";
            $apellido = trim(fgets(STDIN));

            $responsable = new ResponsableV($numeroEmpleado, $numeroLicencia, $nombre, $apellido);
            $viaje = new Viaje($codigo, $destino, $cantidadMaximaPasajeros, array(), $responsable);
            echo "Viaje cargado con exito \n";
            break;
        case 2:
        // Pide al usuario los nuevos datos del viaje y luego los modifica con los metodos de acceso.
            echo "Ingrese el nuevo codigo del viaje: ";
            $codigo = trim(fgets(STDIN));
            echo "Ingrese el nuevo destino del viaje: ";
            $destino = trim(fgets(STDIN));
            echo "Ingrese la nueva cantidad maxima de pasajeros: ";
            $cantidadMaximaPasajeros = trim(fgets(STDIN));
            echo "Ingrese el nuevo numero de empleado del responsable: ";
            $numeroEmpleado = trim(fgets(STDIN));
            echo "Ingrese el nuevo numero de licencia del responsable: ";
            $numeroLicencia = trim(fgets(STDIN));
            echo "Ingrese el nuevo nombre del responsable: ";
            $nombre = trim(fgets(STDIN));
            echo "Ingrese el nuevo apellido del responsable: ";
            $apellido = trim(fgets(STDIN));

            $responsable = new ResponsableV($numeroEmpleado, $numeroLicencia, $nombre, $apellido);
            $viaje->setCodigo($codigo);
            $viaje->setDestino($destino);
            $viaje->setCantidadMaximaPasajeros($cantidadMaximaPasajeros);
            $viaje->setResponsable($responsable);
            echo "Informacion del viaje modificada con exito \n";
            break;
        case 3:
        // imprime el objeto con el metodo __toString
            echo $viaje;
            break;
        case 4:
        // Pide al usuario los datos del pasajero y los agrega a la lista de pasajeros, en el caso de que no se pueda dice "Intente con otro pasajero"
            echo "Ingrese el nombre del pasajero: ";
            $nombre = trim(fgets(STDIN));
            echo "Ingrese el apellido del pasajero: ";
            $apellido = trim(fgets(STDIN));
            echo "Ingrese el telefono del pasajero: ";
            $telefono = trim(fgets(STDIN));
            echo "Ingrese el DNI del pasajero: ";
            $dni = trim(fgets(STDIN));
        
            $pasajero = new Pasajero($nombre, $apellido, $telefono, $dni);
            if ($viaje->agregarPasajero($pasajero)) {
                echo "Pasajero agregado con exito \n";
            } else {
                echo "Intente con otro pasajero. \n";
            }
            break;
        case 5:
        // Pide al usuario los nuevos datos del pasajero y el indice para luego modificarlos con los metodos de acceso.
            echo "Ingrese el indice del pasajero a modificar: ";
            $indice = trim(fgets(STDIN));
            echo "Ingrese el nuevo nombre del pasajero: ";
            $nombre = trim(fgets(STDIN));
            echo "Ingrese el nuevo apellido del pasajero: ";
            $apellido = trim(fgets(STDIN));
            echo "Ingrese el nuevo telefono del pasajero: ";
            $telefono = trim(fgets(STDIN));
            echo "Ingrese el nuevo DNI del pasajero: ";
            $dni = trim(fgets(STDIN));

            $pasajero = new Pasajero($nombre, $apellido, $telefono, $dni);
            $viaje->getListaPasajeros()[$indice] = $pasajero;
            echo "Informacion del pasajero modificada con exito \n";
            break;
        case 6:
        // Salir del menú
            echo "Adios \n";
            break;
        default:
        // En caso que el usuario no ingrese una opcion del 1-6
        echo "Opcion invalida \n";
        break;
}
}
