<?php 
	require_once 'C:\wamp64\www\ACTIVIDAD_CIPAS_BDll_FINAL_TCC\Config\Conexion.php';
	require_once 'C:\wamp64\www\ACTIVIDAD_CIPAS_BDll_FINAL_TCC\Modelo\Producto.php';

	class ProductoDAO{

		public static function Listar(){
		
		$con = new Conexion();

		$sql="select * from productos";

		$auxi = $con->ejecutar($sql);

		$con->cerrarConexion();

		return $auxi;

		}
		public static function Listar_by_id($id_Producto){
		
		$con = new Conexion();

		$auxi = $con->ejecutar("SELECT * FROM productos WHERE Id_Producto = $id_Producto");

		$con->cerrarConexion();

		return $auxi[0];

		}		
		public static function Agregar($Producto){
		
		$con = new Conexion();

		$con->ejecutar("INSERT INTO productos VALUES ('".$Producto->getId_Producto()."','".$Producto->getNombre_Producto()."','".$Producto->getTipo_Producto()."')");

		$con->cerrarConexion();

		}

		public static function Editar($Producto, $id){

		$con = new Conexion();

		$sql="update producto set Id_Producto='".$Producto->getId_Producto()."',nom_Producto='".$Producto->getNombre_Producto()."',Tipo_Producto='".$Producto->getTipo_Producto()."'where Id_Producto=".$id;

		$con->ejecutar($sql);

		$con->cerrarConexion();
			
		}
		public static function Eliminar($id_Producto){

		$con = new Conexion();

		$con->ejecutar("DELETE  FROM productos WHERE Id_Producto=$id_Producto");

		$con->cerrarConexion();			
		}
	
	}

?>



