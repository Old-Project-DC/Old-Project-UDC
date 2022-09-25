<?php 

	/**
	 * 
	 */
	class DirectorDAO{

		private $conBD;
		private $directores;
		
		public function __construct(){

			$this->conBD = Conexion::conectar();
			$this->directores = array();
		}

		public function listar(){

			$sql = "SELECT * FROM ver_directores_laboratorios";
			$resultado = $this->conBD->query($sql);

			while ($row = $resultado->fetch_assoc()) {
				
				$this->directores[] = $row;
			}

			return $this->directores;
		}

		public function listar_by_id($id){

			$sql = "SELECT * FROM ver_directores_laboratorios WHERE ID_DIRECTORES=".$id;
			$resultado = $this->conBD->query($sql);
			$row = $resultado->fetch_assoc();

			return $row;

			}

		public function agregar($directore){

			$sql ="CALL EMPLEADO_DIRECTOR_LAB('".$directore->getNom_empleado()."','".$directore->getUsuario()."','".$directore->getContrasena()."','".$directore->getActual()."','".$directore->getFirma_director()."')";

			return $resultado = $this->conBD->query($sql);

		}

		public function editar($directore, $id){

			$sql="UPDATE ver_directores_laboratorios SET ACTUAL='".$directore->getActual()."', FIRMAS='".$directore->getFirma_director()."' WHERE ID_DIRECTORES=".$id;

			$sql2="UPDATE ver_directores_laboratorios SET NOMBRES='".$directore->getNom_empleado()."' WHERE ID_DIRECTORES= ".$id;

			$sql3="UPDATE ver_directores_laboratorios SET USUARIOS='".$directore->getUsuario()."' WHERE ID_DIRECTORES= ".$id;

			if ($this->conBD->query($sql)) {
				if ($this->conBD->query($sql2)) {
					if ($this->conBD->query($sql3)) {
						return true;
					}
				}
			}

		}

		public function eliminar($id1, $id2, $id3){

			$sql = "DELETE FROM directores_laboratorios WHERE id_director_lab=".$id1;
			$sql2 = "DELETE FROM empleados WHERE id_empleado=".$id2;
			$sql3="DELETE FROM usuarios WHERE id_user=".$id3;

			if ($this->conBD->query($sql)) {
				if ($this->conBD->query($sql2)) {
					if ($this->conBD->query($sql3)) {
						return $resultado = $this->conBD->query($sql3);
					}
				}
			}


		}
	}

 ?>