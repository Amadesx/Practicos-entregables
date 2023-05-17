<?php

class Pasajero
{
    protected $nombre;
    protected $numeroAsiento;
    protected $numeroTicket;

    public function __construct($nombre, $numeroAsiento, $numeroTicket)
    {
        $this->nombre = $nombre;
        $this->numeroAsiento = $numeroAsiento;
        $this->numeroTicket = $numeroTicket;
    }

    // Getters y setters

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getNumeroAsiento()
    {
        return $this->numeroAsiento;
    }

    public function setNumeroAsiento($numeroAsiento)
    {
        $this->numeroAsiento = $numeroAsiento;
    }

    public function getNumeroTicket()
    {
        return $this->numeroTicket;
    }

    public function setNumeroTicket($numeroTicket)
    {
        $this->numeroTicket = $numeroTicket;
    }

    public function __toString()
    {
        return "Nombre: " . $this->getNombre() . " Número de asiento: " . $this->getNumeroAsiento() . " Número de ticket: " . $this->getNumeroTicket();
    }
    
}
