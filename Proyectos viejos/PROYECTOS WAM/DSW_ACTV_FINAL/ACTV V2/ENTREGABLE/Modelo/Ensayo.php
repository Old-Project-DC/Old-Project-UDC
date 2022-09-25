<?php 

class Ensayo {
    private $id_ensayo;
    private $id_muestra_fk;
    private $tipo_ensayo;
    private $medidas ;
    private $avalado;
    

    function getId_ensayo() {
        return $this->id_ensayo;
    }

    function getId_muestra_fk() {
        return $this->id_muestra_fk;
    }

    function getTipo_ensayo() {
        return $this->tipo_ensayo;
    }

    function getMedidas() {
        return $this->medidas;
    }

    function getAvalado() {
        return $this->avalado;
    }

    function setId_ensayo($id_ensayo) {
        $this->id_ensayo = $id_ensayo;
    }

    function setId_muestra_fk($id_muestra_fk) {
        $this->id_muestra_fk = $id_muestra_fk;
    }

    function setTipo_ensayo($tipo_ensayo) {
        $this->tipo_ensayo = $tipo_ensayo;
    }

    function setMedidas($medidas) {
        $this->medidas = $medidas;
    }

    function setAvalado($avalado) {
        $this->avalado = $avalado;
  	}

}
 ?>