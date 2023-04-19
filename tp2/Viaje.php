<?php
// Objeto Viaje
class Viaje {
    private $codigo;
    private $destino;
    private $cantidadMaximaPasajeros;
    private $listaPasajeros;
    private $responsable;

    public function __construct($codigo, $destino, $cantidadMaximaPasajeros, $listaPasajeros, $responsable) {
        $this->codigo = $codigo;
        $this->destino = $destino;
        $this->cantidadMaximaPasajeros = $cantidadMaximaPasajeros;
        $this->listaPasajeros = $listaPasajeros;
        $this->responsable = $responsable;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function getDestino() {
        return $this->destino;
    }

    public function setDestino($destino) {
        $this->destino = $destino;
    }

    public function getCantidadMaximaPasajeros() {
        return $this->cantidadMaximaPasajeros;
    }

    public function setCantidadMaximaPasajeros($cantidadMaximaPasajeros) {
        $this->cantidadMaximaPasajeros = $cantidadMaximaPasajeros;
    }

    public function getListaPasajeros() {
        return $this->listaPasajeros;
    }

    public function setListaPasajeros($listaPasajeros) {
        $this->listaPasajeros = $listaPasajeros;
    }

    public function getResponsable() {
        return $this->responsable;
    }

    public function setResponsable($responsable) {
        $this->responsable = $responsable;
    }
   // Agrega un nuevo pasajero a la lista de pasajeros si no es que hay uno ya con el mismo DNI 
    public function agregarPasajero($pasajero) {
        foreach($this->listaPasajeros as $p) {
            if($p->getDni() == $pasajero->getDni()) {
                echo "Ya existe un pasajero con ese DNI\n";
                return false;
            }
        }
    
        if (count($this->listaPasajeros) < $this->getCantidadMaximaPasajeros()) {
            array_push($this->listaPasajeros, $pasajero);
            return true;
        } else {
            echo "El viaje ya está completo\n";
            return false;
        }
    }
    
    
    
    
    public function __toString() {
        $cadena = "Codigo: " . $this->getCodigo() . "\n";
        $cadena .= "Destino: " . $this->getDestino() . "\n";
        $cadena .= "Cantidad maxima de pasajeros: " . $this->getCantidadMaximaPasajeros() . "\n";
        $cadena .= "Responsable: " . $this->getResponsable() . "\n";
        $cadena .= "Lista de pasajeros: \n";
        foreach ($this->listaPasajeros as $pasajero) {
            $cadena .= $pasajero . "\n";
        }
        return $cadena;
    }
    
}
