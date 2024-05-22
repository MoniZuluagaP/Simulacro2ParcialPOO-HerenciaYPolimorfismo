<?php
include_once 'Moto.php';
class MotoNacional extends Moto
{
    private $descuentoPorcentaje;

    public function __construct ($codigo, $costo, $anioFab, $descripcion, $incAnual, $activa, $descuento = 15/100) {
        parent::__construct($codigo, $costo, $anioFab, $descripcion, $incAnual, $activa);
        $this->descuentoPorcentaje = $descuento;
    }
    public function setDescuento ($descuento) {
        $this->descuentoPorcentaje = $descuento;
    }
    public function getDescuento () {
        return $this->descuentoPorcentaje;
    }
    public function darPrecioVenta() {
        $precioInicial = parent::darPrecioVenta();
        $precioNuevo = $precioInicial - ($precioInicial * $this->getDescuento());
        return $precioNuevo;
    }
    public function __toString()
    {
        $cadena = parent::__toString();
        $cadena.= "Precio con descuento del ".($this->getDescuento()*100)."%: ".$this->darPrecioVenta()."\n";
        return $cadena;
    }
}