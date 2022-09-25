<?php
/**
 * Description of Jefe_Laboratorio
 *
 * @author DIEGO CARDENAS
 */

include "Empleado.php"; 

class Jefe extends Empleado{
    private $id_jefe_lab;
    private $tipo_lab;
    private $actual;
    

    function getId_jefe_lab() {
        return $this->id_jefe_lab;
    }

    function getTipo_lab() {
        return $this->tipo_lab;
    }

    function getActual(){
        return $this->actual;
    }

    function setId_jefe_lab($id_jefe_lab) {
        $this->id_jefe_lab = $id_jefe_lab;
    }

    function setTipo_lab($tipo_lab) {
        $this->tipo_lab = $tipo_lab;
    }

    function setActual($actual){
        $this->actual = $actual;
    }
}
?>