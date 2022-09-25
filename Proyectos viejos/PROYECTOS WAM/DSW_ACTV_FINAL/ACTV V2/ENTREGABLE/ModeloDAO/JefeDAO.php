<?php 

	/**
	 * 
	 */
	class JefeDAO{

		private $conBD;
		private $Jefes_laboratorios;
		
		public function __construct(){

			$this->conBD = Conexion::conectar();
			$this->Jefes_laboratorios = array();
		}

		public function listar(){

			$sql = "SELECT * FROM ver_jefes_laboratorios";
			$resultado = $this->conBD->query($sql);

			while ($row = $resultado->fetch_assoc()) {
				
				$this->Jefes_laboratorios[] = $row;
			}

			return $this->Jefes_laboratorios;
		}

		public function listar_by_id($id){

			$sql = "SELECT * FROM ver_jefes_laboratorios WHERE ID_JEFES=".$id;
			$resultado = $this->conBD->query($sql);
			$row = $resultado->fetch_assoc();

			return $row;

			}

		public function agregar($jefe_lab){

			$sql ="CALL EMPLEADO_JEFE_LAB('".$jefe_lab->getNom_empleado()."','".$jefe_lab->getUsuario()."','".$jefe_lab->getContrasena()."','".$jefe_lab->getTipo_lab()."','".$jefe_lab->getActual()."')";

			return $resultado = $this->conBD->query($sql);

		}

		public function editar($jefe_lab, $id){

			$sql="UPDATE ver_jefes_laboratorios SET LABORATORIOS='".$jefe_lab->getTipo_lab()."', ACTUAL='".$jefe_lab->getActual()."' WHERE ID_JEFES=".$id;
			$sql2="UPDATE ver_jefes_laboratorios SET USUARIOS='".$jefe_lab->getUsuario()."' WHERE ID_JEFES= ".$id;
			$sql3 ="UPDATE ver_jefes_laboratorios SET NOMBRES='".$jefe_lab->getNom_empleado()."' WHERE ID_JEFES= ".$id;

			if ($this->conBD->query($sql)) {
				if ($this->conBD->query($sql2)) {
					if ($this->conBD->query($sql3)) {
						return true;
					}
				}
			}

		}

		public function eliminar($id1, $id2, $id3){

			$sql = "DELETE FROM jefes_laboratorios WHERE id_jefe_lab=".$id1;
			$sql2 = "DELETE FROM empleados WHERE id_empleado =".$id2;
			$sql3="DELETE FROM usuarios WHERE id_user =".$id3;

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