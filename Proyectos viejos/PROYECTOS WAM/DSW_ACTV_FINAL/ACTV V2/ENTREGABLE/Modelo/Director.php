<?php

/**
 * Description of Director_Laboratorio
 *
 * @author DIEGO CARDENAS
 */
include "Empleado.php";

class Director extends Empleado{
    private $id_director_lab;
    private $actual;
    private $firma_director;
    
    function getId_director_lab() {
        return $this->id_director_lab;
    }

    function getActual() {
        return $this->actual;
    }

    function getFirma_director() {
        return $this->firma_director;
    }

    function setId_director_lab($id_director_lab) {
        $this->id_director_lab = $id_director_lab;
    }

    function setActual($actual) {
        $this->actual = $actual;
    }

    function setFirma_director($firma_director) {
        $this->firma_director = $firma_director;
    }
}
?>