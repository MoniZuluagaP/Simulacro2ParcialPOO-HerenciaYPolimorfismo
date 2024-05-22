<?php

include_once 'Moto.php';
class MotoImportada extends Moto
{
    private $paisImportacion;
    private $impuestoIngreso;

    public function __construct($codigo, $costo, $anioFab, $descripcion, $incAnual, $activa, $paisImport, $impuesto)
    {
        parent::__construct($codigo, $costo, $anioFab, $descripcion, $incAnual, $activa);
        $this->paisImportacion = $paisImport;
        $this->impuestoIngreso = $impuesto;
    }
    public function getPaisImportacion()
    {
        return $this->paisImportacion;
    }
    public function setPaisImportacion($paisImportacion)
    {
        $this->paisImportacion = $paisImportacion;
    }
    public function getImpuestoIngreso()
    {
        return $this->impuestoIngreso;
    }
    public function setImpuestoIngreso($impuestoIngreso)
    {
        $this->impuestoIngreso = $impuestoIngreso;
    }
    public function darPrecioVenta()
    {
        $precioInicial = parent::darPrecioVenta();
        $precioNuevo = $precioInicial + $this->getImpuestoIngreso();
        return $precioNuevo;
    }
    public function __toString()
    {
        $cadena = parent::__toString();
        $cadena.= "Precio con impuestos: ".($this->darPrecioVenta()+$this->getImpuestoIngreso())."\n";
        return $cadena;
    }

}