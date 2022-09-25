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

				require_once "Vista/Lote/Listar.php";
			}

			public function modalGuardar(){

				$dao = new LoteDAO();
				$lote = new Lote();
				
    			$cantidad_Producto = addslashes($_POST['cantidad_producto']);
    			$fec_Elaboracion = addslashes($_POST['fecha_elaboracion']);
    			$fec_Vencimiento = $_POST['fecha_vencimiento'];
    			$id_Producto = addslashes($_POST['id_producto']);

    			$lote->setCantidad_Producto($cantidad_Producto);
    			$lote->setFec_Elaboracion($fec_Elaboracion);
    			$lote->setFec_Vencimiento($fec_Vencimiento);
    			$lote->setId_Producto($id_Producto);

				if ($dao->agregar($lote)) {
					echo 1;
				}else{
					echo 2;
				}

			}
			public function modalEditar(){

				$dao = new LoteDAO();
				$id= $_POST['id'];
				$auxi= $dao->listar_by_id($id);
				
				echo json_encode($auxi);

			}

			public function modificar(){

				$dao = new LoteDAO();
				$lote = new Lote();

				$id= addslashes($_POST['id']);
    			$cantidad_Producto = addslashes($_POST['cantidad_producto']);
    			$fec_Elaboracion = addslashes($_POST['fecha_elaboracion']);
    			$fec_Vencimiento = addslashes($_POST['fecha_vencimiento']);
    			$id_Producto = addslashes($_POST['id_producto']);

    			$lote->setCantidad_Producto($cantidad_Producto);
    			$lote->setFec_Elaboracion($fec_Elaboracion);
    			$lote->setFec_Vencimiento($fec_Vencimiento);
    			$lote->setId_Producto($id_Producto);

				if ($dao->editar($lote, $id)) {
					echo 1;
				}else{
					echo 2;
				}


			}


			public function delete(){

				$dao = new LoteDAO();

				$id= $_POST['id'];

				if ($dao->eliminar($id)) {
					echo 1;
				}else{
					echo 2;
				}
			}
		}

 ?>