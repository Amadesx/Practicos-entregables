<?php
require_once 'Pasajero.php';
class PasajeroNecesidadesEspeciales extends Pasajero {
    protected $requiereSillaDeRuedas;
    protected $requiereAsistencia;
    protected $requiereComidaEspecial;
    
    public function __construct($nombre, $numeroAsiento, $numeroTicket, $requiereSillaDeRuedas, $requiereAsistencia, $requiereComidaEspecial) {
        parent::__construct($nombre, $numeroAsiento, $numeroTicket);
        $this->requiereSillaDeRuedas = $requiereSillaDeRuedas;
        $this->requiereAsistencia = $requiereAsistencia;
        $this->requiereComidaEspecial = $requiereComidaEspecial;
    }
    
    // Getters y setters
    
    public function getRequiereSillaDeRuedas() {
        return $this->requiereSillaDeRuedas;
    }
    
    public function setRequiereSillaDeRuedas($requiereSillaDeRuedas) {
        $this->requiereSillaDeRuedas = $requiereSillaDeRuedas;
    }
    
    public function getRequiereAsistencia() {
        return $this->requiereAsistencia;
    }
    
    public function setRequiereAsistencia($requiereAsistencia) {
        $this->requiereAsistencia = $requiereAsistencia;
    }
    
    public function getRequiereComidaEspecial() {
        return $this->requiereComidaEspecial;
    }
    
    public function setRequiereComidaEspecial($requiereComidaEspecial) {
        $this->requiereComidaEspecial = $requiereComidaEspecial;
    }
}
