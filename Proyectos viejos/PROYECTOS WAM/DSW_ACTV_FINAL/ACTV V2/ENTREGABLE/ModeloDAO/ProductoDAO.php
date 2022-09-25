<?php 

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

			$sql = "SELECT * FROM productos WHERE id_producto=".$id;
			$resultado = $this->conBD->query($sql);
			$row = $resultado->fetch_assoc();

			return $row;

			}

		public function agregar($producto){
			
			$sql = "INSERT INTO productos (nom_producto, tipo_producto) VALUES ('".$producto->getNombre_Producto()."', '".$producto->getTipo_Producto()."')";

			return $resultado = $this->conBD->query($sql);	

		}

		public function editar($producto, $id){
			
			$sql = "UPDATE productos SET nom_producto='".$producto->getNombre_Producto()."', tipo_producto='".$producto->getTipo_Producto()."'WHERE id_producto =".$id;

			return $resultado = $this->conBD->query($sql);

		}

		public function eliminar($id){
			
			$sql = "DELETE FROM productos WHERE id_producto =".$id;

			return $resultado = $this->conBD->query($sql);

		}
	}

 ?>