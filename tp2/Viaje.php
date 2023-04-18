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
    
    public function agregarPasajero($pasajero) {
        if (count($this->listaPasajeros) < $this->cantidadMaximaPasajeros) {
            array_push($this->listaPasajeros, $pasajero);
            return true;
        } else {
            return false;
        }
    }
    
    public function __toString() {
        $cadena = "Codigo: " . $this->codigo . "\n";
        $cadena .= "Destino: " . $this->destino . "\n";
        $cadena .= "Cantidad maxima de pasajeros: " . $this->cantidadMaximaPasajeros . "\n";
        $cadena .= "Responsable: " . $this->responsable . "\n";
        $cadena .= "Lista de pasajeros: \n";
        foreach ($this->listaPasajeros as $pasajero) {
            $cadena .= $pasajero . "\n";
        }
        return $cadena;
    }
    
}
