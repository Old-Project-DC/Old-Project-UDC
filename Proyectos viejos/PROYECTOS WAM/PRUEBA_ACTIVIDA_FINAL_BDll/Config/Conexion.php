<?php 

	/**
	 * Clase con los atributos para conectarse con la BD
	 */
	class Conexion{

		private $host;
		private $usuario;
		private $pass;
		private $nombre_BD;
		private $puerto;
		private $conexion;
		
		public function __construct(){

			$this->host ="localhost";
			$this->usuario ="root";
			$this->pass ="";
			$this->nombre_BD ="examenes_clinicos";
			$this->puerto ="3308";

			$this->conexion = new mysqli($this->host,$this->usuario,$this->pass,$this->nombre_BD,$this->puerto);
			
		}

		public function ejecutar($sql){

			if ($auxi = $this->conexion->query($sql)) {


				while ($row = $auxi->fetch_assoc()) {

					$resultado[] =$row;
					
				}
				return $resultado;

			}
		}

		public function ejecutarIUD($sql){
			$auxi = $this->conexion->query($sql);	
					
		}
		public function cerrarConexion(){
			$this->conexion->close();
			
		}
	}


 ?>
