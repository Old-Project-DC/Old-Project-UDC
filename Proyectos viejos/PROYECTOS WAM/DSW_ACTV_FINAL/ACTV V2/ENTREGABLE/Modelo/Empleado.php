<?php 

	/**
	 * 
	 */
	class Empleado{
		private $id_empleado;
		private $nom_empleado;
		private $usuario;
		private $contrasena;


	function getId_empleado() {
        return $this->id_empleado;
    }

    function getNom_empleado() {
        return $this->nom_empleado;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getContrasena() {
        return $this->contrasena;
    }

    function setId_empleado($id_empleado) {
        $this->id_empleado = $id_empleado;
    }

    function setNom_empleado($nom_empleado) {
        $this->nom_empleado = $nom_empleado;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }
		
	}

 ?>