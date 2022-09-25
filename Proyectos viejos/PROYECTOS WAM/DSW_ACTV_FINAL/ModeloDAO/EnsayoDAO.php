<?php 

	/**
	 * 
	 */
	class EnsayoDAO{

		private $conBD;
		private $ensayos;
		
		public function __construct(){

			$this->conBD = Conexion::conectar();
			$this->ensayos = array();
		}

		public function listar(){

			$sql = "SELECT * FROM ensayos_sin_avalar";
			$resultado = $this->conBD->query($sql);

			while ($row = $resultado->fetch_assoc()) {
				
				$this->ensayos[] = $row;
			}

			return $this->ensayos;
		}

		public function agregar($ensayo){
			
			$sql = "INSERT INTO ensayos(tipo_ensayo,medidas, id_muestra_fk) VALUES ('".$ensayo->getTipo_ensayo()."','".$ensayo->getMedidas()."','".$ensayo->getId_muestra_fk()."')";

			$resultado = $this->conBD->query($sql);

		}

		public function editar($id, $n){
			
			$sql = "UPDATE ensayos SET avalado ='".$n."' WHERE id_ensayo='".$id."'";
			$resultado = $this->conBD->query($sql);

		}
	}

 ?>