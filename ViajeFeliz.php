<?php

// La clase viaje tiene los atributos privados $codigo, $destino, $cant_max_pasajeros y $pasajeros. $codigo y $destino son de tipo string, $cant_max_pasajeros es de tipo entero y por último $pasajeros es
// un array que almacena la información de cada pasajero.
class Viaje {
    private $codigo;
    private $destino;
    private $cant_max_pasajeros;
    private $pasajeros = array();

    // Inicializo los valores de $codigo, $destino y $cant_max_pasajeros.
    public function __construct($codigo, $destino, $cant_max_pasajeros) {
        $this->codigo = $codigo;
        $this->destino = $destino;
        $this->cant_max_pasajeros = $cant_max_pasajeros;
    }

    // Devuelve el valor del atributo
    public function getCodigo() {
        return $this->codigo;
    }

    // Modifica el valor del atributo
    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    // Devuelve el valor del atributo
    public function getDestino() {
        return $this->destino;
    }

    // Modifica el valor del atributo
    public function setDestino($destino) {
        $this->destino = $destino;
    }

    // Devuelve el valor del atributo
    public function getCantMaxPasajeros() {
        return $this->cant_max_pasajeros;
    }

    // Este método establece el número máximo de pasajeros que el transporte puede llevar y lo almacena
    public function setCantMaxPasajeros($cant_max_pasajeros) {
        $this->cant_max_pasajeros = $cant_max_pasajeros;
    }

    // Este método devuelve un array con todos los pasajeros del viaje
    public function getPasajeros() {
        return $this->pasajeros;
    }

    // Este método establece una lista de pasajeros
    public function setPasajeros($pasajeros) {
        $this->pasajeros = $pasajeros;
    }

    // Este método agrega un nuevo pasajero a la lista de pasajeros, el nuevo pasajero se representa como un array asociativo con claves de "nombre", "apellido" y "dni"
    // si se agrega correctamente el método devuelve "true", sino devuelve "false"
    public function agregarPasajero($nombre, $apellido, $dni) {
        if (count($this->pasajeros) < $this->getCantMaxPasajeros()) {
            $pasajero = array(
                "nombre" => $nombre,
                "apellido" => $apellido,
                "dni" => $dni
            );
            array_push($this->pasajeros, $pasajero);
            return true;
        } else {
            return false;
        }
    }
    
    // Este método elimina un pasajero de la lista de pasajeros según su dni. Busca al pasajero correspondiente en la lista de pasajeros y lo elimina. Si se elimina correctamente, devuelve "true", sino devuelve "false"
    public function eliminarPasajero($dni) {
        foreach ($this->pasajeros as $key => $pasajero) {
            if ($pasajero["dni"] == $dni) {
                unset($this->pasajeros[$key]);
                return true;
            }
        }
        return false;
    }
    // Este método recibe como parámetros el dni de un pasajero y un nuevo nombre para actualizarlo en la lista de pasajeros.
    // La función utiliza un bucle foreach para buscar al pasajero con el dni especificado y, si lo encuentra, actualiza su nombre y devuelve true. En caso contrario, devuelve false.
    // También en las 3 siguientes funciones, utilizo el símbolo "&" en la variable $pasajero dentro del bucle foreach para actualizar directamente el valor del arreglo de pasajeros del objeto
    // para evitar crear una copia del arreglo de pasajeros y remplazarla por la original, ya que esta hace referencia a la variable original y cualquier cambio realizado afectará a la variable original.
    public function modificarNombrePasajero($dni, $nuevo_nombre) {
        foreach ($this->pasajeros as &$pasajero) {
            if ($pasajero["dni"] == $dni) {
                $pasajero["nombre"] = $nuevo_nombre;
                return true;
            }
        }
        return false;
    }
    // Lo mismo que el de arriba, pero modifica el apellido
    public function modificarApellidoPasajero($dni, $nuevo_apellido) {
        foreach ($this->pasajeros as &$pasajero) {
            if ($pasajero["dni"] == $dni) {
                $pasajero["apellido"] = $nuevo_apellido;
                return true;
            }
        }   
        return false;
    }
// Este método recibe como parametros el dni actual del pasajero y un nuevo dni, luego con un bucle foreach busca al pasajero con el dni especificado y si lo encuentra lo actualiza con el
// nuevo valor y devuelve true. En caso contrario, devuelve false.
    public function modificarDniPasajero($dni_actual, $nuevo_dni) {
        foreach ($this->pasajeros as &$pasajero) {
            if ($pasajero["dni"] == $dni_actual) {
                $pasajero["dni"] = $nuevo_dni;
                return true;
            }
        }
        return false;
    }
    
    
// Este metodo recorre el arreglo de pasajeros del objeto y contruye una cadena para cada pasajero que tiene su nombre, apellido y dni. Despues agrega cada cadena a un arreglo de cadenas usando
// la funcion implode para conseguir la cadena final.
    public function pasajerosString(){
        $pasajeros_arreglo = array();
        foreach ($this->pasajeros as $pasajero) {
            $pasajeros_arreglo[] = $pasajero["nombre"]. " " . $pasajero["apellido"]. " (" . $pasajero["dni"]. ")";
        }
        $pasajero_string = implode(", ", $pasajeros_arreglo);
        return $pasajero_string;
    }


// Accede a los atributos y al arreglo de cadenas de los pasajeros para formar un string final con todos los datos pedidos.
    public function __toString() {
        return "Viaje a " . $this->destino . " (Código: " . $this->codigo . ") con pasajeros: " . $this->pasajerosString();
    }
    
}

