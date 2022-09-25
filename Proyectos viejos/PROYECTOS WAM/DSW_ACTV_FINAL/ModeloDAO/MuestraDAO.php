<?php 

	/**
	 * 
	 */
	class MuestraDAO{

		private $conBD;
		private $muestras;
		
		public function __construct(){

			$this->conBD = Conexion::conectar();
			$this->muestras = array();
		}

		public function listar(){

			$sql = "SELECT * FROM muestras";
			$resultado = $this->conBD->query($sql);

			while ($row = $resultado->fetch_assoc()) {
				
				$this->muestras[] = $row;
			}

			return $this->muestras;
		}

		public function listar_by_id($id){

			$sql = "SELECT * FROM muestras WHERE id_muestra=".$id;
			$resultado = $this->conBD->query($sql);
			$row = $resultado->fetch_assoc();

			return $row;

			}

		public function agregar($muestra){
			
			$sql = "INSERT INTO muestras (cod_muestra, id_jefe_lab_fk, id_lote_fk) VALUES ('".$muestra->getCodigo_Muestra()."', '".$muestra->getId_Jefe_Lab()."', '".$muestra->getId_Lote()."')";

			$resultado = $this->conBD->query($sql);

		}

		public function editar($muestra, $id){
			
			$sql = "UPDATE muestras SET cod_muestra='".$muestra->getCodigo_Muestra()."', id_jefe_lab_fk='".$muestra->getId_Jefe_Lab()."', id_lote_fk='".$muestra->getId_Lote()."'WHERE id_muestra =".$id;

			$resultado = $this->conBD->query($sql);

		}

		public function eliminar($id){
			
			$sql = "DELETE FROM muestras WHERE id_muestra =".$id;

			$resultado = $this->conBD->query($sql);

		}
	}

 ?>