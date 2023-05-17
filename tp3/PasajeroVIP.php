<?php
require_once 'Pasajero.php';
class PasajeroVIP extends Pasajero {
    protected $numeroViajeroFrecuente;
    protected $millasPasajero;

    public function __construct($nombre, $numeroAsiento, $numeroTicket, $numeroViajeroFrecuente, $millasPasajero) {
        parent::__construct($nombre, $numeroAsiento, $numeroTicket);
        $this->numeroViajeroFrecuente = $numeroViajeroFrecuente;
        $this->millasPasajero = $millasPasajero;
    }

    public function darPorcentajeIncremento() {
        $porcentajeIncremento = 35; // Incremento para pasajeros VIP por defecto

        if ($this->millasPasajero > 300) {
            $porcentajeIncremento += 30; // Incremento adicional si las millas superan las 300
        }

        return $porcentajeIncremento;
    }

    // Getters y setters

    public function getNumeroViajeroFrecuente() {
        return $this->numeroViajeroFrecuente;
    }

    public function setNumeroViajeroFrecuente($numeroViajeroFrecuente) {
        $this->numeroViajeroFrecuente = $numeroViajeroFrecuente;
    }

    public function getMillasPasajero() {
        return $this->millasPasajero;
    }

    public function setMillasPasajero($millasPasajero) {
        $this->millasPasajero = $millasPasajero;
    }

}


