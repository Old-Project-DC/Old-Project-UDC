<?php

class Lote {
    private $id_Lote;
    private $cantidad_Producto;
    private $fec_Elaboracion;
    private $fec_Vencimiento;
    private $id_Producto;

    function getId_Lote() {
        return $this->id_Lote;
    }

    function getCantidad_Producto() {
        return $this->cantidad_Producto;
    }

    function getFec_Elaboracion() {
        return $this->fec_Elaboracion;
    }

    function getFec_Vencimiento() {
        return $this->fec_Vencimiento;
    }

    function getId_Producto() {
        return $this->id_Producto;
    }

    function setId_Lote($id_Lote) {
        $this->id_Lote = $id_Lote;
    }

    function setCantidad_Producto($cantidad_Producto) {
        $this->cantidad_Producto = $cantidad_Producto;
    }

    function setFec_Elaboracion($fec_Elaboracion) {
        $this->fec_Elaboracion = $fec_Elaboracion;
    }

    function setFec_Vencimiento($fec_Vencimiento) {
        $this->fec_Vencimiento = $fec_Vencimiento;
    }

    function setId_Producto($id_Producto) {
        $this->id_Producto = $id_Producto;
    }

}
?>