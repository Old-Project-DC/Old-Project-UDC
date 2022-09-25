<?php 

	/**
	 * 
	 */
	class LoteDAO{

		private $conBD;
		private $lotes;
		
		public function __construct(){

			$this->conBD = Conexion::conectar();
			$this->lotes = array();
		}

		public function listar(){

			$sql = "SELECT * FROM lotes";
			$resultado = $this->conBD->query($sql);

			while ($row = $resultado->fetch_assoc()) {
				
				$this->lotes[] = $row;
			}

			return $this->lotes;
		}

		public function listar_by_id($id){

			$sql = "SELECT * FROM lotes WHERE id_lote=".$id;
			$resultado = $this->conBD->query($sql);
			$row = $resultado->fetch_assoc();

			return $row;

			}

		public function agregar($lote){
			
			$sql = "INSERT INTO lotes (cantidad_producto, fec_elaboracion, fec_vencimiento, id_producto_fk) VALUES ('".$lote->getCantidad_Producto()."', '".$lote->getFec_Elaboracion()."', '".$lote->getFec_Vencimiento()."', '".$lote->getId_Producto()."')";

			$resultado = $this->conBD->query($sql);

		}

		public function editar($lote, $id){
			
			$sql = "UPDATE lotes SET cantidad_producto = '".$lote->getCantidad_Producto()."', fec_elaboracion = '".$lote->getFec_Elaboracion()."', fec_vencimiento = '".$lote->getFec_Vencimiento()."', id_producto_fk = '".$lote->getId_Producto()."'WHERE id_lote=".$id;

			$resultado = $this->conBD->query($sql);

		}

		public function eliminar($id){
			
			$sql = "DELETE FROM lotes WHERE id_lote =".$id;

			$resultado = $this->conBD->query($sql);

		}

	}

 ?>