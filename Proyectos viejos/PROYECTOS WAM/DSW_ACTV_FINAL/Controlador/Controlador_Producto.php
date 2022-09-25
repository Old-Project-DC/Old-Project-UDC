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


				require_once $this->direccion()."Producto/Listar.php";
				print_r($this->direccion()."Producto/Listar.php");
			}

			public function vistaAddProducto(){

				require_once $this->direccion()."Producto/Agregar.php";
				print_r($this->direccion()."Producto/Agregar.php");
			}

			public function guardar(){

				$dao = new ProductoDAO();
				$producto = new Producto();

				$nombre_Producto = $_POST['nombre_Producto'];
				$tipo_Producto = $_POST['tipo_Producto'];

				$producto->setNombre_Producto($nombre_Producto);
				$producto->setTipo_Producto($tipo_Producto);

				//$dao->agregar($producto);
				if ($dao->agregar($producto)) {
					//echo "Exito al Guardar :)";
					$strong="Info:";
					$msj="Se ha guardado exitosamente el producto :)";
					$this->index();
				}else{

					//echo "Error al Guardar :'(";
					$strong="Info:";
					$msj="Se ha guardado exitosamente el producto :)";
					$this->index();

				}


			}
			public function vistaEditar(){

				$dao = new ProductoDAO();
				$id= $_GET['id'];
				$auxi["Producto"]= $dao->listar_by_id($id);
				require_once $this->direccion()."Producto/Editar.php";
				print_r($this->direccion()."Producto/Editar.php");
			}

			public function modificar(){

				$dao = new ProductoDAO();
				$producto = new Producto();

				$id= $_POST['id'];
				$nombre_Producto = $_POST['nombre_Producto'];
				$tipo_Producto = $_POST['tipo_Producto'];

				$producto->setNombre_Producto($nombre_Producto);
				$producto->setTipo_Producto($tipo_Producto);

				$dao->editar($producto, $id);

				$this->index();
			}


			public function delete(){

				$dao = new ProductoDAO();

				$id= $_POST['id'];

				$dao->eliminar($id);

				$this->index();
			}

			public function direccion(){
			$rol = $_SESSION['rol'];
			$dir="";
			if ($rol=="ADMIN") {
				$dir="Vista/";

			}elseif ($rol=="JEFE") {
				$dir="jefe/Vista/";	

			}else{
						
				$dir="director/Vista/";
			}
				return $dir;
			

		}
		

		}

 ?>