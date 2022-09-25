<?php 

	/**
	 * 
	 */
	class ProductoDAO{

		private $conBD;
		private $productos;
		
		public function __construct(){

			$this->conBD = Conexion::conectar();
			$this->productos = array();
		}

		public function listar(){

			$sql = "SELECT * FROM productos";
			$resultado = $this->conBD->query($sql);

			while ($row = $resultado->fetch_assoc()) {
				
				$this->productos[] = $row;
			}

			return $this->productos;
		}

		public function listar_by_id($id){

			$sql = "SELECT * FROM productos WHERE Id_Producto=".$id;
			$resultado = $this->conBD->query($sql);
			$row = $resultado->fetch_assoc();

			return $row;

			}

		public function agregar($producto){
			
			$sql = "INSERT INTO productos VALUES ('".$producto->getId_Producto()."', '".$producto->getNombre_Producto()."', '".$producto->getTipo_Producto()."')";

			$resultado = $this->conBD->query($sql);

		}

		public function editar($producto, $id){
			
			$sql = "UPDATE productos SET Id_Producto='".$producto->getId_Producto()."', nom_Producto='".$producto->getNombre_Producto()."', Tipo_Producto='".$producto->getTipo_Producto()."'WHERE Id_Producto =".$id;

			$resultado = $this->conBD->query($sql);

		}

		public function eliminar($id){
			
			$sql = "DELETE FROM productos WHERE Id_Producto =".$id;

			$resultado = $this->conBD->query($sql);

		}
	}






 ?>