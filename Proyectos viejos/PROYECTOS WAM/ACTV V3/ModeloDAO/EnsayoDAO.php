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

		public function listar($estado){

			if ($estado == 1 && ($_SESSION['rol']=='ADMIN' OR $_SESSION['rol']=='JEFE')) {
				
				$sql = "SELECT * FROM ensayos_aprobados";

			}elseif ($estado == 0 && ($_SESSION['rol']=='ADMIN' OR $_SESSION['rol']=='JEFE')) {

				$sql = "SELECT * FROM ensayos_rechazados";

			}else{

				$sql = "SELECT * FROM ensayos_sin_avalar";

			}

			$resultado = $this->conBD->query($sql);

			while ($row = $resultado->fetch_assoc()) {
				
				$this->ensayos[] = $row;
			}
				return $this->ensayos;
		}
		public function listar_by_id($id){

			$sql = "SELECT * FROM ensayos WHERE id_ensayo=".$id;
			$resultado = $this->conBD->query($sql);
			$row = $resultado->fetch_assoc();

			return $row;

			}			

		public function agregar($ensayo){
			
			$sql = "INSERT INTO ensayos(tipo_ensayo,medidas, id_muestra_fk) VALUES ('".$ensayo->getTipo_ensayo()."','".$ensayo->getMedidas()."','".$ensayo->getId_muestra_fk()."')";

			return $resultado = $this->conBD->query($sql);

		}
		public function editarEstado($id, $n){
			$sql = "UPDATE ensayos SET avalado ='".$n."' WHERE id_ensayo='".$id."'";
			return $resultado = $this->conBD->query($sql);

		}
		public function editar($ensayo,$id){
			
			$sql = "UPDATE ensayos SET tipo_ensayo='".$ensayo->getTipo_ensayo()."', medidas='".$ensayo->getMedidas()."', id_muestra_fk='".$ensayo->getId_muestra_fk()."' WHERE id_ensayo=".$id;


			return $resultado = $this->conBD->query($sql);

		}		
		public function eliminar($id){
			
			$sql = "DELETE FROM ensayos WHERE id_ensayo =".$id;

			return $resultado = $this->conBD->query($sql);

		}		
	}

 ?>