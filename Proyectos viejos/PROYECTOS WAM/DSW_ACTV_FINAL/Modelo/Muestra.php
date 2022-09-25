<?php

class Muestra {
    private $id_Muestra;
    private $codigo_Muestra;
    private $id_Lote;
    private $id_Jefe_Lab;
    
    
    function getId_Muestra() {
        return $this->id_Muestra;
    }

    function getCodigo_Muestra() {
        return $this->codigo_Muestra;
    }

    function getId_Lote() {
        return $this->id_Lote;
    }

    function getId_Jefe_Lab() {
        return $this->id_Jefe_Lab;
    }

    function setId_Muestra($id_Muestra) {
        $this->id_Muestra = $id_Muestra;
    }

    function setCodigo_Muestra($codigo_Muestra) {
        $this->codigo_Muestra = $codigo_Muestra;
    }

    function setId_Lote($id_Lote) {
        $this->id_Lote = $id_Lote;
    }

    function setId_Jefe_Lab($id_Jefe_Lab) {
        $this->id_Jefe_Lab = $id_Jefe_Lab;
    }
}
?>