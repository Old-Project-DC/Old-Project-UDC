<?php 

	class Controlador_Producto{

		public function __construct(){
			require_once "ModeloDAO/ProductoDAO.php";
			require_once "Modelo/Producto.php";
		}
		
			public function index(){

			
				$user = $_SESSION['user'];
				$dao = new ProductoDAO();
				$auxi["producto"] = $dao->listar();


				require_once "Vista/views/Producto/Listar.php";
			}

			public function modalGuardar(){

				$dao = new ProductoDAO();
				$producto = new Producto();
				$nombre_Producto = addslashes($_POST['nombre']);
				$tipo_Producto = addslashes($_POST['tipo']);
				$producto->setNombre_Producto($nombre_Producto);
				$producto->setTipo_Producto($tipo_Producto);

				if ($dao->agregar($producto)) {
					echo 1;
				}else{
					echo 2;
				}

			}
			public function modalEditar(){
				$dao = new ProductoDAO();
				$id= $_POST['id'];
				$auxi= $dao->listar_by_id($id);
	
				echo json_encode($auxi);
			}

			public function modificar(){

				$dao = new ProductoDAO();
				$producto = new Producto();

				$id= addslashes($_POST['id']);
				$nombre_Producto = addslashes($_POST['nombre']);
				$tipo_Producto = addslashes($_POST['tipo']);

				$producto->setNombre_Producto($nombre_Producto);
				$producto->setTipo_Producto($tipo_Producto);

				
				if ($dao->editar($producto, $id)) {
					echo 1;
				}else{
					echo 2;
				}
			}


			public function delete(){

				$dao = new ProductoDAO();

				$id= $_POST['id'];

				if ($dao->eliminar($id)) {
					echo 1;
				}else{
					echo 2;
				}
			}		

		}

 ?>