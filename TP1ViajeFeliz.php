<?php
// La clase viaje tiene los atributos privados $codigo, $destino, $cant_max_pasajeros y $pasajeros. $codigo y $destino son de tipo string, $cant_max_pasajeros es de tipo entero y por ultiumo $pasajeros es
// un array que almacena la informacion de cada pasajero.
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

    // Este método agrega pasajeros al viaje que toma como parametro el nombre, dni y apellido. Luego con un "if" verifico si la cantidad de pasajeros es menor a la cantidad maxima de pasajeros
    // Despues se crea un nuevo arreglo "$pasajero" que contiene los datos de la persona que se quiere agregar y se agregan con la funcion de php "array_push()", en el caso de agregarse
    // correctamente retorna "true", en caso contrario retorna en "false"
    public function agregarPasajero($nombre, $apellido, $dni) {
        if (count($this->pasajeros) < $this->cant_max_pasajeros) {
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
    
    // Este método toma como parametro de entrada el DNI del pasajero que se quiere eliminar, con un foreach recorre todos los pasajeros almacenados en "$this->pasajeros" y por
    // cada iteración compara los DNI, al momento de coincidir usa la funcion "unset" de php para eliminar el pasajero para luego retornar en "true", en el caso de que no encuentre
    // retorna en "false"
     public function eliminarPasajero($dni) {
        foreach ($this->pasajeros as $key => $pasajero) {
            if ($pasajero["dni"] == $dni) {
                unset($this->pasajeros[$key]);
                return true;
            }
        }
        return false;
    }
}
