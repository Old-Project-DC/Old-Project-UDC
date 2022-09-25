<?php 
	
	/**
	 * 
	 */
	class Controlador_Producto{

		public function __construct(){
			require_once "ModeloDAO/ProductoDAO.php";
			require_once "Modelo/Producto.php";
		}
		
			public function index(){

				$dao = new ProductoDAO();
				$auxi["producto"] = $dao->listar();

				require_once "Vista/Producto/Listar.php";
			}

			public function vistaAddProducto(){

				require_once "Vista/Producto/Agregar.php";
			}

			public function guardar(){

				$dao = new ProductoDAO();
				$producto = new Producto();

				$id_Producto = $_POST['id_Producto'];
				$nombre_Producto = $_POST['nombre_Producto'];
				$tipo_Producto = $_POST['tipo_Producto'];

				$producto->setId_Producto($id_Producto);
				$producto->setNombre_Producto($nombre_Producto);
				$producto->setTipo_Producto($tipo_Producto);

				$dao->agregar($producto);

				$this->vistaAddProducto();

			}
			public function vistaEditar(){

				$producto = new ProductoDAO();
				$id= $_GET['id'];
				$auxi["Producto"]= $producto->listar_by_id($id);
				require_once "Vista/Producto/Editar.php";
			}

			public function modificar(){

				$dao = new ProductoDAO();
				$producto = new Producto();

				$id= $_POST['id'];
				$id_Producto = $_POST['id_Producto'];
				$nombre_Producto = $_POST['nombre_Producto'];
				$tipo_Producto = $_POST['tipo_Producto'];

				$producto->setId_Producto($id_Producto);
				$producto->setNombre_Producto($nombre_Producto);
				$producto->setTipo_Producto($tipo_Producto);

				$dao->editar($producto, $id);

				$this->index();
			}


			public function delete(){

				$dao = new ProductoDAO();

				$id= $_GET['id'];

				$dao->eliminar($id);

				$this->index();
			}

		}

 ?>