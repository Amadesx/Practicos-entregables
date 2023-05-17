<?php

require_once 'Pasajero.php';
require_once 'PasajeroVIP.php';
require_once 'PasajeroNecesidadesEspeciales.php';

class Viaje {
    protected $costoViaje;
    protected $costoAbonado;
    protected $maxPasajeros;
    protected $pasajeros;

    public function __construct($costoViaje, $maxPasajeros) {
        $this->costoViaje = $costoViaje;
        $this->costoAbonado = 0;
        $this->maxPasajeros = $maxPasajeros;
        $this->pasajeros = [];
    }

    public function venderPasaje($objPasajero) {
        if ($this->hayPasajesDisponibles()) {
            $this->pasajeros[] = $objPasajero;
            $this->costoAbonado += $this->calcularCostoFinal($objPasajero);
            return $this->calcularCostoFinal($objPasajero);
        } else {
            return "No hay pasajes disponibles.";
        }
    }

    public function hayPasajesDisponibles() {
        return count($this->pasajeros) < $this->maxPasajeros;
    }

    protected function calcularCostoFinal($objPasajero) {
        $importeIncrementado = $this->costoViaje;

        if ($objPasajero instanceof PasajeroVIP) {
            $porcentajeIncremento = $objPasajero->darPorcentajeIncremento();
            $importeIncrementado *= (1 + ($porcentajeIncremento / 100));
        }

        return $importeIncrementado;
    }

    // Getters y setters

    public function getCostoViaje() {
        return $this->costoViaje;
    }

    public function setCostoViaje($costoViaje) {
        $this->costoViaje = $costoViaje;
    }

    public function getCostoAbonado() {
        return $this->costoAbonado;
    }

    public function setCostoAbonado($costoAbonado) {
        $this->costoAbonado = $costoAbonado;
    }

    public function getMaxPasajeros() {
        return $this->maxPasajeros;
    }

    public function setMaxPasajeros($maxPasajeros) {
        $this->maxPasajeros = $maxPasajeros;
    }

    public function getPasajeros() {
        return $this->pasajeros;
    }

    public function setPasajeros($pasajeros) {
        $this->pasajeros = $pasajeros;
    }

}
