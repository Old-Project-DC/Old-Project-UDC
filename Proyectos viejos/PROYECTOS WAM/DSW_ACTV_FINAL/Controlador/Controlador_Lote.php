<?php 
	
	/**
	 * 
	 */
	class Controlador_Lote{

		public function __construct(){
			require_once "ModeloDAO/LoteDAO.php";
			require_once "Modelo/Lote.php";
			require_once "ModeloDAO/ProductoDAO.php";
			require_once "Modelo/Producto.php";
		}
		
			public function index(){
				$user = $_SESSION['user'];
				$dao = new LoteDAO();
				$auxi["lote"] = $dao->listar();

				require_once $this->direccion()."Lote/Listar.php";
				print_r($this->direccion()."Lote/Listar.php");
			}

			public function vistaAddLote(){

				$daoPro = new ProductoDAO();
				$auxi["productos"] = $daoPro->listar();

				require_once $this->direccion()."Lote/Agregar.php";
				print_r($this->direccion()."Lote/Agregar.php");
			}

			public function guardar(){

				$dao = new LoteDAO();
				$lote = new Lote();
				
    			$cantidad_Producto = $_POST['cantidad_Producto'];
    			$fec_Elaboracion = $_POST['fec_Elaboracion'];
    			$fec_Vencimiento = $_POST['fec_Vencimiento'];
    			$id_Producto = $_POST['id_Producto'];

    			$lote->setCantidad_Producto($cantidad_Producto);
    			$lote->setFec_Elaboracion($fec_Elaboracion);
    			$lote->setFec_Vencimiento($fec_Vencimiento);
    			$lote->setId_Producto($id_Producto);

				$dao->agregar($lote);

				$this->vistaAddLote();

			}
			public function vistaEditar(){

				$dao = new LoteDAO();
				$id= $_GET['id'];
				$auxi["Lote"]= $dao->listar_by_id($id);
				$daoPro = new ProductoDAO();
				$auxi["productos"] = $daoPro->listar();

				require_once $this->direccion()."Lote/Editar.php";
				print_r($this->direccion()."Lote/Editar.php");
			}

			public function modificar(){

				$dao = new LoteDAO();
				$lote = new Lote();

				$id= $_POST['id'];
    			$cantidad_Producto = $_POST['cantidad_Producto'];
    			$fec_Elaboracion = $_POST['fec_Elaboracion'];
    			$fec_Vencimiento = $_POST['fec_Vencimiento'];
    			$id_Producto = $_POST['id_Producto'];

    			$lote->setCantidad_Producto($cantidad_Producto);
    			$lote->setFec_Elaboracion($fec_Elaboracion);
    			$lote->setFec_Vencimiento($fec_Vencimiento);
    			$lote->setId_Producto($id_Producto);

				$dao->editar($lote, $id);

				$this->index();
			}


			public function delete(){

				$dao = new LoteDAO();

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