<?php

class Producto {
    private $id_Producto;
    private $nombre_Producto;
    private $tipo_Producto;
    
    function __construct() {
        
    }
    function getId_Producto() {
        return $this->id_Producto;
    }

    function getNombre_Producto() {
        return $this->nombre_Producto;
    }

    function getTipo_Producto() {
        return $this->tipo_Producto;
    }

    function setId_Producto($id_Producto) {
        $this->id_Producto = $id_Producto;
    }

    function setNombre_Producto($nombre_Producto) {
        $this->nombre_Producto = $nombre_Producto;
    }

    function setTipo_Producto($tipo_Producto) {
        $this->tipo_Producto = $tipo_Producto;
    }
    
}