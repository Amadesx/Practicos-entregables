<?php
include_once "Cliente.php";
include_once "Venta.php";
include_once "Moto.php";
include_once "Empresa.php";
/**Se registra la siguiente información: nombre, apellido, si está o no dado de baja, el tipo y el número de documento. Si un cliente está dado de baja, no puede registrar compras desde el momento de su baja.
Método constructor que recibe como parámetros los valores iniciales para los atributos.
Los métodos de acceso de cada uno de los atributos de la clase.
Redefinir el método _toString  para que retorne la información de los atributos de la clase */
class Cliente {
    private $nombre;
    private $apellido;
    private $dadoDeBaja;
    private $tipoDoc;
    private $numDoc;

    public function __construct($nombre, $apellido, $dadoDeBaja, $tipoDoc, $numDoc) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->dadoDeBaja = $dadoDeBaja;
        $this->tipoDoc = $tipoDoc;
        $this->numDoc = $numDoc;
    }
    //Metodos de acceso
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function setDadoDeBaja($dadoDeBaja) {
        $this->dadoDeBaja = $dadoDeBaja;
    }

    public function setTipoDoc($tipoDoc) {
        $this->tipoDoc = $tipoDoc;
    }

    public function setNumDoc($numDoc) {
        $this->numDoc = $numDoc;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getDadoDeBaja() {
        return $this->dadoDeBaja;
    }

    public function getTipoDoc() {
        return $this->tipoDoc;
    }

    public function getNumDoc() {
        return $this->numDoc;
    }
    //Metodo __toString para convertir los atributos en un string y retornalo
    public function __toString() {
        $dadoDeBajaStr = $this->getDadoDeBaja() ? "Sí" : "No";
        return "Nombre: " . $this->getNombre() . ", Apellido: " . $this->getApellido() . ", Dado de baja: " . $dadoDeBajaStr . ", Tipo de documento: " . $this->getTipoDoc() . ", Número de documento: " . $this->getNumDoc();
    }
}